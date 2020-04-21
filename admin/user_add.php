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
        ErrorHandler::setError('Vui lòng nhập tên');
    } //elseif (!validUsername($_POST["txtUser"])) {
        //ErrorHandler::setError('Username không hợp lệ. Chỉ chấp nhận ký tự chữ cái, số và tối thiểu ' .$username_min_len. ' ký tự');
    //}
    elseif (empty($_POST["txtPass"])) {
        ErrorHandler::setError('Vui lòng nhập password');
    } elseif ($_POST["txtRePass"] != $_POST["txtPass"]) {
        ErrorHandler::setError('hai ô mật khẩu không trùng nhau');
    } elseif (empty($_POST["email"])) {
        ErrorHandler::setError('Vui lòng nhập Email');
    } elseif (empty($_POST["tel"])) {
        ErrorHandler::setError('Vui lòng nhập SDT');
    }  elseif (empty($_POST["birthday"])) {
        ErrorHandler::setError('Vui lòng nhập ngày tháng năm sinh');
    }  elseif (empty($_POST["address"])) {
        ErrorHandler::setError('Vui lòng nhập địa chỉ');
    } else {
        $user = new User($_POST["txtUser"], $_POST["txtPass"], $_POST["rdoLevel"], $_POST["rdoGender"], $_POST["email"], $_POST["tel"], $_POST["birthday"], $_POST["address"]);
        //print "<pre>";
        //print_r($user);
        //print "</pre>";
        //die();
        if ($user->existsUser()) {
            ErrorHandler::setError('<i>SĐT này đã tồn tại. Vui lòng chọn số điện thoại khác</i>');
        }
        elseif ($user->existsEmail()) {
            ErrorHandler::setError('<i>Email này đã tồn tại. Vui lòng chọn email khác</i>');
        } else {
            var_dump($_POST["email"]);
            //die();
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
                                <input type="txt" name="birthday" />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Địa Chỉ</label>
                            <div class="input-item">
                                <input type="txt" name="address" />
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group-inner">
                                <label>Vai trò</label>
                                <div class="input-item">
                                    <div class="checkbox"><input type="radio" name="rdoLevel" value="1" /> <span class="checkmask">Quản trị</span></div>
                                    <div class="checkbox"><input type="radio" name="rdoLevel" value="2" checked="checked" /> <span class="checkmask">Thành viên</span></div>
                                </div>
                            </div>
                            <div class="input-group-inner">
                                <label>Giới Tính</label>
                                <div class="input-item">
                                    <div class="checkbox"><input type="radio" name="rdoGender" value="1" checked="checked" /> <span class="checkmask">Nam</span></div>
                                    <div class="checkbox"><input type="radio" name="rdoGender" value="2" /> <span class="checkmask">Nữ</span></div>
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
