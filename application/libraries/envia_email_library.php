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
	 * envia_email_library
	 * 
	 * Library desenvolvida para envio de emails
	 * 
	 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 * @access		Public
	 * @package		Libraries
	 * @version		v1.0.0
	 * @since		03/10/2014
	 */
	 class Envia_email_library extends CI_Controller
	 {
	 	/**
	 	 * __construct()
	 	 * 
	 	 * Realiza a construção da classe
	 	 * 
	 	 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 	 * @access		Public
	 	 */
	 	public function __construct()
	 	{
	 		parent::__construct();
	 	}
	 	//**********************************************************************
	 	
	 	/**
	 	 * enviar_email()
	 	 * 
	 	 * Função desenvolvida para realizar o envio do email
	 	 * 
	 	 * @author		Matheus Lopes Santos <fale_com_lopez@hotmail.com>
	 	 * @access		Public
	 	 * @param		array $dados Contém os dados que serão processados no email
	 	 * @return		string Retorna uma mensagem de erro para o usuário
	 	 */
	 	function enviar_email($dados)
	 	{
	 		// Faz o load da classe phpmailer
	 		require APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';
	 		$mail = new PHPMailer();
	 		
	 		// Recebe as configurações de envio de email
	 		$this->config->load('email/email', TRUE);
	 		$config = $this->config->item('email/email');
	 		
	 		//Configuração da mensagem
	 		$mensagem_completa = '
	 			<!DOCTYPE html>
	 			<html lang="pt-br">
	 				<head>
                        <meta charset="utf-8">
                    </head>
	 				<body>
	 					<h4>Olá '.$dados['nome'].'</h4>
	 					<p>
	 						Você se cadastrou no <em>Sistema de Inscrições On-line</em>
	 						do Pentáurea Clube. O administrador do sistema deixou
	 						uma nova mensagem para você.
	 					</p>
	 					<p>
	 						"<strong><small>'.$dados['observacao'].'</small></strong>"
	 					</p>
	 					<p>
	 						Você pode visualizar o aviso no seu perfil, acessando
	 						o sistema em '.app_baseurl().'login'.'
	 					</p>
	 					<br><br>
	 					<img src="http://www.pentaurea.com.br/img/reservado/logo.png" style="width: 189px; height: 40px;">
	 				</body>
	 			</html>
	 		';
	 		
	 		//Configuracões do envio de email
	 		$mail->setLanguage('br', APPPATH.'third_party/phpmailer/lang/phpmailer.lang-br.php');
	 		$mail->isSMTP();
	 		$mail->isHTML(true);
	 		$mail->SMTPAuth     = true;
	 		$mail->CharSet 		= 'UTF-8';
	 		$mail->Priority		= 1;
	 		$mail->Host         = $config['smtp_host'];
	 		$mail->Port         = $config['smtp_port'];
	 		$mail->Username     = $config['smtp_user'];
	 		$mail->Password     = $config['smtp_pass'];
	 		$mail->SMTPSecure   = $config['smtp_secure'];
	 		$mail->From         = $config['smtp_email'];
	 		$mail->FromName     = $config['smtp_sender'];
	 		
	 		$mail->addAddress($dados['email']);
	 		
	 		$mail->Subject  = 'Central de Antendimento - Pentáurea Clube';
	 		$mail->Body     = $mensagem_completa;
	 		
	 		//Retorna 0 se não enviar e 1 se enviar
	 		return !$mail->send() ? 'Não foi possível enviar uma cópia da mensagem por e-mail' : 'Uma cópia da mensagem foi enviada por e-mail';
	 	}
	 	//**********************************************************************
	 }
	 /** End of file envia_email_library.php **/
	 /** Location ./application/libraries/envia_email_library.php **/