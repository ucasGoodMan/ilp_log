-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11-Jun-2024 às 02:01
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
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `email`, `senha`) VALUES
(1, 'aluno1', '123'),
(2, 'aluno2', '123'),
(3, 'aluno3', '123'),
(4, 'aluno4', '123'),
(5, 'aluno5', '123'),
(6, 'aluno6', '123'),
(7, 'aluno7', '123'),
(8, 'aluno8', '123'),
(9, 'aluno9', '123'),
(10, 'aluno10', '123'),
(11, 'aluno11', '123'),
(12, 'aluno12', '123'),
(13, 'aluno13', '123'),
(14, 'aluno14', '123'),
(15, 'aluno15', '123'),
(16, 'aluno16', '123'),
(17, 'aluno17', '123'),
(18, 'aluno18', '123'),
(19, 'aluno19', '123'),
(20, 'aluno20', '123'),
(21, 'aluno21', '123'),
(22, 'aluno22', '123'),
(23, 'aluno23', '123'),
(24, 'aluno24', '123'),
(25, 'aluno25', '123'),
(26, 'aluno26', '123'),
(27, 'aluno27', '123'),
(28, 'aluno28', '123'),
(29, 'aluno29', '123'),
(30, 'aluno30', '123'),
(31, 'aluno31', '123'),
(32, 'aluno32', '123'),
(33, 'aluno33', '123'),
(34, 'aluno34', '123'),
(35, 'aluno35', '123'),
(36, 'aluno36', '123'),
(37, 'aluno37', '123'),
(38, 'aluno38', '123'),
(39, 'aluno39', '123'),
(40, 'aluno40', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `criacaopedido`
--

CREATE TABLE `criacaopedido` (
  `npedido` int(11) NOT NULL,
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

INSERT INTO `criacaopedido` (`npedido`, `produtos`, `unidade`, `quantidade`, `vlrporunidade`, `ncm`, `cst`, `cfop`, `doca`) VALUES
(98, 'guardaroupa', 'pÃ§', 12, 1, 1, 1, 1, '6'),
(909, 'maquina', 'pÃ§', 16, 1, 1, 1, 1, '1'),
(7777, 'ESPELHO', 'PÃ‡', 95, 55, 1, 1, 1, '9');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `vaga` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT 'Vazia',
  `itens` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `vaga`, `status`, `itens`) VALUES
(1, 'A1', 'Vazia', NULL),
(2, 'A2', 'Vazia', NULL),
(3, 'A3', 'Vazia', NULL),
(4, 'A4', 'Vazia', NULL),
(5, 'A5', 'Vazia', NULL),
(6, 'B1', 'Vazia', NULL),
(7, 'B2', 'Vazia', NULL),
(8, 'B3', 'Vazia', NULL),
(9, 'B4', 'Vazia', NULL),
(10, 'B5', 'Vazia', NULL),
(11, 'C1', 'Vazia', NULL),
(12, 'C2', 'Vazia', NULL),
(13, 'C3', 'Vazia', NULL),
(14, 'C4', 'Vazia', NULL),
(15, 'C5', 'Vazia', NULL),
(16, 'D1', 'Vazia', NULL),
(17, 'D2', 'Vazia', NULL),
(18, 'D3', 'Vazia', NULL),
(19, 'D4', 'Vazia', NULL),
(20, 'D5', 'Vazia', NULL),
(21, 'E1', 'Vazia', NULL),
(22, 'E2', 'Vazia', NULL),
(23, 'E3', 'Vazia', NULL),
(24, 'E4', 'Vazia', NULL),
(25, 'E5', 'Cheia', NULL),
(26, 'B2', 'Vazia', NULL);

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
(1, 'prof@prof', 'lucas123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id` int(11) NOT NULL,
  `npedido` varchar(255) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `posicao` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id`, `npedido`, `produto`, `qtd`, `posicao`, `status`) VALUES
(18, '909', 'maquina', 1, 'A3', 'Pendente'),
(19, '909', 'maquina', 20, 'A3', 'Pendente'),
(20, '909', 'maquina', 1, 'A3', 'ConcluÃ­do'),
(21, '909', 'maquina', 3, 'A3', 'Pendente'),
(22, '98', 'guardaroupa', 3, 'A3', 'ConcluÃ­do'),
(23, '98', 'guardaroupa', 8, 'A3', 'ConcluÃ­do'),
(24, '7777', 'ESPELHO', 3, 'b4', 'ConcluÃ­do');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `nometurma` varchar(60) NOT NULL,
  `qntalunos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `criacaopedido`
--
ALTER TABLE `criacaopedido`
  ADD PRIMARY KEY (`npedido`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `loginp`
--
ALTER TABLE `loginp`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
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
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `loginp`
--
ALTER TABLE `loginp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `vistoriaconferenciacontainer`
--
ALTER TABLE `vistoriaconferenciacontainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
