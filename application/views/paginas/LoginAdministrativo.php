<script type="text/javascript">
    /** Início do Jquery **/
    $(document).ready(function() {

        /** Submit do form via jquery **/
        $('#login_admin').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo app_baseurl() . 'LoginAdministrativo/fazer_login' ?>',
                type: 'POST',
                data: {login: $('#login').val(), senha: $('#senha').val()},
                dataType: 'html',
                success: function(sucesso)
                {
                    console.log(sucesso);
                    if (sucesso == 0)
                    {
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Erro",
                            content: "<strong>Usuário ou senha incorretos</strong>",
                            iconSmall: "fa fa-thumbs-up bounce animated",
                            color: "#FE1A00",
                            timeout: 5000
                        });
                    }
                    else if (sucesso == 1)
                    {
                        location.href = '<?php echo app_baseurl().'administrativo/painel'; ?>';
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
                }
            });
        });
    });
</script>

<div class="auth-form">
    <form accept-charset="UTF-8" id="login_admin">
        <div class="auth-form-header">
            <h1 style="color: white"><i class="octicon octicon-lock"></i> Área administrativa - Login</h1>
        </div>
        <div class="auth-form-body">
            <label for="login_field">
                Usuário
            </label>
            <input autofocus="autofocus" class="input-block" id="login" tabindex="1" type="text">

            <label for="password">
                Senha <a href="<?php echo app_baseurl().'alterar_senha/index/admin'?>">(Esqueci minha senha)</a>
            </label>
            <input class="input-block" id="senha" name="password" tabindex="2" type="password">
            <input class="button" name="commit" tabindex="3" type="submit" value="Entrar">
        </div>
    </form>
</div>