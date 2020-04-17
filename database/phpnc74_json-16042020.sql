-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2020 at 07:21 AM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cateid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `cate_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cateid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cateid`, `cate_name`, `parent_id`, `level`, `cate_img`) VALUES
(1, 'web Onepage', 0, 1, NULL),
(2, 'Web bán hàng', 0, 1, NULL),
(3, 'Web doanh nghiệp', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_content` text NOT NULL,
  `newsid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `comment_date` int(50) DEFAULT NULL,
  PRIMARY KEY (`commentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `comment_content`, `newsid`, `userid`, `comment_date`) VALUES
(4, 'Hello<br />\neverybody', 4, 1, 1586058656),
(7, 'hay', 2, 17, 1586058656);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `detailid` int(10) NOT NULL AUTO_INCREMENT,
  `detail_name` varchar(255) NOT NULL,
  `detail_intro` varchar(255) NOT NULL,
  `SEO_keywords` varchar(255) NOT NULL,
  `SEO_description` varchar(255) NOT NULL,
  `detail_img` varchar(255) NOT NULL,
  `detail_content` longtext NOT NULL,
  `detail_date` int(50) NOT NULL,
  `status` char(1) NOT NULL,
  `userid` int(10) NOT NULL,
  `cateid` int(10) NOT NULL,
  `labelid` int(10) NOT NULL,
  PRIMARY KEY (`detailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`detailid`, `detail_name`, `detail_intro`, `SEO_keywords`, `SEO_description`, `detail_img`, `detail_content`, `detail_date`, `status`, `userid`, `cateid`, `labelid`) VALUES
(1, 'Web onepage 01', 'Web onepage 01', 'Web onepage 01', 'Web onepage 01', '1586868453_img_5670.jpg', 'Web onepage 01', 1586787967, 'Y', 1, 1, 1),
(2, 'Web onepage 02', 'Web onepage 02', 'Web onepage 02', 'Web onepage 02', '1586868453_img_5670.jpg', 'Web onepage 02', 1586787967, 'Y', 1, 1, 2),
(3, 'Web doanh nghiep 01', 'Web doanh nghiep 01', 'Web doanh nghiep 01', 'Web doanh nghiep 01', '', 'Web doanh nghiep 01', 0, 'Y', 1, 2, 1),
(4, 'Web doanh nghiep 02', 'Web doanh nghiep 02', 'Web doanh nghiep 02', 'Web doanh nghiep 02', '', 'Web doanh nghiep 02', 0, 'Y', 2, 2, 1),
(5, 'We bán hàng 01', 'We bán hàng 01', 'We bán hàng 01', 'We bán hàng 01', '', 'We bán hàng 01', 0, 'Y', 1, 3, 1),
(6, 'We bán hàng 02', 'We bán hàng 02', 'We bán hàng 02', 'We bán hàng 02', '', 'We bán hàng 02', 0, 'Y', 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `labelid` int(10) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(255) NOT NULL,
  PRIMARY KEY (`labelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`labelid`, `label_name`) VALUES
(1, 'Du Lịch'),
(2, 'Ẩm Thực'),
(3, 'Kiến Trúc'),
(4, 'Marketing'),
(5, 'In Ấn'),
(6, 'Thời Trang');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `settingid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(150) NOT NULL,
  `setting_value` longtext NOT NULL,
  PRIMARY KEY (`settingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`settingid`, `setting_name`, `setting_value`) VALUES
(1, 'SitePref', '{"sitename":"weBox","local_timezone":"Asia\\/Ho_Chi_Minh"}'),
(2, 'NewsPref', '{"accept_file_type":"bmp,jpg,png,gif"}');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `level` int(1) unsigned NOT NULL COMMENT '1: Admin - 2: Member',
  `email` varchar(255) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`, `email`, `tel`) VALUES
(1, 'vuhoangnguyen', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 'vuhoangnguyen49@gmail.com', 974487944),
(7, 'richard', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'vuhoangnguyen040990@gmail.com', 974487944),
(11, 'nguyen', '9a3bdc603c940a18467d167af15d4c8c', 1, 'nguyen.vuhoang@gforces.auto', 974487944),
(16, 'vuhoang', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 'abc@gmail.com', 99009),
(20, 'daiha', '200820e3227815ed1756a6b531e7e0d2', 2, 'nguyen.daiha@yahoo.com', 964602940);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
