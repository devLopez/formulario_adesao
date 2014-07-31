O sistema conta com alguns scripts importantes como:
* app.js (contém as funções principais do sistema, como fazer logoff, exibir mensagens ao usuário e carregar páginas via ajax)
* valida_inscrição.js (Contém um conjunto de scripts desenvolvidos para realizar a validação do formulário de inscrição)
* validacao/valida_cpf.js (Contém funções de validação de cpf e de cnpj)

#### Mensagens de Sucesso
Para mostrar uma mensagem de sucesso, basta chamar a função desta maneira:

```
msg_sucesso('Hello World!');
```

#### Mensagens de erro
Para exibir uma mensagem de erro, basta chamar a função desta maneira

```
msg_erro('An error was occurred');
```

#### Músicas personalizadas

As mensagens do sistema costumam tocar músicas ao exibir a notificação. por padrão, os sons estão na pasta  `./sounds`. Para adicionar os toques personalizados, basta adicioná-los na pasta `./sounds` e adicionar a seguinte linha nas funções `msg_sucesso()` e `msg_erro()`: `musica: 'minha_musica'`. Esta música deve estar no formato mp3. Veja mais um exemplo:

```
function msg_sucesso(msg)
{
    $.smallBox({
        title: "<i class='fa fa-check'></i> Sucesso", /** Define o título da notificação **/
        content: "<strong>"+msg+"</strong>", /** Define a mensagem **/
        iconSmall: "fa fa-thumbs-up bounce animated", /** Define o ícone **/
        color: "#3b5998", /** Define a cor **/
        musica: "minha_musica",/** Define a musica, note que é somente o nome da musica, sem a extensão **/
        timeout: 5000 /** Define o tempo de visibilidade da notificação **/
    });
}
```