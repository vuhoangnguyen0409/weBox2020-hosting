<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "valid_user.php"));

// Sau khi nhấn nút submit form
if (isset($_POST["btnUserAdd"])) {
    // Kiểm ra dữ liệu đầu vào
    if (empty($_POST["txtUser"])) {
        ErrorHandler::setError('Mục này không được bỏ trống');
    } elseif (!validUsername($_POST["txtUser"])) {
        ErrorHandler::setError('Username không hợp lệ. Chỉ chấp nhận ký tự chữ cái, số và tối thiểu ' .$username_min_len. ' ký tự');
    } elseif (empty($_POST["txtPass"])) {
        ErrorHandler::setError('Vui lòng nhập password');
    } elseif ($_POST["txtRePass"] != $_POST["txtPass"]) {
        ErrorHandler::setError('hai ô mật khẩu không trùng nhau');
    } elseif (empty($_POST["email"])) {
        ErrorHandler::setError('Vui lòng nhập Email');
    } elseif (empty($_POST["tel"])) {
        ErrorHandler::setError('Vui lòng nhập SDT');
    } else {
        $user = new User($_POST["txtUser"], $_POST["txtPass"],  $_POST["txtBirth"], $_POST["txtAddress"], $_POST["rdoLevel"], $_POST["email"], $_POST["tel"]);
        //var_dump($user);
        //die();
        if ($user->existsUsername()) {
            ErrorHandler::setError('<i>Username này đã tồn tại. Vui lòng chọn username khác</i>');
        }
        elseif ($user->existsEmail()) {
            ErrorHandler::setError('<i>Email này đã tồn tại. Vui lòng chọn username khác</i>');
        } else {
            $user->addUser();
            header("location: user_list.php");
            exit();
        }
    }
}

?>

<!--
                              ____
          \ \  /   \  / /   /      \
           \ \/ / \ \/ /   |  |  |  |
            \__/   \__/     \ ____ /

    DESIGN BY WEBBOX | THIETKEWEBPHUQUOC.COM
    AUTHOR : NGUYEN DAI HA & VU HOANG NGUYEN
    WEBSITE: WWW.THIETKEWEBPHUQUOC.COM
-->
<?php // Gọi phần đầu giao diện
require('templates/header_default.php');?>

<body id="admin-page">
    <div class="left-admin-header">
        <?php include('templates/admin-left-menu.php')?>
    </div>

    <div class="right-admin-header">
        <?php include('templates/admin-top-menu.php')?>

        <!-- Start Right Content Wrap-->
        <div class="ct-wrap">
            <div class="ct-wrap-inner">
                <div class="breadcrumb">
                    <div class="bread-tit">
                        <h3 class="h3-line">Thêm Thành Viên</h3>
                        <p class="bread-sub">Vui lòng điền đầy đủ thông tin</p>
                    </div>
                </div>

                <!-- Start Right Content-->
                <div class="content">
                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                        <?php if (ErrorHandler::hasError()) {?>
                                <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                        <?php }?>
                        <div class="input-group">
                            <label>Tài Khoản</label>
                            <div class="input-item">
                                <input type="text" name="txtUser"<?php  if (isset($_POST["txtUser"])) {?> value="<?php htmlspecialchars($_POST["txtUser"])?>" <?php }?>/>

                            </div>
                        </div>
                        <div class="input-group">
                            <label>Điện Thoại</label>
                            <div class="input-item">
                                <input type="tel" name="tel" />

                            </div>
                        </div>
                        <div class="input-group">
                            <label>Mật Khẩu</label>
                            <div class="input-item">
                                <input type="password" name="txtPass" />

                            </div>
                        </div>
                        <div class="input-group">
                            <label>Nhập Lại Mật Khẩu</label>
                            <div class="input-item">
                                <input type="password" name="txtRePass" />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <div class="input-item">
                                <input type="email" name="email" />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Ngày Sinh</label>
                            <div class="input-item">
                                <input type="txt" name="txtBirth" />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Địa Chỉ</label>
                            <div class="input-item">
                                <input type="txt" name="txtAddress" />
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-inner">
                                <label>Vai trò</label>
                                <div class="input-item">
                                    <div class="checkbox"><input type="radio" name="rdoLevel" value="2" checked="checked" /> <span class="checkmask">Thành viên</span></div>
                                    <div class="checkbox"><input type="radio" name="rdoLevel" value="1" /> <span class="checkmask">Quản trị</span></div>
                                </div>
                            </div>
                            <div class="input-group-inner">
                                <label>Giới Tính</label>
                                <div class="input-item">
                                    <div class="checkbox"><input type="radio" name="txtGender" value="2" checked="checked" /> <span class="checkmask">Nam</span></div>
                                    <div class="checkbox"><input type="radio" name="txtGender" value="1" /> <span class="checkmask">Nữ</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group btn-submit">
                            <div class="input-item">
                                <input type="submit" name="btnUserAdd" value="Thêm Thành Viên" />
                            </div>
                        </div>

                    </form>
                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->


    </div>

    <?php// require('templates/footer_default.php');?>
