-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/11/2024 às 04:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`) VALUES
(1, 'Alimentação'),
(4, 'Carro'),
(6, 'luz');

-- --------------------------------------------------------

--
-- Estrutura para tabela `meses`
--

CREATE TABLE `meses` (
  `id_meses` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `meses`
--

INSERT INTO `meses` (`id_meses`, `nome`, `ano`) VALUES
(1, 'janeiro', 0),
(2, 'Janeiro', 2016),
(3, 'Janeiro', 2016),
(4, 'Janeiro', 2024),
(5, 'Maio', 2016),
(6, 'Maio', 2024),
(7, 'Janeiro', 2020),
(8, 'Junho', 2016);

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id_movimentacoes` int(11) NOT NULL,
  `movement_date` date NOT NULL,
  `movement_type` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id_movimentacoes`, `movement_date`, `movement_type`, `description`, `amount`, `category_id`, `month_id`) VALUES
(1, '0000-00-00', 'Entrada', 'dsadas', 25.00, 1, 1),
(5, '2024-11-15', 'Saída', 'cattt', 55.00, 1, 1),
(6, '2024-11-14', 'Saída', 'estevão', 55.00, 4, 1),
(7, '2024-11-21', 'Saída', 'cattt', 20.00, 4, 4),
(8, '2024-11-10', 'Entrada', 'cattt', 10000.00, 1, 7),
(9, '2024-11-14', 'Entrada', 'cattt', 156.16, 4, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id_meses`);

--
-- Índices de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id_movimentacoes`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `month_id` (`month_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `meses`
--
ALTER TABLE `meses`
  MODIFY `id_meses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id_movimentacoes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD CONSTRAINT `movimentacoes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `movimentacoes_ibfk_2` FOREIGN KEY (`month_id`) REFERENCES `meses` (`id_meses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
