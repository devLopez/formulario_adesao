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
                    </td>
                    <td class="inbox-data" data-id='<?php echo $row->id ?>'><em><?php echo date('d/m/Y H:m', strtotime($row->data)) ?></em></td>
                    <td class="inbox-titulo" data-id='<?php echo $row->id ?>'><?php echo $row->titulo ?></td>
                    <td class="inbox-mensagem" data-id='<?php echo $row->id ?>'>
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

            url = $('.menu li a.selected').attr('href');
            url_excluir = '<?php echo app_baseurl().'administrativo/mensagens/excluir'?>';
            id = $(this).data('id');
            
            excluir(url_excluir, id, url);
        });
    });
</script>