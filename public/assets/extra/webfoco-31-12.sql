-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221120.420485a41b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Dez-2022 às 06:06
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webfoco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `computer`
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
-- Extraindo dados da tabela `computer`
--

INSERT INTO `computer` (`id_pc`, `marca`, `type`, `numserie`, `id_userp`, `hd`, `processador`, `modelo`, `mac`, `memoria`) VALUES
(0, 'proprio', 'notebook', '000', NULL, '', '', '', '000', ''),
(2, 'dell', 'notebook', 'xjhgt7t897w', 4, '220GB SSD', 'Intel i5', 'Delete', 'sd:57:eg:78:54', '8gb'),
(3, 'positivo', 'notebook', 'fa58727as', NULL, 'SATA', 'AMD', 'chu78aa', 'ii:87:qz:g8:j5', '16gb'),
(5, 'dell', 'notebook', 'xjhgt7t897w', NULL, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54d', '8gb'),
(6, 'dell', 'notebook', 'xjhgt7t897wasda', NULL, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54', '8gb'),
(11, 'dell', 'notebook', 'xjhgt7t897w', 6, '220GB SSD', 'Intel i5', 'Delete', 'sd:57:eg:78:54', '8gb'),
(13, 'dell', 'notebook', 'xjhgt7t897w', NULL, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54aa', '8gb'),
(14, 'dell', 'notebook', 'xjhgt7t897w', NULL, '220GB SSD', 'Intel i5', 'Delete', 'sd:57:eg:78:54', '8gb'),
(15, 'dell', 'notebook', 'xjhgt7t897wsd', 20, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54bb', '8gb'),
(16, 'dell', 'notebook', 'xjhgt7t897w', NULL, '220GB SSD', 'Intel i5', 'Delete', 'sd:57:eg:78:54', '8gb'),
(17, 'dell', 'notebook', 'xjhgt7t', NULL, 'SATA 120GB', 'Intel i5', 'Intel i5', 'sd:57:eg:78:54', '8gb'),
(49, 'Le', 'notebook', '270985', NULL, '500gb', 'i5 g7', 'Idea307', 'aa:bb:cc:dd:ee:ff:00', '16gb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `time` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `CPF` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_pcu` int(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telPessoal` int(20) DEFAULT NULL,
  `telEmpresarial` int(20) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `time`, `name`, `sobrenome`, `CPF`, `password`, `id_pcu`, `email`, `telPessoal`, `telEmpresarial`, `is_admin`) VALUES
(4, 'dev', 'Tawan Rio', 'Rio', '45995783807', '123', 2, 'stawanrio@gmail.com', 985373835, 48287988, 1),
(6, 'SEO', 'agda', 'rio', '98765432100', '789', 11, 'agda@gmail.com', 984487415, 0, 0),
(19, 'dev', 'wallace', 'rio', '12312512312', '456', NULL, 'wallrio@gmail.com', 123123123, 123123122, 0),
(20, 'bi', 'Bruno', 'nascimento', '12674656456', '', 15, 'barriga@cod3r.com.br', 123123123, 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`id_pc`),
  ADD KEY `id_user` (`id_userp`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`id_pcu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `computer`
--
ALTER TABLE `computer`
  MODIFY `id_pc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
