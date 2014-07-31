Classe desenvolvida para fazer o login para os administradores do sistema

É composta de 3 funções:

* __construct()
    * Realiza a construção da classe
* index()
    * Função principal do controller, responsável pela visão e dados iniciais que serão mostrados ao usuário
* fazer_login()
    * Função desenvolvida para para fazer o login para a área administrativa

```
    /**
     * LoginAdministrativo.php
     * 
     * @package     MY_Controller
     * @subpackage  loginAdministrativo
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para fazer o login para os administradores do sistema
     */
    class LoginAdministrativo extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @access      Public
         * @param       BOOL    $requer_autenticacao    Setado como false por que
         *              para acessar esta classe não é necessário estar logado no
         *              sistema
         */
        public function __construct($requer_autenticacao = FALSE)
        {
            parent::__construct($requer_autenticacao);
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal do sistema
         */
        function index()
        {
            /** Define o template, a view e o título da página **/
            $this->template = 'template/default';
            $this->view     = 'LoginAdministrativo';
            $this->titulo   = 'Login Administrativo';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * fazer_login()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para para fazer o login para a área administrativa
         */
        function fazer_login()
        {
            $dados['login'] = $this->input->post('login');
            $dados['senha'] = md5($this->input->post('senha'));
            
            $this->load->library('login_library');
            
            $resposta = $this->login_library->login_administrativo($dados);
            
            if($resposta == TRUE)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }
    /** End of File LoginAdministrativo.php **/
    /** Location ./application/controllers/LoginAdministrativo.php **/