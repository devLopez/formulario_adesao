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
                        $('#resposta_cpf').html('<span class="error"><i class="octicon octicon-stop"></i> Já existe um CPF cadastrado. Talvez você queira <a href="<?php echo app_baseurl().'login' ?>">fazer login</a> ou <a href="<?php echo app_baseurl().'alterar_senha'?>">alterar sua senha</a>?</span>');
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

            formulario = $('#adiciona_usuario').serialize();
            
            $.ajax({
                url: '<?php echo app_baseurl().'novo_usuario/salvar_usuario' ?>',
                type: 'POST',
                data: formulario,
                dataType: 'html',
                success: function(sucesso)
                {
                    alert(sucesso);
                    if (sucesso == 1)
                    {
                        contagem_regressiva();
                        msg_sucesso("Usuário salvo com sucesso.</strong><br><p id='tempo'></p>");
                        limpar_campos($('#adiciona_usuario'));
                        $('#submit').button('complete');
                    }
                    else
                    {
                        msg_erro('Ocorreu um erro ao salvar. Tente novamente')
                        $('#submit').button('reset');
                    }
                },
                error: function()
                {
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
            <input class="span5" type="text" id="nome_proponente" name="nome_proponente" autofocus required>
            <span class="help-inline" id="resposta_nome"></span>

            <label><strong>CPF <small>(somente números)</small>:</strong></label>
            <input class="span5" type="text" id="cpf_proponente" name="cpf_proponente" required="">
            <span class="help-inline" id="resposta_cpf"></span>
            
            <label><strong>E-mail <small>(insira um email para que possamos entrar em contato)</small>:</strong></label>
            <input class="span5" type="email" id="email_proponente" name="email_proponente" required>

            <label><strong>Senha de acesso:</strong></label>
            <input class="span5" type="password" id="senha_proponente" name="senha_proponente" required>
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