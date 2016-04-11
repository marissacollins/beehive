-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2016 at 09:28 PM
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

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hiveID` int(11) NOT NULL,
  `frequency` blob,
  `frequencyStatus` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `datetime`, `hiveID`, `frequency`, `frequencyStatus`) VALUES
(95, '2016-03-04 00:00:00', 1, NULL, 'good'),
(96, '2016-03-04 22:53:34', 1, NULL, 'bad'),
(97, '2016-03-02 04:20:00', 1, NULL, 'good'),
(98, '2016-03-03 00:00:00', 2, NULL, 'good'),
(99, '2016-03-05 10:15:15', 1, NULL, 'good'),
(100, '2016-03-05 10:15:15', 2, NULL, 'good'),
(101, '2016-03-05 10:15:41', 1, NULL, 'good'),
(102, '2016-03-05 10:15:41', 2, NULL, 'good'),
(103, '2016-03-05 10:16:12', 1, NULL, 'good'),
(104, '2016-03-05 10:16:12', 2, NULL, 'good'),
(105, '2016-03-05 10:16:52', 1, NULL, 'good'),
(106, '2016-03-05 10:16:52', 2, NULL, 'good'),
(107, '2016-03-05 10:17:23', 1, NULL, 'good'),
(108, '2016-03-05 10:17:23', 2, NULL, 'good'),
(109, '2016-03-05 10:17:55', 1, NULL, 'good'),
(110, '2016-03-05 10:17:55', 2, NULL, 'good'),
(111, '2016-03-05 10:18:16', 1, NULL, 'good'),
(112, '2016-03-05 10:18:16', 2, NULL, 'good'),
(113, '2016-03-05 10:18:44', 1, NULL, 'good'),
(114, '2016-03-05 10:18:44', 2, NULL, 'good'),
(115, '2016-03-05 10:19:08', 1, NULL, 'good'),
(116, '2016-03-05 10:19:08', 2, NULL, 'good'),
(117, '2016-03-09 04:11:11', 1, NULL, 'good'),
(118, '0000-00-00 00:00:00', 3, NULL, ''),
(119, '2016-03-05 10:00:00', 3, NULL, 'good'),
(120, '2016-03-05 10:00:01', 3, NULL, 'good'),
(121, '2016-03-05 11:00:01', 3, NULL, 'good'),
(122, '2016-03-05 11:00:01', 1, NULL, 'good'),
(123, '2016-03-05 10:00:00', 1, NULL, 'good'),
(124, '0000-00-00 00:00:00', 1, NULL, ''),
(126, '2016-03-13 11:00:00', 1, NULL, 'good'),
(127, '2016-03-13 23:53:34', 1, NULL, 'bad'),
(128, '2016-03-23 11:00:00', 1, NULL, 'good'),
(129, '2016-03-23 23:53:34', 1, NULL, 'bad');

-- --------------------------------------------------------

--
-- Table structure for table `frameweight`
--

CREATE TABLE `frameweight` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hiveID` int(11) NOT NULL,
  `frameweight1` decimal(5,2) NOT NULL,
  `frameweight2` decimal(5,2) NOT NULL,
  `frameweight3` decimal(5,2) NOT NULL,
  `frameweight4` decimal(5,2) NOT NULL,
  `frameweight5` decimal(5,2) NOT NULL,
  `frameweight6` decimal(5,2) NOT NULL,
  `frameweight7` decimal(5,2) NOT NULL,
  `frameweight8` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frameweight`
--

INSERT INTO `frameweight` (`id`, `datetime`, `hiveID`, `frameweight1`, `frameweight2`, `frameweight3`, `frameweight4`, `frameweight5`, `frameweight6`, `frameweight7`, `frameweight8`) VALUES
(1, '2016-03-09 03:18:17', 1, '5.88', '7.50', '15.62', '25.80', '26.53', '14.55', '8.18', '4.86'),
(2, '2016-03-23 07:19:05', 1, '7.06', '11.35', '15.67', '35.00', '32.10', '17.30', '10.21', '6.05'),
(3, '2016-03-17 08:13:39', 1, '3.06', '5.08', '11.35', '20.60', '21.00', '10.50', '6.30', '2.50'),
(4, '2016-03-02 04:17:17', 1, '2.00', '2.00', '2.50', '9.87', '10.11', '3.50', '2.00', '2.00'),
(5, '2016-03-23 07:27:22', 2, '5.00', '8.00', '16.00', '25.00', '26.00', '15.00', '7.00', '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `hive`
--

CREATE TABLE `hive` (
  `id` int(11) NOT NULL,
  `hiveID` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temp` decimal(4,1) NOT NULL,
  `weight` varchar(40) NOT NULL,
  `humidity` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hive`
--

INSERT INTO `hive` (`id`, `hiveID`, `name`, `datetime`, `temp`, `weight`, `humidity`) VALUES
(1, 1, 'hive1', '2016-01-19 21:34:36', '93.5', 'good', '62.00'),
(2, 2, 'hive2', '2016-02-01 00:00:00', '88.2', 'good', '89.50'),
(3, 1, 'hive1', '2016-02-02 10:10:31', '90.8', 'good', '68.00'),
(4, 2, 'hive2', '2016-02-03 10:10:31', '95.0', 'good', '69.50'),
(5, 1, 'hive1', '2016-02-04 10:11:18', '92.0', 'good', '65.30'),
(6, 2, 'hive2', '2016-02-05 10:11:18', '96.0', 'good', '69.50'),
(7, 1, 'hive1', '2016-02-05 10:11:56', '98.5', 'good', '62.50'),
(8, 2, 'hive2', '2016-02-06 10:11:56', '91.5', 'good', '65.30'),
(9, 1, 'hive1', '2016-02-07 10:14:46', '35.0', 'good', '65.20'),
(10, 2, 'hive2', '2016-02-08 10:14:46', '95.5', 'good', '32.50'),
(14, 2, 'hive2', '2016-02-12 10:22:09', '92.5', 'good', '68.50'),
(15, 1, 'hive1', '2016-02-14 10:22:10', '92.4', 'good', '63.80'),
(16, 1, 'hive1', '2016-02-16 10:23:31', '95.4', 'good', '67.50'),
(17, 2, 'hive2', '2016-02-18 10:23:31', '93.5', 'good', '63.80'),
(18, 1, 'hive1', '2016-02-25 10:25:03', '95.4', 'good', '69.40'),
(19, 2, 'hive2', '2016-03-05 10:25:03', '93.5', 'good', '68.50'),
(20, 1, 'hive1', '2016-03-09 09:14:15', '96.8', 'good', '66.10');

-- --------------------------------------------------------

--
-- Table structure for table `lighthistory`
--

CREATE TABLE `lighthistory` (
  `id` int(11) NOT NULL,
  `hiveID` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lighthistory`
--

INSERT INTO `lighthistory` (`id`, `hiveID`, `datetime`, `lumen`) VALUES
(1, 1, '2016-03-04 22:56:35', 7687),
(2, 2, '2016-03-03 08:16:00', 6667),
(3, 1, '2016-03-05 10:26:56', 6845),
(4, 2, '2016-03-05 10:26:56', 605),
(5, 1, '2016-03-05 10:27:11', 982),
(6, 2, '2016-03-05 10:27:11', 2568),
(7, 1, '2016-03-05 10:27:23', 698),
(8, 2, '2016-03-05 10:27:23', 3569),
(9, 1, '2016-03-05 10:27:39', 3512),
(10, 2, '2016-03-05 10:27:39', 960),
(11, 1, '2016-03-05 10:27:54', 6520),
(12, 2, '2016-03-05 10:27:54', 657),
(13, 1, '2016-03-05 10:28:05', 3612),
(14, 2, '2016-03-05 10:28:05', 1238),
(15, 1, '2016-03-05 10:28:17', 1354),
(16, 2, '2016-03-05 10:28:17', 930);

-- --------------------------------------------------------

--
-- Table structure for table `outsidetemp`
--

CREATE TABLE `outsidetemp` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temp` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outsidetemp`
--

INSERT INTO `outsidetemp` (`id`, `datetime`, `temp`) VALUES
(1, '2016-02-04 22:40:43', '72.0'),
(69, '2016-02-02 00:00:00', '69.2'),
(70, '2016-02-08 00:00:00', '67.5'),
(71, '2016-02-12 00:00:00', '56.7'),
(76, '2016-02-16 10:32:24', '67.0'),
(77, '2016-02-22 10:32:57', '69.5'),
(78, '2016-02-24 10:33:07', '65.0'),
(79, '2016-02-28 10:33:17', '70.0'),
(80, '2016-03-05 10:33:25', '72.0');

-- --------------------------------------------------------

--
-- Table structure for table `population`
--

CREATE TABLE `population` (
  `id` int(11) NOT NULL,
  `hiveID` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(30) NOT NULL,
  `picture` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `population`
--

INSERT INTO `population` (`id`, `hiveID`, `datetime`, `count`, `picture`) VALUES
(1, 1, '2016-03-04 22:32:28', 3322, ''),
(2, 2, '2016-03-04 22:34:23', 12312, NULL),
(3, 1, '2016-03-01 00:00:00', 2233, NULL),
(4, 2, '2016-03-02 00:00:00', 223132, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datetime` (`datetime`,`hiveID`),
  ADD KEY `hive` (`hiveID`);

--
-- Indexes for table `frameweight`
--
ALTER TABLE `frameweight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datetime` (`datetime`,`hiveID`);

--
-- Indexes for table `hive`
--
ALTER TABLE `hive`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hiveID` (`hiveID`,`datetime`),
  ADD UNIQUE KEY `name` (`name`,`datetime`);

--
-- Indexes for table `lighthistory`
--
ALTER TABLE `lighthistory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datetime` (`datetime`,`lumen`),
  ADD UNIQUE KEY `hiveID` (`hiveID`,`datetime`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datetime` (`datetime`),
  ADD UNIQUE KEY `hiveID` (`hiveID`,`datetime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `frameweight`
--
ALTER TABLE `frameweight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hive`
--
ALTER TABLE `hive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lighthistory`
--
ALTER TABLE `lighthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `outsidetemp`
--
ALTER TABLE `outsidetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
