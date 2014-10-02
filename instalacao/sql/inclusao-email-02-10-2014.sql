/*
 * Inclusão do e-mail
 *
 * Script desenvolvido para inserir na tabela usuarios o campo email_proponente
 */
USE `inscricoes`;

ALTER TABLE `usuarios` ADD `email_proponente` VARCHAR(200) NULL AFTER `cpf_proponente`;