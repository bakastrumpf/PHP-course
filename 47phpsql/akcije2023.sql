-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 27, 2022 at 11:34 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akcije2023`
--
CREATE DATABASE IF NOT EXISTS `akcije2023` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `akcije2023`;

-- --------------------------------------------------------

--
-- Table structure for table `akcija`
--

DROP TABLE IF EXISTS `akcija`;
CREATE TABLE IF NOT EXISTS `akcija` (
  `idponude` int(11) NOT NULL AUTO_INCREMENT,
  `destinacija` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tip` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `danprodaje` date NOT NULL,
  `period` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userkomp` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idponude`),
  KEY `userkomp` (`userkomp`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `akcija`
--

INSERT INTO `akcija` (`idponude`, `destinacija`, `tip`, `cena`, `danprodaje`, `period`, `userkomp`) VALUES
(1, 'Berlin', 'aviokarta', 89, '2023-03-08', 'april/maj 2023', 'kompanija1'),
(2, 'Budmipesta', 'aviokarta', 79.5, '2023-03-10', 'april-avgust 2023', 'kompanija1'),
(4, 'London', 'aviokarta', 129.3, '2023-03-08', 'maj-sept 2023', 'kompanija1'),
(5, 'Dubai', 'aviokarta', 150, '2023-03-10', 'jun/jul 2023', 'kompanija1'),
(6, 'Pariz', 'vikend aranzman hotel+avio', 199.99, '2023-03-10', 'maj-avgust 2023', 'kompanija1'),
(7, 'Pariz', 'vikend aranzman hotel+avio', 205, '2023-03-10', 'jun-jul 2023', 'kompanija2'),
(8, 'Rim', 'hotel 3* + avio', 180, '2023-03-10', 'septembar 2023', 'kompanija3'),
(9, 'Rim', 'hotel 3* + avio', 185, '2023-03-10', 'septembar 2023', 'kompanija6'),
(10, 'Dubai', 'aviokarta', 144, '2023-03-10', 'jun/jul 2023', 'kompanija4'),
(11, 'Dubai', 'aviokarta', 155.55, '2023-03-11', 'jun/jul 2023', 'kompanija5'),
(12, 'London', 'aviokarta', 122, '2023-03-11', 'avgust/sept 2023', 'kompanija1'),
(13, 'Berlin', 'aviokarta', 115, '2023-03-11', 'avgust/sept 2023', 'kompanija1'),
(14, 'Mauricijus', 'aviokarta', 599, '2023-03-11', 'april 2023', 'kompanija1'),
(15, 'Njujork (SAD)', 'avion', 399, '2023-03-11', 'leto 2023', 'kompanija1');

-- --------------------------------------------------------

--
-- Table structure for table `kompanija`
--

DROP TABLE IF EXISTS `kompanija`;
CREATE TABLE IF NOT EXISTS `kompanija` (
  `userkomp` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PIB` int(11) NOT NULL,
  PRIMARY KEY (`userkomp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kompanija`
--

INSERT INTO `kompanija` (`userkomp`, `pass`, `naziv`, `adresa`, `PIB`) VALUES
('kompanija1', 'sifra123', 'Air Serbia', 'Novi Beograd, Bulevar umetnosti 16', 100200300),
('kompanija2', 'sifra123', 'Air France', 'Beograd, Knez Mihajlova 30', 101201301),
('kompanija3', 'sifra123', 'Kontiki Travel', 'Beograd, Beogradska 44', 105205305),
('kompanija4', 'sifra123', 'Emirates', 'Beograd, Terazije 22', 123123123),
('kompanija5', 'sifra123', 'Air Qatar', 'Beograd, Knez Mihajlova 30', 111222333),
('kompanija6', 'sifra123', 'Jolly', 'Beograd, Kneza Milosa 9', 333444181);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `userkor` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `eposta` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `aktivan` tinyint(4) NOT NULL,
  `racun` double NOT NULL,
  PRIMARY KEY (`userkor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`userkor`, `pass`, `ime`, `prezime`, `eposta`, `aktivan`, `racun`) VALUES
('bosko', 'sifra123', 'Bosko', 'Nikolic', 'bosko.nikolic@etf.rs', 1, 473.9),
('drasko', 'sifra123', 'Drazen', 'Draskovic', 'drazen.draskovic@etf.rs', 1, 1457.88),
('marko', 'sifra123', 'Marko', 'Misic', 'marko.misic@etf.rs', 0, 225.5),
('nemanja', 'sifra123', 'Nemanja', 'Kojic', 'nemanja.kojic@etf.rs', 1, 670.8),
('sanja', 'sifra123', 'Sanja', 'Delcev', 'sanjad@etf.bg.ac.rs', 1, 1650);

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

DROP TABLE IF EXISTS `kupovina`;
CREATE TABLE IF NOT EXISTS `kupovina` (
  `idkarte` int(11) NOT NULL AUTO_INCREMENT,
  `userkor` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `idponude` int(11) NOT NULL,
  `vremekupovine` date NOT NULL,
  `kolicina` int(11) NOT NULL,
  PRIMARY KEY (`idkarte`),
  KEY `userkor` (`userkor`,`idponude`),
  KEY `idponude` (`idponude`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`idkarte`, `userkor`, `idponude`, `vremekupovine`, `kolicina`) VALUES
(1, 'bosko', 1, '2023-03-08', 2),
(2, 'drasko', 2, '2023-03-08', 2),
(3, 'nemanja', 10, '2023-03-08', 3),
(4, 'bosko', 8, '2023-03-10', 3),
(5, 'bosko', 4, '2023-03-10', 2),
(6, 'drasko', 13, '2023-03-10', 2),
(7, 'drasko', 13, '2023-03-10', 2),
(8, 'drasko', 15, '2023-03-10', 2),
(9, 'drasko', 15, '2023-03-10', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akcija`
--
ALTER TABLE `akcija`
  ADD CONSTRAINT `akcija_ibfk_1` FOREIGN KEY (`userkomp`) REFERENCES `kompanija` (`userkomp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD CONSTRAINT `kupovina_ibfk_2` FOREIGN KEY (`userkor`) REFERENCES `korisnik` (`userkor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kupovina_ibfk_3` FOREIGN KEY (`idponude`) REFERENCES `akcija` (`idponude`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
