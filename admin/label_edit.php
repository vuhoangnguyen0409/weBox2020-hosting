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

// Sau khi nhấn nút submit form
if (isset($_POST["btnLabelEdit"])) {
    if (empty($_POST["txtLabel"])) {
        ErrorHandler::setError('Vui lòng nhập tên label');
    } else {
        $label->setLabelName($_POST["txtLabel"]);
        if ($label->checkExistsLabel()) {
            ErrorHandler::setError('Thẻ này đã tồn tại. Vui lòng chọn tên khác');
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
                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>?id=<?php echo $id?>" method="post">
                        <?if (ErrorHandler::hasError()) {?>
                            <div class="input-group">
                                <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                            </div>
                        <?}?>
                        
                        <div class="input-group">
                            <label>Thẻ TAG</label>
                            <div class="input-item">
                                <input type="text" name="txtLabel"
                                <?if (isset($_POST["txtLabel"])) {?>
                                    value="<?php echo htmlspecialchars($_POST["txtLabel"])?>"
                                <?} else {?>
                                    value="<?php echo htmlspecialchars($label->getLabelName())?>"
                                <?}?>/>
                            </div>
                        </div>
                        <div class="input-group">
                            <label></label>
                            <div class="input-item">
                                <input type="submit" name="btnLabelEdit" value="Cập Nhật" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<?require('templates/footer_default.php')?>
