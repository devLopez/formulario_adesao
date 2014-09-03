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
     * LoginAdministrativo
     * 
     * Classe desenvolvida para fazer o login para os administradores do sistema
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Controller
	 * @subpackage	MY_Controller
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class LoginAdministrativo extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        public function __construct()
        {
            parent::__construct(FALSE);
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função principal do sistema, responsável pela view inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function index()
        {
            $this->template = 'template/default';
            $this->view     = 'LoginAdministrativo';
            $this->titulo   = 'Login Administrativo';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * fazer_login()
         * 
         * Função desenvolvida para para fazer o login para a area administrativa
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
        //**********************************************************************
    }
    /** End of File LoginAdministrativo.php **/
    /** Location ./application/controllers/LoginAdministrativo.php **/