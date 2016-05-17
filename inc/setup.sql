-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2016 at 10:39 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c9`
--

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(7) NOT NULL,
  `bib` smallint(4) DEFAULT NULL,
  `bib_update` timestamp NULL DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `age` tinyint(2) NOT NULL,
  `birthday` date NOT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `speed` float DEFAULT NULL,
  `spd1` float DEFAULT NULL,
  `spd2` float DEFAULT NULL,
  `jump` float DEFAULT NULL,
  `jmp1` float DEFAULT NULL,
  `jmp2` float DEFAULT NULL,
  `pu` int(3) DEFAULT NULL,
  `leap` float DEFAULT NULL,
  `lp1` float DEFAULT NULL,
  `lp2` float DEFAULT NULL,
  `stn5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `bib` (`bib`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ucinetid`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `major` (`major`),
  ADD KEY `access` (`access`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
