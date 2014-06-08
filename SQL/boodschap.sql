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
-- Table structure for table `boodschap`
--

CREATE TABLE `boodschap` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `rijksregisternr` varchar(225) NOT NULL,
  `uservoornaam` varchar(225) NOT NULL,
  `userachternaam` varchar(225) NOT NULL,
  `userfunctie` varchar(225) NOT NULL,
  `boodschap` text NOT NULL,
  `datum` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `boodschap`
--

INSERT INTO `boodschap` (`id`, `rijksregisternr`, `uservoornaam`, `userachternaam`, `userfunctie`, `boodschap`, `datum`) VALUES
(39, '4569883844', 'Lisa', 'Smets', 'Verpleegster', 'Hallo, ik ben de verpleegster van Jan.', '1 Mar. 2014'),
(45, '4394594593', 'Lisa', 'Smets', 'Verpleegster', 'Lisette is vanochtend van de trap gevallen en moet de hele dag rusten. Ze mag geen druk zetten op haar rechterbeen.', '1 Mar. 2014'),
(46, '4569883844', 'Lisa', 'Smets', 'Verpleegster', 'Er is suikerziekte vastgesteld bij Jan. Let aub mee op dat hij zo weinig mogelijk zoetigheden eet.', '3 Mar. 2014'),
(50, '4569883844', 'Lisa', 'Smets', 'Verpleegster', 'Dit is een test', '5 Jun. 2014');
