-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2015 at 09:17 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tst_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_role`
--

CREATE TABLE IF NOT EXISTS `admin_user_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_role`
--

INSERT INTO `admin_user_role` (`role_id`, `role_name`, `created`, `modified`) VALUES
(1, 'Super Admin', '2015-11-06 09:00:00', '2015-11-06 16:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `name`, `remarks`, `created`, `modified`, `created_by`) VALUES
(1, 'Car', 'Testing', '2015-12-09 06:35:00', '2015-12-09 06:35:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fevourite`
--

CREATE TABLE IF NOT EXISTS `tbl_fevourite` (
  `fevourite_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_make`
--

CREATE TABLE IF NOT EXISTS `tbl_make` (
  `make_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_make`
--

INSERT INTO `tbl_make` (`make_id`, `name`, `remarks`, `created`, `modified`, `created_by`) VALUES
(1, 'BMW', 'Nice Car', '2015-12-07 07:33:46', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `message_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `message_body` text NOT NULL,
  `product_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE IF NOT EXISTS `tbl_model` (
  `model_id` int(10) NOT NULL,
  `make_id` int(10) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `make_id`, `model_name`, `created`, `modified`, `created_by`) VALUES
(1, 1, 'BMW M5 Sedan', '2015-12-07 07:49:24', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(10) NOT NULL,
  `make_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `manufacture_year` varchar(4) NOT NULL,
  `manufacture_month` varchar(15) NOT NULL,
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
  `feature_image` varchar(30) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `make_id`, `model_id`, `category_id`, `manufacture_year`, `manufacture_month`, `price`, `desplacement`, `steering`, `condition`, `made_in`, `fuel`, `body_style`, `door`, `no_of_passenger`, `dimension`, `exterior_color`, `interior_color`, `expiry_date`, `reference_no`, `options`, `feature_image`, `seller_id`, `status`, `created`, `modified`) VALUES
(1, 1, 1, 1, '2015', 'December', '1000000', 'Left', '4000KM', 'New Car', 'Japan', 'Patrol', 'Medium Station Wogan', '5', '4', '3M x 5M', 'White blue', 'White', '0000-00-00', 'RM-58545', '2 Wheel Drive', '1.jpg', 0, 0, '2015-12-20 07:21:27', '0000-00-00 00:00:00'),
(2, 1, 1, 1, '2013', 'July', '500000', 'Left', '4000KM', 'New Car', 'Japan', 'Octen, Patrol', 'Medium Station Wogan', '5', '4', '3M x 5M', 'Royol Blue', 'White', '2015-12-22', 'RM-585456', '2 Wheel Drive', '11.jpg', 0, 0, '2015-12-20 07:44:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tst_admin_user`
--

CREATE TABLE IF NOT EXISTS `tst_admin_user` (
  `admin_user_id` int(10) NOT NULL,
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
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tst_admin_user`
--

INSERT INTO `tst_admin_user` (`admin_user_id`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_address`, `admin_phone`, `current_password`, `old_password`, `admin_role`, `status`, `last_login`, `last_log_out`, `profile_picture`, `created`, `modified`) VALUES
(1, 'Tarek', 'Raihan', 'tarek@yahoo.com', 'Mohakhali, Dhaka', '8801911222952', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2015-11-06 00:00:00', '2015-11-06 00:00:00', '1.jpg', '2015-11-06 00:00:00', '2015-11-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tst_user`
--

CREATE TABLE IF NOT EXISTS `tst_user` (
  `user_id` int(11) NOT NULL,
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
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user_role`
--
ALTER TABLE `admin_user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_fevourite`
--
ALTER TABLE `tbl_fevourite`
  ADD PRIMARY KEY (`fevourite_id`);

--
-- Indexes for table `tbl_make`
--
ALTER TABLE `tbl_make`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tst_admin_user`
--
ALTER TABLE `tst_admin_user`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `tst_user`
--
ALTER TABLE `tst_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user_role`
--
ALTER TABLE `admin_user_role`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_fevourite`
--
ALTER TABLE `tbl_fevourite`
  MODIFY `fevourite_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_make`
--
ALTER TABLE `tbl_make`
  MODIFY `make_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `model_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tst_admin_user`
--
ALTER TABLE `tst_admin_user`
  MODIFY `admin_user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tst_user`
--
ALTER TABLE `tst_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
