<div class="container">
    <div class="row">

        <!-- Contém os dados do usuário -->
        <div class="span12">

            <!--Contém a navegação via abas-->
            <ul class="nav nav-tabs" id="abas">
                <li class="active">
                    <a href="#tab_dadosPessoais" onclick="buscar_dados('#tab_dadosPessoais');">
                        <i class="octicon octicon-person"></i> Meus dados pessoais
                    </a>
                </li>
                <li>
                    <a href="#tab_dadosProfissionais" onclick="buscar_dados('#tab_dadosProfissionais');">
                        <i class="octicon octicon-gist-secret"></i>  Meus dados Profissionais
                    </a>
                </li>
                <li>
                    <a href="#tab_dadosConjuge" onclick="buscar_dados('#tab_dadosConjuge');">
                        <i class="octicon octicon-heart"></i>  Meu conjuge
                    </a>
                </li>
                <li>
                    <a href="#tab_editar_dados" onclick="buscar_dados('#tab_editar_dados');">
                        <i class="octicon octicon-pencil"></i> Editar meus dados
                    </a>
                </li>
                <li>
                    <a href="#tab_impressaoFicha" onclick="buscar_dados('#tab_impressaoFicha');">
                        <i class="octicon octicon-file-text"></i> Imprimir ficha
                    </a>
                </li>
            </ul>
            <!--*************************************************************-->


            <!-- Div onde será inserida os conteúdos das abas -->
            <div class="tab-content">

                <!-- contém os dados pessoais -->
                <div class="tab-pane active form-horizontal" id="tab_dadosPessoais"></div>
                <!--*********************************************************-->

                <!-- Contém os dados profissionais -->
                <div class="tab-pane form-horizontal" id="tab_dadosProfissionais"></div>
                <!--*********************************************************-->

                <!-- Contém os dados do conjuge -->
                <div class="tab-pane form-horizontal" id="tab_dadosConjuge"></div>
                <!--*********************************************************-->

                <!-- Contém os dados para edição -->
                <div class="tab-pane" id="tab_editar_dados"></div>
                <!--*********************************************************-->

                <!-- Contém o painel para impressão da ficha -->
                <div class="tab-pane" id="tab_impressaoFicha"></div>
                <!--*********************************************************-->
            </div>
            <!--*************************************************************-->


        </div>
        <!--*****************************************************************-->

    </div>
</div>
<script type="text/javascript">
    /** Início do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe 'selected ao menu correspondente' **/
        $('#menu-meusDados').addClass('selected');

        /** Realiza a inicialização das abas **/
        $('#abas li a').click(function(e) {
            e.preventDefault();

            $(this).tab('show');
        });


        /** Chama a função que busca os dados **/
        buscar_dados();
    });

    /**
     * buscar_dados()
     * 
     * @abstract    Função desenvolvida para realizar a busca dos dados
     * @param       {string} href   Contém a div que receberá os dados
     * @param       {string} url    Contém a url da função que será que buscará os dados
     */
    function buscar_dados(href)
    {
        url = '';

        if (href === '#tab_dadosPessoais')
        {
            href = $('#tab_dadosPessoais');
            url = '<?php echo app_baseurl().'painel/meus_dados/dados_pessoais' ?>';

            document.title = 'Dados Pessoais';
        }
        else if (href === '#tab_dadosProfissionais')
        {
            href = $('#tab_dadosProfissionais');
            url = '<?php echo app_baseurl().'painel/meus_dados/dados_profissionais' ?>';

            document.title = 'Dados Profissionais';
        }
        else if (href === '#tab_dadosConjuge')
        {
            href = $('#tab_dadosConjuge');
            url = '<?php echo app_baseurl().'painel/meus_dados/dados_conjuge' ?>';

            document.title = 'Dados do Conjuge';
        }
        else if (href === '#tab_editar_dados')
        {
            href = $('#tab_editar_dados');
            url = '<?php echo app_baseurl().'painel/nova_solicitacao/formulario_edicao' ?>';

            document.title = 'Edição de dados';
        }
        else if (href === '#tab_impressaoFicha')
        {
            href = $('#tab_impressaoFicha');
            url = '<?php echo app_baseurl().'painel/impressao_ficha' ?>';

            document.title = 'Impressão de fichas';
        }
        else
        {
            href = $('#tab_dadosPessoais');
            url = '<?php echo app_baseurl().'painel/meus_dados/dados_pessoais' ?>';
        }

        href.html('<h4><i class="fa fa-cog fa-spin"></i> Realizando busca</h4>');
        $.get(url, function(e) {
            href.html(e);
        });
    }
</script>