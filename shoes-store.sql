-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/06/2023 às 02:53
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `shoes-store`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `COD_PROD` int(11) NOT NULL,
  `MODELO_PROD` varchar(45) NOT NULL,
  `VALOR_PROD` decimal(10,0) NOT NULL,
  `TIPO_PROD` varchar(45) NOT NULL,
  `FOTO_PROD` varchar(1000) NOT NULL,
  `FILA_COMPRA_PROD` char(1) NOT NULL DEFAULT 'N',
  `MARCA_PROD` varchar(45) DEFAULT NULL,
  `VENDAS_COD_VEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`COD_PROD`, `MODELO_PROD`, `VALOR_PROD`, `TIPO_PROD`, `FOTO_PROD`, `FILA_COMPRA_PROD`, `MARCA_PROD`, `VENDAS_COD_VEN`) VALUES
(1, 'Wave Titan 2', 400, 'tenis', '', 'V', 'Mizuno', 1),
(2, 'Stratus', 400, 'bota', '', 'N', 'Oakley', NULL),
(3, 'Gel Equation 11', 237, 'tenis', 'img/Gel_Equation11.jpg', 'N', 'Asics', NULL),
(4, 'Cometa', 200, 'tenis', 'img/cometa.jpg', 'V', 'Mizuno', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `COD_USER` int(11) NOT NULL,
  `FUNCAO` varchar(20) NOT NULL,
  `NOME_USER` varchar(45) NOT NULL,
  `LOGIN_USER` varchar(45) NOT NULL,
  `SENHA_USER` varchar(45) NOT NULL,
  `STATUS_USER` varchar(7) DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`COD_USER`, `FUNCAO`, `NOME_USER`, `LOGIN_USER`, `SENHA_USER`, `STATUS_USER`) VALUES
(1, 'administrador', 'Lobster', 'admin', '1', 'ativo'),
(3, 'vendedor', 'Carlos nogueira ', 'carlin', '123', 'ativo'),
(4, 'estoquista', 'Arrombadaobster', 'lobsterjunior', '123', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `COD_VEN` int(11) NOT NULL,
  `DATA_VEN` varchar(45) NOT NULL,
  `FUNCIONARIOS_COD_FUN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`COD_VEN`, `DATA_VEN`, `FUNCIONARIOS_COD_FUN`) VALUES
(1, '30/06/2023', 0),
(2, '30/06/2023', 0),
(3, '30/06/2023', 1),
(4, '30/06/2023', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`COD_PROD`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`COD_USER`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`COD_VEN`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `COD_PROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `COD_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `COD_VEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
