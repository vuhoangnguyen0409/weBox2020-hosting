<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
require('../libs/check_admin.php');

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
        // Pass
        if (!empty($_POST["txtPass"])) {
            $user->setPassword($_POST["txtPass"]);
        }
        // Level
        if (!$user->editMyself($id)) {
            $user->setLevel($_POST["rdoLevel"]);
        }
        // Sửa
        $user->editUser($id);
        header("location: user_list.php");
        exit();
    }
}

$admin_function = 'Sửa User';
$custon_menu = array(
    'user_list.php' => 'Quản lý user'
);
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Thông Tin User</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '?id=' .$id. '" method="post">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label>Username:</label>
                <div class="input-item">
                    <b>' .$user->getUsername(). '</b>
                </div>
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
            </div>';
            if (!$user->editMyself($id)) {
                echo '
                <div class="input-group">
                    <label>Level:</label>
                    <div class="input-item">
                        <label><input type="radio" name="rdoLevel" value="1"';
                        if ($user->getLevel() == 1) {
                            echo ' checked="checked"';
                        }
                        echo ' /> Quản trị</label>
                        <label><input type="radio" name="rdoLevel" value="2"';
                        if ($user->getLevel() == 2) {
                            echo ' checked="checked"';
                        }
                        echo ' /> Thành viên</label>
                    </div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnUserEdit" value="Sửa user" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>
