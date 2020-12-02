-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Dez 2020 um 15:07
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cars`
--
CREATE DATABASE IF NOT EXISTS `cars` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cars`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `brand`
--

INSERT INTO `brand` (`id`, `brand`, `price`, `model`, `image`) VALUES
(1, 'Audi', 5621, 'S7', 'https://www.autozeitung.de/assets/field/image/abt-audi-a7-sportback-1.jpg'),
(2, 'VW', 589, 'Käfer', 'https://www.automobil-produktion.de/files/upload/post/apr/2016/09/133610/ap-20212-bild00_klassiker_vw_jeans_kaefer-jpg.jpg'),
(3, 'Kakao', 15, 'Black', 'https://cdn.bimmertoday.de/wp-content/uploads/ReStyleIt-Pink-BMW-M6-Coupe-Folierung-matt-rosa-01.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
