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

// Sau khi submit
if (isset($_POST["btnLabelEdit"])) {
    if (empty($_POST["txtLabel"])) {
        ErrorHandler::setError('Vui lòng nhập tên thẻ');
    }  else {
        $label->setLabelName($_POST["txtLabel"]);
        if ($label->checkExistsLabel()) {
            ErrorHandler::setError('Thẻ này đã tồn tại. Vui lòng chọn tên khác');
        }
        // Kiểm tra lỗi upload
        else if (!empty($_FILES["fImg"]["name"])) {
            $newLabel = clone $label;
            $newLabel->setLabelImg($_FILES["fImg"]["name"]);
            //if (!Label::acceptUpload($_FILES["fImg"]["name"])) {
                //ErrorHandler::setError('Bạn không được phép upload loại file này');
                //print "<pre>";
                //print_r($_FILES["fImg"]["name"]);
                //print "</pre>";
                //die();
            //} else {
                if (!$newLabel->uploadLabelImg('fImg')) {
                    ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
                } else {
                    $newLabel->editLabel($id);
                    $label->delLabelImage();
                    header("location: label_list.php");
                    exit();
                }
            //}
        } else {
            $label->editLabel($id);
            header("location: label_list.php");
            exit();
        }
    }
}

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
                        <h3 class="h3-line">Chỉnh Sửa Thẻ Tag</h3>
                        <p class="num-count">Nhập thông tin cập nhật vào mục bên dưới</p>
                    </div>

                </div>

                <!-- Start Right Content-->
                <div class="content cate-page">
                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                        <?php if (ErrorHandler::hasError()) {?>
                            <div class="input-group">
                                <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                            </div>
                        <?php }?>

                        <div class="input-group">
                            <label>Thẻ TAG</label>
                            <div class="input-item">
                                <input type="text" name="txtLabel"
                                <?php if (isset($_POST["txtLabel"])) {?>
                                    value="<?php echo htmlspecialchars($_POST["txtLabel"])?>"
                                <?php } else {?>
                                    value="<?php echo htmlspecialchars($label->getLabelName())?>"
                                <?php }?>/>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Ảnh Đại Diện</label>
                            <div class="input-item">
                                <p class="upload-photo"><input id="post-img" type="file" name="fImg" /><img id="preview-img" src="../data/label_img/<?php echo $label->getLabelImg()?>" alt=""/></p>
                                <p class="note">Nhấp vào để sửa hoặc cập nhật<br /><?php echo implode(", ", $accept_upload_ext)?>.</p>
                            </div>
                        </div>
                        <div class="input-group">
                            <label></label>
                            <div class="input-item">
                                <input type="submit" name="btnLabelEdit" value="Cập Nhật" />
                            </div>
                            <div class="input-item">
                                <a href="label_list.php" />Huỷ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<?require('templates/footer_default.php')?>
