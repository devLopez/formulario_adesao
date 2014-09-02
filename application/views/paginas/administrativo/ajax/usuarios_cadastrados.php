<?php
	if(!isset($usuarios))
	{
		?>
		<div class="alert alert-block info">
			Ocorreu um erro na busca dos usuários
		</div>
		<?php
	}
	else
	{
		?>
		<table class="table table-bordered table-hover table-striped fadeIn">
			<thead>
				<tr>
					<th>Nome Completo</th>
					<th>CPF</th>
					<th>login</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($usuarios as $row)
					{
						?>
						<tr>
							<td><?php echo $row->nome.' '.$row->sobrenome?></td>
							<td><?php echo $row->cpf?></td>
							<td><?php echo $row->login?></td>
							<td style="text-align: center">
								<a href="#" class="alterar tooltipped tooltipped-n" aria-label="Alterar este usuário" data-id="<?php echo $row->id?>">
									<span class="octicon octicon-pencil"></span>
								</a>
								<a href="#" class="excluir tooltipped tooltipped-n" aria-label="Excluir este Usuário" data-id="<?php echo $row->id ?>">
									<span class="octicon octicon-x"></span>
								</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		<?php
	}
?>
<script type="text/javascript">
	//Função desenvolvida para excluir um registro
	$('.excluir').click(function(e){
		e.preventDefault();

		id = $(this).data('id');

		url = '<?php echo app_baseurl().'administrativo/usuarios/excluir_usuario'?>'

		$.SmartMessageBox({
			title: 'Atenção',
			content: 'Você está prestes a excluir um candidato. Proseguir?',
			buttons: '[Não][Sim]'
		}, function(e){
			if(e == 'Não')
			{
				return false;
			}
			else
			{
				$.post(url, {id: id}, function(e){
					if(e == 1)
					{
						msg_sucesso('Usuário excluido');
						buscar();
					}
					else
					{
						msg_erro('Não foi possível excluir. Tente novamente');
						return false;
					}
				}).fail(function(){
					msg_erro('Ocorreu um erro. Tente mais tarde');
					return false;
				});
			}
		});
	});
	//**************************************************************************

	//Chamada da função para alterar um registro
	$('.alterar').click(function(e){
		e.preventDefault();
		
		id = $(this).data('id');

		$('#editar_usuario').modal('show');

		url = '<?php echo app_baseurl().'administrativo/usuarios/buscar_usuario/'?>'+id;

		load_ajax(url, $('#corpo_edicao'));
	});
</script>