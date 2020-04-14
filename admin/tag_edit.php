<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Kiểm tra xem có nhận được thông tin khóa chính của danh mục cần sửa hay không
if (!isset($_GET["id"])) {
    header("location: tag_list.php");
    exit();
}
$id = $_GET["id"];

// Lấy thông tin của danh mục để đổ vào form
$tag = new Tag();
$tag->getTagInfoById($id);

// Sau khi nhấn nút submit form
if (isset($_POST["btnTagEdit"])) {
    if (empty($_POST["txtTag"])) {
        ErrorHandler::setError('Vui lòng nhập tên tag');
    } else {
        $tag->setTagName($_POST["txtTag"]);
        if ($tag->checkExistsTag()) {
            ErrorHandler::setError('Thẻ này đã tồn tại. Vui lòng chọn tên khác');
        } else {
            $tag->editTag($id);
            header("location: tag_list.php");
            exit();
        }
    }
}

$admin_function = 'Sửa Danh Mục';
$custon_menu = array(
    'tag_list.php' => 'Quản lý danh mục'
);
require('templates/header_default.php');
echo '
<div class="module">
    <h3>Thông Tin Thẻ</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '?id=' .$id. '" method="post">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label>Tên thẻ:</label>
                <div class="input-item">
                    <input type="text" name="txtTag"';
                    if (isset($_POST["txtTag"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtTag"]). '"';
                    } else {
                        echo ' value="' .htmlspecialchars($tag->getTagName()). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnTagEdit" value="Sửa tên thẻ" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>
