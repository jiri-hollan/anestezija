-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Gostitelj: localhost:3306
-- Čas nastanka: 23. apr 2021 ob 20.53
-- Različica strežnika: 10.3.28-MariaDB-cll-lve
-- Različica PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `anestiz_navodila`
--

-- --------------------------------------------------------

--
-- Struktura tabele `uporabnikiTbl`
--

CREATE TABLE `uporabnikiTbl` (
  `id` int(10) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `geslo` text CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `ime` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `priimek` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `uporabnikiTbl`
--
ALTER TABLE `uporabnikiTbl`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
