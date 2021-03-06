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
     * Esta classe chama a página de startup da área que necessita realizar o login
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @subpackage	Painel
	 * @version		v1.2.0
	 * @since		01/10/2014	
     */
    class Painel extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct(TRUE);
            $this->load->model('usuarios_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função inicial do controller. Irá chamar a visão do painel
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
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
         * Função que verificará se foi criada uma solicitação de cota
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function buscar_inscricao()
        {   
            return $this->usuarios_model->verifica_protocolo();
        }
        //**********************************************************************
        
        /**
         * buscar_aprovacao()
         * 
         * Função desenvolvida para verificar o status da aprovacao
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function buscar_aprovacao()
        {
            return $this->usuarios_model->verifica_aprovacao();
        }
        //**********************************************************************
        
        /**
         * verifica_email()
         * 
         * Função desenvolvida para verificar se existe um  email salvo no
         * cadastro do usuario
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		int Retorna 1 se existir email cadastrado
         */
        function verifica_email()
        {
        	echo $this->usuarios_model->contar_email();
        }
        //**********************************************************************
        
        /**
         * salvar_email()
         * 
         * Função desenvolvida para salvar o endereço de email do usuário, caso 
         * o mesmo não o tenha cadastrado
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function salvar_email()
        {
        	echo $this->usuarios_model->update_email(mysql_real_escape_string($this->input->post('email_proponente')));
        }
    }
    /** End of File painel.php **/
    /** Location ./application/controllers/painel/painel.php **/