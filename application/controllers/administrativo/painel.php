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
     * Painel
     * 
     * Classe desenvolvida para gerenciar o painel administrativo do sistema
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @access		Public
     * @package		Controllers
	 * @subpackage	Administrativo
     * @version		v1.1.0
     * @since		03/09/2014
     */
    class Painel extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
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
         * Função principal da classe, responsável pela visão inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function index()
        {
            /** Seleciona o template, a visão e o título da página **/
            $this->template = 'template/adm';
            $this->view     = 'administrativo/painel';
            $this->titulo   = '.:: Painel administrativo ::.';
            
            /** Dados que serão exibidos na visão **/
            $this->dados['propostas_abertas']   = $this->buscar_propostasAberto();
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * buscar_propostasAberto()
         * 
         * Função desenvolvida para contar as propostas que estão em aberto
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @access      Private
         * @return      int   Retorna a quantidade de propostas em aberto
         */
        private function buscar_propostasAberto()
        {
            $this->load->model('usuarios_model');
            
            return $this->usuarios_model->contar_propostasAbertas();
        }
        //**********************************************************************
    }
    /** End of File painel.php **/
    /** Location ./application/controllers/administrativo/painel.css **/