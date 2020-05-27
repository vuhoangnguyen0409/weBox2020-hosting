<div class="jquery-modal blocker">
    <div class="pop-price modal">

    <a href="#" class="close-pop-up">CLOSE</a>
    <h2 class="title">BẢNG GIÁ DỊCH VỤ</h2>

   <div class="price-wrap">

        <div class="left">

            <!-- Tab links -->
            <div class="price-tab">
              <button class="tablinks active" onclick="openCity(event, 'Onepage')">Web One Page</button>
              <button class="tablinks" onclick="openCity(event, 'DoanhNghiep')">Web Doanh Nghiệp</button>
              <button class="tablinks" onclick="openCity(event, 'BanHang')">Web Bán Hàng</button>
              <button class="tablinks" onclick="openCity(event, 'ChupHinh')">Chụp Hình Sản Phẩm</button>
            </div>
            <!-- Tab content -->
            <div id="pop-agency">
                <div class="pop-agency-wrap">
                    <div class="pop-agency-inner">
                        <?php include('inc/agency-slide.php')?>
                    </div>
                </div>
            </div>
        </div>

        <div class="right">
            <div id="Onepage" class="tabcontent">
                <?php include('inc/price-one-page.php')?>
            </div>

            <div id="DoanhNghiep" class="tabcontent">
                <?php include('inc/price-business-page.php')?>
            </div>

            <div id="BanHang" class="tabcontent">
                <?php include('inc/price-shop-page.php')?>
            </div>
            <div id="ChupHinh" class="tabcontent">
                <?php include('inc/price-photo-page.php')?>
            </div>

        </div>


    </div>



</div>
</div>
