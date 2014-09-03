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
     * Dconjuge_model
     * 
     * Classe desenvolvida para gerenciar as transações na tabela 'dados_conjuge'
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		CI_Model
	 * @subpackage	MY_Model
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Dconjuge_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela  = 'dados_conjuge';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar os dados do conjuge do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @param       array $dados_conjuge Contém os dados do conjuge
         * @return      bool retorna true se salvar e false se não salvar
         */
        function salvar($dados_conjuge)
        {
            $data = array(
                'id_proponente'                 => $dados_conjuge['id_proponente'],
                'nome_conjuge'                  => $dados_conjuge['nome_conjuge'],
                'cpf_conjuge'                   => $dados_conjuge['cpf_conjuge'],
                'identidade_conjuge'            => $dados_conjuge['identidade_conjuge'],
                'data_expedicao_conjuge'        => $dados_conjuge['data_expedicao_conjuge'],
                'orgao_emissor_conjuge'         => $dados_conjuge['orgao_emissor_conjuge'],
                'data_nascimento_conjuge'       => $dados_conjuge['data_nascimento_conjuge'],
                'naturalidade_estado_conjuge'   => $dados_conjuge['naturalidade_estado_conjuge'],
                'nacionalidade_conjuge'         => $dados_conjuge['nacionalidade_conjuge'],
                'situacao_emprego_conjuge'      => $dados_conjuge['situacao_emprego_conjuge'],
                'empresa_conjuge'               => $dados_conjuge['empresa_conjuge'],
                'cnpj_empresa_conjuge'          => $dados_conjuge['cnpj_empresa_conjuge'],
                'data_admissao_conjuge'         => $dados_conjuge['data_admissao_conjuge'],
                'endereco_comercial_conjuge'    => $dados_conjuge['endereco_comercial_conjuge'],
                'numero_empresa_conjuge'        => $dados_conjuge['numero_empresa_conjuge'],
                'complemento_empresa_conjuge'   => $dados_conjuge['complemento_empresa_conjuge'],
                'telefone_empresa_conjuge'      => $dados_conjuge['telefone_empresa_conjuge'],
                'cargo_empresa_conjuge'         => $dados_conjuge['cargo_empresa_conjuge'],
                'salario_conjuge'               => $dados_conjuge['salario_conjuge'],
                'profissao_conjuge'             => $dados_conjuge['profissao_conjuge']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * busca_dadosConjuge()
         * 
         * Realiza a busca dos dados pessoais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function busca_dadosConjuge()
        {
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
		/**
		 * update()
		 * 
		 * Função desenvolvida para atualizar os dados do conjuge
		 *
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail>
		 * @access		Public
		 * @param		array $dados_conjuge Contém os dados que serão atualizados
		 * @return		bool Retorna TRUE se atualizar e FALSE se não atualizar
		 */
        function update($dados_conjuge)
        {
            $data = array(
                'nome_conjuge'                  => $dados_conjuge['nome_conjuge'],
                'cpf_conjuge'                   => $dados_conjuge['cpf_conjuge'],
                'identidade_conjuge'            => $dados_conjuge['identidade_conjuge'],
                'data_expedicao_conjuge'        => $dados_conjuge['data_expedicao_conjuge'],
                'orgao_emissor_conjuge'         => $dados_conjuge['orgao_emissor_conjuge'],
                'data_nascimento_conjuge'       => $dados_conjuge['data_nascimento_conjuge'],
                'naturalidade_estado_conjuge'   => $dados_conjuge['naturalidade_estado_conjuge'],
                'nacionalidade_conjuge'         => $dados_conjuge['nacionalidade_conjuge'],
                'situacao_emprego_conjuge'      => $dados_conjuge['situacao_emprego_conjuge'],
                'empresa_conjuge'               => $dados_conjuge['empresa_conjuge'],
                'cnpj_empresa_conjuge'          => $dados_conjuge['cnpj_empresa_conjuge'],
                'data_admissao_conjuge'         => $dados_conjuge['data_admissao_conjuge'],
                'endereco_comercial_conjuge'    => $dados_conjuge['endereco_comercial_conjuge'],
                'numero_empresa_conjuge'        => $dados_conjuge['numero_empresa_conjuge'],
                'complemento_empresa_conjuge'   => $dados_conjuge['complemento_empresa_conjuge'],
                'telefone_empresa_conjuge'      => $dados_conjuge['telefone_empresa_conjuge'],
                'cargo_empresa_conjuge'         => $dados_conjuge['cargo_empresa_conjuge'],
                'salario_conjuge'               => $dados_conjuge['salario_conjuge'],
                'profissao_conjuge'             => $dados_conjuge['profissao_conjuge']
            );
            
            $this->BD->where($this->_primary, $dados_conjuge['id']);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of File dconjuge_model.php **/
    /** Location ./application/models/dconjuge_model.php **/