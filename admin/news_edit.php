<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "strip_uni.php", "fix_upload_name.php", "get_ext.php"));

if (!isset($_GET["id"])) {
    header("location: news_list.php");
}
$id = $_GET["id"];

// Lấy thông tin bản tin để vào form
$news = new News();
$news->getNewsInfoById($id);
// Lấy thông tin danh mục đổ vào listbox
$cate = new Cate();
$catelist = $cate->listAllCate();

// Sau khi submit
if (isset($_POST["btnNewsEdit"])) {
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
    } else {
        $news->setNewsTitle($_POST["txtTitle"]);
        $news->setNewsSource($_POST["txtSource"]);
        $news->setNewsIntro($_POST["txtIntro"]);
        $news->setNewsFull($_POST["txtFull"]);
        $news->setNewsPublic($_POST["rdoPublic"]);
        $news->setNewsCate($_POST["sltCate"]);
        
        // Kiểm tra lỗi upload
        if (!empty($_FILES["fImg"]["name"])) {
            $newNews = clone $news;
            $newNews->setNewsImg($_FILES["fImg"]["name"]);
            if (!News::acceptUpload($_FILES["fImg"]["name"])) {
                ErrorHandler::setError('Bạn không được phép upload loại file này');
            } else {
                if (!$newNews->uploadNewsImg('fImg')) {
                    ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
                } else {
                    $newNews->editNews($id);
                    $news->delNewsImage();
                }
            }
        } else {
            $news->editNews($id);
        }
        header("location: news_list.php");
        exit();
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
                
                    <form class="form" action="<?=$_SERVER["PHP_SELF"]?>?id=<?=$id?>" method="post" enctype="multipart/form-data">
                    <?if (ErrorHandler::hasError()) {?>
                        <div class="input-group">
                            <div class="error_msg"><?= ErrorHandler::getError()?></div>
                        </div>
                    <?}?>
                    
                        <div class="ct-left">
                            <div class="input-group">
                                <label>Tiêu Đề</label>
                                <div class="input-item">
                                    <input type="text" name="txtTitle"<?
                                    if (isset($_POST["txtTitle"])) {?>
                                        value="<?= htmlspecialchars($_POST["txtTitle"])?>"
                                    <?} else {?>
                                        value="<?= htmlspecialchars($news->getNewsTitle())?>"
                                    <?}?>/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Nội Dung</label>
                                <div class="input-item fixright">
                                    <textarea name="txtFull" rows="10">
                                    <?if (isset($_POST["txtFull"])) {
                                        echo $_POST["txtFull"];
                                    } else {
                                        echo str_replace('{$siteURL}', $siteURL, $news->getNewsFull());
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
                                    <input class="submit" type="submit" name="btnNewsEdit" value="Cập Nhật" />
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Chế Độ Xem</label>
                                <div class="input-item">
                                    <select name="rdoPublic">
                                        <option value="Y" <?if ($news->getNewsPublic() == 'Y') {?> selected=""<?}?>> Công Khai</option>
                                        <option value="N" <?if ($news->getNewsPublic() == 'N') {?> selected=""<?}?>> Bản Nháp</option>
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
                                            <?} else {
                                                if ($news->getNewsCate() == $cate_item["cateid"]) {?>
                                                    selected="selected"
                                                <?}
                                            }?>><?=$cate_item["cate_name"]?></option>
                                        <?}?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Ảnh Đại Diện</label>
                                <div class="input-item">
                                    <p class="upload-photo"><input id="post-img" type="file" name="fImg" /><img id="preview-img" src="../data/news_img/<?=$news->getNewsImg()?>" alt=""/></p>
                                    <p class="note">Nhấp vào để sửa hoặc cập nhật<br /><?=implode(", ", $accept_upload_ext)?>.</p>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>SEO Title</label>
                                <div class="input-item">
                                    <input type="text" name="txtSource"
                                    <?if (isset($_POST["txtSource"])) {?>
                                        value="<?=htmlspecialchars($_POST["txtSource"])?>"
                                    <?} else {?>
                                        value="<?=htmlspecialchars($news->getNewsSource())?>"
                                    <?}?>/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>SEO Description</label>
                                <div class="input-item">
                                    <textarea name="txtIntro" rows="5"><?if (isset($_POST["txtIntro"])) {
                                        echo $_POST["txtIntro"];
                                    } else {
                                        echo $news->getNewsIntro();
                                    }?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <?php require('templates/footer_default.php');?>
<?
echo '
<div class="module">
    <h3>Thông Tin Bản Tin</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '?id=' .$id. '" method="post" enctype="multipart/form-data">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
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
                                if ($news->getNewsCate() == $cate_item["cateid"]) {
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
                <label>Tiêu đề:</label>
                <div class="input-item">
                    <input type="text" name="txtTitle"';
                    if (isset($_POST["txtTitle"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtTitle"]). '"';
                    } else {
                        echo ' value="' .htmlspecialchars($news->getNewsTitle()). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label>Nguồn tin:</label>
                <div class="input-item">
                    <input type="text" name="txtSource"';
                    if (isset($_POST["txtSource"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtSource"]). '"';
                    } else {
                        echo ' value="' .htmlspecialchars($news->getNewsSource()). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label>Trích dẫn:</label>
                <div class="input-item">
                    <textarea name="txtIntro" rows="5">';
                    if (isset($_POST["txtIntro"])) {
                        echo $_POST["txtIntro"];
                    } else {
                        echo $news->getNewsIntro();
                    }
                    echo '</textarea>
                </div>
            </div>
            <div class="input-group">
                <label>Nội dung:</label>
                <div class="input-item fixright">
                    <textarea name="txtFull" rows="10">';
                    if (isset($_POST["txtFull"])) {
                        echo $_POST["txtFull"];
                    } else {
                        echo str_replace('{$siteURL}', $siteURL, $news->getNewsFull());
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
                <label>Hình tin hiện tại:</label>
                <div class="input-item">
                    <img src="../data/news_img/' .$news->getNewsImg(). '" class="thumbs" />
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
                <label>Công bố:</label>
                <div class="input-item">
                    <label><input type="radio" name="rdoPublic" value="Y"';
                    if ($news->getNewsPublic() == 'Y') {
                        echo ' checked="checked"';
                    }
                    echo ' /> Có</label>
                    <label><input type="radio" name="rdoPublic" value="N"';
                    if ($news->getNewsPublic() == 'N') {
                        echo ' checked="checked"';
                    }
                    echo ' /> Không</label>
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnNewsEdit" value="Sửa tin" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>