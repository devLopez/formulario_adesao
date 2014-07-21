<script type="text/javascript">
    /** Início do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe 'active' ao menu correspondente **/
        $('#menu-dependentes').addClass('selected').click(function(e) {
            e.preventDefault();
        });

        /** Chama a funçao que busca os dependentes **/
        buscar();

        /** Chama a função que busca os graus de parentesco **/
        busca_parentesco();

        /** Limpa os campos do formulário ao fechar o modal **/
        $('#fechar').click(function() {
            limpar_capos();
        });

        /** Adiciona uma máscara ao campo de data **/
        $('#data_nascimento_dependente, #ed_data_nascimento_dependente').mask('99/99/9999', {placeholder: '*'});

        /** Transfere os dados via ajax para salvar **/
        $('#cad_dependente').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo app_baseurl().'painel/dependentes/salvar_dependente' ?>',
                type: 'POST',
                data: {nome_dependente: $('#nome_dependente').val(), parentesco_dependente: $('#parentesco_dependente').val(), data_nascimento_dependente: $('#data_nascimento_dependente').val(), estado_civil_dependente: $('#estado_civil_dependente').val()},
                dataType: "html",
                success: function(sucesso)
                {
                    if (sucesso == 1)
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Sucesso",
                            content: "<strong>Dependente cadastrado</strong>",
                            iconSmall: "fa fa-thumbs-up bounce animated",
                            color: "#3b5998",
                            timeout: 5000
                        });
                        $('#cadastrar_dependente').modal('hide');
                        limpar_capos();
                        buscar();
                    }
                    else
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Erro",
                            content: "<strong>Não foi possível salvar os dados. Tente novamente</strong>",
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

    /** Função que buscar os parentescos **/
    function busca_parentesco()
    {
        $.get('<?php echo app_baseurl().'painel/dependentes/busca_parentesco' ?>', function(e) {
            $('#parentesco_dependente, #ed_parentesco_dependente').html(e);
        });
    }

    /** Função desenvolvida para limpar os campos do formlário **/
    function limpar_capos()
    {
        $('#cad_dependente, #atualiza_dependente').find('input, select').val('');
    }

    /** Função desenvolvida para buscar os dependentes cadastrados **/
    function buscar()
    {
        $('#dependentes_cadastrados').html('<h4><i class="fa fa-cog fa-spin"></i> Buscando...</h4>');

        $.get('<?php echo app_baseurl().'painel/dependentes/buscar_dependentes' ?>', function(e) {
            $('#dependentes_cadastrados').html(e);
        });
    }
</script>

<div class="container">
    <!-- Topo da página -->
    <div class="row tryNowTeaser">
        <div class="span9">
            <h2>
                <i class="fa fa-users"></i> Meus dependentes
            </h2>
        </div>
        <div class="span3">
            <a class="pull-right btn danger" href="#cadastrar_dependente" data-toggle="modal">
                <i class="fa fa-child"></i> Cadastrar dependente
            </a>
        </div>
    </div>
    <!--*************************************************************************-->

    <div class="row">
        <div class="span12" id="dependentes_cadastrados"></div>
    </div>
                 
    <!-- Modal que contém o formulário de cadastro de dependentes -->
    <form id="cad_dependente">
        <div id="cadastrar_dependente" class="modal hide fade" data-backdrop="false" data-keyboard="false">
            <div class="modal-header">
                <h3>Cadastro de dependentes</h3>
            </div>
            <div class="modal-body">

                <div class="control-group">
                    <label>Nome do dependente</label>
                    <div class="controls">
                        <input class="span5" type="text" id="nome_dependente" autofocus>
                    </div>
                </div>

                <div class="control-group">
                    <label>Grau de parentesco</label>
                    <div class="controls">
                        <select class="span5" id="parentesco_dependente" required=""></select>
                    </div>
                </div>

                <div class="control-group">
                    <label>Data de nascimento</label>
                    <div class="controls">
                        <input class="span5" type="text" id="data_nascimento_dependente" required="">
                    </div>
                </div>

                <div class="control-group">
                    <label>Estado civil</label>
                    <div class="controls">
                        <select class="span5" id="estado_civil_dependente" required="">
                            <option value="">Selecione uma opção</option>
                            <option value="Casado">Casado</option>
                            <option value="Solteiro">Solteiro</option>
                            <option value="Viúvo">Viúvo</option>
                            <option value="Desquitado ou divorciado">Desquitado ou divorciado</option>
                            <option value="Marital">Marital</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button id="fechar" type="reset" class="btn danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn primary">Salvar dependente</button>
            </div>
        </div>
    </form>
    <!--*************************************************************************-->
</div>