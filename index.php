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
                        <div class="search-wrap">
                            <input class="search" autocomplete="off" type="text" placeholder="Tìm kiếm" value="" />
                            <div class="result"></div>
                        </div>

                        <p class="slider-txt">" Thiết kế Web chưa bao giờ đơn giản đến vậy " - <a href="/kho-giao-dien-web-phu-quoc.html" class="link">Chọn Website ></a></p>
                    </div>
                </div>
                <!-- End Slider -->

                <!-- Start Home Services -->
                 <div id="home-sev" class="home-sev-wrap">
                    <div class="home-sev-inner">
                        <div class="home-sev-item sev-marketing">
                            <a href="#" class="link"><span>Marketing</span></a>
                        </div>
                        <div class="home-sev-item sev-photo">
                            <a href="#" class="link"><span>Chụp Hình</span></a>
                        </div>
                        <div class="home-sev-item sev-design">
                            <a href="#" class="link"><span>Thiết Kế</span></a>
                        </div>
                        <div class="home-sev-item sev-print">
                            <a href="#" class="link"><span>In Ấn</span></a>
                        </div>
                    </div>
                </div>
                <!-- End Home Services -->


                <!-- Start Home Wrap -->
                <div class="home-wrap">

                    <!-- Start Home List Business Web -->
                    <div id="home-list" class="home-list-wrap">
                        <div class="home-list-ct">
                            <h2 class="h2_line">Website One Page<a class="link" href="<?php echo $siteURL?>/1-web-onepage/index.html">Xem chi tiết ></a></h2>
                            <div class="home-slider onepage owl-carousel">
                                <?php
                                    $sql = 'SELECT * FROM detail as d, category as c WHERE d.cateid=c.cateid AND d.cateid=1 AND d.status="Y" ORDER BY detailid DESC LIMIT 6';
                                    $query = $mysqli->query($sql);
                                    while ($data = $query -> fetch_assoc()) {
                                        $link = '/' .$data["cateid"]. '-' .noneUniAlias($data["cate_name"], true). '/' .$data["detailid"]. '-' .noneUniAlias($data["detail_name"], true). '.html';
                                        echo '<div class="home-slider-item">

                                            <a class="home-slider-item-link" href="'.$link.'">

                                                <img src="/data/detail_img/'.$data["detail_feature"].'" alt="#" />

                                                <span class="catalog">'.$data["detail_name"].'</span>

                                                <span class="code">'.substr($data["detail_intro"],0,120).'...</span>

                                            </a>

                                        </div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- End Home List Business Web -->

                    <!-- Start Home List Shop Web -->
                    <div id="home-list" class="home-list-wrap">
                        <div class="home-list-ct">
                            <h2 class="h2_line">Website Bán Hàng<a class="link" href="<?php echo $siteURL?>/2-web-ban-hang/index.html">Xem chi tiết ></a></h2>
                            <div class="home-slider banhang owl-carousel">
                                <?php
                                    $sql = 'SELECT * FROM detail as d, category as c WHERE d.cateid=c.cateid AND d.cateid=2 AND d.status="Y" ORDER BY detailid DESC LIMIT 6';
                                    $query = $mysqli->query($sql);
                                    while ($data = $query -> fetch_assoc()) {
                                        $link = '/' .$data["cateid"]. '-' .noneUniAlias($data["cate_name"], true). '/' .$data["detailid"]. '-' .noneUniAlias($data["detail_name"], true). '.html';
                                        echo '<div class="home-slider-item">
                                            <a class="home-slider-item-link" href="'.$link.'">
                                                <img src="/data/detail_img/'.$data["detail_feature"].'" alt="#" />
                                                <span class="catalog">'.$data["detail_name"].'</span>
                                                <span class="code">'.substr($data["detail_intro"],0,120).'...</span>
                                            </a>
                                        </div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Home List Shop Web -->

                    <!-- Start Home List Business Web -->
                    <div id="home-list" class="home-list-wrap">
                        <div class="home-list-ct">
                            <h2 class="h2_line">Website Doanh Nghiệp<a class="link" href="<?php echo $siteURL?>/3-web-doanh-nghiep/index.html">Xem chi tiết ></a></h2>
                            <div class="home-slider doanhnghiep owl-carousel">
                                <?php
                                    $sql = 'SELECT * FROM detail as d, category as c WHERE d.cateid=c.cateid AND d.cateid=3 AND d.status="Y" ORDER BY detailid DESC LIMIT 6';
                                    $query = $mysqli->query($sql);
                                    while ($data = $query -> fetch_assoc()) {
                                        $link = '/' .$data["cateid"]. '-' .noneUniAlias($data["cate_name"], true). '/' .$data["detailid"]. '-' .noneUniAlias($data["detail_name"], true). '.html';
                                        echo '<div class="home-slider-item">
                                            <a class="home-slider-item-link" href="'.$link.'">
                                                <img src="/data/detail_img/'.$data["detail_feature"].'" alt="#" />
                                                <span class="catalog">'.$data["detail_name"].'</span>
                                                <span class="code">'.substr($data["detail_intro"],0,120).'...</span>
                                            </a>
                                        </div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Home List Business Web -->
                </div>


            </div>
        </div>
    </div>
    <!-- End Content Wrap -->
    <div class="voucher">	<div class="voucherBox">		<p class="close">x</p>		<h2>Get voucher</h2>		<form method="post" action="">			<input type="text" name="fone" placeholder="sềEđiện thoại của bạn">			<input type="submit" name="send">			<input type="image" src="img/common/Send_mail.png" name="getVoucher">		</form>				<p class="received">Bạn đã nhận voucher rồi <span class="close">x</span></p>	</div></div>
    <?php include('inc/footer.php');?>
