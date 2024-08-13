-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 13-Ago-2024 às 13:22
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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detalhes_danfe`
--
ALTER TABLE `detalhes_danfe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
