<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>MASTER LOGIN FORM</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <div class="c8" >
  <h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY</h1>
</div>

  <div class="header"style="margin: 125px auto 0px;width:23%;">
  	<h2>Master Login Form</h2>
  </div>
	 
  <form method="post" action="master_login.php" style="width:23%;">
  
  	<div class="input-group"style="text-align:center">
  		<label style="padding-left:38px";><b>Master Admin Name</label>
  		<input type="text" name="adminname" required="" >
  	</div>
  	<div class="input-group"style="text-align:center">
  		<label style="padding-left:38px";><b>Password</label>
  		<input type="password" name="password" required="">
  	</div>
  	<div class="input-group" style="text-align:center";>
  		<button type="submit" class="btn" name="master_login"><b>Login</button>
  	</div>
    
  </form>
 <?php 
  require('db.php');

  $m1_name="";
  $m2_name="";
  $pwd1="";
  $pwd2="";

  if (isset($_POST['master_login'])) {
  $m1_name = mysqli_real_escape_string($db,$_POST['adminname']);
 // echo "Your entered student name :".$m1_name;
  $pwd1 = mysqli_real_escape_string($db, $_POST['password']);
  echo "<br>";
  //echo "Your entered Password :".$pwd1;
  
 
    $query = "SELECT * FROM master_signup WHERE adminname='$m1_name' AND password='$pwd1' ";
    $results = mysqli_query($db, $query);

    while($row = mysqli_fetch_object($results))
    {
   
    $m2_name = $row->adminname;
   // echo "database data - 1:".$row->$adminname;
    
    $pwd2=$row->password;
    //echo "database data - 2:".$pwd2;
   }

   if($m1_name===$m2_name && $pwd1===$pwd2)
    {
     // echo "<br>";
      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    YOUR LOGIN IS SUCCESSFUL !!! ";


     $query = "INSERT INTO master_login (adminname,password) 
          VALUES('$m2_name' , '$pwd2')";
    mysqli_query($db, $query);
    $_SESSION['adminname'] = $m2_name;
   // $_SESSION['success'] = "You are now logged in";
    header('location: master_options.php');

  }elseif ( $m1_name !== $m2_name && $pwd1 !== $pwd2) {
    
    echo "<p style='color:red;font-weight:bold;'>Incorrect Admin Name / Password !!</p>";

    
  }
}

   ?>
</body>
</html>