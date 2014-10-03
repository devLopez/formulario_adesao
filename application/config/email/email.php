<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
	 * -------------------------------------------------------------------------
	 * CONFIGURAÇÕES DE E-MAIL
	 * -------------------------------------------------------------------------
	 * Arquivo desenvolvido para guardar as definições de email, como servidor
	 * porta, usuário e senha. Será usado, principalmente pela library
	 * envia_email_library.php
	 */
	 
	/**
	 * Variável que gurdará os dados para o envio do email
	 * 
	 * @var	array
	 */
	$config['smtp_host']	= 'host_de_envio.com';
	$config['smtp_port']	= 25;
	$config['smtp_user']	= 'seu_email';
	$config['smtp_pass']	= 'sua_senha';
	$config['smtp_secure']	= 'tls';
	$config['smtp_email']	= 'seu_email';
	$config['smtp_sender']	= 'Assunto da mensagem';
	 