-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2016 at 05:02 AM
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
(1, '2015-01-03 15:54:43', 1, '68.86', '69.10', '70.54', '69.54', '71.65', '69.43', '68.15', '68.54'),
(2, '2015-01-09 10:24:54', 1, '64.75', '63.54', '65.87', '62.54', '67.43', '64.08', '61.76', '61.03'),
(3, '2015-01-16 07:24:21', 1, '59.23', '57.65', '60.43', '57.32', '62.43', '60.45', '58.02', '58.13'),
(4, '2015-01-23 09:25:54', 1, '56.13', '51.32', '57.09', '51.08', '57.09', '54.34', '51.43', '52.09'),
(5, '2015-01-28 18:09:24', 1, '50.43', '48.54', '52.87', '48.43', '53.54', '50.43', '48.83', '49.65'),
(6, '2015-02-04 12:16:43', 1, '47.54', '43.43', '46.54', '45.43', '48.43', '45.43', '41.54', '42.76'),
(7, '2015-02-07 12:16:43', 1, '41.43', '37.54', '39.54', '40.54', '40.54', '40.54', '37.54', '36.43'),
(8, '2015-02-10 22:11:32', 1, '36.32', '31.03', '32.43', '35.43', '34.54', '36.54', '32.43', '31.54'),
(9, '2015-02-14 08:09:43', 1, '32.65', '29.54', '28.43', '31.32', '31.84', '31.34', '27.43', '27.54'),
(10, '2015-02-19 13:10:54', 1, '28.31', '26.32', '24.43', '29.53', '28.54', '26.43', '21.43', '23.43'),
(11, '2015-02-24 08:14:54', 1, '21.54', '20.43', '19.54', '21.97', '22.43', '19.43', '18.43', '19.54'),
(12, '2015-02-28 08:54:23', 1, '18.24', '17.09', '17.34', '18.54', '18.43', '16.43', '15.32', '13.43'),
(13, '2015-03-04 22:43:56', 1, '18.24', '17.09', '17.34', '20.34', '23.98', '16.43', '15.32', '13.43'),
(14, '2015-03-08 09:23:57', 1, '18.24', '17.09', '17.34', '25.12', '27.43', '16.43', '15.32', '13.43'),
(15, '2015-03-13 07:23:54', 1, '18.24', '17.09', '17.34', '29.65', '28.54', '16.43', '15.32', '13.43'),
(16, '2015-03-20 19:43:52', 1, '18.24', '17.09', '17.34', '34.87', '29.76', '16.43', '15.32', '13.43'),
(17, '2015-03-24 08:14:52', 1, '18.24', '17.09', '17.34', '40.14', '32.98', '16.43', '15.32', '13.43'),
(18, '2015-03-29 15:23:57', 1, '18.24', '17.09', '17.34', '49.98', '39.21', '16.43', '15.32', '13.43'),
(19, '2015-04-04 06:23:54', 1, '18.24', '17.09', '17.34', '54.34', '40.87', '16.43', '15.32', '13.43'),
(20, '2015-04-09 10:23:54', 1, '18.24', '17.09', '17.34', '63.54', '41.12', '16.43', '15.32', '13.43'),
(21, '2015-04-12 14:56:32', 1, '18.24', '17.09', '17.34', '70.32', '43.54', '16.43', '15.32', '13.43'),
(22, '2015-04-19 10:32:54', 1, '18.24', '17.09', '17.34', '76.65', '45.02', '16.43', '15.32', '13.43'),
(23, '2015-04-23 20:32:54', 1, '18.24', '17.09', '17.34', '82.54', '48.16', '16.43', '15.32', '13.43'),
(24, '2015-04-30 07:21:54', 1, '18.24', '17.09', '17.34', '89.18', '48.98', '16.43', '15.32', '13.43'),
(25, '2015-05-04 18:06:43', 1, '18.24', '17.09', '17.34', '95.76', '59.76', '16.43', '15.32', '13.43'),
(26, '2015-05-10 14:16:58', 1, '18.24', '17.09', '17.34', '98.10', '62.98', '16.43', '15.32', '13.43'),
(27, '2015-05-16 18:08:23', 1, '18.24', '17.09', '19.43', '98.10', '65.54', '17.54', '15.32', '13.43'),
(28, '2015-05-21 14:23:54', 1, '18.24', '17.09', '23.65', '98.10', '71.43', '19.43', '15.32', '13.43'),
(29, '2015-05-29 17:32:54', 1, '18.24', '17.09', '27.65', '98.10', '78.43', '27.76', '15.32', '13.43'),
(30, '2015-06-03 21:32:56', 1, '18.24', '17.09', '31.76', '98.10', '84.65', '29.43', '15.32', '13.43'),
(31, '2015-06-09 11:23:54', 1, '18.24', '17.09', '39.54', '98.10', '90.03', '35.54', '15.32', '13.43'),
(32, '2015-06-16 08:32:43', 1, '18.24', '17.09', '39.54', '98.10', '97.98', '43.43', '23.43', '13.43'),
(33, '2015-06-21 10:23:54', 1, '19.05', '21.32', '47.54', '98.10', '97.98', '56.65', '27.54', '13.43'),
(34, '2015-06-27 13:43:54', 1, '19.05', '25.54', '64.65', '98.10', '97.98', '65.43', '27.54', '13.43'),
(35, '2015-06-30 11:24:09', 1, '24.40', '31.43', '79.43', '98.10', '97.98', '72.43', '34.54', '13.54'),
(36, '2015-07-04 13:54:26', 1, '34.32', '45.54', '85.43', '98.10', '97.98', '83.43', '31.43', '13.54'),
(37, '2015-07-10 16:34:54', 1, '34.65', '51.54', '97.76', '98.10', '97.98', '94.43', '45.54', '13.76'),
(38, '2015-07-16 16:02:13', 1, '46.54', '58.23', '97.76', '98.10', '97.98', '94.43', '53.43', '13.76'),
(39, '2015-07-23 14:56:23', 1, '56.43', '67.43', '97.76', '98.10', '97.98', '94.43', '65.34', '13.76'),
(40, '2015-07-29 20:34:54', 1, '61.43', '77.32', '97.76', '98.10', '97.98', '94.43', '74.43', '13.76'),
(41, '2015-08-05 18:43:08', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(42, '2015-08-16 10:23:56', 1, '0.00', '0.00', '0.00', '16.32', '5.82', '0.00', '0.00', '0.00'),
(43, '2015-08-23 09:12:43', 1, '0.00', '0.00', '9.43', '25.65', '10.43', '0.00', '0.00', '0.00'),
(44, '2015-08-31 05:54:34', 1, '0.00', '0.00', '15.32', '32.43', '16.40', '0.00', '0.00', '0.00'),
(45, '2015-09-06 11:22:54', 1, '0.00', '0.00', '24.54', '46.43', '21.43', '8.43', '0.00', '0.00'),
(46, '2015-09-11 13:43:54', 1, '0.00', '0.00', '31.43', '59.76', '23.65', '10.43', '0.00', '0.00'),
(47, '2015-09-18 15:23:54', 1, '0.00', '0.00', '41.43', '63.43', '32.43', '14.43', '0.00', '0.00'),
(48, '2015-09-23 17:43:54', 1, '0.00', '0.00', '58.43', '78.43', '45.54', '23.43', '0.00', '0.00'),
(49, '2015-09-30 23:09:11', 1, '100.00', '100.00', '100.00', '100.00', '100.00', '100.00', '100.00', '100.00'),
(50, '2015-10-08 17:43:23', 1, '99.87', '98.76', '99.43', '98.12', '98.87', '98.98', '97.98', '98.87'),
(51, '2015-10-13 16:43:54', 1, '98.76', '97.76', '98.10', '97.76', '97.98', '97.87', '97.43', '97.76'),
(52, '2015-10-19 17:34:54', 1, '98.16', '97.10', '97.86', '97.12', '97.54', '96.98', '97.04', '97.14'),
(53, '2015-10-24 14:56:23', 1, '97.98', '96.98', '97.32', '96.23', '96.12', '96.32', '96.12', '96.89'),
(54, '2015-10-31 07:54:23', 1, '97.03', '96.18', '96.56', '95.32', '95.83', '95.76', '95.76', '96.13'),
(55, '2015-11-02 16:43:09', 1, '95.19', '94.54', '94.21', '94.13', '93.54', '92.56', '92.54', '92.43'),
(56, '2015-11-10 14:23:56', 1, '92.43', '91.32', '90.43', '90.56', '89.32', '89.21', '89.32', '90.54'),
(57, '2015-11-19 13:43:56', 1, '88.32', '87.43', '87.72', '88.87', '86.53', '86.32', '86.98', '87.43'),
(58, '2015-11-23 14:43:23', 1, '85.65', '85.87', '85.76', '86.71', '85.98', '85.16', '84.87', '85.32'),
(59, '2015-11-30 18:02:14', 1, '83.65', '82.87', '82.86', '83.78', '82.32', '81.98', '81.76', '81.32'),
(60, '2015-12-09 10:23:54', 1, '80.32', '79.32', '79.78', '78.13', '79.52', '75.87', '78.32', '79.81'),
(61, '2015-12-16 11:43:54', 1, '78.76', '76.65', '76.45', '77.98', '77.65', '71.54', '75.87', '76.70'),
(62, '2015-12-23 19:32:54', 1, '76.35', '75.15', '73.87', '72.65', '72.98', '69.65', '71.65', '72.65'),
(63, '2015-12-29 23:43:12', 1, '74.17', '70.17', '69.17', '68.87', '68.18', '65.75', '68.54', '68.76'),
(64, '2015-12-31 12:32:54', 1, '70.76', '67.76', '67.65', '64.63', '64.87', '62.76', '66.32', '67.03'),
(65, '2016-01-02 10:43:54', 1, '68.32', '65.67', '65.13', '62.18', '61.32', '59.43', '62.08', '63.73'),
(66, '2016-01-13 11:02:32', 1, '65.32', '63.12', '61.43', '59.76', '58.56', '57.06', '59.73', '60.12'),
(67, '2016-01-22 15:32:43', 1, '62.32', '60.02', '59.68', '57.32', '56.72', '54.92', '56.12', '57.23'),
(68, '2016-01-30 05:10:04', 1, '57.32', '56.42', '56.65', '54.23', '52.87', '50.18', '50.19', '51.65'),
(69, '2016-02-05 06:13:32', 1, '52.32', '52.43', '51.76', '50.65', '49.32', '47.32', '47.87', '48.98'),
(70, '2016-02-10 04:43:54', 1, '46.23', '47.87', '47.87', '47.32', '46.76', '45.12', '42.87', '43.17'),
(71, '2016-02-15 06:09:10', 1, '40.08', '41.43', '41.43', '42.87', '40.02', '40.14', '39.76', '38.16'),
(72, '2016-02-17 12:43:09', 1, '36.43', '37.13', '36.21', '37.12', '35.12', '36.32', '31.43', '30.67'),
(73, '2016-02-27 05:23:43', 1, '30.43', '30.65', '30.43', '30.76', '30.32', '30.43', '27.09', '26.17'),
(74, '2016-03-02 11:08:54', 1, '30.43', '32.65', '36.18', '40.13', '38.32', '30.43', '27.09', '26.17'),
(75, '2016-03-10 08:12:43', 1, '30.43', '32.65', '37.08', '47.65', '40.04', '30.43', '27.09', '26.17'),
(76, '2016-03-18 10:43:54', 1, '30.43', '32.65', '38.34', '51.65', '45.32', '30.43', '27.09', '26.18'),
(77, '2016-03-25 09:23:14', 1, '30.43', '32.65', '40.13', '57.43', '48.14', '30.43', '27.09', '26.18'),
(78, '2016-03-31 09:23:09', 1, '30.43', '32.65', '45.54', '60.04', '50.17', '30.43', '27.09', '26.18'),
(79, '2016-04-02 14:08:43', 1, '30.43', '32.65', '47.87', '67.43', '55.76', '30.43', '27.09', '26.18'),
(80, '2016-04-09 12:13:08', 1, '30.43', '32.65', '49.12', '71.43', '58.12', '30.43', '27.09', '26.18'),
(81, '2016-04-16 17:23:07', 1, '30.43', '32.65', '51.43', '76.43', '60.32', '30.43', '27.03', '26.18'),
(82, '2016-04-19 07:13:43', 1, '30.43', '32.65', '51.98', '81.43', '61.09', '30.43', '27.03', '26.18'),
(83, '2016-04-23 05:14:43', 1, '30.43', '32.65', '52.01', '86.23', '62.01', '30.43', '27.03', '26.18');

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
(27, 1, '', '2015-01-05 10:34:36', '94.5', '', '51.43'),
(28, 1, '', '2015-01-18 01:23:16', '94.8', '', '59.09'),
(29, 1, '', '2015-01-20 18:23:43', '94.6', '', '59.50'),
(30, 1, '', '2015-01-27 12:09:23', '94.9', '', '55.87'),
(31, 1, '', '2015-02-02 09:13:32', '95.0', '', '56.43'),
(32, 1, '', '2015-02-10 08:43:57', '93.8', '', '52.54'),
(33, 1, '', '2015-02-18 15:45:56', '93.9', '', '56.87'),
(34, 1, '', '2015-02-23 16:23:56', '94.7', '', '57.32'),
(35, 1, '', '2015-02-28 10:43:23', '94.1', '', '56.12'),
(36, 1, '', '2015-03-02 09:17:20', '94.3', '', '57.94'),
(37, 1, '', '2015-03-14 09:23:13', '94.4', '', '54.87'),
(39, 1, '', '2015-03-29 16:17:52', '94.9', '', '57.50'),
(40, 1, '', '2015-04-03 10:16:23', '93.7', '', '57.54'),
(41, 1, '', '2015-04-10 06:12:32', '94.1', '', '58.08'),
(42, 1, '', '2015-04-16 08:12:23', '94.8', '', '57.43'),
(43, 1, '', '2015-04-18 08:12:17', '93.6', '', '54.98'),
(44, 1, '', '2015-04-23 07:12:17', '94.9', '', '54.76'),
(45, 1, '', '2015-04-27 18:09:15', '94.1', '', '54.16'),
(46, 1, '', '2015-04-30 14:08:12', '93.9', '', '55.17'),
(47, 1, '', '2015-05-09 18:16:19', '93.2', '', '53.17'),
(48, 1, '', '2015-05-17 09:13:23', '94.6', '', '57.18'),
(49, 1, '', '2015-05-24 18:23:43', '94.8', '', '55.84'),
(50, 1, '', '2015-05-28 10:02:17', '94.0', '', '55.12'),
(51, 1, '', '2015-06-02 13:34:58', '93.7', '', '52.45'),
(52, 1, '', '2015-06-09 12:13:08', '94.9', '', '54.76'),
(53, 1, '', '2015-06-14 10:23:43', '93.7', '', '53.73'),
(54, 1, '', '2015-06-20 14:19:32', '94.9', '', '56.43'),
(55, 1, '', '2015-06-27 18:23:43', '94.9', '', '52.43'),
(56, 1, '', '2015-07-05 09:12:53', '95.8', '', '57.54'),
(57, 1, '', '2015-07-15 13:32:54', '95.9', '', '54.14'),
(58, 1, '', '2015-07-20 14:23:54', '95.8', '', '56.65'),
(59, 1, '', '2015-07-27 18:13:32', '96.4', '', '57.43'),
(60, 1, '', '2015-08-03 12:13:42', '96.6', '', '56.76'),
(61, 1, '', '2015-08-10 10:32:54', '96.7', '', '56.87'),
(62, 1, '', '2015-08-18 17:32:57', '96.4', '', '53.65'),
(63, 1, '', '2015-08-24 10:23:44', '94.9', '', '56.02'),
(64, 1, '', '2015-08-29 18:32:56', '95.7', '', '55.76'),
(65, 1, '', '2015-09-02 17:16:17', '94.9', '', '54.65'),
(66, 1, '', '2015-09-10 14:23:43', '95.6', '', '53.12'),
(67, 1, '', '2015-09-12 14:54:12', '95.7', '', '58.34'),
(68, 1, '', '2015-09-19 18:32:15', '94.8', '', '57.43'),
(69, 1, '', '2015-09-25 17:23:43', '95.7', '', '60.00'),
(70, 1, '', '2015-10-02 10:04:16', '97.6', '', '51.32'),
(71, 1, '', '2015-07-06 10:12:53', '95.8', '', '57.54'),
(72, 1, '', '2015-07-17 13:32:54', '95.9', '', '54.14'),
(73, 1, '', '2015-07-21 09:13:23', '97.4', '', '58.14'),
(74, 1, '', '2015-07-24 18:14:32', '98.7', '', '51.65'),
(75, 1, '', '2015-07-31 10:54:17', '96.2', '', '58.32'),
(76, 1, '', '2015-08-03 06:16:32', '96.3', '', '57.43'),
(77, 1, '', '2015-08-21 09:12:32', '98.2', '', '59.70'),
(78, 1, '', '2015-08-11 18:34:54', '96.5', '', '51.43'),
(79, 1, '', '2015-08-17 16:43:56', '94.7', '', '58.18'),
(80, 1, '', '2015-08-23 05:15:43', '93.6', '', '55.65'),
(81, 1, '', '2015-08-31 14:32:45', '93.6', '', '56.18'),
(82, 1, '', '2015-09-03 08:12:32', '93.4', '', '56.65'),
(83, 1, '', '2015-09-10 11:43:23', '96.3', '', '57.43'),
(84, 1, '', '2015-09-17 19:23:43', '94.7', '', '58.19'),
(85, 1, '', '2015-09-20 17:34:54', '96.6', '', '52.17'),
(86, 1, '', '2015-09-24 17:32:43', '96.4', '', '52.65'),
(87, 1, '', '2015-09-30 06:16:57', '94.2', '', '57.19'),
(88, 1, '', '2015-10-04 04:17:43', '96.8', '', '59.54'),
(89, 1, '', '2015-10-10 08:12:32', '97.5', '', '58.18'),
(90, 1, '', '2015-10-18 05:12:43', '96.7', '', '58.17'),
(91, 1, '', '2015-10-23 10:32:56', '97.3', '', '52.64'),
(92, 1, '', '2015-10-31 17:32:54', '96.4', '', '52.75'),
(93, 1, '', '2015-11-03 09:15:43', '93.6', '', '58.32'),
(94, 1, '', '2015-11-07 10:32:43', '94.6', '', '58.24'),
(95, 1, '', '2015-11-13 08:43:57', '96.4', '', '56.87'),
(96, 1, '', '2015-11-20 07:13:43', '91.5', '', '58.43'),
(97, 1, '', '2015-11-26 17:32:54', '96.8', '', '51.54'),
(98, 1, '', '2015-11-30 08:43:15', '98.4', '', '52.17'),
(99, 1, '', '2015-12-08 07:23:43', '96.7', '', '58.93'),
(100, 1, '', '2015-12-13 20:24:56', '96.7', '', '53.10'),
(101, 1, '', '2015-12-16 17:23:43', '98.7', '', '59.23'),
(102, 1, '', '2015-12-23 17:23:43', '97.2', '', '50.76'),
(103, 1, '', '2015-12-28 10:07:18', '96.4', '', '52.19'),
(104, 1, '', '2015-12-31 15:23:32', '96.3', '', '52.43'),
(105, 2, '', '2015-07-06 11:21:33', '95.5', '', '53.54'),
(106, 2, '', '2015-07-17 10:43:52', '96.9', '', '52.54'),
(107, 2, '', '2015-07-21 10:10:08', '94.6', '', '57.34'),
(108, 2, '', '2015-07-24 17:21:43', '96.4', '', '53.45'),
(109, 2, '', '2015-07-31 12:34:54', '94.5', '', '53.54'),
(110, 2, '', '2015-08-03 08:21:43', '98.4', '', '56.23'),
(111, 2, '', '2015-08-21 11:43:54', '97.5', '', '52.60'),
(112, 2, '', '2015-08-11 17:45:57', '91.5', '', '54.76'),
(113, 2, '', '2015-08-17 09:54:26', '95.8', '', '52.54'),
(114, 2, '', '2015-08-23 07:14:56', '95.8', '', '56.76'),
(115, 2, '', '2015-08-31 18:32:54', '95.2', '', '55.17'),
(116, 2, '', '2015-09-03 19:14:43', '95.2', '', '53.76'),
(117, 2, '', '2015-09-10 01:12:54', '97.7', '', '53.54'),
(118, 2, '', '2015-09-17 10:43:56', '91.5', '', '52.15'),
(119, 2, '', '2015-09-20 18:19:45', '95.8', '', '56.56'),
(120, 2, '', '2015-09-24 10:32:54', '97.8', '', '54.27'),
(121, 2, '', '2015-09-30 07:23:54', '95.7', '', '55.65'),
(122, 2, '', '2015-10-04 08:34:54', '95.7', '', '58.54'),
(123, 2, '', '2015-10-10 11:13:48', '96.7', '', '53.19'),
(124, 2, '', '2015-10-18 13:34:56', '96.9', '', '56.17'),
(125, 2, '', '2015-10-23 11:34:57', '93.4', '', '51.98'),
(126, 2, '', '2015-10-31 18:16:24', '95.3', '', '57.87'),
(127, 2, '', '2015-11-03 06:23:57', '92.5', '', '51.43'),
(128, 2, '', '2015-11-07 18:22:53', '96.7', '', '53.44'),
(129, 2, '', '2015-11-13 02:13:55', '95.7', '', '52.54'),
(130, 2, '', '2015-11-20 13:43:54', '96.8', '', '53.54'),
(131, 2, '', '2015-11-26 13:54:24', '95.5', '', '55.34'),
(132, 2, '', '2015-11-30 14:23:12', '95.6', '', '54.12'),
(133, 2, '', '2015-12-08 04:23:43', '92.1', '', '55.95'),
(134, 2, '', '2015-12-13 23:22:12', '98.3', '', '55.10'),
(135, 2, '', '2015-12-16 11:01:23', '98.3', '', '55.43'),
(136, 2, '', '2015-12-23 10:12:32', '95.5', '', '53.54'),
(137, 2, '', '2015-12-28 11:32:43', '95.7', '', '58.23'),
(138, 2, '', '2015-12-31 10:32:43', '97.3', '', '55.32'),
(139, 2, '', '2015-01-06 11:21:33', '96.7', '', '57.56'),
(140, 2, '', '2015-01-17 11:54:12', '95.4', '', '55.54'),
(141, 2, '', '2015-01-21 12:08:23', '95.6', '', '55.34'),
(142, 2, '', '2015-01-24 15:23:54', '97.5', '', '55.54'),
(143, 2, '', '2015-01-31 15:34:23', '95.6', '', '54.67'),
(144, 2, '', '2015-02-03 12:32:54', '96.5', '', '57.43'),
(145, 2, '', '2015-02-10 13:45:34', '95.5', '', '56.60'),
(146, 2, '', '2015-02-13 12:32:43', '95.8', '', '56.54'),
(147, 2, '', '2015-02-17 03:44:26', '94.5', '', '52.44'),
(148, 2, '', '2015-02-23 06:34:54', '95.6', '', '53.56'),
(150, 2, '', '2015-03-03 16:04:33', '96.4', '', '56.76'),
(151, 2, '', '2015-03-10 03:16:25', '95.6', '', '57.34'),
(152, 2, '', '2015-03-17 15:43:56', '95.7', '', '54.55'),
(153, 2, '', '2015-03-20 10:09:25', '97.1', '', '53.56'),
(154, 2, '', '2015-03-24 08:23:54', '96.1', '', '50.17'),
(155, 2, '', '2015-03-30 13:32:43', '94.6', '', '52.35'),
(156, 2, '', '2015-04-04 19:24:04', '98.4', '', '54.74'),
(157, 2, '', '2015-04-18 17:33:23', '95.2', '', '51.12'),
(158, 2, '', '2015-04-23 11:34:57', '93.4', '', '56.93'),
(159, 2, '', '2015-04-30 19:16:24', '94.7', '', '56.27'),
(160, 2, '', '2015-05-03 12:33:47', '94.6', '', '53.43'),
(161, 2, '', '2015-05-07 12:08:32', '95.6', '', '53.54'),
(162, 2, '', '2015-05-13 17:18:32', '94.6', '', '56.44'),
(163, 2, '', '2015-05-20 23:43:54', '94.8', '', '53.43'),
(164, 2, '', '2015-05-26 18:43:12', '95.8', '', '53.54'),
(165, 2, '', '2015-05-30 10:23:43', '96.7', '', '58.42'),
(166, 2, '', '2015-06-08 12:32:54', '96.7', '', '54.54'),
(167, 2, '', '2015-06-13 12:23:11', '96.6', '', '53.11'),
(168, 2, '', '2015-06-16 09:23:43', '96.3', '', '57.54'),
(169, 2, '', '2015-06-23 08:32:43', '96.7', '', '53.76'),
(170, 2, '', '2015-06-28 08:54:12', '96.1', '', '55.23'),
(171, 2, '', '2015-06-03 18:32:43', '98.3', '', '53.42'),
(172, 1, '', '2016-01-06 13:32:54', '95.7', '', '57.46'),
(173, 1, '', '2016-01-17 19:43:11', '96.3', '', '52.55'),
(174, 1, '', '2016-01-21 10:43:54', '95.7', '', '54.54'),
(175, 1, '', '2016-01-24 23:43:18', '94.6', '', '53.64'),
(176, 1, '', '2016-01-31 13:23:54', '94.6', '', '57.87'),
(177, 1, '', '2016-02-03 13:54:18', '96.2', '', '54.43'),
(178, 1, '', '2016-02-10 15:32:31', '91.3', '', '52.50'),
(179, 1, '', '2016-02-13 15:23:15', '96.2', '', '51.65'),
(180, 1, '', '2016-02-17 03:32:56', '91.7', '', '56.76'),
(181, 1, '', '2016-02-23 13:32:51', '96.2', '', '51.32'),
(183, 1, '', '2016-03-03 10:15:43', '94.5', '', '52.26'),
(184, 1, '', '2016-03-10 06:32:43', '97.2', '', '54.64'),
(185, 1, '', '2016-03-17 15:43:56', '95.7', '', '54.55'),
(186, 1, '', '2016-03-20 08:12:32', '92.3', '', '51.56'),
(187, 1, '', '2016-03-24 14:02:43', '94.5', '', '54.54'),
(188, 1, '', '2016-03-30 09:24:12', '95.7', '', '53.54'),
(189, 1, '', '2016-04-04 15:23:43', '97.6', '', '56.43'),
(190, 1, '', '2016-04-10 13:23:43', '91.5', '', '55.32'),
(191, 1, '', '2016-04-18 15:23:43', '95.6', '', '52.43'),
(192, 1, '', '2016-04-23 07:12:34', '95.7', '', '53.54'),
(193, 1, '', '2016-04-29 05:14:25', '95.2', '', '53.54'),
(194, 1, '', '2016-04-29 18:42:04', '196.7', '', '87.46');

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
(65, 1, '2015-01-02 02:56:35', 5),
(66, 1, '2015-01-05 10:23:34', 1087),
(67, 1, '2015-01-09 15:54:32', 10765),
(68, 1, '2015-01-15 06:12:23', 109),
(69, 1, '2015-01-20 12:12:08', 10349),
(70, 1, '2015-01-25 22:56:10', 1),
(71, 1, '2015-01-31 13:08:23', 10345),
(72, 1, '2015-02-05 06:28:57', 106),
(73, 1, '2015-02-10 14:53:18', 10873),
(74, 1, '2015-02-14 21:17:52', 209),
(75, 1, '2015-02-21 15:23:34', 10321),
(76, 1, '2015-02-28 18:14:54', 10365),
(77, 1, '2015-03-05 09:15:56', 987),
(78, 1, '2015-03-10 13:18:42', 10873),
(79, 1, '2015-03-14 03:15:54', 6),
(80, 1, '2015-03-21 11:09:13', 10764),
(81, 1, '2015-03-29 04:18:54', 7),
(82, 1, '2015-04-05 05:15:32', 10),
(83, 1, '2015-04-14 12:09:54', 10976),
(84, 1, '2015-04-20 14:15:54', 10786),
(85, 1, '2015-04-25 23:15:21', 11),
(86, 1, '2015-04-30 19:23:34', 10003),
(87, 1, '2015-05-04 13:16:23', 10453),
(88, 1, '2015-05-10 23:22:57', 12),
(89, 1, '2015-05-14 16:54:12', 10698),
(90, 1, '2015-05-21 17:18:09', 10154),
(91, 1, '2015-05-29 16:13:21', 10143),
(92, 1, '2015-06-05 21:18:21', 10),
(93, 1, '2015-06-10 13:56:01', 10534),
(94, 1, '2015-06-15 12:08:12', 10873),
(95, 1, '2015-06-21 11:26:54', 11435),
(96, 1, '2015-06-30 12:14:20', 10987),
(97, 1, '2015-07-03 02:56:35', 7),
(98, 1, '2015-07-08 10:23:34', 10927),
(99, 1, '2015-07-13 15:54:32', 10745),
(100, 1, '2015-07-21 03:12:23', 134),
(101, 1, '2015-07-25 18:12:08', 10567),
(102, 1, '2015-07-29 22:51:19', 2),
(103, 1, '2015-07-31 10:38:23', 10575),
(104, 1, '2015-08-05 13:56:27', 10765),
(105, 1, '2015-08-10 18:53:18', 10873),
(106, 1, '2015-08-14 21:17:52', 209),
(107, 1, '2015-08-21 15:37:54', 10371),
(108, 1, '2015-08-28 18:59:09', 10560),
(109, 1, '2015-09-05 09:45:27', 3056),
(110, 1, '2015-09-10 13:58:22', 10277),
(111, 1, '2015-09-16 03:08:54', 9),
(112, 1, '2015-09-21 11:32:54', 10963),
(113, 1, '2015-09-29 04:43:10', 12),
(114, 1, '2015-10-05 05:45:12', 100),
(115, 1, '2015-10-14 14:04:54', 10376),
(116, 1, '2015-10-20 14:54:16', 10542),
(117, 1, '2015-10-25 17:19:32', 16),
(118, 1, '2015-10-30 19:08:32', 10534),
(119, 1, '2015-11-04 13:43:12', 10653),
(120, 1, '2015-11-10 23:22:43', 25),
(121, 1, '2015-11-14 16:09:22', 10748),
(122, 1, '2015-11-21 17:43:12', 10544),
(123, 1, '2015-11-29 16:56:32', 10764),
(124, 1, '2015-12-05 21:18:21', 10),
(125, 1, '2015-12-10 13:21:34', 10234),
(126, 1, '2015-12-15 12:34:17', 10243),
(127, 1, '2015-12-21 11:32:54', 10985),
(128, 1, '2015-12-30 12:54:19', 10142),
(129, 1, '2016-01-03 02:10:32', 7),
(130, 1, '2016-01-08 10:10:54', 10476),
(131, 1, '2016-01-10 15:43:56', 10982),
(132, 1, '2016-01-21 03:56:16', 134),
(133, 1, '2016-01-25 18:18:02', 10261),
(134, 1, '2016-01-29 22:13:43', 5),
(135, 1, '2016-01-31 10:23:12', 10215),
(136, 1, '2016-02-05 13:23:43', 10253),
(137, 1, '2016-02-10 18:09:13', 10562),
(139, 1, '2016-03-21 15:21:43', 10761),
(140, 1, '2016-03-28 10:43:16', 10762),
(141, 1, '2016-04-05 09:12:32', 4563),
(142, 1, '2016-04-10 13:12:43', 10326),
(143, 1, '2016-04-16 03:21:43', 9),
(144, 1, '2016-04-21 11:02:54', 10465),
(145, 1, '2016-04-29 04:12:54', 25),
(146, 2, '2016-01-03 02:10:32', 9),
(147, 2, '2016-01-08 10:10:54', 10216),
(148, 2, '2016-01-10 15:43:56', 10832),
(149, 2, '2016-01-21 03:56:16', 235),
(150, 2, '2016-01-25 18:18:02', 10354),
(151, 2, '2016-01-29 22:13:43', 10),
(152, 2, '2016-01-31 10:23:12', 10342),
(153, 2, '2016-02-05 13:23:43', 10132),
(154, 2, '2016-02-10 18:09:13', 10322),
(155, 2, '0000-00-00 00:00:00', 324),
(156, 2, '2016-03-21 15:21:43', 10542),
(157, 2, '2016-03-28 10:43:16', 10653),
(158, 2, '2016-04-05 09:12:32', 5421),
(159, 2, '2016-04-10 13:12:43', 10431),
(160, 2, '2016-04-16 03:21:43', 18),
(161, 2, '2016-04-21 11:02:54', 10432),
(162, 2, '2016-04-29 04:12:54', 20),
(163, 2, '2015-01-03 02:10:32', 8),
(164, 2, '2015-01-08 10:10:32', 8083),
(165, 2, '2015-01-15 16:10:42', 10653),
(166, 2, '2015-01-24 04:12:32', 17),
(167, 2, '2015-01-29 07:43:35', 453),
(168, 2, '2015-02-03 13:54:36', 10234),
(169, 2, '2015-02-10 17:32:43', 10873),
(170, 2, '2015-02-17 20:54:54', 2032),
(171, 2, '2015-02-25 13:43:43', 10843),
(172, 2, '2015-02-28 04:32:43', 108),
(173, 2, '2015-03-04 17:32:43', 9876),
(174, 2, '2015-03-16 02:18:13', 8),
(175, 2, '2015-03-22 01:18:54', 1);

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
(157, '2015-12-27 19:27:05', '43.8', '65.40'),
(158, '2015-01-07 19:21:43', '23.7', '62.60'),
(159, '2015-01-13 18:12:14', '37.6', '62.30'),
(160, '2015-01-20 10:57:13', '21.6', '60.50'),
(161, '2015-01-29 14:10:52', '25.8', '60.40'),
(162, '2015-01-25 06:16:09', '29.7', '60.10'),
(163, '2015-02-03 09:12:07', '28.8', '62.70'),
(164, '2015-02-09 12:12:32', '39.9', '60.50'),
(165, '2015-02-14 15:43:23', '34.9', '60.90'),
(166, '2015-02-18 15:20:43', '40.0', '59.90'),
(167, '2015-02-25 16:15:26', '37.5', '57.80'),
(168, '2015-02-28 04:12:15', '36.5', '61.80'),
(169, '2015-03-03 10:14:23', '40.6', '61.70'),
(170, '2015-03-09 09:14:56', '32.4', '60.30'),
(172, '2015-03-19 04:07:13', '39.9', '63.70'),
(173, '2015-03-25 18:14:12', '43.8', '64.70'),
(174, '2015-03-30 10:04:20', '37.4', '63.30'),
(175, '2015-04-02 13:13:43', '37.4', '63.30'),
(176, '2015-04-05 12:04:20', '43.4', '62.30'),
(177, '2015-04-09 12:43:19', '54.4', '61.30'),
(178, '2016-01-07 10:32:12', '25.6', '63.50'),
(179, '2016-01-13 12:10:09', '35.6', '61.40'),
(180, '2016-01-20 14:23:43', '22.4', '61.30'),
(181, '2016-01-29 13:25:54', '23.7', '61.30'),
(182, '2016-01-25 07:34:16', '21.4', '61.60'),
(183, '2016-02-03 11:32:05', '21.4', '61.90'),
(184, '2016-02-09 13:17:52', '38.9', '61.40'),
(185, '2016-02-14 16:54:13', '33.6', '61.80'),
(186, '2016-02-18 12:14:54', '39.0', '58.90'),
(187, '2016-02-25 13:11:43', '36.5', '58.50'),
(188, '2016-02-28 07:10:12', '34.6', '62.80'),
(189, '2016-03-03 15:32:54', '41.4', '61.80'),
(190, '2016-03-09 15:34:52', '30.6', '60.80'),
(191, '2016-03-13 21:32:07', '31.8', '61.40'),
(192, '2016-03-19 15:23:56', '37.7', '62.90'),
(193, '2016-03-25 10:03:15', '42.5', '63.80'),
(194, '2015-03-30 19:24:05', '36.8', '62.30'),
(195, '2016-04-02 14:53:13', '35.6', '64.30'),
(196, '2016-04-05 12:04:20', '42.4', '63.30'),
(197, '2016-04-09 14:23:39', '53.4', '62.40'),
(198, '2016-04-13 10:12:32', '54.5', '61.40'),
(199, '2016-04-19 08:14:23', '52.9', '61.90'),
(200, '2016-04-23 19:13:59', '51.4', '60.60'),
(201, '2016-04-29 19:23:43', '54.4', '63.40');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `hive`
--
ALTER TABLE `hive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `lighthistory`
--
ALTER TABLE `lighthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `outsidetemp`
--
ALTER TABLE `outsidetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `population`
--
ALTER TABLE `population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
