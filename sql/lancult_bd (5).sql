-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jun-2022 às 04:13
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lancult_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `discursao`
--

CREATE TABLE `discursao` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(100) NOT NULL,
  `DESCRICAO` varchar(500) NOT NULL,
  `DATA` datetime DEFAULT current_timestamp(),
  `IMAGEM` varchar(255) DEFAULT NULL,
  `ATIVO` enum('ATIVO','INATIVO') DEFAULT 'ATIVO',
  `USUARIOS_ID` int(11) NOT NULL,
  `IDIOMAS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `discursao`
--

INSERT INTO `discursao` (`ID`, `TITULO`, `DESCRICAO`, `DATA`, `IMAGEM`, `ATIVO`, `USUARIOS_ID`, `IDIOMAS_ID`) VALUES
(128, 'Ricardo', '', '2022-05-31 19:05:31', NULL, 'ATIVO', 46, 1),
(129, 'Julia', '', '2022-05-31 19:05:26', NULL, 'ATIVO', 45, 2),
(130, 'Ana Fernanda', '', '2022-05-31 19:05:57', NULL, 'ATIVO', 48, 3),
(131, 'José', '', '2022-05-31 19:05:15', NULL, 'ATIVO', 49, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `idiomas`
--

CREATE TABLE `idiomas` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `idiomas`
--

INSERT INTO `idiomas` (`ID`, `NOME`) VALUES
(1, 'Português'),
(2, 'Inglês'),
(3, 'Espanhol'),
(4, 'Francês');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE `paises` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paises`
--

INSERT INTO `paises` (`ID`, `NOME`) VALUES
(1, 'Brasil'),
(2, 'Reino Unido'),
(3, 'Estados Unidos'),
(4, 'Espanha'),
(5, 'França'),
(6, 'Outros países');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(500) NOT NULL,
  `DATA` datetime DEFAULT current_timestamp(),
  `PONTUACAO` tinyint(4) NOT NULL,
  `DISCURSAO_ID` int(11) NOT NULL,
  `ATIVO` enum('ATIVO','INATIVO') DEFAULT 'ATIVO',
  `USUARIOS_ID` int(11) NOT NULL,
  `votos` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`ID`, `DESCRICAO`, `DATA`, `PONTUACAO`, `DISCURSAO_ID`, `USUARIOS_ID`, `votos`) VALUES
(49, 'Ricardo', '2022-05-31 19:05:42', 3, 128, 46, NULL),
(50, 'Julia', '2022-05-31 19:05:14', 5, 128, 45, NULL),
(51, 'Ana Fernanda', '2022-05-31 19:05:07', 3, 130, 48, NULL),
(53, 'José', '2022-05-31 19:05:25', 6, 128, 49, NULL),
(54, 'iii', '2022-06-02 17:06:00', 1, 131, 50, NULL),
(55, 'gggg', '2022-06-02 18:06:03', 2, 128, 50, NULL),
(56, 'oiiii', '2022-06-02 19:06:46', 4, 128, 50, NULL),
(57, 'yyyy', '2022-06-02 19:06:20', 4, 128, 50, NULL),
(58, 'kk', '2022-06-02 19:06:27', 3, 128, 50, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`ID`, `NOME`) VALUES
(1, 'Estudante'),
(2, 'Professor'),
(3, 'Nativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(80) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `DATA_CADASTRAMENTO` datetime DEFAULT current_timestamp(),
  `PAISES_ID` int(11) NOT NULL,
  `TIPO_ID` int(11) NOT NULL,
  `STATUS` enum('ATIVO','INATIVO') DEFAULT 'ATIVO',
  `PERFIL` enum('ADMIN','USUARIO') DEFAULT 'USUARIO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOME`, `EMAIL`, `PASSWORD`, `DATA_CADASTRAMENTO`, `PAISES_ID`, `TIPO_ID`, `STATUS`, `PERFIL`) VALUES
(45, 'Julia', 'julia@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-18 21:05:50', 1, 1, 'ATIVO', 'USUARIO'),
(46, 'Ricardo', 'ricardo@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-18 21:05:55', 3, 3, 'ATIVO', 'USUARIO'),
(48, 'Ana Fernanda', 'fernanda@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-30 19:05:37', 1, 2, 'ATIVO', 'USUARIO'),
(49, 'Jose', 'jose@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-31 15:05:31', 1, 1, 'ATIVO', 'USUARIO'),
(50, 'Maria', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-02 17:06:06', 1, 1, 'ATIVO', 'USUARIO'),
(51, 'Joao', 'joao@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-02 22:06:54', 1, 1, 'ATIVO', 'USUARIO');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `discursao`
--
ALTER TABLE `discursao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_DISCURSAO_USUARIOS1_idx` (`USUARIOS_ID`),
  ADD KEY `fk_DISCURSAO_IDIOMAS1_idx` (`IDIOMAS_ID`);

--
-- Índices para tabela `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_RESPOSTAS_DISCURSAO1_idx` (`DISCURSAO_ID`),
  ADD KEY `fk_RESPOSTAS_USUARIOS1_idx` (`USUARIOS_ID`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`),
  ADD KEY `fk_USUARIOS_PAISES1_idx` (`PAISES_ID`),
  ADD KEY `fk_USUARIOS_TIPO1_idx` (`TIPO_ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `discursao`
--
ALTER TABLE `discursao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de tabela `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paises`
--
ALTER TABLE `paises`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `discursao`
--
ALTER TABLE `discursao`
  ADD CONSTRAINT `fk_DISCURSAO_IDIOMAS1` FOREIGN KEY (`IDIOMAS_ID`) REFERENCES `idiomas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_DISCURSAO_USUARIOS1` FOREIGN KEY (`USUARIOS_ID`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_RESPOSTAS_DISCURSAO1` FOREIGN KEY (`DISCURSAO_ID`) REFERENCES `discursao` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_RESPOSTAS_USUARIOS1` FOREIGN KEY (`USUARIOS_ID`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_USUARIOS_PAISES1` FOREIGN KEY (`PAISES_ID`) REFERENCES `paises` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_USUARIOS_TIPO1` FOREIGN KEY (`TIPO_ID`) REFERENCES `tipo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
