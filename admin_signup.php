<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
  <title>ADMIN SIGNUP PAGE</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body> 

<div class="c8">
 <h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY</h1>
</div>

  <div class="sgnhd"style="margin:100px auto 0px";>
  	<h2>Admin Registration Form</h2>
  </div>
	
 <form class="sgnup" method="post" action="admin_signup.php">

    <table>
      <tr>
    <div class="input-group">
      <tr><td><label style="padding-left:280px";><b>Enrollment Date</label></td></tr>
      <tr><td style="padding-left:250px";><input style="padding-left:45px"type="date" name="enrollmentdate" required="" id="hasta" value="<?php echo date('d-m-y');?>"></td></tr>
    </div>
  </tr>
 </table>
 <table>
  <tr>
    <div></div>
  </tr>
  <tr>
    <div class="input-group" style="text-align:center">
      <td><label  style="padding-left:10px";><b>Admin name</label></td>
      <td style="padding-left:15px";><input type="text" name="adminname" required=""></td>
    </div>
  
    <div class="input-group">
      <td style="padding-left:25px";><label><b>Email ID</label></td>
      <td style="padding-left:7px";><input type="email" name="email" required=""></td>
    </div>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
  </tr>
  
  <tr>
    <div class="input-group" style="text-align:center">
      <td  style="padding-left:10px";><label><b>Designation</label></td>
      <td  style="padding-left:15px";><input type="text" name="designation" required=""></td>
    </div>
 
    <div class="input-group" style="text-align:center">
      <td style="padding-left:25px"><label><b>Mobile Number</label></td>
      <td style="padding-left:10px";><input type="mobile_no" name="mobile_no" required=""></td>
    </div>
  </tr>
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
  <tr>
    <div class="input-group" style="text-align:center">
      <td style="padding-left:10px";><label><b>Password</label></td>
      <td style="padding-left:10px";><input type="password" name="password_1" id="password" required=""></td>
    </div>

    <div class="input-group" style="text-align:center">
      <td style="padding-left:25px"><label><b>Confirm password</label></td>
      <td style="padding-left:10px";><input type="password" name="password_2" id="confirm_password" required=""></td>
    </div>
  </tr>
 </table>
<table>
  <tr>
    <div class="input-group" >
      <td style="padding-left:300px"><button type="submit" class="btn" name="admin_signup"><b>Register</button></td>
    </div>
  </tr>
</table>

<?php

  require('db.php');
  $email="";
  if (isset($_POST['admin_signup'])) {
  // receive all input values from the form
  $enrollmentdate = mysqli_real_escape_string($db, $_POST['enrollmentdate']);
  $adminname = mysqli_real_escape_string($db, $_POST['adminname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $designation = mysqli_real_escape_string($db, $_POST['designation']);
  $mobile_no = mysqli_real_escape_string($db, $_POST['mobile_no']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
   if($password_1 != $password_2) {
die ('Passwords didn\'t match');
 }
  $sql="SELECT * FROM admin_signup WHERE (email='$email');";

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
      $password =($password_1);  
      $query = "INSERT INTO admin_signup (enrollmentdate, adminname, email, designation, mobile_no, password) 
          VALUES('$enrollmentdate', '$adminname', '$email', '$designation', '$mobile_no', '$password')";
    mysqli_query($db, $query);
    $_SESSION['adminname'] = $adminname;
    //$_SESSION['success'] = "Your Registration was successfull";
    header('location:index.php');
}
}
?>
</form>
</body>
</html>