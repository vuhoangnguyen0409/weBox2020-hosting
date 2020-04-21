<?php
// Gọi cấu hình site
require('../phpnc75_platform.php');

// Sau khi submit
if (isset($_POST["btnLogin"])) {
    // Kiểm tra xem người dùng có nhập liệu đầy đủ chưa
    if (empty($_POST["txtTel"])) {
        ErrorHandler::setError('Vui lòng nhập SĐT');
    } elseif (empty($_POST["txtPass"])) {
        ErrorHandler::setError('Vui lòng nhập password');
    } else {
        $login = new User(null, $_POST["txtPass"], null, null, null, $_POST["txtTel"], null, null);
        //print "<pre>";
        //print_r($login);
        //print "</pre>";
        //die();
        if (!$login->checkLogin()) {
            ErrorHandler::setError('Sai thông tin đăng nhập');
        } else {
            header("location: index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=5,user-scalable=yes"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="NguyeN" />
    <link rel="stylesheet" href="templates/css/login.css" />
    <link rel="stylesheet" href="/../css/font-awesome.css" />
    <title>Đăng Nhập Tài Khoản Quản Trị</title>
</head>

<body>

    <div id="layout">
        <div id="login-box">
            <h2 class="logo"><span>W</span>Web<em>Box</em></h2>
            <h3>Đăng Nhập</h3>
            <p class="txt">Truy cập trang Quản Trị bằng Tên Tài Khoản</p>
            <div class="content">
                <form action="" method="post">
                    <div class="input-group input-group-msg">
                        <?php
                        if (ErrorHandler::hasError()) {
                            echo '<div class="error_msg">'.ErrorHandler::getError().'</div>';
                        } else {

                        }
                        ?>
                    </div>
                    <div class="input-group">
                        <h4 class="username">Số điện thoại</h4>
                        <div class="input-item">
                            <input type="text" name="txtTel" placeholder="Số điện thoại" class="user-info"<?php
                            if (isset($_POST["txtTel"])) {
                                echo ' value="' .$_POST["txtTel"]. '"';
                            }
                            ?> />
                        </div>
                    </div>
                    <div class="input-group">
                        <h4 class="password">Mật Khẩu<a href="/">Quên mật khẩu ?</a></h4>
                        <div class="input-item">
                            <input type="password" name="txtPass" placeholder="Nhập mật khẩu" class="user-info" />
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="submit" name="btnLogin" value="Đăng nhập" class="login-button" />
                        <p class="back-to-home"><i class="fa fa-sign-out"></i> Quay về <a href="/../">Trang Chủ</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
