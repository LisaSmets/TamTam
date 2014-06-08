-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2014 at 03:48 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tamtam`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(225) NOT NULL,
  `wachtwoord` varchar(225) NOT NULL,
  `voornaam` varchar(225) NOT NULL DEFAULT '',
  `achternaam` varchar(225) NOT NULL DEFAULT '',
  `functie` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `wachtwoord`, `voornaam`, `achternaam`, `functie`) VALUES
(22, 'lisa@gmail.com', '4b63ccd74ff860cb9fb5c2b576eec72d', 'Lisa', 'Smets', 'Verpleegster'),
(24, 'lisa_smets@hotmail.com', '4b63ccd74ff860cb9fb5c2b576eec72d', 'Lisa', 'Smets', 'Verpleegster'),
(25, 'info@lissasleeckx.be', 'a6141b315753b3a22db80a4f4d58e158', 'Lissa', 'Sleeckx', 'Koningin'),
(26, 'kim@gmail.com', '4b63ccd74ff860cb9fb5c2b576eec72d', 'Kim', 'De Bruyn', 'Kinesist'),
(27, 'steffie@gmail.com', '4b63ccd74ff860cb9fb5c2b576eec72d', 'Steffie', 'Spoormans', 'Poetshulp');
