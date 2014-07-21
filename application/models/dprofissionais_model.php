<?php
    /**
     * @package     MY_Model
     * @subpackage  Dprofissionais_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as transações envolvendo a tabela 'dados_profissionais'
     */
    class Dprofissionais_model extends MY_Model
    {
        /**
         * @name        __construct
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @param       string $this->_tabela Indica a tabela que iremos trabalhar
         * @param       string $this->_primary Indica o campo de chave primária da tabela anterior
         * @return      bool Retorna verdadeiro se salvar e falso se não salvar
         */
        public function __construct()
        {
            parent::__construct();
            $this->_tabela  = 'dados_profissionais';
            $this->_primary = 'id';
        }
        /**********************************************************************/
        
        /**
         * @name        salvar()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados profissionais do proponente
         * @param       array $dados_profissionais Variável que contém os dados profissionais do proponente
         * @param       array $data Variável que associará os campos da tabela aos respectivos dados
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
        /**********************************************************************/
        
        /**
         * @name        buscar_dadosProfissionais()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a busca dos dados pessoais do proponente
         */
        function busca_dadosProfissionais()
        {
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            
            $query = $this->BD->get($this->_tabela);
            return $query->result();
        }
        /**********************************************************************/
        
        /**
         * @name        update()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @param       array   $dados_profissionais    Contém os dados profissionais do usuário
         * @param       array   $data                   Associa os campos da tabela aos dados
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
    }
?>