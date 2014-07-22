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
            <h3><i class="octicon octicon-repo"></i> Propostas em aberto</h3>
            <div class="boxed-group-inner markdown-body">
                <?php
                    foreach ($propostas_abertas as $row)
                    {
                        if($row->propostas > 0)
                        {
                            ?>
                            <div class="alert info">
                                <i class="octicon octicon-info"></i> Você possui 
                                <span class="label label-success"><?php echo $row->propostas?></span>
                                proposta(s) para aprovação. 
                                <a href="<?php echo app_baseurl().'administrativo/propostas'?>">Visualizar</a>
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="alert alert-info">
                                <i class="octicon octicon-check"></i> Não existe propostas pendentes de
                                aprovação
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="boxed-group">
            <h3><i class="octicon octicon-mail"></i> Minhas Mensagens</h3>
            <div class="boxed-group-inner markdown-body">
                <?php
                    if($mensagens_abertas > 0)
                    {
                        ?>
                        <div class="alert info">
                            <i class="octicon octicon-info"></i> Você possui 
                            <span class="label label-success"><?php echo $mensagens_abertas?></span>
                            mensagens não lidas. 
                            <a href="<?php echo app_baseurl().'administrativo/mensagens'?>">Ler mensagens</a>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="alert alert-info">
                            <i class="octicon octicon-check"></i> Você não possui
                            mensagens pendentes
                        </div>
                        <?php
                    }
                ?>
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