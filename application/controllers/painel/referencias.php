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
     * Referencias
     * 
     * Classe desenvolvida para gerenciar as referencias do proponente
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @subpackage	Painel
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class Referencias extends MY_Controller
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
            
            $this->load->model('referencias_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função principal da classe, responsável pela view inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
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
            $dados['id']                     = $this->input->post('id');
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
        //**********************************************************************
    }
    /** End of File referencias.php **/
    /** Location ./application/controllers/painel/referencias.php **/