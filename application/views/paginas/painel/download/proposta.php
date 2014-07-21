<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Proposta de cota</title>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    </head>
    <body>
        <?php
            if(!isset($dados_pessoais))
            {
                ?>
                <div class="alert alert-block alert-danger">
                    Ocorreu um erro na busca dos seus dados pessoais
                </div>
                <?php
            }
        ?>

        <!-- Contém o HEADER do site -->
        <div class="header">
            <div class="container">

                <div class="row">
                        <div class="span6">
                            <img src="./img/logo.gif" alt="Pentáurea Clube">
                        </div>
                    <div class="span6 pull-rigth">
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align:center">
                                    Valor da Cota
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <ul style="list-style:none">
                                        <li>R$2070,00 à vista</li>
                                        <li>
                                            R$2300,00 à prazo, em até
                                            <strong>
                                                10 parcelas (cheque ou cartão)
                                            </strong>
                                        </li>
                                        <li>
                                            Taxa de condomínio de R$125,00.
                                            <strong>(Isento por 3 meses)</strong>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="span3">
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align:center">
                                    Aprovado pela comissão de sindicância
                                </th>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <br>
                                    ........../........../..........
                                    <br><br>
                                    ........................................
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="span6">
                        <div align="center">
                            <h3>O melhor e mais belo clube campestre da região</h3>
                        </div>
                        <p style="text-align:center">
                            Rodovia BR – 135, KM 23
                            <br>RESTAURANTE – VOLEIBOL – NATAÇÃO
                            <br>FUTEBOL – PARQUE INFANTIL
                            <br><br><strong>Proposta de Sócio Proprietário</strong>
                        </p>
                    </div>

                    <div class="span3">
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-align:center">
                                    Aprovado pela diretoria
                                </th>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    <br>
                                    ........../........../..........
                                    <br><br>
                                    ........................................
                                    <br>Presidente
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <!--*****************************************************************-->

        <!-- Div onde serão inseridas as informações do associado -->
        <div id="corpo">
            <div class="container">
                <div class="row">
                    <div class="span12">

                        <p class="pull-right">
                            Montes Claros, <?php echo $dia ?> de <?php echo $mes ?> de <?php echo $ano ?>
                        </p>
                        <br><br>
                        <p style="text-align:justify">
                            O abaixo assinado, desejando fazer parte do Pentáurea Clube como
                            sócio proprietário preenche os claros abaixo e requer sua inscrição
                            comprometendo fiel obediência aos Estatutos,
                            e a começar do mês de
                            <strong><?php echo $mes ?> de <?php echo $ano ?></strong>
                        </p>

                        <br>
                        <p style="text-align:left">
                            <strong>Nome: </strong><?php echo $nome_proponente ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                                foreach($dados_pessoais as $row)
                                {
                                    $residencia = $row->endereco_residencial.', '.$row->numero_residencia.' '.$row->complemento_residencia.', '.$row->bairro.', '.$row->cidade;
                                    ?>
                                    <strong>Data nasc:</strong> <?php echo $row->data_nascimento ?>
                                    <br><strong>Filiação:</strong> <?php echo $row->nome_pai.' / '.$row->nome_mae ?>
                                    <br><strong>Nacionalidade:</strong>
                                    <?php
                                    if($row->nacionalidade == 1)
                                    {
                                        echo 'Brasileira';
                                    }
                                    elseif($row->nacionalidade == 2)
                                    {
                                        echo 'Naturalizado';
                                    }
                                    elseif($row->nacionalidade == 3)
                                    {
                                        echo 'Estrangeira';
                                    }
                                    else
                                    {
                                        echo 'Apátrida';
                                    }
                                    ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong>Naturalidade:</strong> <?php echo $row->naturalidade_estado ?>
                                    <br><strong>Estado Civil:</strong>
                                    <?php
                                    if($row->estado_civil == 1)
                                    {
                                        echo 'Casado c/ separação de bens';
                                    }
                                    elseif($row->estado_civil == 2)
                                    {
                                        echo 'Casado c/ comunhão de bens';
                                    }
                                    elseif($row->estado_civil == 3)
                                    {
                                        echo 'Viúvo';
                                    }
                                    elseif($row->estado_civil == 4)
                                    {
                                        echo 'Solteiro';
                                    }
                                    elseif($row->estado_civil == 5)
                                    {
                                        echo 'Desquitado ou divorciado';
                                    }
                                    else
                                    {
                                        echo 'Marital';
                                    }
                                    ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong>Profissão:</strong> 
                                    <?php
                                    foreach($dados_profissionais as $row)
                                    {
                                        echo $row->profissao;
                                    }
                                    ?>
                                    <?php
                                }
                            ?>
                        </p>

                    </div>
                </div>

                <div class="row">
                    <div class="span12">
                        <div align="center">
                            <h3>
                                Dependentes
                                <small>
                                    (pessoas que vivem sob dependência legal) -
                                    <span class="label label-success">
                                        Vide Art. 13 do estatuto
                                    </span>
                                </small>
                            </h3>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align:center">nº</th>
                                    <th style="text-align:center">DEPENDENTE</th>
                                    <th style="text-align:center">PARENTESCO</th>
                                    <th style="text-align:center">DATA DE NASCIMENTO</th>
                                    <th style="text-align:center">ESTADO CIVIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach($dependentes as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row->nome_dependente ?></td>
                                            <td><?php echo $row->parentesco_dependente ?></td>
                                            <td><?php echo $row->data_nascimento_dependente ?></td>
                                            <td><?php echo $row->estado_civil_dependente ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    while($i != 11)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                            $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class='row'>
                    <div class="span12">
                        <p style="text-align:center">
                            <strong>Residência</strong>: <?php echo $residencia ?>
                        </p>
                        <p style="text-align:center">
                            ..........................................................
                            <br>Assinatura do Proponente a Sócio
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="span12">
                        <p style="text-align:center">
                            <strong>Esta proposta está sendo abonada pelos sócios proprietários, abaixo relacionados, adimplentes com o clube:</strong><br><br>
                            1) .............................................................. Assinatura: ........................................................................<br><br>
                            2) .............................................................. Assinatura: ........................................................................
                        </p>
                        <p style="text-align:justify">
                            <small>
                                <strong><span class="label label-info">Nota:</span> </strong>O proponente a sócio
                                proprietário ao preencher esta proposta, autoriza
                                expressamente a consulta de seus dados e dos seus
                                dependentes a Bancos de Dados Cadastrais e estará
                                submetendo o seu nome e dos seus dependentes a
                                análise do Conselho de Sindicância para aprovação
                                ou não e declara aceitar o resultado da referida análise.
                            </small>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="span12">
                        <p style="text-align:center">
                            Considera-se Sócio Dependente, com direitos e deveres conferidos no Estatuto:
                        </p>
                        <div class="alert alert-error">
                            <p style="text-align:justify">
                                I - o cônjuge ou companheiro(a) que viva com o
                                titular em regime de união estável, comprovada
                                por declaração firmada pelo sócio e companheiro(a)
                                e 02 sócios proprietários como testemunhas;
                            </p>
                        </div>
                        <div class="alert alert-error">
                            <p style="text-align:justify">
                                II – o filho(a), enteado(a) e/ou tutelado(a),
                                solteiro(a) e sem dependentes, até a idade de 21
                                (vinte e um) anos. Após atingir essa idade, poderá
                                continuar nessa categoria até completar 28 anos,
                                desde que comprove depender econômica e financeiramente
                                do Sócio Proprietário e ser estudante universitário
                                ou estar regularmente cursando pós-graduação.
                                O filho incapaz não terá limite de idade, será sempre dependente.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--*****************************************************************-->
    </body>
</html>