-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21-Maio-2024 às 10:46
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
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `turma_id`, `email`, `senha`) VALUES
(1, 0, 'aluno1', '123'),
(2, 0, 'aluno2', '123'),
(3, 0, 'aluno3', '123'),
(4, 0, 'aluno4', '123'),
(5, 0, 'aluno5', '123'),
(6, 0, 'aluno6', '123'),
(7, 0, 'aluno7', '123'),
(8, 0, 'aluno8', '123'),
(9, 0, 'aluno9', '123'),
(10, 0, 'aluno10', '123'),
(11, 0, 'aluno11', '123'),
(12, 0, 'aluno12', '123'),
(13, 0, 'aluno13', '123'),
(14, 0, 'aluno14', '123'),
(15, 0, 'aluno15', '123'),
(16, 0, 'aluno16', '123'),
(17, 0, 'aluno17', '123'),
(18, 0, 'aluno18', '123'),
(19, 0, 'aluno19', '123'),
(20, 0, 'aluno20', '123'),
(21, 0, 'aluno21', '123'),
(22, 0, 'aluno22', '123'),
(23, 0, 'aluno23', '123'),
(24, 0, 'aluno24', '123'),
(25, 0, 'aluno25', '123'),
(26, 0, 'aluno26', '123'),
(27, 0, 'aluno27', '123'),
(28, 0, 'aluno28', '123'),
(29, 0, 'aluno29', '123'),
(30, 0, 'aluno30', '123'),
(31, 0, 'aluno31', '123'),
(32, 0, 'aluno32', '123'),
(33, 0, 'aluno33', '123'),
(34, 0, 'aluno34', '123'),
(35, 0, 'aluno35', '123'),
(36, 0, 'aluno36', '123'),
(37, 0, 'aluno37', '123'),
(38, 0, 'aluno38', '123'),
(39, 0, 'aluno39', '123'),
(40, 0, 'aluno40', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `criacaopedido`
--

CREATE TABLE `criacaopedido` (
  `id` int(11) NOT NULL,
  `produtos` varchar(100) NOT NULL,
  `unidade` varchar(50) NOT NULL,
  `quantidade` int(50) NOT NULL,
  `vlrporunidade` double NOT NULL,
  `ncm` int(50) NOT NULL,
  `cst` int(50) NOT NULL,
  `cfop` int(50) NOT NULL,
  `doca` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `criacaopedido`
--

INSERT INTO `criacaopedido` (`id`, `produtos`, `unidade`, `quantidade`, `vlrporunidade`, `ncm`, `cst`, `cfop`, `doca`) VALUES
(1, '1', '1', 1, 1, 1, 1, 1, '1'),
(2, '2', '2', 2, 2, 2, 2, 2, '2'),
(9, 'bala', 'caixa', 35, 3, 35, 35, 12, '2b'),
(34, 'tesoura', 'caixa', 2, 123, 123, 53, 123, '123'),
(123, 'ca', '231', 123, 123, 123, 123, 123, '123');

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
-- Estrutura da tabela `turma_id`
--

CREATE TABLE `turma_id` (
  `id` int(11) NOT NULL,
  `nome_turma` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_id`
--

INSERT INTO `turma_id` (`id`, `nome_turma`) VALUES
(1, ''),
(2, ''),
(3, '');

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
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

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
-- Índices para tabela `turma_id`
--
ALTER TABLE `turma_id`
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
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
