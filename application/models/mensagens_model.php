<?php
    /**
     * @package     MY_Model
     * @subpackage  Mensagens_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Função desenvolvida envolvendo a tabela mensagens
     */
    class Mensagens_model extends MY_Model
    {
        /**
         * @name        __contruct()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @access      public
         * @param       string  $this->_tabela  Indica a tabela que iremos trabalhar
         * @param       string  $this->_primary Indica qual o campo de chave primária da tabela acima
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela  = 'mensagens';
            $this->_primary = 'id';
        }
        /**********************************************************************/
        
        /**
         * @name        contar_naoLidas()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a contagens das mensagens não lidas
         */
        function contar_naoLidas()
        {
            $this->BD->where('direcao', 'r');
            $this->BD->where('foi_lida', 1);
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            return $this->BD->count_all_results($this->_tabela);
        }
        /**********************************************************************/
        
        /**
         * contar_naoLidasAdmin()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para contar as mensagens recebidas
         *              não lidas pelo administrador do sistema.
         * @return      int Retorna a quantidade de mensagens recebidas não lidas
         */
        function contar_naoLidasAdmin()
        {
            $this->BD->where('direcao', 'e');
            $this->BD->where('foi_lida', 1);
            
            return $this->BD->count_all_results($this->_tabela);
        }
        //**********************************************************************

        /**
         * @name        salvar()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar uma mensagem
         * 
         * @param       array   $dados  Contem os dados da mensagem
         * @param       array   $data   Associa os dados aos campos da tabela
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($dados)
        {
            $data = array(
                'nome'          => $dados['nome'],
                'titulo'        => $dados['titulo'],
                'mensagem'      => $dados['mensagem'],
                'id_proponente' => $dados['id_proponente']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        /**********************************************************************/
        
        /**
         * @name        entrada()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que busca as mensagens que estão na caixa de entrada
         */
        function entrada()
        {
            $this->BD->where('direcao', 'r');
            $this->BD->where('status', 1);
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            
            $this->BD->order_by('data', 'desc');
            
            $query = $this->BD->get($this->_tabela);
            
            return $query->result();
        }
        /**********************************************************************/
        
        /**
         * @name        saida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que busca as mensagens que estão na caixa de saida
         */
        function saida()
        {
            $this->BD->where('direcao', 'e');
            $this->BD->where('status', 1);
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            
            $this->BD->order_by('data', 'desc');
            
            $query = $this->BD->get($this->_tabela);
            return $query->result();
        }
        /**********************************************************************/
        
        /**
         * @name        saida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que busca as mensagens que estão na caixa de saida
         */
        function excluidos()
        {
            $this->BD->where('status', 0);
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            
            $this->BD->order_by('data', 'desc');
            
            $query = $this->BD->get($this->_tabela);
            return $query->result();
        }
        /**********************************************************************/
        
        /**
         * @name        busca_mensagemById()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar uma mensagem pelo id
         * @param       int     $id     Contém o ID da mensagem
         * @return      array   Retorna um array com a mensagem
         */
        function busca_mensagemById($id)
        {
            $this->BD->where('id', $id);
            $query = $this->BD->get($this->_tabela);
            
            return $query->result();
        }
        /**********************************************************************/

        /***********************************************************************
         * SEÇÂO RESPONSÁVEL PELAS OPERAÇÕES DE MENSAGENS
         **********************************************************************/
        
        /**
         * @name        marcar_naoLida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que marca uma mensagem como não lida
         * @param       int $id Contém o ID da mensagem que será alterada
         * @return      bool    Retorna TRUE se alterar e FALSE se não alterar
         */
        function marcar_naoLida($id)
        {
            $data = array(
                'foi_lida' => 1
            );
            
            $this->BD->where('id', $id);
            return $this->BD->update($this->_tabela, $data);
        }
        /**********************************************************************/
        
        /**
         * @name        marcar_lida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que marca uma mensagem como não lida
         * @param       int $id Contém o ID da mensagem que será alterada
         * @return      bool    Retorna TRUE se alterar e FALSE se não alterar
         */
        function marcar_lida($id)
        {
            $data = array(
                'foi_lida' => 0
            );
            
            $this->BD->where('id', $id);
            return $this->BD->update($this->_tabela, $data);
        }
        /**********************************************************************/
        
        /**
         * @name        marcar_excluida()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para marcar uma mensagem como excluida
         * @param       int     $id     Contém o ID da mensagem
         * @param       array   $data   Associa os dados ao campo da tabela
         * @return      bool    Retorna TRUE se alterar e FALSE se não alterar
         */
        function marcar_excluida($id)
        {
            $data = array(
                'status' => 0
            );
            
            $this->BD->where('id', $id);
            return $this->BD->update($this->_tabela, $data);
        }
        /**********************************************************************/
        
        /**
         * @name        excluir_definitivo()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para excluir definitivamente
         * @param       int $id Contém o ID da mensagem a ser excluida
         * @return      bool retorna TRUE se salvar e FALSE se não salvar
         */
        function excluir_definitivo($id)
        {
            $this->BD->where('id', $id);
            
            return $this->BD->delete($this->_tabela);
        }
        /**********************************************************************/
        
        /**
         * @name        excluir_selecionados()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para excluir várias mensagens de uma
         *              vez
         * @param       array   $id Contém os ID das mensagens que serão excluidas
         */
        function excluir_selecionados($id)
        {
            for($i = 0; $i < count($id); $i++)
            {
                $data = array(
                    'status' => 0
                );
                
                $this->BD->where('id', $id[$i]);
                
                if(!$this->BD->update($this->_tabela, $data))
                {
                    $resposta['erro'] = 0;
                }
                else
                {
                    $resposta['sucesso'] = 1;
                }
                
            }
            
            return $resposta;
        }
        //**********************************************************************
        
        /***********************************************************************
         * SEÇÃO RESPONSÁVEL PELAS MENSAGENS DO ADMINISTRADOR DO SISTEMA
         **********************************************************************/
        /**
         * adEntrada()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar as mensagens da caixa de
         *              entrada
         * @access      Public
         * @return      array   Retorna um array de mensagenss
         */
        function adEntrada()
        {
            $this->BD->where('direcao', 'e');
            $this->BD->order_by('data', 'desc');
            
            return $this->BD->get($this->_tabela)->result();
        }
    
    }
    /** End of File mensagens_model.php **/
    /** Location ./application/models/mensagens_model.php **/