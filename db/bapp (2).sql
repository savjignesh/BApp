-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2015 at 04:54 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
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
  `bio` text,
  PRIMARY KEY (`user_id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_bill` (
  `bill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `customer_Id` int(11) NOT NULL,
  `bill_date` varchar(25) NOT NULL,
  `net_amount` varchar(50) NOT NULL,
  `gross_amount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total_items` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`bill_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_ID`, `customer_Id`, `bill_date`, `net_amount`, `gross_amount`, `vat`, `tax`, `discount`, `total_items`, `is_deleted`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(1, 1, '27-Jun-2015', '100', '32086', '95', '47', '2495', '27', 0, 1, '2015-06-21 12:20:41', 1, '2015-06-27 20:23:12'),
(4, 1, '28-Jun-2015', '100', '1372', '13', '2', '37', '4', 0, 1, '2015-06-21 20:29:46', 1, '2015-06-28 23:42:35'),
(5, 1, '21-06-2015', '100', '120', '2', '1', '34', '12', 0, 1, '2015-06-21 20:37:24', 0, '2015-06-21 20:37:24'),
(6, 1, '27-Jun-2015', '100', '86', '2', '2', '24', '2', 0, 1, '2015-06-22 22:40:33', 1, '2015-06-27 20:42:36'),
(11, 0, '27-06-2015', '100', '48', '61', '6', '72', '6', 1, 1, '2015-06-25 23:34:15', 1, '2015-06-27 20:57:08'),
(12, 0, '30-Jun-2015', '', '', '', '', '', '', 1, 1, '2015-06-30 11:38:59', 0, '2015-06-30 11:38:59'),
(13, 0, '30-Jun-2015', '', '', '', '', '', '', 1, 1, '2015-06-30 11:40:57', 0, '2015-06-30 11:40:57'),
(14, 0, '30-Jun-2015', '', '121', '0', '0', '3', '1', 1, 1, '2015-06-30 11:43:45', 1, '2015-06-30 11:47:23'),
(15, 0, '30-Jun-2015', '', '', '', '', '', '', 1, 1, '2015-06-30 11:50:48', 0, '2015-06-30 11:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billdetail`
--

CREATE TABLE IF NOT EXISTS `tbl_billdetail` (
  `billdetail_ID` int(11) NOT NULL AUTO_INCREMENT,
  `bill_Id` int(11) NOT NULL,
  `item_Id` int(11) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`billdetail_ID`),
  KEY `bill_Id` (`bill_Id`),
  KEY `item_Id` (`item_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_billdetail`
--

INSERT INTO `tbl_billdetail` (`billdetail_ID`, `bill_Id`, `item_Id`, `qty`, `price`, `discount`, `vat`, `tax`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(1, 1, 5, '1', '2', '3', '3', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 1, 5, '12', '1234', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 1, 5, '12', '1234', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 1, 5, '12', '1234', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 1, 5, '12', '1234', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 1, 5, '12', '1234', '121', '1', '21', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 1, 6, '12', '1234', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, 1, 5, '12', '1234', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(10, 4, 5, '2', '1234', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(14, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(15, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(16, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(17, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(18, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(19, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(20, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(21, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(22, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(23, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(24, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(25, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(26, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(27, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(28, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(29, 1, 10, '12', '1234', '121', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(30, 6, 5, '12', '78', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(31, 6, 7, '12', '8', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(32, 11, 5, '12', '8', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(33, 11, 5, '12', '8', '12', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(34, 11, 10, '12', '8', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(35, 11, 10, '12', '8', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(36, 11, 10, '12', '8', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(37, 11, 10, '12', '8', '12', '12', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(38, 4, 9, '121', '8', '12', '1', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(39, 4, 10, '12', '123', '12', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(40, 4, 6, '123', '7', '1', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(41, 14, 5, '5', '121', '3', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `id_deleted` tinyint(4) NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_ID`, `category_name`, `created_Id`, `created_time`, `id_deleted`, `updated_Id`, `updated_time`) VALUES
(1, 'touch wood ', 1, '2015-06-14 19:36:32', 0, 0, '2015-06-14 19:36:32'),
(2, 'colored ', 1, '2015-06-14 19:36:48', 0, 1, '2015-06-14 19:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `current_balance` int(50) NOT NULL,
  `gender` int(50) NOT NULL,
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
  `id_deleted` tinyint(4) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`customer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_ID`, `customer_name`, `customer_email`, `city`, `address1`, `address2`, `current_balance`, `gender`, `home_phone`, `mobile1`, `mobile2`, `dnd_call`, `dnd_email`, `dnd_sms`, `accounting_persion_name`, `accounting_persion_contact`, `marketing_person_name`, `marketing_persion_contact`, `id_deleted`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(1, 'test customer 1', 'test@mail.com', 'ahmedabad', '234f ', '', 123, 0, '12345', '987654', '123', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'new customer', 'sdsd', 'ahmedbad', 'sdsd', 'ksnsnd', 100, 0, '299349921', '2924932435', '545454545', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust_item_discount`
--

CREATE TABLE IF NOT EXISTS `tbl_cust_item_discount` (
  `item_Id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_Id` int(11) NOT NULL,
  `cust_item_discount_ID` int(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`item_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
  `item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `Item_role` varchar(50) NOT NULL,
  `item_stock` varchar(50) NOT NULL,
  `item_uom` varchar(50) NOT NULL,
  `item_cat_Id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `purchase_price` varchar(50) NOT NULL,
  `sales_price` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_Id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_Id` int(11) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`item_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_ID`, `item_name`, `Item_role`, `item_stock`, `item_uom`, `item_cat_Id`, `description`, `image`, `purchase_price`, `sales_price`, `is_deleted`, `created_Id`, `created_time`, `updated_Id`, `updated_time`) VALUES
(5, 'item2', '1', '1', '123', 1, 'esfsdf', 'uploads/5-item2.jpg', '122', '121', 1, 1, '2015-06-18 23:25:35', 1, '2015-06-27 13:31:37'),
(6, 'item21', '1', '1', '123', 1, 'dfds', 'uploads/6-item21.jpg', '100', '120', 0, 1, '2015-06-18 23:30:14', 1, '2015-06-27 13:31:56'),
(7, 'image-item', '121', '222', '12', 1, 'image-item', 'uploads/1.jpg', '100', '210', 1, 1, '2015-06-27 12:35:03', 1, '2015-06-27 18:41:31'),
(8, 'image-item', '121', '222', '12', 1, 'image-item', 'uploads/1.jpg', '100', '210', 1, 1, '2015-06-27 12:35:55', 1, '2015-06-27 18:41:42'),
(9, 'image-item', '121', '222', '12', 1, 'image-item', 'uploads/9-image-item.jpg', '100', '210', 0, 1, '2015-06-27 12:37:35', 1, '2015-06-27 13:18:14'),
(10, 'item 43', '1', '1', '123', 1, 'item 43', 'uploads/10-item 43.jpg', '100', '123', 0, 1, '2015-06-27 13:44:09', 1, '2015-06-27 13:44:28'),
(11, 'namaskar y-cone', '65', '70', 'number', 1, 'gghg', 'uploads/-namaskar y-cone.jpg', '20', '24', 0, 1, '2015-06-30 11:35:32', 0, '2015-06-30 11:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `city`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 'jignesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Ahmedabad', 'dhaval', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Ahmedabad', 'jigneshggg', '2015-06-17 23:02:37', '2015-06-17 23:02:37'),
(6, 'ahmedabad', 'cool', '2015-06-22 23:08:40', '2015-06-22 23:08:40'),
(7, 'ahmedabad', 'cool', '2015-06-22 23:10:53', '2015-06-22 23:10:53'),
(9, 'Ahmedabad', 'jignesh e', '2015-06-22 23:16:41', '2015-06-22 23:16:41'),
(10, 'Ahmedabad', 'jignesh e', '2015-06-22 23:18:48', '2015-06-22 23:18:48'),
(11, 'Ahmedabad', 'jignenbbb', '2015-06-22 23:20:01', '2015-06-22 23:20:01'),
(12, 'Ahmedabad', 'jignenbbb', '2015-06-22 23:20:50', '2015-06-22 23:20:50'),
(13, 'usa', 'Sam', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$WnpNHFaXPEikUuCRN1etD../gLRfDuWfy2KIwZseiUh7yoqfYB0V.', 'fOPzoRDgzSbCHGnZmAset1si1FAdwvRg', NULL, NULL, NULL, '127.0.0.1', 1434285641, 1434285641, 0);

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
