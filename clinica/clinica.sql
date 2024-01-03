-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2018 às 01:10
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_exame`
--

CREATE TABLE `agenda_exame` (
  `id` int(11) NOT NULL,
  `exame` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda_exame`
--

INSERT INTO `agenda_exame` (`id`, `exame`, `start`, `end`, `cliente`) VALUES
(1, 'COLESTEROL TOTAL', '2018-05-15 07:30:00', '2018-05-15 08:00:00', 'gordo'),
(2, 'COLESTEROL TOTAL', '2018-05-23 06:00:00', '2018-05-23 06:30:00', 'gordo'),
(3, 'BIOPSIA SIMPLES', '2018-05-23 07:00:00', '2018-05-23 07:30:00', 'Matheus'),
(4, 'BIOPSIA SIMPLES', '2018-05-24 06:30:00', '2018-05-24 07:00:00', 'gordo'),
(5, 'COLESTEROL TOTAL', '2018-05-22 06:30:00', '2018-05-22 07:00:00', 'gordo'),
(6, 'COLESTEROL TOTAL', '2018-05-29 06:00:00', '2018-05-29 06:30:00', 'Matheus'),
(7, 'BIOPSIA SIMPLES', '2018-05-29 07:00:00', '2018-05-29 07:30:00', 'Matheus'),
(8, 'abcde', '2018-05-28 06:00:00', '2018-05-28 06:30:00', 'Matheus'),
(9, 'BIOPSIA SIMPLES', '2018-05-30 06:00:00', '2018-05-30 06:30:00', 'Matheus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa_c`
--

CREATE TABLE `caixa_c` (
  `id` int(11) NOT NULL,
  `saldo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caixa_c`
--

INSERT INTO `caixa_c` (`id`, `saldo`) VALUES
(16, '90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nascimento` varchar(200) NOT NULL,
  `genero` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `n` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `sus` varchar(200) NOT NULL,
  `obs` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `nascimento`, `genero`, `cpf`, `rg`, `estado`, `cidade`, `logradouro`, `bairro`, `n`, `telefone`, `sus`, `obs`, `cep`) VALUES
(25, 'teste', '12/12/1212', 'Masculino', '121.212.121-21', '121.212.121-21', 'CE', 'Russas', 'Travessa Carlos Pontes, 247', 'FÃ¡tima', '1212', '(12) 1 2121-2121', '1212', '', '62900-000'),
(26, 'teste', '12/12/1212', 'Masculino', '121.212.121-21', '121.212.121-21', 'CE', 'Russas', 'Travessa Carlos Pontes, 247', 'FÃ¡tima', '1212', '(12) 1 2121-2121', '1212', '', '62900-000'),
(27, 'teste', '12/12/1212', 'Masculino', '121.212.121-21', '121.212.121-21', 'CE', 'Russas', 'Travessa Carlos Pontes, 247', 'FÃ¡tima', '1212', '(12) 1 2121-2121', '1212', '', '62900-000'),
(28, 'teste', '12/12/1212', 'Masculino', '121.212.121-21', '121.212.121-21', 'CE', 'Russas', 'Travessa Carlos Pontes, 247', 'FÃ¡tima', '1212', '(12) 1 2121-2121', '1212', '', '62900-000'),
(29, 'teste', '12/12/1212', 'Masculino', '121.212.121-21', '121.212.121-21', 'CE', 'Russas', 'Travessa Carlos Pontes, 247', 'FÃ¡tima', '1212', '(12) 1 2121-2121', '1212', '', '62900-000'),
(30, 'teste', '12/12/1212', 'Masculino', '121.212.121-21', '121.212.121-21', 'CE', 'Russas', 'Travessa Carlos Pontes, 247', 'FÃ¡tima', '1212', '(12) 1 2121-2121', '1212', '', '62900-000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `preco` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id`, `tipo`, `preco`) VALUES
(2, 'Fonoaudiologia', '65'),
(3, 'Nutricionista', '65'),
(4, 'Psicologia', '65'),
(5, 'Cardiologia', '70'),
(6, 'Dermatologia', '70'),
(7, 'Endocrinologia', '70'),
(8, 'Ginecologia', '70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `descricao`, `valor`, `vencimento`) VALUES
(56, 'Limpeza', '100', '1999-12-12'),
(57, 'Limpeza', '120', '2019-12-12'),
(58, 'Pedro', '11000', '2001-12-12'),
(59, 'Atendente', '13123', '2020-12-12'),
(60, 'Limpeza', '100', '21212-12-12'),
(61, 'Limpeza', '100', '1212-12-12'),
(62, 'Limpeza', '1000', '12121-12-12'),
(63, 'Limpeza', '100', '1212-12-12'),
(64, 'Limpeza', '100', '1212-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `consulta` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `consulta`, `start`, `end`, `cliente`) VALUES
(21, 'Nome consulta 2', '2018-03-01 07:30:00', '2018-03-01 08:30:00', 'Nome cliente 2'),
(22, 'Nome consulta 1', '2018-03-01 09:00:00', '2018-03-01 09:30:00', 'Nome cliente 1'),
(23, 'Nome consulta 1', '2018-03-02 10:00:00', '2018-03-02 10:30:00', 'Nome cliente 1'),
(24, 'Nome consulta 1', '2018-03-02 11:30:00', '2018-03-02 12:00:00', 'Nome cliente 1'),
(25, 'Nome consulta 1', '2018-03-02 12:30:00', '2018-03-02 13:00:00', 'Nome cliente 1'),
(27, 'Dermatologia', '2018-05-09 06:30:00', '2018-05-09 07:00:00', 'gordo'),
(28, 'Clínico Geral', '2018-05-09 08:00:00', '2018-05-09 08:30:00', 'Matheus'),
(29, 'Nutricionista', '2018-05-23 06:30:00', '2018-05-23 07:00:00', 'Matheus'),
(30, 'Cardiologia', '2018-05-23 07:30:00', '2018-05-23 08:00:00', 'gordo'),
(31, 'Psicologia', '2018-05-22 07:00:00', '2018-05-22 07:30:00', 'gordo'),
(32, 'Endocrinologia', '2018-05-24 07:00:00', '2018-05-24 07:30:00', 'Matheus'),
(33, 'Nutricionista', '2018-05-30 06:00:00', '2018-05-30 06:30:00', 'Matheus'),
(34, 'Psicologia', '2018-05-30 06:30:00', '2018-05-30 07:00:00', 'Matheus'),
(35, 'Fonoaudiologia', '2018-05-28 06:00:00', '2018-05-28 06:30:00', 'Matheus'),
(36, 'Fonoaudiologia', '2018-05-30 07:30:00', '2018-05-30 08:00:00', 'Matheus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `preco` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`id`, `tipo`, `preco`) VALUES
(1, 'BIOPSIA SIMPLES', '37'),
(2, 'COLESTEROL TOTAL', '13'),
(4, 'teste', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nascimento` varchar(200) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `salario` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `acesso` int(11) NOT NULL,
  `caixa` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `nascimento`, `genero`, `cpf`, `rg`, `cep`, `cidade`, `estado`, `telefone`, `salario`, `area`, `usuario`, `senha`, `acesso`, `caixa`) VALUES
(18, 'Medico', '12/31/2321', 'Masculino', '232.131.232-13', '123.213.123-21', '12321-312', '21321312', '12', '(12) 3 1231-2321', '1000', 'MÃ©dico', 'medico123', 'medico', 1, 0),
(17, 'Atendente', '23/13/2131', 'Masculino', '123.131.231-23', '312.312.313-13', '13123-123', '123123', '13', '(31) 2 3123-1231', '13123', 'Atendente', 'atendente', '1234', 2, 0),
(16, 'Matheus', '11/11/1111', 'Masculino', '111.111.111-11', '111.111.111-11', '11111-111', 'Russas', 'CE', '(11) 1 1111-1111', '1000', 'Gerente', 'admin123', 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastos`
--

CREATE TABLE `gastos` (
  `id` int(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `gasto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gastos`
--

INSERT INTO `gastos` (`id`, `tipo`, `area`, `gasto`) VALUES
(5, 'Produtos de limpeza', 'Bem-estar', 500),
(6, 'Produtos', 'Bem-estar', 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `cliente`, `descricao`, `valor`, `vencimento`) VALUES
(1, 'Matheus', 'BIOPSIA', '90', '1212-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_exame`
--
ALTER TABLE `agenda_exame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caixa_c`
--
ALTER TABLE `caixa_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda_exame`
--
ALTER TABLE `agenda_exame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `caixa_c`
--
ALTER TABLE `caixa_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `exame`
--
ALTER TABLE `exame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
