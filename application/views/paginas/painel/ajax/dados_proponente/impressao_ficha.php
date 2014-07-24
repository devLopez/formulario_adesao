<div class="row">
    <div class="span6">
        <div class="boxed-group">
            <h3><i class="octicon octicon-clippy"></i> Impressão de Arquivos</h3>
            <div class="boxed-group-inner">
                <ul class="boxed-group-list">
                    <li>
                        Proposta de Cota
                        <a target="_blank" href="<?php echo app_baseurl().'painel/impressao_ficha/gerar_proposta/1'?>" class="minibutton">
                            <i class="fa fa-print"></i> Visualizar e imprimir
                        </a>
                    </li>
                    <li>
                        Cadastro de Associado
                        <a target="_blank" href="<?php echo app_baseurl().'painel/impressao_ficha/gerar_proposta/2'?>" class="minibutton">
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