-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jul-2014 às 15:19
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-03:00";

--
-- Database: `inscricoes`
--
CREATE DATABASE IF NOT EXISTS `inscricoes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inscricoes`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_conjuge`
--

CREATE TABLE IF NOT EXISTS `dados_conjuge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proponente` int(11) NOT NULL,
  `nome_conjuge` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf_conjuge` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identidade_conjuge` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_expedicao_conjuge` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orgao_emissor_conjuge` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento_conjuge` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naturalidade_estado_conjuge` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nacionalidade_conjuge` int(1) DEFAULT NULL,
  `situacao_emprego_conjuge` int(1) DEFAULT NULL,
  `empresa_conjuge` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj_empresa_conjuge` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_admissao_conjuge` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco_comercial_conjuge` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_empresa_conjuge` int(5) DEFAULT NULL,
  `complemento_empresa_conjuge` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone_empresa_conjuge` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_empresa_conjuge` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salario_conjuge` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profissao_conjuge` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dados_conjuge_usuarios1` (`id_proponente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Conterá os dados do conjuge' COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pessoais`
--

CREATE TABLE IF NOT EXISTS `dados_pessoais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proponente` int(11) NOT NULL,
  `nome_pai` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_mae` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identidade` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orgao_emissor` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_emissao` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naturalidade_estado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nacionalidade` int(1) DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `escolaridade` int(1) DEFAULT NULL,
  `estado_civil` int(1) DEFAULT NULL,
  `numero_dependentes` int(11) DEFAULT NULL,
  `endereco_residencial` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_residencia` int(5) DEFAULT NULL,
  `complemento_residencia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao_residencia` int(1) DEFAULT NULL,
  `anos_residencia` int(4) DEFAULT NULL,
  `telefone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dados_pessoais_usuarios` (`id_proponente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Conterá os dados pessoais' COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_profissionais`
--

CREATE TABLE IF NOT EXISTS `dados_profissionais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proponente` int(11) NOT NULL,
  `profissao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao_atual` int(1) DEFAULT NULL,
  `data_admissao` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salario` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `outras_rendas` int(1) DEFAULT NULL,
  `valor_outras_rendas` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `renda_mensal_familiar` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_empresa` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj_empresa` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempo_empresa` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco_empresa` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_empresa` int(5) DEFAULT NULL,
  `complemento_empresa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro_empresa` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep_empresa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade_empresa` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_empresa` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone_empresa` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo_empresa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dados_profissionais_usuarios1` (`id_proponente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Contem os dados profissionais do proponente' COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes`
--

CREATE TABLE IF NOT EXISTS `dependentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proponente` int(11) NOT NULL,
  `nome_dependente` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentesco_dependente` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento_dependente` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_civil_dependente` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dependentes_usuarios1` (`id_proponente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Conterá os dados dos dependentes do proponente' COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacoes`
--

CREATE TABLE IF NOT EXISTS `observacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proponente` int(11) NOT NULL,
  `observacao` longtext NOT NULL,
  `data_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela onde serão salvas os observações para os usuários' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parentesco`
--

CREATE TABLE IF NOT EXISTS `parentesco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grau_parentesco` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Contém cadastrado os diversos tipos de parentesco' COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `referencias_pessoais`
--

CREATE TABLE IF NOT EXISTS `referencias_pessoais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proponente` int(11) NOT NULL,
  `nome_referencia` varchar(70) NOT NULL,
  `endereco_referencia` varchar(250) NOT NULL,
  `telefone_referencia` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT COMMENT='Tabela que contém as referências do proponente' CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_proponente` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_proponente` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `senha_proponente` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status_aprovacao` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_protocolo` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_adesao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_geracaoProtocolo` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela onde serão salvos os dados de acesso do proponente' COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_administrativos`
--

CREATE TABLE IF NOT EXISTS `usuarios_administrativos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT COMMENT='Tabela onde serão salvos os usuários administrativos' CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `dados_conjuge`
--
ALTER TABLE `dados_conjuge`
  ADD CONSTRAINT `fk_dados_conjuge_usuarios1` FOREIGN KEY (`id_proponente`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  ADD CONSTRAINT `fk_dados_pessoais_usuarios` FOREIGN KEY (`id_proponente`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dados_profissionais`
--
ALTER TABLE `dados_profissionais`
  ADD CONSTRAINT `fk_dados_profissionais_usuarios1` FOREIGN KEY (`id_proponente`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD CONSTRAINT `fk_dependentes_usuarios1` FOREIGN KEY (`id_proponente`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;