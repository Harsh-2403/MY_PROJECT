<?php

include("connecation.php");

$to_email = "godhaniyaharsh665@gmail.com";
$subject = "Simple Email Test Via Php";
$body = "Hi, This Is Test Mail Send By Php Script";
$headers = "From: testm3308@gmail.com";

if(mail($to_email, $subject, $body, $headers))
{
	echo "Email successfully sent to $to_email...";
}else{
	echo "Email Sending Fail...";
}

?>