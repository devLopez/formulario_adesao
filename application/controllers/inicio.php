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
     * Inicio
     * 
     * Classe desenvolvida para chamar a página inicial do sistema
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Controller
	 * @subpackage	MY_Controller
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Inicio extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct(false);
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função inicial do controller, que chamará a página inicial do sistema
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function index()
        {
            $this->view     = 'inicio';
            $this->template = 'template/default';
            $this->titulo   = 'Formulário de Inscrição - Pentáurea Clube';
            
            $this->LoadView();
        }
        //**********************************************************************
    }
    /** End of File inicio.php **/
    /** Location ./application/controllers/inicio.php **/