-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2018 at 02:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_silcu`
--
CREATE DATABASE IF NOT EXISTS `db_silcu` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `db_silcu`;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` tinyint(2) NOT NULL,
  `bulan` tinyint(2) NOT NULL,
  `tahun` smallint(4) NOT NULL,
  `creator` varchar(50) COLLATE utf8_bin NOT NULL,
  `lokasi` varchar(30) COLLATE utf8_bin NOT NULL,
  `spk_keluar` float NOT NULL,
  `spk_dilak` float NOT NULL,
  `spk_tdkdilak` float NOT NULL,
  `spk_pk` float NOT NULL,
  `spk_water` float NOT NULL,
  `spk_slbaru` float NOT NULL,
  `kl` float NOT NULL,
  `ku` float NOT NULL,
  `kon` float NOT NULL,
  `bocor` float NOT NULL,
  `dll` float NOT NULL,
  `putus_ku2` float NOT NULL,
  `putus_sl2` float NOT NULL,
  `jml_sl` float NOT NULL,
  `jml_ku` float NOT NULL,
  `baru_sl` float NOT NULL,
  `baru_ku` float NOT NULL,
  `pk_sl` float NOT NULL,
  `pk_ku` float NOT NULL,
  `mutarif_sl` float NOT NULL,
  `mutarif_ku` float NOT NULL,
  `putus_sl1` float NOT NULL,
  `putus_ku1` float NOT NULL,
  `verifikasi` bit(1) NOT NULL,
  `ver_by` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `realname` varchar(50) COLLATE utf8_bin NOT NULL,
  `locations` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `realname`, `locations`, `password`, `level`) VALUES
('admin', 'SUPER USER INDRAMAYU', 'Indramayu', 'acafbd15095bec34cc4100858934196a', 1),
('adminku', 'Admin Lain di Sini', 'Jawa barat', 'ea0fdf8063f51e19b25f8a05b84d04e3', 1),
('lohbener', 'ADMIN LOHBENER', 'Lohbener', 'ea0fdf8063f51e19b25f8a05b84d04e3', 2),
('lohbenerisi', 'PETUGAS ISI LOHBENER', 'Lohbener', 'ea0fdf8063f51e19b25f8a05b84d04e3', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`),
  ADD KEY `ver_by` (`ver_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `realname` (`realname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`realname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_ibfk_2` FOREIGN KEY (`ver_by`) REFERENCES `users` (`realname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
