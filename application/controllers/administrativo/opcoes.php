<?php

    /**
     * Mensagens.php
     * 
     * @package     MY_Controller
     * @subpackage  mensagens.php
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as mensagens enviadas e rece
     *              bidas pelo administrador do sistema
     */
    class Mensagens extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção do sistema
         */
        public function __construct($requer_autenticacao = TRUE, $admin = TRUE)
        {
            parent::__construct($requer_autenticacao, $admin);
            
            $this->load->model('mensagens_model', 'mensagens');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função Principal do Controller
         */
        function index()
        {
            $this->titulo   = 'Mensagens';
            $this->view     = 'administrativo/mensagens';
            $this->template = 'template/adm';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * caixa_entrada()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar as mensagens recebidas
         * @access      Public
         */
        function caixa_entrada()
        {
            $this->dados['mensagens'] = $this->mensagens->adEntrada();
            
            $this->load->view('paginas/administrativo/ajax/mensagens/caixa_entrada', $this->dados);
        }
        //**********************************************************************
        
        /**
         * caixa_saida()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para listar as mensagens enviadas
         * @access      Public
         */
        function caixa_saida()
        {
            $this->dados['mensagens'] = $this->mensagens->adEnviados();
            
            $this->load->view('paginas/administrativo/ajax/mensagens/caixa_saida', $this->dados);
        }
        //**********************************************************************
        
        /**
         * excluidos()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para listar as mensagens excluidas
         * @access      Public
         */
        function excluidos()
        {
            $this->dados['mensagens'] = $this->mensagens->adExcluidos();
            
            $this->load->view('paginas/administrativo/ajax/mensagens/excluidos', $this->dados);
        }
        //**********************************************************************

        /***********************************************************************
         * SEÇÃO DE AÇÕES DE MENSAGENS
         **********************************************************************/
        
        /**
         * marcar_excluida()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para marcar uma mensagem como excluida
         */
        function excluir()
        {
            $id = $this->input->post('id');
            
            echo $this->mensagens->marcar_excluida($id);
        }
    }
    /** End of File Mensagens.php **/
    /** Location ./application/controllers/administrativo/mensagens.php **/