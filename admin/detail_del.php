<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Kiểm tra xem có nhận được thông tin khóa chính của bản tin hay không
if (!isset($_GET["id"])) {
    header("location: detail_list.php");
    exit();
}

// Xóa tin
$detail = new Detail();
$detail->getDetailInfoById($_GET["id"]);
$detail->delDetail($_GET["id"]);
header('location: detail_list.php');

?>
