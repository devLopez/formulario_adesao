<?php
    
    /**
     * login.php
     * 
     * @package     MY_Controller
     * @subpackage  login
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar operações de login
     */
    class Login extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para construção da classe
         */
        public function __construct()
        {
            parent::__construct(false);
            $this->load->model('usuarios_model');
        }
        //**********************************************************************

        /**
         * index()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para mostrar a interface de login
         */
        function index()
        {
            $this->view     = 'login';
            $this->template = 'template/default';
            $this->titulo   = 'Fazer Login';

            $this->LoadView();
        }
        //**********************************************************************

        /**
         * fazer_login()
         *
         * @author        Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract      Função desenvolvida para realizar o login do usuário
         */
        function fazer_login()
        {
            $dados['login'] = $this->input->post('login');
            $dados['senha'] = md5($this->input->post('senha'));

            $this->load->library('login_library');

            if($this->login_library->fazer_login($dados) == 1)
            {
                echo 1; // Imprime 1 em caso de sucesso
            }
            else
            {
                echo 0; // Imprime 0 em caso de erro
            }
        }
        //**********************************************************************

        /**
         * logout()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza o logoff da conta do usuário. Depois
         *              redireciona para a página principal
         */
        function logout()
        {
            unset($_SESSION['usuario']);
            session_destroy();
            redirect(app_baseurl());
        }
        //**********************************************************************
    }
    /** End of File login.php **/
    /** Location ./application/controllers/login.php **/