<?php
    if(empty($entrada))
    {
        ?>
        <div class="alert alert-block info">
            Não há mensagens em sua caixa de entrada
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-condensed">
            <?php
            foreach($entrada as $row)
            {
                $caracteres = 52;
                $tam_msg = strlen($row->mensagem);

                if($row->foi_lida == 1)
                {
                    ?>
                    <tr class="inbox">
                        <td><input type="checkbox" class="checkbox-mensagem" data-id='<?php echo $row->id ?>'></td>
                        <td>
                            <a href="#" class="excluir tooltipped tooltipped-n" aria-label="Enviar para a lixeira" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-trashcan"></i>
                            </a>
                            <a href="#" class="lida tooltipped tooltipped-n" aria-label="Marcar como lida" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-mail-read"></i>
                            </a>
                        </td>
                        <td class="inbox-data" data-id='<?php echo $row->id ?>'><strong><em><?php echo date('d/m/Y H:m', strtotime($row->data)) ?></em></strong></td>
                        <td class="inbox-titulo" data-id='<?php echo $row->id ?>'><strong><?php echo $row->titulo ?></strong></td>
                        <td class="inbox-mensagem" data-id='<?php echo $row->id ?>'>
                            <strong>
                                <?php
                                if($tam_msg > $caracteres)
                                {
                                    echo substr_replace($row->mensagem, '...', $caracteres, $tam_msg - $caracteres);
                                }
                                else
                                {
                                    echo $row->mensagem;
                                }
                                ?>
                            </strong>
                        </td>
                    </tr>
                    <?php
                }
                else
                {
                    ?>
                    <tr class="inbox">
                        <td><input type="checkbox" class="checkbox-mensagem" data-id='<?php echo $row->id ?>'></td>
                        <td>
                            <a href="#" class="excluir tooltipped tooltipped-n" aria-label="Enviar para a lixeira" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-trashcan"></i>
                            </a>
                            <a href="#" class="nao_lida tooltipped tooltipped-n" aria-label="Marcar como não lida" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-mail"></i>
                            </a>
                        </td>
                        <td class="inbox-data" data-id='<?php echo $row->id ?>'><em><?php echo date('d/m/Y H:m', strtotime($row->data)) ?></em></td>
                        <td class="inbox-titulo" data-id='<?php echo $row->id ?>'><?php echo $row->titulo ?></td>
                        <td class="inbox-mensagem" data-id='<?php echo $row->id ?>'>

                            <?php
                            if($tam_msg > $caracteres)
                            {
                                echo substr_replace($row->mensagem, '...', $caracteres, $tam_msg - $caracteres);
                            }
                            else
                            {
                                echo $row->mensagem;
                            }
                            ?>

                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <?php
    }
?>
<script type="text/javascript">
    /** Inicio do jquery **/
    $(document).ready(function() {
        
        /** Adiciona o botão para exclusão de mensagens **/
        $('#opcoes').html('<button id="excluir_selecionados" class="button minibutton blue pull-right" disabled=""><i class="octicon octicon-trashcan"></i> Excluir selecionados</button>');
        
        var url_entrada = $('#entrada').attr('href');

        /** Marca a mensagem como lida **/
        $('.lida').click(function(e) {
            e.preventDefault();

            id = $(this).data('id');
            url = '<?php echo app_baseurl().'painel/mensagens/marcar_lida' ?>';
            callback = caixa_entrada;
            
            marcar_lida(id, url, callback, url_entrada);
        });

        /** Marca a mensagem com não lida **/
        $('.nao_lida').click(function(e) {
            e.preventDefault();
            
            id  = $(this).data('id');
            url = '<?php echo app_baseurl().'painel/mensagens/marcar_naoLida' ?>';
            callback = caixa_entrada;
            
            marcar_naoLida(id, url, callback, url_entrada);

        });

        /** Envia a mensagem para a lixeira **/
        $('.excluir').click(function(e) {
            e.preventDefault();
            
            id  = $(this).data('id');
            url = '<?php echo app_baseurl().'painel/mensagens/marcar_excluida'?>';
            callback = caixa_entrada;
            
            marcar_excluida(id, url, callback, url_entrada);
        });
    });
</script>