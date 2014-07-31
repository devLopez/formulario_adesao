Classe desenvolvida para gerenciar as operações com a tabela observacoes

A classe é composta por 6 funções
* __construct()
	* Realiza a construção da classe
* salvar()
	* Função desenvolvida para salvar uma observação
* buscar_todas()
	* Realiza a busca de todas as observações cadastradas para um proponente
* buscar()
	* Função desenvolvida para buscar um registro
* update()
	* Função desenvolvida para atualizar uma observação
* delete()
	* Função desenvolvida para apagar uma observação

```    
    /**
     * observacoes_model.php
     * 
     * @package     MY_Model
     * @subpackage  observacoes_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as operações com a tabela
     *              observacoes
     */
    class Observacoes_model extends MY_Model
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
            
            /** Seleciona a tabela e a chave primária **/
            $this->_tabela  = 'observacoes';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar uma observação
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         * @access      Public
         * @param       array $dados Contém os dados que serão salvos
         */
        public function salvar($dados)
        {
            /** Associa os campos aos dados **/
            $data = array(
                'id_proponente' => $dados['id_proponente'],
                'observacao'    => $dados['observacao']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * buscar_todas()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a busca de todas as observações cadastradas para
         *              um proponente
         * @param       int $id_proponente  Contém o id do proponente que será usado
         *              na consulta sql
         * @return      array   Retorna um array de observações
         */
        function buscar_todas($id_proponente)
        {
            $this->BD->where('id_proponente', $id_proponente);
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar um registro
         * @param       int $id Contém o ID do registro a ser buscado
         * @return      array   Retorna um array contendo o registro
         */
        function buscar($id)
        {
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para atualizar uma observação
         * @param       array   $dados  Contém os dados a serem salvos
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function update($dados)
        {
            /** Associa os dados aos campos da tabela **/
            $data = array(
                'observacao' => $dados['observacao']
            );
            
            $this->BD->where($this->_primary, $dados['id']);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * delete()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para apagar uma observação
         * @return      bool Retorna TRUE se apagar e FALSE se não apagar
         * @param       int $id Contém o ID do registro a ser apagado
         */
        function delete($id)
        {
            $this->BD->where($this->_primary, $id);
            
            return $this->BD->delete($this->_tabela);
        }
        //**********************************************************************
    }
    /** End of File observacoes_model.php **/
    /** Location ./application/models/observacoes_model.php **/