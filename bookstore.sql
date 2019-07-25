-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jul-2019 às 01:07
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bookstore`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `ID` int(11) NOT NULL,
  `NomeAdm` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `attempt`
--

CREATE TABLE `attempt` (
  `ID` int(11) NOT NULL,
  `IP` varchar(20) DEFAULT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `ID` int(11) NOT NULL,
  `NomeAutor` varchar(100) DEFAULT NULL,
  `Descricao` text DEFAULT NULL,
  `Autor_Img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`ID`, `NomeAutor`, `Descricao`, `Autor_Img`) VALUES
(1, 'Machado de Assis', 'Joaquim Maria Machado de Assis foi um escritor brasileiro, considerado por muitos críticos, estudiosos, escritores e leitores um dos maiores senão o maior nome da literatura do Brasil.', 'machado.png'),
(2, 'Rick Riordan', 'Rick Russell Riordan, Jr., também conhecido simplesmente como Rick Riordan, é um escritor norte-americano, mais conhecido por escrever a série Percy Jackson e Os Olimpianos de 2005 a 2009. Ele também escreveu a série adulta de mistérios Tres Navarre em 1997.', 'RickRiordan.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor_livro`
--

CREATE TABLE `autor_livro` (
  `ID` int(11) NOT NULL,
  `ID_Autor` int(11) DEFAULT NULL,
  `ID_Livro` int(11) DEFAULT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `ID` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `ID_Livro` int(11) DEFAULT NULL,
  `ID_ADM` int(11) DEFAULT NULL,
  `Nota` tinyint(1) DEFAULT NULL,
  `Exibe` tinyint(1) DEFAULT NULL,
  `Comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `NomeCliente` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Dt_Nascimento` date NOT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `Biblioteca` varchar(100) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`ID`, `NomeCliente`, `Sobrenome`, `CPF`, `Dt_Nascimento`, `Telefone`, `Email`, `Senha`, `Biblioteca`, `Status`) VALUES
(1, 'João Vitor Magdaleno', 'Magdaleno', '04335194013', '2019-07-03', '996351863', 'joaomagdaleno.14@gmail.com', '$2y$10$3UwA7.kJl6ivTGcMs71mfer9Kdnsh703G1PX1as5fcKtP3567zNbm', NULL, 'test'),
(2, 'Lucélia', 'Berenice', '12345678978', '2019-07-04', '123456789', 'user@gmail.com', '$2y$10$9Wc/JrWBk4mkvWZXhGjeQOvKsnlWJu6uNLCWrcotlNKKaBUcXAgU.', NULL, 'test');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `ID` int(11) NOT NULL,
  `Dt_hora` datetime DEFAULT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `ID_Livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_livro`
--

CREATE TABLE `compra_livro` (
  `ID` int(11) NOT NULL,
  `ID_Livro` int(11) DEFAULT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `ID_Compra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirmation`
--

CREATE TABLE `confirmation` (
  `ID` int(11) NOT NULL,
  `Email` varchar(90) DEFAULT NULL,
  `Token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `ID` int(11) NOT NULL,
  `NomeEditora` varchar(100) DEFAULT NULL,
  `Editora_Img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`ID`, `NomeEditora`, `Editora_Img`) VALUES
(1, ' Ática ', 'atica-1.png'),
(2, 'Intrinseca', 'intrinseca.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `ID` int(11) NOT NULL,
  `NomeLivro` varchar(50) NOT NULL,
  `Ano_Publi` year(4) DEFAULT NULL,
  `Preco` float DEFAULT NULL,
  `Descricao` text DEFAULT NULL,
  `ID_Editora` int(11) DEFAULT NULL,
  `ID_Autor` int(11) DEFAULT NULL,
  `Livro_Img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`ID`, `NomeLivro`, `Ano_Publi`, `Preco`, `Descricao`, `ID_Editora`, `ID_Autor`, `Livro_Img`) VALUES
(1, 'Dom Casmurro', 0000, 25, 'Dom Casmurro é um romance escrito por Machado de Assis, publicado em 1899 pela Livraria Garnier. Escrito para publicação em livro, o que ocorreu em 1900 – embora com data do ano anterior, ao contrário de Memórias Póstumas de Brás Cubas (1881) e Quincas Borba (1891), escritos antes em folhetins –, é considerado pela crítica o terceiro romance da \"Trilogia Realista\" de Machado de Assis, ao lado desses outros dois, embora o próprio autor não tenha formulado esta categoria.', 1, 1, 'Domcasmurro.jpg'),
(2, 'Percy Jackson e o Ladão de Raios', 2005, 35, 'The Lightning Thief é um livro juvenil de fantasia e aventura baseado na mitologia grega, escrito por Rick Riordan. É o primeiro livro da série norte-americana Percy Jackson & the Olympians, que narra a vida do adolescente Percy Jackson que descobre ser um semideus, filho de Poseidon com uma humana.', 2, 2, 'ladraoderaios.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

CREATE TABLE `tema` (
  `ID` int(11) NOT NULL,
  `NomeTema` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tema`
--

INSERT INTO `tema` (`ID`, `NomeTema`) VALUES
(1, 'Fantasia'),
(2, 'Aventura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema_livro`
--

CREATE TABLE `tema_livro` (
  `ID` int(11) NOT NULL,
  `ID_Tema` int(11) DEFAULT NULL,
  `ID_Livro` int(11) DEFAULT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Autor` (`ID_Autor`),
  ADD KEY `ID_Livro` (`ID_Livro`);

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Livro` (`ID_Livro`),
  ADD KEY `ID_ADM` (`ID_ADM`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Livro` (`ID_Livro`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Índices para tabela `compra_livro`
--
ALTER TABLE `compra_livro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Livro` (`ID_Livro`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Compra` (`ID_Compra`);

--
-- Índices para tabela `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Autor` (`ID_Autor`),
  ADD KEY `ID_Editora` (`ID_Editora`);

--
-- Índices para tabela `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tema_livro`
--
ALTER TABLE `tema_livro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Tema` (`ID_Tema`),
  ADD KEY `ID_Livro` (`ID_Livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `attempt`
--
ALTER TABLE `attempt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compra_livro`
--
ALTER TABLE `compra_livro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tema`
--
ALTER TABLE `tema`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tema_livro`
--
ALTER TABLE `tema_livro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  ADD CONSTRAINT `autor_livro_ibfk_1` FOREIGN KEY (`ID_Autor`) REFERENCES `autor` (`ID`),
  ADD CONSTRAINT `autor_livro_ibfk_2` FOREIGN KEY (`ID_Livro`) REFERENCES `livro` (`ID`);

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`ID_Livro`) REFERENCES `livro` (`ID`),
  ADD CONSTRAINT `avaliacao_ibfk_3` FOREIGN KEY (`ID_ADM`) REFERENCES `adm` (`ID`);

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`ID_Livro`) REFERENCES `livro` (`ID`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID`);

--
-- Limitadores para a tabela `compra_livro`
--
ALTER TABLE `compra_livro`
  ADD CONSTRAINT `compra_livro_ibfk_1` FOREIGN KEY (`ID_Livro`) REFERENCES `livro` (`ID`),
  ADD CONSTRAINT `compra_livro_ibfk_2` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID`),
  ADD CONSTRAINT `compra_livro_ibfk_3` FOREIGN KEY (`ID_Compra`) REFERENCES `compra` (`ID`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`ID_Autor`) REFERENCES `autor` (`ID`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`ID_Editora`) REFERENCES `editora` (`ID`);

--
-- Limitadores para a tabela `tema_livro`
--
ALTER TABLE `tema_livro`
  ADD CONSTRAINT `tema_livro_ibfk_1` FOREIGN KEY (`ID_Tema`) REFERENCES `tema` (`ID`),
  ADD CONSTRAINT `tema_livro_ibfk_2` FOREIGN KEY (`ID_Livro`) REFERENCES `livro` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
