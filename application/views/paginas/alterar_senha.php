<script type="text/javascript">
    /** Inicialização do Jquery **/
    $(document).ready(function() {
        /** Adiciona uma máscara para campo cpf **/
        $('#cpf_proponente').mask('99999999999', {placeholder: '*'});

        /** Verifica o CPF via Ajax **/
        $('#recupera_p1').submit(function(e) {
            e.preventDefault();

            $('#btn-buscar').button('loading');

            cpf 	= $('#cpf_proponente').val();
            nivel	= $('#nivel').val();

            $.post('<?php echo app_baseurl().'alterar_senha/verifica_cpf' ?>', {cpf: cpf, nivel: nivel}).done(function(sucesso) {
                if (sucesso == 1)
                {
                    $('#recupera_p1').hide();
                    $('#form_novaSenha').show('fade');
                    $('#nova_senha').focus();
                    $('#btn-buscar').button('reset');
                }
                else
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Não encontrei o seu cpf. Tente novamente</strong>",
                        iconSmall: "fa fa-thumbs-down bounce animated",
                        color: "#FE1A00",
                        timeout: 5000
                    });
                    
                    $('#cpf_proponente').val("").focus();
                    $('#btn-buscar').button('reset');
                }
            });
        });

        /** Verifica se as duas senhas foram digitadas corretamente **/
        $('#repetir_novaSenha').on('keyup', function() {
            if ($('#repetir_novaSenha').val() !== $('#nova_senha').val())
            {
                $('#resposta_senha').html('<span class="error"><i class="octicon octicon-stop"></i> As senhas não conferem</span><br><br>');
            }
            else
            {
                $('#resposta_senha').html('<span class="success"><i class="octicon octicon-check"></i> As senhas conferem</span><br><br>');
            }
        });

        /** Realiza a atualização da nova senha **/
        $('#form_novaSenha').submit(function(e) {
            e.preventDefault();

            $('#btn-salvar').button('loading');

            senha 	= $('#nova_senha').val();
            cpf 	= $('#cpf_proponente').val();
            nivel	= $('#nivel').val();

            $.ajax({
                url: '<?php echo app_baseurl().'alterar_senha/alterar' ?>',
                type: 'POST',
                data: {senha: senha, cpf: cpf, nivel: nivel},
                success: function(sucesso)
                {
                    if (sucesso == 0)
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Erro",
                            content: "<strong>Não foi possível alterar a sua senha. Tente novamente</strong>",
                            iconSmall: "fa fa-thumbs-down bounce animated",
                            color: "#FE1A00",
                            timeout: 5000
                        });

                        $('#btn-salvar').button('reset');
                    }
                    if (sucesso == 1)
                    {
                        $.SmartMessageBox({
                            title: "<i class='fa fa-check'></i> Senha alterada",
                            content: "<strong>A sua senha foi alterada com sucesso</strong>",
                            buttons: '[Ok]'
                        }, function(e) {
                            if (e === 'Ok')
                            {
                                if(nivel == 'admin')
                                {
                                    location.href = '<?php echo app_baseurl().'LoginAdministrativo'?>';
                                }
                                else
                                {
                                    location.href = '<?php echo app_baseurl().'painel/painel'; ?>'
                                }
                            }
                            else
                            {
                                return false;
                            }
                        });

                        $('#btn-salvar').button('reset');
                    }
                },
                error: function()
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Não foi possível alterar a sua senha. Tente novamente</strong>",
                        iconSmall: "fa fa-thumbs-down bounce animated",
                        color: "#FE1A00",
                        timeout: 5000
                    });

                    $('#btn-salvar').button('reset');
                }
            });
        });
    });
</script>

<!-- Campo hidden que receberá o valor do nível do usuário -->
<?php
	if (isset($nivel))
	{
		?>
		<input type="hidden" id="nivel" value="<?php echo $nivel?>">
		<?
	}
	else
	{
		?>
		<input type="hidden" id="nivel" value="">
		<?php
	}
?>
<!--*************************************************************************-->

<div class="auth-form">

    <div class="auth-form-header">
        <h1 style="color: white"><i class="octicon octicon-lock"></i> Alterar Minha Senha</h1>
    </div>
    <div class="auth-form-body">

        <!-- Formulário que verifica se existe cpf cadastrado -->
        <form id="recupera_p1">
            <label for="login_field">
                Digite o seu cpf
            </label>
            <input autofocus="autofocus" class="input-block" id="cpf_proponente" tabindex="1" type="text" required="">

            <input class="button" id="btn-buscar" tabindex="3" type="submit" value="Próximo passo" data-loading-text="Buscando CPF...">
        </form>
        <!--*****************************************************************-->

        <!-- Form que receberá a nova senha -->
        <form id="form_novaSenha" style="display: none">

            <label for="login_field">
                Digite a nova senha
            </label>
            <input autofocus="autofocus" class="input-block" id="nova_senha" tabindex="1" type="password" required="">

            <label for="login_field">
                Redigite a nova senha
            </label>
            <input class="input-block" id="repetir_novaSenha" tabindex="1" type="password" required="">
            <span id="resposta_senha"></span>

            <input class="button" id="btn-salvar" tabindex="3" type="submit" value="Alterar minha senha" data-loading-text="Salvando a nova senha...">

        </form>
        <!--*****************************************************************-->

    </div>
</div>