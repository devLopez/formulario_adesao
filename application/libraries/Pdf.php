<?php

    if(!defined('BASEPATH'))
    {
        exit('No direct script access allowed');
    }

    /**
     * pdf.php
     * 
     * @package     Pdf.php
     * @author      Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @abstract    Classe desenvolvida para realizar a geração de documentos 
     *              PDF, para que o proponente possa baixar a proposta de cota
     */
    class Pdf
    {
        function pdf()
        {
            $CI = & get_instance();
            log_message('Debug', 'A classe mPDF foi carregada.');
        }
        //**********************************************************************
        
        /**
         * gerar_pdf()
         * 
         * @author     Matheus Lopes Santos <fale_com_lopez@hotmail.com>
         * @abstract   Função desenvolvida para gerar um documento em PDF
         * @param      array $opcoes    Contém as opções para geração do PDF
         */
        function gerar_pdf()
        {
            include_once APPPATH.'/third_party/mpdf/mpdf.php';

            return new mPDF('utf-8', 'A4');
        }
        //**********************************************************************
    }
    /* End of File Pdf_library.php */
    /** Location ./application/libraries/pdf.php **/