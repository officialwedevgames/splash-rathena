<?php

$online = $onlineNow;
$pcount = $playerCount;


// Display Result
if($loginOnline AND $charOnline AND $mapOnline) {
    $status = '<font color="green">ONLINE</font>';
} else {
    $status = '<font color="red">OFFLINE</font>';
}


$username = $message = $email = "";
$error = false;
$register = new login();


if ( isset( $_POST['submit'] ) ) {
    $username = stripcslashes(trim($_POST['username']));
    $pass = stripcslashes(trim($_POST['pasword']));
    $cpasword = stripcslashes(trim($_POST['cpasword']));
    $email = stripcslashes(trim($_POST['email']));
    $sex = $_POST['sex'];
    $bday = $_POST['yr']."-".$_POST['month']."-".$_POST['day'];
    
    $message .= "<ul>";
    if ( strlen($username) < 4 ) {
        $message .= "<li>Username must be of minimim 4 Character.</li>";
        $error = true;
    }
    if ( strlen($pass) < 4 ) {
        $message .= "<li>Password must be of minimim 4 Character.</li>";
        $error = true;
    }
    if ( strcasecmp( $pass, $cpasword) != 0 ) {
        $message .= "<li>Passwords do not match.</li>";
        $error = true;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message .= "<li>Invalid Email Address.</li>";
        $error = true;
    }
    if( $_SESSION['code'] != trim($_POST['captcha']) )
    {
      $message .= "<li>Security code doesn't match.</li>";
      $error = true;
    }
    $message .= "</ul>";

    if( !$error ):
        if( $message = $register->Register($username, $pass, $sex, $email, $bday) )
        {
          
        } else {
          $message = $register->message;
          $error = true;
        }
    endif;
}
?>