-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Creato il: Mar 15, 2025 alle 11:09
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
  `anno_atleta` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `atleti`
--

INSERT INTO `atleti` (`id`, `nome_atleta`, `cognome_atleta`, `sesso_atleta`, `peso_atleta`, `disciplina`, `esperienza`, `anno_atleta`, `user_id`) VALUES
(2, 'VINCENZO', 'CAVEZZA', 'M', '57', 'GR', 'intermedio', 2009, 1),
(3, 'ADEM', 'CERBAH', 'M', '63', 'KJ', 'intermedio', 2011, 1),
(4, 'ALESSANDRO', 'SAVINO', 'M', '75', 'KL', 'esordiente', 2007, 1),
(5, 'GIUSEPPE', 'MINICHINI', 'M', '91', 'FB', 'esordiente', 2008, 1),
(7, 'ANTONIO', 'BIANCHINI', 'M', '75', 'KL', 'avanzato', 2009, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome_asd` varchar(255) NOT NULL,
  `cf_asd` varchar(15) NOT NULL,
  `rappr_asd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `nome_asd`, `cf_asd`, `rappr_asd`, `email`, `tel`, `password`) VALUES
(1, 'KDK QUASAR', '92041290633', 'PASQUALE CORRADO', 'giansav74@gmail.com', '3385006251', '$2y$10$npFZN3d.RVj//ovYWQGr1.uIgZWnIpt/WvWXv4z6e9nRpTq.SBdp6'),
(2, 'KICKBOXING SPARANISE', '93078710618', 'ANTONIO SCIALDONE', 'scialdonea.tkb@gmail.com', '3313701266', '$2y$10$bA.wI7dj7Q9WEbn3j2Yee.u6n4T.fQtts3Eozs5alH.Bxl842QaiG');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `atleti`
--
ALTER TABLE `atleti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `atleti`
--
ALTER TABLE `atleti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `atleti`
--
ALTER TABLE `atleti`
  ADD CONSTRAINT `atleti_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
