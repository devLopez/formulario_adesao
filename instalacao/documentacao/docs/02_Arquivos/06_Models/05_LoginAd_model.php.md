Classe desenvolvida para gerenciar as transações com com a tabela usuarios_administrativos

Esta classe é composta por duas funções:
* __construct()
	* Realiza a construção da classe
* buscar_usuario()
	* Função desenvolvida para buscar os dados dos usuarios administrativos

```
    /**
     * LoginAd_model.php
     * 
     * @package     MY_Model
     * @subpackage  LoginAd_model.php
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para gerenciar as transações com com a tabela
     *              usuarios_administrativos
     */
    class LoginAd_model extends MY_Model
    {
        /**
         * __construct()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a construção da classe
         * @access      Public
         */
        public function __construct()
        {
            parent::__construct();
            
            /** Define o nome da tabela e a chave primaria dela **/
            $this->_tabela  = 'usuarios_administrativos';
            $this->_primary = 'id';
        }
        //**********************************************************************
        
        /**
         * buscar_usuario()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Função desenvolvida para buscar os dados dos usuarios 
         *              administrativos
         * @param       array   $dados  Contém os dados de login do usuário
         * @return      array   Retorna um array com os dados do usuario. Se não
         *              encontrar, retorna FALSE
         */
        function buscar_usuario($dados)
        {
            
            $this->BD->where('login', $dados['login']);
            $this->BD->where('senha', $dados['senha']);
            
            $query = $this->BD->get($this->_tabela);
            
            return $query->result();
        }
        //**********************************************************************
    }
    /** End of File LoginAd_model.php **/
    /** Location ./application/models/LoginAd_model.php **/