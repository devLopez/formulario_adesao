<script type="text/javascript">
    /** Início do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe 'selected' ao menu selecionado **/
        $('#menu-propostas').addClass('selected');
        
        /**
         * Define a url da função PHP que faz a busca dos resultados
         */
        var url = '<?php echo app_baseurl() . 'administrativo/propostas/buscar_propostas' ?>';

        /** 
         * Função que funciona como um helper, ajudando o bom funcionamento da
         * paginação. Previne contra a ação padrão e carrega os dados via load
         **/
        $(document).on("click", ".pagination li a", function(e) {
            e.preventDefault();
            url = $(this).attr("href");
            
            load_ajax(url, $('#propostas_cadastradas'));
        });

        /** Chamada da função buscar_propostas **/
        load_ajax(url, $('#propostas_cadastradas'));
    });
</script>
<!-- Cabeçalho da página -->
<div class="row">
    <div class="span12">
        <h3>Todas as propostas cadastradas</h3>
    </div>
</div>
<!--*************************************************************************-->

<!-- Div onde serão apresentados todas as propostas cadastradas -->
<div class="row">
    <div class="span12" id="propostas_cadastradas"></div>
</div>
<!--*************************************************************************-->