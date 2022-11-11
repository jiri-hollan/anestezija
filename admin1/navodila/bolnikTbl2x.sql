-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Gostitelj: localhost:3306
-- Čas nastanka: 14. avg 2021 ob 09.17
-- Različica strežnika: 10.3.30-MariaDB-cll-lve
-- Različica PHP: 7.3.28

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
-- Struktura tabele `bolnikTbl2`
--

CREATE TABLE `bolnikTbl` (
  `pregledId` int(11) NOT NULL,
  `datPregleda` date DEFAULT NULL,
  `imeZdravnika` varchar(100) DEFAULT NULL,
  `stevMaticna` int(11) DEFAULT NULL,
  `EMSO` decimal(20,0) DEFAULT NULL,
  `dan` int(11) NOT NULL,
  `mesec` int(11) NOT NULL,
  `leto` int(11) NOT NULL,
  `datRojstva` varchar(100) DEFAULT NULL,
  `starost` decimal(3,0) DEFAULT NULL,
  `ime` varchar(100) DEFAULT NULL,
  `priimek` varchar(100) DEFAULT NULL,
  `oddelek` varchar(100) DEFAULT NULL,
  `dgOperativna` varchar(100) DEFAULT NULL,
  `opNacrtovana` varchar(100) DEFAULT NULL,
  `teza` decimal(5,0) DEFAULT NULL,
  `visina` decimal(4,2) DEFAULT NULL,
  `bmi` int(11) DEFAULT NULL,
  `krvniTlak` varchar(100) DEFAULT NULL,
  `pulz` decimal(3,0) DEFAULT NULL,
  `hb` decimal(3,0) DEFAULT NULL,
  `ks` decimal(3,1) DEFAULT NULL,
  `inr` decimal(3,1) DEFAULT NULL,
  `aptc` decimal(3,0) DEFAULT NULL,
  `trombociti` decimal(4,0) DEFAULT NULL,
  `kreatinin` decimal(3,0) DEFAULT NULL,
  `laktat` decimal(2,1) NOT NULL,
  `pbnp` decimal(3,0) NOT NULL,
  `pct` decimal(3,0) NOT NULL,
  `crp` decimal(3,0) NOT NULL,
  `na` int(3) NOT NULL,
  `k` int(2) NOT NULL,
  `drugiIzvidi` varchar(100) DEFAULT NULL,
  `ekg` varchar(255) DEFAULT NULL,
  `rtg` varchar(255) DEFAULT NULL,
  `dgPridruzene` varchar(255) DEFAULT NULL,
  `terPredhodna` varchar(255) DEFAULT NULL,
  `asa` int(11) DEFAULT NULL,
  `mallampati` int(11) DEFAULT NULL,
  `alergija` varchar(100) DEFAULT NULL,
  `izvidiInOpombe` longtext DEFAULT NULL,
  `premedVecer` varchar(100) DEFAULT NULL,
  `premedPredOp` varchar(100) DEFAULT NULL,
  `navodila` varchar(255) DEFAULT NULL,
  `sklep` varchar(255) DEFAULT NULL,
  `status` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `bolnikTbl2`
--
ALTER TABLE `bolnikTbl2`
  ADD PRIMARY KEY (`pregledId`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `bolnikTbl2`
--
ALTER TABLE `bolnikTbl2`
  MODIFY `pregledId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
