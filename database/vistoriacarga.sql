-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 31-Jul-2024 às 13:55
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
  `nome_produto` varchar(50) NOT NULL,
  `qnt_prod` int(11) NOT NULL,
  `avariado` tinyint(4) DEFAULT NULL,
  `faltando` tinyint(50) NOT NULL,
  `observacoes` varchar(50) DEFAULT NULL,
  `data_registro` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriacarga`
--

INSERT INTO `vistoriacarga` (`id`, `pedido`, `nome_produto`, `qnt_prod`, `avariado`, `faltando`, `observacoes`, `data_registro`) VALUES
(4, '19', '18', 9, 1, 0, 'problema no joelho', '2024-07-19'),
(3, '12', '100', 12, 0, 0, '', '2024-07-19'),
(5, '11', '23', 9, 0, 0, '', '2024-07-23'),
(6, '20', '1', 9, 0, 0, '', '2024-07-23'),
(7, '21', '1', 1, 0, 0, '', '2024-07-23'),
(8, '11', '23', 9, 1, 1, 'aaaaaaa', '2024-07-27'),
(9, '11', '23', 9, 1, 1, 'sem observacoes', '2024-07-27');

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
