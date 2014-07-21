<?php
    /**
     * @package     MY_Controller
     * @subpackage  Mensagens
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as trocas de mensagens entre
     *              o proponente à socio e a secretaria do clube
     */
    class Mensagens extends MY_Controller
    {
        /**
         * @name        __construct()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para construção da classe
         * @param       bool    $requer_autenticacao    Se receber true, indica que,
         *              para acessar esta página é necessário fazer login
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);
            
            $this->load->model('mensagens_model');
        }
        /**********************************************************************/
        
        /**
         * @name        index()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal da classe
         * @param       string  $this->view     Indica a visão que se deseja trabalhar
         * @param       string  $this->titulo   Indica o título da visão acima
         */
        function index()
        {
            $this->view     = 'painel/mensagens';
            $this->titulo   = 'Caixa de Mensagens';
            
            $this->LoadView();
        }
        /**********************************************************************/
        
        /**
         * @name        nova_mensagem()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar a visão para edição de uma novamensagem
         */
        function nova_mensagem()
        {
            $this->load->view('/paginas/painel/ajax/mensagens/nova_mensagem');
        }
        /**********************************************************************/
        
        /**
         * @name        caixa_entrada()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar a caixa de entrada do usuário
         */
        function caixa_entrada()
        {
            $this->dados['entrada'] = $this->mensagens_model->entrada();
            $this->load->view('/paginas/painel/ajax/mensagens/caixa_entrada', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        enviar_mensagem()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para enviar uma mensagem
         */
        function enviar_mensagem()
        {
            $dados['nome']            = $_SESSION['usuario']['nome_proponente'];
            $dados['titulo']          = $this->input->post('assunto');
            $dados['mensagem']        = $this->input->post('mensagem');
            $dados['id_proponente']   = base64_decode($_SESSION['usuario']['id_proponente']);
            
            if($this->mensagens_model->salvar($dados) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        /**********************************************************************/
        
        /**
         * @name        caixa_saida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar a caixa de saida do usuário
         */
        function caixa_saida()
        {
            $this->dados['saida'] = $this->mensagens_model->saida();
            
            $this->load->view('/paginas/painel/ajax/mensagens/caixa_saida', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        excluidos()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar a caixa de saida do usuário
         */
        function excluidos()
        {
            $this->dados['excluidos'] = $this->mensagens_model->excluidos();
            
            $this->load->view('/paginas/painel/ajax/mensagens/excluidos', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        ler_mensagem()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar a mensagem para fazer a leitura
         * @param       int $idmensagem Contém o ID da mensagem que será lida
         */
        function ler_mensagem($id_mensagem)
        {
            $this->dados['mensagem'] = $this->mensagens_model->busca_mensagemById($id_mensagem);
            
            $this->load->view('paginas/painel/ajax/mensagens/ler_mensagem', $this->dados);
        }
        /**********************************************************************/

        /***********************************************************************
         * ESTA PRÓXIMA SEÇÃO É RESPONSÁVEL PELAS OPERAÇÕES COM AS MENSAGENS, 
         * COMO EXCLUSÃO, MARCAÇÃO, ETC
         **********************************************************************/
        
        /**
         * @name        marcar_naoLida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que marca uma noticia como não lida
         */
        function marcar_naoLida()
        {
            $id = $this->input->post('id');
            
            if($this->mensagens_model->marcar_naoLida($id) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        /**********************************************************************/
        
        /**
         * @name        marcar_lida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que marca uma noticia como não lida
         */
        function marcar_lida()
        {
            $id = $this->input->post('id');
            
            if($this->mensagens_model->marcar_lida($id) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        /**********************************************************************/
        
        /**
         * @name        marcar_excluida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para enviar uma mensagem para a lixeira.
         *              Esta função pode receber valores por POST ou passagem normal
         *              de parâmetros
         * @param       int $id Recebe o ID de uma mensagem que o usuário deseja
         *              que seja marcada como excluida.
         */
        function marcar_excluida($id = NULL)
        {
            if($id == NULL)
            {
                $id = $this->input->post('id');
            }
            
            if($this->mensagens_model->marcar_excluida($id) == 1)
            {
                echo 1;
                return 1;
            }
            else
            {
                echo 0;
                return 0;
            }
        }
        /**********************************************************************/
        
        /**
         * @name        excluir_definitivo()
         * @name        Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que exclui definitivamente uma mensagem
         * @param       int $id Contém o ID da mensagem a ser excluida
         */
        function excluir_definitivo()
        {
            $id = $this->input->post('id');
            
            if($this->mensagens_model->excluir_definitivo($id) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        /**********************************************************************/
        
        /**
         * @name        exclui_selecionados()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para excluir várias mensagens de uma só vez
         */
        function exclui_selecionados()
        {
            $id = $this->input->post('id');
            
            $qtde_mensagens = count($id);
            
            for($i = 0; $i < $qtde_mensagens; $i++)
            {
                if($this->marcar_excluida($id[$i]) == 1)
                {
                    $excluiu        = 1;
                    $nao_excluiu    = 0;
                }
                else
                {
                    $nao_excluiu    = 1;
                    $excluiu        = 0;
                }
            }
            
            $resposta = array('todas' => $excluiu, 'algumas' => $nao_excluiu);
            
            echo json_encode($resposta);
            
            /*$resposta = $this->mensagens_model->excluir_selecionados($id);
            
            if(!empty($resposta['sucesso']))
            {
                if($resposta['sucesso'] == 1)
                {
                    if(!empty($resposta['erro']))
                    {
                        if($resposta['erro'] == 0 || $resposta['erro'] == NULL)
                        {
                            /** Excluiu todos **
                            echo 1;
                        }
                        else
                        {
                            /** Não excluiu todos os registros **
                            echo 2;
                        }
                    }
                    else
                    {
                        echo 1;
                    }
                }
            }
            else
            {
                /** Imprime 0 se não excluir nada **
                echo 0;
            }*/
        }
    }
    /** End of File mensagens.php **/
    /** Location ./application/controllers/painel/mensagens **/