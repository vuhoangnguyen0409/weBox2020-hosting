<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Trang Quản Lý Thành Viên | Thiết Kế Web Chuyên Nghiệp</title>
	<meta name="author" content="Nguyễn Đại Hà | Vũ Hoàng Nguyên" />
    <meta name="description" content="Thiết kế Website chuyên nghiệp đẳng cấp tại Phú Quốc đa đạng các lĩnh vực nhà hàng, khách sạn, ẩm thuật, du lịch, bán hàng.... với đội ngũ nhân viên chuyên nghiệp sẵn sàng hỗ trợ 24/7 mọi lúc."/>
    <meta name="keywords" content="Thiết Kế Website Tại Phú Quốc"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=5,user-scalable=yes"/>
	<link rel="stylesheet" href="templates/css/default.css" />
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
    <?php include('../inc/head.php')?>
    <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>
</head>

<body>

