<?php

// use PHPMailer\PHPMailer\PHPMailer;

include("connecation.php");
// include("function.php");
?>

<?php

if (isset($_POST['register'])) 
{
	$fname    = $_POST['fname'];
	$lname    = $_POST['lname'];
	$email    = $_POST['mail'];
	$pwd      = md5($_POST['password']);
	$phone    = $_POST['phone_number'];
	$gend	  = $_POST['rbutn'];
	$standard = $_POST['class'];

	$query1 = "SELECT * FROM tbl_student WHERE phone_number = '$phone' and email_address = '$email'";
	$fire = mysqli_query($conn, $query1) or die("can not fire query to select phone number or email address" .mysqli_query($conn, $fire));

	if (mysqli_num_rows($fire) > 1) {
		echo "<script>alert('phone number or email address already existed check your email address or phone number and try again..')</script>";
	} else {
		$digits = 6;
		$otp = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$query = "INSERT INTO tbl_student (`first_name`, `last_name`, `email_address`, `password`, `phone_number`, `gender`, `standard` , user_otp)VALUES('$fname','$lname','$email','$pwd','$phone','$gend','$standard', '$otp')";

		$data = mysqli_query($conn, $query);

		// $msg = "Hi, $fname $lname Your OTP For Verify  Your Email Address Is # $otp </br> ";

		// $subject  ="Here Is OTP For Verify Your Email Address";
		// $company_store_name = "Bits Infotech";
		
		// send_email_forgot($email,$msg,$subject,$company_store_name);		
	
		if ($data) {
			// header("verify_otp.php");
			header("Location:verify_otp.php?user=".$email);
			exit();
		} else {
			echo "<script>alert('phone number or email address already existed check your email address or phone number and try again..')</script>";
		}
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="registration.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<title>Registration Form</title>
</head>
<body>
	<div class="container">
		<h2>Registration Form</h2>
		<div class="form-container">

			<form name="registration" action="" onsubmit="return validateform()" method="POST">
				<div class="input-name">
					<i class="fa fa-user lock"></i>
					<input type="text" placeholder="Enter First Name" id="f_name" class="name" name="fname" title="Enter Your First Name" required>
					<span>
						<i class="fa fa-user lock"></i>
						<input type="text" placeholder="Enter Last name" id="l_name" class="name" name="lname" title="Enter Your Last Name" required>
					</span>
				</div>

				<div class="input-name">
					<i class="fa fa-envelope  email"></i>
					<input type="email" id="mail" placeholder="Enter Your Email Address" class="text-name" name="mail" title="Enter Your Email Address" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('please enter a valid email address')" / required>
				</div>

				<div class="input-name">
					<i class="fa fa-lock lock"></i>
					<input type="Password" required placeholder="Enter Your Password" class="text-name" name="password" id="myinput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter and one special character, and at least 8 or more characters" title="Enter Your Password" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Password Must Be Required contain at least one number and one uppercase and lowercase letter one special character and at least 8 or more characters')" />
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
					<i class="fa fa-phone lock"></i>
					<input type="tel" required maxlength="10" onselectstart="return false" onpaste="return false" oncopy="return false" oncut="return false" ondrag="return false" ondrop="return false" autocomplete=off id="myfrom_phone" placeholder="Enter Your Phone Number (DO NOT WRITE +91)" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="text-name" name="phone_number" pattern="[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}" value="" title="Enter Your Phone Number" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('please enter a 10 digit valid phonr number')" />
				</div>

				<script>
					if (window.history.replaceState) {
						window.history.replaceState(null, window.location.href);
					}
				</script>
				<script>
					var phone_input = document.getElementById("myform_phone");

					phone_input.addEventListener('input', () => {
						phone_input.setCustomValidity('');
						phone_input.checkValidity();
					});

					phone_input.addEventListener('invalid', () => {
						if (phone_input.value === '') {
							phone_input.setCustomValidity('Enter phone number!');
						} else {
							phone_input.setCustomValidity('Enter Valid Phone Number');
						}
					});
				</script>

				<script type="text/javascript">
					$("input[type='tel']").on("keyup", (e) => {
						let mobile_no = e.target.value
						if (mobile_no.length > 9) {
							$.ajax({
								url: 'check_mobile.php',
								method: 'POST',
								data: {
									mobile: mobile_no
								},
								success: (response) => {
									if (response == "true") {
										alert("This mobile number is allready exists.")
									}
								}
							})
						}
					})
				</script>

				<div class="input-name">
					<input type="radio" required value="male" required class="radio-button" name="rbutn">
					<label style="margin-right: 30px;">Male</label>
					<input type="radio" required value="female" required class="radio-button" name="rbutn">
					<label>Female</label>
				</div>

				<div class="input-name">
					<select class="standard" name="class" value="Select Your Class"  oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('please select standard')" / required>
						<option value="">Select Your Class</option>
						<option value="1st">1St</option>
						<option value="2nd">2Nd</option>
						<option value="3rd">3Rd</option>
						<option value="4th">4Th</option>
						<option value="5th">5Th</option>
						<option value="6th">6Th</option>
						<option value="7th">7Th</option>
						<option value="8th">8Th</option>
						<option value="9th">9Th</option>
						<option value="10th">10Th</option>
						<option value="11th(commerce)">11Th(Commerce)</option>
						<option value="11th(arts)">11Th(Arts)</option>
						<option value="11th(science)">11Th(Science)</option>
						<option value="12th(commerce)">12Th(Commerce)</option>
						<option value="12th(arts)">12Th(Arts)</option>
						<option value="12th(science)">12Th(Science)</option>
					</select>
					<div class="arrow"></div>
				</div>
				<div class="input-name">
					<input type="checkbox" required id="cb" class="check-button">
					<label for="cb" class="check">𝐈 𝐀𝐜𝐜𝐞𝐩𝐭 𝐓𝐡𝐞 𝐓𝐞𝐚𝐫𝐦𝐬 𝐀𝐧𝐝 𝐂𝐨𝐧𝐝𝐢𝐭𝐢𝐨𝐧𝐬</label>
				</div>

				<div class="input-name">
					<input type="submit" class="button" value="submit" name="register">
					<!-- <script>
			function myFuncation()
			{
				window.location.href="http://localhost/student_registration/verify_otp.php";
			}
		</script> -->
				</div>

			</form>
			<div class="title" name="log"> Already Member ? <a href='login.php'> Login </a> Here </div>
		</div>
</body>
</html>