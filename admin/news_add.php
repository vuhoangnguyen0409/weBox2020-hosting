<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "strip_uni.php", "fix_upload_name.php", "get_ext.php"));

// Load thông tin danh mục đổ vào form
$cate = new Cate();
$catelist = $cate->listAllCate();

// Sau khi submit
if (isset($_POST["btnNewsAdd"])) {
    if ($_POST["sltCate"] == 'none') {
        ErrorHandler::setError('Vui lòng chọn danh mục');
    } elseif (empty($_POST["txtTitle"])) {
        ErrorHandler::setError('Vui lòng nhập tiêu đề');
    } elseif (empty($_POST["txtSource"])) {
        ErrorHandler::setError('Vui lòng nhập nguồn tin');
    } elseif (empty($_POST["txtIntro"])) {
        ErrorHandler::setError('Vui lòng nhập trích dẫn');
    } elseif (empty($_POST["txtFull"])) {
        ErrorHandler::setError('Vui lòng nhập nội dung');
    } elseif (empty($_FILES["fImg"]["name"])) {
        ErrorHandler::setError('Vui lòng chọn hình tin');
    } elseif (!News::acceptUpload($_FILES["fImg"]["name"])) {
        ErrorHandler::setError('Bạn không được phép upload loại file này');
    } else {
        $news = new News();
        $news->setNewsTitle($_POST["txtTitle"]);
        $news->setNewsSource($_POST["txtSource"]);
        $news->setNewsIntro($_POST["txtIntro"]);
        $news->setNewsFull($_POST["txtFull"]);
        $news->setNewsImg($_FILES["fImg"]["name"]);
        $news->setNewsPublic($_POST["rdoPublic"]);
        $news->setNewsDate(time());
        $news->setNewsPoster($_SESSION[$prefix."userid"]);
        $news->setNewsCate($_POST["sltCate"]);
        // Kiểm tra lỗi upload
        if (!$news->uploadNewsImg('fImg', '../data/news_img')) {
            ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
        } else {
            $news->addNews();
            header("location: news_list.php");
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

                    <form class="form" action="=<?$_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
                        <?if (ErrorHandler::hasError()) {?>
                        <div class="input-group">
                            <div class="error_msg"><?= ErrorHandler::getError()?></div>
                        </div>
                        <?}?>
                        
                        <div class="ct-left">
                            <div class="input-group">
                                <label>Tiêu đề</label>
                                <div class="input-item">
                                    <input class="title" type="text" name="txtTitle"
                                    <?if (isset($_POST["txtTitle"])) {?>
                                        value="<?= htmlspecialchars($_POST["txtTitle"])?>"
                                    <?}?>/>
                                </div>
                            </div>
                            
                            
                            <div class="input-group">
                                <label>Nội dung</label>
                                <div class="input-item fixright">
                                    <textarea name="txtFull" rows="10">
                                    <?if (isset($_POST["txtFull"])) {
                                        echo $_POST["txtFull"];
                                    }?></textarea>
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
                            
                        </div>
                        
                        <div class="ct-right">
                        
                            <div class="input-group">
                                <div class="input-item">
                                    <input class="submit" type="submit" name="btnNewsAdd" value="Đăng Tin" />
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <label>Chế Độ Xem</label>
                                <div class="input-item">
                                    <select name="rdoPublic">
                                        <option value="Y" selected="">Công Khai</option>
                                        <option value="N">Bản Nháp</option>
                                    </select>
                                </div>
                            </div>
                                                
                            <div class="input-group">
                                <label>Chuyên Mục</label>
                                <div class="input-item fixright">
                                    <select name="sltCate">
                                        <option value="none">Chọn Chuyên Mục</option>
                                        <?foreach ($catelist as $cate_item) {?>
                                            
                                            <option value="<?= $cate_item["cateid"]?>"
                                                <?if (isset($_POST["sltCate"]) && $_POST["sltCate"] == $cate_item["cateid"]) {?>
                                                     selected="selected" 
                                                <?}?> > <?= $cate_item["cate_name"]?>
                                            </option>
                                        <?}?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <label>Ảnh Đại Diện</label>
                                <div class="input-item">
                                    <p class="upload-photo"><input id="post-img" type="file" name="fImg" /><img id="preview-img" src="#" alt=""/></p>
                                    <p class="note">Nhấp vào để sửa hoặc cập nhật</p>
                                </div>
                            </div>
                            

                            
                            
                            
                            <div class="input-group">
                                <label>SEO Title</label>
                                <div class="input-item">
                                    <input type="text" name="txtSource"<?
                                    if (isset($_POST["txtSource"])) {?>
                                        value="<?= htmlspecialchars($_POST["txtSource"])?>"
                                    <?}?> placeholder="<?=txtTitle?>"/>
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <label>SEO Description</label>
                                <div class="input-item">
                                    <textarea name="txtIntro" placeholder="<?=txtDescription?>"><? if (isset($_POST["txtIntro"])) {echo $_POST["txtIntro"];}?></textarea>
                                </div>
                            </div>
                            
                        </div>
                        
                    </form>

                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->


    </div>




    <?php require('templates/footer_default.php');?>
