<?php
    if(empty($excluidos))
    {
        ?>
        <div class="alert alert-block info">
            Não há intens excluidos
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-condensed">
            <?php
            foreach($excluidos as $row)
            {
                $caracteres = 52;
                $tam_msg = strlen($row->mensagem);

                if($row->foi_lida == 1)
                {
                    ?>
                    <tr class="inbox">
                        <td><input type="checkbox" class="checkbox-mensagem" data-id='<?php echo $row->id ?>'></td>
                        <td>
                            <a href="#" class="excluir_def tooltipped tooltipped-n" aria-label="Excluir definitivamente" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-trashcan"></i>
                            </a>
                            <a href="#" class="lida tooltipped tooltipped-n" aria-label="Marcar como não lida" data-id='<?php echo $row->id ?>'>
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
                            <a href="#" class="excluir_def tooltipped tooltipped-n" aria-label="Excluir definitivamente" data-id='<?php echo $row->id ?>'>
                                <i class="octicon octicon-trashcan"></i>
                            </a>
                            <a href="#" class="nao_lida tooltipped tooltipped-n" aria-label="Marcar como lida" data-id='<?php echo $row->id ?>'>
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
    /** Início do Jquery **/
    $(document).ready(function(){
        
        /** Adiciona o botão para exclusão de mensagens **/
        $('#opcoes').html('');
        
        /**
         * @param   {string}    url_excluidos   Contém a url da caixa de saida
         */
        var url_excluidos = $('#excluidos').attr('href');
        
        /**
         * @abstract    Função desenvolvida para marcar a mensagem como lida
         * @param       {int}       id          Contém o id da mensagem
         * @param       {string}    url         Contém a url para fazer o retorno
         * @param       {string}    callback    Contém a função para realizar o callback após o retorno na função
         */
        $('.lida').click(function(e) {
            e.preventDefault();

            id = $(this).data('id');
            url = '<?php echo app_baseurl().'painel/mensagens/marcar_lida' ?>';
            callback = excluidos;
            
            marcar_lida(id, url, callback, url_excluidos);
        });
        
        /** Marca a mensagem com não lida **/
        $('.nao_lida').click(function(e) {
            e.preventDefault();
            
            id  = $(this).data('id');
            url = '<?php echo app_baseurl().'painel/mensagens/marcar_naoLida' ?>';
            callback = excluidos;
            
            marcar_naoLida(id, url, callback, url_excluidos);

        });
        
        /** Função desenvolvida para excluir definitivamente uma mensagem **/
        $('.excluir_def').click(function(e){
            e.preventDefault();
            
            var id          = $(this).data('id');
            var url         = '<?php echo app_baseurl().'painel/mensagens/excluir_definitivo'?>';
            var callback    = excluidos;
            
            excluir(id, url, callback, url_excluidos);
        });
    });
</script>