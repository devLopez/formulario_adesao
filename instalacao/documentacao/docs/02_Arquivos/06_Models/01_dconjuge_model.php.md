Classe desenvolvida para gerenciar as transações na tabela 'dados_conjuge'

É composta por 4 funções
* __construct()
	* Realiza a construção da classe
* salvar()
	* Função desenvolvida para salvar os dados do conjuge do proponente
* busca_dadosConjuge()
	* Realiza a busca dos dados pessoais do proponente
* update()
	* Função desenvolvida para atualizar os dados do conjuge

```
    /**
     * dconjuge_model.php
     * 
     * @package     MY_Model
     * @subpackage  Dconjuge_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as transações na tabela 'dados_conjuge'
     */
    class Dconjuge_model extends MY_Model
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
            $this->_tabela  = 'dados_conjuge';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados do conjuge do proponente
         * @param       array $dados_conjuge Contém os dados do conjuge
         * @param       array $data Realiza a associação dos campos da tabela com seus respectivos dados
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
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a busca dos dados pessoais do proponente
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
		 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail>
		 * @abstract	Função desenvolvida para atualizar os dados do conjuge
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