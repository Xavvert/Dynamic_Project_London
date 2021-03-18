-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2021 at 09:25 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cykel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('xavier', 'cykel'),
('anthelme', 'cykel');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`firstName`, `lastName`, `adress`, `city`, `zipCode`, `country`, `phone`, `username`, `password`) VALUES
('John ', 'Smith', '65 bis alley of jasmin', 'London', 52443, 'UK', 989898989, 'jonyjony', 'london'),
('Julian', 'Oterino', '45 avenue de france', 'Paris', 75015, 'France', 675343627, 'juliano', 'london'),
('fdf', '', 'df', 'df', 1, 'df', 1, 'df@g', 'df'),
('fdf', 'df', 'df', 'df', 1, 'df', 1, 'df@gsds', 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`firstName`, `lastName`, `username`, `password`) VALUES
('smyrna', 'moliano', 'smyno', 'londony');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
