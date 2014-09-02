<?php
    if (!$propostas)
    {
        ?>
        <div class="alert alert-block info fadeIn">
            <h4 class="alert-heading">
                <i class="fa fa-exclamation-triangle"></i> Atenção
            </h4>
            <p>Não há propostas cadastradas</p>
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-bordered table-hover table-striped fadeIn">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Status da Aprovação</th>
                    <th>Ficha Preenchida?</th>
                    <th>Adesão</th>
                    <th>Geração de Protocolo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($propostas as $row)
                {
                    ?>
                    <tr class="inbox" data-href="<?php echo app_baseurl().'administrativo/propostas/visualiza_proponente/'.$row->id?>">
                        <td><?php echo $row->nome_proponente ?></td>
                        <td><?php echo $row->cpf_proponente ?></td>
                        <td>
                            <?php
                            if ($row->status_aprovacao == NULL)
                            {
                                echo '<label class="label label-reverse">Não avaliado</label>';
                            }
                            elseif ($row->status_aprovacao == 0)
                            {
                                echo '<label class="label label-important">Não Aprovado</label>';
                            }
                            elseif ($row->status_aprovacao == 1)
                            {
                                echo '<label class="label label-success">Aprovado</label>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($row->numero_protocolo)
                            {
                                echo '<label class="label label-success">Ficha preenchida</label>';
                            }
                            else
                            {
                                echo '<label class="label label-reverse">Ficha não preenchida</label>';
                            }
                            ?>
                        </td>
                        <td><?php echo date('d/m/Y h:m', strtotime($row->data_adesao)) ?></td>
                        <td>
                            <?php 
                                if($row->data_geracaoProtocolo)
                                {
                                    echo date('d/m/Y h:m', strtotime($row->data_geracaoProtocolo));
                                } 
                             ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        echo $paginacao;
    }
?>

<script type="text/javascript">
    $('.inbox').click(function(e){
        e.preventDefault();
        
        url = $(this).data('href');
        
        load_ajax(url, $('#propostas_cadastradas'));
    });
</script>