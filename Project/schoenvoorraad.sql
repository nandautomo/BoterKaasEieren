[5:13 AM] Nanda Rizky Nandara Utomo
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 jan 2024 om 14:54
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `schoenenvoorraad`
--
CREATE DATABASE IF NOT EXISTS `schoenenvoorraad` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `schoenenvoorraad`;
-- --------------------------------------------------------
--
-- Tabelstructuur voor tabel `schoenen`
--
DROP TABLE IF EXISTS `schoenen`;
CREATE TABLE `schoenen` (
  `id` int(11) NOT NULL,
  `soort` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `maat` int(11) NOT NULL,
  `prijs` decimal(6,2) NOT NULL,
  `voorraad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Gegevens worden geëxporteerd voor tabel `schoenen`
--
INSERT INTO `schoenen` (`id`, `soort`, `merk`, `type`, `maat`, `prijs`, `voorraad`) VALUES
(1, 'Bergschoenen', 'Meidl', 'LITE HIKE GTX', 43, 208.99, 2),
(2, 'Hardloopschoenen', 'Adidas', 'SUPERNOVA 3', 42, 109.95, 5),
(3, 'Tennisschoenen', 'Lacoste Sport', 'AG-LT 23 LITE', 39, 93.95, 6),
(4, 'Voetbalschoenen', 'Puma', 'FUTURE ULTIMATE FG', 40, 219.95, 3),
(5, 'Zaalschoen', 'Asics', 'UPCOURT 5', 42, 57.95, 1);
--
-- Indexen voor geëxporteerde tabellen
--
--
-- Indexen voor tabel `schoenen`
--
ALTER TABLE `schoenen`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--
--
-- AUTO_INCREMENT voor een tabel `schoenen`
--
ALTER TABLE `schoenen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 