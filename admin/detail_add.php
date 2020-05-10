<?php

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "strip_uni.php", "fix_upload_name.php", "get_ext.php"));

// Load thông tin danh mục đổ vào form
$cate = new Cate();
$catelist = $cate->listAllCate();

$label = new Label();
$labelList = $label->listAllLabel();

// Sau khi submit
if (isset($_POST["btnDetailAdd"])) {
    if ($_POST["sltCate"] == 'none') {
        ErrorHandler::setError('Vui lòng chọn danh mục');
    } elseif ($_POST["sltLabel"] == 'none') {
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
    } elseif (empty($_FILES["fFeature"]["name"])) {
        ErrorHandler::setError('Vui lòng chọn hình đại diện');
    } elseif (empty($_FILES["fImg"]["name"])) {
        ErrorHandler::setError('Vui lòng chọn hình tin');
    } else {
        $detail = new Detail();
        $detail->setDetailName($_POST["txtName"]);
        $detail->setDetailIntro($_POST["txtIntro"]);
        $detail->setDetailKeywords($_POST["taKeywords"]);
        $detail->setDetailDescription($_POST["taDescription"]);
        $detail->setDetailFeature($_FILES["fFeature"]["name"]);
        $detail->setDetailImg($_FILES["fImg"]["name"]);
        $detail->setDetailContent($_POST["taContent"]);
        $detail->setDetailDate(time());
        $detail->setDetailStatus($_POST["rdoPublic"]);
        $detail->setDetailPoster($_SESSION[$prefix."userid"]);
        $detail->setDetailCate($_POST["sltCate"]);
        $detail->setDetailLabel($_POST["sltLabel"]);
        // Kiểm tra lỗi upload
        if (!$detail->uploadFeatureImg('fFeature', '../data/detail_img') || !$detail->uploadDetailImg('fImg', '../data/detail_img')) {
            ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
        } else {
            $detail->addDetail();
            header("location: detail_list.php");
            exit();
        }
    }
}


$custom_js_file = array(
    '../scripts/ckeditor/ckeditor.js'
);
require('templates/header_default.php');
?>

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

                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
                        <?php if (ErrorHandler::hasError()) {?>
                        <div class="input-group">
                            <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                        </div>
                        <?php }?>

                        <div class="ct-left">
                            <div class="input-group">
                                <label>Tiêu đề</label>
                                <div class="input-item">
                                    <input type="text" name="txtName"
                                    <?php if (isset($_POST["txtName"])) {?>
                                        value="<?php echo htmlspecialchars($_POST["txtName"])?>"
                                    <?php }?>/>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Tóm tắt Nội Dung</label>
                                <div class="input-item">
                                    <textarea name="txtIntro" rows="2"><?php if (isset($_POST["txtIntro"])) {
                                        echo $_POST["txtIntro"];
                                    }?></textarea>
                                    <p class="note">Phần nội dung này sẽ hiện thị tóm tắt trong các trang hiển thị theo dạng Danh Sách bản tin</p>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Nội dung</label>
                                <div class="input-item fixright">
                                    <textarea name="taContent" rows="15">
                                    <?php if (isset($_POST["taContent"])) {
                                        echo $_POST["taContent"];
                                    }?></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace("taContent", {
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

                            <div class="SEO-wrap">
                                <div class="input-group">
                                    <label>SEO Keywords</label>
                                    <div class="input-item">
                                        <input type="text" name="taKeywords"
                                        <?php if (isset($_POST["taKeywords"])) {?>
                                            value="<?php echo htmlspecialchars($_POST["taKeywords"])?>"
                                        <?php }?>/>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label>SEO Description</label>
                                    <div class="input-item">
                                        <textarea name="taDescription" rows="3"><?php if (isset($_POST["taDescription"])) {
                                            echo $_POST["taDescription"];
                                        }?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ct-right">
                            <div class="input-group">
                                <div class="input-item">
                                    <input class="submit" type="submit" name="btnDetailAdd" value="Thêm tin" />
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Tình Trạng</label>
                                <div class="input-item">
                                    <label><input type="radio" name="rdoPublic" value="Y" checked="checked" /> Công Khai</label>
                                    <label><input type="radio" name="rdoPublic" value="N" /> Bản Nháp</label>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Chuyên Mục</label>
                                <div class="input-item fixright">
                                    <select name="sltCate">
                                        <option value="none">Chọn Chuyên Mục</option>
                                        <?php foreach ($catelist as $cate_item) {?>

                                            <option value="<?php echo $cate_item["cateid"]?>"
                                                <?php if (isset($_POST["sltCate"]) && $_POST["sltCate"] == $cate_item["cateid"]) {?>
                                                     selected="selected"
                                                <?php }?> > <?php echo $cate_item["cate_name"]?>
                                            </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Thẻ</label>
                                <div class="input-item fixright">
                                    <select name="sltLabel">
                                        <option value="none">Chọn Thẻ</option>
                                        <?php foreach ($labelList as $label_item) {?>

                                            <option value="<?php echo $label_item["labelid"]?>"
                                                <?php if (isset($_POST["sltLabel"]) && $_POST["sltLabel"] == $label_item["labelid"]) {?>
                                                     selected="selected"
                                                <?php }?> > <?php echo $label_item["label_name"]?>
                                            </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Ảnh Đại Diện</label>
                                <div class="input-item">
                                    <p class="upload-photo"><input id="post-feature" type="file" name="fFeature" /><img id="preview-feature" src="#" alt=""/></p>
                                    <p class="note">Nhấp vào để sửa hoặc cập nhật<br /><?php implode(", ", $accept_upload_ext)?>.</p>
                                </div>
                            </div>

                            <div class="input-group">
                                <label>Ảnh Chi tiết</label>
                                <div class="input-item">
                                    <p class="upload-photo"><input id="post-img" type="file" name="fImg" /><img id="preview-img" src="#" alt=""/></p>
                                    <p class="note">Nhấp vào để sửa hoặc cập nhật<br /><?php implode(", ", $accept_upload_ext)?>.</p>
                                </div>
                            </div>





                        </div>

                    </form>

                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->
    </div>
