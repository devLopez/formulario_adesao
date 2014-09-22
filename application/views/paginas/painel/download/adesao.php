<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Ficha de Inscrição</title>
        <link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
        <style>
			body {
				font-size: 12px;
			}
		</style>
        <script type="text/javascript">
        	window.print();
        </script>
    </head>
    <body>
        <!-- Contém o topo do site -->
        <div id="topo">
            <div class="container">
                <div class="span5">
                    <img src="./img/logo.gif" alt="Pentáurea Clube">
                </div>
                <div class="span6 pull-right">
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <tr>
                                <th style="text-align: center;">
                                    <strong>
                                        Documentação
                                    </strong>
                                </th>
                            </tr>
                            <tr>
                                <td>

                                    <ul>
                                        <li>Certidão de Casamento</li>
                                        <li>Duas fotos 3x4 do casal (Duas de cada)</li>
                                        <li>Certidão de nascimento ou identidade dos filhos</li>
                                        <li>Duas fotos 3x4 de cada filho</li>
                                    </ul>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--************************************************************-->

        <!-- Contém o pós-topo -->
        <div id="subhead">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div align="Center">
                            <strong>BR 135, KM 23 - FONE:(38)3221-3245 - MONTES CLAROS – MINAS GERAIS </strong>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="span12">
                        <div align="center">
                            <strong>
                                ============= SECRETARIA: Rua Tapajós, 207 – Bairro Melo – Fone: 3221-3245 ===============
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************************************-->

        <!-- Div que contém a tabela onde os dados serão inseridos -->
        <br>
        <div id="dados">
            <div class="container">
                <table class="table table-condensed table-bordered table-hover" cellpadding="5">

                    <!-- Head dos dados pessoais -->
                    <tr>
                        <th colspan="5" style="background-color: #E0E0E0;">
                    <div align="center">
                        DADOS PESSOAIS
                    </div>
                    </th>
                    </tr>
                    <!--************************************************-->

                    <!-- Dados pessoais -->
                    <tr >
                        <td colspan="3">
                            <strong>Nome Completo:</strong>
                            <br><?php echo $nome_proponente ?>
                        </td>
                        <td colspan="2">
                            <strong>CPF(<small>número e controle</small>):</strong>
                            <br><span id="cpf"><?php echo $cpf_proponente ?></span>
                        </td>
                    </tr>

                    <?php
                        foreach ($dados_pessoais as $row)
                        {
                            ?>
                            <tr>
                                <td colspan="1">
                                    <strong>Número da Identidade:</strong>
                                    <br><?php echo $row->identidade ?>
                                </td>
                                <td colspan="1">
                                    <strong>Data de expedição:</strong>
                                    <br><?php echo $row->data_emissao ?>
                                </td>
                                <td colspan="1">
                                    <strong>Órgão emissor/ estado:</strong>
                                    <br><?php echo $row->orgao_emissor ?>
                                </td>
                                <td colspan="2">
                                    <strong>Data de nascimento:</strong>
                                    <br><?php echo $row->data_nascimento ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <strong>Naturalidade/ estado:</strong>
                                    <br> <?php echo $row->naturalidade_estado ?>
                                </td>
                                <td colspan="3">
                                    <strong>Nacionalidade:</strong> 1 - Brasileira&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 - Estrangeira
                                    <br>(&nbsp;&nbsp;<?php echo $row->nacionalidade ?>&nbsp;&nbsp;)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    2 - Naturalizado &nbsp;&nbsp;&nbsp;4 - Apátrida
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <strong>Nome do Pai:</strong>
                                    <br> <?php echo $row->nome_pai ?>
                                </td>
                                <td colspan="3">
                                    <strong>Nome da Mãe:</strong>
                                    <br> <?php echo $row->nome_mae ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1">
                                    <strong>Sexo:</strong> &nbsp;&nbsp;&nbsp;&nbsp;F - Feminino
                                    <br> (&nbsp;&nbsp;<?php echo $row->sexo ?>&nbsp;&nbsp;)
                                    &nbsp;
                                    M - Masculino
                                </td>
                                <td colspan="4">
                                    <strong>Escolaridade:</strong> 1 - 1º Grau Incompleto &nbsp; 3 - 2º Grau Incompleto &nbsp; 5 - Sup. Incompleto &nbsp; 7 - Pós Graduação
                                    <br>(&nbsp;&nbsp;<?php echo $row->escolaridade ?>&nbsp;&nbsp;)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    2 - 1º Grau Completo &nbsp;&nbsp;&nbsp; 4 - 2º Grau Completo &nbsp;&nbsp;&nbsp; 6 -  Sup. Completo
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <strong>Estado Civil:</strong> 1 - Casado c/ separação de bens &nbsp; 3 - Viúvo &nbsp;&nbsp;&nbsp;&nbsp; 5 - Desquitado ou divorciado
                                    <br>(&nbsp;&nbsp;<?php echo $row->estado_civil ?>&nbsp;&nbsp;)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    2 - Casado c/ comunhão de bens &nbsp;  4 - Solteiro   &nbsp;&nbsp;6 - Marital
                                </td>
                                <td colspan="2">
                                    <strong>Nº de dependentes:</strong>
                                    <br> <?php echo $row->numero_dependentes ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <strong>Endereço residencial (rua, avenida, praça, etc.):</strong>
                                    <br> <?php echo $row->endereco_residencial ?>
                                </td>
                                <td colspan="1">
                                    <strong>Número:</strong>
                                    <br> <?php echo $row->numero_residencia ?>
                                </td>
                                <td colspan="2">
                                    <strong>Complemento:</strong>
                                    <br> <?php echo $row->complemento_residencia ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <strong>Bairro:</strong>
                                    <br> <?php echo $row->bairro ?>
                                </td>
                                <td colspan="1">
                                    <strong>CEP:</strong>
                                    <br> <?php echo $row->cep ?>
                                </td>
                                <td colspan="2">
                                    <strong>Cidade:</strong>
                                    <br> <?php echo $row->cidade ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <strong>Residência:</strong> 1 - Própria &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 - Alugada &nbsp;&nbsp;5 - Outros
                                    <br>(&nbsp;&nbsp;<?php echo $row->situacao_residencia ?>&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    2 - Financiada &nbsp;&nbsp;4 - Com os pais
                                </td>
                                <td colspan="1">
                                    <strong>há qtos anos?</strong>
                                    <br><?php echo $row->anos_residencia ?>
                                </td>
                                <td colspan="1">
                                    <strong>Telefone p/ contato</strong>
                                    <br><?php echo $row->telefone ?>
                                </td>
                                <td colspan="1">
                                    <strong>Celular</strong>
                                    <br><?php echo $row->celular ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">
                                    <strong>Email:</strong>
                                    <br><?php echo $row->email ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                    <!--****************************************************-->

                    <!-- Head dos dados profissionais -->
                    <tr>
                        <th colspan="5" style="background-color: #E0E0E0;">
                    <div align="center">
                        DADOS PROFISSIONAIS
                    </div>
                    </th>
                    </tr>
                    <!--************************************************-->

                    <!-- Dados Profissionais -->
                    <?php
                        foreach ($dados_profissionais as $row)
                        {
                            ?>
                            <tr >
                                <td colspan="3">
                                    <strong>Situação:</strong>
                                    1 - Empregado &nbsp;&nbsp;3 - Proprietário &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5 - Aposentado &nbsp;&nbsp;7 - Outro 
                                    <br>(&nbsp;&nbsp;<?php echo $row->situacao_atual ?>&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    2 - Autônomo &nbsp;&nbsp;&nbsp;&nbsp;4 - Servidor público    &nbsp;&nbsp;6 - Desempregado 
                                </td>
                                <td colspan="2">
                                    <strong>Data de admissão na empresa:</strong>
                                    <br><?php echo $row->data_admissao ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1">
                                    <strong>Salário</strong>
                                    <br>R$ <?php echo $row->salario ?>
                                </td>
                                <td colspan="1">
                                    <strong>Outras rendas:</strong>
                                    1 - Ano &nbsp;&nbsp;2 - Mês
                                    <br>
                                    (&nbsp;&nbsp;<?php echo $row->outras_rendas ?>&nbsp;&nbsp;)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 - Nenhuma outra renda
                                </td>
                                <td colspan="1">
                                    <strong>Valor:</strong>
                                    <br>R$ <?php echo $row->valor_outras_rendas ?>
                                </td>
                                <td colspan="2">
                                    <strong>Renda mensal familiar:</strong>
                                    <br>R$ <?php echo $row->renda_mensal_familiar ?>
                                </td>
                            </tr>

                            <tr >
                                <td colspan="2">
                                    <strong>Empresa em que trabalha:</strong>
                                    <br> <?php echo $row->nome_empresa ?>
                                </td>
                                <td colspan="1">
                                    <strong>CNPJ:</strong>
                                    <br><?php echo $row->cnpj_empresa ?>
                                </td>
                                <td colspan="2">
                                    <strong>Tempo de existência da empresa:</strong>
                                    <br><?php echo $row->tempo_empresa ?> anos
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <strong>Endereço comercial (rua, avenida, praça, etc.):</strong>
                                    <br> <?php echo $row->endereco_empresa ?>
                                </td>
                                <td colspan="1">
                                    <strong>Número:</strong>
                                    <br> <?php echo $row->numero_empresa ?>
                                </td>
                                <td colspan="2">
                                    <strong>Complemento:</strong>
                                    <br> <?php echo $row->complemento_empresa ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>Bairro:</strong>
                                    <br> <?php echo $row->bairro_empresa ?>
                                </td>
                                <td>
                                    <strong>Cidade:</strong>
                                    <br> <?php echo $row->cidade_empresa ?>
                                </td>
                                <td>
                                    <strong>CEP:</strong>
                                    <br> <?php echo $row->cep_empresa ?>
                                </td>
                                <td colspan="2">
                                    <strong>Estado:</strong>
                                    <br> <?php echo $row->estado_empresa ?>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="1">
                                    <strong>Telefone:</strong>
                                    <br> <?php echo $row->telefone_empresa ?>
                                </td>
                                <td colspan="2">
                                    <strong>Cargo:</strong>
                                    <br> <?php echo $row->cargo_empresa ?>
                                </td>
                                <td colspan="2">
                                    <strong>Profissão:</strong>
                                    <br> <?php echo $row->profissao ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                    <!--************************************************-->

                    <!-- Head dos dados do conjuge -->
                    <tr>
                        <th colspan="5" style="background-color: #E0E0E0;">
                    <div align="center">
                        DADOS DO CONJUGE
                    </div>
                    </th>
                    </tr>
                    <!--************************************************-->

                    <!-- DADOS DO CONJUGE -->
                    <?php
                    	if($dados_conjuge)
                    	{
							foreach ($dados_conjuge as $row)
							{
							?>
	                            <tr >
	                                <td colspan="3">
	                                    <strong>Nome Completo:</strong>
	                                    <br><?php echo $row->nome_conjuge ?>
	                                </td>
	                                <td colspan="2">
	                                    <strong>CPF(<small>número e controle</small>):</strong>
	                                    <br><?php echo $row->cpf_conjuge ?>
	                                </td>
	                            </tr>
	
	                            <tr>
	                                <td colspan="1">
	                                    <strong>Número da Identidade:</strong>
	                                    <br><?php echo $row->identidade_conjuge ?>
	                                </td>
	                                <td colspan="1">
	                                    <strong>Data de expedição:</strong>
	                                    <br><?php echo $row->data_expedicao_conjuge ?>
	                                </td>
	                                <td colspan="1">
	                                    <strong>Órgão emissor/ estado:</strong>
	                                    <br><?php echo $row->orgao_emissor_conjuge ?>
	                                </td>
	                                <td colspan="2">
	                                    <strong>Data de nascimento:</strong>
	                                    <br><?php echo $row->data_nascimento_conjuge ?>
	                                </td>
	                            </tr>
	
	                            <tr>
	                                <td colspan="2">
	                                    <strong>Naturalidade/ estado:</strong>
	                                    <br> <?php echo $row->naturalidade_estado_conjuge ?>
	                                </td>
	                                <td colspan="3">
	                                    <strong>Nacionalidade:</strong> 1 - Brasileira&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 - Estrangeira
	                                    <br>(&nbsp;&nbsp;<?php echo $row->nacionalidade_conjuge ?>&nbsp;&nbsp;)
	                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                    2 - Naturalizado &nbsp;&nbsp;&nbsp;4 - Apátrida
	                                </td>
	                            </tr>
	
	                            <tr>
	                                <td colspan="1">
	                                    <strong>Trabalha?:</strong> 1 - Sim
	                                    <br>(&nbsp;&nbsp;<?php echo $row->situacao_emprego_conjuge ?>&nbsp;&nbsp;)
	                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                    2 - Não
	                                </td>
	                                <td colspan="2">
	                                    <strong>Empresa onde trabalha:</strong>
	                                    <br><?php echo $row->empresa_conjuge ?>
	                                </td>
	                                <td colspan="1">
	                                    <strong>CNPJ:</strong>
	                                    <br><?php echo $row->cnpj_empresa_conjuge ?>
	                                </td>
	                                <td colspan="1">
	                                    <strong>Data de Admissão:</strong>
	                                    <br><?php echo $row->data_admissao_conjuge ?>
	                                </td>
	                            </tr>
	
	                            <tr>
	                                <td colspan="2">
	                                    <strong>Endereço comercial (rua, avenida, praça, etc.):</strong>
	                                    <br><?php echo $row->endereco_comercial_conjuge ?>
	                                </td>
	                                <td colspan="1">
	                                    <strong>Número:</strong>
	                                    <br> <?php echo $row->numero_empresa_conjuge ?>
	                                </td>
	                                <td colspan="2">
	                                    <strong>Complemento:</strong>
	                                    <br> <?php echo $row->complemento_empresa_conjuge ?>
	                                </td>
	                            </tr>
	
	                            <tr>
	                                <td>
	                                    <strong>Telefone:</strong>
	                                    <br> <?php echo $row->telefone_empresa_conjuge ?>
	                                </td>
	                                <td>
	                                    <strong>Cargo:</strong>
	                                    <br><?php echo $row->cargo_empresa_conjuge ?>
	                                </td>
	                                <td>
	                                    <strong>Salário:</strong>
	                                    <br><?php echo $row->salario_conjuge ?>
	                                </td>
	                                <td colspan="2">
	                                    <strong>Profissão:</strong>
	                                    <br><?php echo $row->profissao_conjuge ?>
	                                </td>
	                            </tr>
	                            <?php
	                        }
						}
						else
						{
							?>
							<tr>
	                        	<td colspan="3">
	                           		<strong>Nome Completo:</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td colspan="2">
	                            	<strong>CPF(<small>número e controle</small>):</strong>
	                                <br>&nbsp;
	                            </td>
	                        </tr>
	
	                        <tr>
	                            <td colspan="1">
	                                <strong>Número da Identidade:</strong>
	                                <br>&nbsp;
	                             </td>
	                             <td colspan="1">
	                             	<strong>Data de expedição:</strong>
	                                <br>&nbsp;
	                             </td>
	                             <td colspan="1">
	                                <strong>Órgão emissor/ estado:</strong>
	                                <br>&nbsp;
	                             </td>
	                             <td colspan="2">
	                                 <strong>Data de nascimento:</strong>
	                                 <br>&nbsp;
	                            </td>
	                        </tr>
	
	                        <tr>
	                            <td colspan="2">
	                                <strong>Naturalidade/ estado:</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td colspan="3">
	                                <strong>Nacionalidade:</strong> 1 - Brasileira&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 - Estrangeira
	                                <br>(&nbsp;&nbsp;&nbsp;&nbsp;)
	                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                2 - Naturalizado &nbsp;&nbsp;&nbsp;4 - Apátrida
	                            </td>
	                        </tr>
	
	                        <tr>
	                            <td colspan="1">
	                                <strong>Trabalha?:</strong> 1 - Sim
	                                <br>(&nbsp;&nbsp;&nbsp;&nbsp;)
	                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                2 - Não
	                            </td>
	                            <td colspan="2">
	                                <strong>Empresa onde trabalha:</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td colspan="1">
	                               <strong>CNPJ:</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td colspan="1">
	                               <strong>Data de Admissão:</strong>
	                                 <br>&nbsp;
	                            </td>
	                        </tr>
	
	                        <tr>
	                            <td colspan="2">
	                        	    <strong>Endereço comercial (rua, avenida, praça, etc.):</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td colspan="1">
	                        	    <strong>Número:</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td colspan="2">
	                                <strong>Complemento:</strong>
	                                <br>&nbsp;
	                            </td>
	                        </tr>
	
	                        <tr>
	                        	<td>
	                            	<strong>Telefone:</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td>
	                            	<strong>Cargo:</strong>
	                            	<br>&nbsp;
	                            </td>
	                            <td>
	                            	<strong>Salário:</strong>
	                                <br>&nbsp;
	                            </td>
	                            <td colspan="2">
	                            	<strong>Profissão:</strong>
	                                <br>&nbsp;
	                            </td>
	                        </tr>
							<?php
						}
                    ?>
                    <!--************************************************-->

                    <!-- Head dos dados de referencias -->
                    <tr>
                        <th colspan="5" style="background-color: #E0E0E0;">
                            <div align="center">
                                REFERÊNCIAS COMERCIAIS, PESSOAIS E BANCÁRIAS
                            </div>
                        </th>
                    </tr>
                    <!--************************************************-->

                    <!-- REFERÊNCIAS PESSOAIS -->
                    <?php
                        if (!$referencias)
                        {
                            for ($i = 0; $i < 3; $i++)
                            {
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <strong>Nome:</strong>
                                        <br>&nbsp;
                                    </td>
                                    <td colspan="2">
                                        <strong>Endereço:</strong>
                                        <br>&nbsp;
                                    </td>
                                    <td>
                                        <strong>Telefone:</strong>
                                        <br>&nbsp;
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            $i = 0;
                            
                            foreach ($referencias as $row)
                            {
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <strong>Nome:</strong>
                                        <br><?php echo $row->nome_referencia?>
                                    </td>
                                    <td colspan="2">
                                        <strong>Endereço:</strong>
                                        <br><?php echo $row->endereco_referencia?>
                                    </td>
                                    <td>
                                        <strong>Telefone:</strong>
                                        <br><?php echo $row->telefone_referencia ?>
                                    </td>
                                </tr>
                                <?php
                                    $i++;
                            }
                            while($i < 3)
                            {
                                ?>
                                <tr>
                                    <td colspan="2">
                                        <strong>Nome:</strong>
                                        <br>&nbsp;
                                    </td>
                                    <td colspan="2">
                                        <strong>Endereço:</strong>
                                        <br>&nbsp;
                                    </td>
                                    <td>
                                        <strong>Telefone:</strong>
                                        <br>&nbsp;
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                    ?>
                    <!--************************************************-->
                </table>
            </div>
        </div>
        <!--************************************************************-->
        <br>
        <br>
        <br>
    </body>
</html>