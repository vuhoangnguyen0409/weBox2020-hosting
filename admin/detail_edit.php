<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "strip_uni.php", "fix_upload_name.php", "get_ext.php"));

if (!isset($_GET["id"])) {
    header("location: detail_list.php");
}
$id = $_GET["id"];

// Lấy thông tin bản tin để vào form
$detail = new Detail();
$detail->getDetailInfoById($id);
// Lấy thông tin danh mục đổ vào listbox
$cate = new Cate();
$catelist = $cate->listAllCate();
$tag = new Tag();
$taglist = $tag->listAllTag();

// Sau khi submit
if (isset($_POST["btnDetailEdit"])) {
    if ($_POST["sltCate"] == 'none') {
        ErrorHandler::setError('Vui lòng chọn danh mục');
    } elseif ($_POST["sltTag"] == 'none') {
        ErrorHandler::setError('Vui lòng chọn thẻ');
    } elseif (empty($_POST["txtName"])) {
        ErrorHandler::setError('Vui lòng nhập tiêu đề');
    } elseif (empty($_POST["txtIntro"])) {
        ErrorHandler::setError('Vui lòng nhập giới thiệu');
    } elseif (empty($_POST["taKeywords"])) {
        ErrorHandler::setError('Vui lòng nhập SEO keywords');
    } elseif (empty($_POST["taDescription"])) {
        ErrorHandler::setError('Vui lòng nhập SEO description');
    } elseif (!Detail::acceptUpload($_FILES["fImg"]["name"])) {
        ErrorHandler::setError('Bạn không được phép upload loại file này');
    } elseif (empty($_POST["taContent"])) {
        ErrorHandler::setError('Vui lòng nhập nội dung');
    } elseif (empty($_FILES["fImg"]["name"])) {
        ErrorHandler::setError('Vui lòng chọn hình tin');
    } else {
        $detail = new Detail();
        $detail->setDetailName($_POST["txtName"]);
        $detail->setDetailIntro($_POST["txtIntro"]);
        $detail->setSeoKeywords($_POST["taKeywords"]);
        $detail->setSeoDescription($_POST["taDescription"]);
        $detail->setDetailImg($_FILES["fImg"]["name"]);
        $detail->setDetailContent($_POST["taContent"]);
        $detail->setDetailDate(time());
        $detail->setDetailStatus($_POST["rdoPublic"]);
        $detail->setDetailPoster($_SESSION[$prefix."userid"]);
        $detail->setDetailCate($_POST["sltCate"]);
        $detail->setDetailTag($_POST["sltTag"]);
        // Kiểm tra lỗi upload
        if (!empty($_FILES["fImg"]["name"])) {
            $newdetail = clone $detail;
            $newdetail->setdetailImg($_FILES["fImg"]["name"]);
            if (!Detail::acceptUpload($_FILES["fImg"]["name"])) {
                ErrorHandler::setError('Bạn không được phép upload loại file này');
            } else {
                if (!$newdetail->uploadDetailImg('fImg')) {
                    ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
                } else {
                    $newdetail->editDetail($id);
                    $detail->delDetailImage();
                }
            }
        } else {
            $detail->editDetail($id);
        }
        header("location: detail_list.php");
        exit();
    }
}

$admin_function = 'Sửa Tin';
$custon_menu = array(
    'detail_list.php' => 'Quản lý tin'
);
$custom_js_file = array(
    '../scripts/ckeditor/ckeditor.js'
);
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
                        <h3 class="h3-line">Thêm Bài Viết</h3>
                        <p class="num-count">Nhập thông tin đầy đủ vào các mục trống</p>
                    </div>

                </div>

                <!-- Start Right Content-->
                <div class="content news-page">
<?php
echo '
        <form action="' .$_SERVER["PHP_SELF"]. '?id=' .$id. '" method="post" enctype="multipart/form-data">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label>Tiêu đề:</label>
                <div class="input-item">
                    <input type="text" name="txtName"';
                    if (isset($_POST["txtName"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtName"]). '"';
                    } else {
                        echo ' value="' .htmlspecialchars($detail->getDetailName()). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label>Giới Thiệu:</label>
                <div class="input-item">
                    <input type="text" name="txtIntro"';
                    if (isset($_POST["txtIntro"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtIntro"]). '"';
                    } else {
                        echo ' value="' .htmlspecialchars($detail->getDetailIntro()). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label>SEO keywords</label>
                <div class="input-item">
                    <textarea name="taKeywords" rows="5">';
                    if (isset($_POST["taKeywords"])) {
                        echo $_POST["taKeywords"];
                    } else {
                        echo $detail->getSeoKeywords();
                    }
                    echo '</textarea>
                </div>
            </div>
            <div class="input-group">
                <label>SEO Description</label>
                <div class="input-item">
                    <textarea name="taDescription" rows="5">';
                    if (isset($_POST["taDescription"])) {
                        echo $_POST["taDescription"];
                    } else {
                        echo $detail->getSeoDescription();
                    }
                    echo '</textarea>
                </div>
            </div>
            <div class="input-group">
                <label>Hình tin hiện tại:</label>
                <div class="input-item">
                    <img src="../data/detail_img/' .$detail->getDetailImg(). '" class="thumbs" />
                </div>
            </div>
            <div class="input-group">
                <label>Thay hình tin:</label>
                <div class="input-item">
                    Chỉ chấp nhận những phần mở rộng:<b> ' .implode(", ", $accept_upload_ext). '</b>.<br />
                    <input type="file" name="fImg" />
                </div>
            </div>
            <div class="input-group">
                <label>Nội dung:</label>
                <div class="input-item fixright">
                    <textarea name="taContent" rows="10">';
                    if (isset($_POST["taContent"])) {
                        echo $_POST["taContent"];
                    } else {
                        echo str_replace('{$siteURL}', $siteURL, $detail->getDetailContent());
                    }
                    echo '</textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("txtFull", {
                            filebrowserBrowseUrl : "../libs/kcfinder/browse.php?opener=ckeditor&type=files",
                            filebrowserImageBrowseUrl : "../libs/kcfinder/browse.php?opener=ckeditor&type=images",
                            filebrowserFlashBrowseUrl : "../libs/kcfinder/browse.php?opener=ckeditor&type=flash",
                            filebrowserUploadUrl : "../libs/kcfinder/upload.php?opener=ckeditor&type=files",
                            filebrowserImageUploadUrl : "../libs/kcfinder/upload.php?opener=ckeditor&type=images",
                            filebrowserFlashUploadUrl : "../libs/kcfinder/upload.php?opener=ckeditor&type=flash",
                        });
                    </script>
                </div>
            </div>
            <div class="input-group">
                <label>Công bố:</label>
                <div class="input-item">
                    <label><input type="radio" name="rdoPublic" value="Y"';
                    if ($detail->getDetailStatus() == 'Y') {
                        echo ' checked="checked"';
                    }
                    echo ' /> Có</label>
                    <label><input type="radio" name="rdoPublic" value="N"';
                    if ($detail->getDetailStatus() == 'N') {
                        echo ' checked="checked"';
                    }
                    echo ' /> Không</label>
                </div>
            </div>
            <div class="input-group">
                <label>Danh mục:</label>
                <div class="input-item fixright">
                    <select name="sltCate">
                        <option value="none">Chọn danh mục</option>';
                        foreach ($catelist as $cate_item) {
                            echo '
                            <option value="' .$cate_item["cateid"]. '"';
                            if (isset($_POST["sltCate"]) && $_POST["sltCate"] == $cate_item["cateid"]) {
                                echo ' selected="selected"';
                            } else {
                                if ($detail->getDetailCate() == $cate_item["cateid"]) {
                                    echo ' selected="selected"';
                                }
                            }
                            echo '>' .$cate_item["cate_name"]. '</option>';
                        }
                        echo '
                    </select>
                </div>
            </div>
            <div class="input-group">
                <label>Thẻ:</label>
                <div class="input-item fixright">
                    <select name="sltTag">
                        <option value="none">Chọn Thẻ</option>';
                        foreach ($taglist as $tag_item) {
                            echo '
                            <option value="' .$tag_item["tagid"]. '"';
                            if (isset($_POST["sltTag"]) && $_POST["sltTag"] == $tag_item["tagid"]) {
                                echo ' selected="selected"';
                            } else {
                                if ($detail->getDetailTag() == $tag_item["tagid"]) {
                                    echo ' selected="selected"';
                                }
                            }
                            echo '>' .$tag_item["tag_name"]. '</option>';
                        }
                        echo '
                    </select>
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnDetailEdit" value="Sửa tin" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>
