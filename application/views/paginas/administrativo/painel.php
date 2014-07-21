<script type="text/javascript">
    $(document).ready(function(){
        /** Adiciona a classe 'active' ao menu correspondente **/
        $('#menu-painel').addClass('selected');
    });
</script>

<div class="row">
    <!-- Lado esquerdo do painel -->
    <div class="span6">
        <div class="boxed-group">
            <h3><i class="octicon octicon-graph"></i> Status da Aprovação</h3>
            <div class="boxed-group-inner markdown-body">
                Nenhuma proposta para ser aprovada
            </div>
        </div>
        <div class="boxed-group">
            <h3><i class="octicon octicon-mail"></i> Minhas Mensagens</h3>
            <div class="boxed-group-inner markdown-body">
                Nenhuma mensagem
            </div>
        </div>
    </div>
    <!--*********************************************************************-->
    
    <!-- Lado direito do painel -->
    <div class="span6">
        <div class="boxed-group dangerzone">
            <h3><i class="octicon octicon-issue-opened"></i> Informações importantes</h3>
            <div class="boxed-group-inner markdown-body">
                <div class="alert alert-block info" style="text-align: justify">
                    É de suma importância neste sistema que os funcionários do 
                    sistema atualizem as informações sobre aprovação da cota e mensagens,
                    visto que os usuários estarão em constante visualização para saber
                    se a sua cota foi aprovada
                </div>
            </div>
        </div>
    </div>
    <!--*********************************************************************-->
</div>