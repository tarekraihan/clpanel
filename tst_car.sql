-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 04:38 AM
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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tst_admin_user`
--

INSERT INTO `tst_admin_user` (`admin_user_id`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_address`, `admin_phone`, `current_password`, `old_password`, `admin_role`, `status`, `last_login`, `last_log_out`, `created`, `modified`) VALUES
(1, 'Tarek', 'Raihan', 'tarek@yahoo.com', 'Mohakhali, Dhaka', '8801911222952', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2015-11-06 00:00:00', '2015-11-06 00:00:00', '2015-11-06 00:00:00', '2015-11-06 00:00:00');

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
