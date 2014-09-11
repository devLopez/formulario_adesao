<link href="./css/bootstrap.css" rel="stylesheet">

<script type="text/javascript" src="./js/validacao/valida_cpf.js"></script>
<script type="text/javascript">
    /** Inicialização do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe active ao menu correspondente **/
        $('#navigation-inscricao').addClass('selected');

        /** Verifica se o campo de nome possui **/
        $('#nome_proponente').blur(function() {
            if ($('#nome_proponente').val().length < 4)
            {
                $('#resposta_nome').html('<span class="error"><i class="octicon octicon-stop"></i> Nome inválido</span>');
                $('#nome_proponente').val('').focus();
            }
            else
            {
                $('#resposta_nome').html('<span class="success"><i class="octicon octicon-check"></i> Nome válido</span>');
            }

        });

        /** Função desenvolvida para verificar a a senha foi digitada **/
        $('#senha_proponente').blur(function() {
            if ($('#senha_proponente').val().length == 0)
            {
                $('#senha_tamanho').html('<span class="error"><i class="octicon octicon-stop"></i> É necessário digitar uma senha</span>');
                $('#senha_proponente').val('').focus();
            }
            else
            {
                $('#senha_tamanho').html('<span class="success"><i class="octicon octicon-check"></i> Senha Ok</span>');
            }
        });


        /** Adicionando a máscara ao campo CPF **/
        $('#cpf_proponente').mask("99999999999", {placeholder: "*"});

        /**
         * verifica se o cpf digitado é válido. se sim, verifica se há algum 
         * cadadstrado 
         **/
        $('#cpf_proponente').blur(function() {
            retorno = validarCPF($('#cpf_proponente').val());

            if (retorno == true)
            {
                $.post('<?php echo app_baseurl().'novo_usuario/verifica_cpf' ?>', {cpf: $('#cpf_proponente').val()}, function(e) {
                    if (e == 0)
                    {
                        $('#resposta_cpf').html('<span class="success"><i class="octicon octicon-check"></i> CPF liberado</span>');
                        $('#submit').removeClass('disabled');
                    }
                    else
                    {
                        $('#resposta_cpf').html('<span class="error"><i class="octicon octicon-stop"></i> Já existe um CPF cadastrado. Talvez você queira <a href="<?php echo app_baseurl().'inicio' ?>">fazer login</a> ou <a href="<?php echo app_baseurl().'alterar_senha'?>">alterar sua senha</a>?</span>');
                        $('#submit').addClass('disabled').click(function(e) {
                            e.preventDefault();
                        });
                    }
                });
            }
            else
            {
                $('#resposta_cpf').html('<span class="error"><i class="octicon octicon-stop"></i> Favor inserir um cpf válido</span>');
                $('#cpf_proponente').val('').focus();
            }

        });

        /** Função que verifica se as duas senhas foram digitadas iguais **/
        $('#repita_senha').on('keyup', function() {
            if ($('#repita_senha').val() !== $('#senha_proponente').val())
            {
                $('#resposta_senha').html('<span class="error"><i class="octicon octicon-stop"></i> As senhas não conferem</span>');
            }
            else
            {
                $('#resposta_senha').html('<span class="success"><i class="octicon octicon-check"></i> As senhas conferem</span>');
            }
        });

        /** Função desenvolvida para salvar os dados do usuário **/
        $('#adiciona_usuario').submit(function(e) {
            e.preventDefault();

            $('#submit').button('loading');
            
            $.ajax({
                url: '<?php echo app_baseurl().'novo_usuario/salvar_usuario' ?>',
                type: 'POST',
                data: {
                    nome_proponente: $('#nome_proponente').val(),
                    cpf_proponente: $('#cpf_proponente').val(),
                    senha_proponente: $('#senha_proponente').val()
                },
                dataType: 'html',
                success: function(sucesso)
                {
                    if (sucesso == 1)
                    {
                        contagem_regressiva();
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Sucesso",
                            content: "<strong>Usuário salvo com sucesso.</strong><br><p id='tempo'></p>",
                            iconSmall: "fa fa-thumbs-up bounce animated",
                            color: "#3b5998",
                            timeout: 5000
                        });
                        $('#adiciona_usuario').find('input').val('');
                        $('#submit').button('complete');
                    }
                    else
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Erro",
                            content: "<strong>Não foi possível salvar os dados</strong>",
                            iconSmall: "fa fa-thumbs-up bounce animated",
                            color: "#FE1A00",
                            timeout: 5000
                        });
                        $('#submit').button('reset');
                    }
                },
                error: function()
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Ocorreu um erro. Tente novamente</strong>",
                        iconSmall: "fa fa-thumbs-up bounce animated",
                        color: "#FE1A00",
                        timeout: 5000
                    });
                    $('#submit').button('reset');
                }
            });
        });
    });

    /**
     * Função desenvolvida para mostrar um contador 
     */
    var tempo = new Number();
    tempo = 3;

    function contagem_regressiva()
    {
        if ((tempo - 1) >= 0)
        {
            var seg = tempo % 60;
            if (seg <= 9)
            {
                seg = "0" + seg;
            }
            $("#tempo").text('Redirecionando em ' + seg);
            setTimeout('contagem_regressiva()', 1000);
            tempo--;
        }
        else
        {
            location.href = '<?php echo app_baseurl().'painel/painel' ?>';
            tempo = 5;
        }
    }

</script>

<div class="container">
    <form id="adiciona_usuario">
        <fieldset>
            <label><strong>Nome completo:</strong></label>
            <input class="span5" type="text" id="nome_proponente" autofocus="">
            <span class="help-inline" id="resposta_nome"></span>

            <label><strong>CPF <small>(somente números)</small>:</strong></label>
            <input class="span5" type="text" id="cpf_proponente">
            <span class="help-inline" id="resposta_cpf"></span>

            <label><strong>Senha de acesso:</strong></label>
            <input class="span5" type="password" id="senha_proponente" required>
            <span class="help-inline" id="senha_tamanho"></span>

            <label><strong>Repita a senha:</strong></label>
            <input class="span5" type="password" id="repita_senha" required>
            <span class="help-inline" id="resposta_senha"></span>

            <br>
            <button id="submit" class="button primary" type="submit" data-loading-text="Criando Usuário..." data-complete-text="Acessando o Sistema...">Salvar e prosseguir</button>
        </fieldset>
    </form>
</div>
<!--*************************************************************************-->