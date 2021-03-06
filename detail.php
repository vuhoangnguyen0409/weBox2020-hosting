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
?>

<!DOCTYPE HTML>

<html>
<head>
    <meta charset="utf-8"/>
	<meta http-equiv="content-type" content="text/html" />
    <title>Chi Tiết | Thiết Kế Web Chuyên Nghiệp Tại Phú Quốc</title>
	<meta name="author" content="Nguyễn Đại Hà | Vũ Hoàng Nguyên" />
    <meta name="description" content="Thiết kế Website chuyên nghiệp đẳng cấp tại Phú Quốc đa đạng các lĩnh vực nhà hàng, khách sạn, ẩm thuật, du lịch, bán hàng.... với đội ngũ nhân viên chuyên nghiệp sẵn sàng hỗ trợ 24/7 mọi lúc."/>
    <meta name="keywords" content="Thiết Kế Website Tại Phú Quốc"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=5,user-scalable=yes"/>
    <meta property="og:url"                content="http://www.thietkewebphuquoc.com/detail.html" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Thiết Kế Web Chuyên Nghiệp Tại Phú Quốc | Trang Chủ" />
    <meta property="og:description"        content="WebBox chuyên thiết kế website chuyên nghiệp đẳng cấp tại Phú Quốc đa đạng các lĩnh vực nhà hàng, khách sạn, ẩm thuật, du lịch, bán hàng.... với đội ngũ nhân viên chuyên nghiệp sẵn sàng hỗ trợ 24/7 mọi lúc." />
    <meta property="og:image"              content="http://www.thietkewebphuquoc.com/img/common/bg-branding.jpg" />

	<?php include('inc/head.php');?>

</head>


<body>

    <?php include('inc/header.php');?>
    <!-- Start Content Wrap -->
    <div id="contents_wrap">
        <div id="contents">
            <!-- Start Main -->
            <div id="main" >
                <div class="inner">
                <?php
                    $sql = 'SELECT * FROM detail as d, category as c WHERE status="Y" AND detailid="' .$id. '" AND d.cateid=c.cateid';
                    //var_dump($sql);
                    $query = $mysqli->query($sql);
                    $data = $query -> fetch_assoc();
                    echo '
                    <div class="detail-info">
                        <div class="title">'.$data["detail_name"].'</div>
                        <div class="code">'.$data["detail_intro"].'</div>
                        <div class="desc">'.substr($data["detail_content"],0,480).'...</div>
                        <button class="view" title="Xem Thực Tế"><span>Xem Thực Tế</span></button>
                        <div class="divine"><span></span></div>
                        <div class="unity">
                            <p class="text"><i class="fa fa-check" aria-hidden="true"></i> Website chuẩn SEO</p>
                            <p class="text"><i class="fa fa-check" aria-hidden="true"></i> Giao diện Mobile</p>
                            <p class="text"><i class="fa fa-check" aria-hidden="true"></i> Miễn phí Hosting 1 năm</p>
                            <p class="text"><i class="fa fa-check" aria-hidden="true"></i> Hỗ trợ QC Google, Facebook</p>
                            <p class="text"><i class="fa fa-check" aria-hidden="true"></i> Hỗ trợ nhập liệu</p>
                            <p class="text"><i class="fa fa-check" aria-hidden="true"></i> Hỗ trợ kỹ thuật 24/7</p>
                        </div>
                        <div class="divine"><span></span></div>
                        <button class="register"><span>Đăng Ký</span></button>
                        <div id="form--popup">
                            <div class="close-popup"></div>
                            <form role="form" id="contact_form" method="post">
                               <div class="w3-modal-content">
                                  <h2 class="h2-line"><span>Đăng Ký Giao Diện</span> '.$data["detail_name"].'</h2>
                                  <div class="w3-container">
                                    <label><input type="text" class="form-control" name="name" id="name" placeholder="Họ Tên"></label>
                                    <label><input type="text" class="form-control" name="tel" id="tel" placeholder="Điện Thoại"></label>
                                    <label><input type="text" class="form-control" name="email" id="email" placeholder="Email"></label>
                                    <label><textarea style="display:none;" class="form-control" name="message" id="message" rows="5" placeholder="Nội dung....">Yêu cầu giao diện</textarea></label>
                                    <label><input style="display:none;" type="text" class="form-control" name="detail_id" id="detail_id" value="'.$id.'"></label>
                                    <label><input type="submit" class="free-call submit-ajax" value="Gọi Miễn Phí" /></label>
                                  </div>
                                  <div id="comment_msg"></div>
                               </div>
                            </form>
                        </div>
                    </div>
                    <div class="detail-img">
                        <div class="img"><img src="/data/detail_img/'.$data["detail_img"].'" alt="#" /></div>
                    </div>';
                ?>
                </div>
            </div>
            <!-- End Main -->
        </div>
    </div>
    <!-- End Content Wrap -->
<?php include('inc/footer.php');?>
