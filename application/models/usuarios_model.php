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
     * Usuarios_model
     * 
     * Classe desenvolvida para gerenciar as operações com os dados dos usuários
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Model
	 * @subpackage	MY_Model
	 * @version		v1.1.1
	 * @since		03/09/2014    
     */
    class Usuarios_model extends MY_Model
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
            parent::__construct();
            
            $this->_tabela  = 'usuarios';
            $this->_primary = 'id';
        }
        //**********************************************************************

        /**
         * verifica_cpf()
         * 
         * Função desenvolvida para buscar um cpf na base de dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		int $cpf_proponente Contém o cpf a ser verificado
         * @return      Integer retorna o número de cpfs cadastrados
         */
        function verifica_cpf($cpf_proponente)
        {
            $this->BD->where('cpf_proponente', $cpf_proponente);
            return $this->BD->count_all_results($this->_tabela);
        }
        //**********************************************************************

        /**
         * salvar_usuario()
         * 
         * Função desenvolvida para salvar os dados de um novo usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       Array $dados array que contém os dados do novo usuário
         * @return      Bool retorna verdadeiro ou falso no caso do cadastro
         */
        function salvar_usuario($dados)
        {
            $data = array(
                'nome_proponente'   => $dados['nome_proponente'],
                'cpf_proponente'    => $dados['cpf_proponente'],
                'senha_proponente'  => $dados['senha_proponente']
            );
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************

        /**
         * login()
         * 
         * Função desenvolvida para buscar os dados do usuário para efetuar o login
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       String $dados['login'] CPF do usuário, que é usado como login
         * @param       String $dados['senha'] Contém a senha do usuário em md5
         * @return      Array retorna um array com os dados do usuário se true, e FALSE caso não encontre nada
         */
        function login($dados)
        {
            $this->BD->select('id, nome_proponente, cpf_proponente');
            $this->BD->where(array('cpf_proponente' => $dados['login'],'senha_proponente' => $dados['senha']));
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************

        /**
         * salva_protocolo()
         * 
         * Função desenvolvida para salvar o numero de protocolo no cadastro do
         * usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array   $data   Variável que receberá o protocolo
         * @return      bool Retorna true se salvar e false se não salvar
         **/
       function salva_protocolo()
       {
       		date_default_timezone_set('America/Sao_Paulo');
       		
			$data = array(
           		'numero_protocolo' => md5($_SESSION['usuario']['cpf_proponente']),
           		'data_geracaoProtocolo' => date('Y-m-d H:i:s', time())
           	);

           	$this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
           	return $this->BD->update($this->_tabela, $data);
       }
       //***********************************************************************

       /**
        * verifica_protocolo()
        * 
        * Função desenvolvida para verifica se existe um numero de protocolo
        * 
        * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
        * @access		Public
        * @return		int Retorna a quantodade de protocolos cadastrados para
        * 				um CPF, geralmente um só.
        */
       function verifica_protocolo()
       {
           $this->BD->where('numero_protocolo', md5($_SESSION['usuario']['cpf_proponente']));
           return $this->BD->count_all_results($this->_tabela);
       }
       //***********************************************************************

       /**
        * verifica_aprovacao()
        * 
        * Função desenvolvida para verificar a aprovação da cota
        * 
        * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
        * @access		Public
        * @return		bool Retorna TRUE se aprovado e FALSE se indeferido e 
        * 				NULL se não foi avaliado
        */
       function verifica_aprovacao()
       {
           $this->BD->select('status_aprovacao');
           $this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
           $query = $this->BD->get($this->_tabela);

           foreach ($query->result() as $row)
           {
               $status_aprovacao = $row->status_aprovacao;
           }

           return $status_aprovacao;
       }
       //***********************************************************************

       /**
        * alterar_senha()
        * 
        * Função desenvolvida para alterar a senha do usuário
        *
        * @author       Matheus Lopes Santos <fale_com_lopez@hotmail.com>
        * @access		Pulic
        * @param        array $dados Contém o CPF e a Nova senha do usuário
        * @return       bool Retorna TRUE se alterar e FALSE se não alterar
        */
        function alterar_senha($dados)
        {
            $data = array(
                'senha_proponente' => $dados['senha']
            );

            $this->BD->where('cpf_proponente', $dados['login']);

            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * buscar_todosDados()
         * 
         * Função desenvolvida para buscar todos os dados do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		array Retorna um array com todos os dados do usuário
         */
        function buscar_todosDados()
        {
            $this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * alterar_nome()
         * 
         * Função desenvolvida para alterar o nome do usuário
         * 
         * @author      Matheus Lopes Santos
         * @access		Public
         * @param       string $nome_proponente Contém o nome de usuário a ser trocado
         * @return		bool Retorna TRUE se salvar e FALSE se não atualizar
         */
        function alterar_nome($nome_proponente)
        {
            $data = array(
                'nome_proponente' => $nome_proponente
            );
            
            $this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * contar_propostasAbertas()
         * 
         * Função desenvolvida para contar a quantidade de propostas que estão em aberto
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return      int Retorna o número de propostas em aberto
         */
        function contar_propostasAbertas()
        {
            return $this->BD->query("SELECT COUNT(*) AS propostas FROM {$this->_tabela} WHERE status_aprovacao IS NULL AND numero_protocolo IS NOT NULL")->result();
        }
        //**********************************************************************
        
        /**
         * buscar_allPropostas()
         * 
         * Função desenvolvida para buscar os dados dos usuários do sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $limite Define o limite da pesquisa sql
         * @param       int $offset Define o offset da pesquisa sql
         * @return      array   Retorna array contendo os dados dos usuarios cadastrados
         */
        function buscar_allPropostas($limite, $offset)
        {
            $this->BD->limit($limite, $offset);
            $this->BD->order_by('data_adesao', 'desc');
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * contar()
         * 
         * função desenvolvida para contar a quantidade de usuarios cadastrados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return      int Retorna a quantidade de usuários cadastrados
         */
        function contar()
        {
            return $this->BD->count_all_results($this->_tabela);
        }
        //**********************************************************************
        
        /**
         * buscar_byId()
         * 
         * Realiza a busca de um registro baseado no ID do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int $id Contém o ID do registro a ser buscado
         * @return		array Retorna um array com os dados do usuário
         */
        function buscar_byId($id)
        {
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * deferir()
         * 
         * Função desenvolvida para deferir uma proposta
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int $id Contém o id do registro a ser modificado
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function deferir($id)
        {
            $data = array('status_aprovacao' => 1);
            
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * indeferir()
         * 
         * Função desenvolvida para indeferir uma proposta
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int $id Contém o id do registro a ser modificado
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function indeferir($id)
        {
            /** Associa os dados os campos da tabela**/
            $data = array('status_aprovacao' => 0);
            
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of File usuarios_model.php **/
    /** Location ./application/models/usuarios_model.php **/