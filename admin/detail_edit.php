<?php

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "strip_uni.php", "fix_upload_name.php", "get_ext.php"));

if (!isset($_GET["id"])) {
    header("location: detail_list.php");
}
$id = $_GET["id"];

// Lấy thông tin bản tin để vào form
$detail = new Detail();
$detail->getDetailInfoById($id);
//var_dump($detail);
//die();
// Lấy thông tin danh mục đổ vào listbox
$cate = new Cate();
$catelist = $cate->listAllCate();
$label = new Label();
$labeLlist = $label->listAllLabel();

// Sau khi submit
if (isset($_POST["btnDetailEdit"])) {
    if ($_POST["sltCate"] == 'none') {
        ErrorHandler::setError('Vui lòng chọn danh mục');
    }
    //elseif ($_POST["sltLabel"] == 'none') {
    //    ErrorHandler::setError('Vui lòng chọn thẻ');
    //}
    elseif (empty($_POST["labelArray"])) {
        ErrorHandler::setError('Vui lòng chọn thẻ');
    }
     elseif (empty($_POST["txtName"])) {
        ErrorHandler::setError('Vui lòng nhập tiêu đề');
    } elseif (empty($_POST["txtIntro"])) {
        ErrorHandler::setError('Vui lòng nhập giới thiệu');
    } elseif (empty($_POST["taKeywords"])) {
        ErrorHandler::setError('Vui lòng nhập SEO keywords');
    } elseif (empty($_POST["taDescription"])) {
        ErrorHandler::setError('Vui lòng nhập SEO description');
    }  elseif (empty($_POST["taContent"])) {
        ErrorHandler::setError('Vui lòng nhập nội dung');
    } else {
        $detail->setDetailName($_POST["txtName"]);
        $detail->setDetailIntro($_POST["txtIntro"]);
        $detail->setDetailKeywords($_POST["taKeywords"]);
        $detail->setDetailDescription($_POST["taDescription"]);
        //$detail->setDetailImg($_FILES["fImg"]["name"]);
        $detail->setDetailContent($_POST["taContent"]);
        $detail->setDetailDate(time());
        $detail->setDetailStatus($_POST["rdoPublic"]);
        $detail->setDetailPoster($_SESSION[$prefix."userid"]);
        $detail->setDetailCate($_POST["sltCate"]);
        $detail->setDetailCate($_POST["sltCate"]);
        //$detail->setDetailLabel($_POST["sltLabel"]);
        $labelArray = implode(",",$_POST["labelArray"]);
        $detail->setLabelArray($labelArray);
        print "<pre>";
        //print_r($labelArray);
        print_r($detail);
        print "</pre>";
        //die();
        // Kiểm tra lỗi upload
        if (!empty($_FILES["fImg"]["name"])) {
            $newDetail = clone $detail;
            $newDetail->setDetailImg($_FILES["fImg"]["name"]);
            //print "<pre>";
            //print_r($detail);
            //print_r($newDetail);
            //print "</pre>";
            //die();
            if (!Detail::acceptUpload($_FILES["fImg"]["name"])) {
                ErrorHandler::setError('Bạn không được phép upload loại file này');
            } else {
                if (!$newDetail->uploadDetailImg('fImg', '../data/detail_img')) {
                    ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
                } else {
                    $newDetail->editDetail($id);
                    $detail->delDetailImage();
                    header("location: detail_list.php");
                    exit();
                }
            }
        } else {
            $detail->editDetail($id);
            header("location: detail_list.php");
            exit();
        }
    }
}

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
                        <h3 class="h3-line">Sửa Bài Viết</h3>
                        <p class="num-count">Nhập thông tin đầy đủ vào các mục trống</p>
                    </div>

                </div>

                <!-- Start Right Content-->
                <div class="content news-page">

                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                        <?php if (ErrorHandler::hasError()) {?>
                            <div class="input-group">
                                <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                            </div>
                        <?php }?>

                        <div class="ct-left">
                            <div class="input-group">
                                <label>Tiêu Đề</label>
                                <div class="input-item">
                                    <input type="text" name="txtName"
                                    <?php if (isset($_POST["txtName"])) {?>
                                        value="<?php echo htmlspecialchars($_POST["txtName"])?>"
                                    <?php } else {?>
                                        value="<?php echo htmlspecialchars($detail->getDetailName())?>"
                                    <?php }?>/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Tóm tắt Nội Dung</label>
                                <div class="input-item">
                                    <textarea name="txtIntro" rows="2"><?php if (isset($_POST["txtIntro"])) {
                                        echo $_POST["txtIntro"];
                                    }else {
                                        echo $detail->getDetailIntro();
                                    }?></textarea>
                                    <p class="note">Phần nội dung này sẽ hiện thị tóm tắt trong các trang hiển thị theo dạng Danh Sách bản tin</p>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Nội Dung</label>
                                <div class="input-item fixright">
                                    <textarea name="taContent" rows="10"><?php if (isset($_POST["taContent"])) {
                                        echo $_POST["taContent"];
                                    } else {
                                        echo str_replace('{$siteURL}', $siteURL, $detail->getDetailContent());
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
                                <label></label>
                                <div class="input-item">
                                    <input type="submit" name="btnDetailEdit" value="Sửa tin" />
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Công bố:</label>
                                <div class="input-item">
                                    <select name="rdoPublic">
                                        <option value="Y" <?php if ($detail->getDetailStatus() == 'Y') {?> selected=""<?php }?>> Công Khai</option>
                                        <option value="N" <?php if ($detail->getDetailStatus() == 'N') {?> selected=""<?php }?>> Bản Nháp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Chuyên Mục</label>
                                <div class="input-item fixright">
                                    <select name="sltCate">
                                        <option value="none">Chọn danh mục</option>
                                        <?php foreach ($catelist as $cate_item) {?>
                                            <option value="<?php echo $cate_item["cateid"]?>"
                                            <?php if (isset($_POST["sltCate"]) && $_POST["sltCate"] == $cate_item["cateid"]) {?>
                                                selected="selected"
                                            <?php } else {
                                                if ($detail->getDetailCate() == $cate_item["cateid"]) {?>
                                                    selected="selected"
                                            <?php }
                                            }?>><?php echo $cate_item["cate_name"]?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Thẻ Tag</label>
                                <div class="input-item fixright">
                                    <?php foreach ($labeLlist as $label_item) {?>
                                        <input type="checkbox" name="labelArray[]" value="<?php echo $label_item["labelid"]?>">
                                        <label for="<?php echo $label_item["label_name"]?>"> <?php echo $label_item["label_name"]?></label><br>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Ảnh Đại Diện</label>
                                <div class="input-item">
                                    <p class="upload-photo"><input id="post-img" type="file" name="fImg" /><img id="preview-img" src="../data/detail_img/<?php echo $detail->getDetailImg()?>" alt=""/></p>
                                    <p class="note">Nhấp vào để sửa hoặc cập nhật<br /><?php echo implode(", ", $accept_upload_ext)?>.</p>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>SEO keywords</label>
                                <div class="input-item">
                                    <textarea name="taKeywords" rows="5"><?php if (isset($_POST["taKeywords"])) {echo $_POST["taKeywords"];
                                    } else {echo $detail->getDetailKeywords();}?></textarea>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>SEO Description</label>
                                <div class="input-item">
                                    <textarea name="taDescription" rows="5"><?php if (isset($_POST["taDescription"])) {echo $_POST["taDescription"];
                                    } else {echo $detail->getDetailDescription();}?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
<?php require('templates/footer_default.php');?>
