<div id="form--popup">
    <div id="comment_msg"></div>
    <form role="form" id="contact_form" method="post">
       <div class="w3-modal-content">
          <div class="w3-container">
            <div class="item-wrap">
                <p class="item-avatar"><img src="" alt=""/></p>
                <p class="item-name"></p>
            </div>
            <label><input type="text" class="form-control" name="name" id="name" placeholder="Họ Tên"></label>
            <label><input type="text" class="form-control" name="tel" id="tel" placeholder="Điện Thoại"></label>
            <label><input type="text" class="form-control" name="email" id="email" placeholder="Email"></label>
            <label><textarea style="display:none;" class="form-control" name="message" id="message" rows="5" placeholder="Nội dung....">yêu cầu giao diện</textarea></label>
            <label><input style="display:none;" type="text" class="form-control" name="code" id="code" value="'.$id.'"></label>
            <label><input type="submit" class="free-call submit-ajax" value="Hoàn Tất" /></label>
          </div>
       </div>
    </form>
    <p class="txt">Tư vấn viên sẽ gọi lại tư vấn cho bạn <em>Miễn Phí</em> hoàn toàn </p>
</div>