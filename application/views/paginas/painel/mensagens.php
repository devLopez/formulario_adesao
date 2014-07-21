<script type="text/javascript" src="./js/mensagens.js"></script>
<script type="text/javascript">
    /** Chamada do Jquery **/
    $(document).ready(function() {

        /**
         * @param   {string}    url_entrada  Define a url da caixa de entrada
         */
        var url_entrada = $('#entrada').attr('href');

        /** Chama a funçao que busca as mensagens para caixa de mensagens **/
        caixa_entrada(url_entrada);

        /** Adiciona a classe 'ative' e previne contra o clique **/
        $('#menu-mensagens').addClass('selected').click(function(e) {
            e.preventDefault();
        });

        /** Adiciona a classe highlight em uma mensagem **/
        $(document).on('click', '.checkbox-mensagem', function() {
            $(this).parent().parent().toggleClass('highlight');

            verifica_checkbox();
        });
        //**********************************************************************

        /** Função do on-click das mensagens **/
        $(document).on('click', '.inbox-data, .inbox-titulo, .inbox-mensagem', function() {
            id = $(this).data('id');
            href = '<?php echo app_baseurl() . 'painel/mensagens/ler_mensagem/' ?>' + id;

            paginas_mensagens(href);

            $.post('<?php echo app_baseurl() . 'painel/mensagens/marcar_lida' ?>', {id: id});
        });
        //**********************************************************************

        /** Função que abre as urls do menu de navegação das mensagens via ajax **/
        $('.menu li a').click(function(e) {
            e.preventDefault();

            var li = $(this);

            remove_classe();

            url = li.attr('href');
            li.addClass('selected');

            paginas_mensagens(url);
        });
        //**********************************************************************

        /**
         * Função desenvolvida para excluir as mensagens selecionadas 
         */
        $(document).on('click', '#excluir_selecionados', function() {
            if ($(this).attr('disabled') == false)
            {
                return false;
            }
            else
            {
                id = new Array();
                $(':checked').each(function() {
                    id.push($(this).data('id'));
                });

                $.post('<?php echo app_baseurl() . 'painel/mensagens/exclui_selecionados' ?>', {id: id});

                href = $('.menu li a.selected').attr('href');
                $('#excluir_selecionados').prop('disabled', true);
                paginas_mensagens(href);
            }
        });
        //**********************************************************************
    });
    //**************************************************************************

    /** Função que verifica se existem checkboxes marcados **/
    function verifica_checkbox()
    {
        var i = 0;

        $("input:checked").each(function() {
            i = i + 1;
        });

        if (i > 0)
        {
            $('#excluir_selecionados').prop('disabled', false);
        }
        else
        {
            $('#excluir_selecionados').prop('disabled', true);
        }
    };
    //**************************************************************************

    /**
     * Função desenvolvida para carregar via ajax as requisioes
     */
    function paginas_mensagens(url)
    {
        $('#painel_mensagens').html('<h3><i class="fa fa-cog fa-spin"></i> Carregando</h3>');
        $.get(url, function(e) {
            $('#painel_mensagens').html(e);
        });
    }
    //**************************************************************************
</script>

<div class="container">
    <!-- Header da página -->
    <div class="row">
        <div class="span9">
            <h2><i class="fa fa-envelope"></i> Minhas mensagens</h2>
        </div>
        <div class="span3" id="opcoes">
        </div>
    </div>
    <!--*********************************************************************-->

    <!-- Div que contém o corpo da mensagem -->
    <div class="row">

        <!-- Div de navegação -->
        <div class="span3 bs-docs-sidebar">
            <ul class="menu">
                <li>
                    <a href="<?php echo app_baseurl() . 'painel/mensagens/nova_mensagem' ?>">
                        <i class="octicon octicon-plus"></i> 
                        Nova Mensagem
                    </a>
                </li>
                <li>
                    <a id="entrada" class="selected" href="<?php echo app_baseurl() . 'painel/mensagens/caixa_entrada' ?>">
                        <i class="octicon octicon-inbox"></i> 
                        Caixa de Entrada
                    </a>
                </li>
                <li>
                    <a id="enviados" href="<?php echo app_baseurl() . 'painel/mensagens/caixa_saida' ?>">
                        <i class="octicon octicon-repo-pull"></i> 
                        Mensagens Enviadas
                    </a>
                </li>
                <li>
                    <a id="excluidos" href="<?php echo app_baseurl() . 'painel/mensagens/excluidos' ?>">
                        <i class="octicon octicon-trashcan"></i>     
                        Itens Excluídos
                    </a>
                </li>
            </ul>
        </div>
        <!--*****************************************************************-->

        <!-- Div onde serão listadas as mensagens -->
        <div class="span9" id="painel_mensagens"></div>
        <!--*****************************************************************-->
    </div>
    <!--*********************************************************************-->
</div>