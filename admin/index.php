<?php
// Gọi cấu hình site
require('../phpnc75_platform.php');
// Kiểm tra quyền admin
loadLibs(array("check_admin.php"));

// thông kê dữ liệu
$user = new User();
$total_user = $user->totalUser();

$cate = new Cate();
$total_cate = $cate->totalCate();

$detail = new Detail();
$total_detail = $detail->totalDetail();

$comment = new Comment();
$total_comments = $comment->totalComment();

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Trang Quản Lý Thành Viên | Thiết Kế Web Chuyên Nghiệp</title>
	<meta name="author" content="Nguyễn Đại Hà | Vũ Hoàng Nguyên" />
    <meta name="description" content="Thiết kế Website chuyên nghiệp đẳng cấp tại Phú Quốc đa đạng các lĩnh vực nhà hàng, khách sạn, ẩm thuật, du lịch, bán hàng.... với đội ngũ nhân viên chuyên nghiệp sẵn sàng hỗ trợ 24/7 mọi lúc."/>
    <meta name="keywords" content="Thiết Kế Website Tại Phú Quốc"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=5,user-scalable=yes"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="http://www.chuphinhphuquoc.com/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="templates/css/admin-index.css" />
    <link rel="stylesheet" href="templates/css/admin.css" />
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
    <script type="text/javascript" src="templates/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="templates/js/admin.js"></script>
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
            <div id="admin-home" class="admin-wrap">
                <div class="row flex justify--space-between">
                    <div class="breadcrumb">
                        <div class="bread-tit">
                            <h3 class="h3-line"><?php echo '<p>Xin chào, <a href="user_edit.php?id=' .$_SESSION[$prefix."userid"]. '">'.$_SESSION[$prefix."username"].'</a></p>';?></h3>
                            <p class="num-count">Hôm nay : <span><?php setlocale(LC_ALL, 'vi_VN'); echo strftime("%A - %e/%m/%Y");?></span></p>

                        </div>
                    </div>
                </div>
                <div class="row listing">
                    <div class="inner flex justify--center">
                        <div class="item-box"><a href="detail_list.php"><p class="number"><?php echo $total_detail?><span>Giao Diện Web</span></p><p class="bg-yellow icon"><i class="far fa-file-word"></i></p></a></div>
                        <div class="item-box"><a href="user_list.php"><p class="number"><?php echo $total_user?><span>Thành Viên</span></p><p class="bg-blue icon"><i class="fas fa-user-friends"></i></p></a></div>
                        <div class="item-box"><a href="comment_list.php"><p class="number"><?php echo $total_comments?><span>Bình Luận</span></p><p class="bg-green icon"><i class="fa fa-comment"></i></p></a></div>
                        <div class="item-box"><a href="cate_list.php"><p class="number"><?php echo $total_cate?><span>Chuyên Mục</span></p><p class="bg-pink icon"><i class="far fa-file-alt"></i></p></a></div>
                    </div>
                </div>


            <table class="function-table" style="display: none;">
                <tr>
                    <td class="function-item user-add">
                        <a href="user_add.php">Thêm user</a>
                    </td>
                    <td class="function-item user-list">
                        <a href="user_list.php">Quản lý user</a>
                    </td>
                    <td rowspan="3" class="stats-panel">
                        <h3>Thống kê</h3>
                        <ul>
                            <li>Tổng số user: <?php echo $total_user;?></li>
                            <li>Tổng số danh mục: <?php echo $total_cate;?></li>
                            <li>Tổng số bản tin: <?php echo $total_news;?></li>
                            <li>Tổng số bình luận: <?php echo $total_comments;?></li>
                        </ul>
                    </td>
                </tr>
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
        </div>
    </div>
</div>
