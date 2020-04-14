<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Kiểm tra xem có nhận được thông tin khóa chính của danh mục cần sửa hay không
if (!isset($_GET["id"])) {
    header("location: label_list.php");
    exit();
}
$id = $_GET["id"];

// Lấy thông tin của danh mục để đổ vào form
$label = new Label();
$label->getLabelInfoById($id);

// Sau khi nhấn nút submit form
if (isset($_POST["btnLabelEdit"])) {
    if (empty($_POST["txtLabel"])) {
        ErrorHandler::setError('Vui lòng nhập tên label');
    } else {
        $label->setLabelName($_POST["txtLabel"]);
        if ($label->checkExistsLabel()) {
            ErrorHandler::setError('Thẻ này đã tồn tại. Vui lòng chọn tên khác');
        } else {
            $label->editLabel($id);
            header("location: label_list.php");
            exit();
        }
    }
}

$admin_function = 'Sửa Danh Mục';
$custon_menu = array(
    'label_list.php' => 'Quản lý danh mục'
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
                    <input type="text" name="txtLabel"';
                    if (isset($_POST["txtLabel"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtLabel"]). '"';
                    } else {
                        echo ' value="' .htmlspecialchars($label->getLabelName()). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnLabelEdit" value="Sửa tên thẻ" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>
