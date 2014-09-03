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
     * Dependentes_model
     * 
     * Classe desenvolvida para gerenciar os dependentes
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Model
	 * @subpackage	MY_Model
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Dependentes_model extends MY_Model
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
            
            $this->_tabela  = 'dependentes';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * buscar_dependentes()
         * 
         * Função desenvolvida para buscar os dependentes cadastrados para um 
         * usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return      array   Retorna um array de dependentes
         */
        function buscar_dependentes()
        {
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            $this->BD->order_by('parentesco_dependente', 'asc');
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar os dados de um dependente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array $dados Contém os dados que serão salvos
         * @return      bool    Retorna true se salvar e false se não salvar
         */
        function salvar($dados)
        {
            $data = array(
                'id_proponente'                 => base64_decode($_SESSION['usuario']['id_proponente']),
                'nome_dependente'               => $dados['nome_dependente'],
                'parentesco_dependente'         => $dados['parentesco_dependente'],
                'data_nascimento_dependente'    => $dados['data_nascimento_dependente'],
                'estado_civil_dependente'       => $dados['estado_civil_dependente']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * excluir()
         * 
         * Função que exclui um registro pelo ID
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int $id Recebe o id do registro que será excluido
         * @return      bool retorna true se excluir e false se não
         */
        function excluir($id)
        {
            $this->BD->where('id', $id);
            return $this->BD->delete($this->_tabela);
        }
        //**********************************************************************
        
        /**
         * buscar_byId()
         * 
         * Função desenvolvida para buscar os dados de um dependente de acordo 
         * o ID passado
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access    	Public
         * @param       int $id ID da tupla, foi passado pela url
         * @return      array   Retorna um array contendo os dados de um dependente
         */
        function buscar_byId($id)
        {
            $this->BD->where('id', $id);
            $query = $this->BD->get($this->_tabela);
            
            return $query->result();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para realizar o update em um dependente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array   $dados  Contém os dados a serem atualizados
         * @return      bool Retorna true se atualizar e false se não atualizar
         */
        function update($dados)
        {
            $data = array(
                'nome_dependente'               => $dados['nome_dependente'],
                'parentesco_dependente'         => $dados['parentesco_dependente'],
                'data_nascimento_dependente'    => $dados['data_nascimento_dependente'],
                'estado_civil_dependente'       => $dados['estado_civil_dependente']
            );
            
            $this->BD->where('id', $dados['id']);
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of FIle dependentes_model.php **/
    /** Location ./application/models/dependentes_model.php **/