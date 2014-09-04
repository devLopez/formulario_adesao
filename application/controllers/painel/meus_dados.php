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
     * Meus_dados
     * 
     * Classe desenvolvida para gerenciar os dados do usuário
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @subpackage	Painel
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class Meus_dados extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a contrução da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct(TRUE);
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
            $this->view     = 'painel/meus_dados';
            $this->titulo   = 'Meus dados';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * dados_pessoais()
         * 
         * Busca os dados pessoais do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function dados_pessoais()
        {
            $this->load->model('dpessoais_model');
            $this->dados['pessoais'] = $this->dpessoais_model->busca_dadosPessoais();
            
            $this->load->view('paginas/painel/ajax/dados_proponente/dados_pessoais', $this->dados);
        }
        //**********************************************************************
        
        /**
         * dados_profissionais()
         * 
         * Busca os dados profissionais do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function dados_profissionais()
        {
            $this->load->model('dprofissionais_model');
            $this->dados['profissionais'] = $this->dprofissionais_model->busca_dadosProfissionais();
            
            $this->load->view('paginas/painel/ajax/dados_proponente/dados_profissionais', $this->dados);
        }
        //*********************************************************************
        
        /**
         * dados_conjuge()
         * 
         * Função que busca os dados do conjuge do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function dados_conjuge()
        {
            $this->load->model('dconjuge_model');
            $this->dados['conjuge'] = $this->dconjuge_model->busca_dadosConjuge();
            
            $this->load->view('paginas/painel/ajax/dados_proponente/dados_conjuge', $this->dados);
        }
        //**********************************************************************
    }
    /** End of File meus_dados.php **/
    /** Location ./application/controllers/painel/meus_dados.php **/