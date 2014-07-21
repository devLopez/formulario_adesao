<?php
    /**
     * @package     - MY_Controller
     * @subpackage  - inicio
     * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    - Classe desenvolvida para chamar a página inicial do sistema
     */
    class Inicio extends MY_Controller
    {
        /**
         * @name        - __construct()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - realiza a construção desta classe com a classe MY_Controller
         */
        public function __construct()
        {
            parent::__construct(false);
        }
        /**********************************************************************/
        
        /**
         * @name        - index()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função inicial do controller, que chamará a página 
         *              inicial do sistema
         */
        function index()
        {
            $this->view     = 'inicio';
            $this->template = 'template/default';
            $this->titulo   = 'Formulário de Inscrição - Pentáurea Clube';
            $this->LoadView();
        }
    }
?>