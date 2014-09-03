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
     * Dpessoais_model
     * 
     * Classe desenvolvida para gerenciar as transações envolvendo a tabela 
     * dados_pessoais
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Model
	 * @subpackage	MY_Model
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Dpessoais_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access    	Public
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
         * Função desenvolvida para salvar os dados do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array $dados_pessoais Variavel que contem os dados do proponente
         * @return		bool Retorna TRUE se salvar e FALSE se não salvar
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
         * Realiza a busca dos dados pessoais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		array Retorna um array com os dados pessoais do 
         * 				proponente
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
         * Função desenvolvida para fazer o update na tupla cujo ID da tupla 
         * será passado com parâmetro juntamente com os outros dados
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array   $dados_pessoais Contém os dados pessoais do usuário
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