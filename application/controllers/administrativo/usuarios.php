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
	 * Usuarios
	 * 
	 * Classe desenvolvida para gerenciar os usuarios cadastrados no sistema
	 * 
	 * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Controller
	 * @subpackage	MY_Controller
	 * @version		v1.1.0
	 * @since		03/09/2014
	 */
	class Usuarios extends MY_Controller
	{
		/**
		 * __construct()
		 * 
		 * Realiza a construção da classe
		 * 
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access		Public
		 */
		public function __construct()
		{
			parent::__construct(TRUE, TRUE);
			
			$this->load->model('LoginAd_model', 'usuarios');
		}
		//**********************************************************************
		
		/**
		 * index()
		 * 
		 * Função default da classe
		 * 
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access		Public 
		 */
		function index()
		{
			$this->template	= 'template/adm';
			$this->view		= 'administrativo/usuarios';
			$this->titulo	= '.:: Usuários cadastrados ::.';
			
			$this->LoadView();
		}
		//**********************************************************************
		
		/**
		 * buscar()
		 * 
		 * Função desenvolvida para buscar os usuários cadastrados
		 * 
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access		Public
		 */
		function buscar()
		{
			$this->dados['usuarios'] = $this->usuarios->get();
			
			$this->load->view('paginas/administrativo/ajax/usuarios_cadastrados', $this->dados);
		}
		//**********************************************************************
		
		/**
		 * salvar_usuario()
		 * 
		 * Função desenvolvida para salvar um novo usuário
		 * 
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access		Public
		 * @return		bool Retorna TRUE se salvar e FALSE se não salvar
		 */
		function salvar_usuario()
		{
			$dados['nome'] 		= $this->input->post('nome');
			$dados['sobrenome']	= $this->input->post('sobrenome');
			$dados['cpf']		= $this->input->post('cpf');
			$dados['login']		= $this->input->post('usuario');
			$dados['senha']		= md5($this->input->post('senha'));
			
			echo $this->usuarios->salvar($dados);
		}
		//**********************************************************************
		
		/**
		 * excluir_usuario()
		 * 
		 * Função desenvolvida para exclusão de um usuário cadastrado
		 * 
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access		Public
		 */
		function excluir_usuario()
		{
			$id = $this->input->post('id');
			
			$data = array('status' => 0);
			
			echo $this->usuarios->update($data, $id);
		}
		//**********************************************************************
		
		/**
		 * buscar_usuario()
		 * 
		 * Função desenvolvida para buscar um usuário para alterar os seus dados
		 * 
		 * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access	Public
		 * @param	int $id_usuario Contém o ID do usuário a ser buscado
		 */
		function buscar_usuario($id_usuario)
		{
			/** Cláusula condicional que será injetada nos comando de busca **/
			$where = array('id' => $id_usuario);
			
			$this->dados['usuario'] = $this->usuarios->get($where);
			
			$this->load->view('paginas/administrativo/ajax/edicao_usuario', $this->dados);
		}
		//**********************************************************************
		
		/**
		 * salvar_alteracoes()
		 * 
		 * Função desenvolvida para salvar alterações no cadastro do usuário
		 * 
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access		Public
		 * @return		bool Retorna TRUE se atualizar e FALSE se não atualizar
		 */
		function salvar_alteracoes()
		{
			$id = $this->input->post('id');
			
			$data = array(
				'nome'		=> $this->input->post('nome'),
				'sobrenome'	=> $this->input->post('sobrenome'),
				'cpf'		=> $this->input->post('cpf'),
				'login'		=> $this->input->post('login')
			);
			
			echo $this->usuarios->update($data, $id);
		}
		//**********************************************************************
	}
	/** End of File usuarios.php **/
	/** Location ./application/controllers/administrativo/usuarios.php **/