<?php
include("connecation.php");
$id = $_GET['user'];
?>

<?php
  if(isset($_POST['submit']))
  {
    $email = $_POST['mail'];
    $passwd = $_POST['passwd'];

    $sql = "SELECT * FROM tbl_student WHERE email_address = '$email' and user_otp = '$passwd' ";
    $result = mysqli_query($conn,$sql); 
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
      header("Location:new_password_create.php?user=".$email);
      exit();
    }
    else
    {
      echo "<script>alert('You Have Enter Wrong OTP')</script>";
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

  <title>Forgot Password</title>
</head>
<body>

  <div class="container"> <h2>Verify Your Email Address</h2> 
    <div class="form-container">
      <form action="" method="POST">

      <div class="input-name">        
          <i class="fa fa-envelope lock"></i>
          <input type="email" id="mail" class="text-name" name="mail" value="<?php echo $id;?>" readonly>
      </div>    
      
      <div class="input-name">        
          <i class="fa fa-lock lock"></i>
          <input type="text" id="" maxlength="6" class="text-name" placeholder="Enter Youe 6 Digit OTP Here" name="passwd" required >
        </div>
        
        <div class="input-name">
          <input type="submit" class="button" value="Verify" name="submit">
          <script>
            function myFunction()
            {
              window.location.href="http://localhost/student_registration/new_password_create.php";
            }
          </script>
        </div>
      </div>
    </body>
    </html>
