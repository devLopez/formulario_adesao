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
     * MY_Controller
     * 
     * Subclasse padrão do sistema. Todas as variáveis protegidas que serão
     * utilizadas pelos controllers são definidas aqui, além de algumas funções
     * globais. Todas os controllers devem extender a esta classe
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Core
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class MY_Controller extends CI_Controller
    {
		/**
		 * Variável que receberá o template que será exibido ao usuário final
		 * 
		 * @var String $template
		 */
        protected $template;
        
        /**
         * Variável que receberá os dados que serão exibidos aos usuário final
         * 
         * @var	String $dados
         */
        protected $dados;
        
        /**
         * Variável que recebe a visão que será inserida no template
         * 
         * @var	String $view
         */
        protected $view;
        
        /**
         * Variável que recebe o título que a página requisitada receberá
         * 
         * @var	String $titulo
         */
        protected $titulo;

        /**
         * __construct()
         * 
         * Função que realiza a construção da classe.
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       Bool $requer_autenticacao É utilizada para controlar as 
         *              páginas que necessitam de login
         * @param       bool $admin Indica se para acessar determinado arquivo é
         *              necessário ser um funcionário, ou seja, o administrador
         */
        public function __construct($requer_autenticacao = TRUE, $admin = NULL)
        {
            parent::__construct();
            session_start();
            
            $this->template = 'template/painel';
            $this->titulo   = 'Formulário de inscrição';
            
            $this->verifica_login($requer_autenticacao, $admin);
            
            /** Configurações que serão usadas pela paginação **/
            $config['full_tag_open']    = '<ul class="pagination">';
            $config['full_tag_close']   = '</ul>';
            $config['first_link']       = 'Primeiro';
            $config['first_tag_open']   = '<li>';
            $config['first_tag_close']  = '</li>';
            $config['last_link']        = 'Último';
            $config['last_tag_open']    = '<li>';
            $config['last_tag_close']   = '</li>';
            $config['next_link']        = 'Próximo »';
            $config['next_tag_open']    = '<li>';
            $config['next_tag_close']   = '</li>';
            $config['prev_link']        = '« Anterior';
            $config['prev_tag_open']    = '<li>';
            $config['prev_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="active"><a>';
            $config['cur_tag_close']    = '</a></li>';
            $config['num_tag_open']     = '<li>';
            $config['num_tag_close']    = '</li>';
            $this->pagination->initialize($config);
        }
        //**********************************************************************

        /**
         * LoadView()
         * 
         * Função responsável por fazer a integração entre a view os dados 
         * e o template
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public 
         */
        public function LoadView()
        {
            $this->dados['view'] 		= $this->view;
            $this->dados['titulo'] 		= $this->titulo;
            $this->dados['protocolo']	= $this->verifica_inscricao();

            $this->load->view($this->template, $this->dados);
        }
        //**********************************************************************

        /**
         * verifica_login()
         * 
         * Verifica se a página solicitada necessita de login efetuado. Se o 
         * usuário não tiver efetuado o login, o redireciona para a página 
         * principal, para que possa efetuar o mesmo
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public 
         * @param       Bool $requer_autenticacao É utilizada para controlar as 
         *              páginas que necessitam de login
         * @param       bool $admin Indica se para acessar determinado arquivo é
         *              necessário ser um funcionário, ou seja, o administrador
         */
        public function verifica_login($requer_autenticacao, $admin = NULL)
        {
            if ($requer_autenticacao)
            {
                if ($admin)
                {
                    if (!isset($_SESSION['admin']))
                    {
                        redirect(app_baseurl() . 'LoginAdministrativo');
                    }
                }
                else
                {
                    if (!isset($_SESSION['usuario']))
                    {
                        redirect(app_baseUrl() . 'login');
                    }
                }
            }
        }
        //**********************************************************************

        /**
         * verifica_inscricao()
         * 
         * Função desenvolvida para verificar se o usuário já realizou sua inscrição
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public    
         */
        function verifica_inscricao()
        {
            if (isset($_SESSION['usuario']))
            {
                $this->load->model('usuarios_model');

                return $this->usuarios_model->verifica_protocolo();
            }
        }
        //**********************************************************************
    }
    /** End of File MY_Controller.php **/
    /** Location ./application/core/MY_Controller.php **/
    