-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 31-Jul-2024 às 13:38
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
-- Estrutura da tabela `vistoriacarga`
--

CREATE TABLE `vistoriacarga` (
  `id` int(11) NOT NULL,
  `pedido` varchar(50) NOT NULL,
  `cod_prod` varchar(50) NOT NULL,
  `nome_produto` varchar(50) NOT NULL,
  `un_prod` varchar(50) NOT NULL,
  `qnt_prod` int(11) NOT NULL,
  `rsunit_prod` decimal(10,2) NOT NULL,
  `ncm_prod` varchar(50) NOT NULL,
  `cst_prod` varchar(50) DEFAULT NULL,
  `cfop_prod` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriacarga`
--

INSERT INTO `vistoriacarga` (`id`, `pedido`, `cod_prod`, `nome_produto`, `un_prod`, `qnt_prod`, `rsunit_prod`, `ncm_prod`, `cst_prod`, `cfop_prod`) VALUES
(4, '19', 'Isac', '18', '1.00', 9, '1.00', '0', 'problema no joelho', '2024-07-19 22:47:08'),
(3, '12', 'mouse', '100', '55.00', 12, '0.00', '0', '', '2024-07-19 22:24:22'),
(5, '11', 'mouse', '23', '109.00', 9, '0.00', '0', '', '2024-07-23 21:14:25'),
(6, '20', 'mouse', '1', '55.00', 9, '0.00', '0', '', '2024-07-23 23:06:33'),
(7, '21', '1', '1', '1.00', 1, '0.00', '0', '', '2024-07-23 23:12:38'),
(8, '11', 'mouse', '23', '109.00', 9, '1.00', '1', 'aaaaaaa', '2024-07-27 19:55:00'),
(9, '11', 'mouse', '23', '109.00', 9, '1.00', '1', 'sem observacoes', '2024-07-27 19:55:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vistoriacarga`
--
ALTER TABLE `vistoriacarga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vistoriacarga`
--
ALTER TABLE `vistoriacarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
