/**
 * MENSAGENS_ADM.js
 * 
 * Scripts desenvolvidos para auxiliar em funções básicas para gerencia das mensagens
 * administrativas
 */

/**
 * excluir()
 * 
 * Função desenvolvida para marcar como excluida
 * 
 * @param {string}  url_excluir Contém a url da função de exclusão
 * @param {int}     id          Contém o ID da mensagem a ser excluida
 * @param {string}  url         Contém a url para o Callback
 */
function excluir(url_excluir, id, url)
{
    $.post(url_excluir, {id: id}, function(sucesso){
        if(sucesso == 1)
        {
            msg_sucesso('Marcado como excluido');
            buscar_mensagens(url);
        }
        else
        {
            msg_erro('Erro ao excluir. Tente Novamente');
        }
    }).fail(function(){
        msg_erro('Ocorreu um erro. Tente novamente');
    });
}