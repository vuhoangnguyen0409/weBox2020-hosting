<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

/* * Cấu hình kết nối CSDL**/
$hostname = 'localhost';
$hostuser = 'root';
$hostpass = '';
$dbname = 'phpnc74_json-hosting';


/** Cấu hình tiếp đầu ngữ cho session **/
$prefix = 'phpnc75_';

/** Cấu hình đường dẫn đến site (dùng cho KCFinder) **/
$siteURL = 'http://wee.local/';
//$siteURL = 'http://www.chuphinhphuquoc.com/';

/** Cấu hình cho username **/
$username_min_len = 5;

/** Cầu hình upload hình tin **/
$accept_upload_ext = array("jpg", "bmp", "png", "gif");

/** Cấu hình phân trang **/
$rowPerPage = 3;
$pagePerSegment = 3;

?>
