-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 01:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tst_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_role`
--

CREATE TABLE IF NOT EXISTS `admin_user_role` (
  `role_id` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin_user_role`
--

INSERT INTO `admin_user_role` (`role_id`, `role_name`, `created`, `modified`) VALUES
(1, 'Super Admin', '2015-11-06 09:00:00', '2015-12-06 01:02:48'),
(2, 'Normal User', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Admin', '2015-12-06 11:50:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fevourite`
--

CREATE TABLE IF NOT EXISTS `tbl_fevourite` (
  `fevourite_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`fevourite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_make`
--

CREATE TABLE IF NOT EXISTS `tbl_make` (
  `make_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `message_body` text NOT NULL,
  `product_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE IF NOT EXISTS `tbl_model` (
  `model_id` int(10) NOT NULL AUTO_INCREMENT,
  `make_id` int(10) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `make_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `manufacture_year` varchar(4) NOT NULL,
  `manufacture_month` varchar(2) NOT NULL,
  `price` varchar(15) NOT NULL,
  `desplacement` varchar(20) NOT NULL,
  `steering` varchar(20) NOT NULL,
  `condition` varchar(20) NOT NULL,
  `made_in` varchar(25) NOT NULL,
  `fuel` varchar(25) NOT NULL,
  `body_style` varchar(255) NOT NULL,
  `door` varchar(20) NOT NULL,
  `no_of_passenger` varchar(10) NOT NULL,
  `dimension` varchar(200) NOT NULL,
  `exterior_color` varchar(20) NOT NULL,
  `interior_color` varchar(20) NOT NULL,
  `expiry_date` date NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `options` text NOT NULL,
  `seller_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tst_admin_user`
--

CREATE TABLE IF NOT EXISTS `tst_admin_user` (
  `admin_user_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_first_name` varchar(20) NOT NULL,
  `admin_last_name` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` varchar(100) NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `current_password` varchar(32) NOT NULL,
  `old_password` varchar(32) NOT NULL,
  `admin_role` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `last_log_out` datetime NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`admin_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tst_admin_user`
--

INSERT INTO `tst_admin_user` (`admin_user_id`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_address`, `admin_phone`, `current_password`, `old_password`, `admin_role`, `status`, `last_login`, `last_log_out`, `profile_picture`, `created`, `modified`) VALUES
(1, 'John', 'Smith', 'tarek@yahoo.com', 'Mohakhali, Dhaka', '8801911222952', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2015-11-06 00:00:00', '2015-11-06 00:00:00', '', '2015-11-06 00:00:00', '2015-11-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tst_user`
--

CREATE TABLE IF NOT EXISTS `tst_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `country` varchar(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `current_password` varchar(32) NOT NULL,
  `old_password` varchar(32) NOT NULL,
  `newsletter_notification` int(2) NOT NULL,
  `message_notification` int(2) NOT NULL,
  `last_loging` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
