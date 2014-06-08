-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2014 at 03:49 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tamtam`
--

-- --------------------------------------------------------

--
-- Table structure for table `medischeinfo`
--

CREATE TABLE `medischeinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rijksregisternr` varchar(225) NOT NULL,
  `info1` varchar(225) DEFAULT '',
  `info2` varchar(225) DEFAULT '',
  `info3` varchar(225) DEFAULT '',
  `info4` varchar(225) DEFAULT '',
  `info5` varchar(225) DEFAULT '',
  `info6` varchar(225) DEFAULT '',
  `info7` varchar(225) DEFAULT '',
  `info8` varchar(225) DEFAULT '',
  `info9` varchar(225) DEFAULT '',
  `info10` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `medischeinfo`
--

INSERT INTO `medischeinfo` (`id`, `rijksregisternr`, `info1`, `info2`, `info3`, `info4`, `info5`, `info6`, `info7`, `info8`, `info9`, `info10`) VALUES
(5, '4394594593', 'Lisette is diabetisch', 'Ze heeft ook een erg zwakke rug.', '', '', '', '', '', '', '', ''),
(6, '4569883844', 'Jan kan niet om met stress. Tracht dit te vermijden.', '', '', '', '', '', '', '', '', ''),
(7, '', 'Kelly is bevallen op 20 mei 2014', 'Zoontje (Bart) is lactose-intolerant', '', '', '', '', '', '', '', ''''),
(8, '18890404', '', '', '', '', '', '', '', '', '', '');
