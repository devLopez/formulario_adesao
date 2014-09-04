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
     * Dprofissionais_model
     * 
     * Classe desenvolvida para gerenciar as transações envolvendo a tabela 
     * 'dados_profissionais'
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Models
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Dprofissionais_model extends MY_Model
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
            
            $this->_tabela  = 'dados_profissionais';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar os dados profissionais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       array $dados_profissionais Variável que contém os dados profissionais do proponente
         * @return      bool Retorna verdadeiro se salvar e falso se não salvar
         */
        function salvar($dados_profissionais)
        {
            $data = array(
                'id_proponente'         => $dados_profissionais['id_proponente'],
                'profissao'             => $dados_profissionais['profissao'],
                'situacao_atual'        => $dados_profissionais['situacao_atual'],
                'data_admissao'         => $dados_profissionais['data_admissao'],
                'salario'               => $dados_profissionais['salario'],
                'outras_rendas'         => $dados_profissionais['outras_rendas'],
                'valor_outras_rendas'   => $dados_profissionais['valor_outras_rendas'],
                'renda_mensal_familiar' => $dados_profissionais['renda_mensal_familiar'],
                'nome_empresa'          => $dados_profissionais['nome_empresa'],
                'cnpj_empresa'          => $dados_profissionais['cnpj_empresa'],
                'tempo_empresa'         => $dados_profissionais['tempo_empresa'],
                'endereco_empresa'      => $dados_profissionais['endereco_empresa'],
                'numero_empresa'        => $dados_profissionais['numero_empresa'],
                'complemento_empresa'   => $dados_profissionais['complemento_empresa'],
                'bairro_empresa'        => $dados_profissionais['bairro_empresa'],
                'cep_empresa'           => $dados_profissionais['cep_empresa'],
                'cidade_empresa'        => $dados_profissionais['cidade_empresa'],
                'estado_empresa'        => $dados_profissionais['estado_empresa'],
                'telefone_empresa'      => $dados_profissionais['telefone_empresa'],
                'cargo_empresa'         => $dados_profissionais['cargo_empresa']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * buscar_dadosProfissionais()
         * 
         * Realiza a busca dos dados profissionais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		array Retorna um array com os dados profissionais do
         * 				proponente
         */
        function busca_dadosProfissionais()
        {
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * Função desenvolvida para atualizar os dados profissionais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
		 * @access		Public
         * @param       array   $dados_profissionais    Contém os dados profissionais do usuário
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function update($dados_profissionais)
        {
            $data = array(
                'profissao'             => $dados_profissionais['profissao'],
                'situacao_atual'        => $dados_profissionais['situacao_atual'],
                'data_admissao'         => $dados_profissionais['data_admissao'],
                'salario'               => $dados_profissionais['salario'],
                'outras_rendas'         => $dados_profissionais['outras_rendas'],
                'valor_outras_rendas'   => $dados_profissionais['valor_outras_rendas'],
                'renda_mensal_familiar' => $dados_profissionais['renda_mensal_familiar'],
                'nome_empresa'          => $dados_profissionais['nome_empresa'],
                'cnpj_empresa'          => $dados_profissionais['cnpj_empresa'],
                'tempo_empresa'         => $dados_profissionais['tempo_empresa'],
                'endereco_empresa'      => $dados_profissionais['endereco_empresa'],
                'numero_empresa'        => $dados_profissionais['numero_empresa'],
                'complemento_empresa'   => $dados_profissionais['complemento_empresa'],
                'bairro_empresa'        => $dados_profissionais['bairro_empresa'],
                'cep_empresa'           => $dados_profissionais['cep_empresa'],
                'cidade_empresa'        => $dados_profissionais['cidade_empresa'],
                'estado_empresa'        => $dados_profissionais['estado_empresa'],
                'telefone_empresa'      => $dados_profissionais['telefone_empresa'],
                'cargo_empresa'         => $dados_profissionais['cargo_empresa']
            );
            
            $this->BD->where($this->_primary, $dados_profissionais['id']);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of File dprofissionais_model.php **/
    /** Location ./application/models/dprofissionais_model.php **/