<script type="text/javascript">
    /** Inicio do Jquery **/
    $(document).ready(function() {
        
        /** Chama a função que buscará as referencias cadastradas **/
        buscar_referencias();

        /** Adiciona a classe selected ao menu correspondente **/
        $('#menu-referencias').addClass('selected');

        /** Adiciona a máscara ao campo de telefone da referência **/
        $('#telefone_referencia').mask('(99)9999-9999', {placeholder: '*'});

        /** Salva os dados da referencia via ajax **/
        $('#cad_referencia').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo app_baseurl() . 'painel/referencias/salvar' ?>',
                type: 'POST',
                data: {
                    nome_referencia: $('#nome_referencia').val(),
                    endereco_referencia: $('#endereco_referencia').val(),
                    telefone_referencia: $('#telefone_referencia').val()
                },
                dataType: 'html',
                success: function(sucesso)
                {
                    if (sucesso == 1)
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Sucesso",
                            content: "<strong>Referência cadastrado</strong>",
                            iconSmall: "fa fa-thumbs-up bounce animated",
                            color: "#3b5998",
                            timeout: 5000
                        });
                        limpar_campos();
                        $('#cadastrar_referencia').modal('hide');
                        buscar_referencias();
                    }
                    else
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Erro",
                            content: "<strong>Ocorreu um erro. Tente novamente</strong>",
                            iconSmall: "fa fa-thumbs-down bounce animated",
                            color: "#FE1A00",
                            timeout: 5000
                        });
                    }
                },
                error: function()
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Ocorreu um erro. Tente novamente</strong>",
                        iconSmall: "fa fa-thumbs-down bounce animated",
                        color: "#FE1A00",
                        timeout: 5000
                    });
                }
            });
        });
    });

    /**
     * buscar_referencias()
     * 
     * @autor       Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Função desenvolvida para buscar as referencias pessoais do usuário
     */
    function buscar_referencias()
    {
        $('#referencias_cadastradas').html('<h4><i class="fa fa-cog fa-spin"></i> Realizando busca</h4>');
        
        $.get('<?php echo app_baseurl().'painel/referencias/buscar_referencias'?>', function(e){
            $('#referencias_cadastradas').html(e);
        });
    }

    /**
     * limpar_campos()
     * 
     * @autor       Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Função desenvolvida para limpar os campos do formulário de inclusão
     *              de referências
     */
    function limpar_campos()
    {
        $('#cad_referencia').find('input').val('');
    }
</script>

<div class="container">
    <!-- Topo da página -->
    <div class="row">
        <div class="span9">
            <h2>Referências pessoais e bancárias</h2>
        </div>
        <div class="span3">
            <a class="btn danger pull-right" href="#cadastrar_referencia" data-toggle="modal">
                <i class="fa fa-plus"></i> Nova referência
            </a>
        </div>
    </div>
    <!--*********************************************************************-->

    <!-- Div que receberá os dados de referencias cadastradas via ajax -->
    <div class="row">
        <div class="span12">
            <div id="referencias_cadastradas"></div>
        </div>
    </div>
    <!--*********************************************************************-->

    <!-- Modal que está o formulário para o cadastro -->
    <form id="cad_referencia">
        <div id="cadastrar_referencia" class="modal hide fade" data-backdrop="false" data-keyboard="true">
            <div class="modal-header">
                <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
                <h4 class='pull-right'>Cadastro de Referência</h4>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label><strong>Nome:</strong></label>
                    <div class="controls">
                        <input type="text" id="nome_referencia" required="" autofocus="" class="span5">
                    </div>
                </div>
                <div class="control-group">
                    <label><strong>Endereço:</strong></label>
                    <div class="controls">
                        <textarea id="endereco_referencia" required="" class="span5" rows="4" maxlength="250"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label><strong>Telefone:</strong></label>
                    <div class="controls">
                        <input type="text" id="telefone_referencia" required="" class="span5">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn danger" data-dismiss="modal" onclick="limpar_campos()">Cancelar</button>
                <button type="submit" class="btn primary">Salvar referência</button>
            </div>
        </div>
    </form>
    <!--*********************************************************************-->
</div>