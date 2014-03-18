-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/03/2014 às 05h59min
-- Versão do Servidor: 5.5.35
-- Versão do PHP: 5.3.10-1ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `getm_admin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `codigo` int(10) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `lido` tinyint(1) NOT NULL,
  `respondido` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `fone` varchar(50) NOT NULL,
  `site` varchar(255) NOT NULL,
  `ramo_atividade` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `endereco`, `fone`, `site`, `ramo_atividade`, `arquivo`, `latitude`, `longitude`, `ativo`) VALUES
(2, 'Rafael Damasio', 'sdfasdfa', '(43) 9612-3242', 'kkkkkkkkkkkkkkkkkk', 'asdfasd', '1890350_414357495377232_1362064537_o-2656095018.jpg', '-51,17039', '-23,30766', 1),
(3, 'asdfasd', 'fasfs', 'fasdfas', 'dfasdfa', 'dfasdfas', 'passaro-9014808069.jpg', 'asdfas', 'asdfasdfasd', 1),
(4, 'Rafael Damasio', 'Rua Fernando de Noronha, 775', '(43) 9612-3242', 'www.blogdodam.com.br', 'blog', 'screenshot-from-2014-02-08-00:02:39-1401460301.png', '-23,30766', '-51,17039', 1),
(5, 'dasdfasdfa', 'fasdfa', '(46) 0498-74094', 'asdfasdf', 'asdfasdf', 'screenshot-from-2014-02-08-00:02:39-5381486015.png', 'asdfasd', 'asdfasdfasfsd', 1),
(6, 'Testando essa porra aqui hein', 'te', '(50) 4654-60065', 'fasdfasdfa', 'dfasdfasdfa', 'passaro-422601494.jpg', 'fasdaf', 'asdfasdf', 1),
(7, 'asdfaasdfas', 'asdfasdfa', '(43) 3301-7691', 'sdafas', 'asdafsd', 'amizade-6773888594.jpg', '-35,30765', '-55,17039', 1),
(8, 'Mais um teste', 'rua do teste', '(43) 9612-3242', 'www.blogdodam.com.br', 'Tester', 'amizade-5190307428.jpg', '-21,32475', '-52,17139', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `codigo` int(10) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) NOT NULL,
  `resposta` text NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `faq`
--

INSERT INTO `faq` (`id`, `pergunta`, `resposta`, `ativo`) VALUES
(3, 'Mais um pergunta?', 'Mais um resposta', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `destaque` tinyint(1) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `codigo` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes_sociais`
--

CREATE TABLE IF NOT EXISTS `redes_sociais` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(65) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lojista` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `senha`, `nome`, `email`, `lojista`) VALUES
(1, 'damasiorafael', 'a5d968b5f14708ab781e85b57cbbc0123530886f ', 'Rafael Damasio', 'damasio_damasio@hotmail.com', 0),
(2, 'admin', '2f688707dedc5c863e347d99bd8401bbc11622e8', 'Vadinho Ary', 'damasio@komeia.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(55) NOT NULL,
  `resumo` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `resumo`, `link`, `ativo`) VALUES
(1, 'Teste', 'Resumo do vÃ­deo que vou publicar no site da GETM', 'http://www.youtube.com/watch?v=SoA4pA2LNWU', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
