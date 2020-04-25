<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "strip_uni.php", "fix_upload_name.php", "get_ext.php"));

// Kiểm tra xem có nhận được khóa chính cần xóa?
if (!isset($_GET["id"])) {
    header("location: user_list.php");
    exit();
}
$id = $_GET["id"];
// Lấy thông tin của user đang bị sửa để kiểm tra quyền sửa và đổ vào form
$user = new User();
$user->getUserInfoById($id);

// Kiểm tra quyền sửa
if (!$user->checkEditPermission($id)) {
    header("content-type: text/html; charset=utf-8");
    echo '
    <script type="text/javascript">
        alert("Bạn không có quyền sửa user này");
        window.location = "user_list.php";
    </script>';
    exit();
}

// Sau khi submit form
if (isset($_POST["btnUserEdit"])) {
    if ($user->editMyself($id) && empty($_POST["txtPass"])) {
        ErrorHandler::setError('Vui lòng nhập mật khẩu mới');
    } elseif ($_POST["txtRePass"] != $_POST["txtPass"]) {
        ErrorHandler::setError('Hai ô mật khẩu không trùng nhau, vui lòng xem lại');
    } else {
        // Có thay hình mới
        if (!empty($_FILES["fImg"]["name"])) {
            $newUser = clone $user;
            $newUser->setAvatar($_FILES["fImg"]["name"]);
            if (!User::acceptUpload($_FILES["fImg"]["name"])) {
                ErrorHandler::setError('Bạn không được phép upload loại file này');
                //print "<pre>";
                //print_r($_FILES["fImg"]["name"]);
                //print "</pre>";
                //die();
            } else {
                if (!$newUser->uploadAvatar('fImg')) {
                    ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
                } else {
                    if (!$user->editMyself($id)) {
                        $user->setLevel($_POST["rdoLevel"]);
                    }
                    $newUser->editUser($id);
                    $user->delAvatar();
                    header("location: user_list.php");
                    exit();
                }
            }
        }
        // Không thay hình mới
        else {
            if (!$user->editMyself($id)) {
                $user->setLevel($_POST["rdoLevel"]);
            }
            $user->editUser($id);
            header("location: user_list.php");
            exit();
        }
    }
}

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
                        <h3 class="h3-line">Chỉnh Sửa Tài Khoản</h3>
                        <p class="num-count">Nhập thông tin cần cập nhật vào các bên dưới</p>
                    </div>

                </div>

                <!-- Start Right Content-->
                <div class="content cate-page">
                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                        <?php if (ErrorHandler::hasError()) {?>
                            <div class="input-group">
                                <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                            </div>
                        <?php }?>
                        <div class="input-group">
                            <label>Tên Tài Khoản</label>
                            <div class="input-item"><?php echo  $user->getUsername()?></div>
                        </div>
                        <div class="input-group">
                            <label>Password:</label>
                            <div class="input-item">
                                <input type="password" name="txtPass" />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Confirm password:</label>
                            <div class="input-item">
                                <input type="password" name="txtRePass" />
                            </div>
                        </div>
                        <?php if (!$user->editMyself($id)) {?>
                            <div class="input-group">
                                <label>Vai Trò</label>
                                <div class="input-item">
                                    <div class="checkbox"><input type="radio" name="rdoLevel" value="2" <?php if ($user->getLevel() == 2) {?>checked="checked"<?php }?>/> <span class="checkmask">Thành viên</span></div>
                                    <div class="checkbox"><input type="radio" name="rdoLevel" value="1" <?php if ($user->getLevel() == 1) {?>checked="checked"<?php }?>/> <span class="checkmask">Quản trị</span></div>
                                </div>
                            </div>
                        <?php }?>
                        <div class="input-group">
                            <label>Ảnh Đại Diện</label>
                            <div class="input-item">
                                <p class="upload-photo"><input id="post-img" type="file" name="fImg" /><img id="preview-img" src="../data/user_img/<?php echo $user->getAvatar()?>" alt=""/></p>
                                <p class="note">Nhấp vào để sửa hoặc cập nhật<br /><?php echo implode(", ", $accept_upload_ext)?>.</p>
                            </div>
                        </div>
                        <div class="input-group">
                            <label></label>
                            <div class="input-item">
                                <input type="submit" name="btnUserEdit" value="Cập Nhật" />
                            </div>
                            <div class="input-item">
                                <a href="user_list.php" />Huỷ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<?php require('templates/footer_default.php')?>
