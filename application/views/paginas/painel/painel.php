<script>
    /** Inicialização do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe 'active' ao menu correspondente **/
        $('#menu-painel').addClass('selected');
    });
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