<?php

/**
 * @author Jackie Do
 * @copyright 2014
 */

require('../phpnc75_platform.php');
require('../libs/check_admin.php');


/** Thuật toán phân trang **/
// xác định trang hiện tại
if (isset($_GET["page"])) {
    $currentPage = $_GET["page"];
} else {
    $currentPage = 1;
}
// Công thức để xác định vị trí record bắt đầu lấy ra trong CSDL
$startRecord = $rowPerPage * ($currentPage - 1);

// lấy tất cả tài khoản từ CSDL ra
$userlist = new User();
// thông kê dữ liệu
$total_user = $userlist->totalUser();
// Khai báo phân trang
$totalRecord = $userlist->totalUser();
$totalPage =  ceil($totalRecord / $rowPerPage);
$limit = 'limit ' .$startRecord. ', '.$rowPerPage;
// Liet ke User
$list = $userlist->listAllUser($limit);

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
                        <h3 class="h3-line">Danh Sách Thành Viên</h3>
                        <p class="num-count">Bạn hiện đang có : <em><?php echo $total_user?></em> Thành Viên</p>
                    </div>
                    <div class="bread-btn">
                        <div class="btn-down"><a href=""><i class="fa fa-download"></i> Tải xuống</a></div>
                        <div class="btn-add"><a href="/../admin/user_add.php">+</a></div>
                    </div>
                </div>

                <!-- Start Right Content-->
                <div class="content tb-data">
                    <div class="ct-panel">
                        <div class="option-box">

                            <div class="form-wrap w-150px">
                                <select class="form-select form-select-sm select2-hidden-accessible" data-search="off" data-placeholder="Bulk Action" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="3">Bulk Action</option>
                                    <option value="email" data-select2-id="19">Send Email</option>
                                    <option value="group" data-select2-id="20">Change Group</option>
                                    <option value="suspend" data-select2-id="21">Suspend User</option>
                                    <option value="delete" data-select2-id="22">Delete User</option>
                                </select>
                                <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 116px;">
                                    <span class="selection">
                                        <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-85zu-container">
                                            <span class="select2-selection__rendered" id="select2-85zu-container" role="textbox" aria-readonly="true">
                                                <span class="select2-selection__placeholder">Bulk Action</span>
                                            </span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                            </div>

                            <select class="select">
                                <option selected>Thao tác</option>
                                <option>Gửi Email</option>
                                <option>Xóa</option>
                            </select>
                            <button class="btn-apply">Thực hiện</button>
                        </div>
                    </div>
                    <table class="list-table">
                        <tr class="list-heading">
                            <th class="check-all"><input type="checkbox" id="checkall" /><label class="checkmask"></label></th>
                            <th class="id-col">ID</th>
                            <th class="user-col">Tên tài khoản</th>
                            <th class="phone-col">Điện thoại</th>
                            <th class="email-col">Email</th>
                            <th class="role-col">Cấp bậc</th>
                            <th class="action-col">Quản lý</th>
                        </tr>

                        <?php if (empty($list)) {?>
                        <tr class="list-data">
                            <td colspan="4" class="text-center">Chưa có dữ liệu</td>
                        </tr>';
                        <?php } else {
                        $stt = $startRecord;
                        foreach ($list as $user_item) {?>
                            <tr class="list-data">
                                <td class="check-all"><input type="checkbox" id="checkall" /><label class="checkmask"></label></td>
                                <td class="id-data"><?php echo $user_item["userid"]?></td>
                                <td class="user-data"><?php echo $user_item["username"]?></td>
                                <td class="phone-data"><?php echo $user_item["tel"]?></td>
                                <td class="email-data"><?php echo $user_item["email"]?></td>
                                <td class="role-data">
                                    <?php if ($user_item["userid"] == 1) { ?>
                                        Quản trị cấp cao
                                    <?php } elseif ($user_item["level"] == 1) {?>
                                        Quản trị viên
                                    <?php } else {?>
                                        Thành viên
                                    <?php }?>
                                </td>
                                <td class="text-center">
                                    <a href="user_edit.php?id=<?php echo $user_item["userid"]?>"><img src="images/edit.png" /></a>&nbsp;&nbsp;
                                    <a href="user_del.php?id=<?php echo $user_item["userid"]?>" onclick="return xacnhan('Bạn có chắc muốn xóa user có ID là: <?php  echo $user_item["userid"]?>');"><img src="images/delete.png" /></a>
                                </td>
                            </tr>
                    <?php     }
                    }?>
                    </table>

                    <?php
                    // Xuất thanh phân trang
                    if ($totalPage > 1) {
                        // Phân đoạn thanh phân trang
                        if ($pagePerSegment > $totalPage) {
                            $startSegement = 1;
                            $endSegement = $totalPage;
                        } else {
                            // Số trang bên trái trang hiện tại
                            if ($pagePerSegment % 2 == 0) {
                                $leftCurrent = ($pagePerSegment / 2) - 1;
                            } else {
                                $leftCurrent = floor($pagePerSegment / 2);
                            }
                            // Xác định đầu đoạn
                            $startSegement = $currentPage - $leftCurrent;
                            // Xác định cuối đoạn
                            $endSegement = $startSegement + $pagePerSegment - 1;

                            // Nếu đầu đoạn nhỏ hơn
                            if ($startSegement < 1) {
                                $startSegement = 1;
                                $endSegement = $pagePerSegment;
                            }
                            // nếu cuối đoạn lớn tổng số trnag
                            if ($endSegement > $totalPage) {
                                $endSegement = $totalPage;
                                $startSegement = $endSegement - $pagePerSegment + 1;
                            }
                        }
                        ///////////////////////////////////////////////////////////
                    ?>

                    <div class="page-pagination">
                        <div class="pag-lf">
                            <ul class="pag-navi">
                            <?php // Nút trang đầu: chỉ xu61t hiện khi đầu đoạn lớn hơn 1
                            if ($startSegement > 1) { ?>
                                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]?>?page=1">Đầu</a></li>
                                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php echo ($currentPage - 1)?>">Trước</a></li>

                            <?php } // danh sách trang
                            for ($page = $startSegement; $page <= $endSegement; $page++) {
                                if ($page == $currentPage) {?>
                                    <li class="page-item"><a class="page-link current-page" href="#"><?php  echo $page?></a></li>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php echo $page?>"><?php echo $page?></a></li>
                                <?php }

                            }// Nút trang cuối: chỉ xuất hiện khi cuối đoạn nhỏ hơn tổng số trang
                            if ($endSegement < $totalPage) {?>
                                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php  echo ($currentPage+1)?>">Sau</a></li>
                                <li class="page-item"><a class="page-link" href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php  echo $totalPage ?>">Cuối</a></li>
                            <?php }?>
                            </ul>
                        </div>
                        <div class="bread-btn">
                            <div class="btn-down"><a href=""><i class="fa fa-download"></i> Tải xuống</a></div>
                            <div class="btn-add"><a href="/../admin/user_add.php">+</a></div>
                        </div>
                    </div>
                    <?php }?>

                </div><!-- Start Right Content -->
            </div>
        </div><!-- End Right Content Wrap-->


    </div>




    <?php require('templates/footer_default.php');?>
