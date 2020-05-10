<?php

require('../phpnc75_platform.php');
loadLibs(array("check_admin.php"));

// Sau khi nhấn nút submit form
if (isset($_POST["btnContactAdd"])) {
    // Kiểm ra dữ liệu đầu vào
    if (empty($_POST["contactName"])) {
        ErrorHandler::setError('Vui lòng nhập tên');
    }
     elseif (empty($_POST["contactEmail"])) {
        ErrorHandler::setError('Vui lòng nhập Email');
    } elseif (empty($_POST["contactTel"])) {
        ErrorHandler::setError('Vui lòng nhập SDT');
    } else {
        $contact = new Contact();
        $contact->setContactName($_POST["contactName"]);
        $contact->setContactEmail($_POST["contactEmail"]);
        $contact->setContactTel($_POST["contactTel"]);
        $contact->addContact();
        header("location: contact_list.php");
        exit();
    }
}

?>

<!--
                              ____
          \ \  /   \  / /   /      \
           \ \/ / \ \/ /   |  |  |  |
            \__/   \__/     \ ____ /

    DESIGN BY WEBBOX | THIETKEWEBPHUQUOC.COM
    AUTHOR : NGUYEN DAI HA & VU HOANG NGUYEN
    WEBSITE: WWW.THIETKEWEBPHUQUOC.COM
-->
<?php // Gọi phần đầu giao diện
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
                        <h3 class="h3-line">Thêm Liên hệ</h3>
                        <p class="bread-sub">Vui lòng điền đầy đủ thông tin</p>
                    </div>
                </div>

                <!-- Start Right Content-->
                <div class="content">
                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                        <?php if (ErrorHandler::hasError()) {?>
                                <div class="error_msg"><?php echo ErrorHandler::getError()?></div>
                        <?php }?>
                        <div class="input-group">
                            <label>Tên liên hệ</label>
                            <div class="input-item">
                                <input type="text" name="contactName"<?php  if (isset($_POST["contactName"])) {?> value="<?php htmlspecialchars($_POST["contactName"])?>" <?php }?>/>

                            </div>
                        </div>
                        <div class="input-group">
                            <label>Điện Thoại</label>
                            <div class="input-item">
                                <input type="tel" name="contactTel" />

                            </div>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <div class="input-item">
                                <input type="email" name="contactEmail" />
                            </div>
                        </div>
                        <div class="input-group btn-submit">
                            <div class="input-item">
                                <input type="submit" name="btnContactAdd" value="Thêm Thành Viên" />
                            </div>
                        </div>

                    </form>
                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->


    </div>

    <?php// require('templates/footer_default.php');?>
