<?php
    if(empty($conjuge))
    {
        ?>
        <div class="alert alert-block info">
            <h4 class="alert-heading">Atenção</h4>
            <p>
                Não existe um conjuge cadastrado
            </p>
        </div>
        <?php
    }
    else
    {
        foreach($conjuge as $row)
        {
            ?>
            <div class="control-group">
                <label class="control-label"><strong>Nome:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->nome_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>CPF:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cpf_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Identidade:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->identidade_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>data de expedição:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->data_expedicao_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Órgão emissor:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->orgao_emissor_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Data de Nascimento:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->data_nascimento_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Naturalidade:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->naturalidade_estado_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Nacionalidade:</strong></label>
                <div class="controls">
                    <?php
                        if($row->nacionalidade_conjuge == 1){$row->nacionalidade_conjuge = 'Brasileira';}
                        elseif($row->nacionalidade_conjuge == 2){$row->nacionalidade_conjuge = 'Naturalizado';}
                        elseif($row->nacionalidade_conjuge == 3){$row->nacionalidade_conjuge = 'Estrangeira';}
                        elseif($row->nacionalidade_conjuge == 4){$row->nacionalidade_conjuge = 'Apátrida';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->nacionalidade_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Trabalha:</strong></label>
                <div class="controls">
                    <?php
                        if($row->situacao_emprego_conjuge == 1){$row->situacao_emprego_conjuge = 'Não';}
                        else{$row->situacao_emprego_conjuge = 'Sim';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->situacao_emprego_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Empresa onde trabalha:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->empresa_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>CNPJ:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cnpj_empresa_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Data de Admissão:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->data_admissao_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Endereço comercial:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->endereco_comercial_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Número:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->numero_empresa_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Complemento:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->complemento_empresa_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Telefone:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->telefone_empresa_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Cargo:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cargo_empresa_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Salário:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->salario_conjuge?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Profissão:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->profissao_conjuge?>">
                </div>
            </div>
            <?php
        }
    }
?>