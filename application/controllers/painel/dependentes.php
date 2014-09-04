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
     * Dependentes
     * 
     * Classe que irá gerenciar as operações com os dependentes
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @subpackage	Painel
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Dependentes extends MY_Controller
    {
        /**
         * __contruct()
         * 
         * Função desenvolvida para fazer a contrução da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        public function __construct()
        {
            parent::__construct(TRUE);

            $this->load->model('dependentes_model');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função inicial da classe, responsável pela visão inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function index()
        {
            $this->view = 'painel/dependentes';
            $this->titulo = 'Meus Dependentes';

            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * busca_parentesco()
         * 
         * Função desenvolvida para buscar o grau de parentesco
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		string Retorna as opções que popularão o selectbox
         */
        function busca_parentesco()
        {
            $this->load->model('parentesco_model');

            $resultado = $this->parentesco_model->busca_parentesco();

            if($resultado)
            {
                echo '<option value="">Selecione uma opção</option>';

                foreach($resultado as $row)
                {
                    echo '
                        <option value="'.$row->grau_parentesco.'">'.$row->grau_parentesco.'</option>
                    ';
                }
            }
            else
            {
                echo 'Impossivel carregar os dados';
            }
        }
        //**********************************************************************
        
        /**
         * buscar_dependentes()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dependentes cadastrados
         */
        function buscar_dependentes()
        {
            $this->dados['dependentes'] = $this->dependentes_model->buscar_dependentes();

            $this->load->view('paginas/painel/ajax/dependentes', $this->dados);
        }
        //**********************************************************************
        
        /**
         * salvar_dependente()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados de um dependente
         */
        function salvar_dependente()
        {
            $dados['nome_dependente'] = $this->input->post('nome_dependente');
            $dados['parentesco_dependente'] = $this->input->post('parentesco_dependente');
            $dados['data_nascimento_dependente'] = $this->input->post('data_nascimento_dependente');
            $dados['estado_civil_dependente'] = $this->input->post('estado_civil_dependente');

            $resposta = $this->dependentes_model->salvar($dados);

            if($resposta == 0 || $resposta == "" || $resposta == NULL)
            {
                echo 0;
            }
            elseif($resposta == 1)
            {
                echo $resposta;
            }
        }
        //**********************************************************************
        
        /**
         * excluir_dependente()
         * 
         * Função desenvolvida para excluir um registro de dependente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int     $id         ID do registro que será excluido
         * @param       bool    $resposta   Recebe a resposta se os dados foram excluidos ou não
         * @return		bool Retorna TRUE se excluir e FALSE se não excluir
         */
        function excluir_dependente()
        {
            $id = $this->input->post('id');
            
            $resposta = $this->dependentes_model->excluir($id);
            
            if($resposta == 1)
            {
                echo $resposta;
            }
            else
            {
                echo 0;
            }
        }
        //**********************************************************************
        
        /**
         * busca_dadosDepentente()
         * 
         * Função que realiza a busca dos dados de um dependente para edição
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function busca_dadosDepentente()
        {
            $id = $this->uri->segment(4);
            
            $this->dados['dependente'] = $this->dependentes_model->buscar_byId($id);
            
            $this->load->view('paginas/edicao/dependentes', $this->dados);
        }
        //**********************************************************************
        
        /**
         * atualizar_dependente()
         * 
         * Função desenvolvida para atualizar os dados de um dependente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se salvar e FALSE se não salvar
         */
        function atualizar_dependente()
        {
            $dados['id'] = $this->input->post('id');
            $dados['nome_dependente'] = $this->input->post('nome_dependente');
            $dados['parentesco_dependente'] = $this->input->post('parentesco_dependente');
            $dados['data_nascimento_dependente'] = $this->input->post('data_nascimento_dependente');
            $dados['estado_civil_dependente'] = $this->input->post('estado_civil_dependente');
            
            if($this->dependentes_model->update($dados) == 1)
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
    /** End of File dependentes.php **/
    /** Location ./application/controllers/painel/dependentes.php **/