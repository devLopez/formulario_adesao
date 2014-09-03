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
     * Observacoes
     * 
     * Classe desenvolvida para gerenciar as observações recebidas pelo proponente
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Controller
	 * @subpackage	MY_Controller
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Observacoes extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Função desenvolvida para construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct(TRUE);
            
            $this->load->model('observacoes_model', 'observacoes');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função principal da classe, responsável pela visão inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function index()
        {
            $this->view     = 'painel/observacoes';
            $this->titulo   = 'Observações';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * observacoes_cadastradas()
         * 
         * Função desenvolvida para buscar as observações cadastradas
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function observacoes_cadastradas()
        {
            $id = base64_decode($_SESSION['usuario']['id_proponente']);
            
            $this->dados['observacoes'] = $this->observacoes->buscar_todas($id);
            $this->load->view('paginas/painel/ajax/observacoes', $this->dados);
        }
        //**********************************************************************
    }
    /** End of File mensagens.php **/
    /** Location ./application/controllers/painel/mensagens **/