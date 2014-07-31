Classe desenvolvida para gerenciar as operações envolvendo as referencias pessoais do usuário.

A classe é composta por 5 funções:
* __construct()
	* Realiza a construção da classe
* salvar()
	* Função desenvolvida para salvar uma nova referencia
* buscar()
	* Função desenvolvida para buscar as referencias cadastradas
* excluir()
	* Função desenvolvida para excluir um registro
* atualizar()
	* Função desenvolvida para atualizar um registro, de acordo com o ID passado como parâmetro

```
    /**
     * Referencias_model.php
     * 
     * Classe desenvolvida para gerenciar as operações envolvendo as referencias
     * pessoais do usuário.
     * 
     * @package     MY_Model
     * @subpackage  referencias_model
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     */
    class referencias_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        public function __construct()
        {
            parent::__construct();
            
            /** Indica a tabela e a chave primária que iremos trabalhar nesta classe **/
            $this->_tabela  = 'referencias_pessoais';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar uma nova referencia
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       array $dados Contém os dados que serão salvos
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar($dados)
        {
            /** Array que associa os dados aos campos da tabela **/
            $data = array(
                'id_proponente'         => base64_decode($_SESSION['usuario']['id_proponente']),
                'nome_referencia'       => $dados['nome_referencia'],
                'endereco_referencia'   => $dados['endereco_referencia'],
                'telefone_referencia'   => $dados['telefone_referencia']
            );
            
            return $this->BD->insert($this->_tabela, $data);
        }
        //**********************************************************************
        
        /**
         * buscar()
         * 
         * Função desenvolvida para buscar as referencias cadastradas
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $id Indica o ID na qual desejamos buscar. Caso não for
         *              passado nenhum valor como parâmetro, a busca retornará todos
         *              os valores, ao invés de 1
         * @return      array Retorna um array de referencias
         */
        function buscar($id = NULL)
        {
            if(!empty($id))
            {
                $this->BD->where('id', $id);
            }
            
            $this->BD->where('id_proponente', base64_decode($_SESSION['usuario']['id_proponente']));
            $this->BD->order_by('nome_referencia');
            
            return $this->BD->get($this->_tabela)->result();
        }
        //**********************************************************************
        
        /**
         * excluir()
         * 
         * Função desenvolvida para excluir um registro
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @param       int $id Contém o ID do registro a ser excluido
         * @return      Bool Retorna TRUE se excluir e FALSE se não excluir
         */
        function excluir($id)
        {
            $this->BD->where('id', $id);
            
            return $this->BD->delete($this->_tabela);
        }
        //**********************************************************************
        
        /**
         * atualizar()
         * 
         * Função desenvolvida para atualizar um registro, de acordo com o ID 
         * passado como parâmetro
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @param       array   $dados Contém os dados que serão atualizados
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        public function atualizar($dados)
        {   
            /** Associa os campos da tabela aos dados recebidos **/
            $data = array(
                'nome_referencia'        => $dados['nome_referencia'],
                'endereco_referencia'    => $dados['endereco_referencia'],
                'telefone_referencia'    => $dados['telefone_referencia']
            );
            
            $this->BD->where('id', $dados['id']);
            
            return $this->BD->update($this->_tabela, $data);
        }
        //**********************************************************************
    }
    /** End of File referencias_model.php **/
    /** Location ./application/models/referencias_model.php **/