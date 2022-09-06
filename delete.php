<?php
include("connecation.php");

$id = $_GET['id1'];
$query = "DELETE FROM tbl_student WHERE reg_id = '$id' ";
$data = mysqli_query($conn,$query);

if($data)
{
	echo "Recored Deleted";
	?>
		<meta http-equiv = "refresh" content = "0; url = http://192.168.1.129//student_registration/display.php" />
	<?php
}
else
{
	echo "Failed To Deleted";
}

?>