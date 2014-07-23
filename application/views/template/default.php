<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo $titulo ?></title>

        <link rel="stylesheet" type="text/css" href="./css/github-bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./css/github-styleguide.css">
        <link rel="stylesheet" type="text/css" href="./css/github-styles.css">

        <link rel="stylesheet" type="text/css" href="./css/SmartAdmin/notifications.css">
        <link rel="stylesheet" type="text/css" href="./css/SmartAdmin/animated.css">

        <link rel="stylesheet" type="text/css" href="./css/pentaurea.css">
        <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./js/pace_loader/css/flash.css">

        <script type="text/javascript" src="./js/jquery.js"></script>
    </head>
    <body class="logged_out env-production windows signin">
        <div class="doc-loader"></div>
        <div class="wrapper">

            <!-- Topbar -->
            <div class="header header-logged-out">
                <div class="container clearfix">

                    <img class="logo" src="./img/logo.gif" alt="Clube Campestre Pentaurea">

                    <div class="header-actions">
                        <a class="button primary" href="<?php echo app_baseurl().'novo_usuario' ?>">Quero me cadastrar</a>
                        <a class="button signin" href="<?php echo app_baseurl().'login' ?>">Fazer Login</a>
                        <a class="button signin" href="<?php echo app_baseurl().'LoginAdministrativo'?>">Área Administrativa</a>
                    </div>
                </div>
            </div>
            <!--*************************************************************-->

            <!-- Corpo do Site -->
            <div class="site clearfix">
                <div id="site-container" class="context-loader-container" data-pjax-container="">

                    <!-- Links de Navegação -->
                    <div class="pagehead">
                        <div class="container">
                            <nav class="pagehead-nav">
                                <a id="navigation_inicio" href="<?php echo app_baseurl().'inicio' ?>" class="js-selected-navigation-item pagehead-nav-item">
                                    <i class="octicon octicon-home"></i> Início
                                </a>
                                <a id="navigation-inscricao" href="<?php echo app_baseurl().'novo_usuario' ?>" class="js-selected-navigation-item pagehead-nav-item">
                                    <i class="octicon octicon-repo"></i> Fazer Inscrição
                                </a>
                            </nav>
                            <h1><a href="#">Formulário de Cadastro</a></h1>
                        </div>
                    </div>
                    <!--*****************************************************-->

                    <!-- Chamada das visões -->
                    <?php $this->load->view('paginas/'.$view); ?>
                    <!--*****************************************************-->

                </div>
            </div>
            <!--*************************************************************-->

        </div>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/SmartNotification.min.js"></script>
        <script type="text/javascript" src="./js/smart-wizard/js/jquery.smartWizard-2.0.js"></script>
        <script type="text/javascript" src="./js/mask/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="./js/app.js"></script>
        <script type="text/javascript" src="./js/pace_loader/js/pace.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                /** Esconde o elemento carregando **/
                $(window).load(function() {
                    $('.doc-loader').fadeOut('slow');
                });
            });
        </script>
        <!--*****************************************************************-->
    </body>
</html>