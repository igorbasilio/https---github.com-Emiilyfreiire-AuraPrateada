-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/10/2024 às 06:46
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `auraPrateada`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'emily', 'emily@hotmail.com', '1234', '981212017'),
(2, 'gabi', 'gabi@hotmail.com', '1234', '981817575'),
(3, 'Vanessa', 'vanessa@gmail.com', '1234', '981213456'),
(4, 'Nelma Freire Rocha', 'nelmafreire99@gmail.com', '$2y$10$O0uPJGEMjbnwDmHS9AlffOCYWEW0Ow4yI7gcLeJRRTVIw//P.NZiO', '61981917574'),
(5, 'cadu', 'cadu@hotmail.com', '$2y$10$HCkvhs2z7sQCyRLWww1nueL0cf0x8U6Kpu0Yo7Ksu/ynSatMtJaMG', '(61)981917574'),
(6, 'Nelma Freire Rocha', 'nelmafreire99@gmail.com', '3367', '61981917574'),
(7, 'nicole', 'nicole@gmail.com', '1234', '981918787'),
(8, 'igor', 'igor@gmail.com', '1234', '(61)981917879'),
(9, 'carlos@gmail.com', 'nelmafreire99@gmail.com', '$2y$10$sEolO3orfeNQYVxN7OTREutQAw3H2tgA.znF7XfTdOrgqIn6v1y8y', '61981917574'),
(10, 'emily', 'emiily@hotmail.com', '123', '981212017'),
(11, 'Nelma Freire Rocha', 'nelmafreire@gmail.com', '123', '61981917574'),
(12, 'Nelma Freire Rocha', 'nelmafreire@gmail.com', '$2y$10$CIO2LvYM7fHlGcjrs872mO.xZ1JXs8/Ch71b.DEw2d3i2GjLKkTXi', '61981917574'),
(13, 'pebinha', 'pebinha@hotmail.com', '$2y$10$5XxFVptRVh/uYmqIuFqNYOyzLGpHAqysD.WuWS7jE3/MXUjGgMMLK', '(61)981917675'),
(14, 'laura', 'laura@gmail.com', '$2y$10$b10jAenekVrAHVA1b.ho4.0dT4IYvivlmz1YC1Zm11A4F8IhWVkO2', '(61)981976787'),
(15, 'laura', 'laura@gmail.com', '123', '(61)981976787'),
(16, 'anderson', 'anderson@gmail.com', '1234', '(61)987654567'),
(17, 'adryan', 'adryan@hotmail.com', 'nicole', '(61)987675432');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Anéis'),
(2, 'Pulseiras'),
(3, 'Colares'),
(4, 'Correntes'),
(5, 'Brincos'),
(6, 'Tornozeleiras'),
(7, 'Braceletes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `metodo_pagamento` varchar(50) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `data_pagamento` datetime DEFAULT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quatidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Acionadores `pedido`
--
DELIMITER $$
CREATE TRIGGER `Atualizacao_de_estoque` AFTER INSERT ON `pedido` FOR EACH ROW BEGIN
    -- Atualiza o estoque do produto após adicionar um novo item.
    UPDATE produto
    SET estoque = estoque - NEW.id_produto
    WHERE id_produto = NEW.id_produto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cadastro` (`id_usuario`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cadastro` (`id_usuario`);

--
-- Restrições para tabelas `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cadastro` (`id_usuario`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
