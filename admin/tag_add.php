<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Sau khi nhấn nút submit form
if (isset($_POST["btnTagAdd"])) {
    // Kiểm ra dữ liệu đầu vào
    if (empty($_POST["txtTag"])) {
        ErrorHandler::setError('Vui lòng nhập tên danh mục');
    } else {
        $tag = new Tag($_POST["txtTag"]);

        // trước khi thêm ta kiểm tra xem đã tồn tại danh mục có tên trùng với nội dung người dùng đã nhập?
        if ($tag->checkExistsTag()) {
            ErrorHandler::setError('Danh mục này đã tồn tại. Vui lòng chọn tên khác');
        } else {
            // Thêm
            $tag->addTag();
            header("location: tag_list.php");
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
                        <form  class="form" action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                            <?php if (ErrorHandler::hasError()) {?>
                                <div class="input-group">
                                    <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                                </div>
                            <?php }?>
                            <div class="input-group">
                                <label>Tên Thẻ:</label>
                                <div class="input-item">
                                    <input type="text" name="txtTag"<?php if (isset($_POST["txtTag"])) {?> value="<?php echo htmlspecialchars($_POST["txtTag"])?>" <?php }?>/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label></label>
                                <div class="input-item">
                                    <input type="submit" name="btnTagAdd" value="Thêm Thẻ" />
                                </div>
                            </div>
                        </form>


                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->


    </div>
