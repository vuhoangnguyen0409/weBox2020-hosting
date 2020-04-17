<!--
                              ____
          \ \  /   \  / /   /      \
           \ \/ / \ \/ /   |  |  |  |
            \__/   \__/     \ ____ /

    DESIGN BY WEBBOX | THIETKEWEBPHUQUOC.COM
    AUTHOR : NGUYEN DAI HA & VU HOANG NGUYEN
    WEBSITE: WWW.THIETKEWEBPHUQUOC.COM
-->



<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8"/>
	<meta http-equiv="content-type" content="text/html" />
    <title>Trang Chủ | Thiết Kế Web Chuyên Nghiệp Tại Phú Quốc</title>
	<meta name="author" content="Nguyễn Đại Hà | Vũ Hoàng Nguyên" />
    <meta name="description" content="Thiết kế Website chuyên nghiệp đẳng cấp tại Phú Quốc đa đạng các lĩnh vực nhà hàng, khách sạn, ẩm thuật, du lịch, bán hàng.... với đội ngũ nhân viên chuyên nghiệp sẵn sàng hỗ trợ 24/7 mọi lúc."/>
    <meta name="keywords" content="Thiết Kế Website Tại Phú Quốc"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=5,user-scalable=yes"/>
    <meta property="og:url"                content="http://www.thietkewebphuquoc.com/index.html" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Thiết Kế Web Chuyên Nghiệp Tại Phú Quốc | Trang Chủ" />
    <meta property="og:description"        content="WebBox chuyên thiết kế website chuyên nghiệp đẳng cấp tại Phú Quốc đa đạng các lĩnh vực nhà hàng, khách sạn, ẩm thuật, du lịch, bán hàng.... với đội ngũ nhân viên chuyên nghiệp sẵn sàng hỗ trợ 24/7 mọi lúc." />
    <meta property="og:image"              content="http://www.thietkewebphuquoc.com/img/main_index.jpg" />
	<?php include('inc/head.php');?>
	<!--<link rel="stylesheet" href="css/normalize.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">-->

</head>

<body>
    <?php include('inc/header.php');?>




    <!-- Start Content Wrap -->
    <div id="contents_wrap">
        <div id="contents">

    <div id="main_index">

                <!-- Start Slider -->
                <div id="slider" class="slider-wrap home-slider-bg">
                    <div class="slider-ct">
                        <h1 class="h1_line">Chọn Giao Diện Website</h1>
                        <div class="search-wrap"><input class="search" placeholder="Tìm kiếm" value="" /></div>
                        <p class="slider-txt">" Thiết kế Web chưa bao giờ đơn giản đến vậy " - <a href="/kho-giao-dien-web-phu-quoc.html" class="link">Chọn Website ></a></p>
                    </div>
                </div>
                <!-- End Slider -->

                <!-- Start Home Services -->
                 <?php include('inc/home-list-svr.php')?>
                <!-- End Home Services -->


                <!-- Start Home Wrap -->
                <div class="home-wrap">

                    <!-- Start Home List Business Web -->
                    <?php include('inc/home-list-one-page-web.php')?>
                    <!-- End Home List Business Web -->

                    <!-- Start Home List Shop Web -->
                    <?php include('inc/home-list-shop-web.php')?>
                    <!-- End Home List Shop Web -->

                    <!-- Start Home List Business Web -->
                    <?php include('inc/home-list-bus-web.php')?>
                    <!-- End Home List Business Web -->



                </div>


            </div>
        </div>
    </div>
    <!-- End Content Wrap -->
    <div class="voucher">	<div class="voucherBox">		<p class="close">x</p>		<h2>Get voucher</h2>		<form method="post" action="">			<input type="text" name="fone" placeholder="sềEđiện thoại của bạn">			<input type="submit" name="send">			<input type="image" src="img/common/Send_mail.png" name="getVoucher">		</form>				<p class="received">Bạn đã nhận voucher rồi <span class="close">x</span></p>	</div></div>
	';

    <?php include('inc/footer.php');?>