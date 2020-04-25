<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Kiểm tra xem có nhận được thông tin khóa chính của danh mục cần sửa hay không
if (!isset($_GET["id"])) {
    header("location: cate_list.php");
    exit();
}
$id = $_GET["id"];

// Lấy thông tin của danh mục để đổ vào form
$cate = new Cate();
$cate->getCateInfoById($id);

// Sau khi nhấn nút submit form
if (isset($_POST["btnCateEdit"])) {
    if (empty($_POST["txtCate"])) {
        ErrorHandler::setError('Vui lòng nhập tên danh mục');
    } else {
        $cate->setCateName($_POST["txtCate"]);
        if ($cate->checkExistsCate()) {
            ErrorHandler::setError('Danh mục này đã tồn tại. Vui lòng chọn tên khác');
        } else {
            $cate->editCate($id);
            header("location: cate_list.php");
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
                        <h3 class="h3-line">Chỉnh Sửa Chuyên Mục</h3>
                        <p class="num-count">Nhập thông tin cần cập nhật vào mục bên dưới</p>
                    </div>

                </div>

                <!-- Start Right Content-->
                <div class="content cate-page">
                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>?id=<?php echo $id?>" method="post">
                        <?php if (ErrorHandler::hasError()) {?>
                            <div class="input-group">
                                <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                            </div>
                        <?php }?>
                        <div class="input-group">
                            <label>Tên danh mục:</label>
                            <div class="input-item">
                                <input type="text" name="txtCate"
                                <?php if (isset($_POST["txtCate"])) {?>
                                    value="<?php echo htmlspecialchars($_POST["txtCate"])?>"
                                <?php } else {?>
                                    value="<?php echo htmlspecialchars($cate->getCateName())?>"
                                <?php }?>/>
                            </div>
                        </div>
                        <div class="input-group">
                            <label></label>
                            <div class="input-item">
                                <input type="submit" name="btnCateEdit" value="Cập Nhật" />
                            </div>
                            <div class="input-item">
                                <a href="cate_list.php" />Huỷ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?php require('templates/footer_default.php')?>
