<?php

require ("PHPMailer/PHPMailerAutoload.php");

function  send_email_forgot($email,$msg,$subject,$company_store_name)
{
    
     // $cc_email_id = "";
     $name = $company_store_name;
    
     $mail = new PHPMailer();
     $mail->IsSMTP();
     $mail->SMTPAuth = true;
     // $from_email_id = $employee_email;
     $from_email_id = "attendance@footprintapp.in";

    
    // //    ===================================================================
    // //    JUST EDIT BELOW FIVE LINES
    // //    ===================================================================
     $mail->Host = "mail.footprintapp.in";                    // Enter "mail.my-domain.com"
     
     // $mail->Host = "localhost";                    // Enter "mail.my-domain.com"
     $mail->Username = $from_email_id;            // Enter an email address created through cPanel
     $mail->Password = "Attendance@2019";                        // Enter the email password created through cPanel
     
     $mail->AddAddress("$email","$name"); // Enter the recipient "to" email address
     $mail->Subject = $subject;        // For subject "Any Preferred Email Subject";


     

     $mail->From = $from_email_id;
     $mail->FromName = $name;
     $mail->WordWrap = 50;
     $mail->IsHTML(true);
     $mail->Body = $msg;
     $mail->AltBody ="Name    : {$name}\n\nEmail   : {$from_email_id}\n\nMessage : {$msg}";
     $mail->SMTPDebug  = 0;                                // Change to "2" to see full SMTP connection output

     if(!$mail->Send())
     {
         echo "Message could not be sent. <p>";
         echo "Mailer Error: " . $mail->ErrorInfo;
     }
         
}

?>