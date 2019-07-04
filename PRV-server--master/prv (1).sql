-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 04:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prv`
--
CREATE DATABASE IF NOT EXISTS `prv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prv`;

-- --------------------------------------------------------

--
-- Table structure for table `current`
--

CREATE TABLE `current` (
  `id` varchar(16) NOT NULL,
  `reqKey` varchar(16) NOT NULL,
  `driKey1` varchar(16) NOT NULL,
  `driKey2` varchar(16) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current`
--

INSERT INTO `current` (`id`, `reqKey`, `driKey1`, `driKey2`, `status`) VALUES
('JnqHwdMbG512BIXR', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('Sh8ucGrsNWyLQUik', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('kfjIFub4zcNlTgZ9', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('zKATMQ3eV4qojb5k', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('LYjKas64Zw3lTmQv', '8xg6Vo9OnSvupfPK', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('GTmvx0rYpn1RliMS', '8xg6Vo9OnSvupfPK', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('8PYfHzjGr2tZ7VSC', '8xg6Vo9OnSvupfPK', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('zwNesX9PonVuZ6Gd', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('hGBCDOZT6n91MlaV', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('62VjKgmyorx3kALi', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('vO1fyXFWJrU8NtAn', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('FRLJkh2YuZmpU5qr', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('wz6HB7VAfRxpg2Ev', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('P9G6HgYbrALCTWtw', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process'),
('uXxOfeCj4bUDscHZ', 'Ngu8kBmhScxDYPJW', '8xg6Vo9OnSvupfPK', '0', 'On Process');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` varchar(10) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `uiKey` varchar(16) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `onDrive` varchar(16) NOT NULL,
  `noDrive` varchar(20) NOT NULL,
  `lastDrive` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `carNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `pass`, `uiKey`, `lat`, `lon`, `onDrive`, `noDrive`, `lastDrive`, `carNo`) VALUES
('8608111555', 'qwer1234', '8xg6Vo9OnSvupfPK', 13.063407019176417, 80.23059414791567, '0', '0', '2019-02-16 02:22:09', 'TNBJ057569');

-- --------------------------------------------------------

--
-- Table structure for table `uikeys`
--

CREATE TABLE `uikeys` (
  `uiKey` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uikeys`
--

INSERT INTO `uikeys` (`uiKey`) VALUES
('Ngu8kBmhScxDYPJW'),
('8xg6Vo9OnSvupfPK');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `uiKey` varchar(16) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `imei` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pass`, `uiKey`, `lat`, `lon`, `imei`) VALUES
('8608111555', 'qwer1234', 'Ngu8kBmhScxDYPJW', 13.0650102, 80.2264483, '868263030707934');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
