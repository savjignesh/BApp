-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 07:45 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1434207902),
('m140209_132017_init', 1434207910),
('m140403_174025_create_account_table', 1434207911),
('m140504_113157_update_tables', 1434207913),
('m140504_130429_create_token_table', 1434207914),
('m140830_171933_fix_ip_field', 1434207914),
('m140830_172703_change_account_table_name', 1434207914),
('m141222_110026_update_ip_field', 1434207915);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, NULL, NULL, 'admin@mail.com', 'edb0e96701c209ab4b50211c856c50c4', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_bill` (
  `bill_ID` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `bill_date` varchar(25) NOT NULL,
  `net_amount` varchar(50) NOT NULL,
  `gross_amount` varchar(50) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total_items` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_ID`, `customer_Id`, `bill_date`, `net_amount`, `gross_amount`, `payment_mode`, `vat`, `tax`, `discount`, `total_items`, `is_deleted`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(1, 2, '05-07-2015', '100', '32328', '', '104', '52', '2503', '29', 1, 1, '2015-06-21 12:20:41', 1, '2015-07-05 21:10:40'),
(4, 4, '05-09-2015', '1014', '959', 'Cash', '13', '6', '34', '2', 0, 1, '2015-06-21 20:29:46', 1, '2015-09-28 23:36:55'),
(5, 1, '10-08-2015', '2074', '1293', 'Bank', '38', '23', '2', '5', 0, 1, '2015-06-21 20:37:24', 1, '2015-09-06 09:04:17'),
(6, 1, '16-08-2015', '100', '903', 'Cash', '20', '13', '10', '4', 0, 1, '2015-06-22 22:40:33', 1, '2015-08-16 20:59:43'),
(11, 0, '27-06-2015', '100', '48', '', '61', '6', '72', '6', 1, 1, '2015-06-25 23:34:15', 1, '2015-06-27 20:57:08'),
(12, 0, '30-07-2015', '', '', '', '', '', '', '', 1, 1, '2015-06-30 11:38:59', 0, '2015-06-30 11:38:59'),
(13, 0, '30-07-2015', '', '', '', '', '', '', '', 1, 1, '2015-06-30 11:40:57', 0, '2015-06-30 11:40:57'),
(14, 0, '30-07-2015', '', '121', '', '0', '0', '3', '1', 1, 1, '2015-06-30 11:43:45', 1, '2015-06-30 11:47:23'),
(15, 0, '30-07-2015', '', '', '', '', '', '', '', 1, 1, '2015-06-30 11:50:48', 0, '2015-06-30 11:50:48'),
(16, 0, '12-07-2015', '', '', '', '', '', '', '', 1, 1, '2015-07-12 22:03:20', 0, '2015-07-12 22:03:20'),
(17, 0, '19-07-2015', '', '', '', '', '', '', '', 1, 1, '2015-07-19 21:22:46', 0, '2015-07-19 21:22:46'),
(18, 0, '23-07-2015', '', '', '', '', '', '', '', 1, 1, '2015-07-23 10:00:41', 0, '2015-07-23 10:00:41'),
(19, 2, '24-07-2015', '', '', '', '', '', '', '', 1, 1, '2015-07-24 10:12:06', 1, '2015-07-24 10:20:12'),
(20, 0, '08-Aug-2015', '', '', '', '', '', '', '', 1, 1, '2015-08-08 19:32:04', 0, '2015-08-08 19:32:04'),
(21, 2, '08-08-2015', '', '', '', '', '', '', '', 1, 1, '2015-08-08 19:44:28', 1, '2015-08-08 19:44:38'),
(22, 1, '08-08-2015', '', '', 'cash', '', '', '', '', 1, 1, '2015-08-08 22:09:18', 1, '2015-08-08 22:15:27'),
(23, 0, '15-Aug-2015', '', '', '', '', '', '', '', 1, 1, '2015-08-15 18:03:33', 0, '2015-08-15 18:03:33'),
(24, 0, '15-Aug-2015', '', '', '', '', '', '', '', 1, 1, '2015-08-15 18:11:47', 0, '2015-08-15 18:11:47'),
(25, 2, '22-08-2015', '', '', 'Cash', '', '', '', '', 1, 1, '2015-08-22 17:00:44', 0, '2015-08-22 17:00:44'),
(26, 3, '22-08-2015', '', '333', 'Cash', '0', '0', '0', '2', 0, 1, '2015-08-22 17:10:12', 1, '2015-08-22 17:11:07'),
(27, 0, '22-Aug-2015', '', '', '', '', '', '', '', 1, 1, '2015-08-22 18:24:46', 0, '2015-08-22 18:24:46'),
(28, 3, '29-08-2015', '', '120', 'Cash', '12', '11', '0', '1', 0, 1, '2015-08-29 19:42:50', 1, '2015-08-29 19:43:31'),
(29, 2, '06-09-2015', '242', '242', 'Cash', '9', '5', '1', '1', 0, 1, '2015-08-29 19:44:18', 1, '2015-09-26 21:53:05'),
(30, 3, '26-09-2015', '68', '78', 'Cash', '8', '2', '0', '1', 0, 1, '2015-09-26 21:53:44', 1, '2015-09-26 22:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billdetail`
--

CREATE TABLE IF NOT EXISTS `tbl_billdetail` (
  `billdetail_ID` int(11) NOT NULL,
  `bill_Id` int(11) NOT NULL,
  `item_Id` int(11) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `final_price` varchar(100) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_billdetail`
--

INSERT INTO `tbl_billdetail` (`billdetail_ID`, `bill_Id`, `item_Id`, `qty`, `price`, `final_price`, `discount`, `vat`, `tax`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(1, 1, 5, '1', '2', '2', '3', '3', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 1, 5, '12', '1234', '14808', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 1, 5, '12', '1234', '14808', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 1, 5, '12', '1234', '14808', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 1, 5, '12', '1234', '14808', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 1, 5, '12', '1234', '14808', '121', '1', '21', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 1, 6, '12', '1234', '14808', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, 1, 5, '12', '1234', '14808', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(14, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(15, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(16, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(17, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(18, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(19, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(20, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(21, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(22, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(23, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(24, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(25, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(26, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(27, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(28, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(29, 1, 10, '12', '1234', '14808', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(32, 11, 5, '12', '8', '96', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(33, 11, 5, '12', '8', '96', '12', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(34, 11, 10, '12', '8', '96', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(35, 11, 10, '12', '8', '96', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(36, 11, 10, '12', '8', '96', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(37, 11, 10, '12', '8', '96', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(41, 14, 5, '5', '121', '605', '3', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(42, 1, 5, '123', '121', '14883', '1', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(43, 1, 5, '8', '121', '968', '7', '9', '5', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(53, 6, 6, '2', '120', '240', '0', '12', '11', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(54, 6, 13, '2', '330', '660', '0', '4', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(55, 6, 13, '2', '330', '660', '10', '4', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(56, 6, 10, '12', '123', '1476', '0', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(57, 26, 10, '9', '123', '1107', '0', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(58, 26, 9, '9', '210', '1890', '0', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(59, 28, 6, '8', '120', '960', '0', '12', '11', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(64, 5, 13, '1', '330', '330', '0', '4', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(65, 5, 13, '2', '330', '660', '0', '4', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(66, 5, 5, '2', '121', '242', '1', '9', '5', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(67, 5, 5, '2', '121', '242', '1', '9', '5', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(68, 5, 6, '5', '120', '600', '0', '12', '11', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(87, 30, 12, '2', '34', '78', '0', '8', '2', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(98, 4, 5, '2', '12', '44', '4', '9', '5', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(99, 4, 13, '3', '330', '915', '30', '4', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_ID`, `category_name`, `created_Id`, `created_time`, `is_deleted`, `updated_Id`, `updated_time`) VALUES
(1, 'touch wood ', 1, '2015-06-14 19:36:32', 0, 0, '2015-06-14 19:36:32'),
(2, 'colored ', 1, '2015-06-14 19:36:48', 0, 1, '2015-06-14 19:36:48'),
(3, 'category 1', 1, '2015-07-05 17:22:10', 0, 0, '2015-07-05 17:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credit`
--

CREATE TABLE IF NOT EXISTS `tbl_credit` (
  `credit_ID` int(11) NOT NULL,
  `credit_bill_Id` int(11) NOT NULL,
  `credit_ac_Id` int(11) NOT NULL,
  `credit_type_Id` int(11) NOT NULL,
  `credit_amount` varchar(200) NOT NULL,
  `credit_date` date NOT NULL,
  `credit_debit` tinyint(4) NOT NULL COMMENT '0=credit, 1=debit'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_credit`
--

INSERT INTO `tbl_credit` (`credit_ID`, `credit_bill_Id`, `credit_ac_Id`, `credit_type_Id`, `credit_amount`, `credit_date`, `credit_debit`) VALUES
(1, 4, 0, 3, '234', '2015-03-09', 0),
(2, 4, 2, 5, '234', '2015-03-09', 0),
(3, 4, 11, 8, '24', '2015-03-09', 0),
(4, 4, 0, 6, '12', '2015-08-09', 0),
(5, 4, 7, 8, '210', '2015-08-09', 0),
(6, 4, 0, 6, '12', '2015-03-09', 0),
(7, 5, 0, 2, '121', '2015-03-10', 0),
(8, 5, 1, 5, '121', '2015-03-10', 0),
(9, 5, 5, 8, '121', '2015-03-10', 0),
(10, 5, 0, 6, '10', '2015-08-10', 0),
(11, 6, 0, 3, '86', '2015-03-16', 0),
(12, 6, 1, 5, '86', '2015-08-16', 0),
(13, 26, 0, 3, '123', '2015-08-22', 0),
(14, 26, 3, 5, '123', '2015-08-22', 0),
(15, 26, 10, 8, '123', '2015-08-22', 0),
(16, 26, 0, 6, '0', '2015-08-22', 0),
(17, 28, 0, 3, '120', '2015-08-29', 1),
(18, 28, 3, 5, '120', '2015-08-29', 1),
(19, 28, 6, 8, '120', '2015-08-29', 0),
(20, 28, 0, 6, '0', '2015-08-29', 0),
(21, 29, 0, 3, '333', '2015-08-29', 1),
(22, 29, 2, 5, '333', '2015-08-29', 1),
(23, 29, 10, 8, '123', '2015-08-29', 1),
(24, 29, 0, 6, '0', '2015-08-29', 1),
(25, 29, 7, 8, '210', '2015-08-29', 1),
(26, 29, 0, 6, '0', '2015-08-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_ID` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `current_balance` int(50) NOT NULL,
  `home_phone` varchar(100) NOT NULL,
  `mobile1` varchar(100) NOT NULL,
  `mobile2` varchar(100) NOT NULL,
  `dnd_call` varchar(100) NOT NULL,
  `dnd_email` varchar(100) NOT NULL,
  `dnd_sms` varchar(100) NOT NULL,
  `accounting_persion_name` varchar(100) NOT NULL,
  `accounting_persion_contact` varchar(100) NOT NULL,
  `marketing_person_name` varchar(100) NOT NULL,
  `marketing_persion_contact` varchar(100) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_ID`, `customer_name`, `customer_email`, `city`, `gender`, `address1`, `address2`, `current_balance`, `home_phone`, `mobile1`, `mobile2`, `dnd_call`, `dnd_email`, `dnd_sms`, `accounting_persion_name`, `accounting_persion_contact`, `marketing_person_name`, `marketing_persion_contact`, `is_deleted`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(1, 'test customer 1', 'test@mail.com', 'ahmedabad', '', '234f ', '', 123, '12345', '987654', '123', '0', '0', '0', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 1, '2015-08-22 18:17:16'),
(2, 'new customer', 'sdsd', 'ahmedbad', '', 'sdsd', 'ksnsnd', 100, '299349921', '2924932435', '545454545', '0', '0', '0', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 1, '2015-07-05 16:53:47'),
(3, 'manubhai ', 'test@mail.com', 'ahmedabad', '', '34 xyz road', '', 123, '93728912', '3435454', '46464', '0', '0', '0', '', '', 'masdd', '', 0, 1, '2015-07-05 16:42:48', 1, '2015-07-05 16:49:10'),
(4, 'AJIT EXPORT', 'VMDEVRA@GMAIL.COM', 'AHMEDABAD', '', 'SAIJPUR BOGHA,\r\n', 'AHMEDABAD', 6348, '9824497790', '9723701997', '', '0', '0', '1', '', '', 'ABDUL', '', 0, 1, '2015-08-15 17:47:47', 0, '2015-08-15 17:47:47'),
(5, 'test', 'mail@mail.com', 'ahme', '', 'srew', '', 120, '83483784743', '343243243', '', '0', '0', '0', '', '', '', '', 0, 1, '2015-08-22 18:20:57', 0, '2015-08-22 18:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customerpay`
--

CREATE TABLE IF NOT EXISTS `tbl_customerpay` (
  `customerpay_ID` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `Amount` int(200) NOT NULL,
  `payment_date` date NOT NULL,
  `remark` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customerpay`
--

INSERT INTO `tbl_customerpay` (`customerpay_ID`, `customer_Id`, `payment_mode`, `Amount`, `payment_date`, `remark`) VALUES
(1, 2, 'Cash', 1000, '2015-09-15', ''),
(2, 3, 'Cash', 2000, '2015-09-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust_item_discount`
--

CREATE TABLE IF NOT EXISTS `tbl_cust_item_discount` (
  `item_Id` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `cust_item_discount_ID` int(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) DEFAULT NULL,
  `updated_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cust_item_discount`
--

INSERT INTO `tbl_cust_item_discount` (`item_Id`, `customer_Id`, `cust_item_discount_ID`, `discount`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(5, 2, 36, '1', 1, '2015-07-12 18:07:17', NULL, '2015-07-12 18:07:17'),
(7, 2, 52, '1', 1, '2015-07-12 18:19:13', NULL, '2015-07-12 18:19:13'),
(9, 2, 61, '1', 1, '2015-07-12 21:48:41', NULL, '2015-07-12 21:48:41'),
(8, 2, 62, '1', 1, '2015-07-12 21:48:44', NULL, '2015-07-12 21:48:44'),
(6, 3, 64, '1', 1, '2015-07-26 12:51:01', NULL, '2015-07-26 12:51:01'),
(8, 3, 65, '1', 1, '2015-07-26 12:51:03', NULL, '2015-07-26 12:51:03'),
(10, 2, 77, '12', 1, '2015-08-11 01:03:11', NULL, '2015-08-11 01:03:11'),
(13, 4, 81, '10', 1, '2015-08-15 18:06:37', NULL, '2015-08-15 18:06:37'),
(12, 4, 82, '2', 1, '2015-08-15 18:07:04', NULL, '2015-08-15 18:07:04'),
(5, 1, 83, '1', 1, '2015-08-16 23:00:34', NULL, '2015-08-16 23:00:34'),
(6, 1, 85, '0', 1, '2015-08-16 23:40:11', NULL, '2015-08-16 23:40:11'),
(7, 1, 86, '1', 1, '2015-08-22 14:08:13', NULL, '2015-08-22 14:08:13'),
(5, 5, 87, '10', 1, '2015-08-22 18:21:32', NULL, '2015-08-22 18:21:32'),
(5, 4, 88, '2', 1, '2015-09-27 21:11:22', NULL, '2015-09-27 21:11:22'),
(6, 4, 89, '2', 1, '2015-09-27 21:11:28', NULL, '2015-09-27 21:11:28'),
(7, 4, 90, '2', 1, '2015-09-27 21:11:35', NULL, '2015-09-27 21:11:35'),
(8, 4, 91, '2', 1, '2015-09-27 21:11:39', NULL, '2015-09-27 21:11:39'),
(9, 4, 92, '2', 1, '2015-09-27 21:11:43', NULL, '2015-09-27 21:11:43'),
(10, 4, 93, '2', 1, '2015-09-27 21:11:47', NULL, '2015-09-27 21:11:47'),
(11, 4, 94, '2', 1, '2015-09-27 21:11:59', NULL, '2015-09-27 21:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_debit`
--

CREATE TABLE IF NOT EXISTS `tbl_debit` (
  `debit_ID` int(11) NOT NULL,
  `debit_bill_Id` int(11) NOT NULL,
  `debit_ac_Id` int(11) NOT NULL,
  `debit_type_Id` int(11) NOT NULL,
  `debit_amount` varchar(200) NOT NULL,
  `debit_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_debit`
--

INSERT INTO `tbl_debit` (`debit_ID`, `debit_bill_Id`, `debit_ac_Id`, `debit_type_Id`, `debit_amount`, `debit_date`) VALUES
(1, 1, 1, 4, '400', '2015-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
  `item_ID` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_code` varchar(200) NOT NULL,
  `Item_role` varchar(50) NOT NULL,
  `item_stock` varchar(50) NOT NULL,
  `item_uom` varchar(50) NOT NULL,
  `item_cat_Id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `purchase_price` varchar(50) NOT NULL,
  `sales_price` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_ID`, `item_name`, `item_code`, `Item_role`, `item_stock`, `item_uom`, `item_cat_Id`, `description`, `image`, `purchase_price`, `sales_price`, `vat`, `tax`, `is_deleted`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(5, 'item2', 'NMK01', '1', '20', '123', 1, 'esfsdf', 'uploads/5-item2.jpg', '122', '121', '9', '5', 0, 1, '2015-06-18 23:25:35', 1, '2015-09-28 23:36:43'),
(6, 'item21', '', '1', '1', '123', 1, 'dfds', 'uploads/6-item21.jpg', '100', '120', '12', '11', 0, 1, '2015-06-18 23:30:14', 1, '2015-09-27 22:25:24'),
(7, 'image-item', '', '121', '246', '12', 1, 'image-item', 'uploads/1.jpg', '100', '210', '2', '2', 0, 1, '2015-06-27 12:35:03', 1, '2015-09-27 22:47:24'),
(8, 'image-item', '', '121', '200', '12', 1, 'image-item', 'uploads/1.jpg', '100', '210', '2', '2', 0, 1, '2015-06-27 12:35:55', 1, '2015-09-27 22:03:10'),
(9, 'image-item', '', '121', '222', '12', 1, 'image-item', 'uploads/9-image-item.jpg', '100', '210', '', '', 0, 1, '2015-06-27 12:37:35', 1, '2015-08-15 17:49:12'),
(10, 'item 43', '', '1', '1', '123', 1, 'item 43', 'uploads/10-item 43.jpg', '100', '123', '', '', 0, 1, '2015-06-27 13:44:09', 1, '2015-08-15 17:49:15'),
(11, 'namaskar y-cone', '', '65', '94', 'number', 1, 'gghg', 'uploads/-namaskar y-cone.jpg', '20', '24', '', '', 0, 1, '2015-06-30 11:35:32', 1, '2015-09-27 21:10:01'),
(12, 'NAM Y-CONE', '', '700', '826', 'PIECE', 3, 'VISCOSE YARN', 'uploads/1.jpg', '28', '34', '4', '1', 0, 1, '2015-08-15 17:54:55', 1, '2015-09-27 13:00:49'),
(13, 'A-WOOL', 'NMK02', '5000', '100010', 'KG.', 2, 'ACRYLIC YARN', 'uploads/-A-WOOL.jpg', '290', '330', '4', '1', 0, 1, '2015-08-15 17:58:29', 1, '2015-09-28 23:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_ID` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_ID`, `type_name`) VALUES
(1, 'None'),
(2, 'Bank'),
(3, 'Cash'),
(4, 'Vender'),
(5, 'Customer'),
(6, 'Discount'),
(7, 'Credit'),
(8, 'Item');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE IF NOT EXISTS `tbl_vendor` (
  `vendor_ID` int(11) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_email` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `current_balance` int(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `home_phone` varchar(100) NOT NULL,
  `mobile1` varchar(100) NOT NULL,
  `mobile2` varchar(100) NOT NULL,
  `dnd_call` varchar(100) NOT NULL,
  `dnd_email` varchar(100) NOT NULL,
  `dnd_sms` varchar(100) NOT NULL,
  `accounting_persion_name` varchar(100) NOT NULL,
  `accounting_persion_contact` varchar(100) NOT NULL,
  `marketing_person_name` varchar(100) NOT NULL,
  `marketing_persion_contact` varchar(100) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_ID`, `vendor_name`, `vendor_email`, `city`, `address1`, `address2`, `current_balance`, `gender`, `home_phone`, `mobile1`, `mobile2`, `dnd_call`, `dnd_email`, `dnd_sms`, `accounting_persion_name`, `accounting_persion_contact`, `marketing_person_name`, `marketing_persion_contact`, `is_deleted`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(1, 'vendor 1', 'vendor@mail.com', 'ahmedbad', 'vendor 1', '', 100, 'male', '123456789', '123456789', '', '0', '0', '0', '', '', '', '', 0, 1, '2015-08-09 17:15:21', 0, '2015-08-09 17:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `city`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', 'jignesh', '2015-06-18', '0000-00-00 00:00:00'),
(2, '2', 'dhaval', '2015-07-31', '0000-00-00 00:00:00'),
(3, '3', 'sddfs', '2015-07-28', '0000-00-00 00:00:00'),
(4, '4', 'sads', '2015-07-12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'RzE1R6xlI_mnjdo612O6AWdR-K83bM6u', 1434285642, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$WnpNHFaXPEikUuCRN1etD../gLRfDuWfy2KIwZseiUh7yoqfYB0V.', 'fOPzoRDgzSbCHGnZmAset1si1FAdwvRg', NULL, NULL, NULL, '127.0.0.1', 1434285641, 1434285641, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `account_unique` (`provider`,`client_id`), ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`bill_ID`);

--
-- Indexes for table `tbl_billdetail`
--
ALTER TABLE `tbl_billdetail`
  ADD PRIMARY KEY (`billdetail_ID`), ADD KEY `bill_Id` (`bill_Id`), ADD KEY `item_Id` (`item_Id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `tbl_credit`
--
ALTER TABLE `tbl_credit`
  ADD PRIMARY KEY (`credit_ID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `tbl_customerpay`
--
ALTER TABLE `tbl_customerpay`
  ADD PRIMARY KEY (`customerpay_ID`);

--
-- Indexes for table `tbl_cust_item_discount`
--
ALTER TABLE `tbl_cust_item_discount`
  ADD PRIMARY KEY (`cust_item_discount_ID`);

--
-- Indexes for table `tbl_debit`
--
ALTER TABLE `tbl_debit`
  ADD PRIMARY KEY (`debit_ID`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_ID`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_unique_username` (`username`), ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `bill_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_billdetail`
--
ALTER TABLE `tbl_billdetail`
  MODIFY `billdetail_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_credit`
--
ALTER TABLE `tbl_credit`
  MODIFY `credit_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_customerpay`
--
ALTER TABLE `tbl_customerpay`
  MODIFY `customerpay_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_cust_item_discount`
--
ALTER TABLE `tbl_cust_item_discount`
  MODIFY `cust_item_discount_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `tbl_debit`
--
ALTER TABLE `tbl_debit`
  MODIFY `debit_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_billdetail`
--
ALTER TABLE `tbl_billdetail`
ADD CONSTRAINT `tbl_billdetail_ibfk_1` FOREIGN KEY (`bill_Id`) REFERENCES `tbl_bill` (`bill_ID`),
ADD CONSTRAINT `tbl_billdetail_ibfk_2` FOREIGN KEY (`item_Id`) REFERENCES `tbl_item` (`item_ID`);

--
-- Constraints for table `token`
--
ALTER TABLE `token`
ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
