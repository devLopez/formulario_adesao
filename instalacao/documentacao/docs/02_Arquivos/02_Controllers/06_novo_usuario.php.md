Classe desenvolvida para criação de usuários do sistema, para que o mesmo possa criar e editar seus formulários

É composta de 4 funções:
* __construct()
    * Função que realiza a construção da classe
* index()
    * Função principal do controller, responsável pela visão e dados iniciais que serão mostrados ao usuário
* verifica_cpf()
    * Função desenvolvida para verificar se existe cpf cadastrado na base de dados
* salvar_usuario()
    * Função desenvolvida para salvar um novo usuário no sistema

```
    /**
     * @package     - MY_Controller
     * @subpackage  - novo_usuario
     * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    - Classe desenvolvida para criação de usuários do sistema, para que o mesmo possa criar e editar seus formulários
     */
    class Novo_usuario extends MY_Controller
    {
        /**
         * @name        - __construct()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função que realiza a construção da classe
         */
        public function __construct()
        {
            parent::__construct(FALSE);
            $this->load->model('usuarios_model');
        }
        /**********************************************************************/
        
        /**
         * @name        - index()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função inicial do controller. Aqui será feira a chamada da visão correspondente
         */
        function index()
        {
            $this->view     = 'novo_usuario';
            $this->template = 'template/default';
            $this->titulo   = 'Criação de novo usuário';
            $this->LoadView();
        }
        /**********************************************************************/
        
        /**
         * @name        - verifica_cpf()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função desenvolvida para verificar se existe cpf cadastrado na base de dados
         */
        function verifica_cpf()
        {
            $cpf_proponente = $this->input->post('cpf');
            
            $resposta = $this->usuarios_model->verifica_cpf($cpf_proponente);
            
            echo $resposta;
        }
        /**********************************************************************/
        
        /**
         * @name        - salvar_usuario()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função desenvolvida para salvar um novo usuário no sistema
         */
        function salvar_usuario()
        {
            $dados['nome_proponente']   = $this->input->post('nome_proponente');
            $dados['cpf_proponente']    = $this->input->post('cpf_proponente');
            $dados['senha_proponente']  = md5($this->input->post('senha_proponente'));
            
            $resposta = $this->usuarios_model->salvar_usuario($dados); 
            
            if($resposta == 1)
            {
            	$_SESSION['usuario']['nome_proponente'] = $dados['nome_proponente'];
            	$_SESSION['usuario']['cpf_proponente']  = $dados['cpf_proponente'];
            	echo $resposta;
            }
            else 
            {
            	echo 0;
            }
            
        }
    }