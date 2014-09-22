<link href="./js/smart-wizard/css/smart_wizard_vertical.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./js/validacao/valida_cpf.js"></script>
<script type="text/javascript" src="./js/valida_inscricao.js"></script>
<script type="text/javascript">

    /** Inicialização do jquery **/
    $(document).ready(function() {

        /** Adiciona a classe active ao menu correspondente **/
        $('#menu-solicitacoes').addClass('selected').click(function(e) {
            e.preventDefault();
        });

        /**
         * Faz a página rolar para o início quando clicar os botões de anterior e próximo
         */
        $('.buttonNext, .buttonPrevious').click(function() {
            $('html, body').animate({
                scrollTop: $('#topo').offset().top
            }, 200);
        });
    });

    /** Função desenvolvida para salvar os dados via ajax **/
    function finalizar()
    {
        $.ajax({
            url: '<?php echo app_baseurl().'painel/nova_solicitacao/salvar_dados' ?>',
            type: 'POST',
            data: {
                nome_pai: $('#nome_pai').val(),
                nome_mae: $('#nome_mae').val(),
                data_nascimento: $('#data_nascimento').val(),
                numero_identidade: $('#numero_identidade').val(),
                orgao_emissor: $('#orgao_emissor').val(),
                data_emissao: $('#data_emissao').val(),
                naturalidade_estado: $('#naturalidade_estado').val(),
                nacionalidade: $('#nacionalidade').val(),
                sexo: $('#sexo').val(),
                escolaridade: $('#escolaridade').val(),
                estado_civil: $('#estado_civil').val(),
                numero_dependentes: $('#numero_dependentes').val(),
                endereco_residencial: $('#endereco_residencial').val(),
                numero_residencia: $('#numero_residencia').val(),
                complemento_residencia: $('#complemento_residencia').val(),
                bairro: $('#bairro').val(),
                cidade: $('#cidade').val(),
                cep: $('#cep').val(),
                situacao_residencia: $('#situacao_residencia').val(),
                anos_residencia: $('#anos_residencia').val(),
                telefone: $('#telefone').val(),
                celular: $('#celular').val(),
                email: $('#email').val(),
                profissao: $('#profissao').val(),
                situacao_atual: $('#situacao_atual').val(),
                data_admissao: $('#data_admissao').val(),
                salario: $('#salario').val(),
                outras_rendas: $('#outras_rendas').val(),
                valor_outras_rendas: $('#valor_outras_rendas').val(),
                renda_mensal_familiar: $('#renda_mensal_familiar').val(),
                nome_empresa: $('#nome_empresa').val(),
                cnpj_empresa: $('#cnpj_empresa').val(),
                tempo_empresa: $('#tempo_empresa').val(),
                endereco_empresa: $('#endereco_empresa').val(),
                numero_empresa: $('#numero_empresa').val(),
                complemento_empresa: $('#complemento_empresa').val(),
                bairro_empresa: $('#bairro_empresa').val(),
                cep_empresa: $('#cep_empresa').val(),
                cidade_empresa: $('#cidade_empresa').val(),
                estado_empresa: $('#estado_empresa').val(),
                telefone_empresa: $('#telefone_empresa').val(),
                cargo_empresa: $('#cargo_empresa').val(),
                nome_conjuge: $('#nome_conjuge').val(),
                cpf_conjuge: $('#cpf_conjuge').val(),
                identidade_conjuge: $('#identidade_conjuge').val(),
                data_expedicao_conjuge: $('#data_expedicao_conjuge').val(),
                orgao_emissor_conjuge: $('#orgao_emissor_conjuge').val(),
                data_nascimento_conjuge: $('#data_nascimento_conjuge').val(),
                naturalidade_estado_conjuge: $('#naturalidade_estado_conjuge').val(),
                nacionalidade_conjuge: $('#nacionalidade_conjuge').val(),
                situacao_emprego_conjuge: $('#situacao_emprego_conjuge').val(),
                empresa_conjuge: $('#empresa_conjuge').val(),
                cnpj_empresa_conjuge: $('#cnpj_empresa_conjuge').val(),
                data_admissao_conjuge: $('#data_admissao_conjuge').val(),
                endereco_comercial_conjuge: $('#endereco_comercial_conjuge').val(),
                numero_empresa_conjuge: $('#numero_empresa_conjuge').val(),
                complemento_empresa_conjuge: $('#complemento_empresa_conjuge').val(),
                telefone_empresa_conjuge: $('#telefone_empresa_conjuge').val(),
                cargo_empresa_conjuge: $('#cargo_empresa_conjuge').val(),
                salario_conjuge: $('#salario_conjuge').val(),
                profissao_conjuge: $('#profissao_conjuge').val()
            },
            dataType: 'json',
            success: function(sucesso)
            {
                if (sucesso.pessoais == 1 || sucesso.profissionais == 1)
                {
                    $.SmartMessageBox({
                        title: '<i class="fa fa-thumbs-up" style="color:green;"></i> Sucesso',
                        content: '<p><strong>Os seus dados foram salvos.</strong></p><p>Numero de protocolo: ' + sucesso.numero_protocolo + '</p><p><strong>Deseja registrar seus dependentes agora?</strong></p>',
                        buttons: '[Agora não][Sim, registrar meus dependentes]'
                    }, function(e) {
                        if (e == "Sim, registrar meus dependentes")
                        {
                            location.href = '<?php echo app_baseurl().'painel/dependentes' ?>';
                        }
                        else
                        {
                            location.href = '<?php echo app_baseurl().'painel/meus_dados' ?>';
                        }
                    });
                }
                else
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Por algum motivo os seus dados não foram salvos. Tente novamente</strong>",
                        iconSmall: "fa fa-thumbs-down bounce animated",
                        color: "#FE1A00",
                        timeout: 5000
                    });
                }
            }
        });
    }
</script>

<div class="container">
    <div class="row tryNowTeaser" id="topo">
        <div class="span9">
            <h2><i class="fa fa-ticket"></i> Nova inscrição</h2>
            <h4>Preencha os dados abaixo, imprima e leve o formulário de inscrição até a secretaria do clube</h4>
        </div>
    </div>
    <hr>

    <form id="form_inscricao">
        <div class="row tryNowTeaser">
            <div class="span12">
                <div id="wizard" class="swMain">

                    <!-- Menu de navegação do wizard -->
                    <ul>
                        <li>
                            <a href="#step-1">
                                <span class="stepNumber">1</span>
                                <span class="stepDesc">
                                    Pessoais<br />
                                    <small>Seus dados pessoais</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="stepNumber">2</span>
                                <span class="stepDesc">
                                    Profissionais<br />
                                    <small>Seus dados profissionais</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <span class="stepNumber">3</span>
                                <span class="stepDesc">
                                    Conjuge<br />
                                    <small>Dados do cônjuge</small>
                                </span>                   
                            </a>
                        </li>
                    </ul>
                    <!--*************************************************************-->

                    <!-- Div para preenchimento dos dados pessoais -->
                    <div id="step-1">
                        <h2 class="StepTitle">Meus dados pessoais</h2>

                        <div class="control-group">
                            <label for="nome_pai"><strong>Nome do Pai:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="nome_pai" name="nome_pai" autofocus>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="nome_mae"><strong>Nome da Mãe:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="nome_mae" name="nome_mae">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="data_nascimento"><strong>Data de nascimento:</strong></label>
                            <div class="controls">
                                <input class="span5 datas" type="text" id="data_nascimento" name="data_nascimento">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="numero_identidade"><strong>Número da identidade</strong> (<small>Somente pontos e números</small>):</label>
                            <div class="controls">
                                <input class="span5" type="text" id="numero_identidade" name="numero_identidade">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="orgao_emissor"><strong>Orgão emissor/ estado:</strong></label>
                            <div class="controls">
                                <input class="span5 or_e" type="text" id="orgao_emissor" name="orgao_emissor">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="data_emissao"><strong>Data de emissão:</strong></label>
                            <div class="controls">
                                <input class="span5 datas" type="text" id="data_emissao" name="data_emissao">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="naturalidade_estado"><strong>Naturalidade:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="naturalidade_estado" name="naturalidade_estado">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="nacionalidade"><strong>Nacionalidade:</strong></label>
                            <div class="controls">
                                <select class="span5" id="nacionalidade" name="nacionalidade">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">Brasileira</option>
                                    <option value="2">Naturalizado</option>
                                    <option value="3">Estrangeiro</option>
                                    <option value="3">Apátrido</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="sexo"><strong>Sexo:</strong></label>
                            <div class="controls">
                                <select class="span5" id="sexo" name="sexo">
                                    <option value="">Selecione uma opção</option>
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="escolaridade"><strong>Escolaridade:</strong></label>
                            <div class="controls">
                                <select class="span5" id="escolaridade" name="escolaridade">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">1º Grau Incompleto</option>
                                    <option value="2">1º Grau Completo</option>
                                    <option value="3">2º Grau Incompleto</option>
                                    <option value="4">2º Grau Completo</option>
                                    <option value="5">Superior Incompleto</option>
                                    <option value="6">Superior Completo</option>
                                    <option value="7">Pós-graduação</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="estado_civil"><strong>Estado Civil:</strong></label>
                            <div class="controls">
                                <select class="span5" id="estado_civil" name="escolaridade">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">Casado c/ separação de bens</option>
                                    <option value="2">Casado c/ comunhão de bens</option>
                                    <option value="3">Viúvo</option>
                                    <option value="4">Solteiro</option>
                                    <option value="5">Desquitado ou divorciado</option>
                                    <option value="6">Marital</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="numero_dependentes"><strong>Nº de dependentes:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="numero_dependentes" name="numero_dependentes">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="endereco_residencial"><strong>Endereço residencial:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="endereco_residencial" name="endereco_residencial">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="numero_residencia"><strong>Numero</strong> (<small>somente o número</small>):</label>
                            <div class="controls">
                                <input class="span5" type="text" id="numero_residencia" name="numero_residencia">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="complemento_residencia"><strong>Complemento:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="complemento_residencia" name="complemento_residencia">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="bairro"><strong>Bairro:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="bairro" name="bairro">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="cidade"><strong>Cidade:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="cidade" name="cidade">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="cep"><strong>CEP:</strong></label>
                            <div class="controls">
                                <input class="span5 cep" type="text" id="cep" name="cep">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="situacao_residencia"><strong>Residência:</strong></label>
                            <div class="controls">
                                <select class="span5" id="situacao_residencia" name="situacao_residencia">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">Própria</option>
                                    <option value="2">Financiada</option>
                                    <option value="3">Alugada</option>
                                    <option value="4">Com os pais</option>
                                    <option value="5">Outros</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="anos_residencia"><strong>Há quantos anos?</strong> (<small>somente números</small>):</label>
                            <div class="controls">
                                <input class="span5" type="text" id="anos_residencia" name="anos_residencia">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="telefone"><strong>Telefone p/ contato:</strong></label>
                            <div class="controls">
                                <input class="span5 fone" type="text" id="telefone" name="telefone">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="celular"><strong>Celular:</strong></label>
                            <div class="controls">
                                <input class="span5 fone" type="text" id="celular" name="celular">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="email"><strong>Endereço de correio eletrônio (e-mail):</strong></label>
                            <div class="controls">
                                <input class="span5" type="email" id="email" name="email">
                            </div>
                        </div>
                    </div>
                    <!--*************************************************************-->

                    <!-- div que contem o formulário dos dados profissionais -->
                    <div id="step-2">
                        <h2 class="StepTitle">Dados Profissionais</h2>

                        <div class="control-group">
                            <label class="control-label"><strong>Profissão:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="profissao" name="profissao">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Situação atual:</strong></label>
                            <div class="controls">
                                <select class="span5" id="situacao_atual" name="situacao_atual">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">Empregado</option>
                                    <option value="2">Autônomo</option>
                                    <option value="3">Proprietário</option>
                                    <option value="4">Servidor público</option>
                                    <option value="5">Aposentado</option>
                                    <option value="6">Desempregado</option>
                                    <option value="7">Outros</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Data de admissão na empresa:</strong></label>
                            <div class="controls">
                                <input class="span5 datas" type="text" id="data_admissao" name="data_admissao">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Salário:</strong></label>
                            <div class="controls">
                                <input class="span5 renda" type="text" id="salario" name="salario">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Outras rendas:</strong></label>
                            <div class="controls">
                                <select class="span5" id="outras_rendas" name="outras_rendas">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">Anual</option>
                                    <option value="2">Mensal</option>
                                    <option value="3">Nenhuma renda extra</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Valor:</strong></label>
                            <div class="controls">
                                <input class="span5 renda" type="text" id="valor_outras_rendas" name="valor_outras_rendas">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Renda mensal familiar:</strong></label>
                            <div class="controls">
                                <input class="span5 renda" type="text" id="renda_mensal_familiar" name="renda_mensal_familiar">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class='control-label'><strong>Nome da empresa que trabalha:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="nome_empresa" name="nome_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>CNPJ:</strong></label>
                            <div class="controls">
                                <input class="span5 cnpj" type="text" id="cnpj_empresa" name="cnpj_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="controls"><strong>Tempo de existência da empresa:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="tempo_empresa" name="tempo_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Endereço comercial:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="endereco_empresa" name="endereco_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Número:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="numero_empresa" name="numero_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Complemento:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="complemento_empresa" name="complemento_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Bairro:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="bairro_empresa" name="bairro_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>CEP:</strong></label>
                            <div class="controls">
                                <input class="span5 cep" type="text" id="cep_empresa" name="cep_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Cidade:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="cidade_empresa" name="cidade_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Estado:</strong></label>
                            <div class="controls">
                                <select class="span5" id="estado_empresa" name="estado_empresa">
                                    <option>Selecione uma opção</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Alagoas">Alagoas</option>
                                    <option value="Amapá">Amapá</option>
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Bahia">Bahia</option>
                                    <option value="Ceará">Ceará</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Espírito Santo">Espírito Santo</option>
                                    <option value="Goiás">Goiás</option>
                                    <option value="Maranhão">Maranhão</option>
                                    <option value="Mato Grosso">Mato Grosso</option>
                                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                    <option value="Minas Gerais">Minas Gerais</option>
                                    <option value="Pará">Pará</option>
                                    <option value="Paraíba">Paraíba</option>
                                    <option value="Paraná">Paraná</option>
                                    <option value="Pernambuco">Pernambuco</option>
                                    <option value="Piauí">Piauí</option>
                                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                                    <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                    <option value="Rondônia">Rondônia</option>
                                    <option value="Roraima">Roraima</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="São Paulo">São Paulo</option>
                                    <option value="Sergipe">Sergipe</option>
                                    <option value="Tocantins">Tocantins</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Telefone:</strong></label>
                            <div class="controls">
                                <input class="span5 fone" type="text" id="telefone_empresa" name="telefone_empresa">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Cargo:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="cargo_empresa" name="cargo_empresa">
                            </div>
                        </div>
                    </div>
                    <!--*************************************************************-->

                    <!-- Div que contem os formulário dos dados do conjuge -->
                    <div id="step-3">
                        <h2 class="StepTitle">Dados do conjuge</h2>

                        <div class="control-group">
                            <label><strong>Nome:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="nome_conjuge" name="nome_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>CPF:</strong></label>
                            <div class="controls">
                                <input class="span5 cpf" type="text" id="cpf_conjuge" name="cpf_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Identidade:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="identidade_conjuge" name="identidade_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Data de expedição:</strong></label>
                            <div class="controls">
                                <input class="span5 datas" type="text" id="data_expedicao_conjuge" name="data_expedicao_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Órgão emissor/ estado:</strong></label>
                            <div class="controls">
                                <input class="span5 or_e" type="text" id="orgao_emissor_conjuge" name="orgao_emissor_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Data de nascimento:</strong></label>
                            <div class="controls">
                                <input class="span5 datas" type="text" id="data_nascimento_conjuge" name="data_nascimento_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Naturalidade/ estado:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="naturalidade_estado_conjuge" name="naturalidade_estado_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Nacionalidade:</strong></label>
                            <div class="controls">
                                <select class="span5" id="nacionalidade_conjuge" name="nacionalidade_conjuge">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">Brasileira</option>
                                    <option value="2">Naturalizado</option>
                                    <option value="3">Estrangeiro</option>
                                    <option value="4">Apátrido</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Trabalha?:</strong></label>
                            <div class="controls">
                                <select class="span5" id="situacao_emprego_conjuge" name="situacao_emprego_conjuge">
                                    <option value="">Selecione uma opção</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Nome da empresa onde trabalha:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="empresa_conjuge" name="empresa_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>CNPJ:</strong></label>
                            <div class="controls">
                                <input class="span5 cnpj" type="text" id="cnpj_empresa_conjuge" name="cnpj_empresa_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Data de admissão:</strong></label>
                            <div class="controls">
                                <input class="span5 datas" type="text" id="data_admissao_conjuge" name="data_admissao_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Endereço comercial:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="endereco_comercial_conjuge" name="endereco_comercial_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Número:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="numero_empresa_conjuge" name="numero_empresa_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Complemento:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="complemento_empresa_conjuge" name="complemento_empresa_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Telefone:</strong></label>
                            <div class="controls">
                                <input class="span5 fone" type="text" id="telefone_empresa_conjuge" name="telefone_empresa_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Cargo:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="cargo_empresa_conjuge" name="cargo_empresa_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Salário:</strong></label>
                            <div class="controls">
                                <input class="span5 renda" type="text" id="salario_conjuge" name="salario_conjuge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label><strong>Profissão:</strong></label>
                            <div class="controls">
                                <input class="span5" type="text" id="profissao_conjuge" name="profissao_conjuge">
                            </div>
                        </div>
                    </div>
                    <!--*************************************************************-->

                </div>
            </div>
        </div>
    </form>
</div>