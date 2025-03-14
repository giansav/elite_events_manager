-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 14, 2025 alle 14:23
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `atleti`
--

CREATE TABLE `atleti` (
  `id` int(11) NOT NULL,
  `nome_atleta` varchar(255) NOT NULL,
  `cognome_atleta` varchar(255) NOT NULL,
  `sesso_atleta` enum('M','F') NOT NULL,
  `peso_atleta` enum('44','48','52','57','63','69','75','81','91','100') NOT NULL,
  `disciplina` enum('KL','FB','KJ','GR') NOT NULL,
  `esperienza` enum('esordiente','intermedio','avanzato') NOT NULL,
  `anno_atleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `atleti`
--

INSERT INTO `atleti` (`id`, `nome_atleta`, `cognome_atleta`, `sesso_atleta`, `peso_atleta`, `disciplina`, `esperienza`, `anno_atleta`) VALUES
(2, 'VINCENZO', 'CAVEZZA', 'M', '57', 'GR', 'intermedio', 2009),
(3, 'ADEM', 'CERBAH', 'M', '63', 'KJ', 'intermedio', 2011),
(4, 'ALESSANDRO', 'SAVINO', 'M', '75', 'KL', 'esordiente', 2007);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `atleti`
--
ALTER TABLE `atleti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `atleti`
--
ALTER TABLE `atleti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
