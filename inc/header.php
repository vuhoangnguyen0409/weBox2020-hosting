
<?php
// Lấy cấu hình site
require("phpnc75_platform.php");
loadLibs(array("none_uni_alias.php"));
?>

<header id="global_header">

    <div id="header_wrap">

        <!-- Start Header Menu -->

        <div class="clearfix h_tab">

            <div class="h_logo ">
                <a class="h_logo_favi" href="<?php echo MYDOMAIN;?>index.html">W</a>
                <a class="h_logo_txt" href="<?php echo MYDOMAIN;?>index.html">WebBox</a>

            </div>

            <div class="h_menu">

                <!--<input id="" type="text" placeholder="Tim Ki?m"/>-->

                <!--<a class="h_language" href="#">VN</a>-->

                <nav id="nav_header">

                    <ul>

                        <li> <a href="<?php echo MYDOMAIN;?>index.html">Trang Chủ</a> </li>
						<?php

						//Kết nối CSDL
						require("libs/connect_db.php");

						// Lấy tất cả các danh mục tin tạo thành các liên kết
						$sql = 'SELECT * FROM category where category.level=1 ORDER BY cate_name ASC';
						$query = $mysqli->query($sql);;
						$menu = array();
						while ($data = $query -> fetch_assoc()) {
							$menu[] = $data;
						}
						foreach ($menu as $item) {
							echo '
							<li><a href="/' .$item["cateid"]. '-'.noneUniAlias($item["cate_name"], true). '/index.html">' .$item["cate_name"]. '</a></li>';
						}
						?>
                        <li> <a href="<?php echo MYDOMAIN;?>bo-thuong-hieu-web-phu-quoc.html">Bộ Thương Hiệu</a> </li>
                        <li id="sub-menu"> <a onclick="return false;">Dịch Vụ Chụp Hình</a>
                            <ul>
                                <li><a href="<?php echo MYDOMAIN;?>chup-hinh-nen-trang.html">Chụp Hình Nền Trắng</a></li>
                                <li><a href="<?php echo MYDOMAIN;?>chup-hinh-thoi-trang.html">Chụp Hình Thời Trang</a></li>
                                <li><a href="<?php echo MYDOMAIN;?>chup-hinh-concept.html">Chụp Hình Concept</a></li>
                                <li><a href="<?php echo MYDOMAIN;?>chup-hinh-kien-truc.html">Chụp Hình Kiến Trúc</a></li>
                                <li><a href="<?php echo MYDOMAIN;?>chup-hinh-su-kien.html">Chụp Hình Sự Kiện</a></li>
                            </ul>
                        </li>
                        <li> <a href="<?php echo MYDOMAIN;?>tai-lieu-web-phu-quoc.html">Tài Liệu</a> </li>
                        <!--<li> <a href="<?php echo MYDOMAIN;?>tiep-thi-marketing-web-phu-quoc.html">Marketing</a> </li>-->
                        <li> <a href="<?php echo MYDOMAIN;?>bang-gia.html">Bảng Giá</a> </li>
                        <!--<li> <a href="<?php echo MYDOMAIN;?>gioi-thieu-web-phu-quoc.html">Giới Thiệu</a> </li>-->
                        <li> <a href="<?php echo MYDOMAIN;?>lien-he.html">Liên Hệ</a> </li>
                    </ul>

                </nav>

            </div>

            <div class="f_callback">
                <form id="f_callback" action="">
                    <input class="f_input_phone" type="tel" name="phone" pattern="[0-9]" required placeholder="Nhập số Phone của bạn">
                    <input class="f_submit_phone" type="submit" value="Gọi lại">
                    <label>Tư vấn viên sẽ liên hệ ngay khi nhận được yêu cầu gọi lại từ Quý Khách</label>
                </form>
            </div>

            <!--<div class="h_contact">
                <a class="h_ct_phone" href="tel:0918192395"><i class="fa fa-mobile" aria-hidden="true"></i>0918.19.23.95</a>
                <p class="h_ct_copy">&#64; WebBox Digital</p>
                <h1 class="h1_line">Thế Giới Web Chuyên Nghiệp</h1>
            </div>-->

        </div>

        <!-- End Header Menu -->



    </div>

</header>
