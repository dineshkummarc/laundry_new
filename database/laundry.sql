-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 12:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email_id` varchar(75) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `mobile`, `email_id`, `username`, `password`, `last_login`, `ip_add`) VALUES
(1, 'Laundry Administrator', '9897979897', 'laundryadmin@laundry.com', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cloths`
--

CREATE TABLE IF NOT EXISTS `cloths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cloth_type` varchar(100) NOT NULL,
  `cloth_code` varchar(50) NOT NULL,
  `cloth_image` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cloth_type` (`cloth_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cloths`
--

INSERT INTO `cloths` (`id`, `cloth_type`, `cloth_code`, `cloth_image`) VALUES
(1, 'Shirt', 'SHRT', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE IF NOT EXISTS `customer_order` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(15) NOT NULL,
  `order_date` date NOT NULL,
  `order_month` varchar(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `total_qty` int(3) NOT NULL,
  `discount` int(2) DEFAULT NULL,
  `service_tax` float(8,2) DEFAULT NULL,
  `total_paid` float(8,2) NOT NULL,
  `total_balance` float(8,2) NOT NULL,
  `delivery_date` varchar(15) DEFAULT NULL,
  `remarks` text NOT NULL,
  `amt_paidby` varchar(25) NOT NULL,
  `cheque_no` varchar(25) DEFAULT NULL,
  `cheque_date` varchar(25) DEFAULT NULL,
  `order_status` varchar(10) NOT NULL,
  PRIMARY KEY (`auto_id`),
  UNIQUE KEY `order_id` (`invoice_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `join_date` varchar(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `birth_date` varchar(15) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `leave_date` varchar(15) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `salary` text NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email_id` (`email_id`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `join_date`, `first_name`, `last_name`, `mobile`, `email_id`, `address`, `birth_date`, `gender`, `status`, `password`, `leave_date`, `last_login`, `salary`) VALUES
(1, '11-07-2017', 'demo', '435', '546546', 'demo@demo.com', '435435', '11-07-2017', 'male', 'enable', 'mm6Ge', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exps_date` varchar(15) NOT NULL,
  `exp_payee_name` varchar(100) NOT NULL,
  `exp_type` varchar(100) NOT NULL,
  `exp_amt` float(8,2) NOT NULL,
  `exp_paidby` varchar(10) NOT NULL,
  `exp_chequeno` varchar(20) NOT NULL,
  `exp_cheque_date` varchar(15) NOT NULL,
  `exp_remarks` text NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_type`
--

CREATE TABLE IF NOT EXISTS `expense_type` (
  `exps_id` int(11) NOT NULL AUTO_INCREMENT,
  `exps_type` varchar(100) NOT NULL,
  `exps_code` varchar(25) NOT NULL,
  PRIMARY KEY (`exps_id`),
  UNIQUE KEY `exps_type` (`exps_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `service_code` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_name` (`service_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_code`) VALUES
(1, 'Washing', 'sdfds');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `join_date` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email_id`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `join_date`, `first_name`, `last_name`, `address`, `email_id`, `phone`, `mobile`, `status`, `password`, `last_login`) VALUES
(1, '11-07-2017', 'Demo', 'Demo', 'dfsd', 'aasd@demo.com', '', '12345678', 'enable', 'demo', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
