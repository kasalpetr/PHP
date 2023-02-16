-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3306
-- Vytvořeno: Čtv 20. kvě 2021, 14:08
-- Verze serveru: 10.4.10-MariaDB
-- Verze PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pdo`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `predmety`
--

DROP TABLE IF EXISTS `predmety`;
CREATE TABLE IF NOT EXISTS `predmety` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `zkratka` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `nazev` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `predmety`
--

INSERT INTO `predmety` (`ID`, `zkratka`, `nazev`) VALUES
(1, 'MT', 'Matematika'),
(2, 'WA', 'Webové aplikace');

-- --------------------------------------------------------

--
-- Struktura tabulky `zaci`
--

DROP TABLE IF EXISTS `zaci`;
CREATE TABLE IF NOT EXISTS `zaci` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `trida` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `login` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `zaci`
--

INSERT INTO `zaci` (`ID`, `jmeno`, `prijmeni`, `trida`, `login`) VALUES
(1, 'Tomáš', 'Dostál', '3.E', 'dostalto18'),
(2, 'Marek', 'Halamka', '3.E', 'halamkma18'),
(3, 'Jan', 'Trunec', '3.E', 'trunecja18'),
(4, 'Filip', 'kremenak', '3.E', 'kremenfi18');

-- --------------------------------------------------------

--
-- Struktura tabulky `znamky`
--

DROP TABLE IF EXISTS `znamky`;
CREATE TABLE IF NOT EXISTS `znamky` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `znamka` char(1) COLLATE utf8_czech_ci NOT NULL,
  `popis` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `znamky`
--

INSERT INTO `znamky` (`ID`, `znamka`, `popis`) VALUES
(1, '1', 'Velmi dobré'),
(2, '2', 'Chvalitebný'),
(3, '3', 'Dobrý'),
(4, '4', 'Dostatečný'),
(5, '5', 'Nedostatečný'),
(6, 'N', 'Neklasifikován'),
(7, 'U', 'Uvolněn');

-- --------------------------------------------------------

--
-- Struktura tabulky `znamkyzaku`
--

DROP TABLE IF EXISTS `znamkyzaku`;
CREATE TABLE IF NOT EXISTS `znamkyzaku` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `znamka` char(1) COLLATE utf8_czech_ci NOT NULL,
  `datum` date NOT NULL,
  `predmet` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `znamkyzaku`
--

INSERT INTO `znamkyzaku` (`ID`, `login`, `znamka`, `datum`, `predmet`) VALUES
(1, 'dostalto18', '5', '2021-05-20', 'MT'),
(2, 'dostalto18', '3', '2021-05-20', 'MT'),
(3, 'trunecja18', '2', '2021-05-20', 'WA'),
(4, 'halamkma18', 'U', '2021-05-20', 'WA'),
(5, 'kremenfi18', 'N', '2021-05-20', 'WA'),
(6, 'dostalto18', '1', '2021-05-20', 'MT'),
(7, 'trunecja18', '4', '2021-05-20', 'MT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
