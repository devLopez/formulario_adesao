Classe desenvolvida para gerenciar as referencias do proponente

A classe conta com 7 funções

* __construct()
	* Realiza a construção da classe
* index()
	* Função principal do controller, responsável pela visão e dados iniciais que serão mostrados ao usuário
* salvar()
	* Função desenvolvida para salvar os dados de uma nova referência
* buscar_referencias()
	* Função desenvolvida para buscar as referencias cadastradas
* excluir()
	* Função desenvolvida para excluir um registro
* editar_referencia()
	* Função desenvolvida para buscar dados de um registro para edição. A busca será baseada no ID do elemento
* atualizar()
	* Função desenvolvida para atualizar um registro

```    
    /**
     * referencias.php
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as referencias do proponente
     * @todo        Desenvolver função para atualizar os dados de uma referencia
     *              já cadastrada
     * @version     0.5.1
     */
    class Referencias extends MY_Controller
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @param       bool $requer_autenticacao Se for TRUE, indica que, para
         *              acessar esta classe é necessário ter feito login
         * @access      public
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);
            
            $this->load->model('referencias_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal da classe
         * @access      public
         */
        function index()
        {
            $this->titulo   = 'Referências pessoais';
            $this->view     = 'painel/referencias';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * salvar()
         * 
         * Função desenvolvida para salvar os dados de uma nova referência
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function salvar()
        {
            $dados['nome_referencia']       = $this->input->post('nome_referencia');
            $dados['endereco_referencia']   = $this->input->post('endereco_referencia');
            $dados['telefone_referencia']   = $this->input->post('telefone_referencia');
            
            if($this->referencias_model->salvar($dados) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        //**********************************************************************
        
        /**
         * buscar_referencias()
         * 
         * Função desenvolvida para buscar as referencias cadastradas
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function buscar_referencias()
        {
            $this->dados['referencias'] = $this->referencias_model->buscar();            
            
            $this->load->view('paginas/painel/ajax/referencias', $this->dados);
        }
        //**********************************************************************
        
        /**
         * excluir()
         * 
         * Função desenvolvida para excluir um registro
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      bool Retorna TRUE se excluir e FALSE se não excluir
         */
        function excluir()
        {
            $id = $this->input->post('id');
            
            if($this->referencias_model->excluir($id) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        /**********************************************************************/
        
        /**
         * editar_referencia()
         * 
         * Função desenvolvida para buscar dados de um registro para edição. A 
         * busca será baseada no ID do elemento
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $id Contém o ID do registro que será editado
         */
        function editar_referencia($id)
        {
            $this->dados['referencia'] = $this->referencias_model->buscar($id);
            
            $this->load->view('paginas/edicao/referencias', $this->dados);
        }
        //**********************************************************************
        
        /**
         * atualizar()
         * 
         * Função desenvolvida para atualizar um registro
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @return      bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        public function atualizar_dados()
        {
            $dados['id']                        = $this->input->post('id');
            $dados['nome_referencia']        = $this->input->post('ed_nome_referencia');
            $dados['endereco_referencia']    = $this->input->post('ed_endereco_referencia');
            $dados['telefone_referencia']    = $this->input->post('ed_telefone_referencia');
            
            if($this->referencias_model->atualizar($dados) == 1)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }
    /** End of File referencias.php **/
    /** Location ./application/controllers/painel/referencias.php **/