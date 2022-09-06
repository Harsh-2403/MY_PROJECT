<?php
// use PHPMailer\PHPMailer\PHPMailer;

include("connecation.php");
// include("function.php");

?>

<?php
  if(isset($_POST['submit']))
  {
    $email = $_POST['mail'];

    $sql = "SELECT * FROM tbl_student WHERE email_address = '$email' ";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
      header("location:passotp.php");
      $digits = 6;
      $otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

      $query = "UPDATE tbl_student SET user_otp = '$otp' WHERE email_address = '$email'";
      $data = mysqli_query($conn,$query);

    //   $data = mysqli_query($conn,$query);

      // $msg = "HI, $fname $lname Your OTP For Change Your Password is # $otp </br>";

      // $subject = "Here Is OTP For Change Your Login Password";

      // $company_store_name = "Bits Infotech";

      // send_email_forgot($email,$msg,$subject,$company_store_name);
      header("Location:passotp.php?user=".$email);
      exit();
    }
    else
    {
      echo "<script>alert('Check Your Email Address And Try Again')</script>";
    }
  }
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="Registration.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <title>Forgot Your Password</title>
</head>
<body>

  <div class="container"> <h2>Enter Your Email Address</h2> 
    <div class="form-container">
      <form action="" method="POST">

        <div class="input-name">        
          <i class="fa fa-envelope lock"></i>
          <input type="email" id="mail" placeholder="Enter Your Registered Email Address" class="text-name" name="mail">
        </div>
        
        <div class="input-name">
          <input type="submit" class="button" value="Get OTP" name="submit">
          <script>
            function myFunction()
            {
              window.location.href="http://localhost/student_registration/passotp.php";
            }
          </script>
        </div>
      </div>
    </body>
    </html>
