-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2022 às 06:32
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
  `DATA` datetime DEFAULT NULL,
  `IMAGEM` varchar(255) DEFAULT NULL,
  `ATIVO` enum('ATIVO','INATIVO') DEFAULT 'ATIVO',
  `USUARIOS_ID` int(11) NOT NULL,
  `IDIOMAS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `discursao`
--

INSERT INTO `discursao` (`ID`, `TITULO`, `DESCRICAO`, `DATA`, `IMAGEM`, `ATIVO`, `USUARIOS_ID`, `IDIOMAS_ID`) VALUES
(72, 'Como dizer \"Fazer e acontecer\" em espanhol', 'Venho lhes perguntar se vocês conhecem em espanhol alguma expressão que tenha um significado e uso semelhante à expressão idiomática brasileira \"Fazer e acontecer\". Seu significado é algo semelhante \"arrasar\", \"contar vantagem\".\r\n\r\nDesde agora agradeço pela atenção!', '2022-06-06 00:06:50', NULL, 'ATIVO', 44, 3),
(73, 'Como dizer \"Produtos de primeira necessidade (básico, indispensável, imprescindível)\" em francês', 'Português: Básico, de primeira necessidade (indispensável, imprescindível)\r\nFrancês: Aliment de base, produit de base, denrée de base\r\n\r\nExemples:\r\nOr le manioc constitue un aliment de base pour environ 250 millions d\'Africains. lemonde.fr (Atualmente a mandioca é um alimento de primeira necessidade para cerca de 250 milhões de africanos.)\r\n\r\n- Les insectes pourraient bien devenir un aliment de base de notre alimentation. lexpress.fr (Os insetos poderiam muito bem tornar-se um alimento de primei', '2022-06-06 00:06:17', NULL, 'ATIVO', 44, 4),
(74, 'Descrição Fonética de frases', 'Todo dia o sol levanta\r\nE a gente conta\r\nAo sol todo dia', '2022-06-06 00:06:19', NULL, 'ATIVO', 44, 1),
(75, 'Correção de texto: While some may disagree...', 'While some may disagree, I strongly believe that saving land for endangered animals is more important than the human needs for farmland, housing and industry. I feel this way for a couple of reasons, that I will state in the next paragraphs.\r\n\r\nFirst, we live in a very evolved and complex society, technology made it possible to produce food in a more sustainable way. We do not need to destroy every single piece of nature in favor of agriculture and industries. ', '2022-06-06 01:06:18', NULL, 'ATIVO', 44, 2),
(76, 'Completar frase com Pretérito Perfeito', 'Há duas semanas, (nós/fazer) ...fizemos\r\nUma viagem ao Algarve e (nós/encontrar)...\r\nCom os nossos amigos. Eles (levar) ...\r\nA lugares muito bonito.\r\n\r\nNão consigo completar esta frase. Estou recebendo um erro há três dias. Alguém sabe? Você tem que escrever o verbo no pretérito perfeito. Escrevi entcontrámos e lavaram mas não é correcto. Alguém pode me ajudar a perceber?', '2022-06-06 01:06:08', NULL, 'ATIVO', 41, 1),
(77, 'Os artigos (Los artículos)', 'Hola, ¿cómo están? Os artigos são de extrema importância em qualquer língua, e no espanhol não é diferente. Eles indicam se as palavras estão no singular ou no plural e no masculino ou feminino, podendo ser considerados como definidos ou indefinidos.', '2022-06-06 01:06:53', NULL, 'ATIVO', 41, 3),
(78, 'A Frase Negativa em Francês', 'As formas negativas mais comuns em francês são:\r\n\r\nne … pas – não\r\nne… ni… ni… – nem… nem\r\nne… jamais – nunca\r\nne… personne – ninguém\r\nne… plus – não mais\r\nne… que – somente\r\nne… rien – nada\r\n\r\nA frase negativa tem duas partes: o ne, que é colocado antes do verbo conjugado e pronomes oblíquos e o pas (ou outra palavra negativa) que é colocada geralmente depois do verbo conjugado. Alguns exemplos:\r\n\r\nJe ne parle pas italien. [Não falo italiano.]\r\nIls ne mangent rien. [Eles não estão comendo nada.', '2022-06-06 01:06:57', NULL, 'ATIVO', 41, 4),
(79, 'Como dizer \"CPF / CGC-CNPJ / RG-CI-RIC em inglês?', 'Português: CPF e Carteira de Identidade (RG Registro Geral / RIC-Registro de Identidade Civil)', '2022-06-06 01:06:48', NULL, 'ATIVO', 41, 2);

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
  `DATA` datetime DEFAULT NULL,
  `PONTUACAO` tinyint(4) NOT NULL DEFAULT 0,
  `DISCURSAO_ID` int(11) NOT NULL,
  `USUARIOS_ID` int(11) NOT NULL,
  `votos` int(11) NOT NULL DEFAULT 0,
  `ATIVO` enum('ATIVO','INATIVO') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`ID`, `DESCRICAO`, `DATA`, `PONTUACAO`, `DISCURSAO_ID`, `USUARIOS_ID`, `votos`, `ATIVO`) VALUES
(46, '=> First, we live in a very evolved and complex society. Technology has made it possible to produce ', '2022-06-06 01:06:48', 0, 75, 44, 0, NULL),
(47, 'O verbo é \"wield\". \"Wielder\", neste contexto, seria algo como \"influencer\". A frase \"It\'s common to see people shallowly wielding an influence on complex topics\", acho que está correta, mas não é muito clara, porque pode-se entender que a influência exercida é que é \"shallow\", rasa, pequena, e não a propriedade com que se influencia, que é o que você pretende dizer.', '2022-06-06 01:06:04', 0, 75, 44, 0, NULL),
(48, 'No Uruguay e outros países hispânicos escreve-se/fala-se \'Con permiso\' para com licença. \'Permiso\' é mais utilizado com significado de carteira, alvará, autorização, etc.: \'permiso de maternidad\' = licença maternidade; \'permiso de paternidad\' = licença paternidade, \'permiso de conducir\' = CNH - Narteira Nacional de Habilitação / carteira de motorista. \'Permiso de trabajo\', \'permiso de residencia\', etc.', '2022-06-06 01:06:55', 0, 72, 44, 0, NULL),
(49, 'Parabéns! Você já deve ter distribuido os convites, mas para não ficar sem resposta...  (Corrigindo seu post: cerimônia, alguém, o porquê?-(subst.))  Analisando:  DE é uma preposição.  DO pode ser: 1. Contração da prep. de com o art. o; 2. Contr. da prep. de com o pron. dem. o; 3. Contr. da prep. de com o pron. neutro o. *No caso do convite é a 1ª. definição.', '2022-06-06 01:06:56', 0, 74, 44, 0, NULL),
(50, 'Então quer dizer que na França não existe a diferença entre CPF e RG? Lá realmente só tem um documento, o CNI?  Faço pesquisa terminológica bilíngue português-francês e precisava dessas informações.', '2022-06-06 01:06:14', 0, 72, 41, 0, NULL),
(51, 'Na declaração de imposto de renda da França de 2012 foi exigido, segundo este site aqui, do governo francês: -Votre adresse électronique -Votre numéro fiscal -Votre numéro de télédéclarant.', '2022-06-06 01:06:37', 0, 73, 41, 0, NULL),
(52, 'Segundo a wikipedia.fr, a CNI não deve ter nada a ver com o nosso CPF ou o \'numéro fiscal\' francês: \"La carte nationale d\'identité (CNI) est un document officiel d’identification des Français. Elle n\'est pas obligatoire. Elle est délivrée gratuitement en mairie, dans les antennes d\'arrondissement de la Préfecture de police de Paris ou dans les consulats pour les citoyens résidant à l\'étranger. Elle est valable dix ans. Aux yeux de l\'administration française, la détention d\'une carte d\'identité j', '2022-06-06 01:06:43', 0, 78, 44, 0, NULL),
(53, 'Entre dicas de gramática, pronúncia, vocabulário (expressões idiomáticas), gírias, músicas e muito mais, confira esta que iremos disponibilizar agora em espanhol. Faça uso do que vamos mostrar.  quedar viuda quedar viudo', '2022-06-06 01:06:36', 0, 77, 44, 0, NULL),
(54, 'Entre dicas de gramática, pronúncia, vocabulário (expressões idiomáticas), gírias, músicas e muito mais, confira esta que iremos disponibilizar agora em espanhol. Faça uso do que vamos mostrar.  quedar viuda quedar viudo', '2022-06-06 01:06:50', 0, 77, 44, 0, NULL),
(55, 'Entre dicas de gramática, pronúncia, vocabulário (expressões idiomáticas), gírias, músicas e muito mais, confira esta que iremos disponibilizar agora em espanhol. Faça uso do que vamos mostrar.  quedar viuda quedar viudo', '2022-06-06 01:06:57', 0, 79, 44, 0, NULL);

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
  `DATA_CADASTRAMENTO` datetime DEFAULT NULL,
  `PAISES_ID` int(11) NOT NULL,
  `TIPO_ID` int(11) NOT NULL,
  `STATUS` enum('ATIVO','INATIVO') DEFAULT 'ATIVO',
  `PERFIL` enum('ADMIN','USUARIO') DEFAULT 'USUARIO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOME`, `EMAIL`, `PASSWORD`, `DATA_CADASTRAMENTO`, `PAISES_ID`, `TIPO_ID`, `STATUS`, `PERFIL`) VALUES
(41, 'Joao', 'joao@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-03 13:06:44', 2, 2, 'ATIVO', 'USUARIO'),
(44, 'Maria', 'maria@gmail.com', 'ab233b682ec355648e7891e66c54191b', '2022-06-05 16:06:58', 1, 1, 'ATIVO', 'USUARIO');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
