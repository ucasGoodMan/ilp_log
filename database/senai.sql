-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15-Maio-2024 às 10:28
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `senai`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `criacaopedido`
--

CREATE TABLE `criacaopedido` (
  `id` int(11) NOT NULL,
  `produtos` varchar(100) NOT NULL,
  `unidade` int(50) NOT NULL,
  `quantidade` int(50) NOT NULL,
  `vlrporunidade` int(50) NOT NULL,
  `ncm` int(50) NOT NULL,
  `cst` int(50) NOT NULL,
  `cfop` int(50) NOT NULL,
  `doca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logina`
--

CREATE TABLE `logina` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT '\r\n',
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `logina`
--

INSERT INTO `logina` (`id`, `email`, `senha`) VALUES
(32, 'a@a', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb'),
(33, 'lucas@123', 'ad1e10c7f2d809520c2191e442ed016ed7507debeaad03d061a97ec69dc2361e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginp`
--

CREATE TABLE `loginp` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loginp`
--

INSERT INTO `loginp` (`id`, `email`, `senha`) VALUES
(1, 'prof@prof', 'ad1e10c7f2d809520c2191e442ed016ed7507debeaad03d061a97ec69dc2361e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vistoriaconferenciacarga`
--

CREATE TABLE `vistoriaconferenciacarga` (
  `NotaFiscal` int(11) NOT NULL,
  `PedidoCompra` varchar(50) NOT NULL,
  `Doca` varchar(30) NOT NULL,
  `Produtos1` varchar(50) NOT NULL,
  `UN1` varchar(30) NOT NULL,
  `QTD1` int(20) NOT NULL,
  `ValorUnit1` int(20) NOT NULL,
  `ValorTotal1` int(20) NOT NULL,
  `Produtos2` varchar(50) NOT NULL,
  `UN2` varchar(30) NOT NULL,
  `QTD2` int(20) NOT NULL,
  `ValorUnit2` int(20) NOT NULL,
  `ValorTotal2` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vistoriaconferenciacontainer`
--

CREATE TABLE `vistoriaconferenciacontainer` (
  `id` int(11) NOT NULL,
  `PlacaCaminhao` varchar(8) DEFAULT NULL,
  `NomeMotorista` varchar(55) DEFAULT NULL,
  `Container` varchar(15) DEFAULT NULL,
  `Navio` varchar(15) DEFAULT NULL,
  `Cliente` varchar(55) DEFAULT NULL,
  `Tipo` varchar(5) DEFAULT NULL,
  `Lacre` varchar(9) NOT NULL,
  `LacreSif` int(7) NOT NULL,
  `Temperatura` int(4) DEFAULT NULL,
  `IMO` int(5) DEFAULT NULL,
  `NumeroOnu` int(6) DEFAULT NULL,
  `ContainerDesgastado` tinyint(1) DEFAULT NULL,
  `AvariaLateralDireita` tinyint(1) DEFAULT NULL,
  `AvariaLateralEsquerda` tinyint(1) DEFAULT NULL,
  `AvariaTeto` tinyint(1) DEFAULT NULL,
  `AvariaFrentre` tinyint(1) DEFAULT NULL,
  `SemLacre` tinyint(1) DEFAULT NULL,
  `AdesivoAvariado` tinyint(1) DEFAULT NULL,
  `ExcessoAltura` tinyint(1) DEFAULT NULL,
  `ExcessoDireita` tinyint(1) DEFAULT NULL,
  `ExcessoEsquerda` tinyint(1) DEFAULT NULL,
  `ExcessoFrontal` tinyint(1) DEFAULT NULL,
  `PainelAvariado` tinyint(1) DEFAULT NULL,
  `SemCaboEnergia` tinyint(1) DEFAULT NULL,
  `SemLona` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriaconferenciacontainer`
--

INSERT INTO `vistoriaconferenciacontainer` (`id`, `PlacaCaminhao`, `NomeMotorista`, `Container`, `Navio`, `Cliente`, `Tipo`, `Lacre`, `LacreSif`, `Temperatura`, `IMO`, `NumeroOnu`, `ContainerDesgastado`, `AvariaLateralDireita`, `AvariaLateralEsquerda`, `AvariaTeto`, `AvariaFrentre`, `SemLacre`, `AdesivoAvariado`, `ExcessoAltura`, `ExcessoDireita`, `ExcessoEsquerda`, `ExcessoFrontal`, `PainelAvariado`, `SemCaboEnergia`, `SemLona`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '123', 'arto', '123ff', 'isu123', 'eu', 'isu9', 'lix2', 234, -24, 5763, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'a', 'q', 'w', 'e', 'a', 'w', 'e', -1, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `criacaopedido`
--
ALTER TABLE `criacaopedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logina`
--
ALTER TABLE `logina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `loginp`
--
ALTER TABLE `loginp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vistoriaconferenciacontainer`
--
ALTER TABLE `vistoriaconferenciacontainer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `criacaopedido`
--
ALTER TABLE `criacaopedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `logina`
--
ALTER TABLE `logina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `loginp`
--
ALTER TABLE `loginp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vistoriaconferenciacontainer`
--
ALTER TABLE `vistoriaconferenciacontainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
