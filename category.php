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
// Lấy cấu hình site
//require("phpnc75_platform.php");
//loadLibs(array("none_uni_alias.php"));

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
                    </div>
                </div>
                <!-- End Slider -->
				
				<?php
		
						//Kết nối CSDL
						require("libs/connect_db.php");

						// Lấy tất cả các danh mục tin tạo thành các liên kết
						$sql = 'SELECT * FROM category where category.level=2 AND category.parent_id="' .$id. '" ORDER BY cateid DESC';
						$query = $mysqli->query($sql);;
						$menu = array();
						while ($data = $query -> fetch_assoc()) {
							$menu[] = $data;
						}
						foreach ($menu as $item) {
							echo '
							<li><a href="' .$item["cateid"]. '-' .noneUniAlias($item["cate_name"], true). '/index.html">' .$item["cate_name"]. '</a></li>';
						}
				?>


                <!-- Start Filter Isotope -->
                <div class="isotope_wrap clearfix">
                    <h3 class="s-all"><a class="isotope_button isotope_all" data-filter="*"><span>Tất Cả</span></a></h3>
                    <h3 class="s-food"><a class="isotope_button" data-filter=".food"><span>Ẩm Thực</span></a></h3>
                    <h3 class="s-shop"><a class="isotope_button" data-filter=".shop"><span>Thời Trang</span></a></h3>
                    <h3 class="s-travel"><a class="isotope_button" data-filter=".travel"><span>Du Lịch</span></a></h3>
                    <h3 class="s-edu"><a class="isotope_button" data-filter=".edu"><span>Giáo Dục</span></a></h3>
                    <h3 class="s-arc"><a class="isotope_button" data-filter=".arc"><span>Kiến Trúc</span></a></h3>
                    <!--<a class="isotope_button" data-filter=".services">Services</a>-->
                </div>
                <!-- End Filter Isotope -->

                <!-- Start Filter Grip -->
                <div class="isotope_grip_wrap clearfix">
                    <div class="isotope_grip">
                        <!-- Start Travel Item -->
                        <?php include('inc/html_travel.php');?>
                        <!-- End Travel Item -->

                        <!-- Start Shop Item -->
                        <?php include('inc/html_shop.php');?>
                        <!-- End Shop Item -->

                        <!-- Start Food Item -->
                        <?php include('inc/html_food.php');?>
                        <!-- End Food Item -->

                        <!-- Start Other Item -->
                        <?php include('inc/html_other.php');?>
                        <!-- End Other Item -->
                    </div>
                </div>
                <!-- End Filter Grip -->
            </div>
            <!-- End Main -->



        </div>



    </div>



    <!-- End Content Wrap -->







<?php include('inc/footer.php');?>