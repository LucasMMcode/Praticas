-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/08/2024 às 12:47
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
-- Banco de dados: `bdclinica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ambulatorios`
--

CREATE TABLE `ambulatorios` (
  `nroa` int(11) NOT NULL,
  `andar` decimal(3,0) NOT NULL,
  `capacidade` smallint(6) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ambulatorios`
--

INSERT INTO `ambulatorios` (`nroa`, `andar`, `capacidade`, `nome`) VALUES
(1, 1, 30, 'A'),
(2, 1, 50, 'B'),
(3, 2, 40, 'C'),
(4, 2, 25, 'D'),
(5, 2, 55, 'E');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `codm` int(11) NOT NULL,
  `codp` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`codm`, `codp`, `data`, `hora`) VALUES
(1, 1, '2006-06-12', '14:00:00'),
(1, 4, '2006-06-13', '10:00:00'),
(2, 1, '2006-06-13', '09:00:00'),
(2, 2, '2006-06-13', '11:00:00'),
(2, 3, '2006-06-14', '14:00:00'),
(2, 4, '2006-06-14', '17:00:00'),
(3, 1, '2006-06-19', '18:00:00'),
(3, 3, '2006-06-12', '10:00:00'),
(3, 4, '2006-06-19', '13:00:00'),
(4, 4, '2006-06-20', '13:00:00'),
(4, 4, '2006-06-22', '19:30:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `codf` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `idade` smallint(6) DEFAULT NULL,
  `CPF` decimal(11,0) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `salario` decimal(10,0) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `nroa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`codf`, `nome`, `idade`, `CPF`, `cidade`, `salario`, `cargo`, `nroa`) VALUES
(1, 'Rita', 32, 20000100000, 'Sao Jose', 1200, 'cargo', 1),
(2, 'Maria', 55, 30000110000, 'Palhoca', 1220, 'cargo', 1),
(3, 'Caio', 45, 41000100000, 'Florianopolis', 1100, 'cargo', 1),
(4, 'Carlos', 44, 51000110000, 'Florianopolis', 1200, 'cargo', 1),
(5, 'Paula', 33, 61000111000, 'Florianopolis', 2500, 'cargo', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

CREATE TABLE `medicos` (
  `codm` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `idade` smallint(6) NOT NULL,
  `especialidade` char(20) DEFAULT NULL,
  `CPF` decimal(11,0) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `nroa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`codm`, `nome`, `idade`, `especialidade`, `CPF`, `cidade`, `nroa`) VALUES
(1, 'Joao', 40, 'ortopedia', 10000100000, 'Florianopolis', 1),
(2, 'Maria', 42, 'traumatologia', 10000110000, 'Blumenau', 2),
(3, 'Pedro', 51, 'pediatra', 11000100000, 'São José', 2),
(4, 'Carlos', 28, 'ortopedia', 11000110000, 'Joinville', 3),
(5, 'Marcia', 33, 'neurologia', 11000111000, 'Biguacu', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `codp` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `idade` smallint(6) NOT NULL,
  `cidade` char(30) NOT NULL,
  `CPF` decimal(11,0) NOT NULL,
  `doenca` varchar(40) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`codp`, `nome`, `idade`, `cidade`, `CPF`, `doenca`, `email`) VALUES
(1, 'Ana', 20, 'Florianopolis', 20000200000, 'gripe', 'aninha@gmail.com'),
(2, 'Paulo', 24, 'Palhoca', 20000220000, 'fratura', 'paulinho@gmail.com'),
(3, 'Lucia', 30, 'Biguacu', 22000200000, 'tendinite', 'lucinha@gmail.com'),
(4, 'Carlos', 28, 'Joinville', 11000110000, 'sarampo', 'carlinhos@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ambulatorios`
--
ALTER TABLE `ambulatorios`
  ADD PRIMARY KEY (`nroa`);

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`codm`,`codp`,`data`,`hora`),
  ADD KEY `codp` (`codp`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`codf`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`codm`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD KEY `nroa` (`nroa`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`codp`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`codm`) REFERENCES `medicos` (`codm`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`codp`) REFERENCES `pacientes` (`codp`);

--
-- Restrições para tabelas `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`nroa`) REFERENCES `ambulatorios` (`nroa`),
  ADD CONSTRAINT `medicos_ibfk_2` FOREIGN KEY (`nroa`) REFERENCES `ambulatorios` (`nroa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
