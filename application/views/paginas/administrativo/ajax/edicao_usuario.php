<?php
	if(!$usuario)
	{
		?>
		<div class="alert info">
			<strong>:(</strong> Ocorreu um erro na busca dos dados do usuário
		</div>
		<?php
	}
	else
	{
		foreach($usuario as $row)
		{
			?>
			<input type="hidden" id="id" value="<?php echo $row->id?>">
			<div class="control-group">
        		<label class="control-label"><strong>Nome: </strong><small>(apenas o 1º nome)</small></label>
        		<div class="controls">
        			<input class="span5" type="text" id="ed_nome" autofocus required="required" value="<?php echo $row->nome;?>">
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>Sobrenome:</strong></label>
        		<div class="controls">
        			<input class="span5" type="text" id="ed_sobrenome" required="required" value="<?php echo $row->sobrenome?>">
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>CPF:</strong></label>
        		<div class="controls">
        			<input class="span5" type="text" id="ed_cpf" required="required" value="<?php echo $row->cpf?>">
        		</div>
        	</div>
        	<div class="control-group">
        		<label class="control-label"><strong>Usuário:</strong></label>
        		<div class="controls">
        			<input class="span5" type="text" id="ed_usuario" required="required" disabled="disabled" value="<?php echo $row->login?>">
        		</div>
        	</div>
			<?php
		}
	}
?>
<script type="text/javascript">
	//Adiciona a mascara ao campo cpf
	$('#ed_cpf').mask('99999999999', {placeholder: '*'});

	//Função que une o nome e o sobrenome para criar o usuário
	$('#ed_sobrenome').blur(function(){
		if($(this).val() == "")
		{
			return false;
		}
		else
		{
			sobrenome = $('#ed_sobrenome').val();
			
			if($('#ed_nome').val() != "")
			{
				nome = $('#ed_nome').val();
				usuario = nome + sobrenome.charAt(0);

				usuario = usuario.toLowerCase();
				
				$('#ed_usuario').val(usuario);
			}
		}
	});
	//**************************************************************************
</script>