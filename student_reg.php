<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
  <title>STUDENT SIGNUP PAGE</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <div class="c8" >
 <h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY</h1>
</div>

  <div class="sgnhd"style="margin:100px auto 0px";>
  	<h2>Student Registration Form</h2>
  </div>
	
  <form class="sgnup" method="post" action="student_reg.php">
<table>
  <tr>
    <div class="input-group">
      <td style="padding-left:10px";><label><b>Enrollment Date</label></td>
      <td style="padding-left:10px";><input type="date" style="padding-left:29px" name="enrollmentdate" required="" id="hasta" value="<?php echo date('d-m-y');?>"></td>
    </div>
  
    <div class="input-group"style="text-align:center">
      <td style="padding-left:10px"><label><b>Student Name</label></td>
      <td style="padding-left:5px"><input type="student_name" name="student_name" required=""></td>
    </div>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
</tr>

  <tr>
    <div class="input-group"style="text-align:center">
      <td style="padding-left:10px"><label><b>Address</label></td>
      <td style="padding-left:10px"><input type="address" name="address" required=""></td>
    </div>
  
    <div class="input-group"style="text-align:center">
     <td style="padding-left:10px"><label><b>Course</label></td>
      <td style="padding-left:5px"><input type="course" name="course" required=""></td>
    </div>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
</tr>

  <tr>
    <div class="input-group"style="text-align:center">
      <td style="padding-left:10px"><label><b>Student ID</label></td>
      <td style="padding-left:10px"><input type="ID" name="ID" required="" ></td>
    </div>
  
  	<div class="input-group"style="text-align:center">
  	  <td style="padding-left:10px"><label><b><b>Email</label></td>
  	  <td style="padding-left:5px"><input type="email" name="email" required=""></td>
  	</div>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
    </tr>

  <tr>
  	<div class="input-group"style="text-align:center">
  	  <td style="padding-left:10px"><label><b>Password</label></td>
  	  <td style="padding-left:10px"><input type="password" name="password_1" required=""></td>
  	</div>
  
  	<div class="input-group"style="text-align:center">
  	  <td style="padding-left:10px"><label><b>Confirm password</label></td>
  	  <td style="padding-left:5px"><input type="password" name="password_2" required=""></td>
  	</div>

  </tr>

</table>

<table> 
  <tr>  
  	<div class="input-group">
  	  <td style="padding-left:298px"><button type="submit" class="btn" name="reg_user">Register</button></td>
  	</div>
</table>
  <?php
require('db.php');
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $enrollmentdate = mysqli_real_escape_string($db, $_POST['enrollmentdate']);
  $ID = mysqli_real_escape_string($db, $_POST['ID']);
  $student_name = mysqli_real_escape_string($db, $_POST['student_name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $course = mysqli_real_escape_string($db, $_POST['course']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
if($password_1 != $password_2) {
die ('Passwords didn\'t match');
 }
$sql="SELECT * FROM student_reg WHERE (email='$email');";

      $res=mysqli_query($db,$sql);
      if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if($email==$row['email'])
        {
            echo "<p style='color:red;font-weight:bold;'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ".$email."&nbsp; Already Exists. </p>";
        }
    
       } else{ // if condition ends here if it is new entry, echo will work
            echo "alright";

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = ($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO student_reg (Enroll_Date, ID, student_name, address, course, email, password) 
          VALUES('$enrollmentdate','$ID','$student_name', '$address', '$course', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['student_name'] = $student_name;
    //$_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}
}
?>
</form>
</body>
</html>