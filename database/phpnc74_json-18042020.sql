-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 04:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpnc74_json-hosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cateid` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(100) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `cate_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `comments` (
  `commentid` int(10) UNSIGNED NOT NULL,
  `comment_content` text NOT NULL,
  `newsid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `comment_date` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `detail` (
  `detailid` int(10) NOT NULL,
  `detail_name` varchar(255) NOT NULL,
  `detail_intro` varchar(255) NOT NULL,
  `SEO_keywords` varchar(255) NOT NULL,
  `SEO_description` varchar(255) NOT NULL,
  `detail_feature` varchar(255) NOT NULL,
  `detail_img` varchar(255) NOT NULL,
  `detail_content` longtext NOT NULL,
  `detail_date` int(50) NOT NULL,
  `status` char(1) NOT NULL,
  `userid` int(10) NOT NULL,
  `cateid` int(10) NOT NULL,
  `labelid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`detailid`, `detail_name`, `detail_intro`, `SEO_keywords`, `SEO_description`, `detail_feature`, `detail_img`, `detail_content`, `detail_date`, `status`, `userid`, `cateid`, `labelid`) VALUES
(1, 'Web onepage 01', 'Web onepage 01', 'Web onepage 01', 'Web onepage 01', '', '1586868453_img_5670.jpg', 'Web onepage 01', 1586787967, 'Y', 1, 1, 1),
(2, 'Web onepage 02', 'Web onepage 02', '                                    Web onepage 02                                    ', '                                    Web onepage 02                                    ', '', 'abc.jpg', 'Web onepage 02', 1586787967, 'Y', 1, 1, 2),
(3, 'Web doanh nghiep 01', 'Web doanh nghiep 01', 'Web doanh nghiep 01', 'Web doanh nghiep 01', '', '', 'Web doanh nghiep 01', 0, 'Y', 1, 3, 1),
(4, 'Web doanh nghiep 02', 'Web doanh nghiep 02', '                                                                        Web doanh nghiep 02                                                                        ', '                                                                        Web doanh nghiep 02                                                                        ', '', '1587202342_sample-detail.jpg', 'Web doanh nghiep 02', 0, 'Y', 2, 3, 5),
(5, 'We bán hàng 01', 'We bán hàng 01', '                                                                                                                                                We bán hàng 01                                                                                                 ', '                                                                                                                                                We bán hàng 01                                                                                                 ', '', '1587201976_sample-detail.jpg', 'We bán hàng 01', 0, 'Y', 1, 2, 1),
(6, 'We bán hàng 02', 'We bán hàng 02', '                                    We bán hàng 02                                    ', '                                    We bán hàng 02                                    ', '', '1587201806_sample-detail.jpg', 'We bán hàng 02', 0, 'Y', 1, 2, 2),
(8, 'bán hàng 03', 'bán hàng 03', 'bán hàng 03', '  bán hàng 03                                  ', '', '1587202856_sample-detail.jpg', '<p>bán hàng 03</p>', 1587202856, 'Y', 1, 2, 4),
(18, 'aaa', 'aaa', 'aaa', 'aaa', '1587218529_travel_demo_bg_1.jpg', '1587218529_detail01.jpg', '<p>aaa</p>', 1587218529, 'Y', 1, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `labelid` int(10) NOT NULL,
  `label_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `setting` (
  `settingid` int(10) UNSIGNED NOT NULL,
  `setting_name` varchar(150) NOT NULL,
  `setting_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`settingid`, `setting_name`, `setting_value`) VALUES
(1, 'SitePref', '{\"sitename\":\"weBox\",\"local_timezone\":\"Asia\\/Ho_Chi_Minh\"}'),
(2, 'NewsPref', '{\"accept_file_type\":\"bmp,jpg,png,gif\"}');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `level` int(1) UNSIGNED NOT NULL COMMENT '1: Admin - 2: Member',
  `email` varchar(255) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`, `email`, `tel`) VALUES
(1, 'vuhoangnguyen', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 'vuhoangnguyen49@gmail.com', 974487944),
(2, 'daiha', '200820e3227815ed1756a6b531e7e0d2', 2, 'nguyen.daiha@yahoo.com', 964602940);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detailid`);

--
-- Indexes for table `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`labelid`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`settingid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cateid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `detailid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `label`
--
ALTER TABLE `label`
  MODIFY `labelid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `settingid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
