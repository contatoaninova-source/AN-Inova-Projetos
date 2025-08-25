-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/07/2025 às 18:48
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
-- Banco de dados: `casaderepouso`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admins`
--

INSERT INTO `admins` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Antony', 'antonysilvama874@gmail.com', 'Antony123@');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrossel`
--

CREATE TABLE `carrossel` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `legenda` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrossel`
--

INSERT INTO `carrossel` (`id`, `imagem`, `legenda`) VALUES
(21, '686d91852067c-carroselTest.jpg', 'legende teste de crud'),
(22, '686d919898740-carroselTest1.png', 'legende teste de crud');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'area_externa'),
(2, 'area_interna'),
(3, 'quartos_toaletes'),
(4, 'atividades');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id`, `titulo`, `link`, `criado_em`) VALUES
(1, ' SR.TESTE', 'https://www.youtube.com/watch?v=DinaJtOdLgM&list=RDGMEM2VCIgaiSqOfVzBAjPJm-agVMDinaJtOdLgM&start_radio=1', '2025-07-03 00:31:01'),
(2, 'SR.Teste-DENOVO', 'https://www.youtube.com/watch?v=DinaJtOdLgM&list=RDGMEM2VCIgaiSqOfVzBAjPJm-agVMDinaJtOdLgM&start_radio=1', '2025-07-03 00:31:47'),
(4, 'Sr. Teste ultimo', 'https://www.youtube.com/watch?v=i3qUonr3d9U', '2025-07-08 21:57:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `legenda` varchar(255) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `galeria`
--

INSERT INTO `galeria` (`id`, `titulo`, `caminho`, `legenda`, `categoria_id`, `criado_em`) VALUES
(1, 'teste de imagem', 'externo.jpg', 'Imagem da área externa', 1, '2025-06-27 11:30:53'),
(2, 'quarto 1', 'quarto1.jpg', 'Primeiro quarto', 3, '2025-06-27 11:30:53'),
(3, 'teste denovo', 'atividade1.jpg', 'Atividade em grupo', 4, '2025-06-27 11:30:53'),
(4, 'teste dnv', 'quarto4.jpg', 'Outro quarto', 3, '2025-06-27 11:30:53'),
(5, 'teste', 'atividade3.jpg', 'Mais uma atividade', 4, '2025-06-27 11:30:53'),
(6, 'atividade', 'atividade3.jpg', 'Repetição de atividade', 4, '2025-06-27 11:30:53'),
(7, 'teste', 'atividade3.jpg', 'Atividade duplicada', 4, '2025-06-27 11:30:53'),
(8, 'teste dnv', 'externo.jpg', 'Imagem externa', 1, '2025-06-27 11:30:53'),
(9, 'area externa', 'externo.jpg', 'Jardim da casa', 1, '2025-06-27 11:30:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `carrossel`
--
ALTER TABLE `carrossel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `carrossel`
--
ALTER TABLE `carrossel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
