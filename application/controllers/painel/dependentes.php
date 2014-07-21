<?php

    /**
     * @package     MY_Controller
     * @subpackage  Dependentes
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe que irá gerenciar as operações com os dependentes
     */
    class Dependentes extends MY_Controller
    {
        /**
         * @name        __contruct()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para fazer a contrução da classe
         * @access      public
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);

            $this->load->model('dependentes_model');
        }
        /**********************************************************************/
        
        /**
         * @name        index()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função inicial do controller
         */
        function index()
        {
            $this->view = 'painel/dependentes';
            $this->titulo = 'Meus Dependentes';

            $this->LoadView();
        }
        /**********************************************************************/
        
        /**
         * @name        busca_parentesco()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar o grau de parentesco
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
        /**********************************************************************/
        
        /**
         * @name        buscar_dependentes()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dependentes cadastrados
         */
        function buscar_dependentes()
        {
            $this->dados['dependentes'] = $this->dependentes_model->buscar_dependentes();

            $this->load->view('paginas/painel/ajax/dependentes', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        salvar_dependente()
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
        /**********************************************************************/
        
        /**
         * @name        excluir_dependente()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para excluir um registro de dependente
         * @param       int     $id         ID do registro que será excluido
         * @param       bool    $resposta   Recebe a resposta se os dados foram excluidos ou não
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
        /**********************************************************************/
        
        /**
         * @name        busca_dadosDepentente()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função que realiza a busca dos dados de um dependente 
         *              para edição
         */
        function busca_dadosDepentente()
        {
            $id = $this->uri->segment(4);
            
            $this->dados['dependente'] = $this->dependentes_model->buscar_byId($id);
            
            $this->load->view('paginas/edicao/dependentes', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        atualizar_dependente()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para atualizar os dados de um dependente
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
    }
?>