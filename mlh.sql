-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2016 at 06:02 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `MLH`
--

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE IF NOT EXISTS `questionbank` (
  `primaryKey` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(254) NOT NULL,
  `keyword1` varchar(15) NOT NULL,
  `keyword2` varchar(15) NOT NULL,
  `keyword3` varchar(15) NOT NULL,
  `keyword4` varchar(15) NOT NULL,
  `filter` varchar(30) NOT NULL,
  `answerValue` varchar(30) NOT NULL,
  `nextQFrom1` int(11) NOT NULL,
  `nextQFrom2` int(11) NOT NULL,
  `nextQFrom3` int(11) NOT NULL,
  `nextQFrom4` int(11) NOT NULL,
  PRIMARY KEY (`primaryKey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`primaryKey`, `question`, `keyword1`, `keyword2`, `keyword3`, `keyword4`, `filter`, `answerValue`, `nextQFrom1`, `nextQFrom2`, `nextQFrom3`, `nextQFrom4`) VALUES
(3, 'Taking out or staying in, pet?', 'out', 'in', '', '', '', '', 7, 4, 0, 0),
(2, 'Wanna eat now or later?', 'now', 'later', '', '', '', '', 9, 8, 0, 0),
(1, 'Hello, what would you like to eat?', '', '', '', '', '', '', 10, 0, 0, 0),
(4, 'Will children be coming?', 'yes', 'no', '', '', '', '', 5, 5, 0, 0),
(5, 'Do you require disabled access?', 'yes', 'no', '', '', '', '', 6, 6, 0, 0),
(6, 'Alcohol?', 'yes', 'no', '', '', '', '', 7, 7, 0, 0),
(7, 'Drive?', 'yes', 'no', '', '', '', '', 2, 2, 0, 0),
(8, 'When would you like to eat?', '', '', '', '', '', '', 9, 0, 0, 0),
(9, 'Are you chilling with friends?', 'yes', 'no', '', '', '', '', 11, 11, 0, 0),
(10, 'Where do you live?', '', '', '', '', '', '', 3, 0, 0, 0),
(11, 'How much are you willing to spend?', '', '', '', '', '', '', 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
