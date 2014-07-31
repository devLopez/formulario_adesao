<?php

    /**
     * usuarios_model.php
     * 
     * @package     MY_Model
     * @subpackage  usuarios_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as operações com os
     *              dados dos usuários
     */
    class Usuarios_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         */
        public function __construct()
        {
            parent::__construct();
            $this->_tabela  = 'usuarios';
            $this->_primary = 'id';
        }
        //**********************************************************************

        /**
         * verifica_cpf()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar um cpf na base de dados
         * @return      Integer retorna o número de cpfs cadastrados
         */
        function verifica_cpf($cpf_proponente)
        {
            $this->BD->where('cpf_proponente', $cpf_proponente);
            return $this->BD->count_all_results($this->_tabela);
        }
        //**********************************************************************

        /**
         * salvar_usuario()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados de um novo usuário
         * @param       Array - $dados - array que contém os dados do novo usuário
         * @return      Bool retorna verdadeiro ou falso no caso do cadastro
         */
        function salvar_usuario($dados)
        {
            $data = array(
                'nome_proponente'   => $dados['nome_proponente'],
                'cpf_proponente'    => $dados['cpf_proponente'],
                'senha_proponente'  => $dados['senha_proponente']
            );
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************

        /**
         * login()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dados do usuário para efetuar o login
         * @param       String $dados['login'] CPF do usuário, que é usado como login
         * @param       String $dados['senha'] Contém a senha do usuário em md5
         * @return      Array retorna um array com os dados do usuário se true, e FALSE caso não encontre nada
         */
        function login($dados)
        {
            $this->BD->select('id, nome_proponente, cpf_proponente');
            $this->BD->where(array('cpf_proponente' => $dados['login'],'senha_proponente' => $dados['senha']));
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************

        /**
         * salva_protocolo()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar o numero de protocolo no cadastro do usuário
         * @param       array   $data   Variável que receberá o protocolo
         * @return      bool Retorna true se salvar e false se não salvar
         **/
       function salva_protocolo()
       {
           $data = array(
               'numero_protocolo' => md5($_SESSION['usuario']['cpf_proponente'])
           );

           $this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
           return $this->BD->update($this->_tabela, $data);
       }
       //***********************************************************************

       /**
        * verifica_protocolo()
        * 
        * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
        * @abstract     Função desenvolvida para verifica se existe um numero de protocolo
        */
       function verifica_protocolo()
       {
           $this->BD->where('numero_protocolo', md5($_SESSION['usuario']['cpf_proponente']));
           return $this->BD->count_all_results($this->_tabela);
       }
       //***********************************************************************

       /**
        * verifica_aprovacao()
        * 
        * @author	Matheus Lopes Santos <fale_com_lopez@hotmail.com>
        * @abstract     Função desenvolvida para verificar a aprovação da cota
        */
       function verifica_aprovacao()
       {
           $this->BD->select('status_aprovacao');
           $this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
           $query = $this->BD->get($this->_tabela);

           foreach ($query->result() as $row)
           {
               $status_aprovacao = $row->status_aprovacao;
           }

           return $status_aprovacao;
       }
       //***********************************************************************

       /**
        * alterar_senha()
        *
        * @author        Matheus Lopes Santos <fale_com_lopez@hotmail.com>
        * @abstract      Função desenvolvida para alterar a senha do usuário
        * @param         array $dados Contém o CPF e a Nova senha do usuário
        * @return        bool Retorna TRUE se alterar e FALSE se não alterar
        */
        function alterar_senha($dados)
        {
            $data = array(
                'senha_proponente' => $dados['senha']
            );

            $this->BD->where('cpf_proponente', $dados['login']);

            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * buscar_todosDados()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar todos os dados do 
         *              usuário
         */
        function buscar_todosDados()
        {
            $this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
            
            $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * alterar_nome()
         * 
         * @author      Matheus Lopes Santos
         * @abstract    Função desenvolvida para alterar o nome do usuário
         * @param       string $nome_proponente Contém o nome de usuário
         * @return type
         */
        function alterar_nome($nome_proponente)
        {
            // Associa o campo da tabela à variável
            $data = array(
                'nome_proponente' => $nome_proponente
            );
            
            $this->BD->where('id', base64_decode($_SESSION['usuario']['id_proponente']));
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * contar_propostasAbertas()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para contar a quantidade de propostas
         *              que estão em aberto
         * @return      int Retorna o número de propostas em aberto
         */
        function contar_propostasAbertas()
        {
            return $this->BD->query("SELECT COUNT(*) AS propostas FROM {$this->_tabela} WHERE status_aprovacao IS NULL AND numero_protocolo IS NOT NULL")->result();
        }
        //**********************************************************************
        
        /**
         * buscar_allPropostas()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @abstract    Função desenvolvida para buscar os dados dos usuários do
         *              sistema
         * @param       int $limite Define o limite da pesquisa sql
         * @param       int $offset Define o offset da pesquisa sql
         * @return      array   Retorna array contendo os dados dos usuarios cadastrados
         */
        function buscar_allPropostas($limite, $offset)
        {
            $this->BD->limit($limite, $offset);
            $this->BD->order_by('data_adesao', 'desc');
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * contar()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    função desenvolvida para contar a quantidade de usuarios
         *              cadastrados
         * @return      int Retorna a quantidade de usuários cadastrados
         */
        function contar()
        {
            return $this->BD->count_all_results($this->_tabela);
        }
        //**********************************************************************
        
        /**
         * buscar_byId()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a busca de um registro baseado no ID do proponente
         * @param       int $id Contém o ID do registro a ser buscado
         * @access      Public
         */
        function buscar_byId($id)
        {
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * deferir()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para deferir uma proposta
         * @param       int $id Contém o id do registro a ser modificado
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function deferir($id)
        {
            /** Associa os dados os campos da tabela**/
            $data = array('status_aprovacao' => 1);
            
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * indeferir()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para indeferir uma proposta
         * @param       int $id Contém o id do registro a ser modificado
         * @return      bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function indeferir($id)
        {
            /** Associa os dados os campos da tabela**/
            $data = array('status_aprovacao' => 0);
            
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of File usuarios_model.php **/
    /** Location ./application/models/usuarios_model.php **/