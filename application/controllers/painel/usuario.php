<?php
    /**
     * usuario.php
     * 
     * @package     MY_Controller
     * @subpackage  usuario.php
     * @version     1.0
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Controller desenvolvido para gerenciar o perfil do usuário
     */
    class Usuario extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para construção do controller
         */
        public function __construct($requer_autenticacao = TRUE)
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
         * @access      public
         */
        function index()
        {
            $this->view     = 'painel/usuario';
            $this->titulo   = 'Meu usuário';
            
            $this->LoadView();
        }
        /**********************************************************************/
        
        /**
         * buscar_dados()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dados de acesso do
         *              usuário
         * 
         */
        function buscar_dados()
        {
            $this->dados['usuario'] = $this->usuarios_model->buscar_todosDados();
            
            $this->load->view('paginas/painel/ajax/usuario', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * atualizar_perfil()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para alterar os dados do usuário
         */
        function atualizar_perfil()
        {
            $senha              = $this->input->post('senha');
            $nome_proponente    = $this->input->post('nome_proponente');
            
            $resposta_nome = $this->alterar_nomeUsuario($nome_proponente);
            
            if(isset($senha))
            {
                $resposta_senha = $this->alterar_senha($senha);
            }
            
            $resposta = array (
                'r_nome'    => $resposta_nome,
                'r_senha'   => $resposta_senha
            );
            
            echo json_encode($resposta);
        }
        /**********************************************************************/
        
        /**
         * alterar_senha()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para atualizar a senha do usuário
         * @access      private
         * @param       string $senha Contém a nova senha do usuario
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        private function alterar_senha($senha)
        {
            $dados['senha'] = $senha;
            $dados['login'] = $_SESSION['usuario']['cpf_proponente'];
            
            return $this->usuarios_model->alterar_senha($dados);
        }
        /**********************************************************************/
        
        /**
         * alterar_nomeUsuario()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para atualizar o nome do usuário
         * @access      provate
         * @param       string  $nome Contém o nome do usuário
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        private function alterar_nomeUsuario($nome_proponente)
        {
            return $this->usuarios_model->alterar_nome($nome_proponente);
        }
    }
    
    /** End of File usuario.php **/
    /** Location ./application/controllers/painel/usuario.php **/