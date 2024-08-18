-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 18-Ago-2024 às 01:46
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
  `nome` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `turma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `senha`, `turma_id`) VALUES
(53, 'aluno1', 'QZAQ0', 24),
(54, 'aluno2', 'SZBKV', 24),
(55, 'aluno3', '5J24C', 24),
(56, 'aluno4', '10PHO', 24),
(57, 'aluno5', '0V85E', 24),
(58, 'dev', '123', 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_danfe`
--

CREATE TABLE `detalhes_danfe` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `cod_danfe` int(11) DEFAULT NULL,
  `chave_acesso_danfe` varchar(44) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `un_prod` varchar(4) NOT NULL,
  `qtd_prod` int(5) NOT NULL,
  `rsunit_prod` float NOT NULL,
  `ncm_prod` int(8) NOT NULL,
  `cst_prod` int(3) NOT NULL,
  `cfop_prod` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doca_pedidos`
--

CREATE TABLE `doca_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `numero_doca` int(11) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome_produto` varchar(255) NOT NULL,
  `status` varchar(65) NOT NULL DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `doca_pedidos`
--

INSERT INTO `doca_pedidos` (`id`, `pedido_id`, `numero_doca`, `data_hora`, `nome_produto`, `status`) VALUES
(1, 11, 2, '2024-08-13 12:24:42', '', 'Concluido'),
(2, 11, 2, '2024-08-13 12:24:42', '', 'Pendente'),
(3, 11, 33, '2024-08-13 12:32:14', 'core i5', 'ConcluÃ­do'),
(4, 11, 33, '2024-08-13 12:32:14', 'core i6', 'Concluido'),
(5, 1, 111, '2024-08-13 13:32:39', 'tesoura', 'Pendente'),
(6, 1, 23, '2024-08-13 13:55:44', 'tesoura', 'Concluido'),
(7, 1, 11, '2024-08-14 11:34:26', 'tesoura', 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `posicaoVaga` varchar(10) NOT NULL,
  `statusVaga` varchar(50) NOT NULL,
  `quantidadeAtual` int(11) NOT NULL,
  `quantidadeMaxima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `posicaoVaga`, `statusVaga`, `quantidadeAtual`, `quantidadeMaxima`) VALUES
(1, 'A1', 'Vazia', 0, 50),
(2, 'A2', 'Vazia', 0, 100),
(3, 'A3', 'Vazia', 0, 250),
(4, 'A4', 'Vazia', 0, 200),
(5, 'A5', 'Vazia', 0, 250),
(6, 'B1', 'Vazia', 0, 100),
(7, 'B2', 'Vazia', 0, 100),
(8, 'B3', 'Vazia', 0, 250),
(9, 'B4', 'Vazia', 0, 200),
(10, 'B5', 'Vazia', 0, 250),
(11, 'C1', 'Vazia', 0, 50),
(12, 'C2', 'Vazia', 0, 100),
(13, 'C3', 'Vazia', 0, 250),
(14, 'C4', 'Vazia', 0, 200),
(15, 'C5', 'Vazia', 0, 250),
(16, 'D1', 'Vazia', 0, 50),
(17, 'D2', 'Vazia', 0, 100),
(18, 'D3', 'Vazia', 0, 250),
(19, 'D4', 'Vazia', 0, 200),
(20, 'D5', 'Vazia', 0, 250),
(21, 'E1', 'Vazia', 0, 50),
(22, 'E2', 'Vazia', 0, 100),
(23, 'E3', 'Vazia', 0, 250),
(24, 'E4', 'Vazia', 0, 200),
(25, 'E5', 'Vazia', 0, 250);

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
-- Estrutura da tabela `movimentacaopvist`
--

CREATE TABLE `movimentacaopvist` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pendente',
  `posicao_estoque` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `movimentacaopvist`
--

INSERT INTO `movimentacaopvist` (`id`, `produto_id`, `nome_produto`, `quantidade`, `status`, `posicao_estoque`) VALUES
(238, 2, 'core i6', 89, 'concluido', 'A1'),
(239, 4041, 'telcado', 7, 'concluido', 'A1'),
(240, 4041, 'telcado', 7, 'concluido', 'A1'),
(241, 20, '1', 9, 'concluido', 'B1'),
(242, 21, '1', 1, 'concluido', 'A1'),
(243, 10, '1', 1, 'concluido', 'A1'),
(244, 10, '1', 1, 'concluido', 'A1'),
(245, 10, '1', 1, 'concluido', 'A1'),
(246, 10, '1', 1, 'concluido', 'A1'),
(247, 10, '1', 1, 'concluido', 'A1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido` varchar(255) NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `observacoes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`pedido`, `data_entrega`, `data_pedido`, `observacoes`) VALUES
('1', '2024-08-08', '2024-08-08', ''),
('10', '2024-08-17', '2024-08-17', ''),
('2', '2024-08-15', '2024-08-15', ''),
('4040', '0000-00-00', '0000-00-00', ''),
('4041', '2024-08-16', '2024-08-16', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `pedidob` varchar(255) NOT NULL,
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

INSERT INTO `produtos` (`id`, `pedidob`, `cod_prod`, `nome_produto`, `un_prod`, `qtd_prod`, `rsunit_prod`, `ncm_prod`, `cst_prod`, `cfop_prod`) VALUES
(1, '1', '1', 'tesoura', 'palete', 1, '5.00', '1', '1', '1'),
(2, '2', '32', 'core i5', 'unidade', 76, '1.00', '88385000', '783', '100'),
(3, '2', '33', 'core i6', 'unidade', 89, '1.00', '88385000', '387', '001'),
(4, '4040', '3', 'telcado', 'caixa', 4, '5.00', '', '', ''),
(5, '4041', '3', 'telcado', 'caixa', 7, '1.00', '1', '1', '1'),
(6, '10', '1', '1', 'caixa', 1, '1.00', '1', '1', '1'),
(7, '10', '2', '2', 'caixa', 2, '2.00', '2', '2', '2'),
(8, '10', '3', '3', 'caixa', 3, '3.00', '3', '3', '3'),
(9, '10', '4', '4', 'caixa', 4, '4.00', '4', '4', '4'),
(10, '10', '5', '5', 'caixa', 5, '5.00', '5', '5', '5'),
(11, '10', '6', '6', 'caixa', 6, '6.00', '6', '6', '6'),
(12, '10', '7', '7', 'caixa', 7, '7.00', '7', '7', '7'),
(13, '10', '8', '8', 'caixa', 8, '8.00', '8', '8', '8'),
(14, '10', '9', '9', 'caixa', 9, '9.00', '9', '9', '9'),
(15, '10', '10', '10', 'caixa', 10, '10.00', '10', '10', '10');

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
(24, 2, 'turma 2', 5);

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
  `pedidob` varchar(50) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `qtd_prod` int(11) NOT NULL,
  `avariado` tinyint(4) DEFAULT NULL,
  `faltando` tinyint(50) NOT NULL,
  `observacoes` varchar(50) DEFAULT NULL,
  `data_registro` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriacarga`
--

INSERT INTO `vistoriacarga` (`id`, `pedidob`, `nome_produto`, `qtd_prod`, `avariado`, `faltando`, `observacoes`, `data_registro`) VALUES
(4, '19', '18', 9, 1, 0, 'problema no joelho', '2024-07-19'),
(3, '12', '100', 12, 1, 0, '', '2024-07-19'),
(5, '11', '23', 9, 1, 0, '', '2024-07-23'),
(6, '20', '1', 9, 1, 0, '', '2024-07-23'),
(7, '21', '1', 1, 1, 0, '', '2024-07-23'),
(8, '11', '23', 9, 1, 1, 'aaaaaaa', '2024-07-27'),
(9, '11', '23', 9, 1, 1, 'sem observacoes', '2024-07-27'),
(10, '5', '5', 5, 1, 1, '55', NULL),
(11, '4', '4', 4, 1, 1, '0', NULL),
(12, '2', 'core i6', 89, 1, 0, '0', NULL),
(13, '2', 'core i6', 89, 0, 0, '0', NULL),
(14, '2', 'core i6', 89, 1, 0, '0', NULL),
(15, '2', 'core i6', 89, 0, 0, '0', NULL),
(16, '2', 'core i6', 89, 1, 0, '0', NULL),
(17, '2', 'core i6', 89, 1, 0, '0', NULL),
(18, '2', 'core i6', 89, 1, 0, '0', NULL),
(54, '10', '6', 6, 0, 0, '', '2024-08-17'),
(53, '10', '5', 5, 0, 0, '', '2024-08-17'),
(52, '10', '4', 4, 0, 0, '', '2024-08-17'),
(51, '10', '3', 3, 0, 0, '', '2024-08-17'),
(50, '10', '2', 2, 0, 0, '', '2024-08-17'),
(49, '10', '1', 1, 1, 0, '', '2024-08-17'),
(48, '4041', 'telcado', 7, 1, 0, '', '2024-08-16'),
(55, '10', '7', 7, 0, 0, '', '2024-08-17'),
(56, '10', '8', 8, 0, 0, '', '2024-08-17'),
(57, '10', '9', 9, 0, 0, '', '2024-08-17'),
(58, '10', '10', 10, 0, 0, '', '2024-08-17');

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
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `detalhes_danfe`
--
ALTER TABLE `detalhes_danfe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nome_produto` (`nome_produto`,`un_prod`,`qtd_prod`,`rsunit_prod`,`ncm_prod`,`cst_prod`,`cfop_prod`),
  ADD KEY `cfop_prod` (`cfop_prod`),
  ADD KEY `cfop_prod_2` (`cfop_prod`),
  ADD KEY `un_prod` (`un_prod`,`qtd_prod`,`rsunit_prod`,`ncm_prod`,`cst_prod`),
  ADD KEY `rsunit_prod` (`rsunit_prod`,`ncm_prod`,`cst_prod`),
  ADD KEY `rsunit_prod_2` (`rsunit_prod`,`ncm_prod`,`cst_prod`),
  ADD KEY `qtd_prod` (`qtd_prod`),
  ADD KEY `cst_prod` (`cst_prod`),
  ADD KEY `ncm_prod` (`ncm_prod`),
  ADD KEY `nome_produto_2` (`nome_produto`),
  ADD KEY `nome_produto_3` (`nome_produto`);

--
-- Indexes for table `doca_pedidos`
--
ALTER TABLE `doca_pedidos`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `movimentacaopvist`
--
ALTER TABLE `movimentacaopvist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido` (`pedidob`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `detalhes_danfe`
--
ALTER TABLE `detalhes_danfe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doca_pedidos`
--
ALTER TABLE `doca_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `loginp`
--
ALTER TABLE `loginp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `movimentacaoestoque`
--
ALTER TABLE `movimentacaoestoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movimentacaopvist`
--
ALTER TABLE `movimentacaopvist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `vistoriacarga`
--
ALTER TABLE `vistoriacarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `vistoriaconferenciacontainer`
--
ALTER TABLE `vistoriaconferenciacontainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`pedidob`) REFERENCES `pedidos` (`pedido`) ON DELETE CASCADE,
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`pedidob`) REFERENCES `pedidos` (`pedido`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
