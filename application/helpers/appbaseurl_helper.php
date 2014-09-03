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

    if(!function_exists('app_baseurl'))
    {
	    /**
	     * appbaseurl()
	     * 
	     * Esta função vai complementar a função nativa do CodeIgniter, o 
	     * base_url, adicionando 'index.php?/' na url solicitada
	     * 
	     * @author      José Aparecido Rocha <cidjarc@gmail.com>
	     * @access		Public
	     */
        function app_baseurl()
        {
            return base_url().'index.php?/';
        }
    }
    /** End of File appbaseurl_helper.php **/
    /** Location ./application/helpers/appbaseurl_helper.php **/