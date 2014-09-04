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
     * Impressao_ficha
     * 
     * Classe desenvolvida para realizar a impressão da ficha de inscrição
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @subpackage	Painel
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class Impressao_ficha extends MY_Controller
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
            parent::__construct(TRUE);
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Funçao principal do controller, responsável pela visão inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function index()
        {
            $this->load->view('paginas/painel/ajax/dados_proponente/impressao_ficha');
        }
        //**********************************************************************
        
        /**
         * gerar_proposta()
         * 
         * Função desenvolvidaindex.php para gerar uma nova proposta, caso 
         * no servidor não exista uma proposta já salva. Será criado um arquivo
         * PDF cujo nome do arquivo será no seguinte modelo: proposta_cpf[criptografafo].pdf
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
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
                $this->load->view('paginas/painel/download/proposta', $this->dados);
            }
            elseif($documento == 2)
            {
                $this->load->view('paginas/painel/download/adesao', $this->dados);
            }
        }
        //**********************************************************************
        
        /**
         * nome_mes()
         * 
         * Função desenvolvida para converter o código do mês no nome do mês
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Private
         * @example     01 -> Janeiro
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
        //**********************************************************************
        
        /**
         * dados_pessoaisProposta()
         * 
         * Função desenvolvida para buscar os dados pessoais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @return      array Retorna um array com os dados pessoais
         */
        private function dados_pessoaisProposta()
        {
            $this->load->model('dpessoais_model');
            return $this->dpessoais_model->busca_dadosPessoais();
        }
        //**********************************************************************
        
        /**
         * dados_profissionaisProposta()
         * 
         * Função desenvolvida para buscar os dados profissionais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @return      array Retorna um array com os dados profissionais
         */
        private function dados_profissionaisProposta()
        {
            $this->load->model('dprofissionais_model');
            return $this->dprofissionais_model->busca_dadosProfissionais();
        }
        //**********************************************************************
        
        /**
         * dados_profissionaisProposta()
         * 
         * Função desenvolvida para buscar os dados profissionais do proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @return      array Retorna um array com os dados profissionais
         */
        private function dados_conjugeProposta()
        {
            $this->load->model('dconjuge_model');
            return $this->dconjuge_model->busca_dadosConjuge();
        }
        //**********************************************************************
        
        /**
         * busca_dependentes()
         * 
         * Função desenvolvida para buscar os dependentes
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @return		array Retorna um array de dependentes
         */
        private function busca_dependentes()
        {
            $this->load->model('dependentes_model');
            return $this->dependentes_model->buscar_dependentes();
        }
        //**********************************************************************
        
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
         * Função desenvolvida para formatar o CPF do usuário
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Private
         * @param       int     $val    Recebe o valor que será mascarado
         * @param       string  $mask   Recebe a mascara que será aplicada
         */
        private function formata_cpf($val, $mask)
        {
            $this->load->library('mascara');
            return $this->mascara->mascarar_valor($val, $mask);
        }
        //**********************************************************************
    }
    /** End of File impressao_fichas.php **/
    /** location ./application/controllers/painel/impressao_ficha.php **/