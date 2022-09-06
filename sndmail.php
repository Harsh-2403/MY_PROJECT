<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "testm3308@gmail.com";
$mail->FromName = "Bits Infotech";

//To address and name
$mail->addAddress("godhaniyaharsh665@gmail.com", "Dear User");
$mail->addAddress("godhaniyaharsh665@gmail.com", "Dear User"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("testm3308@gmail.com", "Reply");

// //CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Password Reset OTP";
$mail->Body = "<i>Hey, Dear User This Is One Time Password For Reset Your Password</i>";
$mail->AltBody = "This System Generated Mail Don't Replay To This Mail";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}

?>