<?php
    if(empty($saida))
    {
        ?>
        <div class="alert alert-block info">
            Não há mensagens em seus itens enviados
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table table-condensed">
            <?php
            foreach($saida as $row)
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
                        if($tam_msg > $caracteres)
                        {
                            echo substr_replace(strip_tags($row->mensagem), '...', $caracteres, $tam_msg - $caracteres);
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
            ?>
        </table>
        <?php
    }
?>
<script type="text/javascript">
    /** Inicio do Jquery **/
    $(document).ready(function(){
        
        /** Adiciona o botão para exclusão de mensagens **/
        $('#opcoes').html('<button id="excluir_selecionados" class="button minibutton blue pull-right" disabled=""><i class="octicon octicon-trashcan"></i> Excluir selecionados</button>');
        
        /**
         * @param   {string}    saida   Define a url dos itens enviados
         */
        var url_enviados = $('#enviados').attr('href');
        
        /** Realiza a exclusão da mensagem **/
        $('.excluir').click(function(e){
            e.preventDefault();
            
            id = $(this).data('id');
            url = '<?php echo app_baseurl().'painel/mensagens/marcar_excluida'?>';
            callback = enviados;
            
            marcar_excluida(id, url, callback, url_enviados);
            
        });
    });
</script>