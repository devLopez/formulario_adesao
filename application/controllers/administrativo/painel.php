<?php
    
    /**
     * painel
     * 
     * @package     MY_Controller
     * @subpackage  Painel
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Função desenvolvida para gerenciar o painel administrativo
     *              do sistema
     */
    class Painel extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @param       bool    $requer_autenticacao    Se setada como true, 
         *              indica que para acessar este controller é necessário ter
         *              feito login
         * @param       bool    $admin  Se for true, indica que esta seção é mais
         *              restrita, somente para os funcionários
         */
        public function __construct($requer_autenticacao = TRUE,  $admin = TRUE)
        {
            parent::__construct($requer_autenticacao, $admin);
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal do sistema
         * @todo        Busca por proponentes não aprovados
         * @todo        busca de mensagens não lidas
         */
        function index()
        {
            $this->template = 'template/adm';
            $this->view     = 'administrativo/painel';
            $this->titulo   = 'Painel administrativo';
            
            $this->LoadView();
        }
    }
    /** End of File painel.php **/
    /** Location ./application/controllers/administrativo/painel.css **/