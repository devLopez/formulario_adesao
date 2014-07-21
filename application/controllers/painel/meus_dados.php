<?php
    /**
     * @package     MY_Controller
     * @subpackage  Meus_dados
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar os dados do usuário
     */
    class Meus_dados extends MY_Controller
    {
        /**
         * @name        __construct()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a contrução da classe
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);
        }
        /**********************************************************************/
        
        /**
         * @name        index()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função principal da classe
         */
        function index()
        {
            $this->view     = 'painel/meus_dados';
            $this->titulo   = 'Meus dados';
            
            $this->LoadView();
        }
        
        /**
         * @name        dados_pessoais()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Busca os dados pessoais do usuário
         */
        function dados_pessoais()
        {
            $this->load->model('dpessoais_model');
            $this->dados['pessoais'] = $this->dpessoais_model->busca_dadosPessoais();
            
            $this->load->view('paginas/painel/ajax/dados_proponente/dados_pessoais', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        dados_profissionais()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Busca os dados profissionais do usuário
         */
        function dados_profissionais()
        {
            $this->load->model('dprofissionais_model');
            $this->dados['profissionais'] = $this->dprofissionais_model->busca_dadosProfissionais();
            
            $this->load->view('paginas/painel/ajax/dados_proponente/dados_profissionais', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        dados_conjuge()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que busca os dados do conjuge do usuário
         */
        function dados_conjuge()
        {
            $this->load->model('dconjuge_model');
            $this->dados['conjuge'] = $this->dconjuge_model->busca_dadosConjuge();
            
            $this->load->view('paginas/painel/ajax/dados_proponente/dados_conjuge', $this->dados);
        }
    }
?>