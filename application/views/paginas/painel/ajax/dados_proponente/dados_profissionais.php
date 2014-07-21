<?php
    if(empty($profissionais))
    {
        ?>
        <div class="alert alert-block info">
            <h4 class="alert-heading">Atenção</h4>
            <p>
                Ocorreu um erro na busca dos dados. Faça Logoff e tente novamente
            </p>
        </div>
        <?php
    }
    else
    {
        foreach($profissionais as $row)
        {
            ?>
            <div class="control-group">
                <label class="control-label"><strong>Profissão:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->profissao?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Situação atual:</strong></label>
                <div class="controls">
                    <?php
                        if($row->situacao_atual == 1){$row->situacao_atual = 'Empregado';}
                        elseif($row->situacao_atual == 2){$row->situacao_atual = 'Autônomo';}
                        elseif($row->situacao_atual == 3){$row->situacao_atual = 'Proprietário';}
                        elseif($row->situacao_atual == 4){$row->situacao_atual = 'Servidor público';}
                        elseif($row->situacao_atual == 5){$row->situacao_atual = 'Aposentado';}
                        elseif($row->situacao_atual == 6){$row->situacao_atual = 'Desempregado';}
                        elseif($row->situacao_atual == 7){$row->situacao_atual = 'Outros';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->situacao_atual?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Data de admissão:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->data_admissao?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Salário:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->salario?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Outras rendas:</strong></label>
                <div class="controls">
                    <?php
                        if($row->outras_rendas == 1){$row->outras_rendas = 'Anual';}
                        elseif($row->outras_rendas == 2){$row->outras_rendas = 'Mensal';}
                        elseif($row->outras_rendas == 3){$row->outras_rendas = 'Nenhuma renda extra';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->outras_rendas?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Valor de outras rendas:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->valor_outras_rendas?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Renda familiar mensal:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->renda_mensal_familiar?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Nome da empresa:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->nome_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>CNPJ:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cnpj_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Tempo de existência:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->tempo_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Endereço:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->endereco_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Número:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->numero_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Complemento:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->complemento_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Bairro:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->bairro_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Cep:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cep_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Cidade:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cidade_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Estado:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->estado_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Telefone:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->telefone_empresa?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Cargo:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cargo_empresa?>">
                </div>
            </div>
            <?php
        }
    }
?>