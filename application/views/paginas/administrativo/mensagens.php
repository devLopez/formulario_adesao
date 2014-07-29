<script type="text/javascript" src="./js/mensagens_adm.js"></script>
<script type="text/javascript">
    /** Define a variável url como global **/
    var url = $('.menu li a.selected').attr('href');

    $(document).ready(function() {

        /** Adiciona a classe selected ao menu de mensagens **/
        $('#menu-mensagens').addClass('selected');

        /** Adiciona o botão para exclusão de mensagens **/
        $('#opcoes').html('<button id="excluir_selecionados" class="button minibutton blue pull-right" disabled=""><i class="octicon octicon-trashcan"></i> Excluir selecionados</button>');

        /** Recebe as urls do menu para busca das mensagens via ajax **/
        $('#entrada, #enviados, #excluidos').click(function(e) {
            e.preventDefault();

            remove_classe();

            url = $(this).attr('href');
            $(this).addClass('selected');

            buscar_mensagens(url);
        });

        /** Adiciona a classe highlight em uma mensagem **/
        $(document).on('click', '.checkbox-mensagem', function() {
            $(this).parent().parent().toggleClass('highlight');

            verifica_checkbox();
        });

        buscar_mensagens();
    });

    /**
     * buscar_mensagens()
     * 
     * Função desenvolvida para realizar a busca das mensagens, baseadas na pasta
     * que desejam acessar
     * 
     * @param   {string} url Contém a url que será buscada
     */
    function buscar_mensagens(url)
    {
        if (url == '' || url == undefined)
        {
            url = '<?php echo app_baseurl() . 'administrativo/mensagens/caixa_entrada' ?>';
        }

        load_ajax(url, $('#painel_mensagens'));
    }
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
    }
    ;
    //**************************************************************************

    /**
     * @name        remove_classe()
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail>
     * @abstract    Função desenvolvida para remover a classe active do menu
     */
    function remove_classe()
    {
        $('.menu').find('a').each(function() {
            $(this).removeClass('selected');
        });
    }
</script>

<!-- Header da página -->
<div class="row">
    <div class="span9">
        <h2><i class="fa fa-envelope"></i> Minhas mensagens</h2>
    </div>
    <div class="span3" id="opcoes">
    </div>
</div>
<!--*************************************************************************-->

<div class="row">

    <!-- Div onde será apresentado o menu de navegação -->
    <div class="span3 bs-docs-sidebar">
        <ul class="menu">
            <li>
                <a id="entrada" class="selected" href="<?php echo app_baseurl() . 'administrativo/mensagens/caixa_entrada' ?>">
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

    <!-- Div onde serão listadas as mensagens -->
    <div class="span9" id="painel_mensagens"></div>
    <!--*********************************************************************-->
</div>
<!--*************************************************************************-->