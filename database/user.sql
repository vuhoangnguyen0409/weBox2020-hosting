-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 03:42 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `level` int(1) UNSIGNED NOT NULL COMMENT '1: Admin - 2: Member',
  `gender` int(1) NOT NULL COMMENT '1: Male - 2: Female',
  `email` varchar(255) DEFAULT NULL,
  `tel` text,
  `birthday` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`, `gender`, `email`, `tel`, `birthday`, `address`) VALUES
(1, 'Vũ Hoàng Nguyên', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 1, 'vuhoangnguyen49@gmail.com', '0974487944', '04/09/1990', 'quận 12 TPHCM'),
(2, 'Nguyễn Đại Hà', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 1, 'nguyen.daiha@yahoo.com', '0964602940', '08/01/1990', 'quận Phú Nhuận TPHCM'),
(8, 'Hoàng', 'c69874b898abb180ac71bd99bc16f8fb', 1, 2, 'bedieu11h@yahoo.com', '0974487945', '05/09/1990', 'ho chi minh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
