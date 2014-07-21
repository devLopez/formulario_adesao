<script type="text/javascript" src="./js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    /** Inicializaçao do tiny mce **/
    tinymce.init({
        selector: "textarea#corpo_mensagem",
        convert_urls: false,
        language: "pt_BR",
        content_css: "css/bootstrap.css",
        theme: "modern",
        height: 150,
        plugins: ["autolink link lists print hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars nonbreaking", "contextmenu directionality emoticons textcolor"],
        toolbar: "bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | print"
    });
    /**************************************************************************/

    /** Início do Jquery **/
    $(document).ready(function() {


        /** Insere os botões de ações na página **/
        $('#opcoes').html(
            '<div class="button-group pull-right">\n\
            <a id="ler_voltar" class="button minibutton tooltipped tooltipped-n" aria-label="Voltar às mensagens"><i class="octicon octicon-clippy"></i></a>\n\
            <a id="ler_excluir" class="button minibutton tooltipped tooltipped-n" aria-label="Excluir esta mensagem"><i class="octicon octicon-x"></i></a>\n\
            <a data-toggle="modal" data-target="#reply" id="ler_responder" data-toggle="modal" data-target="#responder_mensagem" class="button minibutton tooltipped tooltipped-n" aria-label="Responder"><i class="octicon octicon-move-right"></i></a>\n\
            </div>'
        );
        /**********************************************************************/

        /**
         * @abstract    Volta para a página onde o usuário estava
         * @param       {string}    href receberá o endereço do atributo href do menú que está selecionado
         *              para carregar as páginas onde o usuário estava
         **/
        $('#ler_voltar').click(function(e) {
            e.preventDefault();

            href = $('.menu li a.selected').attr('href');

            paginas_mensagens(href);
        });
        /**********************************************************************/

        /**
         * @abstract    Envia uma mensagem para a lixeira
         * 
         */
        $('#ler_excluir').click(function(e) {
            e.preventDefault();

            id = $('#id_mensagem').val();
            url = '<?php echo app_baseurl() . 'painel/mensagens/marcar_excluida' ?>';

            marcar_excluida(id, url, '', '');

            href = $('.menu li a.selected').attr('href');

            paginas_mensagens(href);
        });
        /**********************************************************************/

        /**
         * @abstract    Adiciona ao corpo da mensagem, a mensagem criada anteriormente
         */
        $('#corpo_mensagem').html('<br><br><small>' + $('#mensagem_leitura').html() + '</small>');

        /**
         * @abstract    Função desenvolvida para responder uma mensagem
         */
        $('#responder_mensagem').submit(function(e) {
            tinyMCE.triggerSave();
            e.preventDefault();

            assunto = $('#titulo').val();
            mensagem = $('#corpo_mensagem').val();

            $.post('<?php echo app_baseurl() . 'painel/mensagens/enviar_mensagem' ?>', {assunto: assunto, mensagem: mensagem}, function(sucesso) {
                if (sucesso == 1)
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Sucesso",
                        content: "Sua mensagem foi enviada",
                        iconSmall: "fa fa-thumbs-up bounce animated",
                        color: "#3b5998",
                        timeout: 5000
                    });

                    href = $('.menu li a.selected').attr('href');

                    paginas_mensagens(href);
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
            }).error(function() {
                $.smallBox({
                    title: "<i class='fa fa-check'></i> Erro",
                    content: "<strong>Não foi possível salvar os dados</strong>",
                    iconSmall: "fa fa-thumbs-down bounce animated",
                    color: "#FE1A00",
                    timeout: 5000
                });
            });

        });
    });
</script>

<?php
    if (!isset($mensagem))
    {
        ?>
        <div class="alert alert-block info">
            <i class="octicon octicon-x"></i> Não foi possível resgatar a mensagem
        </div>
        <?php
    } else
    {
        foreach ($mensagem as $row)
        {
            ?>
            <div id="mensagem_leitura">
                Em <strong><em><?php echo date('d/m/Y h:m', strtotime($row->data)) ?></em></strong>,
                <strong><?php echo $row->nome; ?></strong> escreveu:
                <p>
                    <?php echo $row->mensagem ?>
                </p>
                <input type="hidden" id="id_mensagem" value="<?php echo $row->id ?>">
                <br>
            </div>
            <?php
        }
    }
?>

<!-- Modal que contém o formulário de resposta -->
<form id="responder_mensagem">
    <div id="reply" class="modal hide fade" data-backdrop="false" data-keyboard="true">
        <div class="modal-header">
            <img class="logo" src="./img/logo.gif" alt="Clube Campestre Pentaurea">
        </div>
        <div class="modal-body">
            <label>Assunto:</label>
            <input type="text" id="titulo" class="span5" autofocus="" required="">
            <textarea id="corpo_mensagem"></textarea>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn primary">Enviar mensagem</button>
        </div>
    </div>
</form>
<!--*************************************************************************-->