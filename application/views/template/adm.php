<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo ?></title>

        <!-- Scripts e JQuery -->
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
        <!-- Div onde é mostrado o relojinho -->
        <div class="doc-loader"></div>
        <!--*****************************************************************-->

        <div class="wrapper">

            <!-- Topbar -->
            <div class="header header-logged-in true">
                <div class="container clearfix">
                    <ul id="user-links">
                        <li>
                            <a href="#" class="name">
                                Olá <span id="nome_usuario">
                                    <?php echo $_SESSION['admin']['nome'] ?>
                                </span>
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

            <!-- Conteúdo -->
            <div id="start-of-content" class="accessibility-aid"></div>
            <div class="site clearfix">
                <div id="site-container" class="context-loader-container">
                    <!-- Links do sistema -->
                    <div class="pagehead">
                        <div class="container">
                            <nav class="pagehead-nav">
                                <a id="menu-painel" href="<?php echo app_baseurl() . 'administrativo/painel' ?>" class="js-selected-navigation-item pagehead-nav-item">
                                    <span class="octicon octicon-dashboard"></span> Painel administrativo
                                </a>
                                <a id="menu-propostas" href="<?php echo app_baseurl().'administrativo/propostas'?>" class="js-selected-navigation-item pagehead-nav-item">
                                    <span class="octicon octicon-repo"></span> Propostas cadastradas
                                </a>
                                <a id="menu-mensagens" href="<?php echo app_baseurl() . 'administrativo/mensagens' ?>" class="pagehead-nav-item">
                                    <span class="octicon octicon-mail"></span> Mensagens
                                </a>
                            </nav>
                            <h1>
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> Painel Administrativo
                                </a>
                            </h1>
                        </div>
                    </div>
                    <!--*****************************************************-->

                    <!-- Chamada das visões -->
                    <div class="container">
                        <?php $this->load->view('paginas/' . $view); ?>
                    </div>
                    <!--*****************************************************-->

                </div>
            </div>
            <!--*************************************************************-->
        </div>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/SmartNotification.min.js"></script>
        <script type="text/javascript" src="./js/template.js"></script>
        <script type="text/javascript" src="./js/pace_loader/js/pace.min.js"></script>
    </body>
</html>