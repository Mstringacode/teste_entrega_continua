-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/06/2024 às 04:28
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aetherius`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cep` int(8) NOT NULL,
  `end_rua` varchar(60) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dispositivos`
--

INSERT INTO `dispositivos` (`id`, `nome`, `cep`, `end_rua`, `numero`) VALUES
(24, 'Casa01', 13972, 'Rua Vítor Meirelles', '100'),
(25, 'Casa02', 13972, 'Rua Vitor Meirelles', '110'),
(26, 'Casa03', 13972, 'Rua Vítor Meirelles', '120'),
(27, 'Casa03', 13972, 'Rua Vitor Meirelles', '130'),
(28, 'Casa04', 13972, 'Rua Vítor Meirelles', '140'),
(29, 'Casa05', 13972, 'Rua Vítor Meirelles', '150'),
(30, 'Casa06', 13972, 'Rua Vítor Meirelles', '150'),
(31, 'Casa07', 13972, 'Rua Vítor Meirelles', '160'),
(32, 'Casa08', 13972, 'Rua Vítor Meirelles', '180');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `value` varchar(60) NOT NULL,
  `data_geracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `valor_gas` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medidas`
--

INSERT INTO `medidas` (`id`, `value`, `data_geracao`, `valor_gas`) VALUES
(2072, '', '2024-06-10 02:25:37', 1503),
(2073, 'Gas Detectado', '2024-06-10 02:25:37', 0),
(2074, '', '2024-06-10 02:25:39', 1517),
(2075, 'Gas Detectado', '2024-06-10 02:25:39', 0),
(2076, '', '2024-06-10 02:25:41', 1519),
(2077, 'Gas Detectado', '2024-06-10 02:25:41', 0),
(2078, '', '2024-06-10 02:25:43', 1488),
(2079, '', '2024-06-10 02:25:45', 1489),
(2080, '', '2024-06-10 02:25:47', 1517),
(2081, 'Gas Detectado', '2024-06-10 02:25:47', 0),
(2082, '', '2024-06-10 02:25:49', 1519),
(2083, 'Gas Detectado', '2024-06-10 02:25:49', 0),
(2084, '', '2024-06-10 02:25:51', 1488),
(2085, '', '2024-06-10 02:25:53', 1511),
(2086, 'Gas Detectado', '2024-06-10 02:25:53', 0),
(2087, '', '2024-06-10 02:25:55', 1508),
(2088, 'Gas Detectado', '2024-06-10 02:25:55', 0),
(2089, '', '2024-06-10 02:25:57', 1513),
(2090, 'Gas Detectado', '2024-06-10 02:25:57', 0),
(2091, '', '2024-06-10 02:25:59', 1485),
(2092, '', '2024-06-10 02:26:01', 1510),
(2093, 'Gas Detectado', '2024-06-10 02:26:01', 0),
(2094, '', '2024-06-10 02:26:03', 1507),
(2095, 'Gas Detectado', '2024-06-10 02:26:03', 0),
(2096, '', '2024-06-10 02:26:05', 1527),
(2097, 'Gas Detectado', '2024-06-10 02:26:05', 0),
(2098, '', '2024-06-10 02:26:07', 1513),
(2099, 'Gas Detectado', '2024-06-10 02:26:07', 0),
(2100, '', '2024-06-10 02:26:09', 1506),
(2101, 'Gas Detectado', '2024-06-10 02:26:09', 0),
(2102, '', '2024-06-10 02:26:11', 1495),
(2103, '', '2024-06-10 02:26:13', 1520),
(2104, 'Gas Detectado', '2024-06-10 02:26:13', 0),
(2105, '', '2024-06-10 02:26:15', 1516),
(2106, 'Gas Detectado', '2024-06-10 02:26:15', 0),
(2107, '', '2024-06-10 02:26:17', 1520),
(2108, 'Gas Detectado', '2024-06-10 02:26:17', 0),
(2109, '', '2024-06-10 02:26:19', 1515),
(2110, 'Gas Detectado', '2024-06-10 02:26:19', 0),
(2111, '', '2024-06-10 02:26:21', 1506),
(2112, 'Gas Detectado', '2024-06-10 02:26:21', 0),
(2113, '', '2024-06-10 02:26:23', 1524),
(2114, 'Gas Detectado', '2024-06-10 02:26:23', 0),
(2115, '', '2024-06-10 02:26:25', 1507),
(2116, 'Gas Detectado', '2024-06-10 02:26:25', 0),
(2117, '', '2024-06-10 02:26:27', 1518),
(2118, 'Gas Detectado', '2024-06-10 02:26:27', 0),
(2119, '', '2024-06-10 02:26:29', 1524),
(2120, 'Gas Detectado', '2024-06-10 02:26:29', 0),
(2121, '', '2024-06-10 02:26:31', 1508),
(2122, 'Gas Detectado', '2024-06-10 02:26:31', 0),
(2123, '', '2024-06-10 02:26:33', 1505),
(2124, 'Gas Detectado', '2024-06-10 02:26:33', 0),
(2125, '', '2024-06-10 02:26:35', 1517),
(2126, 'Gas Detectado', '2024-06-10 02:26:35', 0),
(2127, '', '2024-06-10 02:26:37', 1532),
(2128, 'Gas Detectado', '2024-06-10 02:26:37', 0),
(2129, '', '2024-06-10 02:26:39', 1519),
(2130, 'Gas Detectado', '2024-06-10 02:26:39', 0),
(2131, '', '2024-06-10 02:26:41', 1532),
(2132, 'Gas Detectado', '2024-06-10 02:26:41', 0),
(2133, '', '2024-06-10 02:26:43', 1520),
(2134, 'Gas Detectado', '2024-06-10 02:26:43', 0),
(2135, '', '2024-06-10 02:26:45', 1494),
(2136, '', '2024-06-10 02:26:47', 1520),
(2137, 'Gas Detectado', '2024-06-10 02:26:47', 0),
(2138, '', '2024-06-10 02:26:49', 1498),
(2139, '', '2024-06-10 02:26:51', 1503),
(2140, 'Gas Detectado', '2024-06-10 02:26:51', 0),
(2141, '', '2024-06-10 02:26:53', 1518),
(2142, 'Gas Detectado', '2024-06-10 02:26:53', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `telefone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela que armazena dados dos usuários cadastrados.';

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(10, 'matheus', 'matheus1277@outlook.com', '$2y$10$.R2aYbSY9dYhko23xM1HwuBio74m8Bxps35QddvD8gSsVH2kV4GNy', '+55 19 9 9538 9906'),
(11, 'admin', 'admin', '$2y$10$Xn5tI/cY1RH7kWPQPWyBxukvaJK9jAshACOOH2mqtUGmNfnS.3z4C', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2143;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
