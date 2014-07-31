<?php

    /**
     * Login.php
     *
     * @package		Login.php
     * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract	Classe desenvolvida para realizaço do login
     */
    class Login_library extends CI_Controller
    {
        /**
         * fazer_login()
         *
         * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract	Função desenvolvida para realizar o login
         * @param 	string $dados Contém o login e a senha do usuario, além de um identificador
         * 		para identificar a origem
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
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para fazer o login da área administrativa
         * @param       array   $dados  Contém o login e a senha do usuário
         */
        function login_administrativo($dados)
        {
            $CI = & get_instance();
            
            $this->load->model('LoginAd_model');
            
            $resposta = $this->LoginAd_model->buscar_usuario($dados);
            
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