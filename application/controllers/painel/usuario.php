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
	 * @version		v1.1.0
	 * @since		03/09/2014    
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
            $senha              = $this->input->post('senha');
            $nome_proponente    = $this->input->post('nome_proponente');
            
            $resposta_nome = $this->alterar_nomeUsuario($nome_proponente);
            
            if(isset($senha))
            {
                $resposta_senha = $this->alterar_senha($senha);
            }
            
            $resposta = array (
                'r_nome'    => $resposta_nome,
                'r_senha'   => $resposta_senha
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
    }
    /** End of File usuario.php **/
    /** Location ./application/controllers/painel/usuario.php **/