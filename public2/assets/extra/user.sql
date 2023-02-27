-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Fev-2023 às 00:39
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

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
  `is_admin` tinyint(1) NOT NULL,
  `historicoMaq` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `time`, `name`, `sobrenome`, `CPF`, `password`, `id_pcu`, `email`, `telPessoal`, `telEmpresarial`, `is_admin`, `historicoMaq`) VALUES
(4, 'dev', 'Tawan Rio', 'Rio', '45995783807', '123', NULL, 'stawanrio@gmail.com', 985373835, 48287988, 1, ''),
(6, 'SEO', 'agda', 'rio', '98765432100', '789', 14, 'agda@gmail.com', 984487415, 41166000, 0, '2023-02-14/ID: 14_HP_Intel i5_8gb,2023-02-14/ID: 14_HP_Intel i5_8gb,2023-02-14/ID: 14_HP_Intel i5_8gb,2023-02-14/ID: 14_HP_Intel i5_8gb,2023-02-14/ID: 14_HP_Intel i5_8gb,2023-02-13/ID: 14_HP_Intel i5_8gb,2023-02-13/ID: 14_HP_Intel i5_8gb,2023-02-13/ID: 60_Dell_Intel i5 8265U_8Gb DDR4,2023-02-13/ID: '),
(19, 'dev', 'wallace', 'rio', '12312512312', '456', 6, 'wallrio@gmail.com', 123123123, 123123122, 0, '2023-02-13/ID: 6_ACER_Intel i5_8gb,2023-02-13/ID: 60_Dell_Intel i5 8265U_8Gb DDR4,2023-02-13/ID: 6_ACER_Intel i5_8gb'),
(20, 'bi', 'Bruno', 'nascimento', '12674656456', '', 999, 'bruno@hotmail.com', 123123123, NULL, 0, ''),
(22, 'SEO', 'Bruna', 'Peres', '37271829890', '123', 51, 'Bruna@hotmail.com', 999999999, NULL, 0, ''),
(23, 'dev', 'Carla', 'Suzano', '09876543210', '123', 5, 'carla@webfoco.com', 0, NULL, 0, '');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
