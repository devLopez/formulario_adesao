<?php

    /**
     * @package        MY_Controller
     * @subpackage     alterar_senha
     * @author         Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract       Classe desenvolvida para que o usuário possa trocar a sua senha
     */
    class Alterar_senha extends MY_Controller
    {
        /**
         * __construct()
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção do controller
         */
        public function __construct($requer_autenticacao = FALSE)
        {
            parent::__construct($requer_autenticacao);

            $this->load->model('usuarios_model');
        }
        /**********************************************************************/

        /**
         * index()
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal do controller
         */
        function index()
        {
            $this->view     = 'alterar_senha';
            $this->template = 'template/default';
            $this->titulo   = 'Trocar minha senha';

            $this->LoadView();
        }
        /**********************************************************************/

        /**
         * verifica_cpf()
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que verifica se existe um cpf identico ao digitado
         */
        function verifica_cpf()
        {
            $cpf = $this->input->post('cpf');

            echo $this->usuarios_model->verifica_cpf($cpf);

        }
        /**********************************************************************/

        /**
         * alterar()
         *
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para alterar a senha do usuário
         */
        function alterar()
        {
            $dados['login']          = $this->input->post('cpf');
            $dados['senha']          = md5($this->input->post('senha'));

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

    /** End of file alterar_senha.php **/
    /** location ./application/models/alterar_senha.php **/