<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>MASTER SIGNUP FORM</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <div class="c8" >
  <h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY</h1>
</div>

  <div class="header"style="margin:120px auto 0px;width:49%;">
    <h2>Master Admin Registration Form</h2>
  </div>
   
  <form class="sgnup" method="post" action="master_signup.php"; >
<table>
   <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
 <tr>
  <div class="input-group">
      <td><label style="padding-left:20px;"><b>Enrollment Date</label></td>
      <td style="padding-left:15px;"><input style="padding-left:29px;" type="date" name="enrollmentdate" required="" id="hasta" value="<?php echo date('d-m-y');?>"></td>
  </div>
   <div class="input-group">
      <td><label style="padding-left:20px;"><b>Admin Name</label></td>
      <td style="padding-left:15px;"><input type="text" name="adminname" required="" >
    </td></div>
     <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
</tr>

<tr>
  <div class="input-group">
        <td><label style="padding-left:20px;"><b>Mobile_no</label></td>
        <td style="padding-left:15px;"><input type="mobile_no" name="mobile_no" required=""></td>
 </div>
  <div class="input-group">
      <td><label style="padding-left:20px;"><b>Password</label></td>
      <td style="padding-left:15px;"><input type="password" name="password" required=""></td>
    </div>
     <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
</tr>
</table>
<table>
     <div class="input-group" >
      <td style="padding-left:290px;" ><button type="submit" class="btn" name="master_signup"><b>Sign Up</button>
    </td>
    </div>
</table>
  
  <?php
require('db.php');
if (isset($_POST['master_signup'])) {
  // receive all input values from the form
  $enrollmentdate = mysqli_real_escape_string($db, $_POST['enrollmentdate']);
  $adminname = mysqli_real_escape_string($db, $_POST['adminname']);
  $mobile_no = mysqli_real_escape_string($db, $_POST['mobile_no']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  
  $sql="SELECT * FROM master_signup WHERE (adminname='$adminname');";

      $res=mysqli_query($db,$sql);
      if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if($adminname==$row['adminname'])
        {
            echo "<p style='color:red;font-weight:bold;'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ".$adminname."&nbsp; Already Exists. </p>";
        }
    
       } else{ // if condition ends here if it is new entry, echo will work
            echo "alright";

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = ($password);

    $query = "INSERT INTO master_signup (enrollmentdate,adminname,mobile_no,password) 
          VALUES('$enrollmentdate' , '$adminname','$mobile_no','$password')";
    mysqli_query($db, $query);
    $_SESSION['adminname'] = $adminname;
   // $_SESSION['success'] = "You are now signed up";
    header('location: master_options.php');
  }
}
}

?>
</form>
</body>
</html>