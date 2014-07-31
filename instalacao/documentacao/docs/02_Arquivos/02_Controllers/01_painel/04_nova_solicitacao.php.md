Esta classe fará o tratamento de solicitações referentes ao cadastro de uma nova ficha

A classe é composta por 12 funções
* __construct()
	* Realiza a construção da classe
* index()
	* Função principal do controller, responsável pela visão e dados iniciais que serão mostrados ao usuário
* salvar_dados()
	* Função desenvolvida para realizar o salvamento dos dados de uma nova inscrição
* salvar_dadosPessoais()
	* Função desenvolvida para salvar os dados pessoais do proponente
* salvar_dadosProfissionais()
	* Função desenvolvida para salvar os dados profissionais do proponente
* salvar_dadosConjuge()
	* Função desenvolvida para salvar os dados do conjuge do proponente
* gerar_protocolo()
	* Função desenvolvida para gerar um protocolo no registro do usuário
* formulario_edicao()
	* Função desenvolvida para lançar os dados do usuário em um formulário para edição
* atualizar_dados()
	* Função desenvolvida para atualizar os dados do usuário
* update_dadosPessoais()
	* Função desenvolvida para chamar o update dos dados pessoais
* update_dadosProfissionais()
	* Função desenvolvida para chamar o update dos dados profissionais
* update_dadosConjuge()
	* Função desenvolvida para chamar o update dos dados do conjuge

```
    /**
     * @package     - MY_Controller
     * @subpackage  - nova_solicitacao
     * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    - Esta classe fará o tratamento de solicitações referentes ao cadastro de uma nova ficha
     */
    class Nova_solicitacao extends MY_Controller
    {
        /**
         * @name        - __construct()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função que realiza a construção da classe
         */
        public function __construct($requer_autenticacao = TRUE)
        {
            parent::__construct($requer_autenticacao);
        }
        /**********************************************************************/
        
        /**
         * @name        - index()
         * @author      - Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    - Função desenvolvida para mostrar a tela de cadastro
         */
        function index()
        {
            $this->view = 'painel/nova_solicitacao';
            $this->titulo = 'Nova solicitação de cota';

            $this->LoadView();
        }
        /**********************************************************************/
        
        /**
         * @name        salvar_dados()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para realizar o salvamento dos dados de uma nova inscrição
         * @param       int $id_proponente Variável que recebe, descriptografado, o ID proponente que está na seção
         * @param       array $resposta Variável que receberá a resposta das outras funções de salvamente
         */
        function salvar_dados()
        {
            /** Id do usuário * */
            $id_proponente = base64_decode($_SESSION['usuario']['id_proponente']);

            /** Dados Pessoais * */
            $dados_pessoais['id_proponente']           = $id_proponente;
            $dados_pessoais['nome_pai']                = $this->input->post('nome_pai');
            $dados_pessoais['nome_mae']                = $this->input->post('nome_mae');
            $dados_pessoais['data_nascimento']         = $this->input->post('data_nascimento');
            $dados_pessoais['numero_identidade']       = $this->input->post('numero_identidade');
            $dados_pessoais['orgao_emissor']           = $this->input->post('orgao_emissor');
            $dados_pessoais['data_emissao']            = $this->input->post('data_emissao');
            $dados_pessoais['naturalidade_estado']     = $this->input->post('naturalidade_estado');
            $dados_pessoais['nacionalidade']           = $this->input->post('nacionalidade');
            $dados_pessoais['sexo']                    = $this->input->post('sexo');
            $dados_pessoais['escolaridade']            = $this->input->post('escolaridade');
            $dados_pessoais['estado_civil']            = $this->input->post('estado_civil');
            $dados_pessoais['numero_dependentes']      = $this->input->post('numero_dependentes');
            $dados_pessoais['endereco_residencial']    = $this->input->post('endereco_residencial');
            $dados_pessoais['numero_residencia']       = $this->input->post('numero_residencia');
            $dados_pessoais['complemento_residencia']  = $this->input->post('complemento_residencia');
            $dados_pessoais['bairro']                  = $this->input->post('bairro');
            $dados_pessoais['cidade']                  = $this->input->post('cidade');
            $dados_pessoais['cep']                     = $this->input->post('cep');
            $dados_pessoais['situacao_residencia']     = $this->input->post('situacao_residencia');
            $dados_pessoais['anos_residencia']         = $this->input->post('anos_residencia');
            $dados_pessoais['telefone']                = $this->input->post('telefone');
            $dados_pessoais['celular']                 = $this->input->post('celular');
            $dados_pessoais['email']                   = $this->input->post('email');
            
            /** Dados profissionais **/
            $dados_profissionais['id_proponente']           = $id_proponente;
            $dados_profissionais['profissao']               = $this->input->post('profissao');
            $dados_profissionais['situacao_atual']          = $this->input->post('situacao_atual');
            $dados_profissionais['data_admissao']           = $this->input->post('data_admissao');
            $dados_profissionais['salario']                 = $this->input->post('salario');
            $dados_profissionais['outras_rendas']           = $this->input->post('outras_rendas');
            $dados_profissionais['valor_outras_rendas']     = $this->input->post('valor_outras_rendas');
            $dados_profissionais['renda_mensal_familiar']   = $this->input->post('renda_mensal_familiar');
            $dados_profissionais['nome_empresa']            = $this->input->post('nome_empresa');
            $dados_profissionais['cnpj_empresa']            = $this->input->post('cnpj_empresa');
            $dados_profissionais['tempo_empresa']           = $this->input->post('tempo_empresa');
            $dados_profissionais['endereco_empresa']        = $this->input->post('endereco_empresa');
            $dados_profissionais['numero_empresa']          = $this->input->post('numero_empresa');
            $dados_profissionais['complemento_empresa']     = $this->input->post('complemento_empresa');
            $dados_profissionais['bairro_empresa']          = $this->input->post('bairro_empresa');
            $dados_profissionais['cep_empresa']             = $this->input->post('cep_empresa');
            $dados_profissionais['cidade_empresa']          = $this->input->post('cidade_empresa');
            $dados_profissionais['estado_empresa']          = $this->input->post('estado_empresa');
            $dados_profissionais['telefone_empresa']        = $this->input->post('telefone_empresa');
            $dados_profissionais['cargo_empresa']           = $this->input->post('cargo_empresa');

            /** Dados do conjuge **/
            $dados_conjuge['id_proponente']                = $id_proponente;
            $dados_conjuge['nome_conjuge']                 = $this->input->post('nome_conjuge');
            $dados_conjuge['cpf_conjuge']                  = $this->input->post('cpf_conjuge');
            $dados_conjuge['identidade_conjuge']           = $this->input->post('identidade_conjuge');
            $dados_conjuge['data_expedicao_conjuge']       = $this->input->post('data_expedicao_conjuge');
            $dados_conjuge['orgao_emissor_conjuge']        = $this->input->post('orgao_emissor_conjuge');
            $dados_conjuge['data_nascimento_conjuge']      = $this->input->post('data_nascimento_conjuge');
            $dados_conjuge['naturalidade_estado_conjuge']  = $this->input->post('naturalidade_estado_conjuge');
            $dados_conjuge['nacionalidade_conjuge']        = $this->input->post('nacionalidade_conjuge');
            $dados_conjuge['situacao_emprego_conjuge']     = $this->input->post('situacao_emprego_conjuge');
            $dados_conjuge['empresa_conjuge']              = $this->input->post('empresa_conjuge');
            $dados_conjuge['cnpj_empresa_conjuge']         = $this->input->post('cnpj_empresa_conjuge');
            $dados_conjuge['data_admissao_conjuge']        = $this->input->post('data_admissao_conjuge');
            $dados_conjuge['endereco_comercial_conjuge']   = $this->input->post('endereco_comercial_conjuge');
            $dados_conjuge['numero_empresa_conjuge']       = $this->input->post('numero_empresa_conjuge');
            $dados_conjuge['complemento_empresa_conjuge']  = $this->input->post('complemento_empresa_conjuge');
            $dados_conjuge['telefone_empresa_conjuge']     = $this->input->post('telefone_empresa_conjuge');
            $dados_conjuge['cargo_empresa_conjuge']        = $this->input->post('cargo_empresa_conjuge');
            $dados_conjuge['salario_conjuge']              = $this->input->post('salario_conjuge');
            $dados_conjuge['profissao_conjuge']            = $this->input->post('profissao_conjuge');

            
            
            $resposta['pessoais']       = $this->salvar_dadosPessoais($dados_pessoais);
            $resposta['profissionais']  = $this->salvar_dadosProfissionais($dados_profissionais);
            
            if(!empty($dados_conjuge['nome_conjuge']) || !empty($dados_conjuge['cpf_conjuge'])){
                $resposta['conjuge'] = $this->salvar_dadosConjuge($dados_conjuge);
            }
            
            if($resposta['pessoais'] == 1)
            {
                $resposta['protocolo'] = $this->gerar_protocolo();
                
                if($resposta['protocolo'] == 1)
                {
                    $resposta['numero_protocolo'] = md5($_SESSION['usuario']['cpf_proponente']);
                }
            }
            
            $retorno = array(
                'pessoais'          => $resposta['pessoais'],
                'profissionais'     => $resposta['profissionais'],
                'protocolo'         => $resposta['protocolo'],
                'numero_protocolo'  => $resposta['numero_protocolo']
            );
            
            echo json_encode($retorno);
        }
        /**********************************************************************/
        
        /**
         * @name        salvar_dadosPessoais()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados pessoais do proponente
         * @param       array $dados_pessoais Variável que contém todos os dados pessoais do proponente
         * @return      bool Retorna verdadeiro se salvar e falso se não salvar
         */
        function salvar_dadosPessoais($dados_pessoais)
        {
            $this->load->model('Dpessoais_model');
            return $this->Dpessoais_model->salvar($dados_pessoais);
        }
        /**********************************************************************/
        
        /**
         * @name        salvar_dadosProfissionais()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados profissionais do proponente
         * @param       array $dados_profissionais Contém os dados profissionais do proponente
         * @return      bool Retorna verdadeiro se salvar e falso se não salvar
         */
        function salvar_dadosProfissionais($dados_profissionais)
        {
            $this->load->model('Dprofissionais_model');
            return $this->Dprofissionais_model->salvar($dados_profissionais);
        }
        /**********************************************************************/
        
        /**
         * @name        salvar_dadosConjuge()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para salvar os dados do conjuge do proponente
         * @param       array $dados_conjuge Contém os dados do conjuge do proponente
         * @return      bool Retorna verdadeiro se salvar e falso se não salvar
         */
        function salvar_dadosConjuge($dados_conjuge)
        {
            $this->load->model('Dconjuge_model');
            return $this->Dconjuge_model->salvar($dados_conjuge);
        }
        /**********************************************************************/
        
        /**
         * @name        gerar_protocolo();
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para gerar um protocolo no registro do usuário
         * @return      bool Retorna true se salvar e false se não salvar
         */
        function gerar_protocolo()
        {
            $this->load->model('usuarios_model');
            
            return $this->usuarios_model->salva_protocolo();
        }
        /**********************************************************************/
        
        /**
         * @name        formulario_edicao()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para lançar os dados do usuário em 
         *              um formulário para edição
         */
        function formulario_edicao()
        {
            $this->load->model('dpessoais_model');
            $this->load->model('dprofissionais_model');
            $this->load->model('dconjuge_model');
            
            $this->dados['conjuge']         = $this->dconjuge_model->busca_dadosConjuge();
            $this->dados['profissionais']   = $this->dprofissionais_model->busca_dadosProfissionais();
            $this->dados['pessoais']        = $this->dpessoais_model->busca_dadosPessoais();
            
            $this->load->view('paginas/edicao/solicitacao', $this->dados);
        }
        /**********************************************************************/
        
        /**
         * @name        atualizar_dados()
         * @author      Matheus Lopes Santos
         * @abstract    Função desenvolvida para atualizar os dados do usuário
         */
        function atualizar_dados()
        {
            /** Dados pessoais do usuário **/
            $dados_pessoais['id']                       = $this->input->post('id_pessoais');
            $dados_pessoais['nome_pai']                 = $this->input->post('nome_pai');
            $dados_pessoais['nome_mae']                 = $this->input->post('nome_mae');
            $dados_pessoais['data_nascimento']          = $this->input->post('data_nascimento');
            $dados_pessoais['numero_identidade']        = $this->input->post('numero_identidade');
            $dados_pessoais['orgao_emissor']            = $this->input->post('orgao_emissor');
            $dados_pessoais['data_emissao']             = $this->input->post('data_emissao');
            $dados_pessoais['naturalidade_estado']      = $this->input->post('naturalidade_estado');
            $dados_pessoais['nacionalidade']            = $this->input->post('nacionalidade');
            $dados_pessoais['sexo']                     = $this->input->post('sexo');
            $dados_pessoais['escolaridade']             = $this->input->post('escolaridade');
            $dados_pessoais['estado_civil']             = $this->input->post('estado_civil');
            $dados_pessoais['numero_dependentes']       = $this->input->post('numero_dependentes');
            $dados_pessoais['endereco_residencial']     = $this->input->post('endereco_residencial');
            $dados_pessoais['numero_residencia']        = $this->input->post('numero_residencia');
            $dados_pessoais['complemento_residencia']   = $this->input->post('complemento_residencia');
            $dados_pessoais['bairro']                   = $this->input->post('bairro');
            $dados_pessoais['cidade']                   = $this->input->post('cidade');
            $dados_pessoais['cep']                      = $this->input->post('cep');
            $dados_pessoais['situacao_residencia']      = $this->input->post('situacao_residencia');
            $dados_pessoais['anos_residencia']          = $this->input->post('anos_residencia');
            $dados_pessoais['telefone']                 = $this->input->post('telefone');
            $dados_pessoais['celular']                  = $this->input->post('celular');
            $dados_pessoais['email']                    = $this->input->post('email');
            
            /** Dados profissionais do usuario **/
            $dados_profissionais['id']                      = $this->input->post('id_profissionais');
            $dados_profissionais['profissao']               = $this->input->post('profissao');
            $dados_profissionais['situacao_atual']          = $this->input->post('situacao_atual');
            $dados_profissionais['data_admissao']           = $this->input->post('data_admissao');
            $dados_profissionais['salario']                 = $this->input->post('salario');
            $dados_profissionais['outras_rendas']           = $this->input->post('outras_rendas');
            $dados_profissionais['valor_outras_rendas']     = $this->input->post('valor_outras_rendas');
            $dados_profissionais['renda_mensal_familiar']   = $this->input->post('renda_mensal_familiar');
            $dados_profissionais['nome_empresa']            = $this->input->post('nome_empresa');
            $dados_profissionais['cnpj_empresa']            = $this->input->post('cnpj_empresa');
            $dados_profissionais['tempo_empresa']           = $this->input->post('tempo_empresa');
            $dados_profissionais['endereco_empresa']        = $this->input->post('endereco_empresa');
            $dados_profissionais['numero_empresa']          = $this->input->post('numero_empresa');
            $dados_profissionais['complemento_empresa']     = $this->input->post('complemento_empresa');
            $dados_profissionais['bairro_empresa']          = $this->input->post('bairro_empresa');
            $dados_profissionais['cep_empresa']             = $this->input->post('cep_empresa');
            $dados_profissionais['cidade_empresa']          = $this->input->post('cidade_empresa');
            $dados_profissionais['estado_empresa']          = $this->input->post('estado_empresa');
            $dados_profissionais['telefone_empresa']        = $this->input->post('telefone_empresa');
            $dados_profissionais['cargo_empresa']           = $this->input->post('cargo_empresa');

            /** Dados do conjuge **/
            $dados_conjuge['id']                            =  $this->input->post('id_conjuge');
            $dados_conjuge['nome_conjuge']                  = $this->input->post('nome_conjuge');
            $dados_conjuge['cpf_conjuge']                   = $this->input->post('cpf_conjuge');
            $dados_conjuge['identidade_conjuge']            = $this->input->post('identidade_conjuge');
            $dados_conjuge['data_expedicao_conjuge']        = $this->input->post('data_expedicao_conjuge');
            $dados_conjuge['orgao_emissor_conjuge']         = $this->input->post('orgao_emissor_conjuge');
            $dados_conjuge['data_nascimento_conjuge']       = $this->input->post('data_nascimento_conjuge');
            $dados_conjuge['naturalidade_estado_conjuge']   = $this->input->post('naturalidade_estado_conjuge');
            $dados_conjuge['nacionalidade_conjuge']         = $this->input->post('nacionalidade_conjuge');
            $dados_conjuge['situacao_emprego_conjuge']      = $this->input->post('situacao_emprego_conjuge');
            $dados_conjuge['empresa_conjuge']               = $this->input->post('empresa_conjuge');
            $dados_conjuge['cnpj_empresa_conjuge']          = $this->input->post('cnpj_empresa_conjuge');
            $dados_conjuge['data_admissao_conjuge']         = $this->input->post('data_admissao_conjuge');
            $dados_conjuge['endereco_comercial_conjuge']    = $this->input->post('endereco_comercial_conjuge');
            $dados_conjuge['numero_empresa_conjuge']        = $this->input->post('numero_empresa_conjuge');
            $dados_conjuge['complemento_empresa_conjuge']   = $this->input->post('complemento_empresa_conjuge');
            $dados_conjuge['telefone_empresa_conjuge']      = $this->input->post('telefone_empresa_conjuge');
            $dados_conjuge['cargo_empresa_conjuge']         = $this->input->post('cargo_empresa_conjuge');
            $dados_conjuge['salario_conjuge']               = $this->input->post('salario_conjuge');
            $dados_conjuge['profissao_conjuge']             = $this->input->post('profissao_conjuge');
            
            $resposta['pessoais']       = $this->update_dadosPessoais($dados_pessoais);
            $resposta['profissionais']  = $this->update_dadosProfissionais($dados_profissionais);
            
            /**
             * Verifica se a variável $dados_conjuge['id_conjuge'] está vazia.
             * Se está vazia, significa que não havia dados cadastrados previamente,
             * então verifica se existe nome e cpf. caso houver, salva.
             * Se a varável $dados_conjuge['id_conjuge'] tiver valor, será feito
             * o update do registro
             * **/
            if($dados_conjuge['id'] == "" || $dados_conjuge['id'] == NULL)
            {
                if(!empty($dados_conjuge['nome_conjuge']) || !empty($dados_conjuge['cpf_conjuge'])){
                    $resposta['conjuge'] = $this->salvar_dadosConjuge($dados_conjuge);
                }
            }
            else
            {
                $resposta['conjuge'] = $this->update_dadosConjuge($dados_conjuge);
            }
            
            $retorno = array(
                'pessoais'      => $resposta['pessoais'],
                'profissionais' => $resposta['profissionais'],
                'conjuge'       => $resposta['conjuge']
            );
            
            echo json_encode($retorno);
        }
        /**********************************************************************/
        
        /***********************************************************************
         * FUNÇÕES RESPONSÁVEIS PELA REALIZAÇÃO DO UPDATE NAS TABELAS
         **********************************************************************/
        
        /**
         * @name        update_dadosPessoais
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar o update dos dados pessoais
         * @param       array   $dados_pessoais Contém os dados pessoais do usuário
         * @return      bool    Retorna TRUE se salvar e FALSE se não salvar
         */
        function update_dadosPessoais($dados_pessoais)
        {
            $this->load->model('Dpessoais_model');
            return $this->Dpessoais_model->update($dados_pessoais);
        }
        /**********************************************************************/
        
        /**
         * @name        update_dadosProfissionais()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar o update dos dados profissionais
         * @param       array   $dados_profissionais    Contém os dados profissionais
         *              do usuário
         * @return      bool retorna TRUE se salvar e FALSE se não salvar
         */
        function update_dadosProfissionais($dados_profissionais)
        {
            $this->load->model('Dprofissionais_model');
            
            return $this->Dprofissionais_model->update($dados_profissionais);
        }
        /**********************************************************************/
        
        /**
         * @name        update_dadosConjuge()
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para chamar o update dos dados do conjuge
         * @param       array   $dados_conjuge  Contém os dados do conjuge do usuário
         * @return      bool retorna TRUE se salvar e FALSE se não salvar
         */
        function update_dadosConjuge($dados_conjuge)
        {
            $this->load->model('Dconjuge_model');
            
            return $this->Dconjuge_model->update($dados_conjuge);
        }
    }