<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>

  <title>ADMIN LOGIN PAGE</title>

  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<div class="c8" >
  <h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY</h1>
</div>


  <div class="header"style="margin: 125px auto 0px";>
  	<h2>Admin Login Form</h2>
  </div>

  <form method="post" action="admin_login.php">
  
  	<div class="input-group" style="text-align:center";>
  		<label style="padding-left:38px";><b>Admin Name</label>
  		<input type="text" name="adminname" required="">
  	</div>

  	<div class="input-group" style="text-align:center";>
  		<label style="padding-left:38px";><b>Password</label>
  		<input type="password" name="password" required="">
  	</div>

  	<div class="input-group"  style="text-align:center";>
  		<button type="submit" class="btn" name="admin_login"><b>Login</button>
  	</div>

    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
    
  </form>
  <?php
  require('db.php');
  $a1_name="";
  $a2_name="";
  $pwd1="";
  $pwd2="";

  if (isset($_POST['admin_login'])) {
  $a1_name = mysqli_real_escape_string($db,$_POST['adminname']);
  echo "Your entered student name :".$a1_name;
  $pwd1 = mysqli_real_escape_string($db, $_POST['password']);
  echo "<br>";
  echo "Your entered Password :".$pwd1;
  
 
    $query = "SELECT * FROM admin_signup WHERE adminname='$a1_name' AND password='$pwd1' ";
    $results = mysqli_query($db, $query);

    while($row = mysqli_fetch_object($results))
    {
    echo "<br>";
    $a2_name = $row->adminname;
   // echo "database data - 1:".$row->$adminname;
    echo "<br>";
    $pwd2=$row->password;
    //echo "database data - 2:".$pwd2;
   }

   if($a1_name===$a2_name && $pwd1===$pwd2)
    {
      echo "<br>";
      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    YOUR LOGIN IS SUCCESSFUL !!! ";

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin_signup WHERE adminname='$adminname' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
     $query = "INSERT INTO admin_login (adminname , password) 
          VALUES('$a2_name' , '$pwd2')";
    mysqli_query($db, $query);
   $_SESSION['adminname'] = $a2_name;
//$_SESSION['success'] = "You are now logged in";
    header('location: admin_optionspage.php');



  }else
  if ( $a1_name !== $a2_name && $pwd1 !== $pwd2) {
    echo "<br>";
    echo "<p style='color:red;font-weight:bold;'>Incorrect Admin Name / Password !!</p>";

    
  }
}

   ?>
</body>
</html>