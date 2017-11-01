-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2017 às 07:25
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `idchamado` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `setorcall` varchar(25) NOT NULL,
  `solicitacao` varchar(30) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `problema` varchar(40) NOT NULL,
  `numaquina` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `data_resolvido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`idchamado`, `idusuario`, `data`, `setorcall`, `solicitacao`, `descricao`, `problema`, `numaquina`, `status`, `data_resolvido`) VALUES
(35, 17, '2017-08-01 00:00:00', 'administrativo', 'master', '', 'teclado', 'AD-0000/0', 'Resolvido', '2017-08-20 21:19:22'),
(40, 41, '2017-08-08 00:00:00', 'operacao', 'Douglas Teixeira de Jesus Soar', 'estou com problema de lentidao na bagaÃ§a', 'outro', 'US-4678/5', 'Resolvido', '2017-08-24 02:16:52'),
(41, 17, '2017-08-11 04:03:00', 'administrativo', 'master', 'queimou a placa de video', 'outro', 'AD-2789/4', 'Resolvido', '2017-08-20 21:20:22'),
(42, 51, '2017-08-11 04:16:23', 'auxiliar servicos gerais', 'gabriela', 'o teclado esta faltando algumas peÃ§as', 'teclado', 'KK-2416/8', 'Resolvido', '2017-08-11 04:17:58'),
(43, 46, '2017-08-18 14:52:57', 'contabil', 'carlos', 'meu monitor nao liga', 'monitor', 'NP-4754/6', 'Resolvido', '2017-08-20 20:56:29'),
(44, 46, '2017-08-20 20:56:52', 'contabil', 'carlos', 'acho que quimou', 'computador', 'NP-4754/6', 'Resolvido', '2017-08-20 21:04:24'),
(45, 46, '2017-08-20 21:04:52', 'contabil', 'carlos', 'estou sem rede', 'internet', 'NP-4754/6', 'Resolvido', '2017-08-20 21:09:17'),
(46, 17, '2017-08-20 21:20:10', 'administrativo', 'master', 'nÃ£o sei', 'outro', 'AD-2789/4', 'Resolvido', '2017-08-20 21:22:01'),
(47, 17, '2017-08-20 21:21:40', 'administrativo', 'master', '', 'computador', 'AD-4758/6', 'Resolvido', '2017-08-20 21:24:10'),
(48, 17, '2017-08-20 21:25:40', 'administrativo', 'master', '', 'teclado', 'KK-2416/8', 'Resolvido', '2017-08-20 21:31:51'),
(49, 17, '2017-08-20 21:40:35', 'administrativo', 'master', '', 'internet', 'NP-4754/6', 'Resolvido', '2017-08-20 21:43:57'),
(50, 17, '2017-08-20 21:40:59', 'administrativo', 'master', '', 'teclado', 'NP-030417', 'Resolvido', '2017-08-20 21:51:50'),
(51, 17, '2017-08-20 21:52:00', 'administrativo', 'master', '', 'teclado', 'NP-030417', 'Resolvido', '2017-08-20 21:52:39'),
(52, 17, '2017-08-20 21:52:33', 'administrativo', 'master', '', 'impressora', 'AD-4758/6', 'Resolvido', '2017-08-20 22:36:16'),
(53, 17, '2017-08-20 21:56:15', 'administrativo', 'master', '', 'computador', 'NP-4754/6', 'Resolvido', '2017-08-20 23:04:49'),
(54, 17, '2017-08-20 22:35:32', 'administrativo', 'master', '', 'outro', 'NP-030417', 'Resolvido', '2017-08-20 22:38:00'),
(55, 17, '2017-08-21 01:38:59', 'administrativo', 'master', '', 'mouse', 'AD-3347/5', 'Resolvido', '2017-08-24 00:19:38'),
(56, 46, '2017-08-21 02:04:41', 'contabil', 'carlos', '', 'mouse', 'PQ-0452/3', 'Resolvido', '2017-08-21 02:31:27'),
(57, 41, '2017-08-24 02:18:44', 'operacao', 'Douglas Teixeira de Jesus Soar', 'meu monitor estÃ¡ com defeito', 'monitor', 'OP-4712/3', 'Pendente', '0000-00-00 00:00:00'),
(58, 42, '2017-08-24 02:20:45', 'admin_no_privilege', 'amanda', '', 'internet', 'AD-6498/5', 'Pendente', '0000-00-00 00:00:00'),
(59, 45, '2017-08-24 02:22:03', 'seguranca do trabalho', 'davi', 'acabou a tinta', 'impressora', 'ST-0301/0', 'Pendente', '0000-00-00 00:00:00'),
(60, 47, '2017-08-24 02:23:40', 'seguranca do trabalho', 'luis', 'algumas teclas nÃ£o funcionam', 'teclado', 'ST-7649/5', 'Pendente', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirma`
--

CREATE TABLE `confirma` (
  `idchamado2` int(11) NOT NULL,
  `idconfirma` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `confirma`
--

INSERT INTO `confirma` (`idchamado2`, `idconfirma`, `idusuario`) VALUES
(60, 17, 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `setor` varchar(40) NOT NULL,
  `datacadastro` datetime NOT NULL,
  `dados_status` varchar(10) NOT NULL,
  `data_exclusao` datetime NOT NULL,
  `primeira_vez` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `login`, `senha`, `setor`, `datacadastro`, `dados_status`, `data_exclusao`, `primeira_vez`) VALUES
(17, 'master', '', 'master', '202cb962ac59075b964b07152d234b70', 'administrativo', '2017-07-17 01:46:06', 'ativo', '0000-00-00 00:00:00', 0),
(18, 'andre', 'andre@hotmail.com', 'andre', '202cb962ac59075b964b07152d234b70', 'helpdesk', '2017-07-17 01:47:24', 'ativo', '0000-00-00 00:00:00', 0),
(30, 'claudio', 'claudio@gmail.com', 'claudio', '202cb962ac59075b964b07152d234b70', 'administrativo', '2017-07-17 16:32:30', 'ativo', '0000-00-00 00:00:00', 0),
(34, 'douglas', 'dowglasa7x@gmail.com', 'douglas_mp', '202cb962ac59075b964b07152d234b70', 'RH', '2017-07-24 00:48:09', 'ativo', '0000-00-00 00:00:00', 0),
(41, 'Douglas Teixeira de Jesus Soares', 'douglas@gmail.com', 'doda', '202cb962ac59075b964b07152d234b70', 'operacao', '2017-08-01 18:30:16', 'ativo', '0000-00-00 00:00:00', 0),
(42, 'amanda', 'amanda@gmail.com', 'amanda', '202cb962ac59075b964b07152d234b70', 'admin_no_privilege', '2017-08-01 20:36:09', 'ativo', '0000-00-00 00:00:00', 0),
(45, 'davi', 'david@gmail.com', 'davi', '202cb962ac59075b964b07152d234b70', 'seguranca do trabalho', '2017-08-08 14:37:05', 'ativo', '0000-00-00 00:00:00', 0),
(46, 'carlos', 'carlos@gmail.com', 'carlos', '202cb962ac59075b964b07152d234b70', 'contabil', '2017-08-08 14:47:44', 'ativo', '0000-00-00 00:00:00', 0),
(47, 'luis', 'luis@gmail.com', 'luis', '202cb962ac59075b964b07152d234b70', 'seguranca do trabalho', '2017-08-08 14:48:09', 'ativo', '0000-00-00 00:00:00', 0),
(48, 'gerson', 'gerson@gmail.com', 'gerson@gmail.com', '202cb962ac59075b964b07152d234b70', 'administrativo', '2017-08-08 14:48:33', 'desativado', '2017-08-08 14:49:14', 0),
(49, 'guilherme', 'guilherme@gmail.com', 'guilherme', '202cb962ac59075b964b07152d234b70', 'RH', '2017-08-08 14:48:57', 'desativado', '2017-08-08 14:49:20', 0),
(50, 'alessandro', 'alessandro@gmail.com', 'alessandro', '250cf8b51c773f3f8dc8b4be867a9a02', 'seguranca do trabalho', '2017-08-11 02:05:22', 'ativo', '0000-00-00 00:00:00', 0),
(51, 'gabriela', 'gabriela@gmail.com', 'gabriela', '202cb962ac59075b964b07152d234b70', 'auxiliar servicos gerais', '2017-08-11 02:54:09', 'ativo', '0000-00-00 00:00:00', 0),
(52, 'flavio silva', 'flavio@gmail.com', 'flavio', '202cb962ac59075b964b07152d234b70', 'auxiliar servicos gerais', '2017-08-11 03:54:04', 'ativo', '0000-00-00 00:00:00', 0),
(53, 'juan', 'juan@gmail.com', 'juan', '250cf8b51c773f3f8dc8b4be867a9a02', 'admin_no_privilege', '2017-08-20 21:13:22', 'ativo', '0000-00-00 00:00:00', 0),
(54, 'jorge', 'jorge@gmail.com', 'jorge', '202cb962ac59075b964b07152d234b70', 'seguranca do trabalho', '2017-08-20 21:15:05', 'ativo', '0000-00-00 00:00:00', 1),
(55, 'pablo', 'pablo@gmail.com', 'pablo', '202cb962ac59075b964b07152d234b70', 'contabil', '2017-08-20 21:16:46', 'ativo', '0000-00-00 00:00:00', 1),
(56, 'patricia', 'pati@gmail.com', 'patricia', '202cb962ac59075b964b07152d234b70', 'operacao', '2017-08-20 21:18:05', 'ativo', '0000-00-00 00:00:00', 1),
(58, 'pedro', 'pedro@gmail.com', 'pedro', '250cf8b51c773f3f8dc8b4be867a9a02', 'operacao', '2017-08-21 03:20:40', 'ativo', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`idchamado`);

--
-- Indexes for table `confirma`
--
ALTER TABLE `confirma`
  ADD PRIMARY KEY (`idconfirma`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamados`
--
ALTER TABLE `chamados`
  MODIFY `idchamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `confirma`
--
ALTER TABLE `confirma`
  MODIFY `idconfirma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
