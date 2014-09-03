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
     * Pdf
     * 
     * Classe desenvolvida para realizar a geração de documentos PDF, para que o
     * proponente possa baixar a proposta de cota
     * 
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Libraries
	 * @version		v1.1.0
	 * @since		03/09/2014    
     */
    class Pdf
    {
    	/**
    	 * pdf()
    	 * 
    	 * Pega uma instância do CodeIgniter
    	 * 
    	 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
    	 * @access		Public
    	 */
        function pdf()
        {
            $CI = & get_instance();
            log_message('Debug', 'A classe mPDF foi carregada.');
        }
        //**********************************************************************
        
        /**
         * gerar_pdf()
         * 
         * Função desenvolvida para gerar um documento em PDF
         * 
         * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @access		Public
         * @return		Mixed
         */
        function gerar_pdf()
        {
            include_once APPPATH.'/third_party/mpdf/mpdf.php';

            return new mPDF('utf-8', 'A4');
        }
        //**********************************************************************
    }
    /** End of File Pdf_library.php **/
    /** Location ./application/libraries/pdf.php **/