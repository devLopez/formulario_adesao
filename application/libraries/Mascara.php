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
     * Mascara
     * 
     * Realiza a conversão de valores para valores com mascara
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Libraries
	 * @version		v1.1.0
	 * @since		03/09/2014    
     * @example     Entrada 11111111111     Saída 111.111.111-11
     */
    class Mascara {
        
        /**
         * mascarar_valor()
         * 
         * Realiza a formatacao do valor
         * 
         * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @param       int     $valor      Recebe o valor na qual sera aplicada a mascara
         * @param       string  $mascara    Recebe a mascara que sera aplicada
         * @return		string Retorna o valor passado pelo usuário com a máscara
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