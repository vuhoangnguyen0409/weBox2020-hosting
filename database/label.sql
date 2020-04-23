-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2020 at 09:15 AM
-- Server version: 5.6.34
-- PHP Version: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webdemo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `labelid` int(10) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(255) NOT NULL,
  PRIMARY KEY (`labelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`labelid`, `label_name`) VALUES
(1, 'Du Lịch'),
(2, 'Ẩm Thực'),
(3, 'Kiến Trúc'),
(4, 'Marketing'),
(5, 'In Ấn'),
(6, 'Thời Trang'),
(7, 'Giầy '),
(8, 'Công Nghệ'),
(9, 'Trang Sức'),
(10, 'Túi Xách');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
