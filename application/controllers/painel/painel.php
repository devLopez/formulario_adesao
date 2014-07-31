<?php

    /**
     * painel.php
     * 
     * @package		MY_Controller
     * @subpackage	painel/painel
     * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract	Esta classe chama a página de startup da área que necessita realizar o login
     */
    class Painel extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract	Realiza a construção da classe
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);
            $this->load->model('usuarios_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract	Função inicial do controller. Irá chamar a visão do painel
         */
        function index()
        {
            $this->view     = 'painel/painel';
            $this->titulo   = 'Painel do usuário';
            
            $this->dados['inscricao']   = $this->buscar_inscricao();
            $this->dados['aprovacao']   = $this->buscar_aprovacao();

            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * buscar_inscricao()
         * 
         * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que verificará se foi criada uma solicitação de cota
         */
        function buscar_inscricao()
        {   
            return $this->usuarios_model->verifica_protocolo();
        }
        //**********************************************************************
        
        /**
         * buscar_aprovacao()
         * 
         * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para verificar o status da aprovacao
         */
        function buscar_aprovacao()
        {
            return $this->usuarios_model->verifica_aprovacao();
        }
        //**********************************************************************
    }
    /** End of File painel.php **/
    /** Location ./application/controllers/painel/painel.php **/