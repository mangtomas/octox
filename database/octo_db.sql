-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2013 at 02:09 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `octo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `_permission`
--

CREATE TABLE IF NOT EXISTS `_permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `_create` tinyint(1) NOT NULL DEFAULT '0',
  `_update` tinyint(1) NOT NULL DEFAULT '0',
  `_delete` tinyint(1) NOT NULL DEFAULT '0',
  `_read` tinyint(1) NOT NULL DEFAULT '0',
  `export` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `_permission`
--

INSERT INTO `_permission` (`permission_id`, `module_id`, `role_id`, `_create`, `_update`, `_delete`, `_read`, `export`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(5, NULL, 23, 0, 1, 0, 1, 0),
(6, NULL, 24, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_role`
--

CREATE TABLE IF NOT EXISTS `_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `_role`
--

INSERT INTO `_role` (`role_id`, `role`, `status`) VALUES
(1, 'Boss', 1),
(24, 'User', 0),
(23, 'Editor', 0),
(18, 'adsd', 0),
(17, 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_users`
--

CREATE TABLE IF NOT EXISTS `_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(25) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_registered` datetime DEFAULT NULL,
  `varKey` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `_users`
--

INSERT INTO `_users` (`user_id`, `role_id`, `password`, `email_address`, `firstname`, `lastname`, `company_name`, `address`, `gender`, `contact_number`, `mobile_number`, `status`, `date_updated`, `date_registered`, `varKey`) VALUES
(10, 1, 'KjIDLhJiUqm+hXGdeyEqwlpQhuNRJZw=', 'mangtomas.code@gmail.com', 'Octo', 'Ninja', 'Lorem Ipsum dolorem neque que quisqiam', '#09 Don Rocess, Pasong Tamo, Makati City', 'Male', '0987653', '0987654321', 1, '2013-04-22 08:28:50', '2013-04-12 22:38:51', 'POF4oKf2hG7A');
