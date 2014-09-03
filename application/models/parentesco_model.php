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
     * Parentesco_model
     * 
     * Classe desenvolvida para gerenciar as transações com a tabela parentesco
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Model
	 * @subpackage	MY_Model
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Parentesco_model extends MY_Model
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
            
            $this->_tabela  = 'parentesco';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * busca_parentesco()
         * 
         * Função desenvolvida para buscar os graus de parentesco cadastrados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return      array   Retorna um array de graus de parentesco
         */
        function busca_parentesco()
        {
            $this->BD->select('grau_parentesco');
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
    }
    /** End of File parentesco_model.php **/
    /** Location ./application/models/parentesco_model.php **/