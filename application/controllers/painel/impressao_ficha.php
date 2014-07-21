<?php
    
    /**
     * @package     MY_Controller
     * @subpackage  impressao_ficha
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para realizar a impressão da ficha de
     *              inscrição
     * @todo        Impressão das propostas em PDF. Afunção para tal já foi 
     *              criada. Resta apenas uma modificação da API geradora
     */
    class Impressao_ficha extends MY_Controller
    {
        /**
         * @name        __construct()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);
        }
        /**********************************************************************/
        
        /**
         * @name        index()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Funçao principal do controller
         */
        function index()
        {
            $this->load->view('paginas/painel/ajax/dados_proponente/impressao_ficha');
        }
        /**********************************************************************/
        
        /**
         * @name        gerar_proposta()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvidaindex.php para gerar uma nova proposta, caso 
         *              no servidor não exista uma proposta já salva. Será criado
         *              um arquivo PDF cujo nome do arquivo será no seguinte 
         *              modelo: proposta_cpf[criptografafo].pdf
         * @param       int $documento  recebe qual o tipo de documento que será
         *              gerado (proposta ou adesao).
         */
        function gerar_proposta($documento)
        {   
            /** Recebe a data atual **/
            $this->dados['ano'] = date('Y');
            $this->dados['mes'] = $this->nome_mes();
            $this->dados['dia'] = date('d');
            
            /** Recebe o nome e o cpf do usuário **/
            $this->dados['nome_proponente'] = $_SESSION['usuario']['nome_proponente'];
            $this->dados['cpf_proponente']  = $this->formata_cpf($_SESSION['usuario']['cpf_proponente'], '###.###.###-##');
            
            
            /** Recebe os dados pessoais, dos dependentes, do conjuge e profissionais do proponente **/
            $this->dados['dados_pessoais']      = $this->dados_pessoaisProposta();
            $this->dados['dados_profissionais'] = $this->dados_profissionaisProposta();
            $this->dados['dados_conjuge']       = $this->dados_conjugeProposta();
            $this->dados['dependentes']         = $this->busca_dependentes();
            $this->dados['referencias']         = $this->busca_referencias();
            
            /** Seleciona a visão de acordo o parâmetro que foi passado **/
            if($documento == 1)
            {
                $html = $this->load->view('paginas/painel/download/proposta', $this->dados);
                
                /** Não será usado devido a classe geradora do pdf estar com defeito **/
                //$local_pdf = './downloads/proposta/proposta_'.md5($_SESSION['usuario']['cpf_proponente']).'.pdf';
            }
            elseif($documento == 2)
            {
                $html = $this->load->view('paginas/painel/download/adesao', $this->dados);
                
                /** Não será usado devido a classe geradora do pdf estar com defeito **/
                //$local_pdf = './downloads/adesao/adesao_'.md5($_SESSION['usuario']['cpf_proponente']).'.pdf';
            }
        }
        /**********************************************************************/
        
        /**
         * @name        nome_mes()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para converter o código do mês em 
         *              nome, como:
         * @example     01 Janeiro
         * @access      Private
         * @param       string  $mes    Recebe o nome do mês atual
         * @return      string  Retorna o nome do mês atual
         */
        private function nome_mes()
        {
            switch(date('m'))
            {
                case "01":    $mes = 'Janeiro';     break;
                case "02":    $mes = 'Fevereiro';   break;
                case "03":    $mes = 'Março';       break;
                case "04":    $mes = 'Abril';       break;
                case "05":    $mes = 'Maio';        break;
                case "06":    $mes = 'Junho';       break;
                case "07":    $mes = 'Julho';       break;
                case "08":    $mes = 'Agosto';      break;
                case "09":    $mes = 'Setembro';    break;
                case "10":    $mes = 'Outubro';     break;
                case "11":    $mes = 'Novembro';    break;
                case "12":    $mes = 'Dezembro';    break; 
            }
            
            return $mes;
        }
        /**********************************************************************/
        
        /**
         * @name        dados_pessoaisProposta()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dados pessoais do 
         *              proponente
         * @access      Private
         * @return      array Retorna um array com os dados pessoais
         */
        private function dados_pessoaisProposta()
        {
            $this->load->model('dpessoais_model');
            return $this->dpessoais_model->busca_dadosPessoais();
        }
        /**********************************************************************/
        
        /**
         * @name        dados_profissionaisProposta()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dados profissionais do 
         *              proponente
         * @access      Private
         * @return      array Retorna um array com os dados profissionais
         */
        private function dados_profissionaisProposta()
        {
            $this->load->model('dprofissionais_model');
            return $this->dprofissionais_model->busca_dadosProfissionais();
        }
        /**********************************************************************/
        
        /**
         * @name        dados_profissionaisProposta()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dados profissionais do 
         *              proponente
         * @access      Private
         * @return      array Retorna um array com os dados profissionais
         */
        private function dados_conjugeProposta()
        {
            $this->load->model('dconjuge_model');
            return $this->dconjuge_model->busca_dadosConjuge();
        }
        /**********************************************************************/
        
        /**
         * @name        busca_dependentes()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dependentes
         * @access      Private
         */
        private function busca_dependentes()
        {
            $this->load->model('dependentes_model');
            return $this->dependentes_model->buscar_dependentes();
        }
        /**********************************************************************/
        
        /**
         * busca_referencias()
         * 
         * Função desenvolvida para buscar as referencias pessoais e bancárias
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @return      array   Retorna um array contendo os dados das referencias
         */
        private function busca_referencias()
        {
            $this->load->model('referencias_model');
            
            return $this->referencias_model->buscar();
        }
        //**********************************************************************
        
        /**
         * mascara_cpf()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para formatar o CPF do usuário
         * @access      Private
         * @param       int     $val    Recebe o valor que será mascarado
         * @param       string  $mask   Recebe a mascara que será aplicada
         */
        private function formata_cpf($val, $mask)
        {
            $this->load->library('mascara');
            return $this->mascara->mascarar_valor($val, $mask);
        }

        /***********************************************************************
         * ESTA FUNÇÃO NÃO SERÁ IMPLEMENTADA POR ENQUANTO
         +**********************************************************************
         * @name        gerar_pdf()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para gerar os documentos em PDF para
         *              que o usuário possa fazer o download
         * @access      Private
         * @param       array  $dados  Contém os dados necessarios para criação do PDF
         * @todo        Verificar uma maneira de gerar um PDF mais sólido, pois,
         *              nos primeiros testes realizados, não houve êxito (A 
         *              CLASSE ESTAVA QUEBRANDO O LAYOUT)
         */
        private function gerar_pdf($dados)
        {
            $this->load->library('pdf');
            
            /** Instancia da classe PDF, que chama o mPDF **/
            $pdf = $this->pdf->gerar_pdf();
            $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
            $pdf->WriteHTML($dados['html']);
            $pdf->Output($dados['local_pdf'], 'F');
        }
        /**********************************************************************/
    }
    /** End of File impressao_fichas.php **/
    /** location ./application/controllers/painel/impressao_ficha.php **/