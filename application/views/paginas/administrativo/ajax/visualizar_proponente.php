<?php
    /** Verifica se há mensagem de erro * */
    if (isset($erro))
    {
        ?>
        <div class="alert info">
            <?php echo $erro ?>
        </div>
        <?php
    }
    if (!$proponente)
    {
        ?>
        <div class="alert info">
            Não foi possível resgatar os dados do proponente
        </div>
        <?php
    } else
    {
        foreach ($proponente as $row)
        {
            ?>
            <input type="hidden" id="id_usuario" value="<?php echo $row->id?>">
            <div class="row">

                <!--Navegação à esquerda do painel -->
                <div class="span3">
                    <ul class="menu accordion">
                        <li class="section">
                            <a href="#" class="section-head">                            
                                <i class="octicon octicon-tools"></i> Opções
                            </a>
                            <a href="<?php echo app_baseurl().'administrativo/propostas'?>">
                                <i class="octicon octicon-arrow-left"></i> Voltar aos registros
                            </a>
                            <a href="#" id="deferir_proposta">
                                <i class="octicon octicon-check"></i> Deferir proposta
                            </a>
                            <a href="#" id="indeferir_proposta">
                                <i class="octicon octicon-x"></i> Indeferir proposta
                            </a>
                        </li>
                    </ul>
                </div>
                <!--*********************************************************-->

                <!-- Div que contém os dados pessoais -->
                <div class="span9">
                    <div class="boxed-group">
                        <h3><i class="octicon octicon-clippy"></i> Dados do Proponente</h3>
                        <div class="boxed-group-inner markdown-body corpo_perfil">
                            <!-- Div que Exibirá os dados do proponente -->
                            <div id="dados_usuario">
                                <div class="control-group">
                                    <label><strong>Nome do Proponente:</strong></label>
                                    <div class="control-group">
                                        <input type="text" class="span5" value="<?php echo $row->nome_proponente ?>" readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label><strong>CPF do Proponente:</strong></label>
                                    <div class="control-group">
                                        <input type="text" class="span5" value="<?php echo $row->cpf_proponente ?>" readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label><strong>Status da aprovação:</strong></label>
                                    <div class="control-group">
                                        <?php
                                        if ($row->status_aprovacao == NULL)
                                        {
                                            $row->status_aprovacao = 'Não Avaliado';
                                        } elseif ($row->status_aprovacao == 0)
                                        {
                                            $row->status_aprovacao = 'Não Aprovado';
                                        } elseif ($row->status_aprovacao == 1)
                                        {
                                            $row->status_aprovacao = 'Aprovado';
                                        }
                                        ?>
                                        <input type="text" class="span5" value="<?php echo $row->status_aprovacao ?>" readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label><strong>Status do preenchimento da ficha:</strong></label>
                                    <div class="control-group">
                                        <?php
                                        if ($row->numero_protocolo)
                                        {
                                            $row->numero_protocolo = 'Ficha preenchida';
                                        } elseif ($row->status_aprovacao == 0)
                                        {
                                            $row->numero_protocolo = 'Ficha não preenchida';
                                        }
                                        ?>
                                        <input type="text" class="span5" value="<?php echo $row->numero_protocolo ?>" readonly="" id="preenchimento">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label><strong>Data de Cadastro</strong></label>
                                    <div class="control-group">
                                        <input type="text" class="span5" value="<?php echo date('d/m/Y h:m', strtotime($row->data_adesao)) ?>" readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label><strong>Data da geração do protocolo:</strong></label>
                                    <div class="control-group">
                                        <input type="text" class="span5" value="<?php if ($row->data_geracaoProtocolo){echo date('d/m/Y h:m', strtotime($row->data_geracaoProtocolo));} ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <!--*********************************************-->
                        </div>
                    </div>
                </div>
                <!--*********************************************************-->
            </div>
            <?php
        }
    }
?>
<script type="text/javascript">
    /** Função desenvolvida para deferir a proposta **/
    $('#deferir_proposta').click(function(e){
        e.preventDefault();
        
        if($('#preenchimento').val() == 'Ficha não preenchida')
        {
            msg_erro('A ficha deste proponente ainda não foi preenchida');
            return false;
        }
        else
        {
            id = $('#id_usuario').val();
            
            $.post('<?php echo app_baseurl().'administrativo/propostas/deferir_proposta';?>', {id: id}, function(e){
                if(e == 1)
                {
                    msg_sucesso('Proposta deferida');
                    
                    load_ajax(url, $('#propostas_cadastradas'));
                }
                else
                {
                    msg_erro('Ocorreu um erro. Tente novamente');
                }
            }).fail(function (){
                msg_erro('Não foi possível realizar a ação');
            });
        }
    });
    //**************************************************************************
    
    /** Função desenvolvida para indeferir a proposta **/
    $('#indeferir_proposta').click(function(e){
        e.preventDefault();
        
        if($('#preenchimento').val() == 'Ficha não preenchida')
        {
            msg_erro('A ficha deste proponente ainda não foi preenchida');
            return false;
        }
        else
        {
            id = $('#id_usuario').val();
            
            $.post('<?php echo app_baseurl().'administrativo/propostas/indeferir_proposta';?>', {id: id}, function(e){
                if(e == 1)
                {
                    msg_sucesso('Proposta indeferida');
                    
                    load_ajax(url, $('#propostas_cadastradas'));
                }
                else
                {
                    msg_erro('Ocorreu um erro. Tente novamente');
                }
            }).fail(function (){
                msg_erro('Não foi possível realizar a ação');
            });
        }
    });
</script>