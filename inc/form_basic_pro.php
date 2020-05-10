<?php 
    function filter( $data ) {
		$data = strip_tags( $data );
		$data = trim( htmlentities( $data, ENT_QUOTES, "UTF-8" ) );
		if ( get_magic_quotes_gpc() )$data = stripslashes( $data );
		return $data;
	}
	//submit lan 1
	if ( isset( $_POST ) && !empty( $_POST['submit01'] ) ) {
		$isValue = true;
		foreach ( $_POST as $key => $value ) {
			$_SESSION[ 'entry' ][ $key ] = filter( $value ); //got step2...
		}
		$packet = ( ( isset( $_POST['packet'] ) ) ? $_POST['packet'] : "" );
		$_SESSION['entry']['packet'] = $packet;
		$install = ( ( isset( $_POST['install'] ) ) ? $_POST['install'] : "" );
		$_SESSION['entry']['install'] = $install;
		$shop = ( ( isset( $_POST['shop'] ) ) ? $_POST['shop'] : "" );
		$_SESSION['entry']['shop'] = $shop;
		$seo = ( ( isset( $_POST['seo'] ) ) ? $_POST['seo'] : "" );
		$_SESSION[ 'entry' ][ 'seo' ] = $seo;
		$mentain = ( ( isset( $_POST['mentain'] ) ) ? $_POST['mentain'] : "" );
		$_SESSION[ 'entry' ]['mentain'] = $mentain;
		$basic_price = ( ( isset( $_POST['basic_price'] ) ) ? $_POST['basic_price'] : "" );
		$_SESSION[ 'entry' ]['basic_price'] = $basic_price;
		
		//info khach hang
		$name = ( ( isset( $_POST[ 'name' ] ) ) ? $_POST[ 'name' ] : "" );
		$_SESSION[ 'entry' ][ 'name' ] = $name;
		$tel = ( ( isset( $_POST[ 'tel' ] ) ) ? $_POST[ 'tel' ] : "" );
		$_SESSION[ 'entry' ][ 'tel' ] = $tel;
		$mail = ( ( isset( $_POST[ 'mail' ] ) ) ? $_POST[ 'mail' ] : "" );
		$_SESSION[ 'entry' ][ 'mail' ] = $mail;
		print_r($_SESSION);
		//send mail//dia chi nguoi gui
    $to = $_SESSION[ 'entry' ][ 'mail' ];
    //dia chi admin  nguyen.daiha@yahoo.com   vantungnv@gmail.com
    $from_addr = 'vuhoangnguyen49@gmail.com, nguyen.daiha@yahoo.com, vantungnv@gmail.com, tungtungnvt@yahoo.com';////////////// thay doi email admin
    $subject = "Email xác nhận";
    $message = 'NỘI DUNG EMAIL';
    $message .= '=======================================' . "\n";
    $message .= 'TÊN: ' . $_SESSION[ 'entry' ][ 'name' ] . "\n";
    $message .= 'SỐ ĐIỆN THOẠI: ' . $_SESSION[ 'entry' ][ 'tel' ] . "\n";
    $message .= 'E-MAIL: ' . $_SESSION[ 'entry' ][ 'mail' ] . "\n";
    $message .= 'NỘI DUNG: bạn đã đăng ký gói website: '. "\n";
    $message .= $_SESSION[ 'entry' ][ 'packet' ]. "\n";
    $message .= $_SESSION['entry']['install'].' '.$_SESSION['entry']['shop'].' '.$_SESSION[ 'entry' ][ 'seo' ].' '.$_SESSION[ 'entry' ]['mentain']. "\n";
	$message .= $_SESSION[ 'entry' ][ 'basic_price' ]. "vnd \n";
    $message .= 'Chúng tôi sẽ liên hệ với bạn sớm nhất' . "\n";
    $message .= '=======================================' . "\n";
    $message .= "\n" . 'NGÀY THÁNG : ' . date( 'Y/m/d H:i:s A' ) . "\n";
    
    
    
    // lay ten nguoi gui gan vao header gui cho admin
    $from_name = $_SESSION[ 'entry' ][ 'name' ];
    $from_name = mb_convert_encoding( $from_name, 'JIS', 'UTF-8' );
    //$from_name = '=?iso-2022-jp?B?' . base64_encode( $from_name ) . '?=';
    $from = "" . $from_name;
    
    // header gui cho khach hang
    $header = "X-Mailer: PHP5\n";
    $header .= "From: http://www.thietkewebphuquoc.com \n";
    $header .= "MIME-Version: 1.0\n";
    $header .= "Content-Type: text/plain; charset=\"utf-8\"\n";
    
    // header gui cho admin
    $header2 = "X-Mailer: PHP5\n";
    $header2 .= "From: $from\n";
    $header2 .= "MIME-Version: 1.0\n";
    $header2 .= "Content-Type: text/plain; charset=\"utf-8\"\n";

    if ( mail( $from_addr, $subject, $message, $header2 ) ) {
	//mail to customer
	mail( $to, $subject, $message, $header );
	unset( $_POST );
	unset( $_SESSION[ 'entry' ] );
	session_destroy();
	echo '<script>
				   alert("Bạn đã đăng ký thành công!");
				   location.href = "index.html";
				   
            </script>';
}
		
	}
	
	
    
    define('$siteURL', 'http://www.thietkewebphuquoc.com/');
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
?>