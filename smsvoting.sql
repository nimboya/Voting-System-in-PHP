-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2013 at 06:05 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smsvoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_phone` (`phone`(200))
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`) VALUES
(1, 'Ewere', '08066194746'),
(2, 'Ayo', '08062286816'),
(3, 'Ose', '08066242656'),
(4, 'Iyare', '08038504799'),
(5, 'Ab', '07060495588'),
(6, 'Mummy', '08034706519'),
(7, 'Peterson', '08057857036'),
(8, 'Ewere2', '08099294372'),
(9, 'Efe', '08028636343'),
(10, 'Ise', '08054001991');

-- --------------------------------------------------------

--
-- Table structure for table `voteconfig`
--

CREATE TABLE IF NOT EXISTS `voteconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `votekey` text NOT NULL,
  `total` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `voteconfig`
--

INSERT INTO `voteconfig` (`id`, `votekey`, `total`) VALUES
(1, 'A', 3),
(2, 'B', 4),
(3, 'C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` text NOT NULL,
  `vote` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`(200))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
