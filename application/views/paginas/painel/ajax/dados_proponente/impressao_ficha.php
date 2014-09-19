<div class="row">
    <div class="span6">
        <div class="boxed-group">
            <h3><i class="octicon octicon-clippy"></i> Impressão de Arquivos</h3>
            <div class="boxed-group-inner">
                <ul class="boxed-group-list">
                    <li>
                        Proposta de Cota
                        <a href="#instrucao" data-toggle="modal" class="minibutton" id="proposta" data-href="<?php echo app_baseurl().'painel/impressao_ficha/gerar_proposta/1'?>">
                            <i class="fa fa-print"></i> Visualizar e imprimir
                        </a>
                    </li>
                    <li>
                        Cadastro de Associado
                        <a href="#instrucao" data-toggle="modal" class="minibutton" id="cadastro" data-href="<?php echo app_baseurl().'painel/impressao_ficha/gerar_proposta/2'?>">
                            <i class="fa fa-print"></i> Visualizar e imprimir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="span6 pull-right">
        <div class="boxed-group">
            <h3><i class="octicon octicon-stop"></i> Instruções</h3>
            <div class="boxed-group-inner markdown-body">
                É necessário, ao imprimir a sua ficha, anexar os documentos pessoais
                e dos seus dependentes.
                É necessário anexar: 
                <ul>
                    <li>
                        2 Fotos 3x4 de você e 2 fotos de cada dependente 
                        <a href="#pqfoto" data-toggle="modal" rel="tooltip" data-title="Por quê duas fotos?">
                            <i class="octicon octicon-info"></i>
                        </a>
                    </li>
                    <li>Cópia da Certidão de casamento</li>
                    <li>Cópia da identidade ou certidão de nascimento de cada dependente</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal que mostra o por que das duas fotos -->
<div id="pqfoto" class="modal hide fade" data-backdrop="false">
    <div class="modal-header">
        <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
        <h4 class="pull-right">Por que duas fotos?</h4>
    </div>
    <div class="modal-body">
        <p style="text-align: justify">
            É necessário duas fotos para o cadastro, visto que, uma das fotos vai
            para o arquivo e a outra é utilizada na confecção da carteirinha.
        </p>
        <p style="text-align: justify">
            Futuramente, apenas uma foto será necessária, devido o fato de que as 
            carteirinhas serão impressas. Assim, apenas uma foto bastará para 
            efetuar o cadastro.
        </p>
    </div>
    <div class="modal-footer">
        <a class="btn danger" data-dismiss="modal">
            Fechar esta janela
        </a>
    </div>
</div>
<!--*************************************************************************-->

<!-- modal que exibe o instruções ao usuário -->
<div id="instrucao" class="modal hide fade" data-backdrop="false">
	<div class="modal-header">
        <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
        <h4 class="pull-right">Atenção</h4>
    </div>
    <div class="modal-body">
    	<p style="text-align: justify">
    		Antes de imprimir os formulários que devem ser encaminhados à secretaria
    		do clube, verifique se todos os dados necessários foram preenchidos.
    	</p>
    	<p style="text-align: justify">
    		Caso as fichas forem encaminhadas para a secretaria do clube com
    		defcit de dados, a sua proposta pode ser <em><strong>Indeferida</strong></em>
    	</p>
    </div>
    <div class="modal-footer">
        <a class="btn danger" data-dismiss="modal">
            Fechar esta janela
        </a>
        <a class="btn primary" id="abrir">
        	Ok, entendi
        </a>
    </div>
</div>
<!--*************************************************************************-->
<script type="text/javascript">
	/**
	 * Recebe a url que será processada e adiciona os atributos no botão da 
	 * janela modal
	 */
	$('#proposta, #cadastro').click(function(){
		url = $(this).data('href');

		$('#abrir').attr('href', url).attr('target', '_blank');
	});

	/**
	 * Esconde o modal quando a janela de impressão é aberta
	 */
	$('#abrir').click(function(){
		$('#instrucao').modal('hide');
	});
</script>