<?php

//error_reporting(0);

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "student_registration";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
		// echo "You Are Successfully Connected With The Database......";
}
else
{
	echo "connecation failed".mysqli_connect_error();
}
?>