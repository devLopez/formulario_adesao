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
     * Novo_usuario
     * 
     * Classe desenvolvida para criação de usuários do sistema, para que o 
     * mesmo possa criar e editar seus formulários
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @version		v1.2.0
	 * @since		03/09/2014    
     */
    class Novo_usuario extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Função que realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct(FALSE);
            $this->load->model('usuarios_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função inicial do controller. Responsável pela view inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function index()
        {
            $this->view     = 'novo_usuario';
            $this->template = 'template/default';
            $this->titulo   = 'Criação de novo usuário';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * verifica_cpf()
         * 
         * Função desenvolvida para verificar se existe cpf cadastrado na 
         * base de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se encontrar o cpf e FALSE se não 
         * 				encontrar
         */
        function verifica_cpf()
        {
            echo $this->usuarios_model->verifica_cpf($this->input->post('cpf'));
        }
        //**********************************************************************
        
        /**
         * salvar_usuario()
         * 
         * Função desenvolvida para salvar um novo usuário no sistema. Após 
         * salvar o novo usuário, realiza o login automaticamente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar_usuario()
        {
            $dados['nome_proponente']   = mysql_real_escape_string($this->input->post('nome_proponente'));
            $dados['cpf_proponente']    = mysql_real_escape_string($this->input->post('cpf_proponente'));
            $dados['email_proponente']	= mysql_real_escape_string($this->input->post('email_proponente'));
            $dados['senha_proponente']  = md5($this->input->post('senha_proponente'));
            
            $resposta = $this->usuarios_model->salvar_usuario($dados); 
            
            if($resposta == 1)
            {
                $this->load->library('login_library');
                
                $dados['login'] = $dados['cpf_proponente'];
                $dados['senha'] = $dados['senha_proponente'];
                
                if($this->login_library->fazer_login($dados) == 1)
                {
                    echo 1;
                }
            }
            else 
            {
            	echo 0;
            }    
        }
        //**********************************************************************
    }
    /** End of File novo_usuario.php **/
    /** Location ./application/controllers/novo_usuario.php **/