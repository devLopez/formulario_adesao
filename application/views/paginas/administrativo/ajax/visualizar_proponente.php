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
            <input type="hidden" id="id_usuario" value="<?php echo $row->id ?>">
            <div class="row">

                <!--Navegação à esquerda do painel -->
                <div class="span3">
                    <ul class="menu accordion">
                        <li class="section">
                            <a href="#" class="section-head">                            
                                <i class="octicon octicon-tools"></i> Opções
                            </a>
                            <a href="<?php echo app_baseurl() . 'administrativo/propostas' ?>">
                                <i class="octicon octicon-arrow-left"></i> Voltar aos registros
                            </a>
                            <a href="#" id="deferir_proposta">
                                <i class="octicon octicon-check"></i> Deferir proposta
                            </a>
                            <a href="#" id="indeferir_proposta">
                                <i class="octicon octicon-x"></i> Indeferir proposta
                            </a>
                            <a href="#add-observacao" data-toggle="modal" data-modal="modal" id="adicionar_comentario">
                                <i class="octicon octicon-comment"></i> Adicionar observação
                            </a>
                        </li>
                    </ul>
                </div>
                <!--*********************************************************-->

                <!-- Div que contém os dados pessoais -->
                <div class="span9">
                    <!-- Box que exibe as informações do proponente -->
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
                                        <input type="text" class="span5" value="<?php
                                        if ($row->data_geracaoProtocolo)
                                        {
                                            echo date('d/m/Y h:m', strtotime($row->data_geracaoProtocolo));
                                        }
                                        ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <!--*********************************************-->
                        </div>
                    </div>
                    <!--*****************************************************-->

                    <!-- Box que irá exibir as observações para este proponente -->
                    <div class="boxed-group">
                        <h3><i class="octicon octicon-comments"></i> Observações Cadastradas</h3>
                        <div class="boxed-group-inner" id="body_observacoes"></div>
                    </div>
                </div>
                <!--*********************************************************-->
            </div>

            <!-- Modal que contém o formulário para inserção de observações -->
            <form id="form-observacao">
                <div id="add-observacao" class="modal hide fade" data-backdrop="false">
                    <div class="modal-header">
                        <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
                        <h4 class="pull-right">Inserir observação</h4>
                    </div>
                    <div class="modal-body">
                        <div align="center">
                            <textarea class="span6" rows="5" required autofocus="" id="observacao"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn danger" type="reset" data-dismiss="modal" onclick="limpar_campos($('#form-observacao'))">
                            Fechar
                        </button>
                        <button class="btn primary" type="submit">
                            Salvar observação
                        </button>
                    </div>
                </div>
            </form>
            <?php
        }
    }
?>
<script type="text/javascript">
    var id = $('#id_usuario').val()

    /** Chama a função que busca as observações **/
    load_observacoes();

    /** Função desenvolvida para deferir a proposta **/
    $('#deferir_proposta').click(function(e) {
        e.preventDefault();

        if ($('#preenchimento').val() == 'Ficha não preenchida')
        {
            msg_erro('A ficha deste proponente ainda não foi preenchida');
            return false;
        }
        else
        {
            $.post('<?php echo app_baseurl() . 'administrativo/propostas/deferir_proposta'; ?>', {id: id}, function(e) {
                if (e == 1)
                {
                    msg_sucesso('Proposta deferida');

                    load_ajax(url, $('#propostas_cadastradas'));
                }
                else
                {
                    msg_erro('Ocorreu um erro. Tente novamente');
                }
            }).fail(function() {
                msg_erro('Não foi possível realizar a ação');
            });
        }
    });
    //**************************************************************************

    /** Função desenvolvida para indeferir a proposta **/
    $('#indeferir_proposta').click(function(e) {
        e.preventDefault();

        if ($('#preenchimento').val() == 'Ficha não preenchida')
        {
            msg_erro('A ficha deste proponente ainda não foi preenchida');
            return false;
        }
        else
        {
            $.post('<?php echo app_baseurl() . 'administrativo/propostas/indeferir_proposta'; ?>', {id: id}, function(e) {
                if (e == 1)
                {
                    msg_sucesso('Proposta indeferida');

                    load_ajax(url, $('#propostas_cadastradas'));
                }
                else
                {
                    msg_erro('Ocorreu um erro. Tente novamente');
                }
            }).fail(function() {
                msg_erro('Não foi possível realizar a ação');
            });
        }
    });
    //**************************************************************************

    /**
     * Realiza o submit do formulário que adiciona a observação
     */
    $('#form-observacao').submit(function(e) {
        e.preventDefault();

        observacao = $('#observacao').val();
        id_proponente = id;

        $.ajax({
            url: '<?php echo app_baseurl() . 'administrativo/propostas/salvar_observacao'; ?>',
            type: 'POST',
            data: {observacao: observacao, id_proponente: id_proponente},
            dataType: 'html',
            success: function(sucesso)
            {
                if (sucesso == 1)
                {
                    msg_sucesso('Observação cadastrada');
                    load_observacoes();
                    limpar_campos($('#form-observacao'));
                    $('#add-observacao').modal('hide');
                }
                else
                {
                    msg_erro('Ocorreu um erro ao cadastrar');
                }
            },
            error: function()
            {
                msg_erro('Ocorreu um erro ao acessar o recurso');
            }
        });
    });

    function load_observacoes()
    {
        url_observacoes = '<?php echo app_baseurl() . 'administrativo/propostas/buscar_observacoes/' ?>' + id;
        load_ajax(url_observacoes, $('#body_observacoes'));
    }
</script>