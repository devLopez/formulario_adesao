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
     * Login
     * 
     * Classe desenvolvida para realização do login
     *
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Libraries
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class Login_library extends CI_Controller
    {
        /**
         * fazer_login()
         * 
         * Função desenvolvida para realizar o login
         *
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public	
         * @param 		string $dados Contém o login e a senha do usuario, além
         * 				de um identificador para identificar a origem
         * @return		bool Retorna TRUE se efetuar o login e FALSE se não 
         * 				efetuar
         */
        function fazer_login($dados)
        {
            $CI = & get_instance();

            $this->load->model('usuarios_model');

            $resposta = $this->usuarios_model->login($dados);

            if($resposta)
            {
                foreach($resposta as $row)
                {
                    $_SESSION['usuario']['nome_proponente'] = $row->nome_proponente;
                    $_SESSION['usuario']['cpf_proponente']  = $row->cpf_proponente;
                    $_SESSION['usuario']['id_proponente']   = base64_encode($row->id);
                }
                return true;
            }
            else
            {
                return false;
            }
        }
        //**********************************************************************
        
        /**
         * login_administrativo()
         * 
         * Função desenvolvida para fazer o login da área administrativa
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array $dados Contém o login e a senha do usuário
         * @return		bool Retorna TRUE se efetuar o login e FALSE se não 
         * 				efetuar
         */
        function login_administrativo($dados)
        {
            $CI = & get_instance();
            
            $this->load->model('Administrativos_model', 'usuarios');
            
            $resposta = $this->usuarios->buscar_usuario($dados);
            
            if($resposta)
            {
                foreach ($resposta as $row)
                {
                    $_SESSION['admin']['nome'] = $row->nome;
                }
                
                return true;
            }
            else
            {
                return false;
            }
        }
        //**********************************************************************
    }
    /** End of file login.php **/
    /** location ./application/libraries/Login.php **/