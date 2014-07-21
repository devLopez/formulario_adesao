<script type="text/javascript" src="./js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    
    /** Inicializaçao do tiny mce **/
    tinymce.init({
        selector: "textarea#nova_mensagem",
        convert_urls: false,
        language: "pt_BR",
        content_css: "css/bootstrap.css",
        theme: "modern",
        height: 280,
        plugins: ["autolink link lists print hr", "searchreplace wordcount visualblocks visualchars nonbreaking", "contextmenu directionality emoticons textcolor"],
        toolbar: "bold italic underline | alignleft aligncenter alignright alignjustify | bullist outdent indent | styleselect forecolor backcolor | link unlink | print"
    });
    /**************************************************************************/
    
    /** Inicialização do Jquery **/
    $(document).ready(function() {
        
        /** Esconde o botão para exclusão de mensagem **/
        $('#opcoes').html('');
        
        
        /** Realiza o submit da mensagem **/
        $('#envia_mensagem').submit(function(e) {
            tinyMCE.triggerSave();
            e.preventDefault();
            assunto     = $('#assunto').val();
            mensagem    = $('#nova_mensagem').val();

            if (assunto.length == 0)
            {
                $('#assunto').focus();
                erro();
                return false;
            }
            else
            {
                $.ajax({
                    url: '<?php echo app_baseurl().'painel/mensagens/enviar_mensagem' ?>',
                    type: 'POST',
                    data: {assunto: assunto, mensagem: mensagem},
                    dataType: 'html',
                    success: function(sucesso)
                    {
                        if (sucesso == 1)
                        {
                            $.smallBox({
                                title: "<i class='fa fa-check'></i> Sucesso",
                                content: "Sua mensagem foi enviada",
                                iconSmall: "fa fa-thumbs-up bounce animated",
                                color: "#3b5998",
                                timeout: 5000
                            });
                            caixa_entrada();
                        }
                        else
                        {
                            $.smallBox({
                                title: "<i class='fa fa-check'></i> Erro",
                                content: "<strong>Não foi possível enviar sua mensagem. Tente novamente</strong>",
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
                            content: "<strong>Não foi possível salvar os dados</strong>",
                            iconSmall: "fa fa-thumbs-down bounce animated",
                            color: "#FE1A00",
                            timeout: 5000
                        });
                    }
                });
            }
        });
    });

    /** Função que exibe mensagem de erro **/
    function erro()
    {
        $.smallBox({
            title: "<i class='fa fa-check'></i> Erro",
            content: "<strong>O assunto não pode ficar em branco</strong>",
            iconSmall: "fa fa-thumbs-down bounce animated",
            color: "#FE1A00",
            timeout: 5000
        });
    }
</script>

<form id="envia_mensagem">
    <div class="button-group pull-right">
        <button type="submit" class="button"><i class="octicon octicon-repo-pull"></i> Enviar</button>
        <button type="reset" class="button"><i class="octicon octicon-trashcan"></i> Apagar Mensagem</button>
    </div>
    <input id="assunto" type="text" placeholder="Titulo da mensagem" class="span5" autofocus="">

    <!-- Textarea onde será inserido o campo para edição de notícias -->
    <textarea id="nova_mensagem" name="nova_mensagem" rows="7"></textarea>
    <!--*********************************************************************-->
</form>
