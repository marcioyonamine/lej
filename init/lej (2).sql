-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Maio-2017 às 02:08
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lej`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_bancos`
--

CREATE TABLE `lej_bancos` (
  `ID` int(11) NOT NULL,
  `banco` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `codigo` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `lej_bancos`
--

INSERT INTO `lej_bancos` (`ID`, `banco`, `codigo`) VALUES
(1, 'Banco ABC Brasil S.A.', '246'),
(2, 'Banco ABN AMRO Real S.A.', '356'),
(3, 'Banco Alfa S.A.', '025'),
(4, 'Banco Alvorada S.A.', '641'),
(5, 'Banco Banerj S.A.', '029'),
(6, 'Banco Banestado S.A.', '038'),
(7, 'Banco Barclays S.A.', '740'),
(8, 'Banco BBM S.A.', '107'),
(9, 'Banco Beg S.A.', '031'),
(10, 'Banco Bem S.A.', '036'),
(11, 'Banco BM&F de Serviços de Liquidação e Custódia S.A', '096'),
(12, 'Banco BMC S.A.', '394'),
(13, 'Banco BMG S.A.', '318'),
(14, 'Banco BNP Paribas Brasil S.A.', '752'),
(15, 'Banco Boavista Interatlântico S.A.', '248'),
(16, 'Banco Bradesco S.A.', '237'),
(17, 'Banco Brascan S.A.', '225'),
(18, 'Banco Cacique S.A.', '263'),
(19, 'Banco Calyon Brasil S.A.', '222'),
(20, 'Banco Cargill S.A.', '040'),
(21, 'Banco Citibank S.A.', '745'),
(22, 'Banco Comercial e de Investimento Sudameris S.A.', '215'),
(23, 'Banco Cooperativo do Brasil S.A. – BANCOOB', '756'),
(24, 'Banco Cooperativo Sicredi S.A. – BANSICREDI', '748'),
(25, 'Banco Credit Suisse (Brasil) S.A.', '505'),
(26, 'Banco Cruzeiro do Sul S.A.', '229'),
(27, 'Banco da Amazônia S.A.', '003'),
(28, 'Banco Daycoval S.A.', '707'),
(29, 'Banco de Pernambuco S.A. – BANDEPE', '024'),
(30, 'Banco de Tokyo-Mitsubishi UFJ Brasil S.A.', '456'),
(31, 'Banco Dibens S.A.', '214'),
(32, 'Banco do Brasil S.A.', '001'),
(33, 'Banco do Estado de Santa Catarina S.A.', '027'),
(34, 'Banco do Estado de Sergipe S.A.', '047'),
(35, 'Banco do Estado do Pará S.A.', '037'),
(36, 'Banco do Estado do Rio Grande do Sul S.A.', '041'),
(37, 'Banco do Nordeste do Brasil S.A.', '004'),
(38, 'Banco Fator S.A.', '265'),
(39, 'Banco Fibra S.A.', '224'),
(40, 'Banco Finasa S.A.', '175'),
(41, 'Banco Fininvest S.A.', '252'),
(42, 'Banco GE Capital S.A.', '233'),
(43, 'Banco Gerdau S.A.', '734'),
(44, 'Banco Guanabara S.A.', '612'),
(45, 'Banco Ibi S.A. Banco Múltiplo', '063'),
(46, 'Banco Industrial do Brasil S.A.', '604'),
(47, 'Banco Industrial e Comercial S.A.', '320'),
(48, 'Banco Indusval S.A.', '653'),
(49, 'Banco Intercap S.A.', '630'),
(50, 'Banco Investcred Unibanco S.A.', '249'),
(51, 'Banco Itaú BBA S.A.', '184-8'),
(52, 'Banco Itaú Holding Financeira S.A.', '652'),
(53, 'Banco Itaú S.A.', '341'),
(54, 'Banco ItaúBank S.A', '479'),
(55, 'Banco J. P. Morgan S.A.', '376'),
(56, 'Banco J. Safra S.A.', '074'),
(57, 'Banco Luso Brasileiro S.A.', '600'),
(58, 'Banco Mercantil de São Paulo S.A.', '392'),
(59, 'Banco Mercantil do Brasil S.A.', '389'),
(60, 'Banco Merrill Lynch de Investimentos S.A.', '755'),
(61, 'Banco Nossa Caixa S.A.', '151'),
(62, 'Banco Opportunity S.A.', '045'),
(63, 'Banco Panamericano S.A.', '623'),
(64, 'Banco Paulista S.A.', '611'),
(65, 'Banco Pine S.A.', '643'),
(66, 'Banco Prosper S.A.', '638'),
(67, 'Banco Rabobank International Brasil S.A.', '747'),
(68, 'Banco Rendimento S.A.', '633'),
(69, 'Banco Rural Mais S.A.', '072'),
(70, 'Banco Rural S.A.', '453'),
(71, 'Banco Safra S.A.', '422'),
(72, 'Banco Santander Banespa S.A.', '033'),
(73, 'Banco Schahin S.A.', '250'),
(74, 'Banco Simples S.A.', '749'),
(75, 'Banco Société Générale Brasil S.A.', '366'),
(76, 'Banco Sofisa S.A.', '637'),
(77, 'Banco Sudameris Brasil S.A.', '347'),
(78, 'Banco Sumitomo Mitsui Brasileiro S.A.', '464'),
(79, 'Banco Triângulo S.A.', '634'),
(80, 'Banco UBS Pactual S.A.', '208'),
(81, 'Banco UBS S.A.', '247'),
(82, 'Banco Único S.A.', '116'),
(83, 'Banco Votorantim S.A.', '655'),
(84, 'Banco VR S.A.', '610'),
(85, 'Banco WestLB do Brasil S.A.', '370'),
(86, 'BANESTES S.A. Banco do Estado do Espírito Santo', '021'),
(87, 'Banif-Banco Internacional do Funchal (Brasil)S.A.', '719'),
(88, 'Bankpar Banco Multiplo S.A.', '204'),
(89, 'BB Banco Popular do Brasil S.A.', '073-6'),
(90, 'BPN Brasil Banco Mútiplo S.A.', '069-8'),
(91, 'BRB – Banco de Brasília S.A.', '070'),
(92, 'Caixa Econômica Federal', '104'),
(93, 'Citibank N.A.', '477'),
(94, 'Deutsche Bank S.A. – Banco Alemão', '487'),
(95, 'Dresdner Bank Brasil S.A. – Banco Múltiplo', '751'),
(96, 'Dresdner Bank Lateinamerika Aktiengesellschaft', '210'),
(97, 'Hipercard Banco Múltiplo S.A.', '062'),
(98, 'HSBC Bank Brasil S.A. – Banco Múltiplo', '399'),
(99, 'ING Bank N.V.', '492'),
(100, 'JPMorgan Chase Bank', '488'),
(101, 'Lemon Bank Banco Múltiplo S.A.', '065'),
(102, 'UNIBANCO – União de Bancos Brasileiros S.A.', '409'),
(103, 'Unicard Banco Múltiplo S.A.', '230');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_comanda`
--

CREATE TABLE `lej_comanda` (
  `id` int(11) NOT NULL,
  `pessoa` tinyint(1) NOT NULL,
  `cliente` int(11) NOT NULL,
  `condutor` int(11) NOT NULL,
  `partida` longtext NOT NULL,
  `chegada` longtext NOT NULL,
  `meio01` longtext NOT NULL,
  `meio02` longtext NOT NULL,
  `meio03` longtext NOT NULL,
  `meio04` longtext NOT NULL,
  `meio05` longtext NOT NULL,
  `ini_lat` float NOT NULL,
  `ini_log` float NOT NULL,
  `fin_lat` float NOT NULL,
  `fin_log` float NOT NULL,
  `end01_lat` float NOT NULL,
  `end01_log` float NOT NULL,
  `end02_lat` float NOT NULL,
  `end02_log` float NOT NULL,
  `end03_lat` float NOT NULL,
  `end03_log` float NOT NULL,
  `end04_lat` float NOT NULL,
  `end04_log` float NOT NULL,
  `end05_lat` float NOT NULL,
  `end05_log` float NOT NULL,
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
  `obs` longtext NOT NULL,
  `publicado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lej_comanda`
--

INSERT INTO `lej_comanda` (`id`, `pessoa`, `cliente`, `condutor`, `partida`, `chegada`, `meio01`, `meio02`, `meio03`, `meio04`, `meio05`, `ini_lat`, `ini_log`, `fin_lat`, `fin_log`, `end01_lat`, `end01_log`, `end02_lat`, `end02_log`, `end03_lat`, `end03_log`, `end04_lat`, `end04_log`, `end05_lat`, `end05_log`, `distancia`, `valor`, `referencia`, `desconto`, `hora_cadastro`, `hora_aceite`, `hora_ini`, `hora_fin`, `ini_cep`, `ini_numero`, `ini_complemento`, `fin_cep`, `fin_numero`, `fin_complemento`, `nota_fiscal`, `instrucao_nota`, `instrucao_boleto`, `n_vias`, `obs`, `publicado`) VALUES
(1, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, '', 0),
(2, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'end02', 'end03', 'end04', 'end05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(3, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'end02', 'end03', 'end04', 'end05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(4, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(5, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(6, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(7, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(8, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(9, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(10, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(11, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(12, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(13, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(14, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(15, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(16, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(17, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(18, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(19, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(20, 1, 29, 30, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', 'Av. Paulista, 900 - Bela Vista, São Paulo - SP, Brazil', 'R. Augusta, 100 - Consolação, São Paulo - SP, Brazil', 'R. da Consolação, 300 - Consolação, São Paulo - SP, Brazil', 'Estação Carrão - Tatuapé, São Paulo - SP, 03311-002, Brazil', 'Av. Conselheiro Carrão, 1000 - Vila Carrao, São Paulo - SP, Brazil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13.23, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Teste Anotações', 0),
(21, 0, 0, 0, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11.14, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, '', 0),
(22, 1, 29, 28, 'Rua Vergueiro, 1000 - Liberdade, São Paulo - SP, Brazil', 'Praça Haroldo Daltro, 386 - Vila Nova Manchester, São Paulo - SP, 03444-090, Brazil', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11.14, '0.00', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 'Equipamento de som.', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_funcionarios`
--

CREATE TABLE `lej_funcionarios` (
  `id` int(11) NOT NULL,
  `id_wp` int(11) NOT NULL,
  `funcao` int(3) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `tipo_doc` int(2) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cnh` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` varchar(20) NOT NULL,
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
  `placa` varchar(10) NOT NULL,
  `fixo` decimal(10,2) NOT NULL,
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
  `class` varchar(16) NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lej_opcoes`
--

INSERT INTO `lej_opcoes` (`id`, `meta`, `value`, `class`, `publish`) VALUES
(1, 'tipo_doc', 'RG', '', 1),
(2, 'tipo_doc', 'RNE', '', 1),
(3, 'tipo_doc', 'Passaporte', '', 1),
(4, 'estado_civil', 'Solteiro(a)', '', 1),
(5, 'estado_civil', 'Casado(a)', '', 1),
(6, 'funcao', 'Cliente', '', 1),
(7, 'funcao', 'Condutor', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lej_pf`
--

CREATE TABLE `lej_pf` (
  `id` int(11) NOT NULL,
  `id_wp` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(120) NOT NULL,
  `telefone01` varchar(15) NOT NULL,
  `telefone02` varchar(15) NOT NULL,
  `telefone03` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fixo` decimal(10,2) NOT NULL,
  `forma_pagamento` varchar(250) NOT NULL,
  `obs` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lej_pf`
--

INSERT INTO `lej_pf` (`id`, `id_wp`, `nome`, `cpf`, `rg`, `cep`, `numero`, `complemento`, `telefone01`, `telefone02`, `telefone03`, `email`, `fixo`, `forma_pagamento`, `obs`) VALUES
(33, 0, 'Marcio Yonamine', '273.044.158-19', '2864258-8', '03444-090', '386', 'Casa', '(11) 2094-3389', '(11) 98888-1198', '', 'marcioyonamine@gmail.com', '13.00', 'Por corrida', 'Obs teste 123');

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
  `telefone01` varchar(20) NOT NULL,
  `telefone02` varchar(20) NOT NULL,
  `telefone03` varchar(20) NOT NULL,
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
-- Indexes for table `lej_bancos`
--
ALTER TABLE `lej_bancos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lej_comanda`
--
ALTER TABLE `lej_comanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lej_funcionarios`
--
ALTER TABLE `lej_funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `lej_opcoes`
--
ALTER TABLE `lej_opcoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lej_pf`
--
ALTER TABLE `lej_pf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `lej_pj`
--
ALTER TABLE `lej_pj`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lej_bancos`
--
ALTER TABLE `lej_bancos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `lej_comanda`
--
ALTER TABLE `lej_comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `lej_funcionarios`
--
ALTER TABLE `lej_funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lej_opcoes`
--
ALTER TABLE `lej_opcoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lej_pf`
--
ALTER TABLE `lej_pf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `lej_pj`
--
ALTER TABLE `lej_pj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
