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
     * Alterar_senha
     * 
     * Classe desenvolvida para que o usuário possa trocar a sua senha
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Controller
	 * @subpackage	MY_Controller
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class Alterar_senha extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção do controller
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct(FALSE);

            $this->load->model('usuarios_model');
        }
        //**********************************************************************

        /**
         * index()
         * 
         * Função principal do controller, responsável pela view inicial
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		string $nivel Indica o nível do usuário. Se o nível for
         * 				igual a *admin* indica que a solicitação está sendo feita
         * 				por um usuário administrativo
         */
        function index($nivel = NULL)
        {
            $this->view     = 'alterar_senha';
            $this->template = 'template/default';
            $this->titulo   = 'Trocar minha senha';
            
            if(isset($nivel))
            {
            	$this->dados['nivel'] = $nivel;
            }

            $this->LoadView();
        }
        //**********************************************************************

        /**
         * verifica_cpf()
         * 
         * Função que verifica se existe um cpf identico ao digitado
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se encontar o cpf e FALSE se não 
         * 				encontar
         */
        function verifica_cpf()
        {
            $cpf 	= $this->input->post('cpf');
            $nivel	= $this->input->post('nivel');
            
            if($nivel == 'admin')
            {
            	$this->load->model('Administrativos_model');
            	
            	echo $this->Administrativos_model->verifica_cpf($cpf);
            }
            else
            {
            	echo $this->usuarios_model->verifica_cpf($cpf);
            }

        }
        //**********************************************************************

        /**
         * alterar()
         * 
         * Função desenvolvida para alterar a senha do usuário
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se alterar e FALSE se não alterar
         */
        function alterar()
        {
            $dados['login']	= $this->input->post('cpf');
            $dados['senha']	= md5($this->input->post('senha'));
            $dados['nivel']	= $this->input->post('nivel');
            
            if ($dados['nivel'] == 'admin')
            {
            	$this->load->model('Administrativos_model', 'administrativo');
            	
            	$resposta = $this->administrativo->alterar_senha($dados);
            	
            	if($resposta == 1)
            	{
            		echo 1;
            	}
            	else
            	{
            		echo 0;
            	}
            }
            else
            {
            	$resposta = $this->usuarios_model->alterar_senha($dados);
            	
            	if($resposta == 1)
            	{
            		$this->load->library('login_library');
            	
            		if($this->login_library->fazer_login($dados) == 1)
            		{
            			/** Imprime 1 se o login for feito **/
            			echo 1;
            		}
            		else
            		{
            			/** Imprime 2 se no fazer o login **/
            			echo 2;
            		}
            	}
            	else
            	{
            		/** Imprime 0 se não atualizar a senha **/
            		echo 0;
            	}
            }
        }
        //**********************************************************************
    }
    /** End of file alterar_senha.php **/
    /** location ./application/models/alterar_senha.php **/