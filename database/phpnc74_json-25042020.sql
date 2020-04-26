-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 04:49 PM
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
(3, 'Web doanh nghiep 01', 'Web doanh nghiep 01', 'Web doanh nghiep 01', 'Web doanh nghiep 01', '', '', 'Web doanh nghiep 01', 0, 'Y', 1, 3, 1),
(4, 'Web doanh nghiep 02', 'Web doanh nghiep 02', '                                                                        Web doanh nghiep 02                                                                        ', '                                                                        Web doanh nghiep 02                                                                        ', '', '1587202342_sample-detail.jpg', 'Web doanh nghiep 02', 0, 'Y', 2, 3, 5),
(19, 'Kapee', 'Ws-Kapee', 'Thiết Kế Website Thời Trang', 'Chuyên thiết kế Website Thời Trang trên Toàn Quốc.\r\nWebsite với nhiều chức năng bán hàng trong ngành thời trang, được nhiều cửa hàng tin dùng và chọn lựa để kinh doanh Online Thời Trang                                    ', '1587224197_kapee.presslayouts_avatar.jpg', '1587224197_kapee.presslayouts_resize.jpg', '<p>Kapee là được thiết kế với trên tiêu chí nhanh, sạch, tùy biến cao và phù hợp cho tất cả các loại cửa hàng như Thời trang, Điện tử, Nội thất, Phụ kiện,... Giao diện này đi kèm với rất nhiều tính năng và biến thể: Responsive Layout, Mega Menu, Page Builder, Slider, Product Quick View, Search,...</p>', 1587224197, 'Y', 11, 2, 6),
(21, 'Boyka', 'Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da', 'Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da', 'Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da. Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn.     ', '1587544434_3-avatar.jpg', '1587544434_3.jpg', '<p>Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da. Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho cửa hàng trực tuyến của bạn.</p>', 1587544434, 'Y', 2, 2, 6),
(22, 'Boyka #2', ' Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn', ' Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn', 'Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho cửa hàng trực tuyến của bạn.', '1587546238_4-avatar.jpg', '1587546238_4.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da. Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho cửa hàng trực tuyến của bạn.</span></p>', 1587546238, 'Y', 2, 2, 6),
(23, 'Boyka #3', 'Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da', 'Web bán hàng thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến', 'Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân', '1587546689_5-vatar.jpg', '1587546689_5.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da. Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho cửa hàng trực tuyến của bạn.</span></p>', 1587546689, 'Y', 2, 2, 6),
(24, 'Boyka #4', 'Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da', 'Web bán hàng thời trang Boyka', 'Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho ', '1587546801_6-avatar.jpg', '1587546801_6.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da. Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho cửa hàng trực tuyến của bạn.</span></p>', 1587546801, 'Y', 2, 2, 6),
(25, 'Boyka #5', 'Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da', 'Web bán hàng thời trang giầy dép Boyka', 'Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho ', '1587546954_7-avtar.jpg', '1587546954_7.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Boyka - Mẫu thương mại điện tử thời trang đơn giản và đáp ứng cho cửa hàng thời trang trực tuyến, chủ yếu tập trung vào giày dép và hàng da. Boyka được thiết kế thanh lịch, đảm bảo một không gian trực tuyến tuyệt vời để hiển thị các sản phẩm của bạn. Nếu bạn muốn tạo bất kỳ cửa hàng thương mại điện tử, trang web kinh doanh, blog hoặc danh mục đầu tư cá nhân, Boyka luôn là lựa chọn phù hợp cho cửa hàng trực tuyến của bạn.</span></p>', 1587546954, 'Y', 2, 2, 7),
(26, 'Boyka #6', 'Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', 'Web bán hàng thời trang DorNo', 'Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', '1587547908_8-avatar.jpg', '1587547908_8.jpg', '<p>Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.</p>', 1587547908, 'Y', 2, 2, 6),
(27, 'DORNO #2', 'Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', 'Web Bán Hàng Thời Trang DorNo', 'Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', '1587548218_9-avatar.jpg', '1587548218_9.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.</span></p>', 1587548218, 'Y', 2, 2, 8),
(28, 'DORNO #3', 'Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', 'Web Bán Hàng Trang Sức DorNo', 'Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', '1587626232_10-avatar.jpg', '1587626232_10.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.</span></p>', 1587626232, 'Y', 2, 2, 9),
(29, 'DORNO #4', 'Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', 'Web Bán Hàng Thời Trang DORNO #4', 'Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.', '1587626293_11-avatar.jpg', '1587626293_11.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Dorno - Web bán hàng Thương mại điện tử Thời trang chủ yếu tập trung vào giày dép và đồ da. Trang web này hoàn toàn đáp ứng cho tất cả các loại thiết bị. Ngoài ra, trang web đẹp và độc đáo này chắc chắn sẽ thu hút khách truy cập.</span></p>', 1587626293, 'Y', 2, 2, 6),
(31, 'ELIZA #1', 'Eliza - Mẫu website thời trang nhanh và thân thiện với người dùng cho cửa hàng điện tử của bạn. Đáp ứng và hoạt động hoàn hảo trên tất cả các thiết bị. Thiết kế sáng tạo dễ sử dụng cho những người dùng không rành về công nghệ.', 'Web Bán Hàng Túi Xách Eliza', 'Eliza - Mẫu website thời trang nhanh và thân thiện với người dùng cho cửa hàng điện tử của bạn. Đáp ứng và hoạt động hoàn hảo trên tất cả các thiết bị. Thiết kế sáng tạo dễ sử dụng cho những người dùng không rành về công nghệ.', '1587627104_12-avtar.jpg', '1587627104_12.jpg', '<p>Eliza - Mẫu website thời trang nhanh và thân thiện với người dùng cho cửa hàng điện tử của bạn. Đáp ứng và hoạt động hoàn hảo trên tất cả các thiết bị. Thiết kế sáng tạo dễ sử dụng cho những người dùng không rành về công nghệ.</p>', 1587627104, 'Y', 2, 2, 10),
(32, 'OLSON #1', 'Olson - Mẫu Web thời trang tuyệt vời để xây dựng trang web thương mại điện tử của bất kỳ loại hình kinh doanh nào. Bạn có thể bán Sản phẩm thời trang, Thời trang nam, Thời trang nữ, Sản phẩm trẻ em, Sản phẩm may sẵn, Giày, Kính râm, Đồng hồ, Mỹ phẩm, Điện', 'Web Bán Hàng Thời Trang OLSON #1', 'Olson - Mẫu Web thời trang tuyệt vời để xây dựng trang web thương mại điện tử của bất kỳ loại hình kinh doanh nào. Bạn có thể bán Sản phẩm thời trang, Thời trang nam, Thời trang nữ, Sản phẩm trẻ em, Sản phẩm may sẵn, Giày, Kính râm, Đồng hồ, Mỹ phẩm, Điện', '1587627959_13-avatar.jpg', '1587627959_13.jpg', '<p>Olson - Mẫu Web thời trang tuyệt vời để xây dựng trang web thương mại điện tử của bất kỳ loại hình kinh doanh nào. Bạn có thể bán Sản phẩm thời trang, Thời trang nam, Thời trang nữ, Sản phẩm trẻ em, Sản phẩm may sẵn, Giày, Kính râm, Đồng hồ, Mỹ phẩm, Điện tử, Tiện ích, Nội thất và tất cả các sản phẩm của nhà cung cấp khác sử dụng mẫu Olson HTML.</p>\r\n\r\n<p>Ngoài ra, Olson là một mẫu đáp ứng 100%. phù hợp với tất cả các loại thiết bị. Tất cả các khía cạnh cần thiết để đối phó với ngành Thương mại điện tử đều có sẵn trong mẫu này. Thiết kế và trang phục của mẫu này là hoàn toàn độc đáo và sáng tạo. Sử dụng mẫu được tối ưu hóa SEO này để thu hút khách truy cập tiềm năng và cung cấp cho họ những sản phẩm chất lượng. Nó sẽ làm và không thể ngăn cản được ’bạn.</p>', 1587627959, 'Y', 2, 2, 6),
(33, 'OLSON #2', 'Olson - Mẫu Web thời trang tuyệt vời để xây dựng trang web thương mại điện tử của bất kỳ loại hình kinh doanh nào. Bạn có thể bán Sản phẩm thời trang, Thời trang nam, Thời trang nữ, Sản phẩm trẻ em, Sản phẩm may sẵn, Giày, Kính râm, Đồng hồ, Mỹ phẩm, Điện', 'Web Bán Hàng Thời Trang OLSON #1', 'Olson - Mẫu Web thời trang tuyệt vời để xây dựng trang web thương mại điện tử của bất kỳ loại hình kinh doanh nào. Bạn có thể bán Sản phẩm thời trang, Thời trang nam, Thời trang nữ, Sản phẩm trẻ em, Sản phẩm may sẵn, Giày, Kính râm, Đồng hồ, Mỹ phẩm, Điện', '1587628057_14-avatar.jpg', '1587628057_14.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Olson - Mẫu Web thời trang tuyệt vời để xây dựng trang web thương mại điện tử của bất kỳ loại hình kinh doanh nào. Bạn có thể bán Sản phẩm thời trang, Thời trang nam, Thời trang nữ, Sản phẩm trẻ em, Sản phẩm may sẵn, Giày, Kính râm, Đồng hồ, Mỹ phẩm, Điện tử, Tiện ích, Nội thất, ...</span></p>', 1587628057, 'Y', 2, 2, 6),
(34, 'REID #1', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', 'Web Bán Hàng Thời Trang REID #1', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', '1587628456_15-avatar.jpg', '1587628456_15.jpg', '<p>Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Giày, Kính râm, Thời trang mùa đông, Phụ kiện du lịch, Máy ảnh, Sản phẩm điện, Đồng hồ đeo tay và hầu hết tất cả các sản phẩm bán lẻ khác.</p>', 1587628456, 'Y', 2, 2, 6),
(35, 'REID #2', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', 'Web Bán Hàng Thời Trang REID #2', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', '1587629845_16-avatar.jpg', '1587629845_16.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Giày, Kính râm, Thời trang mùa đông, Phụ kiện du lịch, Máy ảnh, Sản phẩm điện, Đồng hồ đeo tay và hầu hết tất cả các sản phẩm bán lẻ khác.</span></p>', 1587629845, 'Y', 2, 2, 7),
(36, 'REID #3', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', 'Web Bán Hàng Thời Trang REID #3', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', '1587632216_17-avatar.jpg', '1587632216_17.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Giày, Kính râm, Thời trang mùa đông, Phụ kiện du lịch, Máy ảnh, Sản phẩm điện, Đồng hồ đeo tay và hầu hết tất cả các sản phẩm bán lẻ khác.</span></p>', 1587632216, 'Y', 2, 2, 6),
(37, 'REID #4', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', 'Web Bán Hàng Thời Trang REID #4', 'Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Gi', '1587632259_18-avatar.jpg', '1587632259_18.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Reid - Mẫu Web thương mại điện tử thời trang sáng tạo đáng kinh ngạc để làm cho các trang web bán sản phẩm thời trang trực tuyến. Reid là một mẫu trang web sáng tạo mà bạn có thể sử dụng để bán thời trang trẻ em, Thời trang nam, Thời trang nữ, May sẵn, Giày, Kính râm, Thời trang mùa đông, Phụ kiện du lịch, Máy ảnh, Sản phẩm điện, Đồng hồ đeo tay và hầu hết tất cả các sản phẩm bán lẻ khác.</span></p>', 1587632259, 'Y', 2, 2, 6),
(38, 'EMPIRE', 'Empire - Mẫu web thương mại điện tử tối giản là một thiết kế thanh lịch và sạch sẽ - thích hợp để bán quần áo, thời trang, thời trang cao cấp, thời trang nam, thời trang nữ, phụ kiện, kỹ thuật số, trẻ em, đồng hồ, trang sức, giày dép, trẻ em, đồ nội thất,', 'Web Bán Hàng Thời Trang EMPIRE', 'Empire - Mẫu web thương mại điện tử tối giản là một thiết kế thanh lịch và sạch sẽ - thích hợp để bán quần áo, thời trang, thời trang cao cấp, thời trang nam, thời trang nữ, phụ kiện, kỹ thuật số, trẻ em, đồng hồ, trang sức, giày dép, trẻ em, đồ nội thất,', '1587632365_19-avatar.jpg', '1587632365_19.jpg', '<p>Empire - Mẫu web thương mại điện tử tối giản là một thiết kế thanh lịch và sạch sẽ - thích hợp để bán quần áo, thời trang, thời trang cao cấp, thời trang nam, thời trang nữ, phụ kiện, kỹ thuật số, trẻ em, đồng hồ, trang sức, giày dép, trẻ em, đồ nội thất, thể thao, vv .. Nó có chiều rộng đáp ứng đầy đủ tự động điều chỉnh theo bất kỳ kích thước hoặc độ phân giải màn hình nào.</p>', 1587632365, 'Y', 2, 2, 6),
(39, 'EMPIRE #2', 'Empire - Mẫu web thương mại điện tử tối giản là một thiết kế thanh lịch và sạch sẽ - thích hợp để bán quần áo, thời trang, thời trang cao cấp, thời trang nam, thời trang nữ, phụ kiện, kỹ thuật số, trẻ em, đồng hồ, trang sức, giày dép, trẻ em, đồ nội thất,', 'Web Bán Hàng Thời Trang EMPIRE #2', 'Empire - Mẫu web thương mại điện tử tối giản là một thiết kế thanh lịch và sạch sẽ - thích hợp để bán quần áo, thời trang, thời trang cao cấp, thời trang nam, thời trang nữ, phụ kiện, kỹ thuật số, trẻ em, đồng hồ, trang sức, giày dép, trẻ em, đồ nội thất,', '1587632415_20-avatar.jpg', '1587632415_20.jpg', '<p><span style=\"font-family:montserrat; font-size:14px\">Empire - Mẫu web thương mại điện tử tối giản là một thiết kế thanh lịch và sạch sẽ - thích hợp để bán quần áo, thời trang, thời trang cao cấp, thời trang nam, thời trang nữ, phụ kiện, kỹ thuật số, trẻ em, đồng hồ, trang sức, giày dép, trẻ em, đồ nội thất, thể thao, vv .. Nó có chiều rộng đáp ứng đầy đủ tự động điều chỉnh theo bất kỳ kích thước hoặc độ phân giải màn hình nào.</span></p>', 1587632415, 'Y', 2, 2, 6),
(40, 'BOUTIQUE #1', 'Mẫu giao diện web bán hàng thời trang sáng tạo thân thiện người dùng và tương thích với tất cả các thiết bị di động và máy tính. Bạn có thể sử dụng với nhiều lĩnh vực Thời Trang khác nhau : Quần Áo Nam, Quần Áo Nữ, Trang Sức, Giầy Dép, Túi Xách ,.... ', 'Web Bán Hàng Thời Trang BOUTIQUE #1', 'Mẫu giao diện web bán hàng thời trang sáng tạo thân thiện người dùng và tương thích với tất cả các thiết bị di động và máy tính. Bạn có thể sử dụng với nhiều lĩnh vực Thời Trang khác nhau : Quần Áo Nam, Quần Áo Nữ, Trang Sức, Giầy Dép, Túi Xách ,.... ', '1587632644_21-avatar.jpg', '1587632644_21.jpg', '<p>Mẫu giao diện web bán hàng thời trang sáng tạo thân thiện người dùng và tương thích với tất cả các thiết bị di động và máy tính. Bạn có thể sử dụng với nhiều lĩnh vực Thời Trang khác nhau : Quần Áo Nam, Quần Áo Nữ, Trang Sức, Giầy Dép, Túi Xách ,.... </p>', 1587632644, 'Y', 2, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `labelid` int(10) NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `label_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`labelid`, `label_name`, `label_img`) VALUES
(1, 'Du Lịch', '1587733260_1.jpg'),
(2, 'Ẩm Thực', '1587733260_1.jpg'),
(3, 'Kiến Trúc', '1587733260_1.jpg'),
(4, 'Marketing', '1587733260_1.jpg'),
(5, 'In Ấn', '1587733260_1.jpg'),
(6, 'Thời Trang', '1587733260_1.jpg'),
(7, 'Giầy ', '1587733260_1.jpg'),
(8, 'Công Nghệ', '1587733260_1.jpg'),
(9, 'Trang Sức', '1587733260_1.jpg'),
(10, 'Túi Xách', '1587733260_1.jpg'),
(11, 'Mỹ Phẩm', '1587733260_1.jpg'),
(12, 'Rau Sạch', '1587733260_1.jpg'),
(13, 'Rau Củ Quả', '1587733260_1.jpg'),
(14, 'Bánh ngọt', '1587733260_1.jpg'),
(15, 'Rau Củ Qủa Sạch', '1587733260_1.jpg'),
(16, 'Thức ăn nhanh', '1587733260_1.jpg'),
(18, 'giảm giá 1', '1587819952_4.png');

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
  `gender` int(1) NOT NULL COMMENT '1: Male - 2: Female',
  `email` varchar(255) DEFAULT NULL,
  `tel` text,
  `birthday` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`, `gender`, `email`, `tel`, `birthday`, `address`, `avatar`) VALUES
(1, 'Vũ Hoàng Nguyên', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 1, 'vuhoangnguyen49@gmail.com', '0974487944', '04/09/1990', 'quận 12 TPHCM', '0'),
(2, 'Nguyễn Đại Hà', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 1, 1, 'nguyen.daiha@yahoo.com', '0964602940', '08/01/1990', 'quận Phú Nhuận TPHCM', '0'),
(19, 'q', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 2, 1, 'bedieu11h@yahoo.com', '020', '05/09/1990', 'ho chi minh', '1587825784_a.jpg');

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
  MODIFY `cateid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `detailid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `label`
--
ALTER TABLE `label`
  MODIFY `labelid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `settingid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
