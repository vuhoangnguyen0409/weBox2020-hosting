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

$news = new News();
$total_news = $news->totalNews();

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

	<title>Admin Panel</title>
</head>

<body>
            <div class="admin-wrap">
                <div class="row flex justify--space-between">
                    <div class="logo">
                        WEBBOX
                    </div>
                    <div class="info">
                        <?php
                        echo 'Xin chào <a href="user_edit.php?id=' .$_SESSION[$prefix."userid"]. '">'.$_SESSION[$prefix."username"].'</a> | <a href="logout.php">Logout</a>';
                        ?>
                    </div>
                </div>
                <div class="row listing">
                    <dic class="inner flex justify--center">
                        <a href="#"><p><i class="fas fa-radiation"></i>Cài đặt chung</p></a>
                        <a href="user_list.php"><p><i class="fas fa-user-friends"></i>Thành Viên <span>(10)</span></p></a>
                        <a href="cate_list.php"><p><i class="fas fa-chart-pie"></i>Danh mục <span>(2)</span></p></a>
                        <a href="news_list.php"><p><i class="fas fa-file-alt"></i>Tin tức <span>(100)</span></p></a>
                        <a href="comment_list.php"><p><i class="fas fa-pen-fancy"></i>Bình luận <span>(22)</span></p></a>
                        <a href="#"><p><i class="fas fa-envelope-open"></i>Liên hệ <span>(1)</span></p></a>
                        <a href="#"><p><i class="fas fa-cart-arrow-down"></i>Mua hàng <span>(14)</span></p></a>
                        <a href="#"><p><i class="fas fa-people-carry"></i>Comming soon</p></a>
                    </div>
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

<div class="admin-footer">
    <p>Copyright webbox.com</p>
    <p class="tel">Mr.Nguyên: 0974-487-944, Mr.Hà: 0964-602940</p>
    <p class="mail">vuhoangnguyen49@gmail.com</p>
</div>
