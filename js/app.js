/*******************************************************************************
 * APP.JS                                                                      |
 *******************************************************************************
 * Scripts desenvolvidos para o funcionamento geral do sistema de cobrança
 * 
 * @file        ./js/app.js
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version     v1.2.0
 */

/**
 * load_ajax()
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para buscar determinadas páginas requeridas
 *              via ajax.
 * @param       {string} url Contém a URL que será carregada
 * @param       {string} container Contém o elemento que receberá a resposta ajax
 */
function load_ajax(url, container)
{
    container.html('<h4><i class="fa fa-cog fa-spin"></i> Buscando...</h4>');

    $.get(url, function(e) {
        container.html(e);
    }).fail(function() {
        container.html('<div class="alert info"><i class="fa fa-times"></i> Ocorreu um erro na busca do recurso</div>');
    });
}

/**
 * msg_success()
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para exibir uma mensagem de sucesso para o usuário
 * @param       {string} msg    Contém a mensagem que será exibida
 */
function msg_sucesso(msg)
{
    $.smallBox({
        title: "<i class='fa fa-check'></i> Sucesso",
        content: "<strong>"+msg+"</strong>",
        iconSmall: "fa fa-thumbs-up bounce animated",
        color: "#3b5998",
        timeout: 5000
    });
}
//******************************************************************************

/**
 * msg_erro()
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para exibir uma mensagem de erro para o usuário
 * @param       {string} msg Contém a mensagem que será exibida
 */
function msg_erro(msg)
{
    $.smallBox({
        title: "<i class='fa fa-times'></i> Erro",
        content: "<strong>"+msg+"</strong>",
        iconSmall: "fa fa-thumbs-down bounce animated",
        color: "#FE1A00",
        timeout: 5000
    });
}
//******************************************************************************

/**
 * limpar_campos()
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para limpar os campos de um formulário
 * @param       {string} form Contém o nome do formulário a ser limpo
 */
function limpar_campos(form)
{
	form.find("input, textarea").val("");
    form.find('radio, checkbox').prop('checked', false);
    form.find('select').prop('selected', false);
}
//******************************************************************************

/**
 * show_loading()
 * 
 * Função desenvolvida para exibir o elemento Loading
 * 
 * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 */
function show_loading()
{
    $('.carregando').fadeIn('fast');
}
//******************************************************************************

/**
 * hide_loading()
 * 
 * Função desenvolvida para esconder o elemento Loading
 * 
 * @author	:	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 */
function hide_loading()
{
    $('.carregando').fadeOut('slow');
}
//******************************************************************************

/*******************************************************************************
 * SETUP DAS REQUISIÇÕES AJAX
 *******************************************************************************
 * Funções responsáveis por exibição de mensagem quando uma requisição ajax 
 * iniciar ou terminar
 * 
 * @author 	:	Matheus Lopes Santos
 */
$(document).ajaxStart(function() {
    show_loading();
});

$(document).ajaxComplete(function() {
    hide_loading();
});

$.ajaxSetup({
    error: function(){
        msg_erro('Ocorreu um erro. Tente novamente');
    }
});
//******************************************************************************

/*******************************************************************************
 * TEMPLATE.JS
 *******************************************************************************
 * Este arquivo é resposável por gerenciar os códigos javascrists que estavam
 * ou que serão inseridos nos arquivos de template como
 * 
 *      ./application/views/template/adm.php
 *      ./application/views/template/default.php
 *      ./application/views/template/painel.php
 *      
 * Todo Javascript que for inserido em algum destes arquivos, devem ser inseridos
 * aqui, pela reusabilidade de código
 * 
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 */

/**
 * INICIALIZAÇÃO DO JQUERY
 */
$(document).ready(function() {
	
	// Cria a Div Overlay, para ser usado como background do Modal
	$('body').append('<div id="overlay" class="facebox-overlay facebox-overlay-hide facebox-overlay-active hidden"></div>');

    /** Esconde o elemento carregando **/
    $(window).load(function() {
        $('.doc-loader').fadeOut('slow');
    });
    
    hide_loading();

    /** Bloco referente aos tooltips e popovers no corpo do site **/
    $('body').tooltip({selector: '[rel="tooltip"]'});

    /** Verificação se o usuário deseja realmente fazer o logoff **/
    $('.logout-form').submit(function(e) {
        e.preventDefault();

        var url = $(this).attr('action');
        var nome = $('#nome_usuario').text();

        $.SmartMessageBox({
            title: '<i class="fa fa-fw fa-sign-out"></i> Você deseja sair' + nome,
            content: 'Você pode melhorar a segurança fechando esta aba após o logoff',
            buttons: '[Sair][Não quero sair ainda]'
        }, function(botao) {
            if (botao == 'Sair')
            {
                setTimeout(logout(url), 1000);
            }
            else
            {
                return false;
            }
        });
    });
});

/**
 * logout()
 * 
 * @author      Matheus Lopes Santos
 * @param       {string} url    Contém a url da função que realiza o logoff
 **/
function logout(url)
{
    location.href = url;
}