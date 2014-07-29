<?php
    if (!$mensagens)
    {
        ?>
        <div class="alert info">
            Não há mensagens para serem lidas
        </div>
        <?php
    } else
    {
        ?>
        <table class="table table-condensed">
            <?php
            foreach ($mensagens as $row)
            {
                $caracteres = 52;
                $tam_msg = strlen($row->mensagem);
                ?>
                <tr class="inbox">
                    <td><input type="checkbox" class="checkbox-mensagem" data-id='<?php echo $row->id ?>'></td>
                    <td>
                        <a href="#" class="excluir tooltipped tooltipped-n" aria-label="Enviar para a lixeira" data-id='<?php echo $row->id ?>'>
                            <i class="octicon octicon-trashcan"></i>
                        </a>
                        <?php
                        if ($row->foi_lida == 1)
                        {
                            ?>
                            <a href="#" class="lida tooltipped tooltipped-n" aria-label="Marcar como lida" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-mail-read"></i>
                            </a>
                            <?php
                        } else
                        {
                            ?>
                            <a href="#" class="nao_lida tooltipped tooltipped-n" aria-label="Marcar como lida" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-mail-read"></i>
                            </a>
                <?php
            }
            ?>
                    </td>
                    <td class="inbox-data <?php if ($row->foi_lida == 1)
            {
                echo 'bold';
            } ?>" data-id='<?php echo $row->id ?>'><em><?php echo date('d/m/Y H:m', strtotime($row->data)) ?></em></td>
                    <td class="inbox-titulo <?php if ($row->foi_lida == 1)
            {
                echo 'bold';
            } ?>" data-id='<?php echo $row->id ?>'><strong><?php echo $row->titulo ?></td>
                    <td class="inbox-mensagem <?php if ($row->foi_lida == 1)
            {
                echo 'bold';
            } ?>" data-id='<?php echo $row->id ?>'>
                        <?php
                        if ($tam_msg > $caracteres)
                        {
                            echo substr_replace(strip_tags($row->mensagem), '...', $caracteres, $tam_msg - $caracteres);
                        } else
                        {
                            echo $row->mensagem;
                        }
                        ?>
                    </td>
                </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }
?>
<script type="text/javascript">
    $(document).ready(function() {
        /**
         * Função desenvolvida para excluir uma mensagem
         */
        $('.excluir').click(function(e) {
            e.preventDefault();

            url_excluir = '<?php echo app_baseurl().'painel/mensagens/marcar_excluida'?>';
            id = $(this).data('id');
            
            excluir(url_excluir, id);
        });
    });
</script>