<!--

                              ____

          \ \  /   \  / /   /      \

           \ \/ / \ \/ /   |  |  |  |

            \__/   \__/     \ ____ /



    DESIGN BY WEBBOX | THIETKEWEBPHUQUOC.COM

    AUTHOR : NGUYEN DAI HA & VU HOANG NGUYEN

    WEBSITE: WWW.THIETKEWEBPHUQUOC.COM

-->

<?php

// Chuẩn bị các giá trị
if (!isset($_GET["id"])) {
    header("location: index.php");
    exit();
}
$id = $_GET["id"];
//var_dump($id);
//die();
?>

<!DOCTYPE HTML>



<html>

<head>



    <meta charset="utf-8"/>
	<meta http-equiv="content-type" content="text/html" />
    <title>Kho Giao diện Website | WebBox</title>
	<meta name="author" content="Nguyễn Đại Hà | Vũ Hoàng Nguyên" />
    <meta name="description" content="Kho giao diện thiết kế Website đa dạng và đẳng cấp tại Phú Quốc. Webbox cung cấp Website chuẩn SEO, tích hợp nhiều tính năng hiện đại nhất với các giao điện bắt mắt người dùng và đặc biệt tốc độ load nhanh."/>
    <meta name="keywords" content="Kho Giao Diện Thiết Kế Web Phú Quốc, Kho Giao Dien Thiet Ke Web Phu Quoc, Phú Quốc kho giao diện thiết kế web, Kho Giao Diện Thiết Kế Web Tại Phú Quốc"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=5,user-scalable=yes"/>
    <meta property="og:url"                content="http://www.thietkewebphuquoc.com/kho-giao-dien-web-phu-quoc.html" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Kho Giao Diện Website | Thiết Kế Web Phú Quốc" />
    <meta property="og:description"        content="Kho giao diện thiết kế Website đa dạng và đẳng cấp tại Phú Quốc. Webbox cung cấp Website chuẩn SEO, tích hợp nhiều tính năng hiện đại nhất với các giao điện bắt mắt người dùng và đặc biệt tốc độ load nhanh." />
    <meta property="og:image"              content="http://www.thietkewebphuquoc.com/img/common/bg-branding.jpg" />
	<?php include('inc/head.php');?>



</head>



<body>



    <?php include('inc/header.php');?>

    <!-- Start Content Wrap -->
    <div id="contents_wrap">

        <div id="contents">

            <!-- Start Main -->

            <div id="main" class="web_wrap">

                <!-- Start Slider -->
                <div id="slider" class="sub-slider slider-wrap web-slider-bg">
                    <div class="slider-ct">
                        <h1 class="h1_line">Giao Diện Web OnePage</h1>
                        <div class="cate-search">
                            <div class="search-wrap">
                                <input class="search" autocomplete="off" type="text" placeholder="Tìm kiếm..." value="" />
                                <div class="result"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Slider -->



                <!-- Start Filter Isotope -->
                
                    
                <div class="sp-filter">
                    <div class="toogle-close-filter"></div>
                    <p class="txt open-close"><i class="fa fa-filter"></i><span>Danh Mục </span><em>: Tất Cả</em></p>
                    <div class="isotope_wrap clearfix">
                        <h4 class="h6-line">Danh Mục :</h4>
                        <div class="isotope_wrap_inner">
                            <div class="label_wrap all">
                                <a class="isotope_button isotope_all" data-filter="*">
                                    <p class="label_txt">Tất Cả</p>
                                </a>
                            </div>
                            <?php
        
            						//Kết nối CSDL
            						require("libs/connect_db.php");
        
            						// Lấy tất cả các danh mục tin tạo thành các liên kết
            						$sql = 'SELECT * FROM label ORDER BY labelid ASC';
            						$query = $mysqli->query($sql);;
            						$menu = array();
            						while ($data = $query -> fetch_assoc()) {
            							$menu[] = $data;
            						}
            						foreach ($menu as $item) {
                                        $label = str_replace(' ', '', noneUniAlias($item["label_name"]));
                                        echo '<div class="label_wrap"><a class="isotope_button" data-filter=".' .$label. '"><p class="label_txt">'.$item["label_name"].'</p></a></div>';
            						}
            				?>
                        </div>
                    </div>   
                </div>


                
                <!-- Start Filter Grip -->
                <div class="isotope_grid">
                    <?php
                    $sql = 'SELECT * FROM detail as d, category as c, label as l WHERE d.cateid=c.cateid AND d.labelid=l.labelid AND d.status="Y" AND d.cateid="' .$id. '" ORDER BY detailid DESC';
        		    $query = $mysqli->query($sql);
    				while ($data = $query -> fetch_assoc()) {
                        $link = '/' .$data["cateid"]. '-' .noneUniAlias($data["cate_name"], true). '/' .$data["detailid"]. '-' .noneUniAlias($data["detail_name"], true). '.html';
                        $label = str_replace(' ', '', noneUniAlias($data["label_name"]));

                        echo '<div class="isotope_item '.$label.'">
                        <div class="isotope_inner">
                            <div class="isotope_img">
                                <a href="'.$link.'"><img src="/data/detail_img/'.$data["detail_feature"].'" alt="#" /></a>
                            </div>
                            <div class="isotope_txt">
                                <a href="'.$link.'" class="isotope_link"><h4 class="title">'.$data["detail_name"].'</h4><span class="code">'.substr($data["detail_intro"],0,143).'. . .</span></a>
                            </div>
                            </div>
                        </div>';
    				}
                    ?>
                </div>
                <!-- End Filter Grip -->
            </div>
            <!-- End Main -->
        </div>
    </div>



    <!-- End Content Wrap -->

<?php include('inc/footer.php');?>
