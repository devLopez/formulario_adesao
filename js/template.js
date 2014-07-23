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
    
    /** Esconde o elemento carregando **/
    $(window).load(function() {
        $('.doc-loader').fadeOut('slow');
    });

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