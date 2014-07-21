<style>
    footer.form-actions {
        margin-bottom: -10px;
        margin-left: -10px;
        margin-right: -10px;
    }
</style>

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

            senha = $('#senha').val();
            nome_proponente = $('#nome_proponente').val();

            $.ajax({
                url: '<?php echo app_baseurl().'painel/usuario/atualizar_perfil' ?>',
                type: 'POST',
                data: {senha: senha, nome_proponente: nome_proponente},
                dataType: 'json',
                success: function(sucesso)
                {
                    if (sucesso.r_nome == 1)
                    {
                        sucesso("Nome Atualizado");
                    }
                    else
                    {
                        erro("Não foi possível alterar seu nome. Tente novamente");
                    }
                    if(sucesso.r_senha == 1)
                    {
                        sucesso("Senha Atualizada");
                    }
                    else
                    {
                        sucesso("Não foi possível alterar a senha. Tente novamente");
                    }
                    
                    buscar_dados();
                },
                error: function()
                {
                    erro("Ocorreu um erro. Tente novamente");
                }
            });
        });
    });

    /**
     * erro()
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @description Função desenvolvida para mostrar uma mensagem de erro
     * @param       {string} mensagem contém a mensagem que será exibida
     */
    function erro(mensagem) {
        $.smallBox({
            title: "<i class='fa fa-check'></i> Erro",
            content: "<strong>"+mensagem+"</strong>",
            iconSmall: "fa fa-thumbs-down bounce animated",
            color: "#FE1A00",
            timeout: 5000
        });
    }
    /**************************************************************************/

    /**
     * sucesso()
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @description Função desenvolvida para mostrar uma mensagem de sucesso
     * @param       {string} mensagem contém a mensagem que será exibida
     */
    function sucesso(mensagem)
    {
        $.smallBox({
            title: "<i class='fa fa-check'></i> Sucesso",
            content: "<strong>" + mensagem + "</strong>",
            iconSmall: "fa fa-thumbs-up bounce animated",
            color: "#3b5998",
            timeout: 5000
        });
    }
</script>