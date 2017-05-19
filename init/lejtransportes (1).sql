-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Maio-2017 às 04:06
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lejtransportes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_comanda`
--

CREATE TABLE `lej_comanda` (
  `id` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `condutor` int(11) NOT NULL,
  `ini_lat` float NOT NULL,
  `ini_log` float NOT NULL,
  `fin_lat` float NOT NULL,
  `fin_log` float NOT NULL,
  `distancia` float NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `referencia` tinyint(3) NOT NULL,
  `desconto` tinyint(2) NOT NULL,
  `hora_cadastro` datetime NOT NULL,
  `hora_aceite` datetime NOT NULL,
  `hora_ini` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `ini_cep` varchar(10) NOT NULL,
  `ini_numero` varchar(10) NOT NULL,
  `ini_complemento` varchar(60) NOT NULL,
  `fin_cep` varchar(10) NOT NULL,
  `fin_numero` varchar(10) NOT NULL,
  `fin_complemento` varchar(60) NOT NULL,
  `nota_fiscal` varchar(60) NOT NULL,
  `instrucao_nota` longtext NOT NULL,
  `instrucao_boleto` longtext NOT NULL,
  `n_vias` int(2) NOT NULL,
  `obs` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_opcoes`
--

CREATE TABLE `lej_opcoes` (
  `id` int(11) NOT NULL,
  `meta` varchar(60) NOT NULL,
  `value` text NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_pf`
--

CREATE TABLE `lej_pf` (
  `id` int(11) NOT NULL,
  `id_wp` int(11) NOT NULL,
  `funcao` int(3) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `estado_civil` tinyint(3) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(120) NOT NULL,
  `telefone01` varchar(15) NOT NULL,
  `telefone02` varchar(15) NOT NULL,
  `telefone03` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cod_banco` int(4) NOT NULL,
  `agencia` varchar(10) NOT NULL,
  `conta` varchar(10) NOT NULL,
  `moto_modelo` varchar(60) NOT NULL,
  `placa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_pj`
--

CREATE TABLE `lej_pj` (
  `id` int(11) NOT NULL,
  `id_wp` int(11) NOT NULL,
  `funcao` tinyint(3) NOT NULL,
  `nome` varchar(120) NOT NULL COMMENT 'razão social',
  `cnpj` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contato` varchar(60) NOT NULL,
  `telefone01` varchar(10) NOT NULL,
  `telefone02` varchar(10) NOT NULL,
  `telefone03` varchar(10) NOT NULL,
  `whatsapp` varchar(10) NOT NULL,
  `cod_banco` int(11) NOT NULL,
  `agencia` varchar(10) NOT NULL,
  `conta` varchar(10) NOT NULL,
  `inscricao` varchar(60) NOT NULL,
  `data_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lej_comanda`
--
ALTER TABLE `lej_comanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lej_opcoes`
--
ALTER TABLE `lej_opcoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lej_pf`
--
ALTER TABLE `lej_pf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lej_pj`
--
ALTER TABLE `lej_pj`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lej_comanda`
--
ALTER TABLE `lej_comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lej_opcoes`
--
ALTER TABLE `lej_opcoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lej_pf`
--
ALTER TABLE `lej_pf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lej_pj`
--
ALTER TABLE `lej_pj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
