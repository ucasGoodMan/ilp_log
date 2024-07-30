-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30-Jul-2024 às 23:48
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senai`
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
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `posicaoVaga` varchar(20) NOT NULL,
  `statusVaga` varchar(20) DEFAULT 'Vazia',
  `itens` varchar(255) DEFAULT NULL,
  `posicao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `posicaoVaga`, `statusVaga`, `itens`, `posicao`) VALUES
(1, 'A1', 'Vazia', NULL, ''),
(2, 'A2', 'Vazia', NULL, ''),
(3, 'A3', 'Vazia', NULL, ''),
(4, 'A4', 'Vazia', NULL, ''),
(5, 'A5', 'Vazia', NULL, ''),
(6, 'B1', 'Vazia', NULL, ''),
(7, 'B2', 'Vazia', NULL, ''),
(8, 'B3', 'Vazia', NULL, ''),
(9, 'B4', 'Vazia', NULL, ''),
(10, 'B5', 'Vazia', NULL, ''),
(11, 'C1', 'Vazia', NULL, ''),
(12, 'C2', 'Vazia', NULL, ''),
(13, 'C3', 'Vazia', NULL, ''),
(14, 'C4', 'Vazia', NULL, ''),
(15, 'C5', 'Vazia', NULL, ''),
(16, 'D1', 'Vazia', NULL, ''),
(17, 'D2', 'Vazia', NULL, ''),
(18, 'D3', 'Vazia', NULL, ''),
(19, 'D4', 'Vazia', NULL, ''),
(20, 'D5', 'Vazia', NULL, ''),
(21, 'E1', 'Vazia', NULL, ''),
(22, 'E2', 'Vazia', NULL, ''),
(23, 'E3', 'Vazia', NULL, ''),
(24, 'E4', 'Vazia', NULL, ''),
(25, 'E5', 'Vazia', NULL, ''),
(26, 'B2', 'Vazia', NULL, '');

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
(1, 'prof@prof', '123');

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
(1, '12', 'mouse', 5, 'A3', 'Concluido'),
(2, '12', 'mouse', 1, 'A3', 'Concluido'),
(3, '19', 'Isac', 3, 'A3', 'Concluido'),
(4, '20', 'mouse', 1, 'A3', 'Concluido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacaoestoque`
--

CREATE TABLE `movimentacaoestoque` (
  `id` int(11) NOT NULL,
  `nPedido` int(11) NOT NULL COMMENT 'puxa o numero do pedido e o adiciona na vaga correspondente, com status pendente ou concluida',
  `statusVaga` varchar(20) NOT NULL DEFAULT 'Vazia' COMMENT 'vazia, cheia, quase cheia',
  `item` varchar(255) NOT NULL COMMENT 'itens na vaga',
  `vaga` varchar(20) NOT NULL COMMENT 'a1,a2,a3...',
  `qtdItem` int(11) NOT NULL COMMENT 'qtd de itens na vaga',
  `statusMovimentacao` varchar(20) NOT NULL DEFAULT 'Pendente' COMMENT 'status da moviemntação: pendente/concluida'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `pedido` varchar(255) NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `observacoes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `pedido`, `data_entrega`, `data_pedido`, `observacoes`) VALUES
(1, '10', '2010-10-10', '2010-10-10', ''),
(2, '11', '2020-02-20', '2020-02-02', ''),
(3, '12', '1212-12-12', '1211-12-12', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `cod_prod` varchar(255) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `un_prod` varchar(50) DEFAULT NULL,
  `qtd_prod` int(11) DEFAULT NULL,
  `rsunit_prod` decimal(10,2) DEFAULT NULL,
  `ncm_prod` varchar(50) DEFAULT NULL,
  `cst_prod` varchar(50) DEFAULT NULL,
  `cfop_prod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `pedido_id`, `cod_prod`, `nome_produto`, `un_prod`, `qtd_prod`, `rsunit_prod`, `ncm_prod`, `cst_prod`, `cfop_prod`) VALUES
(1, 1, '20', 'tesoura', 'unidade', 2, '24.00', '123', '123', '123'),
(2, 1, '21', 'papel', 'rolo', 1, '25.00', '321', '321', '321'),
(3, 2, '1', '1', 'caixa', 1, '1.00', '1', '1', '1'),
(4, 3, '12', '12', 'caixa', 12, '12.00', '12', '12', '12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `conteudo`, `data`) VALUES
(1, 'adadadad', '2024-07-27 23:41:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id` int(11) NOT NULL,
  `solicitacao` varchar(255) DEFAULT NULL,
  `observacoes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `nturma` int(11) NOT NULL,
  `nometurma` varchar(60) NOT NULL,
  `qntalunos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nturma`, `nometurma`, `qntalunos`) VALUES
(9, 12, 'df', 12),
(10, 0, 'sd', 12),
(11, 23, 'asd', 121),
(12, 5, 'sa', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(3) NOT NULL,
  `vaga` varchar(64) NOT NULL,
  `statusVaga` varchar(10) DEFAULT 'vazia',
  `itens` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `vaga`, `statusVaga`, `itens`) VALUES
(1, '', 'vazia', ''),
(2, '', 'vazia', ''),
(3, '', 'vazia', ''),
(4, '', 'vazia', ''),
(5, '', 'vazia', ''),
(6, '', 'vazia', ''),
(7, '', 'vazia', ''),
(8, '', 'vazia', ''),
(9, '', 'vazia', ''),
(10, '', 'vazia', ''),
(11, '', 'vazia', ''),
(12, '', 'vazia', ''),
(13, '', 'vazia', ''),
(14, '', 'vazia', ''),
(15, '', 'vazia', ''),
(16, '', 'vazia', ''),
(17, '', 'vazia', ''),
(18, '', 'vazia', ''),
(19, '', 'vazia', ''),
(20, '', 'vazia', ''),
(21, '', 'vazia', ''),
(22, '', 'vazia', ''),
(23, '', 'vazia', ''),
(24, '', 'vazia', ''),
(25, '', 'vazia', ''),
(26, 'A1', 'vazia', ''),
(27, 'A1', 'vazia', ''),
(28, 'A2', 'vazia', ''),
(29, 'A3', 'vazia', ''),
(30, 'A4', 'vazia', ''),
(31, 'A5', 'vazia', ''),
(32, 'B1', 'vazia', ''),
(33, 'B2', 'vazia', ''),
(34, 'B3', 'vazia', ''),
(35, 'B4', 'vazia', ''),
(36, 'B5', 'vazia', ''),
(37, 'C1', 'vazia', ''),
(38, 'C2', 'vazia', ''),
(39, 'C3', 'vazia', ''),
(40, 'C4', 'vazia', ''),
(41, 'C5', 'vazia', ''),
(42, 'D1', 'vazia', ''),
(43, 'D2', 'vazia', ''),
(44, 'D3', 'vazia', ''),
(45, 'D4', 'vazia', ''),
(46, 'D5', 'vazia', ''),
(47, 'E1', 'vazia', ''),
(48, 'E2', 'vazia', ''),
(49, 'E3', 'vazia', ''),
(50, 'E4', 'vazia', ''),
(51, 'E5', 'vazia', ''),
(52, 'A1', 'vazia', ''),
(53, 'A2', 'vazia', ''),
(54, 'A3', 'vazia', ''),
(55, 'A4', 'vazia', ''),
(56, 'A5', 'vazia', ''),
(57, 'B1', 'vazia', ''),
(58, 'B2', 'vazia', ''),
(59, 'B3', 'vazia', ''),
(60, 'B4', 'vazia', ''),
(61, 'B5', 'vazia', ''),
(62, 'C1', 'vazia', ''),
(63, 'C2', 'vazia', ''),
(64, 'C3', 'vazia', ''),
(65, 'C4', 'vazia', ''),
(66, 'C5', 'vazia', ''),
(67, 'D1', 'vazia', ''),
(68, 'D2', 'vazia', ''),
(69, 'D3', 'vazia', ''),
(70, 'D4', 'vazia', ''),
(71, 'D5', 'vazia', ''),
(72, 'E1', 'vazia', ''),
(73, 'E2', 'vazia', ''),
(74, 'E3', 'vazia', ''),
(75, 'E4', 'vazia', ''),
(76, 'E5', 'vazia', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vistoriacarga`
--

CREATE TABLE `vistoriacarga` (
  `id` int(11) NOT NULL,
  `npedido` varchar(50) NOT NULL,
  `produtos` text NOT NULL,
  `quantidade` int(11) NOT NULL,
  `vlrporunidade` decimal(10,2) NOT NULL,
  `doca` varchar(50) NOT NULL,
  `avariado` tinyint(1) NOT NULL DEFAULT '0',
  `faltando` tinyint(1) NOT NULL DEFAULT '0',
  `observacoes` text,
  `data_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriacarga`
--

INSERT INTO `vistoriacarga` (`id`, `npedido`, `produtos`, `quantidade`, `vlrporunidade`, `doca`, `avariado`, `faltando`, `observacoes`, `data_registro`) VALUES
(4, '19', 'Isac', 18, '1.00', '9', 1, 0, 'problema no joelho', '2024-07-20 01:47:08'),
(3, '12', 'mouse', 100, '55.00', '12', 0, 0, '', '2024-07-20 01:24:22'),
(5, '11', 'mouse', 23, '109.00', '9', 0, 0, '', '2024-07-24 00:14:25'),
(6, '20', 'mouse', 1, '55.00', '9', 0, 0, '', '2024-07-24 02:06:33'),
(7, '21', '1', 1, '1.00', '1', 0, 0, '', '2024-07-24 02:12:38'),
(8, '11', 'mouse', 23, '109.00', '9', 1, 1, 'aaaaaaa', '2024-07-27 22:55:00'),
(9, '11', 'mouse', 23, '109.00', '9', 1, 1, 'sem observacoes', '2024-07-27 22:55:24');

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
  `SemLona` tinyint(1) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriaconferenciacontainer`
--

INSERT INTO `vistoriaconferenciacontainer` (`id`, `PlacaCaminhao`, `NomeMotorista`, `Container`, `Navio`, `Cliente`, `Tipo`, `Lacre`, `LacreSif`, `Temperatura`, `IMO`, `NumeroOnu`, `ContainerDesgastado`, `AvariaLateralDireita`, `AvariaLateralEsquerda`, `AvariaTeto`, `AvariaFrentre`, `SemLacre`, `AdesivoAvariado`, `ExcessoAltura`, `ExcessoDireita`, `ExcessoEsquerda`, `ExcessoFrontal`, `PainelAvariado`, `SemCaboEnergia`, `SemLona`, `data`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '123', 'arto', '123ff', 'isu123', 'eu', 'isu9', 'lix2', 234, -24, 5763, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(6, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(7, 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(8, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(9, 'a', 'q', 'w', 'e', 'a', 'w', 'e', -1, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(10, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, NULL),
(11, 'zxc2', 'clie', '345tgr', 'simnue', 'sim', 'hijak', 'lockr3', 456, 12, 122, 142, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, NULL),
(12, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(13, 'abc1234', 'joao', 'senu123456-2', 'msk alabama', 'sesi', '22g1', 'ty6423', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(14, 'abc1234', '1', '1', '1', '1', '1', '1', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginp`
--
ALTER TABLE `loginp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimentacaoestoque`
--
ALTER TABLE `movimentacaoestoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vistoriacarga`
--
ALTER TABLE `vistoriacarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vistoriaconferenciacontainer`
--
ALTER TABLE `vistoriaconferenciacontainer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `loginp`
--
ALTER TABLE `loginp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `movimentacaoestoque`
--
ALTER TABLE `movimentacaoestoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `vistoriacarga`
--
ALTER TABLE `vistoriacarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vistoriaconferenciacontainer`
--
ALTER TABLE `vistoriaconferenciacontainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
