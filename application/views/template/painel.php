<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo ?></title>
		<link rel="icon" type="image/png" href="./icon/icon.png" />
        <link rel="stylesheet" type="text/css" href="./css/github-bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./css/github-styles.css">

        <link rel="stylesheet" type="text/css" href="./css/SmartAdmin/animated.css">
        <link rel="stylesheet" type="text/css" href="./css/SmartAdmin/notifications.css">

        <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./css/botao.css">
        <link rel="stylesheet" type="text/css" href="./css/pentaurea.css">
        <link rel="stylesheet" type="text/css" href="./js/pace_loader/css/flash.css">

        <script type="text/javascript" src="./js/jquery.js"></script>
    </head>
    <body class="logged_in env-production windows page-dashboard">
        <div class="doc-loader"></div>
        <div class="carregando"></div>
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
                                <a id="menu-observacoes" href="<?php echo app_baseurl().'painel/observacoes'?>" class="pagehead-nav-item">
                                    <span class="octicon octicon-comment"></span> Observações
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
        <script type="text/javascript" src="./js/app.js"></script>
        <script type="text/javascript" src="./js/pace_loader/js/pace.min.js"></script>
    </body>
</html>