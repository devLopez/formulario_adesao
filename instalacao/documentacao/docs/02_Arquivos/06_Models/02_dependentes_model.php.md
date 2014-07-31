Classe desenvolvida para gerenciar os dependentes

É Composta por 6 funções
* __construct()
	* Realiza a construção da classe
* buscar_dependentes()
	* Função desenvolvida para buscar os dependentes cadastrados para um usuário
* salvar()
	* Função desenvolvida para salvar os dados de um dependente
* excluir()
	* Função que exclui um registro pelo ID
* buscar_byId()
	* Função desenvolvida para buscar os dados de um dependente de acordo o ID passado
* update()
	* Função desenvolvida para realizar o update em um dependente
	
```
    /**
     * dependentes_model()
     * 
     * @package     MY_Model
     * @subpackage  Dependentes_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar os dependentes
     */
    class Dependentes_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @param       string $this->_tabela   Indica a tabela que será trabalhada
         * @param       string $this->_primary  Indica a chave primaria da tabela acima
         * @access      public
         */
        public function __construct()
        {
            parent::__construct();
            
            $this->_tabela  = 'dependentes';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * buscar_dependentes()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dependentes cadastrados
         *              para um usuário
         * @return      array   Retorna um array de dependentes
         */
        function buscar_dependentes()
        {
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            $this->BD->order_by('parentesco_dependente', 'asc');
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados de um dependente
         * @param       array $dados    Contém os dados que serão salvos
         * @param       array $data     Faz a associação entre os dados e os campos da tabela
         * @return      bool    Retorna true se salvar e false se não salvar
         */
        function salvar($dados)
        {
            $data = array(
                'id_proponente'                 => base64_decode($_SESSION['usuario']['id_proponente']),
                'nome_dependente'               => $dados['nome_dependente'],
                'parentesco_dependente'         => $dados['parentesco_dependente'],
                'data_nascimento_dependente'    => $dados['data_nascimento_dependente'],
                'estado_civil_dependente'       => $dados['estado_civil_dependente']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * excluir()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que exclui um registro pelo ID
         * @param       int $id Recebe o id do registro que será excluido
         * @return      bool retorna true se excluir e false se não
         */
        function excluir($id)
        {
            $this->BD->where('id', $id);
            return $this->BD->delete($this->_tabela);
        }
        //**********************************************************************
        
        /**
         * buscar_byId()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dados de um dependente
         *              de acordo o ID passado
         * @param       int $id ID da tupla, foi passado pela url
         * @return      array   Retorna um array contendo os dados de um dependente
         */
        function buscar_byId($id)
        {
            $this->BD->where('id', $id);
            $query = $this->BD->get($this->_tabela);
            
            return $query->result();
        }
        //**********************************************************************
        
        /**
         * update()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para realizar o update em um dependente
         * @return      bool Retorna true se atualizar e false se não atualizar
         * @param       array   $dados  Contém os dados a serem atualizados
         * @param       array   $data   Associa os dados aos campos da tabela
         */
        function update($dados)
        {
            $data = array(
                'nome_dependente'               => $dados['nome_dependente'],
                'parentesco_dependente'         => $dados['parentesco_dependente'],
                'data_nascimento_dependente'    => $dados['data_nascimento_dependente'],
                'estado_civil_dependente'       => $dados['estado_civil_dependente']
            );
            
            $this->BD->where('id', $dados['id']);
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of FIle dependentes_model.php **/
    /** Location ./application/models/dependentes_model.php **/