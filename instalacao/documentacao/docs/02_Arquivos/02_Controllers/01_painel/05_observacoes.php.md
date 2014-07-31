Classe desenvolvida para gerenciar as trocas de mensagens entre o proponente à socio e a secretaria do clube

A classe é composta de 3 funções

* __construct()
	* Função desenvolvida para construção da classe
* index()
	* Função principal do controller, responsável pela visão e dados iniciais que serão mostrados ao usuário
* observacoes_cadastradas()
	* Função desenvolvida para buscar as observações cadastradas

```
    /**
     * @package     MY_Controller
     * @subpackage  Mensagens
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as trocas de mensagens entre
     *              o proponente à socio e a secretaria do clube
     */
    class Observacoes extends MY_Controller
    {
        /**
         * @name        __construct()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para construção da classe
         * @param       bool    $requer_autenticacao    Se receber true, indica que,
         *              para acessar esta página é necessário fazer login
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);
            
            $this->load->model('observacoes_model', 'observacoes');
        }
        /**********************************************************************/
        
        /**
         * @name        index()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal da classe
         * @param       string  $this->view     Indica a visão que se deseja trabalhar
         * @param       string  $this->titulo   Indica o título da visão acima
         */
        function index()
        {
            $this->view     = 'painel/observacoes';
            $this->titulo   = 'Observações';
            
            $this->LoadView();
        }
        /**********************************************************************/
        
        /**
         * observacoes_cadastradas()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar as observações cadastradas
         * @access      Public
         */
        function observacoes_cadastradas()
        {
            $id = base64_decode($_SESSION['usuario']['id_proponente']);
            
                $this->dados['observacoes'] = $this->observacoes->buscar_todas($id);
            $this->load->view('paginas/painel/ajax/observacoes', $this->dados);
        }
    }
    /** End of File mensagens.php **/
    /** Location ./application/controllers/painel/mensagens **/