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
-- Estrutura da tabela `components`
--

CREATE TABLE `components` (
  `id_cpnt` int(50) NOT NULL,
  `numserie` varchar(200) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `id_userp` int(100) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `tamanho` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `components`
--

INSERT INTO `components` (`id_cpnt`, `numserie`, `marca`, `tipo`, `codigo`, `id_userp`, `modelo`, `tamanho`) VALUES
(20, 'sn', 'Philips', 'monitor', '01.02.0001', 0, 'qulq', '15'),
(172, '', 'Multlaser', 'mouse', '01.03.0001', 0, 'm0212', ''),
(173, '', 'Multlaser', 'mouse', '01.03.0002', 0, 'm0212', ''),
(174, '', 'Sem marca', 'suportenot', '01.05.0001', 0, '', '1'),
(175, '', 'Sem marca', 'suportenot', '01.05.0002', 0, '', '3'),
(178, '', 'teste', 'suportenot', '01.05.0004', 0, '', ''),
(179, '', 'asd', 'monitor', '01.02.0004', 0, '', ''),
(180, '', 'Teste', 'monitor', '01.02.0002', 0, '', ''),
(181, '', 'Teste2', 'monitor', '01.02.0003', 0, '', ''),
(182, '', 'teste4', 'monitor', '01.02.0005', 0, '', ''),
(183, '', 'teste5', 'suportenot', '01.05.0003', 0, '', ''),
(184, '', 'teste5', 'suportenot', '01.05.0005', 0, '', ''),
(185, '', 'asdsf', 'mouse', '01.03.0003', 0, '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id_cpnt`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `components`
--
ALTER TABLE `components`
  MODIFY `id_cpnt` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
