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
     * Usuario
     * 
     * Classe desenvolvida para gerenciar o perfil do usuário
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @subpackage	Painel
	 * @version		v1.2.0
	 * @since		01/10/2014    
     */
    class Usuario extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Função desenvolvida para construção do controller
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct(TRUE);
            
            $this->load->model('usuarios_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função principal do controller, responsável pela view inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function index()
        {
            $this->view     = 'painel/usuario';
            $this->titulo   = 'Meu usuário';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * buscar_dados()
         * 
         * Função desenvolvida para buscar os dados de acesso do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function buscar_dados()
        {
            $this->dados['usuario'] = $this->usuarios_model->buscar_todosDados();
            
            $this->load->view('paginas/painel/ajax/usuario', $this->dados);
        }
        //**********************************************************************
        
        /**
         * atualizar_perfil()
         * 
         * Função desenvolvida para alterar os dados do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function atualizar_perfil()
        {
        	// Recebe os dados via POST
            $senha              = $this->input->post('senha');
            $nome_proponente    = $this->input->post('nome_proponente');
            $email_proponente	= $this->input->post('email_proponente');
            
            // Realiza as alterações no cadastro
            $resposta_nome 	= $this->alterar_nomeUsuario($nome_proponente);
            $resposta_email	= $this->alterar_email($email_proponente);
            
            $resposta_senha = $senha != "" ? $this->alterar_senha($senha) : "";
            
            $resposta = array (
                'r_nome'    => $resposta_nome,
                'r_senha'   => $resposta_senha,
            	'r_email'	=> $resposta_email
            );
            
            echo json_encode($resposta);
        }
        //**********************************************************************
        
        /**
         * alterar_senha()
         * 
         * Função desenvolvida para atualizar a senha do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @param       string $senha Contém a nova senha do usuario
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        private function alterar_senha($senha)
        {
            $dados['senha'] = $senha;
            $dados['login'] = $_SESSION['usuario']['cpf_proponente'];
            
            return $this->usuarios_model->alterar_senha($dados);
        }
        //**********************************************************************
        
        /**
         * alterar_nomeUsuario()
         * 
         * Função desenvolvida para atualizar o nome do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @param       string  $nome Contém o nome do usuário
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        private function alterar_nomeUsuario($nome_proponente)
        {
            return $this->usuarios_model->alterar_nome($nome_proponente);
        }
        //**********************************************************************
        
        /**
         * alterar_email()
         * 
         * Função desenvolvida para alterar o email de contato do usuário
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Private
         * @param		string $email Contém o endereço de email que será atualizado
         * @return		bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        private function alterar_email($email)
        {
        	return $this->usuarios_model->update_email($email);
        }
        //**********************************************************************
    }
    /** End of File usuario.php **/
    /** Location ./application/controllers/painel/usuario.php **/