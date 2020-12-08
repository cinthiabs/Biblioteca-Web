-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Dez-2020 às 12:50
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `codcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`codcategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codcategoria`, `categoria`) VALUES
(1, 'ROMANCE'),
(2, 'POESIA'),
(3, 'AUTO-AJUDA'),
(4, 'CONTO'),
(5, 'BIOGRAFIA'),
(6, 'NEGÓCIOS E ECONOMIA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
CREATE TABLE IF NOT EXISTS `emprestimo` (
  `codemprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `codusuario` int(11) DEFAULT NULL,
  `codlivro` int(11) DEFAULT NULL,
  PRIMARY KEY (`codemprestimo`),
  KEY `fk_codusuario` (`codusuario`),
  KEY `fk_codlivro` (`codlivro`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`codemprestimo`, `codusuario`, `codlivro`) VALUES
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `codlivro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `data_publicacao` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tema` varchar(45) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`codlivro`),
  KEY `fk_codlivro` (`categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`codlivro`, `nome`, `autor`, `data_publicacao`, `quantidade`, `tema`, `categoria`) VALUES
(1, 'Corrente de Ouro', 'Cassandra Clare', '2020-02-12', 6, 'Romance', 1),
(2, 'Os segredos da mente milionaria', 'T.Harv Eker', '2019-03-22', 11, 'Nï¿½gocios', 6),
(3, 'O poder do Hábito', 'Charles Duhigg', '2012-11-01', 15, 'Auto-Ajuda', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `codusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `grau_escolariedade` varchar(45) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`codusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codusuario`, `nome`, `data_nascimento`, `grau_escolariedade`, `endereco`, `telefone`, `genero`, `email`) VALUES
(4, 'Samara Barbosa', '2000-03-14', '1 ano', 'Rua General Senin 23', '950542914', '0', 'samara@gmail.com'),
(2, 'Cinthia Barbosa da Silva', '2020-01-31', '1 ano', 'Rua SÃ£o Raimundo Nonato 214', '1145114630', '2', 'cinthia@outlook.com'),
(3, 'Joao SIlva', '1998-04-20', '2 ano', 'Rua Santo Antonio 214', '45114634', '1', 'joao@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
