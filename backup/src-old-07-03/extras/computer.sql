-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/01/2023 às 05:36
-- Versão do servidor: 5.5.62-log
-- Versão do PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tawanriodb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `computer`
--

CREATE TABLE `computer` (
  `id_pc` int(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `numserie` varchar(100) NOT NULL,
  `id_userp` int(50) DEFAULT NULL,
  `hd` varchar(50) NOT NULL,
  `processador` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `memoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `computer`
--

INSERT INTO `computer` (`id_pc`, `marca`, `type`, `numserie`, `id_userp`, `hd`, `processador`, `modelo`, `mac`, `memoria`) VALUES
(5, 'dell', 'notebook', 'xjhgt7t897w', 23, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54d', '8gb'),
(6, 'ACER', 'notebook', 'xjhgt7t897wasda', 19, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54', '8gb'),
(11, 'HP', 'notebook', 'xjhgt7t897w', NULL, '220GB SSD', 'Intel i5', 'Delete', 'sd:57:eg:78:54', '8gb'),
(13, 'dell', 'notebook', 'xjhgt7t897w', NULL, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54aa', '8gb'),
(14, 'HP', 'notebook', 'xjhgt7t897w', NULL, '220GB SSD', 'Intel i5', 'Delete', 'sd:57:eg:78:54', '8gb'),
(15, 'dell', 'notebook', 'xjhgt7t897wsd', NULL, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54bb', '8gb'),
(17, 'dell', 'notebook', 'xjhgt7t', NULL, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54', '8gb'),
(49, 'Lenovo', 'notebook', '270985', NULL, '500gb', 'i5 g7', 'Idea307', 'aa:bb:cc:dd:ee:ff:00', '16gb'),
(51, 'Samsung', 'notebook', '5434565434554', 22, '240gb SSD', 'Celeron g12', 'E20', 'Pcbrunaa', '4gb'),
(53, 'Dell', 'notebook', 'fe80::df11:d6a:980c:79b0%13', NULL, '220Gb SSD', 'Intel i5 1135g7', '072TWW', '00-d7-6d-91-05-05', '8Gb DDR4'),
(54, 'Dell', 'notebook', 'fe80::8f49:5409:2040:dc0a%4', NULL, '220Gb SSD', 'Intel i5 1135g7', '072TWW', '00-d7-6d-91-04-dc', '8Gb DDR4'),
(55, 'Lenovo', 'notebook', 'fe80::9170c38a:144d:c2ce%4', NULL, '240gb SSD', 'Intel i7 7500U', 'lnvnbv 161216', '00-05-16-59-e3-49', '8Gb DDR4'),
(56, 'Acer', 'notebook', 'fe80::a87b:db41:62f1:8e20%18', NULL, '240Gb SSD', 'Intel i5 7200U', 'Charmander KL', '5c-c9-d3-92-c2-b9', '8Gb DDR4'),
(57, 'Dell', 'notebook', 'fe80::4415:a846:bc50:ec6a%18', NULL, '240gb', 'Intel i5', 'Vostro 072TWW', '00-D7-6D-82-F9-33', '8gb DDR4'),
(58, 'Dell', 'notebook', 'fe80::c4bc:6b51:6e7f:c30e%14', NULL, '240gb', 'Intel i5', 'Vostro 072TWW', '00-D7-6D-83-0F-27', '8gb DDR4'),
(59, 'Dell', 'notebook', 'fe80::ad56:d1e0:b1c8:22bb%5', NULL, '240gb NVME', 'Intel i5 8265U', 'Inspiron 3480', '5C-CD-5B-BE-16-8A', '8gb DDR4'),
(60, 'Dell', 'notebook', 'fe80::1c8b:a0ae:2e4b:eb03%8', NULL, '240Gb NVME', 'Intel i5 8265U', 'Inspiron 3480', '5C-CD-5B-BE-16-26', '8Gb DDR4'),
(61, 'Samsung', 'notebook', 'fe80::bd40:a7d4:1353:d1be%3', NULL, '120Gb SSD', 'Intel i3 5005U', '270E', '98-83-89-5E-F8-87', '4Gb DDR3'),
(999, 'proprio', 'notebook', '999', 20, '-', '-', '-', '999', '-');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`id_pc`),
  ADD KEY `id_user` (`id_userp`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `computer`
--
ALTER TABLE `computer`
  MODIFY `id_pc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
