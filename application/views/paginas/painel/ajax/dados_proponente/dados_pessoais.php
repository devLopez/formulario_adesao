<?php
    if(empty($pessoais))
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
        foreach($pessoais as $row)
        {
            ?>
            <div class="control-group">
                <label class="control-label"><strong>Nome:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $_SESSION['usuario']['nome_proponente']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>CPF:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $_SESSION['usuario']['cpf_proponente']?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Nome da mãe:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->nome_mae?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Nome do pai:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->nome_pai?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Data de nascimento:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->data_nascimento?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Identidade:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->identidade?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Órgão Emissor:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->orgao_emissor?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Data de emissão:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->data_emissao?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Naturalidade:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->naturalidade_estado?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Nacionalidade:</strong></label>
                <div class="controls">
                    <?php
                        if($row->nacionalidade == 1){$nacionalidade = 'Brasileira';}
                        elseif($row->nacionalidade == 2){$nacionalidade = 'Naturalizado';}
                        elseif($row->nacionalidade ==  3){$nacionalidade = 'Estrangeira';}
                        else{$nacionalidade = 'Apátrida';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $nacionalidade?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>sexo:</strong></label>
                <div class="controls">
                    <?php
                        if($row->sexo == 'F'){$row->sexo = 'Feminino';}
                        else{$row->sexo = 'Masculino';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->sexo?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Escolaridade:</strong></label>
                <div class="controls">
                    <?php
                        if($row->escolaridade == 1){$row->escolaridade = '1º Grau Incompleto ';}
                        elseif($row->escolaridade == 2){$row->escolaridade = '1º Grau Completo';}
                        elseif($row->escolaridade == 3){$row->escolaridade = '2º Grau';}
                        elseif($row->escolaridade == 4){$row->escolaridade = 'Superior Incompleto';}
                        elseif($row->escolaridade == 5){$row->escolaridade = 'Superior Completo';}
                        else{$row->escolaridade = 'Pós-graduação';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->escolaridade?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Estado civil:</strong></label>
                <div class="controls">
                    <?php
                        if($row->estado_civil == 1){$row->estado_civil = 'Casado c/ separação de bens';}
                        elseif($row->estado_civil == 2){$row->estado_civil = 'Casado c/ comunhão de bens';}
                        elseif($row->estado_civil == 3){$row->estado_civil = 'Viúvo';}
                        elseif($row->estado_civil == 4){$row->estado_civil = 'Solteiro';}
                        elseif($row->estado_civil == 5){$row->estado_civil = 'Desquitado ou divorciado';}
                        else{$row->estado_civil = 'Marital';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->estado_civil?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Nº de dependentes:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->numero_dependentes?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>End. residêncial:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->endereco_residencial?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Número:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->numero_residencia?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Complemento:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->complemento_residencia?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Bairro:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->bairro?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Cidade:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cidade?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>CEP:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->cep?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Residência:</strong></label>
                <div class="controls">
                    <?php
                        if($row->situacao_residencia == 1){$row->situacao_residencia = 'Própria';}
                        elseif($row->situacao_residencia == 2){$row->situacao_residencia = 'Financiada';}
                        elseif($row->situacao_residencia == 3){$row->situacao_residencia = 'Alugada';}
                        elseif($row->situacao_residencia == 4){$row->situacao_residencia = 'Com os pais';}
                        else{$row->situacao_residencia = 'Outros';}
                    ?>
                    <input type="text" class="span5" readonly="" value="<?php echo $row->situacao_residencia?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Há quantos anos:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->anos_residencia?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Telefone de contato:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->telefone?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>Celular:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->celular?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><strong>E-mail:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" readonly="" value="<?php echo $row->email?>">
                </div>
            </div>
            <?php
        }
    }
?>