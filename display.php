<html>
<head>
  <title>Registration Data</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body
    {
     background: linear-gradient(to right, #99004d 0%, #3F00FF 100%);
   }
   table
   {
    background-color: white;
  }

  .update{
    background-color: green;
    color: white;
    border: 0;
    outline: none;
    border-radius: 3px;
    height: 22px;
    width: 80px;
    font-weight: bold;
    cursor: pointer;
  }

  .delete{
    background-color: red;
    color: white;
    border: 0;
    outline: none;
    border-radius: 3px;
    height: 22px;
    width: 80px;
    font-weight: bold;
    cursor: pointer;
  }

  .btn{
    margin-left: 100px;
    font-size: larger;
    background-color: whitesmoke;
    position: relative;
  }

</style>
</head>
</html>

<?php
include("connecation.php");
error_reporting(1);

$query = "SELECT * FROM tbl_student";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

//echo $total;

if($total != 0)
{ 
  ?>

  <h2 align="center"><mark>Student Registration Data</mark></h2>
  <table align="center" border="1" cellspacing="9" width="92%">
    <tr>
      <th width=10%>Id</th>
      <th width=10%>First Name</th>
      <th width=10%>Last Name</th>
      <th width=20%>E-Mail</th>
      <th width=10%>Phone Number</th>
      <th width=10%>Gender</th>
      <th width=10%>class</th>
      <th width=12%>Operations</th>
    </tr> 

    <?php
    while($result = mysqli_fetch_assoc($data))

      {   echo "<tr>
    <td>".$result['reg_id']."</td>
    <td>".$result['first_name']."</td>
    <td>".$result['last_name']."</td>
    <td>".$result['email_address']."</td>
    <td>".$result['phone_number']."</td>
    <td>".$result['gender']."</td>
    <td>".$result['standard']."</td>

    <td><a href='update.php?id1=$result[reg_id]'><input type='button' name='submit'value='UPDATE' class='update'></a>

    <a href='delete.php?id1=$result[reg_id]'><input type='submit' value='DELETE' class='delete' onclick='return checkdelete()'></a></td>

    </tr>";

  }
}
else
{
  echo "<script>alert('No Records In Student Registration Table')</script>";
}
?>  
</table>

<script >
  function checkdelete()
  {
    return confirm('Are You Sure You Want To Delete This Record ?');
  }
</script>

<div class="container">
  <!-- <p>Log-out icon on a styled link button: -->
    <a href="login.php" class="btn btn-info lock">
      <span class="fa fa-log-out"></span> Log Out
    </a>
  </p>
</div>