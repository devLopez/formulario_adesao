<?php
    /**
     * @package     - CI_Controller
     * @subpackage  - MY_Controller
     * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    - Classe padrão. As outras sub-classes, todas, devem extender
     *                a esta classe, que por sua vez, extend o CI_Controller
     */
    class MY_Controller extends CI_Controller
    {
        /**
         * Define algumas variáveis protegidas, que serão utilizadas no decorrer
         * da execução do sistema
         */
        protected $template;
        protected $dados;
        protected $view;
        protected $titulo;
        
        /**
         * @name        - __construction()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função que realiza a construção da classe.
         * @param       - Bool $requer_autenticacao É utilizada para controlar as páginas que necessitam de login
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct();
            session_start();
            $this->template = 'template/painel';
            $this->titulo   = 'Formulário de inscrição';
            $this->verifica_login($requer_autenticacao);
        }
        /**********************************************************************/
        
        /**
         * @name        - LoadView()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função responsável por fazer a integração entre a view
         *              os dados e o template
         */
        public function LoadView()
        {
            $this->dados['view']        = $this->view;
            $this->dados['titulo']      = $this->titulo;
            $this->dados['protocolo']   = $this->verifica_inscricao();
            
            $this->load->view($this->template, $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        - verifica_login()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Verifica se a página solicitada necessita de login
         *              efetuado. Se o usuário não tiver efetuado o login, o
         *              redireciona para a página principal, para que possa
         *              efetuar o mesmo
         */
        public function verifica_login($requer_autenticacao)
        {
            if($requer_autenticacao)
            {
                if(!isset($_SESSION['usuario']))
                {
                    redirect(app_baseUrl().'login');
                }
            }
        }
        /**********************************************************************/
        
        /**
         * verifica_inscricao()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para verificar se o usuário já 
         *              realizou sua inscrição
         */
        function verifica_inscricao()
        {
            if(isset($_SESSION['usuario']))
            {
                $this->load->model('usuarios_model');
            
                return $this->usuarios_model->verifica_protocolo();
            }
        }
    }
?>