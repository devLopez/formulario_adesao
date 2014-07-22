<script type="text/javascript">
    /** Início do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe 'selected' ao menu selecionado **/
        $('#menu-propostas').addClass('selected');

        /** 
         * Função que funciona como um helper, ajudando o bom funcionamento da
         * paginação. Previne contra a ação padrão e carrega os dados via load
         **/
        $(document).on("click", ".pagination li a", function(e) {
            e.preventDefault();
            var href = $(this).attr("href");
            $('#propostas_cadastradas').load(href).fadeIn('slow');
        });

        /** Chamada da função buscar_propostas **/
        buscar_propostas();
    });

    /**
     * buscar_propostas()
     * 
     * Função desenvolvida para buscar as propostas de cota cadastradas
     * 
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    function buscar_propostas()
    {
        $('#propostas_cadastradas').html('<h4><i class="fa fa-cog fa-spin"></i> Buscando...</h4>');

        $.get('<?php echo app_baseurl() . 'administrativo/propostas/buscar_propostas' ?>', function(e) {
            $('#propostas_cadastradas').html(e);
        });
    }
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