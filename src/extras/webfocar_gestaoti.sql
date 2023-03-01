-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01-Mar-2023 às 10:14
-- Versão do servidor: 10.0.38-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webfocar_gestaoti`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `components`
--

INSERT INTO `components` (`id_cpnt`, `numserie`, `marca`, `tipo`, `codigo`, `id_userp`, `modelo`, `tamanho`) VALUES
(1, 'tawan-dev', 'Multlaser', 'mouse', '01.03.0001', 0, 'm0212', ''),
(2, 'diego-re', 'Multlaser', 'mouse', '01.03.0002', 0, 'M0216', ''),
(3, 'luiza-ib', 'Resolve', 'suportenot', '01.05.0001', 0, 'ErgonÃ´mico NR17', ''),
(4, 'gabriel-re', 'Resolve', 'suportenot', '01.05.0002', 0, 'ErgonÃ´mico NR17', ''),
(6, 'luana-cs', 'Resolve', 'suportenot', '01.05.0003', 0, 'ErgonÃ´mico NR17', ''),
(8, 'leticia-seo', 'Multlaser', 'mouse', '01.03.0003', 0, 'M0216', ''),
(10, 'luane-co', 'Multlaser', 'mouse', '01.03.0005', 0, 'M0216', ''),
(11, 'cesar-co', 'Multlaser', 'mouse', '01.03.0004', 0, 'M0216', ''),
(12, 'suzana-seo', 'Multlaser', 'mouse', '01.03.0006', 0, 'M0216', ''),
(13, 'rodrigo-cs', 'Desconhecida', 'suportenot', '01.05.0004', 0, 'ErgonÃ´mica', ''),
(14, 'dayse-cr', 'Multlaser', 'mouse', '01.03.0007', 0, 'M0216', ''),
(15, 'luiza-ib', 'Multlaser', 'mouse', '01.03.0008', 0, 'M0216', ''),
(16, 'paulo-sm', 'Multlaser', 'mouse', '01.03.0009', 0, 'M0216', ''),
(17, 'debora-re', 'Multlaser', 'mouse', '01.03.0010', 0, 'M0216', ''),
(18, 'karina-seo', 'Multlaser', 'mouse', '01.03.0011', 0, 'M0216', ''),
(20, 'dayra-sm', 'multlaser', 'mouse', '01.03.0012', 0, 'M0216', ''),
(22, 'diego-re', 'Resolve', 'suportenot', '01.05.0005', 0, 'ErgonÃ´mica NR17', ''),
(23, 'debora-re', 'Resolve', 'suportenot', '01.05.0006', 0, 'ErgonÃ´mica NR17', ''),
(24, '', 'Resolve', 'suportenot', '01.05.0007', 0, 'ErgonÃ´mica NR17', ''),
(25, '', 'Resolve', 'suportenot', '01.05.0008', 0, 'ErgonÃ´mica NR17', ''),
(26, 'renata-cs', 'Resolve', 'suportenot', '01.05.0009', 0, 'ErgonÃ´mica NR17', ''),
(27, 'Daniel-re', 'Resolve', 'suportenot', '01.05.0010', 0, 'ErgonÃ´mica NR17', ''),
(28, 'tawan-dev', 'Resolve', 'suportenot', '01.05.0011', 0, 'ErgonÃ´mica NR17', ''),
(29, 'carla-dev', 'Multlaser', 'mouse', '01.03.0013', 0, 'M0212', ''),
(30, 'cris-se', 'Multlaser', 'mouse', '01.03.0014', 0, 'M0288', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `computer`
--

CREATE TABLE `computer` (
  `id_pc` int(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `ipv6` varchar(100) NOT NULL,
  `id_userp` int(50) DEFAULT NULL,
  `hd` varchar(50) NOT NULL,
  `processador` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `mac` varchar(100) NOT NULL,
  `memoria` varchar(50) NOT NULL,
  `propriedade` varchar(20) NOT NULL,
  `ultlimpeza` varchar(100) NOT NULL,
  `tipolimpeza` varchar(150) NOT NULL,
  `historico` varchar(300) NOT NULL,
  `codigo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `computer`
--

INSERT INTO `computer` (`id_pc`, `marca`, `tipo`, `ipv6`, `id_userp`, `hd`, `processador`, `modelo`, `mac`, `memoria`, `propriedade`, `ultlimpeza`, `tipolimpeza`, `historico`, `codigo`) VALUES
(1, 'Lenovo', 'notebook', '270985', 8, '500gb', 'Intel i5 g7', 'Idea307', 'aa:bb:cc:dd:ee:ff:00', '16gb', 'proprio', '', '', '', '01.01.0012'),
(2, 'Dell', 'notebook', 'fe80::df11:d6a:980c:79b0%13', NULL, '220Gb SSD', 'Intel i5 1135g7', 'Vostro 3400', '00-d7-6d-91-05-05', '8Gb DDR4', 'webfoco', '', '', '', '01.01.0011'),
(3, 'Dell', 'notebook', 'fe80::8f49:5409:2040:dc0a%4', 1, '220Gb SSD', 'Intel i5 1135g7', 'Vostro 3400', '00-D7-6D-91-04-EC', '8Gb DDR4', 'webfoco', '2023-01-18', '0,0,0,0', '', '01.01.0010'),
(4, 'Lenovo', 'notebook', 'fe80::9170c38a:144d:c2ce%4', 80, '240gb SSD', 'Intel i7 7500U', 'lnvnbv 161216', '00-05-16-59-e3-49', '8Gb DDR4', 'webfoco', '', '', '', '01.01.0009'),
(5, 'Acer', 'notebook', 'fe80::a87b:db41:62f1:8e20%18', 37, '240Gb SSD', 'Intel i5 7200U', 'Charmander KL', '5c-c9-d3-92-c2-b9', '8Gb DDR4', 'webfoco', '', '', '', '01.01.0008'),
(6, 'Dell', 'notebook', 'fe80::4415:a846:bc50:ec6a%18', 16, '240gb', 'Intel i5', 'Vostro 3400', '00-D7-6D-82-F9-33', '8gb DDR4', 'webfoco', '', '', '', '01.01.0007'),
(7, 'Dell', 'notebook', 'fe80::c4bc:6b51:6e7f:c30e%14', 3, '240gb', 'Intel i5', 'Vostro 3400', '00-D7-6D-83-0F-27', '8gb DDR4', 'webfoco', '', '', '1111-11-11/0_0_0_0,1111-11-11/0_0_0_0,1111-11-11/0_0_0_0,2025-02-05/0_0_0_0,2015-02-05/pastater_culer_memorialimp_carcaca', '01.01.0006'),
(8, 'Dell', 'notebook', 'fe80::ad56:d1e0:b1c8:22bb%5', NULL, '240gb NVME', 'Intel i5 8265U', 'Inspiron 3480', '5C-CD-5B-BE-16-8A', '8gb DDR4', 'webfoco', '', '', '1212-12-12/0_0_0_0,1212-12-12/0_0_0_0,1212-12-12/0_0_0_0', '01.01.0005'),
(9, 'Dell', 'notebook', 'fe80::1c8b:a0ae:2e4b:eb03%8', NULL, '240Gb NVME', 'Intel i5 8265U', 'Inspiron 3480', '5C-CD-5B-BE-16-26', '8Gb DDR4', 'webfoco', '', '', '', '01.01.0004'),
(10, 'Samsung', 'notebook', 'fe80::bd40:a7d4:1353:d1be%3', 75, '120Gb SSD', 'Intel i3 5005U', '270E', '98-83-89-5E-F8-87', '4Gb DDR3', 'webfoco', '', '', '', '01.01.0003'),
(13, 'Apple', 'notebook', '-', 13, '-', 'Intel i5', 'Pro-13-inch-M1-2020', '', '8GB', 'proprio', '', '', '', '01.01.0001'),
(14, 'Acer', 'notebook', 'fe80::edbc:38ba:11d3:47a1%5', 39, '1TB SATA', 'Intel I5 7200U', 'Aspire A515-51', 'FC-45-96-F8-1A-C4', '8gb', 'webfoco', '', '', '2023-02-23/pastater_culer_memorialimp_carcaca,2023-02-23/pastater_culer_memorialimp_carcaca', '01.01.0002'),
(15, 'Samsung', 'notebook', '', 25, '', 'Intel i5 7g', 'Matheus chaubet', '14/11/2022-12:07:14', '', 'webfoco', '', '', '', '01.01.0013'),
(16, 'Dell', 'notebook', 'vitoria-lino', 58, '', 'Intel i5', '', '14/11/2022-12:13:24', '', 'proprio', '', '', '', '01.01.0014'),
(17, 'Lenovo', 'notebook', 'gabrielly-souza', 23, '', 'Intel i5-7200U', '', '14/11/2022-12:32:21', '', 'webfoco', '', '', '', '01.01.0015'),
(18, 'Acer', 'notebook', 'beatriz-mit', 53, '', 'Intel i7', '', '14/11/2022-17:02:14', '', 'webfoco', '', '', '', '01.01.0016'),
(19, 'Samsung', 'notebook', 'daniel-valenciano', 26, '', 'Intel i3', '', '14/11/2022-18:05:11', '', 'webfoco', '', '', '', '01.01.0017'),
(20, 'Dell', 'notebook', 'ingrid-osti', 20, '', 'Intel Iris Xe', '', '16/11/2022-09:46:14', '', 'webfoco', '', '', '', '01.01.0018'),
(21, 'Dell', 'notebook', 'agnes-hehn', NULL, '', 'Intel i5', '', '16/11/2022 10:39:45', '', 'webfoco', '', '', '', '01.01.0019'),
(22, 'Dell', 'notebook', 'leonardo-castro', 41, '', 'Intel i5', '', '16/11/2022-11:05:40', '', 'webfoco', '', '', '', '01.01.0020'),
(23, 'Acer', 'notebook', 'leonardo-souza', 48, '', 'Intel i5-9300H', '', '16/11/2022-14:24:37', '', 'webfoco', '', '', '', '01.01.0021'),
(24, 'Samsung', 'notebook', 'barbara-ferreira', 14, '', 'Intel i3-6006U', '', '16/11/2022-14:50:37', '', 'webfoco', '', '', '', '01.01.0022'),
(25, 'Apple', 'notebook', 'rodrigo-oliveira', 29, '', 'Intel i3', '', '16/11/2022-16:59:40', '', 'webfoco', '', '', '', '01.01.0023'),
(26, 'Lenovo', 'notebook', 'priscila-cs', 21, '', 'Intel i5', '', '17/11/2022-16:30:15', '', 'webfoco', '', '', '', '01.01.0024'),
(27, 'Dell', 'notebook', 'A3DEEF21-C2D8-4898-918F-EF99F3645981', 10, '240Gb SSD', 'Intel i5-1135g7', 'Vostro 3400', '74-86-E2-DD-D9-8B', '8Gb DD4', 'webfoco', '', '', '', '01.01.0025'),
(28, 'Dell', 'notebook', 'dayani-cs', 71, '', 'Intel i5-1135g7', '', '18/11/2022 16:30:15', '', 'webfoco', '', '', '', '01.01.0026'),
(30, 'Dell', 'notebook', 'moises-co', 12, '', 'Intel i5', '', '17/11/2022-16:33:59', '', 'webfoco', '', '', '', '01.01.0027'),
(31, 'Dell', 'notebook', 'eduardo-bi', 73, '', 'Intel i7-6500U', '', '18/11/2022-11:26:30', '', 'webfoco', '', '', '', '01.01.0028'),
(32, 'Dell', 'notebook', 'igor-cr', NULL, '', 'Intel i3-6006U', '', '22/11/2022-14:24:50', '12GB DD3', 'webfoco', '', '', '', '01.01.0029'),
(33, 'Acer', 'notebook', 'Alexandre-cr', 18, '', 'Intel i7-7700HQ', '', '22/11/2022-14:25:06', '', 'webfoco', '', '', '', '01.01.0030'),
(34, 'Acer', 'notebook', 'lucas-cr', 30, '', 'AMD Ryzen 5-3500U', '', '22/11/2022 15:01:26', '', 'webfoco', '', '', '', '01.01.0031'),
(35, 'Acer', 'notebook', 'beatriz-cr', 34, '', 'Intel i5-9300H', '', '22/11/2022 15:03:32', '', 'webfoco', '', '', '', '01.01.0032'),
(36, 'Apple', 'notebook', 'gabriel-re', 35, '', 'Intel i5', '', '25/11/2022 13:04:17', '', 'webfoco', '', '', '', '01.01.0033'),
(37, 'Asus', 'notebook', 'alana-rh', 59, '', 'Intel i5', '', '25/11/2022 14:10:28', '', 'webfoco', '', '', '', '01.01.0034'),
(38, 'Dell', 'notebook', 'ritaribeiro-rh', 52, '', 'Intel i5', '', '25/11/2022 14:28:05', '', 'webfoco', '', '', '', '01.01.0035'),
(40, 'Dell', 'notebook', 'talita-rh', 9, '', 'Intel i5', '', '29/11/2022 10:48:19', '', 'webfoco', '', '', '', '01.01.0036'),
(41, 'Dell', 'notebook', 'anaca-re', 44, '', 'Intel i7-7500U', '', '29/11/2022 10:53:51', '', 'webfoco', '', '', '', '01.01.0037'),
(42, 'Lenovo', 'notebook', 'leticia-seo', 27, '', 'Intel i3', '', '29/11/2022 11:08:08', '', 'webfoco', '', '', '', '01.01.0038'),
(43, 'Samsung', 'notebook', 'cristina-se', 60, '', 'Intel i5', '', '29/11/2022 11:14:56', '', 'webfoco', '', '', '', '01.01.0039'),
(44, 'Acer', 'notebook', 'isabely-mkt', 46, '', 'AMD Ryzen 5 3500U', '', '29/11/2022 11:31:34', '', 'webfoco', '', '', '', '01.01.0040'),
(45, 'Apple', 'notebook', 'andre-so', 54, '', 'Intel i7', '', '29/11/2022 13:28:33', '', 'webfoco', '', '', '', '01.01.0041'),
(46, 'Acer', 'notebook', 'luanafe-cs', 67, '', 'AMD Ryzen 5 3500U', '', '20/12/2022 13:46:11', '', 'webfoco', '', '', '', '01.01.0042'),
(47, 'Lenovo', 'notebook', 'rodrigoszi-cs', 69, '', 'Intel i3', '', '03/01/2023 10:25:35', '', 'webfoco', '', '', '', '01.01.0043'),
(48, 'Dell', 'notebook', 'giovanna-re', 32, '', 'Intel i7-7500U', '', '14/11/2022 12:14:37', '', 'proprio', '', '', '', '01.01.0044'),
(49, 'Dell', 'notebook', 'evelen-re', 42, '', 'Intel i5', '', '14/11/2022 12:16:08', '', 'proprio', '', '', '', '01.01.0045'),
(50, 'Acer', 'notebook', 'anafla-seo', 61, '', 'Intel i5', '', '14/11/2022 12:16:51', '', 'proprio', '', '', '', '01.01.0046'),
(51, 'Lenovo', 'notebook', 'nicole-re', 36, '', 'Intel i7', '', '14/11/2022 12:17:09', '', 'proprio', '', '', '', '01.01.0047'),
(52, 'Lenovo', 'notebook', 'karinago-seo', 33, '', 'AMD Ryzen 3-3200U', '', '14/11/2022 12:21:20', '', 'proprio', '', '', '', '01.01.0048'),
(53, 'Acer', 'notebook', 'caiomo-SEO', 28, '', 'Intel i5', '', '14/11/2022 12:24:56', '', 'proprio', '', '', '', '01.01.0049'),
(54, 'Samsung', 'notebook', 'brunomar-re', 45, '', 'Intel', '', '14/11/2022 12:29:49', '', 'proprio', '', '', '', '01.01.0050'),
(55, 'Dell', 'notebook', 'leonardoro-re', 56, '', 'Intel Pentium Gold 7505', '', '14/11/2022 12:51:51', '', 'proprio', '', '', '', '01.01.0051'),
(56, 'Dell', 'notebook', 'williango-re', 40, '', 'Intel i7', '', '14/11/2022 13:01:53', '', 'proprio', '', '', '', '01.01.0052'),
(57, 'Positivo', 'notebook', 'leonardono-re', 6, '', 'Intel Celeron B800', '', '14/11/2022 13:03:39', '', 'proprio', '', '', '', '01.01.0053'),
(58, 'Dell', 'notebook', 'renatafi-cs', 31, '', 'Intel i3', '', '16/11/2022 14:48:25', '', 'proprio', '', '', '', '01.01.0054'),
(59, 'Acer', 'notebook', 'dayra-so', 57, '', 'Intel i5', '', '16/11/2022 17:00:56', '', 'proprio', '', '', '', '01.01.0055'),
(60, 'Asus', 'notebook', 'paulooli-sm', 47, '', '', '', '16/11/2022 17:06:34', '', 'proprio', '', '', '', '01.01.0056'),
(61, 'Acer', 'notebook', 'daniloka-mi', 63, '', 'Intel i5-7300HQ', '', '18/11/2022 11:35:46', '', 'proprio', '', '', '', '01.01.0057'),
(62, 'Apple', 'notebook', 'palomamo-cr', 15, '', 'M1', '', '22/11/2022 14:25:31', '', 'proprio', '', '', '', '01.01.0058'),
(63, 'Lenovo', 'notebook', 'rafaelal-dev', 62, '', 'AMD Ryzen 5 5500U', '', '25/11/2022 15:57:00', '', 'proprio', '', '', '', '01.01.0059'),
(64, 'Asus', 'notebook', 'danielasa-re', 50, '', 'AMD Ryzen 3 3250U', '', '25/11/2022 18:17:29', '', 'proprio', '', '', '', '01.01.0060'),
(65, 'Lenovo', 'notebook', 'stephanie-re', 68, '', 'Intel i5', '', '29/11/2022 11:19:13', '', 'proprio', '', '', '', '01.01.0061'),
(66, 'Lenovo', 'notebook', 'diegosi-re', 51, '', 'Intel i5 8250U', '', '29/11/2022 11:22:40', '', 'proprio', '', '', '', '01.01.0062');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `time`, `name`, `sobrenome`, `CPF`, `password`, `id_pcu`, `email`, `telPessoal`, `telEmpresarial`, `is_admin`, `historicoMaq`) VALUES
(1, 'dev', 'Tawan Rio', 'Rio', '45995783807', '123', 3, 'stawanrio@gmail.com', 985373835, 48287988, 1, '2023-02-15/ID: 3_Dell_Intel i5 1135g7_8Gb DDR4'),
(3, 'dev', 'Carla', 'Suzano', '09876543210', '123', 7, 'carla@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 7_Dell_Intel i5_8gb DDR4'),
(4, 'rh', 'Rita', 'Passos', '', '', NULL, 'rita.passos@webfoco.com', 0, NULL, 0, ''),
(5, 'dir', 'Alex', 'pinhol da silva', '', '', NULL, 'alex.pinhol@webfoco.com', 0, NULL, 0, ''),
(6, 'redacao', 'Leonardo', 'ribeiro munhoz', '', '', 57, 'leonardo.munhoz@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 57_Positivo_Intel Celeron B800_'),
(7, 'dir', 'Beatrice', 'teles de castro', '', '', NULL, 'beatrice.castro@webfoco.com', 0, NULL, 0, ''),
(8, 'dev', 'Wallace', 'rio de souza', '', '', 1, 'wallace@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 1_Lenovo_Intel i5 g7_16gb'),
(9, 'rh', 'Talita', 'sales castanharo', '', '', 40, 'talita.sales@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 40_Dell_Intel i5_'),
(10, 'bi', 'Agnes', 'lourenzo hehn', '', '', 27, 'agnes.lourenzo@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 27_Dell_Intel i5-1135g7_8Gb DD4,2023-02-24/ID: 21_Dell_Intel i5_'),
(11, '', 'Wesley', 'ferreira coelho', '', '', 0, 'wesley.ferreira@webfoco.com', 0, 0, 0, ''),
(12, 'comercial', 'Moises', 'gimenez pretti', '', '', 30, 'moises@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 30_Dell_Intel i5_'),
(13, 'SEO', 'Isabela', 'pinhol da silva', '', '', 13, 'isabela@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 13_Apple_Intel i5_8GB'),
(14, 'mÃ­dia', 'Barbara', 'bianca mathias', '', '', 24, 'barbara.mathias@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 24_Samsung_Intel i3-6006U_'),
(15, 'criacao', 'Paloma', 'moreno montenegro', '', '', 62, 'paloma.montenegro@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 62_Apple_M1_'),
(16, 'mÃ­dia', 'Guilherme', 'castilho pinto', '', '', 6, 'guilherme.castilho@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 6_Dell_Intel i5_8gb DDR4,2023-02-24/ID: 6_Dell_Intel i5_8gb DDR4,2023-02-24/ID: 6_Dell_Intel i5_8gb DDR4,2023-02-24/ID: 6_Dell_Intel i5_8gb DDR4,2023-02-24/ID: 6_Dell_Intel i5_8gb DDR4,2023-02-24/ID: 6_Dell_Intel i5_8gb DDR4,2023-02-24/ID: 6_Dell_Intel i5_8gb DDR4,2023-02-24/ID: 6_Del'),
(17, '', 'Bruna', 'yukari aiabe', '', '', 0, 'bruna.aiabe@webfoco.com', 0, 0, 0, ''),
(18, 'criacao', 'Alexandre', 'santos silva', '', '', 33, 'alexandre.santos@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 33_Acer_Intel i7-7700HQ_'),
(19, '', 'Luane', 'gabriela rocha reis', '', '', 0, 'luane.reis@webfoco.com', 0, 0, 0, ''),
(20, 'cs', 'Ingrid', 'silva osti', '', '', 20, 'ingrid.osti@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 20_Dell_Intel Iris Xe_'),
(21, 'cs', 'Priscilla', 'de souza lima oliveira', '', '', 26, 'priscilla.lima@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 26_Lenovo_Intel i5_'),
(22, '', 'Victoria', 'carolliny martins tenorio', '', '', 0, 'victoria.tenorio@webfoco.com', 0, 0, 0, ''),
(23, 'redacao', 'Gabrielly', 'de souza', '', '', 17, 'gabrielly.souza@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 17_Lenovo_Intel i5-7200U_'),
(24, 'redacao', 'Karina', 'gomes da silva', '', '', NULL, 'karina.gomes@webfoco.com', 0, NULL, 0, ''),
(25, 'SEO', 'Matheus', 'chaubet cordeiro', '', '', 15, 'matheus.chaubet@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 15_Samsung_Intel i5 7g_'),
(26, 'redacao', 'Daniel', 'valenciano gimenes', '', '', 19, 'daniel.gimenes@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 19_Samsung_Intel i3_'),
(27, 'SEO', 'Leticia', 'dias costa', '', '', 42, 'leticia.costa@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 42_Lenovo_Intel i3_'),
(28, 'SEO', 'Caio', 'moradei frade', '', '', 53, 'caio.frade@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 53_Acer_Intel i5_'),
(29, 'social', 'Rodrigo', 'oliveira araujo', '', '', 25, 'rodrigo.araujo@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 25_Apple_Intel i3_'),
(30, 'criacao', 'Lucas', 'veroneze tola', '', '', 34, 'lucas.veroneze@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 34_Acer_AMD Ryzen 5-3500U_'),
(31, 'cs', 'Renata', 'fidelis de carvalho rissardi', '', '', 58, 'renata.fidelis@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 58_Dell_Intel i3_'),
(32, 'redacao', 'Giovanna', 'zaghis mattos', '', '', 48, 'giovanna.mattos@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 48_Dell_Intel i7-7500U_'),
(33, 'SEO', 'Karina', 'gomes de oliveira', '', '', 52, 'karina.oliveira@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 52_Lenovo_AMD Ryzen 3-3200U_'),
(34, 'criacao', 'Beatriz', 'strozzi lopes', '', '', 35, 'beatriz.strozzi@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 35_Acer_Intel i5-9300H_,2023-02-24/ID: 35_Acer_Intel i5-9300H_'),
(35, 'redacao', 'Gabriel', 'd avola brites', '', '', 36, 'gabriel.brites@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 36_Apple_Intel i5_'),
(36, 'redacao', 'Nicole', 'martins silva soares maia', '', '', 51, 'nicole.martins@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 51_Lenovo_Intel i7_'),
(37, 'SEO', 'Suzana', 'rodrigues dezena', '', '', 5, 'suzana.rodrigues@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 5_Acer_Intel i5 7200U_8Gb DDR4,2023-02-24/ID: 5_Acer_Intel i5 7200U_8Gb DDR4'),
(38, '', 'Beatriz', 'notabile nunes', '', '', 0, 'beatriz.nunes@webfoco.com', 0, 0, 0, ''),
(39, 'criacao', 'Igor', 'marcelo zacarias oliveira', '', '', 14, 'igor.oliveira@webfoco.com', 0, NULL, 0, '2023-02-23/ID: 14_Acer_Intel I5 7200U_8gb'),
(40, 'redacao', 'Willian', 'gouveia ferreira', '', '', 56, 'willian.gouveia@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 56_Dell_Intel i7_'),
(41, 'redacao', 'Leonardo', 'rocha de castro', '', '', 22, 'leonardo.rocha@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 22_Dell_Intel i5_'),
(42, 'redacao', 'Evelen', 'giovana silva de jesus', '', '', 49, 'evelen.giovana@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 49_Dell_Intel i5_'),
(43, '', 'Cesar', 'augusto schiavetti de toledo piza', '', '', 0, 'cesar.piza@webfoco.com', 0, 0, 0, ''),
(44, 'redacao', 'Ana', 'carolina dos santos batista', '', '', 41, 'ana.carolina@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 41_Dell_Intel i7-7500U_'),
(45, 'redacao', 'Bruno', 'marquesini silva', '', '', 54, 'bruno.marquesini@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 54_Samsung_Intel_'),
(46, 'marketing', 'Isabely', 'aquino teixeira', '', '', 44, 'isabely.aquino@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 44_Acer_AMD Ryzen 5 3500U_'),
(47, 'social', 'Paulo', 'lucas lima de oliveira', '', '', 60, 'paulo.oliveira@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 60_Asus__'),
(48, 'bi', 'Leonardo', 'de souza', '', '', 23, 'leonardo.souza@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 23_Acer_Intel i5-9300H_'),
(49, '', 'Leonardo', 'santana nogueira', '', '', 0, 'leonardo.santana@webfoco.com', 0, 0, 0, ''),
(50, 'redacao', 'Daniela', 'salviano', '', '', 64, 'daniela.salviano@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 64_Asus_AMD Ryzen 3 3250U_'),
(51, 'redacao', 'Diego', 'silva cardoso', '', '', 66, 'diego.cardoso@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 66_Lenovo_Intel i5_'),
(52, 'rh', 'Rita', 'de cï¿½ssia ribeiro leandro', '', '', 38, 'rita.ribeiro@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 38_Dell_Intel i5_,2023-02-24/ID: 38_Dell_Intel i5_'),
(53, 'redacao', 'Beatriz', 'mittermayer', '', '', 18, 'beatriz.mittermayer@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 18_Acer_Intel i7_,2023-02-24/ID: 18_Acer_Intel i7_'),
(54, 'social', 'Andre', 'd avola brites', '', '', 45, 'andre.brites@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 45_Apple_Intel i7_'),
(55, '', 'Maria', 'luiza gradin', '', '', 0, 'luiza.gradin@webfoco.com', 0, 0, 0, ''),
(56, 'redacao', 'Leonardo', 'rodrigues', '', '', 55, 'leonardo.rodrigues@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 55_Dell_Intel Pentium Gold 7505_'),
(57, 'social', 'Dayra', 'danielli da silva', '', '', 59, 'dayra.silva@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 59_Acer_Intel i5_'),
(58, 'redacao', 'VitÃ³ria', 'lino do nascimento lopes', '', '', 16, 'vitoria.nascimento@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 16_Dell_Intel i5_'),
(59, 'rh', 'Alana', 'oliveira veras', '', '', 37, 'alana.oliveira@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 37_Asus_Intel i5_'),
(60, 'se', 'Cristina', 'nicacio silva', '', '', 43, 'cristina.silva@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 43_Samsung_Intel i5_,2023-02-24/ID: 43_Samsung_Intel i5_'),
(61, 'SEO', 'Ana', 'flavia martins sena', '', '', 50, 'ana.flavia@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 50_Acer_Intel i5_'),
(62, 'dev', 'Rafael', 'almeida dos reis', '', '', 63, 'rafael.reis@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 63_Lenovo_AMD Ryzen 5 5500U_'),
(63, 'mÃ­dia', 'Danilo', 'kauan da silva', '', '', 61, 'danilo.kauan@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 61_Acer_Intel i5-7300HQ_'),
(64, '', '', '', '', '', 0, 'DAYSE FERREIRA DE OLIVEIRA', 0, 0, 0, ''),
(65, '', '', '', '', '', 0, 'dayse.ferreira@webfoco.com', 0, 0, 0, ''),
(66, '', 'Tawan', 'rio de souza', '', '', 0, 'tawan.rio@webfoco.com', 0, 0, 0, ''),
(67, 'cs', 'Luana', 'ferreira de paula', '', '', 46, 'luana.ferreira@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 46_Acer_AMD Ryzen 5 3500U_'),
(68, 'redacao', 'Stephanie', 'victorino serafini', '', '', 65, 'stephanie.victorino@webfoco.com', 0, NULL, 0, '2023-02-27/ID: 65_Lenovo_Intel i5_'),
(69, 'cs', 'Rodrigo', 'luiz szilagy penteado', '', '', 47, 'rodrigo.szilagy@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 47_Lenovo_Intel i3_'),
(70, '', 'Julia', 'gandin ferreira', '', '', 0, 'julia.gandin@webfoco.com', 0, 0, 0, ''),
(71, 'cs', 'Dayani', 'rosa dos santos', '', '', 28, 'dayani.rosa@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 28_Dell_Intel i5-1135g7_,2023-02-24/ID: 21_Dell_Intel i5_'),
(72, '', 'Debora', 'vicente santos', '', '', 0, 'debora.vicente@webfoco.com', 0, 0, 0, ''),
(73, 'bi', 'Eduardo', 'gomes dos santos', '', '', 31, 'eduardo.gomes@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 31_Dell_Intel i7-6500U_'),
(74, '', 'Caroline', 'de oliveira labis barros', '', '', 0, 'caroline.labis@webfoco.com', 0, 0, 0, ''),
(75, 'marketing', 'Luana', 'dardes paulin', '', '', 10, 'luana.paulin@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 10_Samsung_Intel i3 5005U_4Gb DDR3'),
(76, '', 'Vanessa', 'geralda da silva', '', '', 0, 'vanessa.geralda@webfoco.com', 0, 0, 0, ''),
(77, '', 'Ulisses', 'marini de oliveira', '', '', 0, 'ulisses.marini@webfoco.com', 0, 0, 0, ''),
(78, '', 'Lucas', 'martins nunes', '', '', 0, 'lucas.nunes@webfoco.com', 0, 0, 0, ''),
(79, '', 'Barbara', 'zampoli de oliveira', '', '', 0, 'barbara.zampoli@webfoco.com', 0, 0, 0, ''),
(80, 'criacao', 'Dayse', 'Ferreira', '', '', 4, 'dayse.ferreira@webfoco.com', 0, NULL, 0, '2023-02-24/ID: 4_Lenovo_Intel i7 7500U_8Gb DDR4,2023-02-24/ID: 4_Lenovo_Intel i7 7500U_8Gb DDR4,2023-02-24/ID: 4_Lenovo_Intel i7 7500U_8Gb DDR4');

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
-- AUTO_INCREMENT de tabela `components`
--
ALTER TABLE `components`
  MODIFY `id_cpnt` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `computer`
--
ALTER TABLE `computer`
  MODIFY `id_pc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
