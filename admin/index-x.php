<?php
// Gọi cấu hình site
require('../phpnc75_platform.php');
// Kiểm tra quyền admin
loadLibs(array("check_admin.php"));

// thông kê dữ liệu
$user = new User();
$total_user = $user->totalUser();
$listuser = $user->listAllUser();

$cate = new Cate();
$total_cate = $cate->totalCate();

$news = new News();
$total_news = $news->totalNews();

$comment = new Comment();
$total_comments = $comment->totalComment();
$listcomment = $comment->listAllComment();


?>


<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Trang Quản Trị| Thiết Kế Web Chuyên Nghiệp</title>
	<meta name="author" content="Nguyễn Đại Hà | Vũ Hoàng Nguyên" />
    <meta name="description" content="Thiết kế Website chuyên nghiệp đẳng cấp tại Phú Quốc đa đạng các lĩnh vực nhà hàng, khách sạn, ẩm thuật, du lịch, bán hàng.... với đội ngũ nhân viên chuyên nghiệp sẵn sàng hỗ trợ 24/7 mọi lúc."/>
    <meta name="keywords" content="Thiết Kế Website Tại Phú Quốc"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=5,user-scalable=yes"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="templates/css/admin-index.css" />
    <?php
    if (isset($custom_js_file)) {
        foreach ($custom_js_file as $js_file) {
            echo '
            <script type="text/javascript" src="' .$js_file. '"></script>';
        }
    }
    ?>

    <script type="text/javascript">
        function xacnhan(msg) {
            if (!window.confirm(msg)) {
                return false;
            }
            return true;
        }
    </script>
    
</head>

<? require('templates/header_default.php')?>

<body id="admin-page">
    <div class="left-admin-header">
        <?php include('templates/admin-left-menu.php')?>
    </div>

    <div class="right-admin-header">
        <?php include('templates/admin-top-menu.php')?>

        <!-- Start Right Content Wrap-->
        <div class="ct-wrap">
            <div class="ct-wrap-inner">

                <!-- Start Right Content-->
                <div id="admin-home" class="content">
                    <div class="row listing flex">
                        <div class="box-data col-3">
                            <div class="box-data-inner data-user">
                                <ul>
                                    <li class="tit">Thành Viên<a class="view-all" href="/../admin/user_list.php">Tất cả</a></li>
                                    <?foreach ($listuser as $user_item) { 
                                        $color_arr = array("bg-blue", "bg-green", "bg-yellow", "bg-pink");  
                                        $rand_color = rand(0, 3);?>
                                    <li>
                                        <i class="far fa-user i-avatar  <?= $color_arr[$rand_color]?>"></i>
                                        <p class="info"><span class="name"><?echo $user_item["username"]?></span><span class="email"><?echo $user_item["email"]?></span></p>
                                    </li>
                                    <?}?>
                                </ul>
                            </div>
                        </div>
                        <div class="box-data col-3">
                            <div class="box-data-inner data-comment">
                                <ul>
                                    <li class="tit">Bình Luận <a class="view-all" href="/../admin/comment_list.php">Tất Cả</a></li>
                                    <?foreach ($listcomment as $comment_item) {
                                    $color_arr = array("bg-blue", "bg-green", "bg-yellow", "bg-pink");  
                                        $rand_color = rand(0, 3);?>
                                    <li>
                                        <i class="far fa-user i-avatar <?= $color_arr[$rand_color]?>"></i>
                                        <p class="info"><span class="name"><?echo $comment_item["username"]?></span><span class="comment"><?echo $comment_item["comment_content"]?></span><span class="time"><?echo $comment_item['comment_date']?></span></p>
                                    </li>
                                    <?}?>
                                </ul>
                            </div>
                        </div>
                            <a href="cate_list.php"><p><i class="fas fa-chart-pie"></i>Danh mục <span><?php echo $total_cate;?></span></p></a>
                            <a href="news_list.php"><p><i class="fas fa-file-alt"></i>Tin tức <span><?php echo $total_news;?></span></p></a>
                            <a href="#"><p><i class="fas fa-envelope-open"></i>Liên hệ <span>(1)</span></p></a>
                            <a href="#"><p><i class="fas fa-cart-arrow-down"></i>Mua hàng <span>(14)</span></p></a>
                            <a href="#"><p><i class="fas fa-people-carry"></i>Comming soon</p></a>
                        </div>
                    </div>
                </div><!-- Start Right Content -->
                
            </div>
        </div><!-- End Right Content Wrap-->


    </div>




    <?php require('templates/footer_default.php');?>


            <table class="function-table" style="display: none;">

                <tr>
                    <td class="function-item cate-add">
                        <a href="cate_add.php">Thêm danh mục</a>
                    </td>
                    <td class="function-item cate-list">
                        <a href="cate_list.php">Quản lý danh mục</a>
                    </td>
                </tr>
                <tr>
                    <td class="function-item news-add">
                        <a href="news_add.php">Thêm tin</a>
                    </td>
                    <td class="function-item news-list">
                        <a href="news_list.php">Quản lý tin</a>
                    </td>
                </tr>
                <tr>
                    <td class="function-item news-list">
                        <a href="comment_list.php">Quản lý comment</a>
                    </td>
                </tr>
            </table>

<div class="admin-footer">
    <p>Copyright webbox.com</p>
    <p class="tel">Mr.Nguyên: 0974-487-944, Mr.Hà: 0964-602940</p>
    <p class="mail">vuhoangnguyen49@gmail.com</p>
</div>
