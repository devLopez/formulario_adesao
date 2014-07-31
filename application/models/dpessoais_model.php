<?php

    /**
     * dpessoais_model.php
     * 
     * @package     MY_Model
     * @subpackage  Dpessoais_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Class desenvolvida para gerenciar as transações envolvendo a
     *              tabela dados_pessoais
     */
    class Dpessoais_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @param       string $this->_tabela Indica a tabela que iremos trabalhar
         * @param       string $this->_primary Indica qual o campo é a chave primária da tabela anterior
         */
        public function __construct()
        {
            parent::__construct();
            $this->_tabela  = 'dados_pessoais';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados do proponente
         * @param       array $dados Variavel que contem os dados do proponente
         * @param       array $data Variável que irá ajuntar os dados aos nomes dos campos da tabela
         */
        function salvar($dados_pessoais)
        {
            $data = array(
                'id_proponente'             => $dados_pessoais['id_proponente'],
                'nome_pai'                  => $dados_pessoais['nome_pai'],
                'nome_mae'                  => $dados_pessoais['nome_mae'],
                'data_nascimento'           => $dados_pessoais['data_nascimento'],
                'identidade'                => $dados_pessoais['numero_identidade'],
                'orgao_emissor'             => $dados_pessoais['orgao_emissor'],
                'data_emissao'              => $dados_pessoais['data_emissao'],
                'naturalidade_estado'       => $dados_pessoais['naturalidade_estado'],
                'nacionalidade'             => $dados_pessoais['nacionalidade'],
                'sexo'                      => $dados_pessoais['sexo'],
                'escolaridade'              => $dados_pessoais['escolaridade'],
                'estado_civil'              => $dados_pessoais['estado_civil'],
                'numero_dependentes'        => $dados_pessoais['numero_dependentes'],
                'endereco_residencial'      => $dados_pessoais['endereco_residencial'],
                'numero_residencia'         => $dados_pessoais['numero_residencia'],
                'complemento_residencia'    => $dados_pessoais['complemento_residencia'],
                'bairro'                    => $dados_pessoais['bairro'],
                'cidade'                    => $dados_pessoais['cidade'],
                'cep'                       => $dados_pessoais['cep'],
                'situacao_residencia'       => $dados_pessoais['situacao_residencia'],
                'anos_residencia'           => $dados_pessoais['anos_residencia'],
                'telefone'                  => $dados_pessoais['telefone'],
                'celular'                   => $dados_pessoais['celular'],
                'email'                     => $dados_pessoais['email']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * buscar_dadosPessoais()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a busca dos dados pessoais do proponente
         */
        function busca_dadosPessoais()
        {
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para fazer o update na tupla cujo ID
         *              da tupla será passado com parâmetro juntamente com os outros
         *              dados
         * @param       array   $dados_pessoais Contém os dados pessoais do usuário
         * @param       array   $data           Associa os dados aos campos da tabela
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function update($dados_pessoais)
        {
            $data = array(
                'nome_pai'                  => $dados_pessoais['nome_pai'],
                'nome_mae'                  => $dados_pessoais['nome_mae'],
                'data_nascimento'           => $dados_pessoais['data_nascimento'],
                'identidade'                => $dados_pessoais['numero_identidade'],
                'orgao_emissor'             => $dados_pessoais['orgao_emissor'],
                'data_emissao'              => $dados_pessoais['data_emissao'],
                'naturalidade_estado'       => $dados_pessoais['naturalidade_estado'],
                'nacionalidade'             => $dados_pessoais['nacionalidade'],
                'sexo'                      => $dados_pessoais['sexo'],
                'escolaridade'              => $dados_pessoais['escolaridade'],
                'estado_civil'              => $dados_pessoais['estado_civil'],
                'numero_dependentes'        => $dados_pessoais['numero_dependentes'],
                'endereco_residencial'      => $dados_pessoais['endereco_residencial'],
                'numero_residencia'         => $dados_pessoais['numero_residencia'],
                'complemento_residencia'    => $dados_pessoais['complemento_residencia'],
                'bairro'                    => $dados_pessoais['bairro'],
                'cidade'                    => $dados_pessoais['cidade'],
                'cep'                       => $dados_pessoais['cep'],
                'situacao_residencia'       => $dados_pessoais['situacao_residencia'],
                'anos_residencia'           => $dados_pessoais['anos_residencia'],
                'telefone'                  => $dados_pessoais['telefone'],
                'celular'                   => $dados_pessoais['celular'],
                'email'                     => $dados_pessoais['email']
            );
            
            $this->BD->where($this->_primary, $dados_pessoais['id']);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of File dpessoais_model.php **/
    /** Location ./applications/models/dpessoais_model.php **/