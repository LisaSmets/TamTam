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
-- Table structure for table `patienten`
--

CREATE TABLE `patienten` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(255) DEFAULT '',
  `achternaam` varchar(255) DEFAULT NULL,
  `straat` varchar(255) DEFAULT NULL,
  `nr` int(20) DEFAULT NULL,
  `woonplaats` varchar(255) DEFAULT NULL,
  `emailgebruiker` varchar(225) NOT NULL,
  `rijksregisternr` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `patienten`
--

INSERT INTO `patienten` (`id`, `voornaam`, `achternaam`, `straat`, `nr`, `woonplaats`, `emailgebruiker`, `rijksregisternr`) VALUES
(25, 'Lisa', 'Smets', 'Schoolstraat', 1, 'Mechelen', 'info@lissasleeckx.be', ''),
(28, 'Kelly', 'Aarts', 'Asselbergen', 12, 'Mechelen', 'lisa@gmail.com', ''),
(31, 'Jan', 'De Keersmaeker', 'Turnhoutsebaan', 34, 'Turnhout', 'lisa@gmail.com', '4569883844'),
(32, 'Lisette', 'Eyckmans', 'Heikant', 39, 'Arendonk', 'lisa@gmail.com', '4394594593'),
(33, 'Sander', 'Smets', 'Asselbergen', 12, 'Arendonk', 'lisa@gmail.com', '18890404'),
(34, 'Lisette', 'Eyckmans', 'Heikant', 29, 'Arendonk', 'kim@gmail.com', '4394594593'),
(35, 'Lisette', 'Eyckmans', 'Heikant', 39, 'Arendonk', 'steffie@gmail.com', '4394594593');
