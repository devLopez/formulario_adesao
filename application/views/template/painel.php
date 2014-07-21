<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo ?></title>

        <link rel="stylesheet" type="text/css" href="./css/github-bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./css/github-styles.css">

        <link rel="stylesheet" type="text/css" href="./css/SmartAdmin/animated.css">
        <link rel="stylesheet" type="text/css" href="./css/SmartAdmin/notifications.css">

        <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./css/botao.css">
        <link rel="stylesheet" type="text/css" href="./css/pentaurea.css">

        <script type="text/javascript" src="./js/jquery.js"></script>
    </head>
    <body class="logged_in env-production windows page-dashboard">
        <div class="doc-loader"></div>
        <div class="wrapper">

            <!-- Topbar -->
            <div class="header header-logged-in true">
                <div class="container clearfix">


                    <ul id="user-links">
                        <li>
                            <a href="#" class="name">
                                Olá <span id="nome_usuario">
                                    <?php echo $_SESSION['usuario']['nome_proponente'] ?>
                                </span>
                            </a>
                        </li>


                        <li>
                            <a href="<?php echo app_baseurl() . 'painel/usuario' ?>" id="account_settings" class="tooltipped tooltipped-s" aria-label="Minha conta">
                                <span class="octicon octicon-tools"></span>
                            </a>
                        </li>
                        <li>
                            <form class="logout-form" action="<?php echo app_baseurl() . 'login/logout' ?>" method="post">
                                <button class="sign-out-button tooltipped tooltipped-s" aria-label="Fazer Logoff">
                                    <span class="octicon octicon-sign-out"></span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!--*************************************************************-->

            <!-- Inicio do conteúdo -->
            <div id="start-of-content" class="accessibility-aid"></div>
            <div class="site clearfix">
                <div id="site-container" class="context-loader-container" data-pjax-container="">

                    <!-- Links do sistema -->
                    <div class="pagehead">
                        <div class="container">
                            <nav class="pagehead-nav">
                                <a id="menu-painel" href="<?php echo app_baseurl() . 'painel/painel' ?>" class="js-selected-navigation-item pagehead-nav-item">
                                    <span class="octicon octicon-dashboard"></span> Painel
                                </a>
                                <?php
                                    if ($protocolo != "")
                                    {
                                        ?>
                                        <a id="menu-dependentes" href="<?php echo app_baseurl() . 'painel/dependentes' ?>" class="js-selected-navigation-item pagehead-nav-item">
                                            <span class="octicon octicon-organization"></span> Meus Dependentes
                                        </a>
                                        <a id="menu-referencias" href="<?php echo app_baseurl() . 'painel/referencias' ?>" class="js-selected-navigation-item pagehead-nav-item">
                                            <span class="octicon octicon-megaphone"></span> Referências pessoais
                                        </a>
                                        </a>
                                        <a id="menu-meusDados" href="<?php echo app_baseurl() . 'painel/meus_dados' ?>" class="pagehead-nav-item">
                                            <i class="octicon octicon-tag"></i> Meus dados
                                        </a>
                                        <?php
                                    } else
                                    {
                                        ?>
                                        <a id="menu-solicitacoes" href="<?php echo app_baseurl() . 'painel/nova_solicitacao' ?>" class="pagehead-nav-item">
                                            <span class="octicon octicon-repo"></span> Nova Solicitação
                                        </a>
                                        <?php
                                    }
                                ?>
                                <a id="menu-mensagens" href="<?php echo app_baseurl() . 'painel/mensagens' ?>" class="pagehead-nav-item">
                                    <span class="octicon octicon-mail"></span> Mensagens
                                </a>
                            </nav>
                            <h1><a href="#">Painel do usuário</a></h1>
                        </div>
                    </div>
                    <!--*****************************************************-->

                    <!-- Chamada das visões -->
                    <?php $this->load->view('paginas/' . $view); ?>
                    <!--*****************************************************-->

                </div>
            </div>
        </div>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/SmartNotification.min.js"></script>
        <script type="text/javascript" src="./js/mask/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="./js/mask_money/monetario.js"></script>
        <script type="text/javascript" src="./js/smart-wizard/js/jquery.smartWizard-2.0.js"></script>
        <script type="text/javascript" src="./js/blockUi/blockUI.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {

                    /** Esconde o elemento carregando **/
                    $(window).load(function() {
                        $('.doc-loader').fadeOut('slow');
                    });

                    /** Bloco referente aos tooltips e popovers no corpo do site **/
                    $('body').tooltip({selector: '[rel="tooltip"]'});

                    /** Inicializa o BlockUI, mostrando uma mensagem nas requisições Ajax **/
                    $(document).ajaxStart(function() {
                        /*$.blockUI({css: {
                         border: 'none',
                         padding: '15px',
                         backgroundColor: '#000',
                         'border-radius': '10px',
                         '-webkit-border-radius': '10px',
                         '-moz-border-radius': '10px',
                         opacity: .5,
                         color: '#fff'
                         },
                         message: 'Processando Pedido...'
                         });*/
                        $('.loader').fadeIn('fast');
                    });

                    /** Destroi o BlockUI no término das requisições Ajax **/
                    $(document).ajaxComplete(function() {
                        //$.unblockUI();
                        $('.loader').fadeOut('fast');
                    });

                    /** Verificação se o usuário deseja realmente fazer o logoff **/
                    $('.logout-form').submit(function(e) {
                        e.preventDefault();

                        var url = $(this).attr('action');
                        var nome = $('#nome_usuario').text();

                        $.SmartMessageBox({
                            title: '<i class="fa fa-fw fa-sign-out"></i> Você deseja sair' + nome,
                            content: 'Você pode melhorar a segurança fechando esta aba após o logoff',
                            buttons: '[Sair][Não quero sair ainda]'
                        }, function(botao) {
                            if (botao == 'Sair')
                            {
                                setTimeout(logout(url), 1000);
                            }
                            else
                            {
                                return false;
                            }
                        });
                    });
                });

                /** Função que realiza o logoff **/
                function logout(url)
                {
                    location.href = url;
                }
        </script>
    </body>
</html>