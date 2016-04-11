-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 09:18 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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
(7, '2018-03-10 03:18:17', 1, '5.88', '7.50', '15.62', '25.80', '26.53', '14.55', '8.18', '4.86'),
(8, '0000-00-00 00:00:00', 1, '0.00', '0.00', '1.02', '2.54', '7.43', '2.54', '1.02', '0.00'),
(9, '2016-03-10 03:18:17', 1, '20.76', '50.67', '100.54', '120.76', '144.75', '120.09', '100.02', '50.01'),
(10, '2016-03-22 12:45:34', 1, '144.87', '143.67', '142.65', '142.56', '144.78', '144.73', '142.67', '143.53');

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
(24, 1, '2018-04-02 08:16:00', 4000),
(25, 1, '2015-03-12 22:56:35', 8687),
(26, 1, '2016-04-12 08:16:00', 7667),
(27, 1, '2015-08-16 10:23:12', 8743),
(28, 1, '2016-04-07 07:43:12', 5467),
(29, 1, '2016-01-02 12:32:10', 5432),
(30, 1, '2015-08-21 11:21:32', 6573),
(31, 1, '2015-11-11 10:22:12', 8632),
(32, 1, '2015-10-21 05:21:12', 7632),
(33, 1, '2015-08-12 23:43:12', 9862),
(34, 1, '2015-04-12 08:16:00', 7667),
(35, 1, '2016-02-23 14:12:40', 4567),
(36, 1, '2015-01-23 07:22:12', 6473),
(37, 1, '2015-02-24 10:21:41', 5674),
(38, 1, '2015-03-14 11:17:17', 9723),
(39, 2, '2015-04-15 19:34:12', 5673),
(40, 2, '2015-06-13 10:12:12', 6753),
(41, 2, '2015-05-14 12:32:43', 8732),
(42, 2, '2016-04-01 12:23:10', 5643),
(43, 2, '2015-03-03 08:23:12', 4563),
(44, 2, '2016-07-12 23:32:12', 7634),
(45, 2, '2015-02-24 09:21:54', 9732),
(46, 2, '2015-11-23 01:43:54', 8632),
(47, 2, '2015-12-17 21:32:43', 8763),
(48, 2, '0000-00-00 00:00:00', 9854),
(49, 2, '2015-05-21 12:32:25', 6537),
(50, 2, '2015-01-12 16:23:45', 8736),
(51, 2, '2015-03-20 18:32:14', 7632),
(52, 2, '2015-07-11 09:13:43', 8762),
(53, 2, '2015-08-23 09:12:45', 7643),
(54, 2, '2015-11-22 12:54:32', 4053),
(55, 2, '2015-12-19 09:12:10', 3458),
(56, 2, '2016-03-22 06:21:43', 10532),
(57, 2, '2015-06-12 17:32:54', 7832),
(58, 2, '2016-01-02 01:56:18', 9863),
(59, 2, '2015-12-18 14:16:26', 8723),
(60, 2, '2015-02-12 01:04:49', 8734),
(61, 2, '2015-12-12 14:09:12', 7563),
(62, 2, '2015-09-23 23:43:59', 6537),
(63, 2, '2015-01-02 06:46:29', 7863),
(64, 2, '2015-02-16 16:24:37', 8753);

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
(81, '2016-04-10 10:40:43', '43.0', '62.04'),
(83, '2015-04-10 22:47:21', '43.1', '61.60'),
(84, '2015-03-22 01:05:20', '37.2', '61.20'),
(85, '2015-01-02 19:23:32', '20.1', '61.60'),
(86, '2015-01-07 01:05:20', '32.2', '60.20'),
(87, '2015-01-12 21:12:08', '31.8', '61.80'),
(88, '2015-01-17 21:43:15', '24.7', '62.60'),
(89, '2015-01-20 09:23:14', '32.2', '60.20'),
(90, '2015-01-25 17:24:09', '31.8', '61.80'),
(91, '2015-01-29 18:09:42', '35.8', '62.40'),
(92, '2015-01-31 17:32:12', '36.4', '63.10'),
(93, '2015-02-03 13:28:12', '37.2', '58.70'),
(94, '2015-02-08 15:02:18', '28.7', '53.10'),
(95, '2015-02-13 10:43:28', '41.8', '63.90'),
(96, '2015-02-16 14:23:14', '25.5', '64.60'),
(97, '2015-02-21 12:32:21', '26.4', '60.80'),
(98, '2015-02-26 17:32:19', '41.5', '62.80'),
(99, '2015-02-28 18:12:18', '37.6', '60.70'),
(100, '2015-03-03 18:12:24', '31.5', '63.20'),
(101, '2015-03-09 23:34:08', '40.2', '61.80'),
(102, '2015-03-14 15:23:18', '47.9', '58.20'),
(103, '2015-03-21 16:07:22', '43.1', '63.90'),
(104, '2015-03-28 12:32:34', '40.9', '61.50'),
(105, '2015-03-31 10:23:58', '49.6', '61.50'),
(106, '2015-04-04 18:32:19', '50.9', '63.70'),
(107, '2015-04-10 22:12:32', '52.6', '63.90'),
(108, '2015-04-16 12:06:17', '48.3', '64.80'),
(109, '2015-04-20 16:32:47', '42.5', '62.60'),
(110, '2015-04-25 04:23:13', '58.9', '63.50'),
(111, '2015-04-30 23:43:12', '57.5', '60.20'),
(112, '2015-05-05 10:21:08', '60.2', '63.50'),
(113, '2015-05-10 18:32:14', '52.7', '62.80'),
(114, '2015-05-14 17:23:12', '68.4', '68.30'),
(115, '2015-05-20 09:23:43', '70.1', '70.90'),
(116, '2015-05-27 18:32:56', '60.7', '65.40'),
(117, '2015-05-31 05:10:17', '71.8', '68.90'),
(118, '2015-06-06 10:15:36', '78.2', '70.50'),
(119, '2015-06-12 06:23:42', '63.5', '73.60'),
(120, '2015-06-17 16:23:53', '77.8', '69.40'),
(121, '2015-06-23 04:46:13', '69.2', '73.40'),
(122, '2015-06-20 15:21:18', '62.4', '73.40'),
(123, '2015-07-07 19:21:43', '83.7', '69.60'),
(124, '2015-07-13 18:09:14', '68.6', '60.30'),
(125, '2015-07-20 10:57:13', '78.6', '68.50'),
(126, '2015-07-29 16:19:52', '80.8', '68.40'),
(127, '2015-07-25 06:16:09', '70.7', '66.10'),
(128, '2015-08-03 03:10:07', '67.9', '65.70'),
(129, '2015-08-09 04:12:32', '78.9', '70.50'),
(130, '2015-08-14 02:43:23', '79.9', '60.90'),
(131, '2015-08-18 16:20:43', '81.0', '63.90'),
(132, '2015-08-25 08:15:26', '68.5', '64.80'),
(133, '2015-08-31 14:10:14', '71.5', '66.80'),
(134, '2015-09-03 08:14:23', '53.6', '75.70'),
(135, '2015-09-09 18:10:56', '70.4', '72.30'),
(137, '2015-09-19 10:07:15', '74.8', '63.70'),
(138, '2015-09-25 18:00:12', '56.8', '68.70'),
(139, '2015-09-30 20:14:20', '59.4', '69.30'),
(140, '2015-10-04 08:14:03', '57.6', '73.70'),
(141, '2015-10-08 15:23:18', '60.6', '70.10'),
(142, '2015-10-13 16:11:52', '49.8', '67.50'),
(143, '2015-10-22 09:12:53', '54.3', '71.90'),
(144, '2015-10-27 11:43:41', '54.8', '74.50'),
(145, '2015-10-31 09:12:32', '63.4', '71.50'),
(146, '2015-11-02 10:17:09', '43.9', '68.20'),
(147, '2015-11-07 08:16:18', '50.2', '66.50'),
(148, '2015-11-14 16:08:23', '49.8', '68.70'),
(149, '2015-11-19 06:54:17', '50.8', '70.80'),
(150, '2015-11-27 09:23:43', '39.2', '65.90'),
(151, '2015-11-30 12:13:56', '53.9', '68.50'),
(152, '2015-12-01 18:27:45', '27.9', '64.90'),
(153, '2015-12-09 10:15:36', '35.9', '63.70'),
(154, '2015-12-14 06:23:42', '29.8', '63.60'),
(155, '2015-12-18 16:23:53', '40.3', '64.70'),
(156, '2015-12-23 18:23:09', '38.7', '67.40'),
(157, '2015-12-27 19:27:05', '43.8', '65.40');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hive`
--
ALTER TABLE `hive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `lighthistory`
--
ALTER TABLE `lighthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `outsidetemp`
--
ALTER TABLE `outsidetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
