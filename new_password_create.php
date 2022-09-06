<?php   
  include("connecation.php");
  $id = $_GET['user'];
//   $query = "SELECT * FROM tbl_student WHERE email_address = '$email' ";
?>

<?php
if(isset($_POST['submit']))
{
	$email = $_POST['mail'];
	echo $_POST['passwd'];
    $pass = md5($_POST['passwd']);

    $query = "UPDATE tbl_student SET password = '$pass' WHERE email_address = '$email' ";
    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script>alert('Your Password Updated Successfully')</script>";
        ?>
        <meta http-equiv = "refresh" content = "0; url = http://192.168.1.129/student_registration/login.php"/>
        <?php
    }
    else
    {
        echo "<script>alert('Your Password Is Not Update. Try Again.')</script>";
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

  <title>Change Password</title>
</head>
<body>

  <div class="container"><h2>Change Your Login Password</h2> 
    <div class="form-container">
      <form action="" method="POST">

	  <div class="input-name">        
          <i class="fa fa-envelope lock"></i>
          <input type="email" id="mail" class="text-name" name="mail" value="<?php echo $id;?>" readonly>
      </div>

        <div class="input-name">        
          <i class="fa fa-lock lock"></i>
          <input type="password" id="" class="text-name" placeholder="Enter Your New Password" name="passwd" required>
          <i class="fa fa-eye eye" name="eyes" onclick="PasswordHideShow(this)"></i>
        </div>
        <script type="text/javascript">
					var isshow = true;
					PasswordHideShow = (e) => {
						if (isshow) {
							e.classList = "fa fa-eye-slash eye"
							e.parentElement.children[1].type = "text"
							isshow = false;
						} else {
							e.classList = "fa fa-eye eye"
							e.parentElement.children[1].type = "password"
							isshow = true;
						}
					}
					var myInput = document.getElementById("psw");
					var letter = document.getElementById("letter");
					var capital = document.getElementById("capital");
					var number = document.getElementById("number");
					var length = document.getElementById("length");

					// When the user clicks on the password field, show the message box
					myInput.onfocus = function() {
						document.getElementById("myinput").style.display = "block";
					}

					//When the user clicks outside of the password field, hide the message box
					myInput.onblur = function() {
						document.getElementById("myinput").style.display = "none";
					}

					// When the user starts to type something inside the password field
					myInput.onkeyup = function() {
						// Validate lowercase letters
						var lowerCaseLetters = /[a-z]/g;
						if (myInput.value.match(lowerCaseLetters)) {
							letter.classList.remove("invalid");
							letter.classList.add("valid");
						} else {
							letter.classList.remove("valid");
							letter.classList.add("invalid");
						}

						// Validate capital letters
						var upperCaseLetters = /[A-Z]/g;
						if (myInput.value.match(upperCaseLetters)) {
							capital.classList.remove("invalid");
							capital.classList.add("valid");
						} else {
							capital.classList.remove("valid");
							capital.classList.add("invalid");
						}

						// Validate numbers
						var numbers = /[0-9]/g;
						if (myInput.value.match(numbers)) {
							number.classList.remove("invalid");
							number.classList.add("valid");
						} else {
							number.classList.remove("valid");
							number.classList.add("invalid");
						}

						// Validate length
						if (myInput.value.length >= 8) {
							length.classList.remove("invalid");
							length.classList.add("valid");
						} else {
							length.classList.remove("valid");
							length.classList.add("invalid");
						}
					}
				</script>        
        
        <div class="input-name">
          <input type="submit" class="button" value="Change Password" name="submit">
          <script>
            function myFunction()
            {
              window.location.href="http://localhost/student_registration/login.php";
            }
          </script>
        </div>
      </div>
    </body>
    </html>
