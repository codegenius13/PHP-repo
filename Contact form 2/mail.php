<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to = "ikuerowob@gmail.com";
$subject = "Mail From Website";

$headers = "From:" .$name."\r\n";
$txt = "You have received an e-mail from".$name ."\r\nEmail:" .$email ."\r\nMessage:".$message;
if ($email!=NULL) {
    mail($to, $subject, $txt, $headers);
}
header("location:Thankyou.html")

?>