<div class="container">
    <div class="row">


        <!-- Div que contem o menu -->
        <div class="span3">
            <ul class="menu accordion js-settings-pjax">
                <li class="section">
                    <a href="#" class="section-head">                            
                        <?php echo $_SESSION['usuario']['nome_proponente'] ?>
                    </a>
                </li>
            </ul>
        </div>
        <!--*****************************************************************-->

        <!-- Div que contém os dados pessoais -->
        <div class="span9">
            <div class="boxed-group">
                <h3><i class="octicon octicon-clippy"></i> Meus dados</h3>
                <div class="boxed-group-inner markdown-body corpo_perfil">
                    <!-- Exibe o Loader -->
                    <div class="loader"></div>
                    
                    <!-- Div que Exibirá os dados via AJAX -->
                    <div id="dados_usuario"></div>
                    <!--*****************************************************-->
                </div>
            </div>
        </div>
        <!--*****************************************************************-->

    </div>
</div>
<script type="text/javascript">
    /** Início do Jquery **/
    $(document).ready(function(){
        
        /** Chamada da função que realiza a busca dos dados **/
        buscar_dados();
    });
    
    /**
     * buscar_dados()
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Função desenvolvida para buscar os dados pessoais
     */
    function buscar_dados()
    {
        $.get('<?php echo app_baseurl().'painel/usuario/buscar_dados'?>', function(e){
            /** Esconde o loader **/
            //$('.loader').fadeOut('slow');
            
            /** Lança a response na DIV **/
            $('#dados_usuario').html(e);
        });
    }
</script>