<?php
    /**
     * @package     MY_Model
     * @subpackage  Parentesco_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as transações com a tabela
     *              parentesco
     */
    class Parentesco_model extends MY_Model
    {
        /**
         * @name        __construct()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @access      public
         * @param       string $this->_tabela   Indica qual será a tabela que trabalharemos
         * @param       string $this->primary   Indica qual a chave primaria da tabela acima
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela  = 'parentesco';
            $this->_primary = 'id';
        }
        /**********************************************************************/
        
        /**
         * @name        busca_parentesco()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os graus de parentesco
         *              cadastrados
         * @param       array $query    Recebe um array com os graus de parentesco
         * @return      array   Retorna um array de graus de parentesco
         */
        function busca_parentesco()
        {
            $this->BD->select('grau_parentesco');
            $query = $this->BD->get($this->_tabela);
            
            return $query->result();
        }
    }
?>