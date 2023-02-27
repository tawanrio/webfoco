-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221120.420485a41b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2022 às 01:13
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
  `id_user` int(50) DEFAULT NULL,
  `tipo_hd` varchar(50) NOT NULL,
  `processador` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `memoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `computer`
--

INSERT INTO `computer` (`id_pc`, `marca`, `type`, `numserie`, `id_user`, `tipo_hd`, `processador`, `modelo`, `mac`, `memoria`) VALUES
(2, 'dell', 'desktop', 'xjhgt7t897w', 4, 'SSD', 'Intel i5', '65s', ' sd:57:eg:78:54', '8gb'),
(3, 'positivo', 'desktop', 'fa58727as\n', 6, 'SATA', 'AMD', 'chu78', 'ii:87:qz:g8:j5', '16gb'),
(4, 'lenovo', 'notbook', 'fasd4579\n', 5, 'SSD', 'Intel i3', 'v7c9', '54:87:as:gr:qw', '4gb'),
(5, 'dell', 'desktop', 'xjhgt7t897w', NULL, 'SATA', 'Intel i5', '65s', 'sd:57:eg:78:54', '8gb'),
(6, 'acer', 'desktop', 'xjhgt7t897w', 5, 'SSD', 'AMD', '65s', 'sd:57:eg:78:54', '8gb'),
(7, 'sumsung', 'desktop', 'xjhgt7t897w', 6, 'SSD', 'Intel i5', '65s', 'sd:57:eg:78:54', '8gb'),
(8, 'HP', 'desktop', 'xjhgt7t897w', NULL, 'SSD', 'AMD', '65s', 'sd:57:eg:78:54', '8gb'),
(11, 'Vaio', 'desktop', 'xjhgt7t897w', 5, 'SATA', 'AMD', '65s', 'sd:57:eg:78:54', '8gb'),
(13, 'Ultra', 'desktop', 'xjhgt7t897w', 4, 'SSD', 'Intel i3', '65s', 'sd:57:eg:78:54', '8gb'),
(14, 'acer', 'desktop', 'xjhgt7t897w', NULL, 'SATA', 'Intel i5', '65s', 'sd:57:eg:78:54', '8gb'),
(15, 'positivo', 'notbook', 'xjhgt7t897w', 5, 'SSD', 'Intel i9', '65s', 'sd:57:eg:78:54', '8gb'),
(16, 'dell', 'notbook', 'xjhgt7t897w', NULL, 'SSD', 'Celeron', '65s', 'sd:57:eg:78:54', '8gb'),
(17, 'vaio', 'notbook', 'xjhgt7t897w', 6, 'SATA', 'Core 2 Duo', '65s', 'sd:57:eg:78:54', '8gb'),
(18, 'comparq', 'notbook', 'xjhgt7t897w', 4, 'SSD', 'AMD', '65s', 'sd:57:eg:78:54', '8gb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_pcu` int(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `id_pcu`, `email`, `is_admin`) VALUES
(4, 'Tawan', '123', 2, 'stawanrio@gmail.com', 1),
(5, 'Wallace', '456', 4, 'wallrio@gmail.com', 0),
(6, 'agda', '789', 3, 'agda@gmail.com', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`id_pc`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pc` (`id_pcu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `computer`
--
ALTER TABLE `computer`
  MODIFY `id_pc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `computer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_pcu`) REFERENCES `computer` (`id_pc`)
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



