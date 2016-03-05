-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 04:01 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honeybee`
--
CREATE DATABASE IF NOT EXISTS `honeybee` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `honeybee`;

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

DROP TABLE IF EXISTS `audio`;
CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hiveID` int(11) NOT NULL,
  `frequency` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `audio`:
--   `hiveID`
--       `hive` -> `id`
--

--
-- Truncate table before insert `audio`
--

TRUNCATE TABLE `audio`;
-- --------------------------------------------------------

--
-- Table structure for table `hive`
--

DROP TABLE IF EXISTS `hive`;
CREATE TABLE `hive` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temp` decimal(4,1) NOT NULL,
  `weight` decimal(6,2) NOT NULL,
  `humidity` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `hive`:
--

--
-- Truncate table before insert `hive`
--

TRUNCATE TABLE `hive`;
--
-- Dumping data for table `hive`
--

INSERT INTO `hive` (`id`, `name`, `datetime`, `temp`, `weight`, `humidity`) VALUES(1, 'hive1', '2016-01-19 21:34:36', '66.5', '95.00', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `outsidetemp`
--

DROP TABLE IF EXISTS `outsidetemp`;
CREATE TABLE `outsidetemp` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temp` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `outsidetemp`:
--

--
-- Truncate table before insert `outsidetemp`
--

TRUNCATE TABLE `outsidetemp`;
-- --------------------------------------------------------

--
-- Table structure for table `population`
--

DROP TABLE IF EXISTS `population`;
CREATE TABLE `population` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(30) NOT NULL,
  `picture` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `population`:
--

--
-- Truncate table before insert `population`
--

TRUNCATE TABLE `population`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hive` (`hiveID`);

--
-- Indexes for table `hive`
--
ALTER TABLE `hive`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`datetime`);

--
-- Indexes for table `outsidetemp`
--
ALTER TABLE `outsidetemp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datetime` (`datetime`);

--
-- Indexes for table `population`
--
ALTER TABLE `population`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hive`
--
ALTER TABLE `hive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `outsidetemp`
--
ALTER TABLE `outsidetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audio`
--
ALTER TABLE `audio`
  ADD CONSTRAINT `hiveFK` FOREIGN KEY (`hiveID`) REFERENCES `hive` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
