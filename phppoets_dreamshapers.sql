-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2015 at 03:17 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phppoets_dreamshapers`
--
CREATE DATABASE IF NOT EXISTS `phppoets_dreamshapers` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phppoets_dreamshapers`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `add` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `file` int(11) NOT NULL,
  `web` text NOT NULL,
  `service_tax_no` varchar(50) NOT NULL,
  `tin_no` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `add`, `name`, `contact`, `email`, `file`, `web`, `service_tax_no`, `tin_no`, `flag`) VALUES
(4, 'Sewasrham,  Udaipur', 'Dreamshapers', '8233334988', 'info@gmail.com', 0, 'www.info.com', '', '', 1),
(7, 'd', 'd', 'd', 'd', 0, 'd', '', '', 1),
(8, 'Sewasrham,  Udaipur', 'Dreamshapers', '8233334988', 'info@gmail.com', 0, 'www.info.com', 'SR45784578kkkk', '10101200102541', 0),
(9, 'd', 'd', 'd', 'd', 0, 'd', 'd', 'd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_settlements`
--

CREATE TABLE IF NOT EXISTS `bill_settlements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `steward_id` int(11) NOT NULL,
  `master_table_id` int(11) NOT NULL,
  `guest_name` varchar(50) NOT NULL,
  `bill_no` varchar(20) NOT NULL,
  `kot_amount` varchar(50) NOT NULL,
  `taxes` varchar(20) NOT NULL,
  `sarvice_charge` varchar(20) NOT NULL,
  `gross` varchar(20) NOT NULL,
  `tips` varchar(20) NOT NULL,
  `discount` varchar(30) NOT NULL,
  `total_discount` varchar(30) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `master_room_no` varchar(30) NOT NULL,
  `card_name` varchar(30) NOT NULL,
  `card_slip_no` varchar(30) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `pos_kot_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `bill_settlements`
--

INSERT INTO `bill_settlements` (`id`, `steward_id`, `master_table_id`, `guest_name`, `bill_no`, `kot_amount`, `taxes`, `sarvice_charge`, `gross`, `tips`, `discount`, `total_discount`, `total_amount`, `payment_type`, `master_room_no`, `card_name`, `card_slip_no`, `card_no`, `pos_kot_id`, `date`, `time`) VALUES
(1, 0, 0, 'Nihal Singh', '1', '180', '20.398', '10', '140', '10', '1', '', '', 'Cash', '0', '', '', '', 1, '2015-11-05', '10:57:08'),
(2, 0, 0, 'Ashish Jain', '2', '92', '11.656', '0', '80', '0', '0', '', '', 'Cash', '0', '', '', '', 2, '2015-11-05', '11:01:06'),
(3, 0, 0, 'Ashish Jain', '2', '92', '11.656', '0', '80', '0', '0', '', '', 'Cash', '0', '', '', '', 2, '2015-11-05', '11:12:15'),
(4, 0, 0, 'Ashish Jain', '3', '137', '17.484', '0', '120', '0', '0', '', '', 'Cash', '0', '', '', '', 3, '2015-11-05', '11:23:22'),
(5, 1, 0, 'Mr. Nilesh', '4', '137', '17.484', '0', '120', '0', '0', '', '', 'Cash', '0', '', '', '', 4, '2015-11-05', '11:26:01'),
(6, 1, 0, 'Nihal Singh', '6', '298', '37.882', '0', '260', '0', '0', '', '', 'Cash', '0', '', '', '', 6, '2015-11-05', '12:07:06'),
(7, 1, 0, 'Nihal Singh', '6', '298', '37.882', '0', '260', '0', '0', '', '', 'Cash', '0', '', '', '', 6, '2015-11-05', '12:08:24'),
(8, 1, 0, 'Nihal Singh', '6', '298', '37.882', '0', '260', '0', '0', '', '', 'Cash', '0', '', '', '', 6, '2015-11-05', '12:11:56'),
(9, 1, 0, 'Jkjk', '1', '1122', '142.786', '0', '1100', '0', '0', '', '', 'Cash', '0', '', '', '', 1, '2015-11-05', '02:45:51'),
(10, 1, 0, 'Mr. Nilesh Tailor', '4', '276', '34.968', '0', '240', '0', '0', '', '', 'Cash', '0', '', '', '', 4, '2015-11-06', '10:28:42'),
(11, 0, 0, 'Nihal Singh', '3', '962', '122.388', '0', '900', '0', '0', '', '', 'Cash', '0', '', '', '', 3, '2015-11-06', '10:30:08'),
(12, 1, 0, 'Nil', '6', '137', '17.484', '0', '120', '0', '0', '', '', 'Cash', '0', '', '', '', 6, '2015-11-06', '10:32:29'),
(13, 1, 0, 'HH', '1', '69', '8.742', '0', '60', '0', '0', '', '', 'Cash', '0', '', '', '', 1, '2015-11-06', '10:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `company_categories`
--

CREATE TABLE IF NOT EXISTS `company_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company_categories`
--

INSERT INTO `company_categories` (`id`, `category_name`, `flag`) VALUES
(1, 'Software Industry', 0),
(2, 'Finance', 0),
(3, 'Trading', 0),
(4, 'Marble Industry', 0),
(5, 'Birla Cement', 0),
(6, 'Birla Cementss', 0),
(7, 'adddd', 0),
(8, 'adddd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_discounts`
--

CREATE TABLE IF NOT EXISTS `company_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_category_id` varchar(20) NOT NULL,
  `company_name_id` varchar(20) NOT NULL,
  `room_type_id` varchar(100) NOT NULL,
  `item_type_id` varchar(30) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_discounts`
--

INSERT INTO `company_discounts` (`id`, `company_category_id`, `company_name_id`, `room_type_id`, `item_type_id`, `discount`, `flag`) VALUES
(1, '', '1', '1', '', '10', 0),
(2, '', '1', '2', '', '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_registrations`
--

CREATE TABLE IF NOT EXISTS `company_registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(30) NOT NULL,
  `company_category_id` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `service_tax_no` varchar(20) NOT NULL,
  `authorized_person_name` varchar(50) NOT NULL,
  `authorized_contact_no` varchar(30) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `authorized_email_id` varchar(40) NOT NULL,
  `c_address` text NOT NULL,
  `master_plan_id` varchar(20) NOT NULL,
  `p_address` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_registrations`
--

INSERT INTO `company_registrations` (`id`, `company_name`, `company_category_id`, `pan_no`, `service_tax_no`, `authorized_person_name`, `authorized_contact_no`, `mobile_no`, `authorized_email_id`, `c_address`, `master_plan_id`, `p_address`, `date`, `time`, `flag`) VALUES
(1, 'PHP Poets', '1', 'ABXC124578', '', 'Ankit Sisodiya', '0294254859', '8233334988', 'ankit@gmail.com', 'Sewashram Circle, Udaipur', '15', 'Sewashram Circle, Udaipur', '2015-09-11', '03:49:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `debtor_receipts`
--

CREATE TABLE IF NOT EXISTS `debtor_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(100) NOT NULL,
  `wherepaid` varchar(50) NOT NULL,
  `recpt_type` varchar(100) NOT NULL,
  `recpt_no` varchar(100) NOT NULL,
  `date_to` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `neft_no` varchar(100) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `narration` text NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fo_room_bookings`
--

CREATE TABLE IF NOT EXISTS `fo_room_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_category_id` varchar(20) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `master_room_type_id` varchar(10) NOT NULL,
  `master_room_plan_id` varchar(10) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `extra_bed` varchar(30) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `food_discount` varchar(50) NOT NULL,
  `special_rate` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `fo_room_bookings`
--

INSERT INTO `fo_room_bookings` (`id`, `company_category_id`, `company_id`, `master_room_type_id`, `master_room_plan_id`, `date_from`, `date_to`, `extra_bed`, `discount`, `food_discount`, `special_rate`, `remarks`, `flag`) VALUES
(9, '', '1', '1', '16', '2015-11-01', '2015-11-30', '30', '10', '10', '5000', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `function_bookings`
--

CREATE TABLE IF NOT EXISTS `function_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking` varchar(20) NOT NULL,
  `b_date` date NOT NULL,
  `b_time` varchar(30) NOT NULL,
  `res_no_id` int(20) NOT NULL,
  `ftp_no` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `outlet_venue_id` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `t_number` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `pax_r` varchar(50) NOT NULL,
  `pax_o` varchar(50) NOT NULL,
  `choice_menu` int(11) NOT NULL,
  `advance` varchar(50) NOT NULL,
  `gross` varchar(50) NOT NULL,
  `rate_type` varchar(50) NOT NULL,
  `person_tax` varchar(20) NOT NULL,
  `tot_amt` varchar(50) NOT NULL,
  `tax_id` int(20) NOT NULL,
  `totaltax` varchar(50) NOT NULL,
  `per_expected` int(20) NOT NULL,
  `pax` int(20) NOT NULL,
  `pax_amt` varchar(50) NOT NULL,
  `no_of_person` int(20) NOT NULL,
  `shape` varchar(20) NOT NULL,
  `other_service` text NOT NULL,
  `instruction` text NOT NULL,
  `itemtype_id` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gr_nos`
--

CREATE TABLE IF NOT EXISTS `gr_nos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_no` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gr_nos`
--

INSERT INTO `gr_nos` (`id`, `card_no`) VALUES
(1, 691);

-- --------------------------------------------------------

--
-- Table structure for table `house_keepings`
--

CREATE TABLE IF NOT EXISTS `house_keepings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `master_roomno_id` varchar(50) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `wash_iron_no` varchar(50) NOT NULL,
  `iron_no` varchar(50) NOT NULL,
  `wash_iron_price` varchar(20) NOT NULL,
  `iron_price` varchar(20) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `serviced_by` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `given_amount` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `flag` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoiceadds`
--

CREATE TABLE IF NOT EXISTS `invoiceadds` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `add` text NOT NULL,
  `dreamadd` text NOT NULL,
  `otheradd` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `invoiceadds`
--

INSERT INTO `invoiceadds` (`id`, `address`, `add`, `dreamadd`, `otheradd`) VALUES
(1, '<div align="center" style="padding: 5px;font-size: 12px;color: #fff;vertical-align: middle;border: solid 0px #000;border-top: none; border-right:none; border-left:none; background-color:#999">\r\n<span>61-A, Sukhadia Circle, Near Mumbaiya Chat Bazar Udaipur, (Raj.) 313001 - India \r\n</span><br/>\r\n<span style="color:#FFF;">Email: info@hotelthearchi.in</span> &nbsp;|&nbsp; <span>Tel: 91 294 2422509, 2422509</span> &nbsp;|&nbsp; <span style="color:#FFF;">web : www.hotelthearchi.in</span></div>\r\n', '', '', ''),
(2, '', '', '', ''),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, '', '<div align="center" style="background-color:#FFF;padding: 5px;font-size: 12px; color:#4DB3A2 !important" class="caption-subject font-green-sharp uppercase; vertical-align: middle;border: solid 1px #000;border-top: none;">\n<span style="text-align:center;">61-A, Sukhadia Circle, Near Mumbaiya Chat Bazar Udaipur, (Raj.) 313001 - India</span><br/>\nEmail: info@hotelthearchi.in</span> &nbsp;|&nbsp; Tel: 91 294 2422509, 2422509 &nbsp;|&nbsp; web : www.hotelthearchi.in</span></div>\n\n   \n   ', '', ''),
(6, '', '', '\n<div align="center" style="background-color:#36F; padding: 5px;font-size: 12px;font-weight: bold;color: #FFF;vertical-align: middle; border-top: none;">\n<span style="font-size: 20px;">Dreamshapers </span><br/>\n\n<span style="color:#FFF;"><i>"Making Your Memories Beautiful"</i>&nbsp; Email: </span> &nbsp;|&nbsp; <span>Phone : </span> &nbsp;|&nbsp; <span style="color:#36F;"></span></div>', '\n<div align="center" style="background-color:#FFF; padding: 5px;font-size: 12px;font-weight: bold;color: #36F;vertical-align: middle; border-top: none;">\n<span style="font-size: 20px;"> Hotel Dreamshapers </span><br/>\n\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `in_out_wards`
--

CREATE TABLE IF NOT EXISTS `in_out_wards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inward_id` int(11) NOT NULL,
  `master_item_type_id` varchar(50) NOT NULL,
  `master_itemcategory_id` varchar(50) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `remark` text NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `in_out_wards`
--

INSERT INTO `in_out_wards` (`id`, `inward_id`, `master_item_type_id`, `master_itemcategory_id`, `quantity`, `date`, `remark`, `flag`) VALUES
(1, 0, '1', '1', '50', '2015-10-20', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `outlet_id` varchar(100) NOT NULL,
  `designation_id` int(12) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `approval_status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `outlet_id`, `designation_id`, `login_id`, `username`, `email_id`, `password`, `approval_status`) VALUES
(1, '15,16,17', 1, 'admin', 'Admin', 'ankit@phppoets.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(26, '', 0, 'jj', 'jj', 'jj@gmail.com', 'bf2bc2545a4a5f5683d9ef3ed0d977e0', 0),
(27, '', 0, 'yy', 'yy', 'yy', '2fb1c5cf58867b5bbc9a1b145a86f3a0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_caretakers`
--

CREATE TABLE IF NOT EXISTS `master_caretakers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caretaker_name` varchar(50) NOT NULL,
  `caretaker_mobile_no` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `master_caretakers`
--

INSERT INTO `master_caretakers` (`id`, `caretaker_name`, `caretaker_mobile_no`, `flag`) VALUES
(1, 'Jack', '9645878596', 0),
(2, 'Vishal', '8596452369', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_currencies`
--

CREATE TABLE IF NOT EXISTS `master_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_currencies`
--

INSERT INTO `master_currencies` (`id`, `currency_name`, `exchange_rate`, `flag`) VALUES
(1, 'Dollar', '65', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_function_taxes`
--

CREATE TABLE IF NOT EXISTS `master_function_taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_tax_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_function_taxes`
--

INSERT INTO `master_function_taxes` (`id`, `master_tax_id`) VALUES
(1, '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `master_items`
--

CREATE TABLE IF NOT EXISTS `master_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `master_item_type_id` varchar(30) NOT NULL,
  `billing_rate` varchar(30) NOT NULL,
  `billing_room_rate` varchar(30) NOT NULL,
  `item_cost` varchar(30) NOT NULL,
  `status` varchar(5) NOT NULL,
  `flag` int(11) NOT NULL,
  `master_itemcategory_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `master_items`
--

INSERT INTO `master_items` (`id`, `item_name`, `master_item_type_id`, `billing_rate`, `billing_room_rate`, `item_cost`, `status`, `flag`, `master_itemcategory_id`) VALUES
(1, 'Indian Thali', '36', '120', '140', '80', '', 0, '1'),
(2, 'Masala Dosa', '36', '80', '100', '100', '', 0, '1'),
(3, 'Upma', '36', '60', '70', '70', '', 0, '1'),
(4, 'Paneer Tikka', '34', '100', '120', '', '', 0, '1'),
(5, 'Ice Cream', '38', '80', '100', '', '', 0, '1'),
(6, 'Sandwich', '35', '60', '80', '', '', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_item_categories`
--

CREATE TABLE IF NOT EXISTS `master_item_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `master_item_categories`
--

INSERT INTO `master_item_categories` (`id`, `item_category`, `flag`) VALUES
(1, 'Food & Beverages', 0),
(2, 'Parlar', 0),
(3, 'SPA', 0),
(4, 'Pool', 0),
(5, 'Games', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_item_types`
--

CREATE TABLE IF NOT EXISTS `master_item_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_itemcategory_id` varchar(30) NOT NULL,
  `itemtype_name` varchar(40) NOT NULL,
  `master_tax_id` varchar(30) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `master_item_types`
--

INSERT INTO `master_item_types` (`id`, `master_itemcategory_id`, `itemtype_name`, `master_tax_id`, `flag`) VALUES
(34, '1', 'Starters', '24,25', 0),
(35, '1', 'Snacks', '24,25', 0),
(36, '1', 'Main Course', '24,25', 0),
(37, '1', 'Accompaniments', '24,25', 0),
(38, '1', 'Desserts', '24,25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_other_services`
--

CREATE TABLE IF NOT EXISTS `master_other_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `master_other_services`
--

INSERT INTO `master_other_services` (`id`, `service`, `flag`) VALUES
(1, 'LCD', 0),
(2, 'TV', 0),
(3, 'Mic', 0),
(4, 'miccc', 0),
(5, 'sounds', 0),
(6, 'hjhjhjhj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_outlets`
--

CREATE TABLE IF NOT EXISTS `master_outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_name` varchar(100) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `master_tax_id` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `master_outlets`
--

INSERT INTO `master_outlets` (`id`, `outlet_name`, `rate`, `master_tax_id`, `flag`) VALUES
(15, 'Dreams Sure Outlet', '20000', '24,25', 0),
(16, 'Ciyan', '50000', '24,25', 0),
(17, 'Garden', '21000', '24,25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_roomnos`
--

CREATE TABLE IF NOT EXISTS `master_roomnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_outlet_id` int(11) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` text NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `master_roomnos`
--

INSERT INTO `master_roomnos` (`id`, `master_outlet_id`, `room_type_id`, `room_no`, `flag`) VALUES
(11, 15, 1, '101', 0),
(12, 15, 1, '102', 0),
(13, 15, 1, '103', 0),
(14, 15, 1, '104', 0),
(15, 15, 1, '105', 0),
(16, 15, 1, '106', 0),
(17, 15, 1, '107', 0),
(18, 15, 1, '108', 0),
(19, 15, 1, '109', 0),
(20, 15, 1, '110', 0),
(21, 15, 2, '111', 0),
(22, 15, 2, '112', 0),
(23, 15, 2, '113', 0),
(24, 15, 2, '114', 0),
(25, 15, 2, '115', 0),
(26, 15, 3, '116', 0),
(27, 15, 3, '117', 0),
(28, 15, 3, '118', 0),
(29, 15, 3, '119', 0),
(30, 15, 3, '120', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_rooms`
--

CREATE TABLE IF NOT EXISTS `master_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarrif_rate` varchar(5) NOT NULL,
  `master_room_type_id` varchar(50) NOT NULL,
  `master_room_plan_id` varchar(50) NOT NULL,
  `extra_bed` varchar(10) NOT NULL,
  `attribute_id` varchar(1000) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `master_tax_id` varchar(100) NOT NULL,
  `include_tax` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `master_rooms`
--

INSERT INTO `master_rooms` (`id`, `tarrif_rate`, `master_room_type_id`, `master_room_plan_id`, `extra_bed`, `attribute_id`, `discount`, `master_tax_id`, `include_tax`, `flag`) VALUES
(16, '2500', '1', '16', '300', '2', '10', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_room_attributes`
--

CREATE TABLE IF NOT EXISTS `master_room_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `master_room_attributes`
--

INSERT INTO `master_room_attributes` (`id`, `name`, `flag`) VALUES
(1, 'Refrigerator', 0),
(2, 'AC', 0),
(3, 'Bath Tub', 0),
(4, 'TV', 0),
(5, 'Room Heater', 0),
(6, 'Dustbin', 0),
(7, 'Handset', 0),
(8, '2 Mattress+Pillow', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_room_plans`
--

CREATE TABLE IF NOT EXISTS `master_room_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(50) NOT NULL,
  `plan_combo` varchar(50) NOT NULL,
  `description_plan` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `master_room_plans`
--

INSERT INTO `master_room_plans` (`id`, `plan_name`, `plan_combo`, `description_plan`, `flag`) VALUES
(15, 'Ala Carte', '', 'Does not include any meal. ', 0),
(16, 'AI', 'F&B Special rates', 'Covers all meals, beverages etc.  ', 0),
(17, 'AP', 'Breakfast,Lunch,Dinner', '3 Meals per day.', 0),
(18, 'BB', 'Breakfast', 'Breakfast included.', 0),
(19, 'CP', 'Breakfast', 'Complimentary Breakfast.', 0),
(20, 'MAP', 'Breakfast,Dinner', '2 Meals Per Day.', 0),
(21, 'dsdsd', '1,2,3', 'sdsdd ', 0),
(22, 'sdsdsd', '', 'sdsdsfsf', 0),
(23, 'jvjmbn', '', 'hgufvj', 0),
(24, 'ds', '', 'dsd', 0),
(25, ',m', '0', 'nkbm', 0),
(26, 'jn', '0', 'hubj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_room_types`
--

CREATE TABLE IF NOT EXISTS `master_room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(30) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `master_room_types`
--

INSERT INTO `master_room_types` (`id`, `room_type`, `flag`) VALUES
(1, 'Single', 0),
(2, 'Deluxe', 0),
(3, 'Suit', 0),
(4, 'Semi-Deluxe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_services`
--

CREATE TABLE IF NOT EXISTS `master_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(40) NOT NULL,
  `tax_applicable_id` int(20) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `master_services`
--

INSERT INTO `master_services` (`id`, `service_name`, `tax_applicable_id`, `flag`) VALUES
(1, 'Room Service', 1, 0),
(2, 'Venue', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_stewards`
--

CREATE TABLE IF NOT EXISTS `master_stewards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `steward_name` varchar(30) NOT NULL,
  `steward_mobile_no` varchar(20) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `master_stewards`
--

INSERT INTO `master_stewards` (`id`, `steward_name`, `steward_mobile_no`, `flag`) VALUES
(1, 'Mukesh Singh', '9685748596', 0),
(2, 'Harish Chandra', '7485967485', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_tables`
--

CREATE TABLE IF NOT EXISTS `master_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_outlet_id` varchar(30) NOT NULL,
  `table_capacity` varchar(10) NOT NULL,
  `table_no` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `master_tables`
--

INSERT INTO `master_tables` (`id`, `master_outlet_id`, `table_capacity`, `table_no`, `flag`) VALUES
(8, '15', '5', 'Tb-1', 0),
(9, '15', '4', 'Tb-2', 0),
(10, '17', '10', 'Tb-10', 0),
(11, '16', '5', 'Tb-5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_taxes`
--

CREATE TABLE IF NOT EXISTS `master_taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `tax_applicable` varchar(30) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `master_taxes`
--

INSERT INTO `master_taxes` (`id`, `name`, `tax_applicable`, `flag`) VALUES
(24, 'Service Tax', '8.97', 0),
(25, 'VAT', '5.6', 0),
(26, 'Servive Tax', '15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL,
  `snack_id` text NOT NULL,
  `starter_id` text NOT NULL,
  `main_id` text NOT NULL,
  `acc_id` text NOT NULL,
  `dessert_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `main_menu` text NOT NULL,
  `main_menu_icon` varchar(30) NOT NULL,
  `sub_menu` varchar(50) NOT NULL,
  `sub_menu_icon` varchar(20) NOT NULL,
  `page_name_url` text NOT NULL,
  `icon_class_name` varchar(20) NOT NULL,
  `query_string` text NOT NULL,
  `target` varchar(50) NOT NULL,
  `preferance` int(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `main_menu`, `main_menu_icon`, `sub_menu`, `sub_menu_icon`, `page_name_url`, `icon_class_name`, `query_string`, `target`, `preferance`) VALUES
(1, 'Dashboard', '', '', '', '', 'index', 'icon-home', '', '', 1),
(2, 'Room Reservation', 'Front Office Desk', 'icon-globe', '', '', 'room_reservation', '', '', '', 3),
(4, 'Category', 'Master', 'icon-basket', 'Company', '', 'categoryname', '', '', '', 2),
(5, 'Registration', 'Club Member Registration', 'icon-link', '', '', 'registration', 'fa fa-plus', '', '', 6),
(6, 'View', 'Club Member Registration', '', '', '', 'registration_view', 'fa fa-edit', '', '', 6),
(8, 'Item Type', 'Point of Sales', 'icon-tag', 'Item Master', '', 'itemtype', '', '', '', 4),
(9, 'Add Item', 'Point of Sales', '', 'Item Master', '', 'masteritem', '', '', '', 4),
(10, 'Outlet', 'Master', '', 'Services', '', 'masteroutlet', '', '', '', 4),
(11, 'Table', 'Master', '', 'Services', '', 'mastertable', '', '', '', 4),
(12, 'Registration', 'Master', '', 'Company', '', 'companyregistration', '', '', '', 2),
(13, 'Room Type', 'Master', '', 'Room', '', 'roomtype', '', '', '', 2),
(14, 'Room Plan', 'Master', '', 'Room', '', 'roomplan', '', '', '', 2),
(15, 'Room Attributes', 'Master', '', 'Room', '', 'roomattribute', '', '', '', 2),
(16, 'Room No.', 'Master', '', 'Room', '', 'roomno', '', '', '', 2),
(17, 'Currencies', 'Master', '', 'Room', '', 'mastercurrency', '', '', '', 2),
(18, 'Tax', 'Master', '', 'Room', '', 'mastertax', '', '', '', 2),
(19, 'Item Category', 'Point of Sales', '', 'Item Master', '', 'master_item_category', '', '', '', 4),
(20, 'Master Room', 'Master', '', 'Room', '', 'masterroom', '', '', '', 2),
(21, 'Discount', 'Master', '', 'Company', '', 'companydiscount', '', '', '', 2),
(22, 'Tariff', 'Master', '', 'Company', '', 'company_tariff', '', '', '', 2),
(23, 'Master Steward', 'Master', '', 'Room', '', 'steward', '', '', '', 2),
(24, 'Outlet Item Mapping', 'Point of Sales', '', 'Item Master', '', 'outletitemmapping', '', '', '', 4),
(25, 'Billing Kot', 'Point of Sales', '', 'KOT', '', 'billing_kot', '', '', '', 4),
(26, 'Plan Kot', 'Point of Sales', '', 'KOT', '', 'plan_kot', '', '', '', 4),
(27, 'NC Kot', 'Point of Sales', '', 'KOT', '', 'nc_kot', '', '', '', 4),
(28, 'Bill Settleing', 'Point of Sales', '', 'KOT', '', 'bill_settleing', '', '', '', 4),
(29, 'Bill Wise Report', 'Point of Sales', 'icon-pencil', 'Report', '', 'billwise_date', '', '', '', 4),
(30, 'Item Wise Report', 'Point of Sales', '', 'Report', '', 'itemreport_datewise', '', '', '', 4),
(31, 'Sales Summary', 'Point of Sales', '', 'Report', '', 'billingreport_datewise', '', '', '', 4),
(37, 'Production Report', 'Point of Sales', '', 'Report', '', 'production_report_datewise', '', '', '', 4),
(38, 'Combine POS', 'Point of Sales', '', 'Report', '', 'combine_pos_date', '', '', '', 4),
(39, 'Cover Statement', 'Point of Sales', '', 'Report', '', 'cover_statement_date', '', '', '', 4),
(40, 'Check In', 'Front Office Desk', '', '', '', 'checkin', '', '', '', 3),
(41, 'Checkout', 'Front Office Desk', '', '', '', 'checkout', '', '', '', 3),
(42, 'Room Servicing', 'Front Office Desk', '', '', '', 'roomservicing', '', '', '', 3),
(43, 'Room Allocation Report', 'Report', '', '', '', 'room_allocation_chart', '', '', '', 8),
(45, 'Receipt', 'Cashier', 'icon-bar-chart', '', '', 'receipt', '', '', '', 7),
(46, 'Debtor Receipt', 'Cashier', '', '', '', 'debtor_receipt', '', '', '', 7),
(47, 'Paid Receipt', 'Cashier', '', '', '', 'paid_receipt', '', '', '', 7),
(48, 'Cashier Reports', 'Cashier', '', '', '', 'cashierreport_datewise', '', '', '', 7),
(51, 'Master Caretaker', 'Master', '', 'Room', '', 'caretaker', '', '', '', 2),
(52, 'Service Report', 'Front Office Desk', '', '', '', 'servicereport', '', '', '', 3),
(53, 'Tax', 'Master', '', 'Function', '', 'master_function_tax', '', '', '', 2),
(54, 'Other Services', 'Master', '', 'Function', '', 'master_otherservice', '', '', '', 2),
(55, 'Outstanding Bill', 'Cashier', '', '', '', 'outstanding_bill', '', '', '', 7),
(58, 'House Keeping', 'Front Office Desk', '', '', '', 'house_keeping', '', '', '', 3),
(59, 'Function Booking', 'Point of Sales', 'icon-globe', 'Booking', '', 'functionbooking', '', '', '', 4),
(60, 'Hotel Info Update', 'Front Office Desk', 'icon-globe', '', '', 'logo_address', '', '', '', 3),
(61, 'User Rights', 'Front Office Desk', 'icon-globe', '', '', 'user_right', '', '', '', 3),
(62, 'Create Account', 'Front Office Desk', 'icon-globe', '', '', 'create_login', '', '', '', 3),
(63, 'Information Bill', 'Report', '', '', '', 'infobill', '', '', '', 8),
(65, 'Session Category', 'Point of Sales', '', 'Plan Master', '', 'plan_item_category', '', '', '', 4),
(66, 'Plan Item Name', 'Point of Sales', '', 'Plan Master', '', 'plan_item', '', '', '', 4),
(67, 'Inward', 'Inventory', 'fa fa-plus', '', '', 'inward', '', '', '', 5),
(68, 'Outward', 'Inventory', '', '', '', 'outward', '', '', '', 5),
(69, 'Stock Type', 'Inventory', '', '', '', 'stock', '', '', '', 5),
(70, 'Category', 'Inventory', '', '', '', 'stock_category', '', '', '', 5),
(71, 'Balance Sheet', 'Cashier', '', '', '', 'account_sheet_info', '', '', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `outlet_item_mappings`
--

CREATE TABLE IF NOT EXISTS `outlet_item_mappings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_outlet_id` varchar(30) NOT NULL,
  `master_item_type_id` varchar(30) NOT NULL,
  `master_item_id` varchar(30) NOT NULL,
  `billing_rate` varchar(30) NOT NULL,
  `billing_room_rate` varchar(30) NOT NULL,
  `urgent_rate` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `outlet_item_mappings`
--

INSERT INTO `outlet_item_mappings` (`id`, `master_outlet_id`, `master_item_type_id`, `master_item_id`, `billing_rate`, `billing_room_rate`, `urgent_rate`) VALUES
(1, '3', '1', '1', '180', '190', '300'),
(2, '3', '2', '2', '100', '120', '150'),
(3, '3', '2', '3', '50', '50', ''),
(4, '3', '2', '7', '100', '120', ''),
(5, '3', '2', '8', '41', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `paid_receipts`
--

CREATE TABLE IF NOT EXISTS `paid_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_no` varchar(100) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `date_to` date NOT NULL,
  `description` text NOT NULL,
  `r_type` varchar(20) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `master_roomno_id` varchar(100) NOT NULL,
  `room_type_id` varchar(100) NOT NULL,
  `remark` text NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plan_items`
--

CREATE TABLE IF NOT EXISTS `plan_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_itemcategory_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_cost` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plan_items`
--

INSERT INTO `plan_items` (`id`, `master_itemcategory_id`, `item_name`, `item_cost`, `flag`) VALUES
(1, 1, '2,3', '200', 0),
(2, 2, '1', '300', 0),
(3, 3, '1', '300', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plan_item_categories`
--

CREATE TABLE IF NOT EXISTS `plan_item_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plan_item_categories`
--

INSERT INTO `plan_item_categories` (`id`, `item_category`, `flag`) VALUES
(1, 'Breakfast', 0),
(2, 'Lunch', 0),
(3, 'Dinner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pos_kots`
--

CREATE TABLE IF NOT EXISTS `pos_kots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_kot_id` int(11) NOT NULL,
  `plan_kot_id` int(11) NOT NULL,
  `nc_kot_it` int(11) NOT NULL,
  `master_outlets_id` int(20) NOT NULL,
  `session` varchar(10) NOT NULL,
  `plan_item` varchar(100) NOT NULL,
  `plan_rate` varchar(200) NOT NULL,
  `current_date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `master_tables_id` int(10) NOT NULL,
  `room_service` int(11) NOT NULL,
  `master_roomnos_id` varchar(10) NOT NULL,
  `club_member_id` int(11) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `master_room_types_id` int(10) NOT NULL,
  `guest_name` varchar(40) NOT NULL,
  `foo_discount` varchar(50) NOT NULL,
  `bill_settle_amount` varchar(50) NOT NULL,
  `bill_settle_no` int(11) NOT NULL,
  `bill_settle_due` varchar(50) NOT NULL,
  `service_charge` varchar(50) NOT NULL,
  `tips` varchar(50) NOT NULL,
  `settle_discount` varchar(50) NOT NULL,
  `covers` varchar(10) NOT NULL,
  `master_stewards_id` int(10) NOT NULL,
  `master_room_plans_id` int(10) NOT NULL,
  `authorized_by` varchar(30) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `kot_type` int(11) NOT NULL,
  `bill_flag` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_kot_items`
--

CREATE TABLE IF NOT EXISTS `pos_kot_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_kots_id` int(50) NOT NULL,
  `master_items_id` int(50) NOT NULL,
  `master_itemss_id` int(11) NOT NULL,
  `special_rates` varchar(30) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `gross` varchar(35) NOT NULL,
  `taxes` varchar(35) NOT NULL,
  `bill_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_kot_item_temps`
--

CREATE TABLE IF NOT EXISTS `pos_kot_item_temps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `master_items_id` int(50) NOT NULL,
  `master_itemss_id` int(11) NOT NULL,
  `special_rates` varchar(30) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `gross` varchar(35) NOT NULL,
  `taxes` varchar(35) NOT NULL,
  `kot_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_checkouts`
--

CREATE TABLE IF NOT EXISTS `receipt_checkouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `res_no_id` int(11) NOT NULL,
  `house_keeping_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `date_to` date DEFAULT NULL,
  `guest_name` varchar(50) NOT NULL,
  `master_roomno_id` varchar(20) NOT NULL,
  `room_type_id` varchar(100) NOT NULL,
  `plan_id` varchar(100) NOT NULL,
  `card_no` varchar(100) NOT NULL,
  `billing_ins` text NOT NULL,
  `recpt_type` varchar(100) NOT NULL,
  `cash` varchar(100) NOT NULL,
  `cheque_amt` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `neft_amt` varchar(100) NOT NULL,
  `neft_no` varchar(100) NOT NULL,
  `credit_card_amt` varchar(100) NOT NULL,
  `credit_card_name` varchar(100) NOT NULL,
  `credit_card_no` varchar(100) NOT NULL,
  `bill` varchar(100) NOT NULL,
  `due_amount` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `swd_of` varchar(50) NOT NULL,
  `p_address` text NOT NULL,
  `p_phone` varchar(12) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `c_address` text NOT NULL,
  `phone_home` varchar(12) NOT NULL,
  `office` varchar(30) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `marital_status` varchar(11) NOT NULL,
  `residential_status` varchar(15) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `tax_ac_no` varchar(20) NOT NULL,
  `wing_name` varchar(30) NOT NULL,
  `flat_no` varchar(20) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `cardholder` text NOT NULL,
  `card_id_no` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `date_of_anniversary` date NOT NULL,
  `reg_type` varchar(35) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `status` int(11) NOT NULL,
  `guest_type` varchar(35) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_checkin_checkouts`
--

CREATE TABLE IF NOT EXISTS `room_checkin_checkouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_member_id` int(11) NOT NULL,
  `room_booking_type` varchar(20) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `room_reservation_id` int(20) NOT NULL,
  `transfer_due_amount_roomno` varchar(50) NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` varchar(30) NOT NULL,
  `company_id` int(30) NOT NULL,
  `guest_name` varchar(40) NOT NULL,
  `permanent_address` text NOT NULL,
  `arriving_from` varchar(50) NOT NULL,
  `next_destination` varchar(50) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `id_proof_no` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `checkout_date` date NOT NULL,
  `plan_id` int(10) NOT NULL,
  `plan_combo` varchar(100) NOT NULL,
  `billing_instruction` varchar(20) NOT NULL,
  `id_proof` varchar(100) NOT NULL,
  `source_of_booking` varchar(20) NOT NULL,
  `traveller_name` varchar(50) NOT NULL,
  `apply_special_rates` varchar(20) NOT NULL,
  `room_type_id` varchar(30) NOT NULL,
  `master_roomno_id` varchar(100) NOT NULL,
  `pax` varchar(10) NOT NULL,
  `child` varchar(10) NOT NULL,
  `transfer_due_amount` varchar(100) NOT NULL,
  `paid_room` varchar(50) NOT NULL,
  `paid_amt` varchar(50) NOT NULL,
  `room_charge` varchar(20) NOT NULL,
  `extra_bed_tot` varchar(50) NOT NULL,
  `total_room` varchar(100) NOT NULL,
  `advance_taken` varchar(20) NOT NULL,
  `taxes` varchar(20) NOT NULL,
  `totaltax` varchar(50) NOT NULL,
  `tg` varchar(100) NOT NULL,
  `room_discount` varchar(20) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `other_discount` varchar(20) NOT NULL,
  `totalnetamount` varchar(50) NOT NULL,
  `due_amount` varchar(50) NOT NULL,
  `foo_discount` varchar(20) NOT NULL,
  `posnet_amount` mediumtext NOT NULL,
  `house_amount` varchar(50) NOT NULL,
  `net_amount` varchar(20) NOT NULL,
  `cash_paid` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `status` int(30) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_reservations`
--

CREATE TABLE IF NOT EXISTS `room_reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id2` int(11) NOT NULL,
  `checkin_id` int(11) NOT NULL,
  `booking_type` int(11) NOT NULL,
  `company_id` int(100) NOT NULL,
  `name_person` varchar(50) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `id_proof_no` varchar(50) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `b_date` date NOT NULL,
  `plan_id` int(2) NOT NULL,
  `billing_instruction` varchar(30) NOT NULL,
  `source_of_booking` varchar(20) NOT NULL,
  `traveller_name` varchar(50) NOT NULL,
  `safari_required` varchar(5) NOT NULL,
  `booking_thru_sales` varchar(5) NOT NULL,
  `reservation_status` varchar(30) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `master_outlet_id` int(11) NOT NULL,
  `requested` varchar(20) NOT NULL,
  `granted` varchar(20) NOT NULL,
  `rate_per_night` varchar(20) NOT NULL,
  `advance` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `room_reservations`
--

INSERT INTO `room_reservations` (`id`, `id2`, `checkin_id`, `booking_type`, `company_id`, `name_person`, `nationality`, `id_proof_no`, `telephone`, `fax`, `email_id`, `arrival_date`, `departure_date`, `b_date`, `plan_id`, `billing_instruction`, `source_of_booking`, `traveller_name`, `safari_required`, `booking_thru_sales`, `reservation_status`, `remarks`, `room_type_id`, `master_outlet_id`, `requested`, `granted`, `rate_per_night`, `advance`, `date`, `time`, `flag`) VALUES
(5, 5, 0, 0, 1, 'hj', 'Select...', '', '', '', '', '2015-11-04', '2015-11-05', '2015-11-04', 16, '', 'Company', '', 'no', 'no', '', '', 3, 0, '1', '', '5000', '', '2015-11-04', '11:07:45', 0),
(6, 6, 0, 1, 0, 'Mr. Nilesh tailor', 'Indian', '', '8745787845', '', 'nnn@gmail.com', '2015-11-04', '2015-11-05', '2015-11-04', 15, '', 'Direct', '', 'no', 'no', 'Confirm', '', 0, 15, '', '', '21000', '', '2015-11-04', '11:18:51', 0),
(7, 0, 1, 0, 0, 'Gopesh ji', 'Indian', '', '', '', '', '2015-11-07', '2015-11-08', '0000-00-00', 16, '', 'Company', '', '', '', '', '', 0, 0, '', '', '2500', '1000', '0000-00-00', '10:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_serviceings`
--

CREATE TABLE IF NOT EXISTS `room_serviceings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_roomno_id` varchar(10) NOT NULL,
  `guest_name` varchar(50) NOT NULL,
  `service_date` date NOT NULL,
  `room_status` varchar(20) NOT NULL,
  `serviced_by` varchar(20) NOT NULL,
  `remarks` text NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `room_serviceings`
--

INSERT INTO `room_serviceings` (`id`, `master_roomno_id`, `guest_name`, `service_date`, `room_status`, `serviced_by`, `remarks`, `flag`) VALUES
(1, '101', '', '2015-11-07', 'dirty', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_itemcategory_id` varchar(50) NOT NULL,
  `itemtype_name` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `master_itemcategory_id`, `itemtype_name`, `flag`) VALUES
(1, '1', 'Beer', 0),
(2, '3', 'ddd', 0),
(3, '4', 'sss', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_categories`
--

CREATE TABLE IF NOT EXISTS `stock_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stock_categories`
--

INSERT INTO `stock_categories` (`id`, `item_category`, `flag`) VALUES
(1, 'Food & Beverage', 0),
(3, 'Milk Products', 0),
(4, 'Gym Products', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'faculty'),
(2, 'hod'),
(3, 'vc'),
(4, 'dean'),
(5, 'examiner'),
(6, 'registrar'),
(7, 'committee'),
(9, 'Administrator'),
(10, 'Non Teaching'),
(11, 'Office Incharge');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE IF NOT EXISTS `user_rights` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `module_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `user_id`, `module_id`) VALUES
(1, 1, '1,2,4,5,6,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,37,38,39,40,41,42,43,45,46,47,48,51,52,53,54,55,58,59,60,61,62,63,65,66,67,68,69,70,71'),
(2, 23, '1,2,5,6,40,41,42,52,58,59'),
(3, 24, '1,2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
