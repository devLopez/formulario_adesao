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
     * MY_Model
     * 
     * Subclasse modular padrão do sistema. Todas as variáveis protegidas que
     * serão utilizadas pelos models são definidas aqui. Todos os models devem
     * extender esta classe
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Model
	 * @version		v1.1.0
	 * @since		03/09/2014 
     */
    class MY_Model extends CI_Model
    {
        /**
         * Variável que recebe o banco de dados que será trabalhado
         * 
         * @var	string $BD
         */
        protected $BD;
        
        /**
         * Variável que recebe a tabela na qual irá trabalhar
         * 
         * @var	string $_tabela
         */
        protected $_tabela;
        
        /**
         * Variável que recebe o nome do campo de chave primária da tabela que 
         * se está trabalhando
         * 
         * @var	string $_primary
         */
        protected $_primary;
        
        /**
         * __construct()
         * 
         * 
         * Realiza a construção da classe
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct();
            
            //Realiza a seleção do banco de dados
            $this->BD = $this->load->database('default', TRUE);
        }
        //**********************************************************************
    }
    /** End of File MY_Model.php **/
    /** Location ./application/core/MY_Model.php **/