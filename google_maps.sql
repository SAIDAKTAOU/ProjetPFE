-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 10:09 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `google_maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `pseudo`, `longitude`, `latitude`, `date_creation`) VALUES
(1, 'admin', '-5.346681', '35.748471', '2018-06-30 17:27:15'),
(105, 'test', '-5.327674', '35.683065', '2018-06-28 20:49:39'),
(106, 'said', '-5.277491', '35.619462', '2018-06-30 17:42:24'),
(107, 'fatima', '-5.363696', '35.565835', '2018-06-30 22:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `proche`
--

CREATE TABLE IF NOT EXISTS `proche` (
  `id_proche` int(3) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_proche`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `proche`
--

INSERT INTO `proche` (`id_proche`, `pseudo`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'admin', 'admin@gmail.com', 'admin'),
(3, 'test', 'test@gmail.com', 'test'),
(4, 'mechbal', 'mechbal@gmail.com', 'mnb'),
(5, 'Aktaou Said', 'said@gmail.com', 'said');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `pseudo` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  FULLTEXT KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`pseudo`, `email`, `password`) VALUES
('admin', 'admin@gmail.com', 'admin'),
('said', 'said@gmail.com', 'said'),
('test', 'test@gmail.com', 'test'),
('test1', 'test1@gmail.com', 'test'),
('test2', 'test2@gmail.com', 'test'),
('test3', 'test3@gmail.com', 'test'),
('saide', 'saide@gmail.com', 'said'),
('test5', '6test@gmail.com', 'test'),
('oumaima', 'oumaima@gmail.com', '12'),
('dd', 'dd@gmail.com', '1212'),
('test4', 'test4@gmail.com', 'test'),
('fatima', 'fatima@gmail.com', 'fatima');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
