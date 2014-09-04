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
     * Observacoes_model
     * 
     * Classe desenvolvida para gerenciar as operações com a tabela observacoes
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Models
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Observacoes_model extends MY_Model
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
            
            $this->_tabela  = 'observacoes';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar uma observação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array $dados Contém os dados que serão salvos
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        public function salvar($dados)
        {
            $data = array(
                'id_proponente' => $dados['id_proponente'],
                'observacao'    => $dados['observacao']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * buscar_todas()
         * 
         * Realiza a busca de todas as observações cadastradas para um proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int $id_proponente  Contém o id do proponente que será usado
         *              na consulta sql
         * @return      array   Retorna um array de observações
         */
        function buscar_todas($id_proponente)
        {
            $this->BD->where('id_proponente', $id_proponente);
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar um registro
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int $id Contém o ID do registro a ser buscado
         * @return      array   Retorna um array contendo o registro
         */
        function buscar($id)
        {
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para atualizar uma observação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array   $dados  Contém os dados a serem salvos
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function update($dados)
        {
            /** Associa os dados aos campos da tabela **/
            $data = array(
                'observacao' => $dados['observacao']
            );
            
            $this->BD->where($this->_primary, $dados['id']);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * delete()
         * 
         * Função desenvolvida para apagar uma observação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return      bool Retorna TRUE se apagar e FALSE se não apagar
         * @param       int $id Contém o ID do registro a ser apagado
         */
        function delete($id)
        {
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->delete($this->_tabela);
        }
        //**********************************************************************
    }
    /** End of File observacoes_model.php **/
    /** Location ./application/models/observacoes_model.php **/