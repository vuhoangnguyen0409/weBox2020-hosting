<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Sau khi nhấn nút submit form
if (isset($_POST["btnCateAdd"])) {
    // Kiểm ra dữ liệu đầu vào
    if (empty($_POST["txtCate"])) {
        ErrorHandler::setError('Vui lòng nhập tên danh mục');
    } else {
        $cate = new Cate($_POST["txtCate"]);
        // trước khi thêm ta kiểm tra xem đã tồn tại danh mục có tên trùng với nội dung người dùng đã nhập?
        if ($cate->checkExistsCate()) {
            ErrorHandler::setError('Danh mục này đã tồn tại. Vui lòng chọn tên khác');
        } else {
            // Thêm
            $cate->addCate();
            header("location: cate_list.php");
            exit();
        }
    }
}
require('templates/header_default.php');
?>


<body id="admin-page">
    <div class="left-admin-header">
        <?php include('../inc/admin-left-menu.php')?>
    </div>

    <div class="right-admin-header">
        <?php include('../inc/admin-top-menu.php')?>

        <!-- Start Right Content Wrap-->
        <div class="ct-wrap">
            <div class="ct-wrap-inner">
                <div class="breadcrumb">
                    <div class="bread-tit">
                        <h3 class="h3-line">Thêm Chuyên Mục</h3>
                        <p class="num-count">Bạn có thể thêm các chuyên mục cho Bài Viết</p>
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
                                <label>Tên danh mục:</label>
                                <div class="input-item">
                                    <input type="text" name="txtCate"<?php if (isset($_POST["txtCate"])) {?> value="<?php echo htmlspecialchars($_POST["txtCate"])?>" <?php }?>/>
                                </div>
                            </div>
                            <div class="input-group">
                                <label></label>
                                <div class="input-item">
                                    <input type="submit" name="btnCateAdd" value="Thêm Chuyên Mục" />
                                </div>
                            </div>
                        </form>


                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->


    </div>




    <?php include('../inc/footer.php');?>


<?
echo '
<div class="module">
    <h3>Thông Tin Danh Mục</h3>
    <div class="content">
        <form action="' .$_SERVER["PHP_SELF"]. '" method="post">';
            if (ErrorHandler::hasError()) {
                echo '<div class="input-group">
                    <div class="error_msg">' .ErrorHandler::getError(). '</div>
                </div>';
            }
            echo '
            <div class="input-group">
                <label>Tên danh mục:</label>
                <div class="input-item">
                    <input type="text" name="txtCate"';
                    if (isset($_POST["txtCate"])) {
                        echo ' value="' .htmlspecialchars($_POST["txtCate"]). '"';
                    }
                    echo ' />
                </div>
            </div>
            <div class="input-group">
                <label></label>
                <div class="input-item">
                    <input type="submit" name="btnCateAdd" value="Thêm danh mục" />
                </div>
            </div>
        </form>
    </div>
</div>';
require('templates/footer_default.php');

?>
