<div class="ct_contact_wrap">
    <div class="inner clearfix">
    
        <!-- Start H2 Title -->
        <div class="h2_line_part hide_ct"> 
            <h2 id="contact">Liên Hệ</h2>
        </div>
        <!-- End H2 Title -->
        
        <div class="col-left fixH">
            <!-- Start Contact Content -->
            <div class="ct_contact hide_ct">
                <address>
                    <span><i class="fa fa-phone"></i> <a href="tel:0918192395">0918 19 23 95</a></span>
                    <span><i class="fa fa-clock-o"></i> 07:00 - 23:00</span>
                    <span><i class="fa fa-envelope-o"></i> <a href="mailto:webboxphuquoc@gmail.com">webboxphuquoc@gmail.com</a></span>
                    <span><i class="fa fa-map-marker"></i> 69/30 Nguyễn Ðình Chính, P.15, Q. Phú Nhuận, TP HCM</span>
                </address>
            </div>
            <!-- End Contact Content -->
        </div>
    
        <div class="col-right fixH hide_ct">
            <div id="map" class="g_map"></div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdqPKcKU1g1ckAUG9ybdDAgTWLqKtmy9c"></script>
            <script type="text/javascript">
            // ???????
            function TigilError() {
              return true;
            }
            window.onerror = TigilError;
            // ??
            var latlng = new google.maps.LatLng(10.795828, 106.6790848);
            var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: latlng,
            scrollwheel: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
              {
                "elementType": "geometry.fill",
                "stylers": [
                  {
                    "saturation": -100
                  }
                ]
              }
            ]
            });
            // ????
            new google.maps.Marker({
              position: latlng,
              map: map
            });
            </script>
        </div>
    </div>
</div>