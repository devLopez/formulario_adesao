/**
 * @name        valida_inscrição
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    funções desenvolvidas para validação de formulário de inscrição
 */

$(document).ready(function() {

    /** Converte a div #wizard no passo-a-passo das inscrições **/
    $('#wizard').smartWizard({
        keyNavigation: false,
        labelNext: 'Próximo',
        labelPrevious: 'Anterior',
        labelFinish: 'Finalizar',
        onLeaveStep: deixa_passo,
        onFinish: valida_passo3
    });

    /** Adiciona a máscara de data de nascimento **/
    $('.datas').mask('99/99/9999', {placeholder: '*'});

    /** Adiciona máscara para o órgão emissor de identidade **/
    $('.or_e').mask('aaa-aa', {placeholder: '*'});

    /** Adiciona aos elementos a máscara de telefone **/
    $('.fone').mask('(99)9999-9999', {placeholder: '*'});

    /** Adiciona mascara monetária aos campos de salario **/
    $('.renda').maskMoney({
        prefix: 'R$ ',
        allowNegative: false,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    });

    /** Adiciona mascara para formatação do cnpj **/
    $('.cnpj').mask('99.999.999/9999-99', {placeholder: '*'}).blur(function() {

        resposta = validarCNPJ($(this).val());

        if (resposta == false)
        {
            $(this).val('');
            $.smallBox({
                title: "<i class='fa fa-check'></i> Atenção",
                content: "<strong>Favor preencher com um CNPJ válido</strong>",
                iconSmall: "fa fa-thumbs-down bounce animated",
                color: "#FE1A00",
                timeout: 5000
            });
        }
    });


    /** Adiciona mascara de cpf **/
    $('.cpf').mask('999.999.999-99', {placeholder: '*'}).blur(function() {
        resposta = validarCPF($(this).val());

        if (resposta == false)
        {
            $(this).val('');
            $.smallBox({
                title: "<i class='fa fa-check'></i> Atenção",
                content: "<strong>Favor preencher com um CPF válido</strong>",
                iconSmall: "fa fa-thumbs-down bounce animated",
                color: "#FE1A00",
                timeout: 5000
            });
        }
    });

    /** Adiciona mascara de cep **/
    $('.cep').mask('99999-999', {placeholder: '*'});

    /** Verificação do nome do conjuge **/
    $('#nome_conjuge, #cpf_conjuge').focus(function() {
        if ($(this).val() == "")
        {
            $.smallBox({
                title: "<i class='fa fa-check'></i> Atenção",
                content: "<strong>Ao deixar este campo em branco, os dados do cojuge não serão salvos</strong>",
                iconSmall: "fa fa-thumbs-down bounce animated",
                color: "#FE1A00",
                timeout: 3000
            });
        }
    });

});

/** Função desenvolvida para exibir mensagem de erro **/
function mensagem_erro()
{
    $.smallBox({
        title: "<i class='fa fa-check'></i> Atenção",
        content: "<strong>Estes campos são obrigatórios</strong>",
        iconSmall: "fa fa-thumbs-down bounce animated",
        color: "#FE1A00",
        timeout: 3000
    });
}

/** Função chamada quando eu pulo de um passo para outro **/
function deixa_passo(obj)
{
    var numero_passo = obj.attr('rel');
    return validar_passo(numero_passo);
}

/** Função que verifica qual o passo que será validado e então direciona p a função que validará aquele passo **/
function validar_passo(passo)
{
    var valido = true;

    if (passo == 1)
    {
        if (valida_passo1() === false)
        {
            valido = false;
            mensagem_erro();
            $('#wizard').smartWizard('setError', {stepnum: passo, iserror: true});
        }
        else
        {
            $('#wizard').smartWizard('setError', {stepnum: passo, iserror: false});
        }
    }
    if (passo == 2)
    {
        if (valida_passo2() == false)
        {
            valido = false;
            mensagem_erro();
            $('#wizard').smartWizard('setError', {stepnum: passo, iserror: true});
        }
        else
        {
            $('#wizard').smartWizard('setError', {stepnum: passo, iserror: false});
        }
    }
    return valido;
}

function valida_passo1()
{
    var valido = true;

    /** Verifica o nome do pai **/
    if ($('#nome_pai').val() == "") {
        valido = false;
        $('#nome_pai').parent().parent('.control-group').addClass('erro');
    } else {
        $('#nome_pai').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica se o nome da mãe está preenchido **/
    if ($('#nome_mae').val() == "")
    {
        valido = false;
        $('#nome_mae').parent().parent('.control-group').addClass('erro');
    } else {
        $('#nome_mae').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica a data de nascimento **/
    if ($('#data_nascimento').val() == "")
    {
        valido = false;
        $('#data_nascimento').parent().parent('.control-group').addClass('erro');
    } else {
        $('#data_nascimento').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica a naturalidade **/

    if ($('#naturalidade_estado').val() == "")
    {
        valido = false;
        $('#naturalidade_estado').parent().parent('.control-group').addClass('erro');
    } else {
        $('#naturalidade_estado').parent().parent('.control-group').removeClass('erro');
    }


    /** Verifica a nacionalidade **/
    if ($('#nacionalidade').val() == "")
    {
        valido = false;
        $('#nacionalidade').parent().parent('.control-group').addClass('erro');
    } else {
        $('#nacionalidade').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o sexo **/
    if ($('#sexo').val() == "")
    {
        valido = false;
        $('#sexo').parent().parent('.control-group').addClass('erro');
    } else {
        $('#sexo').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica a escolaridade **/
    if ($('#escolaridade').val() == "")
    {
        valido = false;
        $('#escolaridade').parent().parent('.control-group').addClass('erro');
    } else {
        $('#escolaridade').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o estado civil **/
    if ($('#estado_civil').val() == "")
    {
        valido = false;
        $('#estado_civil').parent().parent('.control-group').addClass('erro');
    } else {
        $('#estado_civil').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o endereço residencial **/
    if ($('#endereco_residencial').val() == "")
    {
        valido = false;
        $('#endereco_residencial').parent().parent('.control-group').addClass('erro');
    } else {
        $('#endereco_residencial').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o bairro **/
    if ($('#bairro').val() == "")
    {
        valido = false;
        $('#bairro').parent().parent('.control-group').addClass('erro');
    } else {
        $('#bairro').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica a cidade **/
    if ($('#cidade').val() == "")
    {
        valido = false;
        $('#cidade').parent().parent('.control-group').addClass('erro');
    } else {
        $('#cidade').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o cep **/
    if ($('#cep').val() == "")
    {
        valido = false;
        $('#cep').parent().parent('.control-group').addClass('erro');
    } else {
        $('#cep').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica a situação da residencia **/
    if ($('#situacao_residencia').val() == "")
    {
        valido = false;
        $('#situacao_residencia').parent().parent('.control-group').addClass('erro');
    } else {
        $('#situacao_residencia').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o telefone **/
    if ($('#telefone').val() == "")
    {
        valido = false;
        $('#telefone').parent().parent('.control-group').addClass('erro');
    } else {
        $('#telefone').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o celular **/
    if ($('#celular').val() == "")
    {
        valido = false;
        $('#celular').parent().parent('.control-group').addClass('erro');
    } else {
        $('#celular').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica o e-mail **/
    if ($('#email').val() == "")
    {
        valido = false;
        $('#email').parent().parent('.control-group').addClass('erro');
    } else {
        $('#email').parent().parent('.control-group').removeClass('erro');
    }


    return valido;
}

function valida_passo2()
{
    var valido = true;

    /** Verifica a situação atual **/
    if ($('#situacao_atual').val() == "")
    {
        valido = false;
        $('#situacao_atual').parent().parent('.control-group').addClass('erro');
    } else {
        $('#situacao_atual').parent().parent('.control-group').removeClass('erro');
    }

    /** Verifica se a situação empregatícia está como emnpregado, se estiver, 
     * alguns campos serão obrigatórios
     **/
    if ($('#situacao_atual').val() == 1 || $('#situacao_atual').val() == 2 || $('#situacao_atual').val() == 3)
    {
        if ($('#nome_empresa').val() == "")
        {
            $('#nome_empresa').parent().parent('.control-group').addClass('erro');
            valido = false;
        }
        else
        {
            $('#nome_empresa').parent().parent('.control-group').removeClass('erro');
        }
    }

    /** Verifica as outras rendas **/
    if ($('#outras_rendas').val() == "")
    {
        valido = false;
        $('#outras_rendas').parent().parent('.control-group').addClass('erro');
    } else {
        $('#outras_rendas').parent().parent('.control-group').removeClass('erro');

    }

    /** Verifica se existe outras rendas. Se houver, o campo valor_outras_rendas tem que ser obrigatorio **/
    if ($('#outras_rendas').val() == 1 || $('#outras_rendas').val() == 2)
    {
        if ($('#valor_outras_rendas').val() == "")
        {
            valido = false;
            $('#valor_outras_rendas').parent().parent('.control-group').addClass('erro');
        } else {
            $('#valor_outras_rendas').parent().parent('.control-group').removeClass('erro');
        }
    }

    /** Verifica a renda familiar **/
    if ($('#renda_mensal_familiar').val() == "")
    {
        valido = false;
        $('#renda_mensal_familiar').parent().parent('.control-group').addClass('erro');
    } else {
        $('#renda_mensal_familiar').parent().parent('.control-group').removeClass('erro');
    }

    /** verifica se o nome da empresa está preenchido. se estiver, alguns campos se tornam obrigatórios **/
    if ($('#nome_empresa').val() !== "")
    {
        if ($('#endereco_empresa').val() == "")
        {
            $('#endereco_empresa').parent().parent('.control-group').addClass('erro');
            valido = false;
        }
        else
        {
            $('#endereco_empresa').parent().parent('.control-group').removeClass('erro');
        }

        if ($('#numero_empresa').val() == "")
        {
            $('#numero_empresa').parent().parent('.control-group').addClass('erro');
            valido = false;
        }
        else
        {
            $('#numero_empresa').parent().parent('.control-group').removeClass('erro');
        }

        if ($('#bairro_empresa').val() == "")
        {
            $('#bairro_empresa').parent().parent('.control-group').addClass('erro');
            valido = false;
        }
        else
        {
            $('#bairro_empresa').parent().parent('.control-group').removeClass('erro');
        }

        if ($('#cidade_empresa').val() == "")
        {
            $('#cidade_empresa').parent().parent('.control-group').addClass('erro');
            valido = false;
        }
        else
        {
            $('#cidade_empresa').parent().parent('.control-group').removeClass('erro');
        }

        if ($('#estado_empresa').val() == "")
        {
            $('#estado_empresa').parent().parent('.control-group').addClass('erro');
            valido = false;
        }
        else
        {
            $('#estado_empresa').parent().parent('.control-group').removeClass('erro');
        }
    }


    return valido;
}

/** Função que validará o passo 3 **/
function valida_passo3()
{
    var valido = true;

    /** Verifica se o nome do conjuge foi digitados **/
    if ($('#nome_conjuge').val() !== "")
    {

        /** Verifica o cpf do conjuge **/
        if ($('#cpf_conjuge').val() == "") {
            valido = false;
            $('#cpf_conjuge').parent().parent('.control-group').addClass('erro');
        } else {
            $('#cpf_conjuge').parent().parent('.control-group').removeClass('erro');
        }

        /** Verifica a data de nascimento do conjuge **/
        if ($('#data_nascimento_conjuge').val() == "") {
            valido = false;
            $('#data_nascimento_conjuge').parent().parent('.control-group').addClass('erro');
        } else {
            $('#data_nascimento_conjuge').parent().parent('.control-group').removeClass('erro');
        }

        /** Verifica a naturalidade do conjuge **/
        if ($('#naturalidade_estado_conjuge').val() == "") {
            valido = false;
            $('#naturalidade_estado_conjuge').parent().parent('.control-group').addClass('erro');
        } else {
            $('#naturalidade_estado_conjuge').parent().parent('.control-group').removeClass('erro');
        }

        /** Verifica a nacionalidade do conjuge **/
        if ($('#nacionalidade_conjuge').val() == "") {
            valido = false;
            $('#nacionalidade_conjuge').parent().parent('.control-group').addClass('erro');
        } else {
            $('#nacionalidade_conjuge').parent().parent('.control-group').removeClass('erro');
        }

        /** Verifica a situação empregatícia do conjuge **/
        if ($('#situacao_emprego_conjuge').val() == "") {
            valido = false;
            $('#situacao_emprego_conjuge').parent().parent('.control-group').addClass('erro');
        } else {
            $('#situacao_emprego_conjuge').parent().parent('.control-group').removeClass('erro');
        }

        /**
         * Verifica se a situação empregaticia está marcada como sim. 
         * Se verdadeiro, alguns campos serão obrigatórios
         **/
        if ($('#situacao_emprego_conjuge').val() == 1) {

            if ($('#empresa_conjuge').val() == "")
            {
                valido = false;
                $('#empresa_conjuge').parent().parent('.control-group').addClass('erro');
            } else {
                $('#empresa_conjuge').parent().parent('.control-group').removeClass('erro');
            }

            if ($('#data_admissao_conjuge').val() == "")
            {
                valido = false;
                $('#data_admissao_conjuge').parent().parent('.control-group').addClass('erro');
            } else {
                $('#data_admissao_conjuge').parent().parent('.control-group').removeClass('erro');
            }

            if ($('#endereco_comercial_conjuge').val() == "")
            {
                valido = false;
                $('#endereco_comercial_conjuge').parent().parent('.control-group').addClass('erro');
            } else {
                $('#endereco_comercial_conjuge').parent().parent('.control-group').removeClass('erro');
            }

            if ($('#telefone_empresa_conjuge').val() == "")
            {
                valido = false;
                $('#telefone_empresa_conjuge').parent().parent('.control-group').addClass('erro');
            } else {
                $('#telefone_empresa_conjuge').parent().parent('.control-group').removeClass('erro');
            }

            if ($('#cargo_empresa_conjuge').val() == "")
            {
                valido = false;
                $('#cargo_empresa_conjuge').parent().parent('.control-group').addClass('erro');
            } else {
                $('#cargo_empresa_conjuge').parent().parent('.control-group').removeClass('erro');
            }
        }

    }
 keyNavigation: true


    if (valido == false)
    {
        mensagem_erro();
        $('#wizard').smartWizard('setError', {stepnum: 3, iserror: true});
    }
    else
    {
        $('#wizard').smartWizard('setError', {stepnum: 3, iserror: false});
        finalizar();
    }
}