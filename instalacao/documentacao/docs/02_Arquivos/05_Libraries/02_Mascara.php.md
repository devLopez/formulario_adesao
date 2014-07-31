Função que realiza a conversão de valores para valores com mascara

É composta por apenas uma função
* mascarar_valor()
	* Realiza a conversão de valores para valores com mascara

```    
    /**
     * Mascara.php
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Realiza a conversão de valores para valores com mascara
     * @example     Entrada 11111111111     Saída 111.111.111-11
     */
    if(!defined('BASEPATH')) {exit('No direct script access allowed');}
    
    class Mascara {
        
        /**
         * mascarar_valor()
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract    Realiza a formatacao do valor
         * @param       int     $valor      Recebe o valor na qual sera aplicada a mascara
         * @param       string  $mascara    Recebe a mascara que sera aplicada
         */
        function mascarar_valor($valor, $mascara)
        {
            $mascarado = '';
            $k = 0;
            
            for($i = 0; $i <= strlen($mascara)-1; $i++)
            {
                if($mascara[$i] == '#')
                {
                    if(isset($valor[$k]))
                    {
                        $mascarado .= $valor[$k++];
                    }
                }
                else
                {
                    if(isset($mascara[$i]))
                    {
                        $mascarado .= $mascara[$i];
                    }
                }
            }
            
            return $mascarado;
        }
        //**********************************************************************
    }
    /** End of file mascara_helper.php **/
    /** location ./application/libraries/Mascara.php **/