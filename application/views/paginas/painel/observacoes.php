<script type="text/javascript">
    /** Chamada do Jquery **/
    $(document).ready(function() {

        /** Adiciona a classe 'ative' e previne contra o clique **/
        $('#menu-observacoes').addClass('selected').click(function(e) {
            e.preventDefault();
        });
        
        url = '<?php echo app_baseurl().'painel/observacoes/observacoes_cadastradas'?>';
        container = $('#observacoes-cadastradas');
        
        load_ajax(url, container);
    });
    //**************************************************************************
</script>

<div class="container">
    <!-- Header da página -->
    <div class="row">
        <div class="span12">
            <h2><i class="fa fa-comments"></i> Minhas observações</h2>
        </div>
    </div>
    <!--*********************************************************************-->

    <!-- Div que contém o corpo da mensagem -->
    <div class="row">
        <!-- Div onde as observações serão inseridas -->
        <div class="span12" id="observacoes-cadastradas"></div>
        <!--*****************************************************************-->
    </div>
    <!--*********************************************************************-->
</div>