<?php
    if(!isset($usuario))
    {
        ?>
        <div class="alert alert-block info">
            Não foi possível resgatar os seus dados
        </div>
        <?php
    }
    else
    {
        foreach($usuario as $row)
        {
            ?>
            <form id="editar_dadosUsuario">
                <div class="control-group">
                    <label><strong>Nome:</strong></label>
                    <div class="controls">
                        <input id="nome_proponente" class="span5" type="text" value="<?php echo $row->nome_proponente ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label><strong>CPF:</strong></label>
                    <div class="controls">
                        <input id="nome_proponente" class="span5" type="text" readonly="" value="<?php echo $row->cpf_proponente ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label><strong>E-mail:</strong></label>
                    <div class="controls">
                        <input id="email_proponente" class="span5" type="text" value="<?php echo $row->email_proponente ?>" required>
                    </div>
                </div>
                <div class="control-group">
                    <label><strong>Número do Protocolo:</strong></label>
                    <div class="controls">
                        <input id="nome_proponente" class="span5" type="text" readonly="" value="<?php echo $row->numero_protocolo ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label><strong>Nova Senha:</strong></label>
                    <div class="controls">
                        <input id="senha" class="span5" type="password">
                        <div class="help-inline" id="resposta_senha"></div>
                    </div>
                </div>
                <div class="control-group">
                    <label><strong>Redigite a nova senha:</strong></label>
                    <div class="controls">
                        <input id="repetir_senha" class="span5" type="password">
                        <div class="help-inline" id="resposta_repitaSenha"></div>
                    </div>
                </div>

                <footer class="form-actions">
                    <button id="salvar" type="submit" class="button blue">Salvar alterações</button>
                </footer>
            </form>
            <?php
        }
    }
?>

<script type="text/javascript">
    /** Início do Jquery **/
    $(document).ready(function() {

        /** Verifica se o usuário digitou no campo de repetir senha **/
        $('#repetir_senha').on('keyup', function() {
            if ($('#senha').val() == "")
            {
                $('#senha').focus();
                $('#resposta_senha').html('<span class="error"><i class="octicon octicon-x"></i> Voce deve digitar uma senha</span>');
                $('#repetir_senha').val('');
                $('#salvar').prop('disabled', true);
            }
            else
            {
                $('#resposta_senha').html("");
                $('#salvar').prop('disabled', false);
            }

            if ($('#repetir_senha').val() != $('#senha').val())
            {
                $('#resposta_repitaSenha').html('<span class="error"><i class="octicon octicon-x"></i> As duas senhas não correspondem</span>');
            }
            else
            {
                $('#resposta_repitaSenha').html('<span class="success"><i class="octicon octicon-check"></i> As senhas conferem</span>');
            }

        });

        /** Submit do formulário **/
        $('#editar_dadosUsuario').submit(function(e) {
            e.preventDefault();

            senha 				= $('#senha').val();
            nome_proponente 	= $('#nome_proponente').val();
            email_proponente	= $('#email_proponente').val(); 

            $.ajax({
                url: '<?php echo app_baseurl().'painel/usuario/atualizar_perfil' ?>',
                type: 'POST',
                data: {senha: senha, nome_proponente: nome_proponente, email_proponente: email_proponente},
                dataType: 'json',
                success: function(sucesso)
                {
                	sucesso.r_nome == 1 ? msg_sucesso("Nome Atualizado") : msg_erro("Não foi possível alterar seu nome. Tente novamente");
                	sucesso.r_email == 1 ? msg_sucesso("E-mail Atualizado") : msg_erro("Não foi possível alterar seu email. Tente novamente");

                	if(sucesso.r_senha != "")
                	{
                    	sucesso.r_senha == 1 ? msg_sucesso("Senha Atualizada"): msg_erro("Não foi possível alterar a senha. Tente novamente");
                    }
                	
                    buscar_dados();
                }
            });
        });
    });
</script>