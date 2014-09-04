<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Sistema de Inscrições On-line
	 * 
	 * Sistema desenvolvido para facilitação de inscrições em empresas
	 * 
	 * @package		SIO
	 * @author		Masterkey Informática
	 * @copyright	Copyright (c) 2010 - 2014, Masterkey Informática LTDA
	 */
    
    /**
     * Login
     * 
     * Classe desenvolvida para gerenciar operações de login
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Login extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
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
         * Função desenvolvida para mostrar a interface de login
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
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
         * Função desenvolvida para realizar o login do usuário
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se autenticar e FALSE se não autenticar
         */
        function fazer_login()
        {
            $dados['login'] = $this->input->post('login');
            $dados['senha'] = md5($this->input->post('senha'));

            $this->load->library('login_library');

            if($this->login_library->fazer_login($dados) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        //**********************************************************************

        /**
         * logout()
         * 
         * Realiza o logoff da conta do usuário. Depois redireciona para a 
         * página principal
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
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