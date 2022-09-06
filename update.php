<?php include("connecation.php"); 

$id = $_GET['id1'];

$query = "SELECT * FROM tbl_student WHERE reg_id= '$id' ";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>

<?php
    if(isset($_POST['update'])) //submit button name
    {
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $email    = $_POST['mail'];
        $phone    = $_POST['phone'];
        $gend     = $_POST['rbutn'];
        $standard = $_POST['class']; 

        $fname=mysqli_real_escape_string($conn,$_POST['fname']);
        $lname=mysqli_real_escape_string($conn,$_POST['lname']);
        $query = "UPDATE tbl_student SET first_name = '$fname', last_name = '$lname', email_address = '$email',phone_number = '$phone', gender = '$gend', standard = '$standard'  WHERE reg_id = '$id'";
        $data = mysqli_query($conn,$query);

        if($data)
        {
            echo "<script>alert('Your Details Updated Successfully')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = http://192.168.1.129/student_registration/display.php"/>
            <?php
        }
        else
        {
            echo "<script>alert('Your Record Not Update')</script>";
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

        <title>Update</title>
    </head>
    <body>

        <div class="container"> <h2>Update Student Details</h2> 
            <div class="form-container">

                <form action="" method="POST">
                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="text" placeholder="Enter First Name" value="<?php echo $result['first_name']; ?>"  class="name" name="fname" required title="Enter Your First Name">
                        <span> 
                            <i class="fa fa-user lock"></i>
                            <input type="text" placeholder="Enter Last name" value="<?php echo $result['last_name']; ?>" class="name" name="lname" required title="Enter Your Last Name">
                        </span>
                    </div>

                    <div class="input-name">
                        <i class="fa fa-envelope  email"></i>
                        <input type="email" id="mail" placeholder="Enter Your Email Address" value="<?php echo $result['email_address']; ?>" class="text-name" name="mail" title="Enter Your Email Address" required oninput="this.setCustomValidity('')"oninvalid="this.setCustomValidity('please enter a valid email address')"/ >
                    </div>          

                    <div class="input-name">                
                        <i class="fa fa-phone lock"></i>
                        <input type="tel" maxlength="10" onselectstart="return false" onpaste="return false" oncopy="return false" oncut="return false" ondrag="return false" ondrop="return false"  autocomplete=off id="myfrom_phone" placeholder="Enter Your Phone Number (DO NOT WRITE +91)" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"class="text-name" name="phone" pattern="[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}" value="<?php echo $result['phone_number']; ?>" title="Enter Your Phone Number" required
                        oninput="this.setCustomValidity('')"
                        oninvalid="this.setCustomValidity('please enter a 10 digit valid phonr number')"/>
                    </div>

                    <script>
                        if ( window.history.replaceState ) 
                        {
                            window.history.replaceState( null, null, window.location.href );
                        }
                    </script>
                    <script>
                        var phone_input = document.getElementById("myform_phone");

                        phone_input.addEventListener('input',() => {
                          phone_input.setCustomValidity('');
                          phone_input.checkValidity();
                      });

                        phone_input.addEventListener('invalid', () => {
                          if(phone_input.value === '') 
                          {
                            phone_input.setCustomValidity('Enter phone number!');
                        } else {
                            phone_input.setCustomValidity('Enter Valid Phone Number');
                        }
                    });
                </script>   

                <script type="text/javascript">
                    $("input[type='tel']").on("keyup",(e)=>
                    {
                        let mobile_no=e.target.value
                        if(mobile_no.length>9)
                        {
                            $.ajax(
                            {
                                url:'check_mobile.php',
                                method:'POST',
                                data:{mobile:mobile_no},
                                success:(response)=>
                                {
                                    if(response=="true"){
                                        alert("This mobile number is allready exists.")
                                    }
                                }
                            })
                        }
                    })
                </script>       

                <div class="input-name">
                    <input type="radio" value="male" class="radio-button" required name="rbutn"
                    <?php                
                    if ($result['gender'] == "male") 
                    {
                        echo "checked";
                    }
                    ?>
                    ><label style="margin-right: 30px;" >Male</label>            
                    <input type="radio" value="female" class="radio-button" required name="rbutn"
                    <?php                
                    if ($result['gender'] == "female") 
                    {
                        echo "checked";
                    }
                    ?>
                    ><label >Female</label>
                </div>

                <div class="input-name">                
                    <select class="standard" name="class" title="Select Your Class" required>
                        <option value="1st"
                        <?php 
                        if($result['standard'] == '1st')
                        {
                            echo "Selected";
                        }
                        ?>
                        >1St</option>
                        <option value="2nd"
                        <?php 
                        if($result['standard'] == '2nd')
                        {
                            echo "Selected";
                        }
                        ?>
                        >2Nd</option>
                        <option value="3rd"
                        <?php 
                        if($result['standard'] == '3rd')
                        {
                            echo "Selected";
                        }
                        ?>
                        >3Rd</option>
                        <option value="4th"
                        <?php 
                        if($result['standard'] == '4th')
                        {
                            echo "Selected";
                        }
                        ?>
                        >4Th</option>
                        <option value="5th"
                        <?php 
                        if($result['standard'] == '5th')
                        {
                            echo "Selected";
                        }
                        ?>
                        >5Th</option>
                        <option value="6th"
                        <?php 
                        if($result['standard'] == '6th')
                        {
                            echo "Selected";
                        }
                        ?>
                        >6Th</option>
                        <option value="7th"
                        <?php 
                        if($result['standard'] == '7th')
                        {
                            echo "Selected";
                        }
                        ?>
                        >7Th</option>
                        <option value="8th"
                        <?php 
                        if($result['standard'] == '8th')
                        {
                            echo "Selected";
                        }
                        ?>
                        >8Th</option>
                        <option value="9th"
                        <?php 
                        if($result['standard'] == '9th')
                        {
                            echo "Selected";
                        }
                        ?>
                        >9Th</option>
                        <option value="10th"
                        <?php 
                        if($result['standard'] == '10th')
                        {
                            echo "Selected";
                        }
                        ?>
                        >10Th</option>
                        <option value="11th(commerce)"
                        <?php 
                        if($result['standard'] == '11th(commerce)')
                        {
                            echo "Selected";
                        }
                        ?>
                        >11Th(Commerce)</option>
                        <option value="11th(arts)"
                        <?php 
                        if($result['standard'] == '11th(arts)')
                        {
                            echo "Selected";
                        }
                        ?>
                        >11Th(Arts)</option>
                        <option value="11th(science)"
                        <?php 
                        if($result['standard'] == '11th(science)')
                        {
                            echo "Selected";
                        }
                        ?>
                        >11Th(Science)</option>
                        <option value="12th(commerce)"
                        <?php 
                        if($result['standard'] == '12th(commerce)')
                        {
                            echo "Selected";
                        }
                        ?>
                        >12Th(Commerce)</option>
                        <option value="12th(arts)"
                        <?php 
                        if($result['standard'] == '12th(arts)')
                        {
                            echo "Selected";
                        }
                        ?>
                        >12Th(Arts)</option>
                        <option value="12th(science)"
                        <?php 
                        if($result['standard'] == '12th(science)')
                        {
                            echo "Selected";
                        }
                        ?>
                        >12Th(Science)</option>
                    </select>

                    <div class="arrow"></div>               
                </div>

                <div class="input-name" >
                    <input type="submit" class="button" value="Update Details" name="update">
                </div>
            </form>
        </body>
        </html>