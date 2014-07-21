/**
 * @name        marcar_naoLida()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @argument    {string}    url Contém a url da função que processará os comandos
 * @argument    {int}       id  Contém o Id da mensagem que será processada
 * @argument    {string}    callback        Contém a função que será chamada após o processamento
 * @argument    {string}    url_callback    Contém a url do callback
 */
function marcar_naoLida(id, url, callback, url_callback)
{
    $.post(url, {id: id}).done(function(e) {
        if (e == 1)
        {
            $.smallBox({
                title: "<i class='fa fa-check'></i> Sucesso",
                content: "<strong>Mensagem marcada como não lida</strong>",
                iconSmall: "fa fa-thumbs-up bounce animated",
                color: "#3b5998",
                timeout: 5000
            });
            callback(url_callback);
        }
        else
        {
            $.smallBox({
                title: "<i class='fa fa-check'></i> Erro",
                content: "<strong>Não foi possível marcar a mensagem. Tente novamente</strong>",
                iconSmall: "fa fa-thumbs-down bounce animated",
                color: "#FE1A00",
                timeout: 5000
            });
        }
    });
}
/******************************************************************************/

/**
 * @name        marcar_naoLida()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @argument    {string}    url Contém a url da função que processará os comandos
 * @argument    {int}       id  Contém o Id da mensagem que será processada
 * @argument    {string}    callback        Contém a função que será chamada após o processamento
 * @argument    {string}    url_callback    Contém a url do callback
 */
function marcar_lida(id, url, callback, url_callback)
{
    $.post(url, {id: id}).done(function(e) {
        if (e == 1)
        {
            $.smallBox({
                title: "<i class='fa fa-check'></i> Sucesso",
                content: "<strong>Mensagem marcada como lida</strong>",
                iconSmall: "fa fa-thumbs-up bounce animated",
                color: "#3b5998",
                timeout: 5000
            });
            callback(url_callback);
        }
        else
        {
            $.smallBox({
                title: "<i class='fa fa-check'></i> Erro",
                content: "<strong>Não foi possível marcar a mensagem. Tente novamente</strong>",
                iconSmall: "fa fa-thumbs-down bounce animated",
                color: "#FE1A00",
                timeout: 5000
            });
        }
    });
}
/******************************************************************************/

/**
 * @name        marcar_excluida()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @param       {int}   id  Contém o ID da mensagem a ser marcada
 * @param       {url}   url Contém a url da função que tratará o evento
 * @param       {callback}  callback        Contém a função que será chamada após o evento
 * @argument    {string}    url_callback    Contém a url do callback
 */
function marcar_excluida(id, url, callback, url_callback)
{
    $.post(url, {id: id}).done(function(e) {
        if (e == 1)
        {
            $.smallBox({
                title: "<i class='fa fa-check'></i> Sucesso",
                content: "<strong>Mensagem excluida</strong>",
                iconSmall: "fa fa-thumbs-up bounce animated",
                color: "#3b5998",
                timeout: 5000
            });
            callback(url_callback);
        }
        else
        {
            $.smallBox({
                title: "<i class='fa fa-check'></i> Erro",
                content: "<strong>Não foi possível excluir a mensagem. Tente novamente</strong>",
                iconSmall: "fa fa-thumbs-down bounce animated",
                color: "#FE1A00",
                timeout: 5000
            });
        }
    });
}
/******************************************************************************/

/**
 * @name        excluir()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para excluir uma mensagem
 * @param       {int}   id  Contém o ID da mensagem a ser excluida
 * @param       {url}   url Contém a url da função que tratará o evento
 * @param       {callback}  callback        Contém a função que será chamada após o evento
 * @argument    {string}    url_callback    Contém a url do callback
 */
function excluir(id, url, callback, url_callback)
{
    $.SmartMessageBox({
        title: '<i class="fa fa-times" style="color: red"></i> Atenção',
        content: 'Você está prestes a excluir definitivamente uma mensagem. Continuar?',
        buttons: '[Sim][Não]'
    }, function(e) {
        if (e == 'Não')
        {
            return false;
        }
        else
        {
            $.post(url, {id: id}).done(function(e) {
                if (e == 1)
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Sucesso",
                        content: "<strong>Mensagem excluida</strong>",
                        iconSmall: "fa fa-thumbs-up bounce animated",
                        color: "#3b5998",
                        timeout: 5000
                    });
                    callback(url_callback);
                }
                else
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Não foi possível excluir a mensagem. Tente novamente</strong>",
                        iconSmall: "fa fa-thumbs-down bounce animated",
                        color: "#FE1A00",
                        timeout: 5000
                    });
                }
            });
        }
    });
}
/******************************************************************************/

/**
 * @name        caixa_entrada()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para chamar a caixa de entrada
 * @param       {string}    url     Contém a url da função PHP que busca as mensagens
 */
function caixa_entrada(url)
{
    $('#painel_mensagens').html('<h3><i class="fa fa-cog fa-spin"></i> Carregando</h3>');

    $.get(url, function(e) {
        $('#painel_mensagens').html(e);
    });

    remove_classe();
    $('#entrada').addClass('selected');
}
/******************************************************************************/

/**
 * @name        excluidos()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para chamar os excluidos
 * @param       {string}    url     Contém a Url da função PHP que busca as mensagens excluidas
 */
function excluidos(url)
{

    $('#painel_mensagens').html('<h3><i class="fa fa-cog fa-spin"></i> Carregando</h3>');

    $.get(url, function(e) {
        $('#painel_mensagens').html(e);
    });

    remove_classe();

    $('#excluidos').addClass('selected');
}
/******************************************************************************/

/**
 * @name        enviados()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @abstract    Função desenvolvida para chamar os itens enviados
 * @param       {string}    url     Contém a Url da função PHP que busca as mensagens enviadas
 */
function enviados(url)
{
    $('#painel_mensagens').html('<h3><i class="fa fa-cog fa-spin"></i> Carregando</h3>');
    
    $.get(url, function(e) {
        $('#painel_mensagens').html(e);
    });

    remove_classe();

    $('#enviados').addClass('selected');
}
/******************************************************************************/

/**
 * @name        remove_classe()
 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail>
 * @abstract    Função desenvolvida para remover a classe active do menu
 */
function remove_classe()
{
    $('.menu').find('a').each(function() {
        $(this).removeClass('selected');
    });
}
