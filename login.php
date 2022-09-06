<?php   
include("connecation.php"); 
?>

<?php
if(isset($_POST['login']))
{
  $mail = $_POST['email'];  
  $pass = md5($_POST['password']);    

  $sql = "SELECT * FROM tbl_student WHERE email_address = '$mail' AND password = '$pass'";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);
  // echo "<pre>";
  // print_r($count);
  // exit();

  if($count == 1)
  {  
    header("location:display.php"); 
  }  
  else
  {  
    echo "<script>alert('Login Failed....')</script>";
  }  
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="login.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <title>Login Page</title>
</head>
<body>

  <div class="container"> <h2>Login</h2> 
    <div class="form-container">
      <form action="" method="POST">
        <div class="input-name">
          <i class="fa fa-envelope email"></i>
          <input type="email" id="mail" placeholder="Enter Your Email Address" class="text-name" name="email" title="Enter Your Email Address" required oninput="this.setCustomValidity('')"oninvalid="this.setCustomValidity('please enter a valid email address')"/ >
        </div>

        <div class="input-name">
          <i class="fa fa-lock lock"></i>
          <input type="Password" placeholder="Enter Your Password" class="text-name" name="password" id="myinput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title=" Password Must contain at least one number and one uppercase and lowercase letter and one special character, and at least 8 or more characters" title="Enter Your Password" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Password Must Be Required contain at least one number and one uppercase and lowercase letter one special character and at least 8 or more characters')"/>
          <i class="fa fa-eye eye" name="eyes" onclick="PasswordHideShow(this)"></i>
        </div>    

        <script type="text/javascript">
          var isshow=true;
          PasswordHideShow=(e)=>{
            if(isshow){
              e.classList="fa fa-eye-slash eye"
              e.parentElement.children[1].type="text"
              isshow=false;
            }else{
              e.classList="fa fa-eye eye"
              e.parentElement.children[1].type="password"
              isshow=true;
            }
          }              
        </script>    
        <div class="title2" name="forpass"><a href="forgotpass.php">Forgot Password ?</a></div> 

        <div class="input-name" >
          <input type="submit" class="button" value="login" name="login">
        </div>
        <script>
          if ( window.history.replaceState ) 
          {
            window.history.replaceState(null, window.location.href);
          }
        </script>
        
      </form>
      <div class="title" name="log">New member at our website ?<a href='registration.php'>click here</a></div>
    </div>
  </body>
  </html>

