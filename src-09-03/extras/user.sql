-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/01/2023 às 05:35
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
-- Estrutura para tabela `user`
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
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id_user`, `time`, `name`, `sobrenome`, `CPF`, `password`, `id_pcu`, `email`, `telPessoal`, `telEmpresarial`, `is_admin`) VALUES
(4, 'dev', 'Tawan Rio', 'Rio', '45995783807', '123', 2, 'stawanrio@gmail.com', 985373835, 48287988, 1),
(6, 'SEO', 'agda', 'rio', '98765432100', '789', 999, 'agda@gmail.com', 984487415, NULL, 0),
(19, 'dev', 'wallace', 'rio', '12312512312', '456', 6, 'wallrio@gmail.com', 123123123, 123123122, 0),
(20, 'bi', 'Bruno', 'nascimento', '12674656456', '', 999, 'bruno@hotmail.com', 123123123, NULL, 0),
(22, 'SEO', 'Bruna', 'Peres', '37271829890', '123', 51, 'Bruna@hotmail.com', 999999999, NULL, 0),
(23, 'dev', 'Carla', 'Suzano', '09876543210', '123', 5, 'carla@webfoco.com', 0, NULL, 0),
(24, '', '', '', '', '', NULL, 'stawanrio@gmail.com', 0, NULL, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`id_pcu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
