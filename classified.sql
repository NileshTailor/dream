-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2015 at 11:22 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classified`
--
CREATE DATABASE IF NOT EXISTS `classified` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `classified`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(50) NOT NULL,
  `about_categories` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `about_categories`, `icon`) VALUES
(1, 'Hardware', 'services_icon.png', 'Hardware.png'),
(2, 'Cables', 'services_icon.png', 'Cables.jpg'),
(3, 'Bearings', 'services_icon.png', 'Bearings.jpg'),
(4, 'Panels', 'services_icon.png', 'Panels.jpg'),
(5, 'Earth Moving Equipments', 'services_icon.png', 'Earth.jpg'),
(6, 'Vehicles', 'services_icon.png', 'Vehicles.png'),
(7, 'Computers', 'services_icon.png', 'computer.jpg'),
(8, 'Scrap', 'services_icon.png', 'Scrap.jpg'),
(9, 'Accessories', 'services_icon.png', 'Accessories.jpg'),
(10, 'Tools and Tackles', 'services_icon.png', 'Tools.jpeg'),
(11, 'Furniture', 'services_icon.png', 'Furniture.jpg'),
(12, 'Motors', 'services_icon.png', 'Motors.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `city_names`
--

CREATE TABLE IF NOT EXISTS `city_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `states_id` int(10) NOT NULL,
  `city_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `city_names`
--

INSERT INTO `city_names` (`id`, `states_id`, `city_name`) VALUES
(1, 1, 'Udaipur'),
(2, 1, 'Jaipur'),
(3, 1, 'Kota'),
(4, 2, 'Ahemdabad'),
(5, 2, 'Surat');

-- --------------------------------------------------------

--
-- Table structure for table `classified_posts`
--

CREATE TABLE IF NOT EXISTS `classified_posts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `sub_category_id` int(12) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `year` varchar(8) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `location_address` text NOT NULL,
  `city_id` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `part_no` varchar(200) NOT NULL,
  `meta_keywords` text NOT NULL,
  `photo` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `draft_status` int(2) NOT NULL,
  `click_cnt` int(50) NOT NULL,
  `time_active_last` varchar(10) NOT NULL,
  `date_active_last` date NOT NULL,
  `last_edit_date` date NOT NULL,
  `last_edit_time` varchar(50) NOT NULL,
  `time_deactive_last` varchar(10) NOT NULL,
  `date_deactive_last` date NOT NULL,
  `expires_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `classified_posts`
--

INSERT INTO `classified_posts` (`id`, `user_id`, `sub_category_id`, `price`, `year`, `brand`, `stock`, `location_address`, `city_id`, `product_name`, `description`, `part_no`, `meta_keywords`, `photo`, `date`, `time`, `draft_status`, `click_cnt`, `time_active_last`, `date_active_last`, `last_edit_date`, `last_edit_time`, `time_deactive_last`, `date_deactive_last`, `expires_date`) VALUES
(14, 3, 22, '2286.63', '2011', 'LAPP', '18 COILS', '', '1', 'WIRE', 'PART NO. - 1606321\r\n SINGLE CORE MULTISTRANDED CU (CLASS 2 OR CLASS 5) WIRE WITH PVC INSULATION \r\nSIZE:4 SQ.MM.\r\nCOLOUR: BLACK', '', 'WIRE', '', '2014-10-09', '09:56:30 AM', 1, 8, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(13, 3, 22, '4990.00', '2011', 'FLUTEF', '9 COILS', '', '1', 'WIRE', ' PART NO.- 2101914\r\nWIRE TEFLON COAT SIZE:1.5 SQMM 600V GRADE-150Â°C THERMOPLASTIC TYPE COLOUR:  WHITE', '', 'WIRE', '', '2014-10-09', '09:54:40 AM', 1, 5, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(12, 3, 22, '2286.63', '2011', 'LAPP', '20 COILS', '', '1', 'WIRE', 'PART NO.-1606322\r\nSINGLE CORE MULTISTRANDED CU WIRE WITH PVC INSULATION \r\nSIZE:4 SQ.MM.\r\nCOLOUR: YELLOW ', '', 'WIRE', '', '2014-10-09', '09:52:49 AM', 1, 6, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(11, 3, 22, '2286.63', '2012', 'LAPP', '31 COILS', '', '1', 'WIRE', 'PART NO.-1606323\r\nSINGLE CORE MULTISTRANDED CU WIRE WITH PVC INSULATION \r\nSIZE:4 SQ.MM.\r\nCOLOUR: BLUE ', '', 'WIRE', '', '2014-10-09', '09:48:34 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(10, 3, 21, '2300.00', '2012', 'Flutef', '37 Coil', '', '1', 'Wire', ' WIRE CU TEFLON COAT SIZE:2.5 SQMM 600V-150Â°C THERMOPLASTIC TYPE COLOUR: GREEN', '', 'Wire', '', '2014-10-08', '02:56:54 PM', 1, 12, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(16, 3, 21, '6083.97', '2011', 'POWERAGE', '6 COILS', '', '1', 'WIRE', 'PART NO. - 1526924\r\nWIRE 16 SQ MM MULTISTRANDED ABC/PVC SUPER FLEXIBLE , COLOUR GREY', '', 'WIRE', '', '2014-10-09', '10:00:46 AM', 1, 4, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(17, 3, 22, '5465.61', '2012', 'POWERAGE', '6 COILS', '', '1', 'WIRE', 'PART NO. - 202560 \r\nWIRE 10 SQMM, WHITE COLOUR, SINGLE CORE MULTISTRAND ABC/PVC, GRADE 1.1 KV AS PER IS 695,I,COIL : 100 MTR.', '', 'WIRE', '', '2014-10-09', '10:07:18 AM', 1, 5, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(18, 3, 21, '5465.61', '2012', 'ROLLIFLEX', '6 COILS', '', '1', 'WIRE', 'PART NO. - 202560\r\nWIRE 10 SQMM,WHITE COLOUR, SINGLE CORE MULTISTRAND ABC /PVC, GRADE 1.1 KV AS PER IS 695,I,COIL : 100 MTR.', '', 'WIRE', '', '2014-10-09', '10:15:38 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(19, 3, 21, '270.35', '2012', 'REPUTED', '100 MTRs', '', '1', 'WIRE', 'PART NO. - 205099\r\n50 SQ.MM,YELLOW COLOUR,SINGLE CORE MULTI STRAND ABC/PVC, GRADE 1.1 KV AS PER IS 694', '', 'WIRE', '', '2014-10-09', '10:17:49 AM', 1, 5, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(20, 3, 21, '2823.00', '2012', 'LAPP', '9 COILS', '', '1', 'WIRE', 'PART NO. - 1606320\r\nSINGLE CORE MULTISTRANDED CU WIRE WITH PVC INSULATION \r\nSIZE:4 SQ.MM.\r\nCOLOUR: RED ', '', 'WIRE', '', '2014-10-09', '10:19:12 AM', 1, 4, '02:50:26 A', '2014-11-18', '0000-00-00', '', '02:26:40 A', '2014-11-18', '0000-00-00'),
(21, 3, 22, '5590.00', '2012', 'R R KABLE', '4 COILS', '', '1', 'WIRE', 'PART NO. - 2251724\r\nWIRE ABC PVC 10SQMM\r\nCOLOUR- BLACK\r\nMAKE-  RR KABLE ', '', 'WIRE', '', '2014-10-09', '10:25:56 AM', 0, 4, '', '0000-00-00', '0000-00-00', '', '02:26:42 A', '2014-11-18', '0000-00-00'),
(22, 3, 21, '50.57', '2012', 'REPUTED', '500 MTRs', '', '1', 'CABLE', 'PART NO. - 242002\r\n2 PAIR X 0.5 SQ.MM ( TYPE-F) ANNEALED TINNED COPPER, PAIR TWISTED INDIVIDUAL SHIELDED AND OVER ALL SHIELDED, VOLTAGE GRADE  1100V, UN ARMORED FRLS PVC SHEATHED CABLE. \r\nCOLOUR CODE OF PAIR:1. BLUE & RED, 2. GREY & YELLOW\r\n (OUTER PVC COLOR OF CABLE: LIGHT BLUE)\r\n ', '', 'CABLE, WIRE', '', '2014-10-09', '10:28:24 AM', 1, 6, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(23, 3, 21, '242.68', '2012', 'REPUTED', '100 MTRs', '', '1', 'WIRE', 'PART NO. - 205096 \r\n50 SQ.MM,RED COLOUR,SINGLE CORE MULTI STRAND ABC/PVC, GRADE 1.1 KV AS PER IS 694', '', 'WIRE', '', '2014-10-09', '10:30:20 AM', 1, 4, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(24, 3, 21, '77.00', '2012', 'REPUTED', '300 MTRs', '', '1', 'WIRE', 'PART NO. - 2250337\r\nWIRE ABC/PVC MSTR FLEX\r\nSIZE:16 SQMM\r\nCOLOUR:GREY ', '', 'WIRE', '', '2014-10-09', '10:32:09 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(25, 3, 21, '7320.00', '2012', 'FLUTEF', '3 COILS', '', '1', 'WIRE', 'PART NO. - 2101913\r\nWIRE TEFLON COAT SIZE:2.5 SQMM 600V GRADE-150Â°C THERMOPLASTIC TYPE COLOUR: GREEN/YELLOW ', '', 'WIRE', '', '2014-10-09', '10:33:38 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(26, 3, 21, '767.23', '2008', 'FLUTEF', '28 COILS', '', '1', 'WIRE', 'PART NO. - 18764\r\nWIRE CU TEFLON COAT SIZE:0.75 SQMM COLOUR:BROWN', '', 'WIRE', '', '2014-10-09', '10:35:05 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(27, 3, 21, '1095.00', '2012', 'KEI', '8', 'Udaipur', '1', 'WIRE', ' WIRE FRLS/ABC M STR FLEX ,  SIZE :2.5 SQMM,GRADE:1.1KV, COLOUR :RED\r\n100 MTR. COIL(COMPLIANCE TO IS-694)\r\nMAKE: POLYCAB/KEI ', '2031537', 'WIRE FRLS/ABC M STR FLEX ,  SIZE :2.5 SQMM,GRADE:1.1KV, COLOUR :RED 100 MTR. COIL(COMPLIANCE TO IS-694) MAKE: POLYCAB/KEI ', '', '2014-10-09', '10:42:21 AM', 1, 4, '', '0000-00-00', '2014-10-30', '02:11:24 PM', '', '0000-00-00', '0000-00-00'),
(28, 3, 21, '909.08', '2012', 'FLUTEF', '22 COILS', '', '1', 'WIRE', 'PART NO. - 1467937\r\nWIRE CU TEFLON COAT MSTR FLEX\r\nSIZE: 0.5 SQMM\r\nAWG 20, SIZE-19/32 - 600 GRADE\r\nCOLOUR: BLUE ', '', 'WIRE', '', '2014-10-09', '10:43:59 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(29, 3, 21, '5590.00', '2012', 'REPUTED', '3 COILS', '', '1', 'WIRE', 'PART NO. - 2251725 \r\nWIRE ABC PVC 10SQMM\r\nCOLOUR- WHITE\r\nMAKE-  RR KABLE', '', 'WIRE', '', '2014-10-09', '10:45:17 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(31, 3, 21, '1628.00', '2012', 'REPUTED', '10 COILS', '', '1', 'WIRE', 'PART NO. - 1918777 \r\nSINGLE CORE MULTISTRANDED CU WIRE WITH PVC INSULATION, HR/ATC\r\nSIZE:4.0 SQ.MM.\r\nCOLOUR: GREEN', '', 'WIRE', '', '2014-10-09', '10:47:47 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(32, 3, 21, '157.85', '2012', 'REPUTED', '100 MTR', '', '1', 'CABLE', ' PART NO. 201161\r\n3CX4 SQ.MM FLEXIBLE CABLE,COLOUR OF CORE: RED,YELLOW, BLUE OVERALL SHIELDING BY BRAIDED ATC WIRE,GRADE:600/1100V INDIVIDUAL CORE OF PVC INSULATED COPPER MSTR CONDUCTOR OF SIZE 4 SQMM, DRAIN WIRE REQUIRED.', '', 'CABLE', '', '2014-10-09', '10:52:21 AM', 1, 4, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(33, 3, 21, '1020.00', '2012', 'FILOLEX', '9', 'Udaipur', '1', 'WIRE', ' PART NO. - 1869207\r\nSINGLE CORE PVC INSULATED STRANDED 2.5 SQ.MM FRLS UNTINNED COPPER WIRE; 1100V GRADE;\r\nCOLOUR-BLACK WITH RED STRIP ', '1869207', ' PART NO. - 1869207 SINGLE CORE PVC INSULATED STRANDED 2.5 SQ.MM FRLS UNTINNED COPPER WIRE; 1100V GRADE; COLOUR-BLACK WITH RED STRIP ', '', '2014-10-09', '10:55:50 AM', 1, 4, '', '0000-00-00', '2014-10-30', '02:08:55 PM', '', '0000-00-00', '0000-00-00'),
(34, 3, 21, '2729.00', '2012', 'ROLLIFLEX', '6 COILS', '', '1', 'WIRE', 'PART NO. - 2295754\r\nFRLS ATC FLEXIBLE WIRE\r\nSIZE:- 4 SQMM  \r\nCOLOUR:- RED. ', '', 'WIRE', '', '2014-10-09', '10:57:10 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(35, 3, 21, '2729.00', '2012', 'ROLLIFLEX', '6 COILS', '', '1', 'WIRE', 'PART NO. - 2295756\r\nFRLS ATC FLEXIBLE WIRE\r\nSIZE:-4 SQMM\r\nCOLOUR:-BLUE ', '', 'WIRE', '', '2014-10-09', '10:58:26 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(36, 3, 21, '238.35', '2013', 'REPUTED', '60 MTRs', '', '1', 'WIRE', 'PART NO.205101\r\n50 SQ.MM,BLACK COLOUR,SINGLE CORE MULTI STRAND ABC/PVC, GRADE 1.1 KV AS PER IS 694\r\n ', '', 'WIRE', '', '2014-10-09', '11:02:21 AM', 1, 5, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(37, 3, 21, '9235.07', '2012', 'ABB', '23 NOs', '', '1', 'RELAY', 'PART NO. - 2379805\r\nLATCHING RELAY WITH BASE FOR CONTACT MULTIPLICATION, TYPE : PSU14N- 2X, HAVING 8 NO + 6 NC CONTACTS, AUXILIARY SUPPLY : 220V DC. ', '', 'RELAY', '', '2014-10-09', '11:08:22 AM', 0, 3, '', '0000-00-00', '0000-00-00', '', '03:34:40 A', '2014-11-21', '0000-00-00'),
(38, 3, 21, '825.00', '2011', 'SWAGELOK', '260 NOs', '', '1', 'VALVES & FITTING', 'PART NO. -  1729401\r\nTUBE  FITTING TYPE:DFDC MATL: SS316 SIZE:1/2"NPTM X TO SUIT 1/2"OD SS TUBE. \r\n(PART NO. SS-810-1-8)\r\nNOTE: TEST REQUIRED\r\n1. HELIUM LEAKAGE TEST\r\n2. TENSILE PULL TEST \r\n3. THERMAL SHOCK TEST\r\n4. HYDRO STATIC TEST AT 1.5 TIMES OF DESIGN PRESSURE', '', 'VALVES & FITTING', '', '2014-10-09', '11:21:23 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(39, 3, 21, '282.84', '2012', 'REPUTED', '49 NOs', '', '1', 'FLAME PROOF ITEM', 'PART NO. - 17292\r\nFLAME PROOF / WEATHERPROOF GR. IIC PUSH  BUTTON CONTROL STATION WITH SUITABLE  CABLE GLANDS ', '', 'FLAME PROOF ITEM', '', '2014-10-09', '11:27:18 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(40, 3, 21, '39000.00', '2010', 'C & S', '3 NOs', '', '1', 'RELAY', 'PART NO. - 1944224\r\nDIGITAL OVERCURRENT MULTIFUNCTION NUMERICAL RELAY MRI1 WITH COMMUNICATION FOR 1A CT SECONDARY CURRENT ,AUX VOLTAGE : 220V DC\r\nHOUSING (12TE): FLUSH MOUNTING ,TYPE: MRI1 ', '', 'RELAY', '', '2014-10-09', '11:29:07 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(41, 3, 21, '1016.41', '2010', 'SWAGELOK', '113 MTRs', '', '1', 'VALVE & FITTING', 'PART NO. - 204537\r\nSS TUBING 1/2â€OD X 0.049â€ WT\r\n(SS-T8-S-049-6ME) ', '', 'VALVE & FITTING', '', '2014-10-09', '11:33:05 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(43, 3, 21, '3131.88', '2010', 'REPUTED', '27 NOs', '', '1', 'FLAME PROOF ITEM', 'PART NO. - 17293\r\nEX PROOF / WEATHERPROOF GR.IIC SELECTOR  SWITCH 2 POLE 2 POS. WITH SUITABLE CABLE  GLANDS WITHOUT OFF ', '', 'FLAME PROOF ITEM', '', '2014-10-09', '11:41:55 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(44, 3, 21, '41.80', '2010', 'ELMAX', '1800 NOs ', '', '1', 'TERMINAL', 'PART NO. - 2222821 \r\nFUSE TYPE TERMINAL WITH LED\r\nINDICATION SUITABLE FOR 2.5 SQ.MM WIRE.\r\nSUPPLY:24V DC\r\nCOLOUR:GREY\r\nCAT NO: KUDF4D1 (GREY)', '', 'TERMINAL', '', '2014-10-09', '11:44:03 AM', 1, 1, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(45, 3, 21, '2815.86', '2010', 'FLEXPRO', '26 NOs', '', '1', 'FLAME PROOF ITEM', 'PART NO. - 17439\r\nEX PROOF INDICATION LAMP WITH LED  FOR GAS GROUP IIC, CABLE GLAND SUITABLE  FOR 2 CORE 1 SQMM CABLE SUPPLY VOLTAGE 24VDC COLOUR:YELLOW CAT:MFPB/305/IIC ', '', 'FLAME PROOF ITEM', '', '2014-10-09', '11:47:41 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(46, 3, 21, '2577.78', '2010', 'REPUTED', '28 NOs', '', '1', 'RELAY', 'PART NO. - 2112241\r\n LATCH CONTACTOR RELAY 230 VAC WITH 3NO+1NC, MECHANICALLY LATCHED, ELECTRICALLY RESET\r\nCAT NO. : 3RH14 31-1AP00 + 3RT19 26-3AP31\r\nMAKE : SIEMENS', '', 'RELAY', '', '2014-10-09', '11:52:26 AM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(47, 3, 21, '16045.00', '2010', 'REPUTED', '5 NOs', '', '1', 'CONTACT', 'PART NO. - 19105187\r\nFIXED+MOVING CONTACT FOR 2000A ACB, CAT NO.: 3WT98210DA00 ', '', 'CONTACT', '', '2014-10-09', '11:53:57 AM', 0, 1, '', '0000-00-00', '0000-00-00', '', '12:01:17 A', '2014-11-18', '0000-00-00'),
(48, 3, 21, '2815.86', '2010', 'FLEXPRO', '25 NOs', '', '1', 'FLAME PROOF ITEM', 'PART NO. - 17432\r\nEX PROOF INDICATION LAMP WITH LED  FOR GAS GROUP IIC, CABLE GLAND SUITABLE  FOR 2 CORE 1 SQMM CABLE SUPPLY VOLTAGE 24VDC COLOUR:GREEN CAT:MFPB/305/IIC ', '', 'FLAME PROOF ITEM', '', '2014-10-09', '11:55:40 AM', 0, 4, '', '0000-00-00', '0000-00-00', '', '12:01:15 A', '2014-11-18', '0000-00-00'),
(49, 3, 21, '3131.88', '2010', 'REPUTED', '20 NOs', '', '1', 'FLAME PROOF ITEM', 'PART NO. - 17294 \r\n EX PROOF / WEATHERPROOF GR.IIC NON LOCKABLE  SELECTOR SWITCH 2 POLE 2 POSITION  WITH  CABLE GLAND', '', 'FLAME PROOF ITEM', '', '2014-10-09', '11:57:12 AM', 0, 2, '', '0000-00-00', '0000-00-00', '', '12:01:13 A', '2014-11-18', '0000-00-00'),
(50, 3, 21, '622.86', '2010', 'SWAGELOK', '100 NOs', '', '1', 'VALVE & FITTING', 'PART NO. - 14367423\r\n SS316 TUBE 10 MM OD ITEM(S) AS PER SPECIFICATION SPECIFIED IN OUR LOI DATED\r\n15.10.05, SR NO14367423 PROJECT-RAPP & KAIGA(COMMISSIONING SPARES). ', '', 'VALVE & FITTING', '', '2014-10-09', '11:59:40 AM', 1, 1, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(51, 3, 21, '2591.43', '2010', 'K & N', '23 NOs', '', '1', 'SELECTOR SWITCH', 'PART NO. - 20527\r\nSELECTOR SWITCH  TYPE: CG4 WA2514 600 E93 ', '', 'SELECTOR SWITCH', '', '2014-10-09', '12:02:53 PM', 0, 2, '', '0000-00-00', '0000-00-00', '', '04:21:10 A', '2014-11-21', '0000-00-00'),
(52, 3, 21, '11466.00', '2010', 'SCHNEIDER', '5NOs', '', '1', 'MCCB & MCB', 'PART NO. - 1871401\r\nMCCB 16 AMPS FP,WITH S/C & O/L PROTECTION, BC:-70KA.\r\nCAT NO:-NS100H4P29685 ', '', 'MCCB & MCB', '', '2014-10-09', '12:05:39 PM', 0, 1, '', '0000-00-00', '0000-00-00', '', '11:58:45 A', '2014-11-17', '0000-00-00'),
(54, 3, 21, '385.00', '2010', 'SIEMENS', '132 NOs', '', '1', 'CONTACT', 'PART NO. - 2192130\r\nNO CONTACT FOR MUSHROOM HEAD PUSH BUTTON, CAT NO.:3SB34 03-0B ', '', 'CONTACT', '', '2014-10-09', '12:10:07 PM', 1, 2, '01:00:27 A', '2014-11-21', '0000-00-00', '', '01:00:26 A', '2014-11-21', '0000-00-00'),
(55, 3, 21, '4000.00', '2010', 'ALSTOM', '12 NOs', '', '1', 'SELECTOR SWITCH', 'PART NO. - 2225027\r\nODS ROTARY SWITCH,  \r\nNON LOCABLE WITH PISTOL,GRIP HANDLE,\r\nMECHANISM :  SPRING RETURN TO NEUTRAL  \r\nMODEL NO:- ODS/10/N/120/SRL4/PM/105  MAKE- ALSTOM ', '', 'SELECTOR SWITCH', '', '2014-10-09', '12:12:04 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(56, 3, 21, '4601.56', '2010', 'K & N', '9 NOs', '', '1', 'SELECTOR SWITCH', 'PART NO. - 1766435\r\nDISCREPANCY S/S\r\nSWITCH TYPE: CG4 SGJ 448-600,\r\nDIAGRAM ATTACHED. ', '', 'SELECTOR SWITCH', '', '2014-10-09', '12:14:22 PM', 1, 1, '12:01:13 P', '2014-11-17', '0000-00-00', '', '12:01:11 P', '2014-11-17', '0000-00-00'),
(57, 3, 21, '72.80', '2011', 'PHOENIX', '540 NOs', '', '1', 'TERMINAL', 'PART NO. - 2114011\r\nTERMINAL BLOCK DOUBLE DECK DIODE  COMMON CATHODE TYPE  CAT: UKK5-2DIO/O-UL/UR-UL ', '', 'TERMINAL', '', '2014-10-09', '12:16:01 PM', 1, 5, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(58, 3, 21, '7824.96', '2010', 'SIEMENS', '5 NOs', '', '1', 'MCCB & MCB', 'PART NO. - 163621\r\nTP MCCB,160A ,415V AC, 50 HZ, MICROPROCESSOR BASED TRIP UNIT, 55KA BC, ADJUSTABLE OVERLOAD & SHORT CIRCUIT PROTECTION ', '', 'MCCB & MCB', '', '2014-10-09', '12:17:43 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(59, 3, 21, '575.67', '2010', 'SWAGELOK', '60 NOs', '', '1', 'VALVE & FITTING', 'PART NO. - 14367420\r\nMALE CONNECTOR 1/2" NPT X 10 MM OD ITEM(S) AS PER SPECIFICATION SPECIFIED IN OUR LOI DATED\r\n15.10.05, SR NO14367420 PROJECT-RAPP & KAIGA(COMMISSIONING SPARES). ', '', 'VALVE & FITTING', '', '2014-10-09', '12:19:26 PM', 1, 1, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(62, 3, 21, '5100.00', '2010', 'IIC', '6 NOs', '', '1', 'ANNUNCIATOR', 'PART NO. - 1722204 \r\nALARM ANNUNCIATOR 4 POINT WITHOUT  LOGIC CARD, BEZEL SIZE-380(W)X190(H) , CUT OUT-331(W)X143(H), WINDOW SIZE : 55 X 31MM, 4C X 1R  SEQUENCE-MANUAL RESET SUPPLY VOLTAGE-110V AC', '', 'ANNUNCIATOR', '', '2014-10-09', '12:25:55 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(63, 3, 21, '579.20', '2010', 'EXCEL', '57 NOs', '', '1', 'VALVE & FITTING', 'PART NO. - 19678\r\nQUICK DISCONNECTING FITTING  SIZE:END CONNECTION TO SUIT  RUBBER HOSE   MATL:SS-304 ', '', 'VALVE & FITTING', '', '2014-10-09', '12:27:28 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(64, 3, 21, '7800.00', '2010', 'LOGICSTATE', '4', 'Udaipur', '1', 'TRANSFORMER', '3 PHASE ISOLATION TRANSFORMER I/P: 3PHASE 415 AC,O/P:3PHASE 415 VAC, VA RATING: 2.5 KVA ', '14870111', 'TRANSFORMER', '', '2014-10-09', '12:29:33 PM', 1, 2, '', '0000-00-00', '2014-10-27', '10:52:51 PM', '', '0000-00-00', '0000-00-00'),
(65, 3, 21, '3398.01', '2011', 'MEANWELL', '9', 'Udaipur', '1', 'POWER SUPPLY', 'POWER SUPPLY,I/P : 85-264V AC O/P : 24V DC @ 0~10A, MOUNTING PLATE MOUNTED', '209515', 'POWER SUPPLY', '', '2014-10-09', '12:31:15 PM', 1, 2, '', '0000-00-00', '2014-10-27', '10:52:19 PM', '', '0000-00-00', '0000-00-00'),
(66, 3, 21, '15015.41', '2012', 'ELNOVA', '2', 'Udaipur', '1', 'POWER SUPPLY', 'DC POWER SUPPLY \r\nOUTPUT: 0-60V DC\r\nINPUT VOLTAGE:230 V AC\r\nRATING:10A\r\nLINE REGULATION:+/- 0.05% +5MV TO 30MV\r\nLOAD REGULATION: 0.05% +5MV TO 30MV\r\nMODEL NO.  664600100\r\n ', '1870423', 'POWER SUPPLY', '', '2014-10-09', '12:33:15 PM', 0, 3, '', '0000-00-00', '2014-10-27', '10:49:39 PM', '03:34:42 A', '2014-11-21', '0000-00-00'),
(67, 3, 21, '2815.86', '2010', 'FLEXPRO', '10', 'Udaipur', '1', 'FLAME PROOF ITEM', 'EX PROOF INDICATION LAMP WITH LED  FOR GAS GROUP IIC, CABLE GLAND SUITABLE  FOR 2 CORE 1 SQMM CABLE SUPPLY VOLTAGE 24VDC, COLOUR RED ', '17436', 'FLAME PROOF ITEM', '', '2014-10-09', '12:36:09 PM', 1, 2, '', '0000-00-00', '2014-10-27', '10:49:12 PM', '', '0000-00-00', '0000-00-00'),
(68, 3, 21, '26.83', '2012', 'WAGO', '1040', 'Udaipur', '1', 'TERMINAL', 'TERMINAL BLOCK CAGE CLAMP TYPE ,CAT NO:- 279-907,COLOUR GREEN YELLOW. ', '205441', 'TERMINAL', '', '2014-10-09', '12:46:22 PM', 1, 2, '', '0000-00-00', '2014-10-27', '10:48:36 PM', '', '0000-00-00', '0000-00-00'),
(69, 3, 21, '1387.27', '2010', 'SWAGELOK', '20 NOs', '', '1', 'VALVE & FITTING', 'PART NO. - 14367422\r\nEQUAL TEE 10 MM OD ITEM(S) AS PER SPECIFICATION SPECIFIED IN OUR LOI DATED\r\n15.10.05, SR NO14367422 PROJECT-RAPP & KAIGA(COMMISSIONING SPARES). ', '', 'VALVE & FITTING', '', '2014-10-09', '12:48:40 PM', 1, 9, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(70, 3, 21, '8290.00', '2010', 'ALSTOM', '3 NOs', '', '1', 'RELAY', 'PART NO. - 1556504\r\nAUXILIARY RELAY, OPERATING VOLTAGE-110V DC,                      CASE SIZE-1D VERTICAL, MOUNTING- FLUSH TYPE,             FLAG REQUIRE, CONTACT CONFIGURATION- 8N/O  \r\nTYPE- VAJC-11 ', '', 'RELAY', '', '2014-10-09', '12:50:25 PM', 0, 3, '', '0000-00-00', '0000-00-00', '', '04:21:05 A', '2014-11-21', '0000-00-00'),
(71, 3, 21, '850.00', '2010', 'ABB', '28 NOs', '', '1', 'CONTACT', 'PART NO. - 1756654\r\nAUX. CONTACT 1N/O+1N/C FOR MCB, TYPE : S2H11 ', '', 'CONTACT', '', '2014-10-09', '12:51:43 PM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(72, 3, 21, '173.61', '2011', 'OEN', '135 NOs', '', '1', 'RELAY', 'PART NO. - 2046749\r\nAUX.RELAY, COIL VOLTAGE 24 V DC, 3 C/O CONTACTS WITH LED & DIODE. TYPE NO.- 2R-3-24 -DLD3 ', '', 'RELAY', '', '2014-10-09', '12:54:10 PM', 0, 2, '', '0000-00-00', '0000-00-00', '', '04:21:03 A', '2014-11-21', '0000-00-00'),
(73, 3, 21, '211.13', '2010', 'SIEMENS', '110 NOs', '', '1', 'PUSH BUTTON', 'PART NO. - 152516\r\nRED FLUSH TYPE ILLUMINATED PUSH BUTTON,LED TYPE,CUT OUT DIAMETER 22.5 MM, WITH 1NO+1NC CONTACT,VOLTAGE 24V AC/DC, PLASTIC SERIES ', '', 'PUSH BUTTON', '', '2014-10-09', '12:55:32 PM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(74, 3, 21, '137.87', '2009', 'EMAS', '150 NOs', '', '1', 'INDICATION LAMP', 'PART NO. -  1555901\r\nINDICATION LAMP WITH LED COLOUR-GREEN CUTOUT DIA-22.5MM SUPPLY:230VAC CAT NO:BOYOXY', '', 'INDICATION LAMP', '', '2014-10-09', '12:57:02 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(75, 3, 21, '6593.28', '2010', 'MEANWELL', '3 NOs', '', '1', 'POWER SUPPLY', 'PART NO. - 1985890\r\nPOWER SUPPLY 48 V DC, 12.5A RATING , MODEL NO.PSP600-48\r\nINPUT:- 240VAC ', '', 'POWER SUPPLY', '', '2014-10-09', '12:58:36 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(76, 3, 21, '61.17', '2010', 'CONNECTWELL', '300 NOs', '', '1', 'TERMINAL', 'PART NO. - 883831\r\nTERMINAL FUSE WITH 1A GLASS FUSE WITH  LED   INDICATION 230 VAC TYPE: DDFL4U(E)LR ', '', 'TERMINAL', '', '2014-10-09', '01:00:17 PM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(77, 3, 21, '6073.20', '2010', 'AREVA', '3 NOs', '', '1', 'RELAY', 'PART NO. - 19105102\r\nBREAKER CONTACT MULTIPLICATION RELAY, \r\nAUX SUPPLY:  220V DC, \r\nCAT NO.: VAJC-11ZF8303ACH\r\nCASE SIZE: 1/2N 20TER\r\nCONTACTS(UPPER) - 1M 1B E/R\r\n(LOWER-LH) - 3M 1B E/R\r\n(LOWER-RH) - 3M 1B E/R\r\nFLAG - YES\r\nMOUNTING - FLUSH\r\nAS PER DATA SHEET ATTACHED\r\n ', '', 'RELAY', '', '2014-10-09', '01:41:01 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(79, 3, 21, '13.17', '2010', 'WAGO', '1450 NOs', '', '1', 'TERMINAL', 'PART NO. - 2411858\r\nTERMINAL BLOCK, 4 WAY, SUITABLE FOR 2.5 SQ MM (FOR BUS TERMINAL), COLOR: GREY, TYPE: 280-833 ', '', 'TERMINAL', '', '2014-10-09', '01:43:51 PM', 0, 2, '', '0000-00-00', '0000-00-00', '', '04:48:26 A', '2015-03-10', '0000-00-00'),
(81, 3, 21, '120.97', '2010', 'EMAS', '149 NOs', '', '1', 'INDICATION LAMP', 'PART NO. - 1555902\r\nINDICATION LAMP WITH LED COLOUR-RED CUTOUT DIA-22.5MM SUPPLY:230VAC CAT NO:BOKOXK ', '', 'NIDICATION LAMP', '', '2014-10-09', '01:47:10 PM', 1, 4, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(82, 3, 21, '503.31', '2010', 'TELEMECHNIQUE', '35', '', '1', 'PUSH BUTTON', 'PART NO. - 19333\r\nILPB CAT:ZB5-AW0B534+ZB5 CW353 COLOUR:YELLOW ', '', 'PUSH BUTTON', '', '2014-10-09', '01:48:41 PM', 1, 1, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(84, 3, 21, '17.00', '2010', 'WAGO', '970 NOs', '', '1', 'TERMINAL', 'PART NO. - 204015\r\n280-519,500V/6KV A/0.08-2.5 SQ MM/20A TYPE, DOUBLE DECKER TERMINALS,SUITABLE FOR PIN TYPE LUGS, GREY COLOUR ', '', 'TERMINAL', '', '2014-10-09', '01:52:59 PM', 1, 3, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(85, 3, 21, '16745.00', '2010', 'SIEMENS', '1 NO', '', '1', 'CONTACTOR', 'PART NO. - 1910538\r\nPOWER CONTACTOR,TP,170A, WITH 2NO+2NC AUX CONTACT, COIL VOLTAGE: 110V AC, DUTY: AC3. CAT NO. : 3TF52 02-0A F0 ', '', 'CONTACTOR', '', '2014-10-09', '01:54:51 PM', 0, 1, '12:01:38 P', '2014-11-17', '0000-00-00', '', '03:34:44 A', '2014-11-21', '0000-00-00'),
(89, 3, 21, '16.17', '2010', 'PHOENIX', '900 NOs', '', '1', 'TERMINAL', 'PART NO. - 1606803\r\nSPRING CAGE TERMINAL, COLOUR- BLUE\r\nSUITABLE FOR 4 SQ.MM WIRE\r\nCAT NO.- ST4 BLUE ', '', 'TERMINAL', '', '2014-10-09', '02:03:02 PM', 1, 3, '11:16:41 A', '2014-11-17', '0000-00-00', '', '11:16:39 A', '2014-11-17', '0000-00-00'),
(90, 3, 21, '750.26', '2010', 'SWAGELOK', '20 NOs', '', '1', 'VALVE & FITTING', 'PART NO. - 14367425\r\nUNION 10 MM OD TUBE ITEM(S) AS PER SPECIFICATION SPECIFIED IN OUR LOI DATED\r\n15.10.05, SR NO14367425 PROJECT-RAPP & KAIGA(COMMISSIONING SPARES). ', '', 'VALVE & FITTING', '', '2014-10-09', '02:04:56 PM', 0, 5, '', '0000-00-00', '0000-00-00', '', '04:20:43 A', '2014-11-21', '0000-00-00'),
(91, 3, 21, '2500.00', '2010', 'PEPL', '6 NOs', '', '1', 'TRANSDUCER', 'PART NO. - 19105106\r\nVOLTAGE TRANSDUCER, \r\nAUX. SUPPLY- 220V DC, \r\nINPUT: 110V AC FROM PT SEC, OF 50VA, \r\nOUTPUT: 4 TO 20 MA DUAL \r\nACC.CLASS: 0.5,\r\nRANGE: 0-150V AC,\r\n1) ISOLATION REQURIED BETWEEN I/P & O/P\r\n2) ISOLATION REQURIED BETWEEN O/P1& O/P2\r\n3) ISOLATION REQURIED BETWEEN SUPPLY & EARTH\r\n4) MOUNTING: DIN RAIL TYPE\r\n5)CALIBRATION BY ZERO & SPAM POTS\r\n6)NO DIRFT IS REQUIRED ', '', 'TRANSDUCER', '', '2014-10-09', '02:21:23 PM', 0, 1, '', '0000-00-00', '0000-00-00', '', '12:00:49 A', '2014-11-18', '0000-00-00'),
(92, 3, 21, '7460.00', '2010', 'ALSTOM', '2 NOs', '', '1', 'RELAY', 'PART NO. - 1556502\r\nAUXILIARY RELAY, OPERATING VOLTAGE-110V DC,                      CASE SIZE-1D VERTICAL, MOUNTING- FLUSH TYPE,             FLAG REQUIRE, CONTACT CONFIGURATION- 4N/O + 4 N/C \r\nTYPE- VAJC-11 ', '', 'RELAY', '', '2014-10-09', '02:23:01 PM', 0, 2, '', '0000-00-00', '0000-00-00', '', '12:00:40 A', '2014-11-18', '0000-00-00'),
(93, 3, 21, '3709.61', '2010', 'K & N', '4 NOs', '', '1', 'SELECTOR SWITCH', 'PART NO. - 1756662\r\nSPRING RETURN TNC SWITCH  , TYPE : CG4 SGJ528-600 E93,\r\nCONTACT CONFIGURATION ATTACHED. ', '', 'SELECTOR SWITCH', '', '2014-10-09', '02:24:47 PM', 0, 1, '', '0000-00-00', '0000-00-00', '', '04:20:41 A', '2014-11-21', '0000-00-00'),
(94, 3, 21, '3260.40', '2010', 'REPUTED', '4', 'Udaipur', '1', 'WIRE', 'WIRE ABC PVC 6SQMM\r\nCOLOUR- GREEN WITH YELLOW STRIP\r\nMAKE- RR KABLE ', '2251723', 'WIRE', '', '2014-10-09', '02:26:21 PM', 0, 2, '', '0000-00-00', '2014-10-27', '10:46:35 PM', '12:01:30 A', '2014-11-18', '0000-00-00'),
(96, 3, 21, '2815.86', '2010', 'FLEXPRO', '5', 'Udaipur', '1', 'FLAME PROOF ITEM', 'EX PROOF INDICATION LAMP WITH LED  FOR GAS GROUP IIC, CABLE GLAND SUITABLE  FOR 2 CORE 1 SQMM CABLE SUPPLY VOLTAGE 230VAC COLOUR:GREEN CAT:MFPB/305/IIC ', '17431', 'FLAME PROOF ITEM', '', '2014-10-09', '02:31:18 PM', 1, 3, '', '0000-00-00', '2014-10-27', '10:45:45 PM', '', '0000-00-00', '0000-00-00'),
(98, 3, 21, '16.65', '2010', 'PHOENIX', '830 NOs', '', '1', 'TERMINAL', 'PART NO. -  18251\r\nTERMINAL BLOCK CAT:UK4-HTP', '', 'TERMINAL', '', '2014-10-09', '02:34:20 PM', 0, 8, '', '0000-00-00', '0000-00-00', '', '12:01:28 A', '2014-11-18', '0000-00-00'),
(99, 3, 21, '37.37', '2010', 'POWERAGE', '370 MTRs', '', '1', 'WIRE', 'PART NO. - 1672804\r\nCABLE SCREENED 2C X 1SQMM \r\nATC PVC MSTR FLEX WIRE \r\nCOLOUR : BLACK , WHITE\r\n& OUTER COLOUR GREY\r\nAS PER ANNEXURE#2 ', '', 'WIRE', '', '2014-10-09', '02:36:00 PM', 0, 7, '04:20:37 A', '2014-11-21', '0000-00-00', '', '04:20:39 A', '2014-11-21', '0000-00-00'),
(100, 3, 21, '3237.80', '2010', 'SCHYLLER', '4 NOs', '', '1', 'MODULAR BOX', 'PART NO. - 18879\r\nMODULAR BOXES FOR PROTECTING INSULATION REGULATION, MODEL 67.037 ', '', 'MODULAR BOX', '', '2014-10-09', '02:38:16 PM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(102, 3, 21, '4282.50', '2011', 'L&T', '3 NOs', '', '1', 'RELAY', 'PART NO. - 2096332\r\nBIMETAL OVERLOAD RELAY\r\nRANGE - 42-69 A, TYPE-MN 12, \r\nWITH RESET PUSH BUTTON & CORD\r\nCAT NO.- SS94138OOHO ', '', 'RELAY', '', '2014-10-09', '02:43:04 PM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(103, 3, 21, '1143.30', '2010', 'SCHYLLER', '11 NOs', '', '1', 'MODULAR BOX', 'PART NO. - 18882\r\nMODULAR BOXES FOR PROTECTING INSULATION REGULATION, MODEL 67.001 ', '', 'MODULAR BOX', '', '2014-10-09', '02:44:55 PM', 1, 1, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(104, 3, 21, '6279.82', '2010', 'R.STAHL', '2 NOs', '', '1', 'FLAME PROOF ITEM', 'PART NO. - 20668139\r\nEXPLOSION PROOF (EEXDE) PANEL MOUNTED INDICATION LAMP WITH 3 METER LONG FLEXIBLE CABLE.\r\nCOLOUR : RED\r\nSUPPLY : 24V DC\r\nMODEL NO. 8013/313-AL (RED)\r\nNOTE:MATERIAL MUST BE SUPPLIED WITH VALID ATEX CERTIFICATE ', '', 'FLAME PROOF ITEM', '', '2014-10-09', '02:46:51 PM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(107, 3, 21, '12372.52', '2010', 'APLAB', '1 NO', '', '1', 'POWER SUPPLY', 'PART NO. - 2049104\r\nFIXED DC POWER SUPPLY\r\nINPUT: 230V AC,50HZ\r\nOUTPUT:  +/- 24V DC / 2A\r\nCAT NO: LD3202-S\r\nMAKE: APLAB ', '', 'POWER SUPPLY', '', '2014-10-09', '02:51:12 PM', 0, 4, '01:46:11 P', '2014-10-30', '0000-00-00', '', '12:00:37 A', '2014-11-18', '0000-00-00'),
(108, 3, 21, '4103.31', '2010', 'GE', '3 NOs', '', '1', 'CONTACTOR', 'PART NO. - 18324504\r\n65A, TP POWER CONTACTOR, AC3 DUTY WITH 1NO AUX. CONTATC,  AUX. SUPPLY 110V AC, WITH AUXILLARY ADD ON BLOCK 2NO+1NC \r\n CAT.NO.-  CL07A311MJ ', '', 'CONTACTOR', '', '2014-10-09', '02:52:41 PM', 0, 1, '01:46:12 P', '2014-10-30', '0000-00-00', '', '12:00:35 A', '2014-11-18', '0000-00-00'),
(110, 3, 21, '2380.00', '2010', 'SALZER', '5 NOs', '', '1', 'SELECTOR SWITCH', 'PART NO. - 18033\r\nSELECTOR SWITCH  2 POLE RATING:100A/110VDC ON OFF POSITION CAT NO:61002', '', 'SELECTOR SWITCH', '', '2014-10-09', '02:55:29 PM', 1, 1, '09:02:22 A', '2014-11-19', '0000-00-00', '', '09:02:20 A', '2014-11-19', '0000-00-00'),
(113, 3, 21, '2970.00', '2010', 'PEPL', '4', 'Udaipur', '1', 'TRANSDUCER', ' VOLTAGE TRANSDUCERS , INPUT: 0-150V\r\nACC.CLAS: +/- 0.5, MEASURE RANGE:0-15 KV\r\nO/P: DUAL O/P 4-20MA, AUX. SUPPLY: 24V DC ', '1918785', ' VOLTAGE TRANSDUCERS , INPUT: 0-150V\r\nACC.CLAS: +/- 0.5, MEASURE RANGE:0-15 KV\r\nO/P: DUAL O/P 4-20MA, AUX. SUPPLY: 24V DC ', '', '2014-10-09', '03:00:17 PM', 1, 2, '01:46:35 P', '2014-10-30', '2014-11-26', '10:15:19 PM', '01:45:11 P', '2014-10-30', '0000-00-00'),
(118, 3, 21, '756.46', '2010', 'SCHYLLER', '20', 'Udaipur', '1', 'MODULAR BOX', 'MODULAR BOXES FOR PROTECTING INSULATION  REGULATION MODEL:93.254 ', '6015', 'MODULAR BOX', '', '2014-10-09', '03:15:23 PM', 0, 2, '01:46:27 P', '2014-10-30', '2014-10-27', '03:49:47 PM', '09:02:17 A', '2014-11-19', '0000-00-00'),
(119, 3, 21, '0.00', '', '', '', '', '', '', '', '', '', '', '2014-10-30', '11:59:56 AM', 0, 0, '04:48:23 A', '2015-03-10', '0000-00-00', '', '04:48:26 A', '2015-03-10', '0000-00-00'),
(123, 3, 14, '500.00', '2055', 'bbbbbb', '500', 'ghfghf', '3', 'bbbb', '    hfhfghfgh', '3535', '    hfhfghfgh', '', '2014-11-17', '01:04:37 AM', 0, 0, '', '0000-00-00', '2014-11-28', '06:34:44 PM', '03:13:54 A', '2014-11-22', '0000-00-00'),
(126, 3, 14, '500.00', '2055', 'bbbbbb', '500', 'ghfghf', '3', 'bbbb', '  hfhfghfgh', '3535', '  hfhfghfgh', '', '2014-11-17', '01:19:00 AM', 1, 1, '09:02:15 A', '2014-11-19', '2014-11-19', '05:18:05 PM', '09:02:14 A', '2014-11-19', '0000-00-00'),
(127, 3, 14, '500.00', '2055', 'bbbbbb', '500', 'ghfghf', '3', 'bbbb', '  hfhfghfgh', '3535', '  hfhfghfgh', '', '2014-11-17', '01:19:09 AM', 0, 1, '', '0000-00-00', '2014-11-19', '05:19:39 PM', '10:00:52 A', '2014-11-17', '0000-00-00'),
(128, 3, 14, '500.00', '2055', 'bbbbbb', '500', 'ghfghf', '3', 'bbbb', '  hfhfghfgh', '3535', '  hfhfghfgh', '', '2014-11-17', '01:19:17 AM', 0, 0, '', '0000-00-00', '2014-11-19', '05:20:07 PM', '09:59:16 A', '2014-11-17', '0000-00-00'),
(130, 3, 17, '500.00', '2055', 'bbbbbb', '500', 'ghfghf', '3', 'edcedcedc', '          hfhfghfgh', '3535', '          hfhfghfgh', '', '2014-11-17', '01:21:14 AM', 1, 1, '04:27:28 A', '2014-11-21', '2014-11-28', '06:34:06 PM', '01:28:53 A', '2014-11-19', '0000-00-00'),
(132, 3, 14, '500.00', '2055', 'bbbbbb', '500', 'ghfghf', '3', 'bbbb', ' hfhfghfgh', '3535', ' hfhfghfgh', '', '2014-11-17', '01:34:15 AM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(133, 3, 3, '2555.00', '2035', 'ddddd', '2222', 'fddgdfg', '1', 'dd', ' dfsdfsdfsd', '325', ' dfsdfsdfsd', 'city.jpg,water.jpg,sunset.jpg', '2014-11-17', '01:35:56 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(134, 3, 3, '2555.00', '2035', 'ddddd', '2222', 'fddgdfg', '1', 'dd', ' dfsdfsdfsd', '325', ' dfsdfsdfsd', 'city.jpg,water.jpg,sunset.jpg', '2014-11-17', '01:36:27 AM', 0, 0, '', '0000-00-00', '0000-00-00', '', '04:20:33 A', '2014-11-21', '0000-00-00'),
(135, 3, 2, '5252.00', '5252', 'CISCO', '52', '525', '2', '', 'Wheather Proof Cable', '2525452', 'Whether Proof Cables used in Various types of Panels, Junction Boxes', 'city.jpg,water.jpg,sunset.jpg,butterfly.jpg', '2014-11-17', '02:13:50 AM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(136, 3, 2, '5252.00', '5252', 'CISCO', '52', '525fdfdfdf', '2', 'MIMIC LED ITEMS ( Wire )', '      retereeeeqqqqqq wewe ewer', '2525452', '      retereeeeqqqqqq wewe ewer', '', '2014-11-17', '02:14:20 AM', 0, 1, '', '0000-00-00', '2014-11-28', '06:33:35 PM', '04:20:31 A', '2014-11-21', '0000-00-00'),
(137, 3, 2, '5252.00', '5252', 'CISCO', '52', '525', '2', 'MIMIC LED ITEMS ( Wire )', 'Whether Proof Cables used in Various types of Pane.', '2525452', 'Whether Proof Cables used in Various types of Panels, Junction Boxes', 'city.jpg,water.jpg,sunset.jpg,butterfly.jpg', '2014-11-17', '02:14:45 AM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(139, 3, 2, '5252.00', '5252', 'CISCO', '52', '525', '2', 'MIMIC LED ITEMS ( Wire )', '  retereeee', '2525452', 'Whether Proof Cables used in Various types of Panels, Junction Boxes', 'Accessories.jpg,Cables.jpg', '2014-11-17', '02:15:51 AM', 1, 5, '', '0000-00-00', '2014-11-27', '12:38:46 PM', '', '0000-00-00', '0000-00-00'),
(140, 3, 2, '5252.00', '5252', 'CISCO', '52', '525', '2', 'MIMIC LED ITEMS ( Wire )', 'Whether Proof Cables used in Various types of Pane.', '2525452', 'Whether Proof Cables used in Various types of Panels, Junction Boxes', '', '2014-11-17', '02:18:18 AM', 1, 21, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00'),
(141, 3, 2, '5252.00', '5252', 'CISCO', '52', '525', '2', 'MIMIC LED ITEMS ( Wire )', '  retereeee', '2525452', 'Whether Proof Cables used in Various types of Panels, Junction Boxes', '', '2014-11-17', '02:19:39 AM', 1, 26, '', '0000-00-00', '2014-11-21', '02:56:33 PM', '', '0000-00-00', '0000-00-00'),
(143, 3, 2, '5353.00', '5285', 'Flutef ', '5555', 'Meters', '1', 'Flutef ', 'Cables Wires', '76578', 'Cables Wires', '', '2014-11-17', '04:11:37 PM', 0, 0, '', '0000-00-00', '2014-11-28', '06:30:50 PM', '10:00:27 A', '2014-11-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `edit_classified_posts`
--

CREATE TABLE IF NOT EXISTS `edit_classified_posts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classified_post_id` int(10) NOT NULL,
  `edit_user_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `sub_category_id` int(12) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `year` varchar(8) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `city_id` int(20) NOT NULL,
  `location_address` text NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `part_no` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `draft_status` int(2) NOT NULL,
  `click_cnt` int(50) NOT NULL,
  `time_active_last` varchar(20) NOT NULL,
  `date_active_last` date NOT NULL,
  `last_edit_date` date NOT NULL,
  `last_edit_time` varchar(20) NOT NULL,
  `time_deactive_last` varchar(20) NOT NULL,
  `date_deactive_last` date NOT NULL,
  `expires_date` date NOT NULL,
  `current_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `edit_classified_posts`
--

INSERT INTO `edit_classified_posts` (`id`, `classified_post_id`, `edit_user_id`, `user_id`, `sub_category_id`, `price`, `year`, `brand`, `stock`, `city_id`, `location_address`, `product_name`, `part_no`, `description`, `photo`, `date`, `time`, `draft_status`, `click_cnt`, `time_active_last`, `date_active_last`, `last_edit_date`, `last_edit_time`, `time_deactive_last`, `date_deactive_last`, `expires_date`, `current_date`) VALUES
(1, 9, 0, 3, 18, '200.00', '', 'ram2', '20', 1, 'sector 4 hiran magri', 'ram1', '', 'ram ram ram ram', 'ferrari_scuderia_spider_hdtv_1080p-HD.jpg,ferrari_f430_calavera-wide.jpg,oakley_design_ferrari_458_italia-wide.jpg', '2014-10-08', '05:21:29 PM', 1, 35, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 9, 0, 3, 28, '200.00', '2020', 'ram2dfdfd', '20fdfdfdfdf', 2, 'sector 4 hirafgn magrifdfd', 'ram1ssssdfdf', '12345fdfddfdggdfg', '      ram ragdfgm ram ramfdf', '537037.JPG', '2014-10-08', '05:21:29 PM', 1, 35, '', '0000-00-00', '2014-10-10', '03:12:18 PM', '', '0000-00-00', '0000-00-00', '2014-10-10'),
(3, 9, 0, 3, 28, '200.00', '2020', 'ram2', '20', 2, 'sector 4 dsdsd', 'ram1', '12345', '       ram ragdfgm ', '537087.JPG,537076.JPG,537077.JPG', '2014-10-08', '05:21:29 PM', 1, 35, '', '0000-00-00', '2014-10-10', '03:14:01 PM', '', '0000-00-00', '0000-00-00', '2014-10-10'),
(4, 9, 0, 3, 26, '25.00', '252', 'aaaaaaaa', '2014', 1, 'aaaaaaa', 'aaaaa', 'aaaaaaaaa', 'aaaaa', '537087.JPG,537076.JPG,537077.JPG', '2014-10-08', '05:21:29 PM', 1, 35, '', '0000-00-00', '2014-10-10', '03:24:41 PM', '', '0000-00-00', '0000-00-00', '2014-10-10'),
(5, 9, 0, 3, 26, '25.00', '252', 'aaaaaaaa', '2014', 1, 'aaaaaaa', 'aaaaa', 'aaaaaaaaa', ' aaaaa', '537087.JPG,537076.JPG', '2014-10-08', '05:21:29 PM', 1, 35, '', '0000-00-00', '2014-10-10', '03:24:52 PM', '', '0000-00-00', '0000-00-00', '2014-10-10'),
(6, 441, 0, 3, 24, '5252.00', '5252', 'gdfgdf', '525', 2, 'yryr', 'fgdfgd', 'thty', ' tyrty', '537075.JPG,537045.JPG,537020.JPG', '2014-10-10', '05:15:25 PM', 0, 0, '05:20:00 PM', '2014-10-10', '0000-00-00', '', '05:19:59 PM', '2014-10-10', '0000-00-00', '2014-10-10'),
(7, 443, 0, 3, 50, '585.00', '8585', 'erter', '52', 1, 'rtertr', 'rtretert', '528', ' terter', '537026.JPG,537017.JPG,537014.JPG', '2014-10-10', '05:16:23 PM', 0, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-10-10'),
(8, 443, 0, 3, 50, '585.00', '8585', 'erter', '52', 1, 'rtertr', 'rtretert', '528', '  terter', '537026.JPG,537017.JPG', '2014-10-10', '05:16:23 PM', 0, 0, '', '0000-00-00', '2014-10-10', '05:26:30 PM', '', '0000-00-00', '0000-00-00', '2014-10-10'),
(9, 8, 0, 3, 28, '0.00', '0', 'gdfg', 'gdfgdfg', 2, '', 'fdfggggggg', '', '   fdgf  ', 'bearing1.jpg', '2014-10-06', '11:09:22 PM', 0, 0, '05:58:40 PM', '2014-10-10', '2014-10-09', '06:30:53 PM', '05:58:34 PM', '2014-10-10', '0000-00-00', '2014-10-10'),
(10, 444, 0, 3, 25, '525.00', '525', 'erter', '525', 2, 'dgfdfg', 'retr', 'fdfg', ' dfgdfg', '537014.JPG,537016.JPG', '2014-10-10', '05:16:43 PM', 0, 0, '05:29:27 PM', '2014-10-10', '0000-00-00', '', '05:58:32 PM', '2014-10-10', '0000-00-00', '2014-10-10'),
(11, 450, 0, 3, 27, '8288.00', '222282', 'fdg', '282', 1, '828', 'fgdfgf', '8288', ' 28828', '', '2014-10-10', '06:21:50 PM', 0, 0, '', '0000-00-00', '0000-00-00', '', '10:51:14 AM', '2014-10-11', '0000-00-00', '2014-10-11'),
(12, 458, 0, 3, 56, '545.00', '545', 'dfsdf', '45', 3, 'dsfds', 'sdsfs', '45', ' sdfsdf', '000000.JPG', '2014-10-11', '04:57:14 PM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-10-11'),
(13, 459, 0, 3, 57, '545.00', '545', 'dfsdf', '45', 3, 'dsfds', 'sdsfs', '45', ' sdfsdf', '', '2014-10-11', '04:57:55 PM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-10-11'),
(14, 459, 0, 3, 31, '545.00', '545', 'dfsdf', '45', 3, 'dsfds', 'sdsfs', '45', '  sdfsdf', '08.JPG', '2014-10-11', '04:57:55 PM', 1, 0, '', '0000-00-00', '2014-10-11', '05:35:49 PM', '', '0000-00-00', '0000-00-00', '2014-10-11'),
(15, 459, 0, 3, 33, '545.00', '545', 'dfsdf', '45', 3, 'dsfds', 'sdsfs', '45', '   sdfsdf', '08.JPG', '2014-10-11', '04:57:55 PM', 1, 0, '', '0000-00-00', '2014-10-11', '05:36:08 PM', '', '0000-00-00', '0000-00-00', '2014-10-11'),
(16, 459, 0, 3, 33, '545.00', '545', 'dfsdf', '45', 3, 'dsfds', 'sdsfs', '45', '    sdfsdf', '08.JPG', '2014-10-11', '04:57:55 PM', 1, 0, '', '0000-00-00', '2014-10-11', '05:36:21 PM', '', '0000-00-00', '0000-00-00', '2014-10-11'),
(17, 457, 0, 3, 56, '42.00', '45254', 'gfrgg', '5425422', 1, 'rtr', 'derfr', '41drtr', ' rt', '', '2014-10-11', '04:52:09 PM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-10-11'),
(18, 461, 0, 3, 45, '8585.00', '58585', 'gdfg', '85', 2, '5858', 'dgdf', '8585', ' 585', '08.JPG', '2014-10-11', '05:49:57 PM', 1, 0, '01:15:48 PM', '2014-10-13', '0000-00-00', '', '01:15:46 PM', '2014-10-13', '0000-00-00', '2014-10-13'),
(19, 461, 3, 3, 46, '33500.00', '2014', 'g 5070', '20', 1, 'bapu bajar', 'laptop', '142578', '4 gb ram ,windows 8.1', '08.JPG', '2014-10-11', '05:49:57 PM', 1, 0, '01:15:48 PM', '2014-10-13', '2014-10-13', '01:40:06 PM', '01:15:46 PM', '2014-10-13', '0000-00-00', '2014-10-13'),
(20, 461, 1, 3, 46, '33500.00', '2014', 'g 5070', '20', 1, 'bapu bajar', 'laptop', '142578', ' 4 gb ram ,windows 8.1ererer', '08.JPG', '2014-10-11', '05:49:57 PM', 1, 0, '01:15:48 PM', '2014-10-13', '2014-10-13', '01:50:26 PM', '01:15:46 PM', '2014-10-13', '0000-00-00', '2014-10-13'),
(21, 459, 1, 3, 35, '545.00', '545', 'dfsdf', '45', 3, 'dsfds', 'sdsfs', '45', '     sdfsdf', '08.JPG', '2014-10-11', '04:57:55 PM', 1, 0, '04:50:15 PM', '2014-10-13', '2014-10-11', '05:37:25 PM', '04:50:17 PM', '2014-10-13', '0000-00-00', '2014-10-13'),
(22, 460, 3, 3, 22, '5225.00', '2525', 'gfg', '2525', 4, 'sdgdsg', 'fgg', 'sdg', ' sdgdsg', '3suk0ct0.jpg', '2014-10-11', '05:49:02 PM', 0, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-10-29'),
(23, 460, 3, 3, 16, '2525.00', '2525', 'hhhhhhhhh', '2525', 1, '2525', 'hhhhhhhhhh', '2525', '2525', '320108~1.JPG,422085~1.JPG,422085~1.JPG,422085~1.JPG,422085~1.JPG,BLOOM4.JPG,320194~1.JPG,422085~1.JPG,320190~1.JPG,BLOOM4.JPG', '2014-10-11', '05:49:02 PM', 0, 0, '', '0000-00-00', '2014-10-29', '02:35:12 PM', '', '0000-00-00', '0000-00-00', '2014-10-29'),
(24, 460, 3, 3, 16, '2525.00', '2525', 'hhhhhhhhh', '2525', 1, '2525', 'hhhhhhhhhh', '2525', ' 2525', '', '2014-10-11', '05:49:02 PM', 0, 0, '', '0000-00-00', '2014-10-29', '02:36:44 PM', '', '0000-00-00', '0000-00-00', '2014-10-29'),
(25, 460, 3, 3, 16, '2525.00', '2525', 'hhhhhhhhh', '2525', 1, '2525', 'hhhhhhhhhh', '2525', '  2525', '320194~1.JPG,320190~1.JPG', '2014-10-11', '05:49:02 PM', 0, 0, '', '0000-00-00', '2014-10-29', '02:37:11 PM', '', '0000-00-00', '0000-00-00', '2014-10-29'),
(26, 460, 3, 3, 16, '2525.00', '2525', 'hhhhhhhhh', '2525', 1, '2525', 'hhhhhhhhhh', '2525', '   2525', '320194~1.JPG,320190~1.JPG', '2014-10-11', '05:49:02 PM', 0, 0, '', '0000-00-00', '2014-10-29', '02:41:35 PM', '', '0000-00-00', '0000-00-00', '2014-10-29'),
(27, 460, 3, 3, 16, '2525.00', '2525', 'hhhhhhhhh', '2525', 1, '2525', 'hhhhhhhhhh', '2525', '    2525', '320194~1.JPG,320190~1.JPG', '2014-10-11', '05:49:02 PM', 0, 0, '', '0000-00-00', '2014-10-29', '02:44:08 PM', '', '0000-00-00', '0000-00-00', '2014-10-29'),
(28, 460, 3, 3, 16, '2525.00', '2525', 'hhhhhhhhh', '2525', 1, '2525', 'hhhhhhhhhh', '2525', '     2525', '320194~1.JPG,320190~1.JPG', '2014-10-11', '05:49:02 PM', 0, 0, '', '0000-00-00', '2014-10-29', '02:47:07 PM', '', '0000-00-00', '0000-00-00', '2014-10-29'),
(29, 131, 3, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', ' hfhfghfgh', 'butterfly.jpg,sunset.jpg,city.jpg', '2014-11-17', '01:21:28 AM', 1, 0, '10:04:34 A', '2014-11-17', '0000-00-00', '', '10:04:32 A', '2014-11-17', '0000-00-00', '2014-11-18'),
(30, 131, 3, 3, 22, '5088888.00', '2055333', 'ppppppppppppppp', '500333', 1, 'ooooooooooooo', 'bbbbaaaaaaaaaaaaaaaaaaaa', '35358888', 'fdgdfgdgdgdfg  hfhfghfgh', 'butterfly.jpg,023.jpg,8.JPG,5.JPG,8.JPG,9.JPG', '2014-11-17', '01:21:28 AM', 1, 0, '10:04:34 A', '2014-11-17', '2014-11-18', '10:12:07 PM', '10:04:32 A', '2014-11-17', '0000-00-00', '2014-11-18'),
(31, 131, 3, 3, 25, '8000.00', '2016', 'e1 dual', '10', 2, 'udaipur bapu bajar peeragon', 'sony mobile', '136548', 'rajasthan amarpura', 'butterfly.jpg,023.jpg,8.JPG,BABY16JPG.JPG,2.jpg,ph-10012.jpg', '2014-11-17', '01:21:28 AM', 1, 0, '10:04:34 A', '2014-11-17', '2014-11-18', '10:17:12 PM', '10:04:32 A', '2014-11-17', '0000-00-00', '2014-11-18'),
(32, 130, 3, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', ' hfhfghfgh', 'butterfly.jpg,sunset.jpg,city.jpg', '2014-11-17', '01:21:14 AM', 0, 0, '', '0000-00-00', '0000-00-00', '', '09:58:37 A', '2014-11-17', '0000-00-00', '2014-11-19'),
(33, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '  hfhfghfgh', 'sunset.jpg', '2014-11-17', '01:21:14 AM', 0, 0, '', '0000-00-00', '2014-11-19', '08:11:21 AM', '09:58:37 A', '2014-11-17', '0000-00-00', '2014-11-19'),
(34, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '   hfhfghfgh', 'sunset.jpg', '2014-11-17', '01:21:14 AM', 0, 0, '', '0000-00-00', '2014-11-19', '08:12:54 AM', '09:58:37 A', '2014-11-17', '0000-00-00', '2014-11-19'),
(35, 143, 3, 3, 27, '5353.00', '5285', 'wwww', '5555', 1, '7545', 'wwww', 'fghfgh', ' dfgdfgdfg', 'WIN_20141103_212915.JPG', '2014-11-17', '04:11:37 PM', 0, 0, '', '0000-00-00', '0000-00-00', '', '10:00:27 A', '2014-11-17', '0000-00-00', '2014-11-19'),
(36, 123, 3, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', ' hfhfghfgh', 'butterfly.jpg,sunset.jpg,city.jpg', '2014-11-17', '01:04:37 AM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-11-19'),
(37, 126, 3, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', ' hfhfghfgh', 'butterfly.jpg,sunset.jpg,city.jpg', '2014-11-17', '01:19:00 AM', 1, 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-11-19'),
(38, 127, 3, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', ' hfhfghfgh', 'butterfly.jpg,sunset.jpg,city.jpg', '2014-11-17', '01:19:09 AM', 0, 0, '', '0000-00-00', '0000-00-00', '', '10:00:52 A', '2014-11-17', '0000-00-00', '2014-11-19'),
(39, 128, 3, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', ' hfhfghfgh', 'butterfly.jpg,sunset.jpg,city.jpg', '2014-11-17', '01:19:17 AM', 0, 0, '', '0000-00-00', '0000-00-00', '', '09:59:16 A', '2014-11-17', '0000-00-00', '2014-11-19'),
(40, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '    hfhfghfgh', 'sunset.jpg,payal hi5.jpg,BABY02.JPG,20.JPG,800x600_081.jpg', '2014-11-17', '01:21:14 AM', 0, 0, '01:28:51 A', '2014-11-19', '2014-11-19', '08:21:49 AM', '01:28:53 A', '2014-11-19', '0000-00-00', '2014-11-19'),
(41, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '     hfhfghfgh', '', '2014-11-17', '01:21:14 AM', 0, 0, '01:28:51 A', '2014-11-19', '2014-11-19', '05:20:56 PM', '01:28:53 A', '2014-11-19', '0000-00-00', '2014-11-19'),
(42, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '      hfhfghfgh', '9.JPG', '2014-11-17', '01:21:14 AM', 0, 0, '01:28:51 A', '2014-11-19', '2014-11-19', '05:21:09 PM', '01:28:53 A', '2014-11-19', '0000-00-00', '2014-11-19'),
(43, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '       hfhfghfgh', '3.gif', '2014-11-17', '01:21:14 AM', 0, 0, '01:28:51 A', '2014-11-19', '2014-11-19', '05:21:24 PM', '01:28:53 A', '2014-11-19', '0000-00-00', '2014-11-19'),
(44, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '        hfhfghfgh', '3.gif,ph-10015.jpg,6.jpg,1.jpeg', '2014-11-17', '01:21:14 AM', 0, 0, '01:28:51 A', '2014-11-19', '2014-11-19', '10:29:47 PM', '01:28:53 A', '2014-11-19', '0000-00-00', '2014-11-19'),
(45, 141, 3, 3, 2, '5252.00', '5252', 'yrtyrt', '52', 2, '525', 'trrrt', '2525452', ' retereeee', '', '2014-11-17', '02:19:39 AM', 1, 2, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-11-21'),
(46, 136, 0, 3, 2, '5252.00', '5252', 'yrtyrt', '52', 2, '525', 'trrrt', '2525452', ' retereeee', 'city.jpg,water.jpg,sunset.jpg,butterfly.jpg', '2014-11-17', '02:14:20 AM', 0, 0, '', '0000-00-00', '0000-00-00', '', '04:20:31 A', '2014-11-21', '0000-00-00', '2014-11-21'),
(47, 136, 0, 3, 2, '5252.00', '5252', 'yrtyrt', '52', 2, '525', 'trrrt', '2525452', '  retereeee', '2.jpg', '2014-11-17', '02:14:20 AM', 0, 0, '', '0000-00-00', '2014-11-21', '06:19:25 PM', '04:20:31 A', '2014-11-21', '0000-00-00', '2014-11-21'),
(48, 136, 0, 3, 2, '5252.00', '5252', 'yrtyrt', '52', 2, '525', 'trrrt', '2525452', '   retereeee', '2.jpg,9.JPG', '2014-11-17', '02:14:20 AM', 0, 0, '', '0000-00-00', '2014-11-21', '06:20:53 PM', '04:20:31 A', '2014-11-21', '0000-00-00', '2014-11-21'),
(49, 136, 0, 3, 2, '5252.00', '5252', 'yrtyrt', '52', 2, '525fdfdfdf', 'trrrt', '2525452', '    retereeee', '2.jpg,9.JPG', '2014-11-17', '02:14:20 AM', 0, 0, '', '0000-00-00', '2014-11-21', '06:23:02 PM', '04:20:31 A', '2014-11-21', '0000-00-00', '2014-11-21'),
(50, 123, 0, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', '  hfhfghfgh', '', '2014-11-17', '01:04:37 AM', 1, 0, '', '0000-00-00', '2014-11-19', '05:17:46 PM', '', '0000-00-00', '0000-00-00', '2014-11-22'),
(51, 143, 0, 3, 27, '5353.00', '5285', 'wwww', '5555', 1, '7545', 'wwww', 'fghfgh', '  dfgdfgdfg', '', '2014-11-17', '04:11:37 PM', 0, 0, '', '0000-00-00', '2014-11-19', '05:17:27 PM', '10:00:27 A', '2014-11-17', '0000-00-00', '2014-11-26'),
(52, 113, 0, 3, 21, '2970.00', '2010', 'PEPL', '4', 1, 'Udaipur', 'TRANSDUCER', '1918785', 'VOLTAGE TRANSDUCERS , INPUT: 0-150V\r\nACC.CLAS: +/- 0.5, MEASURE RANGE:0-15 KV\r\nO/P: DUAL O/P 4-20MA, AUX. SUPPLY: 24V DC ', '', '2014-10-09', '03:00:17 PM', 1, 2, '01:46:35 P', '2014-10-30', '2014-10-27', '10:40:49 PM', '01:45:11 P', '2014-10-30', '0000-00-00', '2014-11-26'),
(53, 139, 3, 3, 2, '5252.00', '5252', 'yrtyrt', '52', 2, '525', 'trrrt', '2525452', ' retereeee', 'city.jpg,water.jpg,sunset.jpg,butterfly.jpg', '2014-11-17', '02:15:51 AM', 1, 4, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '2014-11-27'),
(54, 143, 3, 3, 27, '5353.00', '5285', 'wwww', '5555', 1, '7545', 'wwww', 'fghfgh', '   dfgdfgdfg', '', '2014-11-17', '04:11:37 PM', 0, 0, '', '0000-00-00', '2014-11-26', '01:48:41 PM', '10:00:27 A', '2014-11-17', '0000-00-00', '2014-11-28'),
(55, 136, 3, 3, 2, '5252.00', '5252', 'CISCO', '52', 2, '525fdfdfdf', 'MIMIC LED ITEMS ( Wire )', '2525452', '     retereeeeqqqqqq wewe ewer', '2.jpg,9.JPG', '2014-11-17', '02:14:20 AM', 0, 1, '', '0000-00-00', '2014-11-21', '06:23:51 PM', '04:20:31 A', '2014-11-21', '0000-00-00', '2014-11-28'),
(56, 130, 3, 3, 17, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'edcedcedc', '3535', '         hfhfghfgh', '3.gif,1.jpeg,023.jpg', '2014-11-17', '01:21:14 AM', 1, 0, '04:27:28 A', '2014-11-21', '2014-11-19', '10:30:02 PM', '01:28:53 A', '2014-11-19', '0000-00-00', '2014-11-28'),
(57, 123, 3, 3, 14, '500.00', '2055', 'bbbbbb', '500', 3, 'ghfghf', 'bbbb', '3535', '   hfhfghfgh', 'k1.JPG,zuza2.jpg', '2014-11-17', '01:04:37 AM', 0, 0, '', '0000-00-00', '2014-11-22', '10:38:26 AM', '03:13:54 A', '2014-11-22', '0000-00-00', '2014-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `email_alerts`
--

CREATE TABLE IF NOT EXISTS `email_alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `sub_category_id` int(5) NOT NULL,
  `classified_post_id` int(10) NOT NULL,
  `email_status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `email_alerts`
--

INSERT INTO `email_alerts` (`id`, `user_id`, `sub_category_id`, `classified_post_id`, `email_status`) VALUES
(5, 9, 23, 12, 1),
(10, 7, 23, 12, 1),
(11, 7, 28, 8, 1),
(13, 7, 29, 464, 1),
(37, 3, 19, 0, 0),
(41, 3, 40, 0, 0),
(45, 3, 58, 0, 0),
(46, 3, 16, 0, 0),
(48, 3, 55, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'whatddfss sgwg ????', 'efewtwetew sefwewgeg'),
(2, 'erweweew wefwe sfeer ewwet?????', 'rger ergerg gergre drereeg ergeg'),
(3, 'fsdf', 'sdfs'),
(4, 'fsdf', 'sdfs'),
(5, 'ftert', 'etertet'),
(6, 'retr', 'tyrtyrt'),
(7, 'ytrty', 'yrtyr'),
(8, 'vvvv', 'vvvvvdfdf'),
(9, 'vvvv', 'vvvvvdfdf'),
(10, 'gedrter', 'rtert'),
(11, 'sssssss', 'sssssssss'),
(12, 'sdsds', 'dsds'),
(13, 'gdfg', 'gdfgd'),
(14, 'gdfg', 'gdfgd'),
(15, 'gdfg', 'gdfgd'),
(16, 'gdfg', 'gdfgd'),
(17, 'gdfg', 'gdfgd'),
(18, 'gdfg', 'gdfgd'),
(19, 'gdfg', 'gdfgd'),
(20, 'gdfg', 'gdfgd'),
(21, 'gdfg', 'gdfgd'),
(22, 'fd', 'gdfgfg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_post_cost`
--

CREATE TABLE IF NOT EXISTS `inventory_post_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_quantity` int(5) NOT NULL,
  `max_quantity` int(5) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `designation_id` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `approval_status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `designation_id`, `email`, `password`, `approval_status`) VALUES
(1, 1, 'vinodindia72@gmail.com', '55e4751ffa3139d0a6fac939d868eab0', 1),
(3, 2, 'ankit@phppoets.com', '5d41402abc4b2a76b9719d911017c592', 1),
(7, 2, 'vinodindia73@gmail.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1),
(23, 2, 'sdfsd@ferer.c', 'e7cce9523daca057749f8b2f6ba00552', 1),
(20, 2, 'asdagdgdffgdddfgdsd@sdfsf.ccom', '', 0),
(24, 2, '2525@vcbcv.df', '', 0),
(26, 2, 'ttttttttry!@rgr.ty', 'e51f5f5c3419d2acd09315a7903d0079', 1),
(28, 2, 'asdad@rgsgfd.com', 'ade7a3c9d24a84f173b678412ba3c856', 1),
(29, 2, 'asddfsdad@rgsgfd.com', '', 0),
(30, 2, 'vinodindia71@gmaifdddl.com', '', 0),
(31, 2, 'vindddddddodindia71@gmaifdddl.', '', 0),
(32, 2, 'vinofgdfgdfgdfgdindia72@gmail.', '', 0),
(33, 2, 'vidsdfsdfnofgdfgdfgdfgdindia72', '', 0),
(35, 2, 'vitertnodindia72@gmail.com', '', 0),
(36, 2, 'vindtttdindia71@gmaifdddl.com', '', 0),
(37, 2, 'vinodindhjggfia71@gmail.com', '', 0),
(38, 2, 'asdagdxdsd@sdfsf.ccom', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mail_box_cronjobs`
--

CREATE TABLE IF NOT EXISTS `mail_box_cronjobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `message` text NOT NULL,
  `status` int(2) NOT NULL,
  `msg_type` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `mail_box_cronjobs`
--

INSERT INTO `mail_box_cronjobs` (`id`, `user_id`, `message`, `status`, `msg_type`) VALUES
(1, 0, '<p>Hello fdgdg welcome at Non Moving Inventory portal you have successfully <b>registered</b> and <b>approved </b> by admin. <p>\n					\n										<p><b>Your User Name and Password are see below</b> </p>\n										<p>User name :<b>2525@vcbcv.df </b> </p>\n										<p>Password :<b>PostzcMwiyQjrG0 </b> </p><br/>', 0, 0),
(2, 24, '<p>Hello fdgdg welcome at Non Moving Inventory portal you have successfully <b>registered</b> and <b>approved </b> by admin. <p>\r\n										\r\n										<p><b>Your User Name and Password are see below</b> </p>\r\n										<p>User name :<b>2525@vcbcv.df </b> </p>\r\n										<p>Password :<b>Post6epevn7YA5C </b> </p><br/>', 0, 0),
(3, 26, '&lt;p&gt;Hello rtyrt welcome at Non Moving Inventory portal you have successfully &lt;b&gt;registered&lt;/b&gt; and &lt;b&gt;approved &lt;/b&gt; by admin. &lt;p&gt;\r\n										\r\n										&lt;p&gt;&lt;b&gt;Your User Name and Password are see below&lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;User name :&lt;b&gt;ttttttttry!@rgr.ty &lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;Password :&lt;b&gt;PostdX6grIDTAro &lt;/b&gt; &lt;/p&gt;&lt;br/&gt;', 0, 0),
(4, 28, '&lt;p&gt;Hello fhfghf welcome at Non Moving Inventory portal you have successfully &lt;b&gt;registered&lt;/b&gt; and &lt;b&gt;approved &lt;/b&gt; by admin. &lt;p&gt;\r\n										\r\n										&lt;p&gt;&lt;b&gt;Your User Name and Password are see below&lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;User name :&lt;b&gt;asdad@rgsgfd.com &lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;Password :&lt;b&gt;PostR8fB03HZGPU &lt;/b&gt; &lt;/p&gt;&lt;br/&gt;', 0, 0),
(5, 9, '<p>Hello nikhil. Sorry for you are Disapprove from Non Moving Inventory portal by admin deu to any reason.  <p>', 0, 0),
(6, 9, '&lt;p&gt;Hello nikhil welcome at Non Moving Inventory portal you have successfully &lt;b&gt;registered&lt;/b&gt; and &lt;b&gt;approved &lt;/b&gt; by admin. &lt;p&gt;\r\n										\r\n										&lt;p&gt;&lt;b&gt;Your User Name and Password are see below&lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;User name :&lt;b&gt;nikhileshvyas@yahoo.com &lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;Password :&lt;b&gt;Post5OVnderlK0L &lt;/b&gt; &lt;/p&gt;&lt;br/&gt;', 0, 0),
(7, 9, '<p>Hello nikhil. Sorry for you are Disapprove from Non Moving Inventory portal by admin deu to any reason.  <p>', 0, 0),
(8, 9, '&lt;p&gt;Hello nikhil welcome at Non Moving Inventory portal you have successfully &lt;b&gt;registered&lt;/b&gt; and &lt;b&gt;approved &lt;/b&gt; by admin. &lt;p&gt;\r\n										\r\n										&lt;p&gt;&lt;b&gt;Your User Name and Password are see below&lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;User name :&lt;b&gt;nikhileshvyas@yahoo.com &lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;Password :&lt;b&gt;PostN8Ab3MPWtfh &lt;/b&gt; &lt;/p&gt;&lt;br/&gt;', 0, 0),
(9, 3, 'Hello NMCORP , <br /><br />You have requested a verification code. Here, it is <br/><h3> <strong>NNdJNFgW</strong> </h3><br /><br />Thanks<br />', 0, 0),
(10, 3, 'Hello NMCORP , &lt;br /&gt;&lt;br /&gt;You have requested a verification code. Here, it is &lt;br/&gt;&lt;h3&gt; &lt;strong&gt;EeQWyoux&lt;/strong&gt; &lt;/h3&gt;&lt;br /&gt;&lt;br /&gt;Thanks&lt;br /&gt;', 0, 0),
(11, 3, 'Hello NMCORP , &lt;br /&gt;&lt;br /&gt;You have requested a verification code. Here, it is &lt;br/&gt;&lt;h3&gt; &lt;strong&gt;HKmDrLyq&lt;/strong&gt; &lt;/h3&gt;&lt;br /&gt;&lt;br /&gt;Thanks&lt;br /&gt;', 0, 1),
(12, 3, 'Hello NMCORP , &lt;br /&gt;&lt;br /&gt;You have requested a verification code. Here, it is &lt;br/&gt;&lt;h3&gt; &lt;strong&gt;BoEDx6Kt&lt;/strong&gt; &lt;/h3&gt;&lt;br /&gt;&lt;br /&gt;Thanks&lt;br /&gt;', 0, 1),
(13, 3, 'Hello NMCORP , &lt;br /&gt;&lt;br /&gt;You have requested a verification code. Here, it is &lt;br/&gt;&lt;h3&gt; &lt;strong&gt;5TsGBcRt&lt;/strong&gt; &lt;/h3&gt;&lt;br /&gt;&lt;br /&gt;Thanks&lt;br /&gt;', 0, 1),
(14, 3, 'Hello NMCORP , &lt;br /&gt;&lt;br /&gt;You have requested a verification code. Here, it is &lt;br/&gt;&lt;h3&gt; &lt;strong&gt;dAdYU97e&lt;/strong&gt; &lt;/h3&gt;&lt;br /&gt;&lt;br /&gt;Thanks&lt;br /&gt;', 0, 1),
(15, 1, 'Hello  , &lt;br /&gt;&lt;br /&gt;You have requested a verification code. Here, it is &lt;br/&gt;&lt;h3&gt; &lt;strong&gt;IztvH47M&lt;/strong&gt; &lt;/h3&gt;&lt;br /&gt;&lt;br /&gt;Thanks&lt;br /&gt;', 0, 1),
(16, 23, '&lt;p&gt;Hello sdfsdf welcome at Non Moving Inventory portal you have successfully &lt;b&gt;registered&lt;/b&gt; and &lt;b&gt;approved &lt;/b&gt; by admin. &lt;p&gt;\r\n										\r\n										&lt;p&gt;&lt;b&gt;Your User Name and Password are see below&lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;User name :&lt;b&gt;sdfsd@ferer.c &lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;Password :&lt;b&gt;Posti3TGHf7g2py &lt;/b&gt; &lt;/p&gt;&lt;br/&gt;', 0, 0),
(17, 24, '&lt;p&gt;Hello fdgdg welcome at Non Moving Inventory portal you have successfully &lt;b&gt;registered&lt;/b&gt; and &lt;b&gt;approved &lt;/b&gt; by admin. &lt;p&gt;\r\n										\r\n										&lt;p&gt;&lt;b&gt;Your User Name and Password are see below&lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;User name :&lt;b&gt;2525@vcbcv.df &lt;/b&gt; &lt;/p&gt;\r\n										&lt;p&gt;Password :&lt;b&gt;Post02io42ESLWp &lt;/b&gt; &lt;/p&gt;&lt;br/&gt;', 0, 0),
(18, 24, '<p>Hello fdgdg. Sorry for you are Disapprove from Non Moving Inventory portal by admin deu to any reason.  <p>', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `organization_types`
--

CREATE TABLE IF NOT EXISTS `organization_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `organization_types`
--

INSERT INTO `organization_types` (`id`, `type_name`) VALUES
(1, 'Small '),
(2, 'medium'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`) VALUES
(1, 'The Tiltes', 'Title Body\r\ns\r\n\r\n\r\n\r\n\r\n', '0000-00-00 00:00:00'),
(3, 'hello every one', 'hello', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `contact_prsn_designation` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `home_phone` varchar(15) NOT NULL,
  `photo` text NOT NULL,
  `organization_type` int(5) NOT NULL,
  `type_org_manufacturing` int(1) NOT NULL,
  `type_org_trading` int(1) NOT NULL,
  `product_nm_trading` text NOT NULL,
  `year_incorpration` int(4) NOT NULL,
  `tin_no` varchar(100) NOT NULL,
  `pan_no` varchar(50) NOT NULL,
  `sell_tax_no` varchar(100) NOT NULL,
  `date_reg` date NOT NULL,
  `time_reg` varchar(15) NOT NULL,
  `email_alerts_status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `login_id`, `display_name`, `company_name`, `contact_prsn_designation`, `website`, `address`, `mobile`, `home_phone`, `photo`, `organization_type`, `type_org_manufacturing`, `type_org_trading`, `product_nm_trading`, `year_incorpration`, `tin_no`, `pan_no`, `sell_tax_no`, `date_reg`, `time_reg`, `email_alerts_status`) VALUES
(1, 3, 'PHP Poets', 'PHP Poets', 'Director', 'www.phppoets.com', '91, Patho Ki Magri, Near Sewashram Udaipur', '9549993335', '0294-414044', 'user_images/user_img3.jpg', 3, 0, 1, 'ROTUI     ', 2015, '1234', '321', '123', '2014-09-12', '11:34:27 AM', 1),
(18, 26, 'rtyrt', 'dggg', 'ryrt', '24fgtytr', 'yrtyrt', '8578', '', 'user_images/user_img.jpg', 2, 1, 0, ' 552\r\n', 757, '4242', '4442', '424', '2014-10-14', '11:14:25 AM', 0),
(4, 7, 'Abhilash lohar', 'microsoft', '', 'www.dcdc.com', 'udaipur', '9682554474', '', 'user_images/user_img7.jpg', 3, 0, 0, '', 0, '25315', '', '52828282', '2014-09-23', '01:25:16 PM', 0),
(12, 0, 'zxczxc', 'vxcvx', 'czxc', 'zxcz', 'xczxczc', '455422', 'vxcvx', 'user_images/user_img.jpg', 1, 1, 0, ' xzczxc', 542452, 'czxc', 'zxczxc', 'zczxc', '2014-10-09', '06:25:03 PM', 0),
(13, 20, 'dfdsf', 'dfsd', 'gdfgd', 'fsdfs', 'sdfs', '582425', 'dfgd', 'user_images/user_img.jpg', 3, 0, 1, ' vdsfsdf', 3532, 'sdfsd', 'fsdfs', 'sdfsdf', '2014-10-09', '06:27:03 PM', 0),
(16, 23, 'sdfsdf', 'rtertre', 'sdf', 'sdfsdf', 'dfdffsdf', '52525', '828882', 'user_images/user_img.jpg', 2, 1, 1, ' dsfdsf', 5252, 'fdf', 'dfdsf', 'sdfsd', '2014-10-11', '12:28:22 PM', 0),
(17, 24, 'fdgdg', 'dfgdfgdfg', 'dfgdfg', 'dfgdf', 'gdfgdfg', '363', '24254', 'user_images/blank_image.jpg', 2, 1, 0, ' fgdf', 525252, 'dfgdfg', 'dfgdfg', 'dfgdfg', '2014-10-11', '02:18:57 PM', 0),
(20, 28, 'fhfghf', 'dfdsf', '55', '525', 'dgdf', '55245', '452544', 'user_images/blank_image.jpg', 1, 1, 0, ' dfsdf', 525, 'dfsdf', '25555555', '2525', '2014-10-29', '02:38:05 PM', 0),
(21, 29, 'fgdfg', 'dfsdf', 'fgfgdh', 'fdgdfgdg', 'fdgdgd', '25252525', '52855252', 'user_images/blank_image.jpg', 3, 1, 0, ' dgdgdfgd', 252, 'gdg', 'hhfjgf', 'ddsfsdfsdf', '2014-10-29', '03:03:17 PM', 0),
(22, 35, 'erter', 'dfsdg', 'terte', 'rtert', 'ertert', '52522525', '5252525', 'user_images/blank_image.jpg', 3, 1, 0, ' terte', 353, 'retrert', 'ertert', 'ete', '2014-11-17', '02:04:57 AM', 0),
(23, 36, 'dfgdfg', 'dsfsdf', 'gdfgdfg', 'www.sfsd.com', 'dfgdfg', '53353535', '8225885', 'user_images/user_img36.jpg', 2, 0, 0, ' setsgsd', 20555, 'dgdgd', 'dfgdf', 'fgdfg', '2014-11-17', '02:07:19 AM', 0),
(24, 37, '636', 'dfgd', '363', '36', '36363', '8363', '6363', 'user_images/user_img37.jpg', 2, 1, 0, ' 3636', 365543, '36', '63', '636', '2014-11-17', '09:10:03 AM', 0),
(25, 38, 'aaa', 'vinod', 'aaaa', 'aaa', 'aaaa', '53353535', '8225885', 'user_images/user_img38.jpg', 1, 1, 0, ' aaa', 2013, 'aa', 'aa', 'aaa', '2014-11-19', '12:35:57 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `query_details`
--

CREATE TABLE IF NOT EXISTS `query_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `sender_name` text NOT NULL,
  `sender_email_id` text NOT NULL,
  `sender_phone` text NOT NULL,
  `message` text NOT NULL,
  `mail_content` text NOT NULL,
  `status` int(2) NOT NULL,
  `user_view` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `query_details`
--

INSERT INTO `query_details` (`id`, `post_id`, `user_id`, `date`, `time`, `sender_name`, `sender_email_id`, `sender_phone`, `message`, `mail_content`, `status`, `user_view`) VALUES
(1, 446, 0, '2014-10-13', '06:02:22 PM', 'ahihs', 'sdasd@dfs', '5353', ' dfgdgdfgdfg', '', 0, 0),
(2, 464, 0, '2014-10-30', '03:26:06 PM', 'sdcf', 'fsfsf@fgdg', '', ' ', '', 0, 0),
(3, 446, 0, '2014-10-30', '04:24:51 PM', 'fgg', 'dfgfg@sdf', '', ' ', '', 0, 0),
(4, 446, 0, '2014-10-30', '04:25:14 PM', 'safs', 'sdfsd@ferer.c', '', ' ', '', 0, 0),
(5, 140, 3, '2014-11-20', '12:44:58 AM', 'vinod', 'vinodgdfgindfsdfsdfia71@gmaccil.com', '96825566633', 'i want to buy ', '&lt;p&gt;&lt;b&gt;Hello qqqqqqqqqq &lt;/b&gt;&lt;/p&gt; \n			&lt;p&gt;&lt;b&gt; You have a new query form Non Moving Inventory portal for CABLE GLANDS ( Cables ) for trrrt &lt;/b&gt;&lt;/p&gt;\n			&lt;p&gt;&lt;b&gt; Name : &lt;/b&gt; vinod&lt;/p&gt;\n			&lt;p&gt;&lt;b&gt;Phone No. : &lt;/b&gt;96825566633&lt;/p&gt;\n			&lt;p&gt;&lt;b&gt;Mail Id.. : &lt;/b&gt;vinodgdfgindfsdfsdfia71@gmaccil.com&lt;/p&gt;\n			&lt;p&gt;&lt;b&gt;Message : &lt;/b&gt;i want to buy &lt;/p&gt;&lt;br/&gt;', 0, 0),
(6, 140, 3, '2014-11-20', '02:16:18 PM', 'efe', 'retetert@rgrge', 'ertert', ' ertert', '&lt;p&gt;&lt;b&gt;Hello qqqqqqqqqq &lt;/b&gt;&lt;/p&gt; \r\n			&lt;p&gt;&lt;b&gt; You have a new query form Non Moving Inventory portal for CABLE GLANDS ( Cables ) for trrrt &lt;/b&gt;&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt; Name : &lt;/b&gt; efe&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Phone No. : &lt;/b&gt;ertert&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Mail Id.. : &lt;/b&gt;retetert@rgrge&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Message : &lt;/b&gt; ertert&lt;/p&gt;&lt;br/&gt;', 0, 1),
(7, 140, 3, '2014-11-20', '02:23:47 PM', 'sesfsdf', 'sfsgsdgsd@dfgdfg', 'gsdgg', ' fdsfs', '&lt;p&gt;&lt;b&gt;Hello qqqqqqqqqq &lt;/b&gt;&lt;/p&gt; \r\n			&lt;p&gt;&lt;b&gt; You have a new query form Non Moving Inventory portal for CABLE GLANDS ( Cables ) for trrrt &lt;/b&gt;&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt; Name : &lt;/b&gt; sesfsdf&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Phone No. : &lt;/b&gt;gsdgg&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Mail Id.. : &lt;/b&gt;sfsgsdgsd@dfgdfg&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Message : &lt;/b&gt; fdsfs&lt;/p&gt;&lt;br/&gt;', 0, 1),
(8, 139, 3, '2014-11-20', '02:28:18 PM', 'dfsdf', 'dfgfg@sdfgd', 'fgdfgdg', ' dfgdfg', '&lt;p&gt;&lt;b&gt;Hello qqqqqqqqqq &lt;/b&gt;&lt;/p&gt; \r\n			&lt;p&gt;&lt;b&gt; You have a new query form Non Moving Inventory portal for CABLE GLANDS ( Cables ) for trrrt &lt;/b&gt;&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt; Name : &lt;/b&gt; dfsdf&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Phone No. : &lt;/b&gt;fgdfgdg&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Mail Id.. : &lt;/b&gt;dfgfg@sdfgd&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Message : &lt;/b&gt; dfgdfg&lt;/p&gt;&lt;br/&gt;', 0, 1),
(9, 98, 3, '2014-11-21', '03:25:20 PM', 'fhdhh', 'hdhdhdfhf@fgdfg', 'dfgdfg', ' ', '&lt;p&gt;&lt;b&gt;Hello qqqqqqqqqq &lt;/b&gt;&lt;/p&gt; \r\n			&lt;p&gt;&lt;b&gt; You have a new query form Non Moving Inventory portal for MIMIC LED ITEMS ( Cables ) for TERMINAL &lt;/b&gt;&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt; Name : &lt;/b&gt; fhdhh&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Phone No. : &lt;/b&gt;dfgdfg&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Mail Id.. : &lt;/b&gt;hdhdhdfhf@fgdfg&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Message : &lt;/b&gt; &lt;/p&gt;&lt;br/&gt;', 0, 1),
(10, 141, 3, '2014-11-27', '10:59:31 AM', 'fsdgsgsdg', 'gsdgsdgs@eewe', 'ssdg', ' sgs', '&lt;p&gt;&lt;b&gt;Hello 33333 &lt;/b&gt;&lt;/p&gt; \r\n			&lt;p&gt;&lt;b&gt; You have a new query form Non Moving Inventory portal for CABLE GLANDS ( Cables ) for trrrt &lt;/b&gt;&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt; Name : &lt;/b&gt; fsdgsgsdg&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Phone No. : &lt;/b&gt;ssdg&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Mail Id.. : &lt;/b&gt;gsdgsdgs@eewe&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Message : &lt;/b&gt; sgs&lt;/p&gt;&lt;br/&gt;', 0, 0),
(11, 133, 3, '2015-01-19', '03:52:30 PM', 'Ashish Bohara', 'ashishbohara1008@gmail.comm', '8058483636', ' Hiii', '&lt;p&gt;&lt;b&gt;Hello PHP Poets &lt;/b&gt;&lt;/p&gt; \r\n			&lt;p&gt;&lt;b&gt; You have a new query form Non Moving Inventory portal for Household Cables ( Cables ) for dd &lt;/b&gt;&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt; Name : &lt;/b&gt; Ashish Bohara&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Phone No. : &lt;/b&gt;8058483636&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Mail Id.. : &lt;/b&gt;ashishbohara1008@gmail.comm&lt;/p&gt;\r\n			&lt;p&gt;&lt;b&gt;Message : &lt;/b&gt; Hiii&lt;/p&gt;&lt;br/&gt;', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `software_admin_dtls`
--

CREATE TABLE IF NOT EXISTS `software_admin_dtls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `software_admin_name` text NOT NULL,
  `software_title` text NOT NULL,
  `email_id` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `software_admin_dtls`
--

INSERT INTO `software_admin_dtls` (`id`, `login_id`, `admin_name`, `software_admin_name`, `software_title`, `email_id`, `password`) VALUES
(1, 1, 'Ankit Sisodiya', 'PHP POETS', 'Non Moving Inventory', 'ankit@phppoets.com', 'shrikul!@#$');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `states` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `states`) VALUES
(1, 'Rajasthan'),
(2, 'Gujrat');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(50) NOT NULL,
  `sub_categories` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `user_id`, `remarks`, `date`, `time`) VALUES
(1, 4, 'Analog Meters', 0, '', '0000-00-00', ''),
(2, 2, 'Cables Glands', 0, '', '0000-00-00', ''),
(3, 2, 'Household Cables', 0, '', '0000-00-00', ''),
(4, 9, 'Castor Wheels', 0, '', '0000-00-00', ''),
(5, 4, 'CONNECTORS', 0, '', '0000-00-00', ''),
(6, 4, 'CONTACT BLOCKS', 0, '', '0000-00-00', ''),
(7, 4, 'CONTACTORS', 0, '', '0000-00-00', ''),
(8, 4, 'CONVERTER', 0, '', '0000-00-00', ''),
(9, 4, 'DIGITAL METERS', 0, '', '0000-00-00', ''),
(10, 4, 'ISOLATOR', 0, '', '0000-00-00', ''),
(11, 4, 'VALVES & FITTINGS', 0, '', '0000-00-00', ''),
(12, 4, 'ELECTRICAL ITEMS', 0, '', '0000-00-00', ''),
(13, 4, 'END PLATE', 0, '', '0000-00-00', ''),
(14, 2, 'EX Proof / Weather Proof', 0, '', '0000-00-00', ''),
(15, 9, 'FUSES', 0, '', '0000-00-00', ''),
(16, 2, 'HR/ATC Wires', 0, '', '0000-00-00', ''),
(17, 9, 'INDICATION LAMP WITH LED', 0, '', '0000-00-00', ''),
(18, 9, 'LOCK NUT', 0, '', '0000-00-00', ''),
(19, 9, 'LUGS', 0, '', '0000-00-00', ''),
(20, 9, 'MCB', 0, '', '0000-00-00', ''),
(21, 2, 'Mimic LED Cables', 0, '', '0000-00-00', ''),
(22, 2, 'Pilot Lamps', 0, '', '0000-00-00', ''),
(23, 9, 'PLUGS & SOCKETS', 0, '', '0000-00-00', ''),
(24, 9, 'POWER SUPPLY', 0, '', '0000-00-00', ''),
(25, 9, 'PUSH BUTTONS', 0, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_datas`
--

CREATE TABLE IF NOT EXISTS `temp_datas` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `temp_datas`
--

INSERT INTO `temp_datas` (`id`, `user_id`, `date`, `photo`) VALUES
(40, 3, '2015-03-10', 'bmw-cars-picture.jpg'),
(41, 3, '2015-03-10', '201208271419548055.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `themes` varchar(100) NOT NULL,
  `themes_active` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `themes`, `themes_active`) VALUES
(1, 'themes1', 1),
(2, 'themes2', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
