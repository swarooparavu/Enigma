-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2015 at 11:43 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ENIGMA`
--

-- --------------------------------------------------------

--
-- Table structure for table `3hrs`
--

CREATE TABLE IF NOT EXISTS `3hrs` (
  `RTT` varchar(150) NOT NULL,
  `SST` varchar(150) NOT NULL,
  `DATAR` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Average`
--

CREATE TABLE IF NOT EXISTS `Average` (
  `averageRRT` varchar(150) NOT NULL,
  `averageSST` varchar(150) NOT NULL,
  `averageDRATE` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE IF NOT EXISTS `credentials` (
  `id` int(8) NOT NULL,
  `Ipaddress` varchar(20) NOT NULL,
  `USERname` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Interface` varchar(30) NOT NULL,
  `link1` varchar(30) NOT NULL,
  `link2` varchar(30) NOT NULL,
  `Sourcepath` varchar(50) NOT NULL,
  `Destinationpath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `Ipaddress`, `USERname`, `Password`, `Interface`, `link1`, `link2`, `Sourcepath`, `Destinationpath`) VALUES
(1, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `data_rate` varchar(150) NOT NULL,
  `Ips` varchar(150) NOT NULL,
  `Ipd` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`) VALUES
(1, 'root', 'enigma');

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE IF NOT EXISTS `metrics` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `rrt` varchar(225) NOT NULL,
  `sst` varchar(225) NOT NULL,
  `ips` varchar(225) NOT NULL,
  `ipd` varchar(225) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=swe7 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(8) NOT NULL,
  `thresholdRTT` varchar(20) NOT NULL,
  `thresholdRTT1` varchar(20) NOT NULL,
  `thresholdSST` varchar(30) NOT NULL,
  `thresholdSST1` varchar(30) NOT NULL,
  `thresholdDRATE` varchar(30) NOT NULL,
  `thresholdDRATE1` varchar(30) NOT NULL,
  `Emailid` varchar(30) NOT NULL,
  `IPAddress` varchar(4800) NOT NULL,
  `OID` varchar(4800) NOT NULL,
  `port` varchar(4800) NOT NULL,
  `SNMPCommunity` varchar(4800) NOT NULL,
  `SMS` varchar(4800) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
