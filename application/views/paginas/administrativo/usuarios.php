<!-- Cabeçalho da página -->
<div class="row">
	<div class="span9">
		<h3>Usuários do sistema</h3>
	</div>
	<div class="span3">
		<a class="pull-right btn danger" href="#cadastrar_usuario" data-toggle="modal">
			Cadastrar usuário
		</a>
	</div>
</div>
<!--*************************************************************************-->

<!-- Div que receberá os usuários cadastrados via ajax -->
<div class="row">
	<div class="span12" id="usuarios_cadastrados"></div>
</div>
<!--*************************************************************************-->

<!-- Modal que será usada para cadastrar um usuário -->
<form id="cad-usuario">
	<div id="cadastrar_usuario" class="modal hide fade" data-backdrop="false" data-keyboard="false">
		<div class="modal-header">
            <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
        	<h4 class="pull-right">Cadastro de usuários</h4>
        </div>
        <div class="modal-body">
        	<div class="control-group">
        		<label class="control-label"><strong>Nome: </strong><small>(apenas o 1º nome)</small></label>
        		<div class="controls">
        			<input class="span5" type="text" id="nome" autofocus required="required">
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>Sobrenome:</strong></label>
        		<div class="controls">
        			<input class="span5" type="text" id="sobrenome" required="required">
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>CPF:</strong></label>
        		<div class="controls">
        			<input class="span5" type="text" id="cpf" required="required">
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>Usuário:</strong></label>
        		<div class="controls">
        			<input class="span5" type="text" id="usuario" required="required" disabled="disabled">
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>Senha:</strong></label>
        		<div class="controls">
        			<input class="span5" type="password" id="senha" required>
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>Repita a senha</strong></label>
        		<div class="controls">
        			<input class="span5" type="password" id="repetir_senha" required>
        			<span class="help-inline"></span>
        		</div>
        	</div>
        </div>
        <div class="modal-footer">
        	<button class="btn primary" type="submit" id="salvar">
        		Adicionar usuário
        	</button>
        	<button class="btn danger" data-dismiss="modal" onclick="limpar($('#cad-usuario'))">
        		Cancelar
        	</button>
        </div>
	</div>
</form>
<!--*************************************************************************-->

<!-- Modal que conterá o formulário para edição das informações do usuário --->
<form id="edit_usuario">
	<div id="editar_usuario" class="modal hide fade" data-backdrop="false" data-keyboard="false">
		<div class="modal-header">
            <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
        	<h4 class="pull-right">Edição de usuários</h4>
        </div>
        <div class="modal-body" id="corpo_edicao">
        
        </div>
        <div class="modal-footer">
        	<button class="btn primary" type="submit">
        		Atualizar dados
        	</button>
        	<button class="btn danger" data-dismiss="modal">
        		Cancelar
        	</button>
        </div>
	</div>
</form>
<!--*************************************************************************-->

<script type="text/javascript" src="./js/app.js"></script>
<script type="text/javascript" src="./js/mask/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
	//Adiciona a classe `selected` ao menu
	$('#menu-usuarios').addClass('selected');

	//Chamada da função que realiza a busca dos usuários cadastrados
	buscar();

	/**
	 * buscar()
	 *
	 * Função desenvolvida para buscar os usuários cadastrados
	 */
	function buscar()
	{
		url = '<?php echo app_baseurl().'administrativo/usuarios/buscar'?>';
		load_ajax(url, $('#usuarios_cadastrados'));
	}
	//**************************************************************************

	//Adiciona a mascara ao campo cpf
	$('#cpf').mask('99999999999', {placeholder: '*'});

	//Função que une o nome e o sobrenome para criar o usuário
	$('#sobrenome').blur(function(){
		if($(this).val() == "")
		{
			return false;
		}
		else
		{
			sobrenome = $('#sobrenome').val();
			
			if($('#nome').val() != "")
			{
				nome = $('#nome').val();
				usuario = nome + sobrenome.charAt(0);

				usuario = usuario.toLowerCase();
				
				$('#usuario').val(usuario);
			}
		}
	});
	//**************************************************************************

	/**
	 * limpar()
	 *
	 * Função desenvolvida para limpar os dados do formulário
	 * 
	 * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @param	: 	{string} Recebe o objeto DOM do formulário para que o mesmo
	 * 				possa ser limpo
	 */
	function limpar(form)
	{
		form.find('input').val('');
	}
	//**************************************************************************

	//Função que realiza oo submit do form de cadastro
	$('#cad-usuario').submit(function(e){
		e.preventDefault();

		nome		= $('#nome').val();
		sobrenome	= $('#sobrenome').val();
		cpf			= $('#cpf').val();
		usuario		= $('#usuario').val();
		senha		= $('#senha').val();

		$.ajax({
			url: '<?php echo app_baseurl().'administrativo/usuarios/salvar_usuario'?>',
			type: 'POST',
			data: {nome: nome, sobrenome: sobrenome, cpf: cpf,usuario: usuario, senha: senha},
			dataType: 'html',
			success: function(e)
			{
				if(e == 1)
				{
					msg_sucesso('Usuário cadastrado');
					$('#cadastrar_usuario').modal('hide');
					limpar($('#cad-usuario'));
					buscar();
				}
				else
				{
					msg_erro('Erro ao salvar. Tente novamente');
				}
			},
			error: function()
			{
				msg_erro('Ocorreu um erro');
			}
		});
	});
	//**************************************************************************

	//Função desenvolvida para verificar se as duas senhas digitadas são iguais
	$('#repetir_senha').keyup(function(){
		if($(this).val() != $('#senha').val())
		{
			$('.help-inline').html('<span class="error"><i class="octicon octicon-stop"></i> As senhas não conferem</span>');
			$('#salvar').prop('disabled', true);
			return false;
		}
		else
		{
			$('.help-inline').html('<span class="success"><i class="octicon octicon-check"></i> As senhas conferem</span>');
			$('#salvar').prop('disabled', false);
		}
	});
	//**************************************************************************

	/** Função desenvolvida para salvar as alterações nos dados de um usuário **/
	$('#edit_usuario').submit(function(e){
		e.preventDefault();

		id			= $('#id').val();
		nome		= $('#ed_nome').val();
		sobrenome	= $('#ed_sobrenome').val();
		cpf			= $('#ed_cpf').val();
		login		= $('#ed_usuario').val();

		$.ajax({
			url:	'<?php echo app_baseurl().'administrativo/usuarios/salvar_alteracoes'?>',
			type:	'POST',
			data:	{id: id, nome: nome, sobrenome: sobrenome, cpf: cpf, login: login},
			dataType:	'html',
			success: function(e)
			{
				if(e == 1)
				{
					msg_sucesso('Usuário atualizado');
					$('#editar_usuario').modal('hide');
					buscar();
				}
				else
				{
					msg_erro('Não foi possível salvar. Tente novamente');
					return false;
				}
			}
		});
	});
</script>