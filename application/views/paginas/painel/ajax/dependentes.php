<?php
    if(empty($dependentes))
    {
        ?>
        <div class="alert alert-block info">
            <i class="fam-information"></i> Você ainda não cadastrou dependentes
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome do Depentente</th>
                    <th>Grau de parentesco</th>
                    <th>Data de nascimento</th>
                    <th>Estado civil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($dependentes as $row)
                {
                    ?>
                    <tr>
                        <td><?php echo $row->nome_dependente ?></td>
                        <td><?php echo $row->parentesco_dependente ?></td>
                        <td><?php echo $row->data_nascimento_dependente ?></td>
                        <td><?php echo $row->estado_civil_dependente ?></td>
                        <td>
                            <div align="center">
                                <a class="excluir tooltipped tooltipped-n" aria-label="Excluir este dependente" href="#" data-id="<?php echo $row->id ?>">
                                    <i class="octicon octicon-trashcan"></i>
                                </a>
                                <a data-toggle="modal" data-target="#update" class="editar tooltipped tooltipped-n" aria-label="Editar este dependente" href="#" data-href="<?php echo app_baseurl().'painel/dependentes/busca_dadosDepentente/'.$row->id ?>">
                                    <i class="octicon octicon-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
?>

<!-- Modal que terá inserido os dados do dependente para edição -->
<form id="atualiza_dependente">
    <div id="update" class="modal hide fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-header">
            <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
            <h4 class="pull-right">Edição de dependente</h4>
        </div>
        <div class="modal-body" id="dados_edicao"></div>
        <div class="modal-footer">
            <button id="fechar" type="reset" class="btn danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn primary">Atualizar dependente</button>
        </div>
    </div>
</form>
<!--*************************************************************************-->


<script type="text/javascript">
    $('.excluir').click(function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        $.SmartMessageBox({
            title: '<i class="fa fa-times" style="color:red"></i> Atenção',
            content: 'Você está prestes a excluir um dependente. Deseja prosseguir?',
            buttons: '[Sim, excluir o registro][Não excluir]'
        }, function(botao) {
            if (botao == 'Não excluir')
            {
                return false;
            }
            else
            {
                $.ajax({
                    url: "<?php echo app_baseurl().'painel/dependentes/excluir_dependente' ?>",
                    type: 'POST',
                    data: {id: id},
                    dataType: 'html',
                    success: function(sucesso)
                    {
                        if (sucesso == 1)
                        {
                            $.smallBox({
                                title: "<i class='fa fa-check'></i> Sucesso",
                                content: "<strong>Dependente excluido</strong>",
                                iconSmall: "fa fa-thumbs-up bounce animated",
                                color: "#3b5998",
                                timeout: 5000
                            });
                            buscar();
                        }
                        else
                        {
                            $.smallBox({
                                title: "<i class='fa fa-check'></i> Erro",
                                content: "<strong>Não foi possível excluir o dependente. Tente novamente</strong>",
                                iconSmall: "fa fa-thumbs-down bounce animated",
                                color: "#FE1A00",
                                timeout: 5000
                            });
                        }
                    },
                    error: function()
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Erro",
                            content: "<strong>Ocorreu um erro. Tente novamente</strong>",
                            iconSmall: "fa fa-thumbs-down bounce animated",
                            color: "#FE1A00",
                            timeout: 5000
                        });
                    }
                });
            }
        });
        
    });
    
    $('.editar').click(function(e){
        e.preventDefault();
        
        var href = $(this).data('href');
        
        $.get(href, function(e){
            $('#dados_edicao').html(e);
        });
    });
</script>