-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariaDB
-- Tempo de geração: 08-Jan-2023 às 03:21
-- Versão do servidor: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testeCare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dest_xml`
--

CREATE TABLE `dest_xml` (
  `id` int(10) NOT NULL,
  `CNPJ` text NOT NULL,
  `xNome` text NOT NULL,
  `indIEDest` text NOT NULL,
  `IE` text NOT NULL,
  `upload_xml_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderDest_xml`
--

CREATE TABLE `enderDest_xml` (
  `id` int(11) NOT NULL,
  `xLgr` text NOT NULL,
  `nro` text NOT NULL,
  `xBairro` text NOT NULL,
  `cMun` text NOT NULL,
  `xMun` text NOT NULL,
  `UF` text NOT NULL,
  `CEP` text NOT NULL,
  `cPais` text NOT NULL,
  `fone` text NOT NULL,
  `dest_xml_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `upload_xml`
--

CREATE TABLE `upload_xml` (
  `id` int(10) NOT NULL,
  `chNFe` text NOT NULL,
  `dhRecbto` text NOT NULL,
  `vNF` text NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dest_xml`
--
ALTER TABLE `dest_xml`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upload_xml_id` (`upload_xml_id`);

--
-- Índices para tabela `enderDest_xml`
--
ALTER TABLE `enderDest_xml`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dest_xml_id` (`dest_xml_id`);

--
-- Índices para tabela `upload_xml`
--
ALTER TABLE `upload_xml`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dest_xml`
--
ALTER TABLE `dest_xml`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de tabela `enderDest_xml`
--
ALTER TABLE `enderDest_xml`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de tabela `upload_xml`
--
ALTER TABLE `upload_xml`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dest_xml`
--
ALTER TABLE `dest_xml`
  ADD CONSTRAINT `dest_xml_ibfk_1` FOREIGN KEY (`upload_xml_id`) REFERENCES `upload_xml` (`id`);

--
-- Limitadores para a tabela `enderDest_xml`
--
ALTER TABLE `enderDest_xml`
  ADD CONSTRAINT `enderdest_xml_ibfk_1` FOREIGN KEY (`dest_xml_id`) REFERENCES `dest_xml` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
