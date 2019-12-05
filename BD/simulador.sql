CREATE DATABASE simulador;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2019 às 15:27
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `simulador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `batalha`
--

CREATE TABLE `batalha` (
  `batalhaId` int(11) NOT NULL,
  `treinador1` int(11) NOT NULL,
  `treinador2` int(11) NOT NULL,
  `vencedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `batalha`
--

INSERT INTO `batalha` (`batalhaId`, `treinador1`, `treinador2`, `vencedor`) VALUES
(1, 14, 16, 14),
(2, 14, 15, 14),
(3, 14, 15, 14),
(4, 14, 15, 14),
(5, 14, 16, 14),
(6, 17, 16, 17),
(7, 17, 16, 16),
(8, 17, 16, 17),
(9, 17, 16, 16),
(10, 17, 16, 17),
(11, 17, 16, 16),
(12, 17, 15, 15),
(13, 17, 15, 15),
(14, 17, 15, 15),
(15, 17, 15, 15),
(16, 17, 15, 15),
(17, 17, 15, 15),
(18, 15, 17, 15),
(19, 15, 17, 15),
(20, 17, 15, 15),
(21, 17, 15, 17),
(22, 17, 15, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pokemon`
--

CREATE TABLE `pokemon` (
  `pokemonId` int(11) NOT NULL,
  `nomePokemon` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pokemon`
--

INSERT INTO `pokemon` (`pokemonId`, `nomePokemon`, `imagem`, `tipoId`) VALUES
(7, 'Squirtle', '../imagens/pokemon/Squirtle.png', 45),
(8, 'Bulbasaur', '../imagens/pokemon/Bulbasaur.png', 44),
(9, 'Ivysaur', '../imagens/pokemon/Ivysaur.png', 44),
(10, 'Venusaur ', '../imagens/pokemon/Venusaur.png', 44),
(11, 'Charmander ', '../imagens/pokemon/Charmander.png', 47),
(12, 'Charmeleon ', '../imagens/pokemon/Charmeleon.png', 47),
(13, 'Charizard ', '../imagens/pokemon/Charizard.png', 47),
(14, 'Wartortle ', '../imagens/pokemon/Wartortle.png', 45),
(15, 'Blastoise ', '../imagens/pokemon/Blastoise.png', 45),
(16, 'Pikachu ', '../imagens/pokemon/025.png', 50),
(17, 'Raichu ', '../imagens/pokemon/026.png', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `tipoId` int(11) NOT NULL,
  `tipoNome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fraqueza` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`tipoId`, `tipoNome`, `forca`, `fraqueza`, `imagem`) VALUES
(42, 'Aço', 'Normal', 'Fogo', '../imagens/tipos/aco.png'),
(44, 'Planta', 'Água', 'Solo', '../imagens/tipos/grama.png'),
(45, 'Água', 'Fogo', 'Elétrico', '../imagens/tipos/agua.png'),
(46, 'Voador', 'Inseto', 'Pedra', '../imagens/tipos/voador.png'),
(47, 'Fogo', 'Planta', 'Água', '../imagens/tipos/fogo.png'),
(48, 'Lutador', 'Normal', 'Psiquico', '../imagens/tipos/lutador.png'),
(49, 'Psiquico', 'Lutador', 'Fantasma', '../imagens/tipos/psiquico.png'),
(50, 'Elétrico', 'Água', 'Pedra', '../imagens/tipos/eletrico.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinador`
--

CREATE TABLE `treinador` (
  `treinadorId` int(11) NOT NULL,
  `treinadorNome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vitorias` int(11) NOT NULL,
  `derrotas` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `treinador`
--

INSERT INTO `treinador` (`treinadorId`, `treinadorNome`, `senha`, `foto`, `vitorias`, `derrotas`, `nivel`) VALUES
(15, 'Marvin', '4242', '../imagens/perfil/marvin.jpg', 10, 4, 2),
(16, 'Enzo', '741', '../imagens/perfil/31571363_1572234809741681_4791218361524551680_n-5af4ec2283226__880.jpg', 3, 9, 0),
(17, 'Lucas', '123', '../imagens/perfil/Bill.jpg', 4, 13, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinador_pokemon`
--

CREATE TABLE `treinador_pokemon` (
  `treinadorId` int(11) NOT NULL,
  `pokemon1` int(11) NOT NULL,
  `pokemon2` int(11) NOT NULL,
  `pokemon3` int(11) NOT NULL,
  `pokemon4` int(11) NOT NULL,
  `pokemon5` int(11) NOT NULL,
  `pokemon6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `treinador_pokemon`
--

INSERT INTO `treinador_pokemon` (`treinadorId`, `pokemon1`, `pokemon2`, `pokemon3`, `pokemon4`, `pokemon5`, `pokemon6`) VALUES
(14, 15, 14, 7, 13, 11, 12),
(15, 16, 17, 8, 10, 9, 14),
(16, 11, 10, 17, 16, 11, 17),
(17, 15, 13, 16, 10, 9, 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `batalha`
--
ALTER TABLE `batalha`
  ADD PRIMARY KEY (`batalhaId`);

--
-- Índices para tabela `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`pokemonId`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tipoId`);

--
-- Índices para tabela `treinador`
--
ALTER TABLE `treinador`
  ADD PRIMARY KEY (`treinadorId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `batalha`
--
ALTER TABLE `batalha`
  MODIFY `batalhaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `pokemonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `treinador`
--
ALTER TABLE `treinador`
  MODIFY `treinadorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
