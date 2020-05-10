<?php

sleep(1);
require("phpnc75_platform.php");
if (empty($_POST["name"]) || empty($_POST["tel"]) || empty($_POST["email"]) ) {
    echo 'Miss';
} else {
    $content = addslashes(nl2br($_POST["content"]));
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $date = time();
    $id = $_POST["id"];
    require("libs/connect_db.php");
    // Thêm contact vào CSDL
    $sql_add = 'insert into contact(contact_name, contact_tel, contact_email, contact_content, contact_date) values("' .$name. '", ' .$tel. ', "' .$email. '", "' .$content. '", ' .$date. ')';
    $mysqli->query($sql_add);
    $msg = "Bạn có yêu cầu website từ sdt: '.$tel.' và email: '.$email.'";
    //mail("vuhoangnguyen49@gmail.com","WEBBOX",$msg);
    echo '
    <div class="contact_respone">
        <h3>Cám ơn '.$name.' đã quan tâm, chúng tôi sẽ liên hệ với bạn sớm nhất!</h3>
    </div>';
}
?>
