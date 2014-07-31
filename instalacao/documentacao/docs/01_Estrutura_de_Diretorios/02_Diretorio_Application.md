O Diretório Application é o local onde a nossa aplicação está configurada e instalada. Dentro desta pasta temos a estrutura principal:
* <em>Controllers</em>: - Diretório onde todos os controllers do sistema estão alocados. Os controllers são responsáveis por realizar a integração entre views e models. Nos controllers temos 3 níveis de diretórios, onde:
    * Raiz (controllers): Contém todos os controllers que não necessitam de acesso via senha
    * Administrativo: Contém os controllers onde, somente os funcionários do clube terão acesso
    * Painel: Contém os controllers onde, somente o público em geral terá acesso

* <em>Models</em>: - Diretório onde os models estão alocados. Os models são os arquivos responsáveis por todas as transações relacionadas à banco de dados
* <em>Views</em>: - Do mesmo modo que os controllers, as views estão divididas em seções:
    * **paginas**    - O diretório páginas contém todas as páginas dinâmicas do sistema
    * **template**   - O diretório templates contém a parte fixa do sistema, que é aquela parte principal do corpo do site, onde podemos encontrar os arquivos de javascript e de css por exemplo;
* <em>Core</em>: Neste diretório, possuímos duas classes que serão primordiais na execução do sistema.
    * MY_Controller: Este arquivo é uma classe que estende à classe principal do CodeIgniter (CI_Controller). Nesta classe temos funções necessárias para o funcionamento de todo o sistema. Todos os outros controllers devem estender MY_Controller.
    * MY_Model: Este arquivo estende ao model principal do CodeIgniter (CI_Model). Como o MY_Controller, este arquivo possui funções necessárias para o funcionamento de todo o sistema. Todos os outros models devem estender esta classe.