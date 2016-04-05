-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 05:17 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `alertconfig`
--

DROP TABLE IF EXISTS `alertconfig`;
CREATE TABLE `alertconfig` (
  `id` int(20) NOT NULL,
  `hiveid` varchar(20) NOT NULL,
  `configkey` varchar(40) NOT NULL,
  `configvalue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alertconfig`
--

INSERT INTO `alertconfig` (`id`, `hiveid`, `configkey`, `configvalue`) VALUES
(1, 'All', 'hivetempmax', '100'),
(2, 'All', 'hivetempmin', '90'),
(3, 'All', 'hivehummax', '60'),
(4, 'All', 'hivehummin', '50'),
(5, 'All', 'framethreshold', '10'),
(6, 'All', 'lightmax', '10000'),
(7, 'All', 'popmax', '50'),
(8, 'All', 'popmin', '5');

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

DROP TABLE IF EXISTS `audio`;
CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hiveID` int(11) NOT NULL,
  `frequency` decimal(10,0) NOT NULL,
  `amplitude` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `datetime`, `hiveID`, `frequency`, `amplitude`) VALUES
(138, '2017-03-24 11:00:00', 1, '75', '22.20'),
(139, '2017-03-24 11:00:00', 1, '150', '50.50'),
(140, '2017-03-24 11:00:00', 1, '225', '10.80'),
(141, '2017-03-24 11:00:00', 1, '300', '90.50'),
(142, '2017-03-24 11:00:00', 1, '375', '46.70'),
(143, '2017-03-24 11:00:00', 1, '450', '85.60'),
(144, '2017-03-24 11:00:00', 1, '525', '10.70'),
(145, '2017-03-24 11:00:00', 1, '600', '5.50'),
(146, '2017-03-24 11:00:00', 1, '675', '68.20'),
(147, '2017-03-24 11:00:00', 1, '750', '25.70'),
(161, '2017-03-24 12:00:00', 1, '125', '20.20'),
(162, '2017-03-24 12:00:00', 1, '250', '10.30'),
(163, '2017-03-24 12:00:00', 1, '375', '5.70'),
(164, '2017-03-24 12:00:00', 1, '500', '50.60'),
(165, '2017-03-24 12:00:00', 1, '625', '20.60'),
(166, '2017-03-24 12:00:00', 1, '750', '55.40'),
(149, '2017-03-25 11:30:00', 1, '63', '45.20'),
(150, '2017-03-25 11:30:00', 1, '125', '51.50'),
(151, '2017-03-25 11:30:00', 1, '188', '65.80'),
(152, '2017-03-25 11:30:00', 1, '250', '70.50'),
(153, '2017-03-25 11:30:00', 1, '313', '72.70'),
(154, '2017-03-25 11:30:00', 1, '375', '80.60'),
(155, '2017-03-25 11:30:00', 1, '438', '85.70'),
(156, '2017-03-25 11:30:00', 1, '500', '87.50'),
(157, '2017-03-25 11:30:00', 1, '563', '75.20'),
(158, '2017-03-25 11:30:00', 1, '625', '65.70'),
(159, '2017-03-25 11:30:00', 1, '688', '55.70'),
(160, '2017-03-25 11:30:00', 1, '750', '45.70'),
(171, '2017-03-27 08:54:00', 2, '94', '25.20'),
(172, '2017-03-27 08:54:00', 2, '188', '15.30'),
(173, '2017-03-27 08:54:00', 2, '281', '54.70'),
(174, '2017-03-27 08:54:00', 2, '375', '5.60'),
(175, '2017-03-27 08:54:00', 2, '469', '24.60'),
(176, '2017-03-27 08:54:00', 2, '563', '5.60'),
(177, '2017-03-27 08:54:00', 2, '656', '2.60'),
(178, '2017-03-27 08:54:00', 2, '750', '85.40'),
(167, '2017-04-25 11:35:00', 2, '188', '12.20'),
(168, '2017-04-25 11:35:00', 2, '375', '18.50'),
(169, '2017-04-25 11:35:00', 2, '563', '35.80'),
(170, '2017-04-25 11:35:00', 2, '750', '40.70');

-- --------------------------------------------------------

--
-- Table structure for table `frameweight`
--

DROP TABLE IF EXISTS `frameweight`;
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
(5, '2016-03-23 07:27:22', 2, '5.00', '8.00', '16.00', '25.00', '26.00', '15.00', '7.00', '6.00'),
(6, '2017-03-10 03:18:17', 1, '5.88', '7.50', '15.62', '25.80', '26.53', '14.55', '8.18', '4.86'),
(7, '2018-03-10 03:18:17', 1, '5.88', '7.50', '15.62', '25.80', '26.53', '14.55', '8.18', '4.86');

-- --------------------------------------------------------

--
-- Table structure for table `hive`
--

DROP TABLE IF EXISTS `hive`;
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
(20, 1, 'hive1', '2016-03-09 09:14:15', '96.8', 'good', '66.10'),
(21, 1, 'hive1', '2017-02-19 22:34:36', '93.5', '', '62.00'),
(22, 1, 'hive1', '2017-02-18 01:00:00', '88.2', '', '89.50'),
(23, 1, 'hive1', '2018-02-19 22:34:36', '93.5', '', '62.00'),
(24, 1, 'hive1', '2018-02-18 01:00:00', '88.2', '', '89.50'),
(25, 1, 'hive1', '2019-06-30 07:06:21', '106.2', 'good', '85.50'),
(26, 1, 'hive1', '2016-01-19 12:34:30', '93.5', '', '50.23'),
(27, 1, 'hive1', '2016-04-08 20:20:13', '75.4', '', '53.70'),
(28, 1, 'hive1', '2016-02-02 17:25:17', '81.3', '', '59.70'),
(29, 1, 'hive1', '2016-04-18 10:02:36', '85.2', '', '59.30'),
(30, 1, 'hive1', '2016-02-15 09:02:12', '90.5', '', '52.06'),
(31, 1, 'hive1', '2016-04-01 23:56:21', '87.2', '', '54.32'),
(32, 1, 'hive1', '2015-11-13 14:32:52', '76.8', '', '40.40'),
(33, 1, 'hive1', '2015-08-13 05:21:12', '47.5', '', '45.10'),
(34, 1, 'hive1', '2015-09-30 14:12:08', '83.2', '', '70.63'),
(35, 1, 'hive1', '2016-08-21 12:21:40', '98.8', '', '61.86'),
(36, 1, 'hive1', '2015-06-25 12:47:21', '98.4', '', '57.00'),
(37, 1, 'hive1', '2016-03-22 17:21:40', '108.3', '', '32.06'),
(38, 1, 'hive1', '2015-07-11 09:55:22', '100.5', '', '60.04'),
(39, 1, 'hive1', '2015-10-26 10:21:16', '87.8', '', '51.80'),
(40, 1, 'hive1', '2016-01-19 18:56:16', '49.2', '', '68.30'),
(41, 1, 'hive1', '2016-03-15 08:17:57', '99.5', '', '51.13'),
(42, 1, 'hive1', '2016-03-22 16:20:15', '89.4', '', '58.80'),
(43, 1, 'hive1', '2015-05-16 02:46:12', '88.5', '', '60.05'),
(44, 1, 'hive1', '2015-07-13 18:12:21', '91.8', '', '57.22'),
(45, 1, 'hive1', '2016-02-28 15:34:57', '95.3', '', '52.12'),
(46, 1, 'hive1', '2016-03-04 14:52:12', '87.4', '', '50.80'),
(47, 1, 'hive1', '0000-00-00 00:00:00', '96.8', '', '52.50'),
(48, 1, 'hive1', '2016-03-21 12:56:23', '113.7', '', '51.60'),
(49, 1, 'hive1', '2015-08-07 23:17:32', '100.5', '', '54.87'),
(50, 1, 'hive1', '2016-04-11 20:13:54', '105.3', '', '54.20'),
(51, 1, 'hive1', '2016-03-12 18:34:21', '47.5', '', '54.12'),
(52, 1, 'hive1', '2016-04-02 10:21:32', '119.0', '', '59.03'),
(53, 1, 'hive1', '2015-06-14 21:54:34', '85.3', '', '52.15'),
(54, 1, 'hive1', '2015-11-20 16:21:32', '92.1', '', '51.73'),
(55, 1, 'hive1', '2015-04-18 13:42:21', '78.2', '', '58.22'),
(56, 1, 'hive1', '2016-01-24 16:23:43', '93.1', '', '56.21'),
(57, 1, 'hive1', '2016-01-26 05:36:27', '110.0', '', '54.21'),
(58, 1, 'hive1', '2016-02-17 17:32:17', '120.5', '', '54.77'),
(59, 1, 'hive1', '2016-03-19 19:12:43', '123.4', '', '57.23'),
(60, 1, 'hive1', '2015-05-20 09:55:21', '83.2', '', '53.20'),
(61, 1, 'hive1', '2016-02-02 03:32:43', '58.7', '', '50.12'),
(62, 1, 'hive1', '2015-08-13 05:23:42', '67.2', '', '51.64'),
(63, 1, 'hive1', '2015-06-21 03:21:56', '73.8', '', '53.50'),
(64, 1, 'hive1', '2016-04-04 06:14:53', '83.4', '', '58.20'),
(65, 1, 'hive1', '2015-02-15 05:56:21', '88.5', '', '61.29'),
(66, 1, 'hive1', '2016-01-29 17:21:41', '114.3', '', '56.30'),
(67, 1, 'hive1', '2015-03-14 03:46:12', '91.6', '', '62.56'),
(68, 1, 'hive1', '2016-04-05 12:10:21', '92.3', '', '63.10'),
(69, 1, 'hive1', '2015-05-21 06:21:12', '76.3', '', '59.23'),
(70, 1, 'hive1', '2016-03-17 15:32:54', '83.2', '', '52.60'),
(71, 1, 'hive1', '2015-10-19 05:08:09', '109.4', '', '50.50'),
(72, 1, 'hive1', '2015-12-16 17:21:57', '90.7', '', '56.30'),
(73, 1, 'hive1', '2016-02-07 10:21:32', '107.4', '', '57.30');

-- --------------------------------------------------------

--
-- Table structure for table `lighthistory`
--

DROP TABLE IF EXISTS `lighthistory`;
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
(16, 2, '2016-03-05 10:28:17', 930),
(17, 1, '2017-03-12 22:56:35', 7687),
(18, 1, '2017-03-12 08:16:00', 6667),
(19, 1, '2018-03-12 22:56:35', 7687),
(20, 1, '2018-03-12 08:16:00', 6667),
(21, 1, '2016-03-24 08:02:17', 7494),
(22, 1, '2016-03-25 11:17:50', 7870),
(23, 1, '2018-04-02 22:56:35', 3000),
(24, 1, '2018-04-02 08:16:00', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `outsidetemp`
--

DROP TABLE IF EXISTS `outsidetemp`;
CREATE TABLE `outsidetemp` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temp` decimal(4,1) NOT NULL,
  `humidity` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outsidetemp`
--

INSERT INTO `outsidetemp` (`id`, `datetime`, `temp`, `humidity`) VALUES
(1, '2016-02-04 22:40:43', '72.0', '78.20'),
(69, '2016-02-02 00:00:00', '69.2', '65.50'),
(70, '2016-02-08 00:00:00', '67.5', '68.60'),
(71, '2016-02-12 00:00:00', '56.7', '72.60'),
(76, '2016-02-16 10:32:24', '67.0', '81.50'),
(77, '2016-02-22 10:32:57', '69.5', '61.50'),
(78, '2016-02-24 10:33:07', '65.0', '65.00'),
(79, '2016-02-28 10:33:17', '70.0', '70.00'),
(80, '2016-03-05 10:33:25', '72.0', '71.20');

-- --------------------------------------------------------

--
-- Table structure for table `population`
--

DROP TABLE IF EXISTS `population`;
CREATE TABLE `population` (
  `id` int(11) NOT NULL,
  `hiveID` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(30) NOT NULL,
  `picurl` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `population`
--

INSERT INTO `population` (`id`, `hiveID`, `datetime`, `count`, `picurl`) VALUES
(1, 1, '2016-03-04 22:32:28', 3322, ''),
(2, 2, '2016-03-04 22:34:23', 12312, 'population_2016040335757000000_test.jpg'),
(3, 1, '2016-03-01 00:00:00', 2233, 'population_2016040335757000000_test.jpg'),
(4, 2, '2016-03-02 00:00:00', 223132, 'population_2016040335757000000_test.jpg'),
(5, 1, '2017-03-14 22:32:28', 3322, 'population_2016040335757000000_test.jpg'),
(6, 1, '2017-03-24 22:34:23', 12312, 'population_2016040335757000000_test.jpg'),
(7, 1, '2018-03-14 22:32:28', 3322, 'population_2016040335757000000_test.jpg'),
(8, 1, '2018-03-24 22:34:23', 12312, 'population_2016040335757000000_test.jpg'),
(9, 1, '2016-02-04 22:40:47', 15, 'population_2016040335757000000_test.jpg'),
(10, 1, '2016-03-04 22:40:47', 15, 'population_2016040335757000000_test.jpg'),
(11, 1, '2016-03-04 22:43:47', 15, 'population_2016040335757000000_test.jpg'),
(12, 1, '2016-03-04 22:43:57', 15, 'population_2016040335757000000_test.jpg'),
(13, 1, '2018-04-04 22:43:57', 15, 'population_2016040335749000000_test.jpg'),
(14, 1, '2018-04-05 22:43:57', 15, 'population_2016040335757000000_test.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alertconfig`
--
ALTER TABLE `alertconfig`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`hiveid`,`configkey`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FREQUENCY` (`hiveID`,`datetime`,`frequency`,`amplitude`),
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
-- AUTO_INCREMENT for table `alertconfig`
--
ALTER TABLE `alertconfig`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `frameweight`
--
ALTER TABLE `frameweight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hive`
--
ALTER TABLE `hive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `lighthistory`
--
ALTER TABLE `lighthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `outsidetemp`
--
ALTER TABLE `outsidetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
