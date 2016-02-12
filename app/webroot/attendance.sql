-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2015 at 01:35 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance`
--

CREATE TABLE IF NOT EXISTS `advance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `advance_given_date` date NOT NULL,
  `remarks` text NOT NULL,
  `current_date` date NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `advance`
--

INSERT INTO `advance` (`id`, `reg_id`, `amount`, `advance_given_date`, `remarks`, `current_date`, `login_id`) VALUES
(1, 1, '50', '2015-09-10', '', '2015-09-12', 1),
(2, 2, '100', '2015-09-11', '', '2015-09-12', 1),
(29, 5, '50', '2015-09-14', '', '2015-09-14', 1),
(30, 3, '50', '2015-09-10', '', '2015-09-15', 1),
(31, 3, '43', '2015-09-11', '', '2015-09-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `reg_id`, `attendance_date`, `time`, `status`, `remarks`, `login_id`) VALUES
(1, 1, '2015-09-16', '01:03:37 pm', 'H', '', 1),
(2, 2, '2015-09-16', '01:03:37 pm', 'H', '', 1),
(3, 3, '2015-09-16', '01:03:37 pm', 'H', '', 1),
(4, 4, '2015-09-16', '01:03:37 pm', 'H', '', 1),
(5, 5, '2015-09-16', '01:03:37 pm', 'H', '', 1),
(6, 6, '2015-09-16', '01:03:37 pm', 'H', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `prefix` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `prefix`) VALUES
(1, 'BELDAR', 'BEL'),
(2, 'SHUTTERING', 'SH'),
(3, 'PLUMBER', 'PL'),
(4, 'Garden helper ', 'GH'),
(5, 'ELECTRITION', 'ELC'),
(6, 'flooring', 'fl');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `login_id`, `password`, `username`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ankit@phppoets.com');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE IF NOT EXISTS `overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `overtime_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `total_overtime` varchar(120) NOT NULL COMMENT 'HOURS',
  `remarks` text NOT NULL,
  `current_date` date NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `reg_id`, `overtime_date`, `start_time`, `end_time`, `total_overtime`, `remarks`, `current_date`, `login_id`) VALUES
(1, 1, '2015-09-10', '00:00:00', '00:00:00', '1.250', '', '2015-09-15', 1),
(2, 2, '2015-09-12', '00:00:00', '00:00:00', '0.500', '', '2015-09-15', 1),
(3, 3, '2015-09-13', '00:00:00', '00:00:00', '2.783', '', '2015-09-15', 1),
(4, 1, '2015-09-14', '00:00:00', '00:00:00', '0.033', '', '2015-09-15', 1),
(5, 3, '2015-09-10', '00:00:00', '00:00:00', '1.033', '', '2015-09-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `code` varchar(120) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `f_name` varchar(120) NOT NULL,
  `wages` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `depart_id` int(11) NOT NULL,
  `nature` varchar(120) NOT NULL,
  `working_time_from` time NOT NULL,
  `working_time_to` time NOT NULL,
  `interval_time_from` time NOT NULL,
  `interval_time_to` time NOT NULL,
  `current_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `code`, `mobile_no`, `f_name`, `wages`, `month`, `address`, `depart_id`, `nature`, `working_time_from`, `working_time_to`, `interval_time_from`, `interval_time_to`, `current_date`, `status`) VALUES
(1, 'First', 'BEL0001', '9461907903', '', '100', '', 'Udaipur', 1, '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2015-09-12', 0),
(2, 'Second', 'BEL0002', '9413274803', '', '200', '', 'Udaipur', 1, '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2015-09-12', 0),
(3, 'Third', 'BEL0003', '9460153835', '', '400', '', 'Udaipur', 1, '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2015-09-12', 0),
(4, 'Test', 'SH0001', '', '', '100', '', '', 2, '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2015-09-12', 0),
(5, 'Elec1', 'ELC0001', '', '', '100', '', '', 5, '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2015-09-14', 0),
(6, 'Elec2', 'ELC0002', '', '', '100', '', '', 5, '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2015-09-14', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
