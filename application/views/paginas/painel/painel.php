<script>
	//Chama a função que verifica se existe e-mail cadastrado
	verifica_email();
	
    /** Inicialização do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe 'active' ao menu correspondente **/
        $('#menu-painel').addClass('selected');
    });

    /**
     * verifica_email()
     *
     * Função que verifica a existência de um email cadastrado no sistema. Caso
     * Não exista, exige que o usuário cadasre um email
     *
     * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
	function verifica_email()
    {
        url = '<?php echo app_baseurl().'painel/painel/verifica_email' ?>';

        $.get(url, function(e){
            if(e == 1)
            {
                return false;
            }
            else
            {
            	notificar_sem_email();
            }
        });
    }
    //**************************************************************************

    /**
     * notificar_sem_email()
     *
     * Função desenvolvida para exibir uma notificação ao usuário, informando-o
     * caso não haja e-mail cadastrado
     *
     * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    function notificar_sem_email()
    {
    	$.SmartMessageBox({
			title : "Atenção",
			content : "Não foi detectado em seu cadastro um endereço de email. Favor inserir um email válido",
			buttons : "[Sair do sistema][Salvar o meu e-mail]",
			input : "email",
			placeholder : ""
		}, function(botao, email) {
			if(botao == 'Sair do sistema')
			{
				logout($('.logout-form').attr('action'));
			}
			else
			{
				if(email)
				{
					er = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

					if( !er.test(email) )
					{
						alert('Email inválido');
						notificar_sem_email();
						return false;
					}
					else
					{
						salvar(email);
					}
				}
				else
				{
					notificar_sem_email();
				}
			}
		});
    }

    /**
     * salvar()
     *
     * Função desenvolvida salvar o email digitado pelo usuário
     *
     * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @param	:	{string} email Contém o email que será salvo
     */
    function salvar(email)
    {
    	$.ajax({
        	url: '<?php echo app_baseurl().'painel/painel/salvar_email'?>',
        	type: 'POST',
        	data: {email_proponente: email},
        	dataType: 'html',
        	success: function(e)
        	{
            	if(e == 1)
            	{
                	msg_sucesso('O novo endereço de e-mail foi salvo');
                }
            	else
            	{
                	msg_erro('Não foi possível salvar o e-mail. Tente novamente');
                	notificar_sem_email();
                }
            }
        });
    }
</script>

<div class="container">
    <div class="row">

        <!-- Lado esquerdo do painel -->
        <div class="span6">

            <div class="boxed-group">
                <h3><i class="octicon octicon-repo"></i> Minha inscrição</h3>
                <div class="boxed-group-inner markdown-body">
                    <?php
                        if($inscricao < 0 || $inscricao == "")
                        {
                            ?>
                            <div class="alert info">
                                <i class="octicon octicon-info"></i> Você ainda não preencheu o formulário de inscrição
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="alert alert-info">
                                <i class="octicon octicon-check"></i> Você preencheu a ficha. <a href="<?php echo app_baseurl().'painel/meus_dados'?>"> Verificar meus dados</a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>

            <div class="boxed-group">
                <h3><i class="octicon octicon-graph"></i> Status da Aprovação</h3>
                <div class="boxed-group-inner markdown-body">
                    <?php
                        if($inscricao < 0)
                        {
                            ?>
                            <div class="alert info">
                                <i class="octicon octicon-info"></i> Você ainda não preencheu o formulário de inscrição
                            </div>
                            <?php
                        }
                        else
                        {
                            if($aprovacao == NULL)
                            {
                                ?>
                                <div class="alert info">
                                    <i class="octicon octicon-info"></i> A sua proposta ainda está em análise. Assim que
                                    analisada, os resultados serão divulgados aqui.
                                </div>
                                <?php
                            }
                            elseif($aprovacao == 0)
                            {
                                ?>
                                <div class="alert erro">
                                    <i class="octicon octicon-x"></i> Infelizmente a sua proposta de cota nao foi aceita.
                                    Para mais esclarecimentos, favor procurar a secretaria do clube.
                                </div>
                                <?php
                            }
                            if($aprovacao == 1)
                            {
                                ?>
                                <div class="alert alert-info">
                                    <i class="octicon octicon-check"></i> A sua cota foi aprovada. Favor comparecer à secretaria
                                    do clube para efetuar pagamento.
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--*****************************************************************-->

        <!-- Lado direito -->
        <div class="span6">

            <div class="boxed-group dangerzone">
                <h3><i class="octicon octicon-issue-opened"></i> Informações sobre a cota</h3>
                <div class="boxed-group-inner markdown-body">
                    <div class="alert alert-block info" style="text-align: justify">
                        Após o completo preenchimento das suas informações pessoais,
                        você deve fazer download da ficha de inscrição, imprimí-la
                        e levá-la até a secretaria para dar entrada no processo de
                        sindicância. Juntamente com a ficha preenchida, levar
                        
                        <ul>
                            <li>Xerox da certidão de casamento</li>
                            <li>2 Fotos 3x4 do casal (duas de cada)</li>
                            <li>Xerox da certidão de nascimento ou identidade dos dependentes</li>
                            <li>Duas fotos de cada dependente</li>
                        </ul>
                        <br>
                        
                        Somente depois de ser aprovado pela sindicância, voçê poderá efetuar o pagamento
                    </div>
                </div>
            </div>
        </div>
        <!--*****************************************************************-->
    </div>
</div>
<!-- Modal que exige do usuáiro a inserção de um endereço de email -->
<form id="cad_email">
	<div id="cadastrar_email" class="modal hide fade" data-backdrop="false" data-keyboard="false">
		<div class="modal-header">
			<img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
			<h4 class="pull-right">Cadastro de E-mail</h4>
		</div>
		<div class="modal-body">
					        	
			<div class="flash-messages">
				<div class="flash flash-error" style="text-align: justify">
					Você deve adicionar um endereço de email válido para que possamos
				    entrar em contato com você
				</div>
			</div>
					
			<div class="control-group">
				<label>Digite o seu endereço de e-mail</label>
				<div class="controls">
					<input class="span5" type="text" name="email_proponente" autofocus required>
				</div>
			</div>
				
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn primary">Salvar meu endereço de e-mail</button>
		</div>
	</div>
</form>
<!--*************************************************************************-->