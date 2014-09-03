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
     * LoginAd_model
     * 
     * Classe desenvolvida para gerenciar as transações com com a tabela 
     * usuarios_administrativos
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Model
	 * @subpackage	MY_Model
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class LoginAd_model extends MY_Model
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
            parent::__construct();
            
            /** Define o nome da tabela e a chave primaria dela **/
            $this->_tabela  = 'usuarios_administrativos';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * buscar_usuario()
         * 
         * Função desenvolvida para buscar os dados dos usuarios administrativos
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @param       array   $dados  Contém os dados de login do usuário
         * @return      array   Retorna um array com os dados do usuario. Se não
         *              encontrar, retorna FALSE
         */
        function buscar_usuario($dados)
        {
            
            $this->BD->where('login', $dados['login']);
            $this->BD->where('senha', $dados['senha']);
            $this->BD->where('status', 1);
            
            $query = $this->BD->get($this->_tabela);
            
            return $query->result();
        }
        //**********************************************************************
        
        /**
         * verifica_cpf()
         * 
         * Função desenvolvida para verificar existência de cpf cadastrado na 
         * base de dados. Será muito utilizado na redefinição de senha
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		int $cpf Contém o cpf que será buscado no BD
         * @return		int Retorna o número de cpfs cadastrados
         */
        function verifica_cpf($cpf)
        {
        	$this->BD->where('cpf', $cpf);
        	return $this->BD->count_all_results($this->_tabela);
        }
        //**********************************************************************
        
        /**
         * trocar_senha()
         * 
         * Função desenvolvida para alterar a senha de um usuário administrativo
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		array $dados Contém o CPF e a nova senha do usuário
         * @return		bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function alterar_senha($dados)
        {
        	$data = array(
            	'senha' => $dados['senha']
        	);
        	
        	$this->BD->where('cpf', $dados['login']);
        	return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * get()
         * 
         * Função desenvolvida para buscar todos os usuários cadastrados
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		mixed $parametro_adicional Parâmetro que será passado 
         * 				para complementar as consultas
         * @return		array Retorna um array de usuários cadastrados
         */
        function get($parametro_adicional = NULL)
        {
        	if($parametro_adicional != NULL)
        	{
        		$this->BD->where($parametro_adicional);
        	}
        	
        	$this->BD->where('status', 1);
        	
        	return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar um novo usuário
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		array $dados Contém os dados que serão salvos
         * @return		bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($dados)
        {
        	$data = array(
        		'nome'		=> $dados['nome'],
        		'sobrenome'	=> $dados['sobrenome'],
        		'cpf'		=> $dados['cpf'],
        		'login'		=> $dados['login'],
        		'senha'		=> $dados['senha'],
        		'status'	=> 1
        	);
        	
        	return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para salvar alterações no cadastro do usuário
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		array $data Contém os dados que serão atualizados
         * @param		array $id	Contém o ID da tupla que será alterado
         * @return		bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function update($data, $id)
        {
        	$this->BD->where('id', $id);
        	
        	return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of File LoginAd_model.php **/
    /** Location ./application/models/LoginAd_model.php **/