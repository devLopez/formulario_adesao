<?php

    /**
     * propostas.php
     * 
     * @package     MY_Controller
     * @subpackage  propostas
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as propostas de cota que 
     *              estão cadastrados no sistema
     */
    class Propostas extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @access      Public
         * @param       bool    $requer_autenticacao    Recebe TRUE pois indica 
         *              que é necessário o login para acesso a esta área
         * @param       bool    $admin                  Recebe TRUE pois indica 
         *              que é uma área administrativa
         */
        public function __construct($requer_autenticacao = TRUE, $admin = TRUE)
        {
            parent::__construct($requer_autenticacao, $admin);
            
            $this->load->model('usuarios_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal da classe
         * @access      Public
         */
        function index()
        {
            /** Definição do template, view e título da página **/
            $this->template = 'template/adm';
            $this->view     = 'administrativo/propostas';
            $this->titulo   = 'Propostas de cota cadastradas';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * buscar_propostas()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar os dados dos usuarios 
         *              cadastrados via ajax
         * @access      Public
         * @param       int $offset Offset que será usado na paginação
         */
        function buscar_propostas($offset = 0)
        {
            /** Limite será usado na consulta sql **/
            $limite = 10;
            
            /** Recebe os dados do banco de dados **/
            $this->dados['propostas'] = $this->usuarios_model->buscar_allPropostas($limite, $offset);
            
            /** configuração da paginação **/
            $config['uri_segment']  = 4;
            $config['base_url']     = app_baseurl().'administrativo/propostas/buscar_propostas';
            $config['per_page']     = $limite;
            $config['total_rows']   = $this->usuarios_model->contar();
            
            $this->pagination->initialize($config);
            
            $this->dados['paginacao'] = $this->pagination->create_links();
            
            $this->load->view('paginas/administrativo/ajax/propostas', $this->dados);
        }
        //**********************************************************************
    }
    /** End of File propostas.php **/
    /** Location ./application/controllers/administrativo/propostas.php **/