<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Kiểm tra xem có nhận được thông tin khóa chính của danh mục hay không
if (!isset($_GET["id"])) {
    header("location: label_list.php");
    exit();
}

// Xóa danh mục trong CSDL
$label = new Label();
$label->delLabel($_GET["id"]);
header('location: label_list.php');

?>
