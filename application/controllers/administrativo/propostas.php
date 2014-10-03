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
     * Propostas
     * 
     * Classe desenvolvida para gerenciar as propostas de cota que estão 
     * cadastrados no sistema
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Controllers
	 * @subpackage	Administrativo
	 * @version		v1.1.0
	 * @since		03/09/2014
     */
    class Propostas extends MY_Controller
    {
        /**
         * __construct()
         * 
         * Realiza a construção da classe
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       bool    $requer_autenticacao    Recebe TRUE pois indica 
         *              que é necessário o login para acesso a esta área
         * @param       bool    $admin                  Recebe TRUE pois indica 
         *              que é uma área administrativa
         */
        public function __construct($requer_autenticacao = TRUE, $admin = TRUE)
        {
            parent::__construct($requer_autenticacao, $admin);
            
            $this->load->model('usuarios_model');
            $this->load->model('observacoes_model', 'observacoes');
        }
        //**********************************************************************
        
        /**
         * index()
         * 
         * Função principal da classe, responsável pela visão inicial
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function index()
        {
            /** Definição do template, view e título da página **/
            $this->template = 'template/adm';
            $this->view     = 'administrativo/propostas';
            $this->titulo   = '.:: Propostas de cota cadastradas ::.';
            
            $this->LoadView();
        }
        //**********************************************************************
        
        /**
         * buscar_propostas()
         * 
         * Função desenvolvida para chamar os dados dos usuarios cadastrados 
         * via ajax
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $offset Offset que será usado na paginação
         */
        function buscar_propostas($offset = 0)
        {
            /** Limite será usado na consulta sql **/
            $limite = 10;
            
            /** Recebe os dados do banco de dados **/
            $this->dados['propostas'] = $this->usuarios_model->buscar_allPropostas($limite, $offset);
            
            /** configuração da paginação **/
            $config['uri_segment']  = 4;
            $config['base_url']     = app_baseurl().'administrativo/propostas/buscar_propostas';
            $config['per_page']     = $limite;
            $config['total_rows']   = $this->usuarios_model->contar();
            
            $this->pagination->initialize($config);
            
            $this->dados['paginacao'] = $this->pagination->create_links();
            
            $this->load->view('paginas/administrativo/ajax/propostas', $this->dados);
        }
        //**********************************************************************
        
        /**
         * visualizar_proponente()
         * 
         * Função desenvolvida para que o administrador do sistema possa 
         * visualizar de uma maneira melhor, os dados de um proponente
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public    
         * @param       int $id Contém o ID do usuário a ser buscado
         */
        function visualiza_proponente($id = NULL)
        {
            if(!$id)
            {
                $this->dados['erro'] = 'Parâmetro necessário passado incorretamente';
            }
            else
            {
                $this->dados['proponente'] = $this->usuarios_model->buscar_byId($id) ;
            }
            
            $this->load->view('paginas/administrativo/ajax/visualizar_proponente', $this->dados);
        }
        //**********************************************************************
        
        /**
         * deferir_proposta()
         * 
         * Função desenvolvida para deferir uma proposta de cota
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function deferir_proposta()
        {
            $id = $this->input->post('id');
            
            echo $this->usuarios_model->deferir($id);
        }
        //**********************************************************************
        
        /**
         * indeferir_proposta()
         * 
         * Função desenvolvida para deferir uma proposta de cota
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         */
        function indeferir_proposta()
        {
            $id = $this->input->post('id');
            
            echo $this->usuarios_model->indeferir($id);
        }
        //**********************************************************************
        
        /**
         * salvar_observacao()
         * 
         * Função desenvolvida para salvar uma nova observação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         */
        function salvar_observacao()
        {
            $dados['id_proponente'] = $this->input->post('id_proponente');
            $dados['observacao']    = $this->input->post('observacao');
            $dados['email']			= $this->input->post('email_proponente');
            $dados['nome']			= $this->input->post('nome_proponente');
            
            $this->load->library('envia_email_library');
            
            $r_email 	= $this->envia_email_library->enviar_email($dados);
            $r_banco	= $this->observacoes->salvar($dados);
            
            $resposta = array(
            	'email' => $r_email,
            	'banco'	=> $r_banco
            );
            
            echo json_encode($resposta);
        }
        //**********************************************************************
        
        /**
         * buscar_observacoes()
         * 
         *  Função desenvolvida para buscar as observações cadastradas para 
         *  um usuário
         *  
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access      Public
         * @param       int $id_usuario Recebe o ID do usuário que será usado no
         *              sql
         */
        function buscar_observacoes($id_usuario = NULL)
        {
            if($id_usuario)
            {
                $this->dados['observacoes'] = $this->observacoes->buscar_todas($id_usuario);
                
                $this->load->view('paginas/administrativo/ajax/observacoes_cadastradas', $this->dados);
            }
        }
        //**********************************************************************
        
        /**
         * buscar_byId()
         * 
         * Função desenvolvida para buscar um registro do BD
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param		int $id Contém o ID do registro a ser buscado
         * @return		mixed
         */
        function buscar_byId($id)
        {
            if($id)
            {
                $resposta = $this->observacoes->buscar($id);
                
                if(!$resposta)
                {
                    echo '<div class="alert info">Não foi possível resgatar os dados</div>';
                }
                else
                {
                    foreach ($resposta as $row)
                    {
                        echo "<textarea class='span6' rows='5' required autofocus id='nova_observacao'>$row->observacao</textarea>"
                            ."<input type='hidden' id='id_tupla' value='$row->id'>";
                    }
                }
            }
        }
        //**********************************************************************
        
        /**
         * atualizar()
         * 
         * Função desenvolvida para atualizar uma observação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se atualizar e FALSE se não atualizar
         */
        function atualizar()
        {
            $dados['observacao']    = $this->input->post('observacao');
            $dados['id']            = $this->input->post('id');
            
            echo $this->observacoes->update($dados);
        }
        //**********************************************************************
        
        /**
         * delete()
         * 
         * Função desenvolvida para atualizar uma observação
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		bool Retorna TRUE se apagar e FALSE se não apagar
         */
        function apagar()
        {
            $id = $this->input->post('id');
            
            echo $this->observacoes->delete($id);
        }
        //**********************************************************************
    }
    /** End of File propostas.php **/
    /** Location ./application/controllers/administrativo/propostas.php **/