-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2023 às 06:33
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cinepipoca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretor`
--

CREATE TABLE `diretor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `minibio` longtext DEFAULT NULL,
  `ano_nascimento` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `diretor`
--

INSERT INTO `diretor` (`id`, `nome`, `minibio`, `ano_nascimento`) VALUES
(16, 'Sam Raimi', 'Samuel M. Raimi (Royal Oak, 23 de outubro de 1959) é um diretor, produtor, ator e roteirista norte-americano, famoso por dirigir a série de filmes do Homem-Aranha, Evil Dead e produzir a série Xena: Warrior Princess. É irmão do ator Ted Raimi e do roteirista Ivan Raimi.\r\n\r\nTambém dirigiu Doctor Strange in the Multiverse of Madness, filme do Universo Cinematográfico Marvel.', '1959'),
(18, 'George Miller', 'George Miller é um produtor de filmes, diretor de cinema, roteirista e médico australiano. Provavelmente, ele é mais conhecido por seu trabalho no filme Mad Max, mas foi envolvido em uma aberta gama de projetos, incluindo o filme premiado Happy Feet. George é o irmão mais velho do produtor Bill Miller. ', '1945');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `ano_lancamento` year(4) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `nota_imdb` float DEFAULT NULL,
  `img_cartaz` varchar(255) DEFAULT NULL,
  `fk_diretor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `sinopse`, `ano_lancamento`, `duracao`, `nota_imdb`, `img_cartaz`, `fk_diretor_id`) VALUES
(45, 'The Evil Dead ', 'Ashley e um grupo de amigos vão para uma casa na floresta para uma noite de diversão. Lá, encontram um velho livro que, quando lido em voz alta, desperta a morte.', '1981', 85, 7.4, '6a86b9ecd5f9407fd930bc33ebb0095c', 16),
(46, 'Mad Max 2 - A Caçada Continua', 'Após vingar-se da morte de sua esposa e filho, nas mãos de uma gangue, Mad Max dirige nas estradas pós-apocalípticas da Austrália, afastando-se dos ataques de tribos nômades. ', '1982', 95, 7.6, '5c14f07732da3aae83f7199b33383dc0', 18);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diretor_id` (`fk_diretor_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diretor`
--
ALTER TABLE `diretor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `filme_ibfk_1` FOREIGN KEY (`fk_diretor_id`) REFERENCES `diretor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
