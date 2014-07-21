<?php
    /**
     * @package     - CI_Model
     * @subpackage  - MY_Model()
     * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    - Model desenvolvido para gerenciar os sub-models. Todos os
     *              models devem extender a este, que por sua vez, extende ao
     *              CI_Model
     */
    class MY_Model extends CI_Model
    {
        /**
         * Definição de variáveis protegidas
         */
        protected $BD;
        protected $_tabela;
        protected $_primary;
        
        /**
         * @name        - __construct()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Realiza a construção deste model para o model pai, 
         *              CI_Model. Define as variáveis de configuração para 
         *              seleção do banco de dados
         */
        public function __construct()
        {
            parent::__construct();
            $this->BD = $this->load->database('default', TRUE);
        }
    }
?>