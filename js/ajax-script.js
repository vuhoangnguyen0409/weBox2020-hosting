$(document).ready(function() {

    // Sự kiện comment
    $(".submit-ajax").click(function() {
        //return false;
        $("#comment_msg").html('<img src="../images/loading.gif" />');
        var name = $("#name").val();
        var tel = $("#tel").val();
        var email = $("#email").val();
        var content = $("#message").val();
        var id = $("#detail_id").val();
        $.ajax({
            "url": "../contact.php",
            "type": "post",
            "async": true,
            "data": "name="+name+"&tel="+tel+"&email="+email+"&content="+content+"&id="+id,
            "success": function(result_contact) {
                if (result_contact == 'Miss') {
                    $("#comment_msg").html('Vui lòng nhập đầy đủ thông tin');
                } else {
                    $("#comment_msg").html(result_contact);
                }
            }
        });
        return false;
    });

});
