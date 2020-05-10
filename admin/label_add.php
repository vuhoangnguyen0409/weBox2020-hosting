<?php

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php", "strip_uni.php", "fix_upload_name.php", "get_ext.php"));

// Sau khi nhấn nút submit form
if (isset($_POST["btnLabelAdd"])) {
    // Kiểm ra dữ liệu đầu vào
    if (empty($_POST["txtLabel"])) {
        ErrorHandler::setError('Vui lòng nhập tên thẻ');
    } elseif (empty($_FILES["fImg"]["name"])) {
        ErrorHandler::setError('Vui lòng chọn hình thẻ');
    } elseif (!Label::acceptUpload($_FILES["fImg"]["name"])) {
        ErrorHandler::setError('Bạn không được phép upload loại file này');
    } else {
        $label = new Label();
        $label->setLabelName($_POST["txtLabel"]);
        $label->setLabelImg($_FILES["fImg"]["name"]);
        // trước khi thêm ta kiểm tra xem đã tồn tại danh mục có tên trùng với nội dung người dùng đã nhập?
        if ($label->checkExistsLabel()) {
            ErrorHandler::setError('Danh mục này đã tồn tại. Vui lòng chọn tên khác');
        }
        if (!$label->uploadLabelImg('fImg', '../data/label_img')) {
            ErrorHandler::setError('Quy trình upload xảy ra lỗi. Vui lòng thử lại');
        } else {
            // Thêm
            $label->addLabel();
            header("location: label_list.php");
            exit();
        }
    }
}
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
                        <h3 class="h3-line">Thêm Thẻ</h3>
                        <p class="num-count">Bạn có thể thêm các Thẻ cho Bài Viết</p>
                    </div>
                </div>

                <!-- Start Right Content-->
                <div class="content cate-page">
                        <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
                            <?php if (ErrorHandler::hasError()) {?>
                                <div class="input-group">
                                    <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                                </div>
                            <?php }?>
                            <div class="input-group">
                                <label>Tên Thẻ:</label>
                                <div class="input-item">
                                    <input type="text" name="txtLabel"<?php if (isset($_POST["txtLabel"])) {?> value="<?php echo htmlspecialchars($_POST["txtLabel"])?>" <?php }?>/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Ảnh Thẻ</label>
                                <div class="input-item">
                                    <p class="upload-photo"><input id="post-img" type="file" name="fImg" /><img id="preview-img" src="#" alt=""/></p>
                                    <p class="note">Nhấp vào để sửa hoặc cập nhật<br /><?php implode(", ", $accept_upload_ext)?>.</p>
                                </div>
                            </div>
                            <div class="input-group">
                                <label></label>
                                <div class="input-item">
                                    <input type="submit" name="btnLabelAdd" value="Thêm Thẻ" />
                                </div>
                            </div>
                        </form>


                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->


    </div>
