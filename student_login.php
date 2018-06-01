<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
  <title>STUDENT LOGIN FORM</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <div class="c8" >
  <h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY</h1>
</div>

  <div class="header" style="margin:130px auto 0px;width:26%;">
  	<h2><b>Student Login</h2>
  </div>
	 
  <form method="post" action="student_login.php" style="width:26%;">
  	
  	<div class="input-group"style="text-align:center">
  		<label style="padding-left:38px";><b>Student Name</label>
  		<input type="text" name="student_name" required="">
  	</div>

  	<div class="input-group"style="text-align:center">
  		<label style="padding-left:38px";><b>Password</label>
  		<input type="password" name="password" required="">
  	</div>

  	<div class="input-group" style="text-align:center";>
  		<button type="submit" class="btn" name="student_login"><b>Login</button>
  	</div>

  </form>
  <?php 
  require('db.php');
  $s1_name="";
  $s2_name="";
  $pwd1="";
  $pwd2="";

/*$sql = "SELECT ID FROM student_reg";
$result = $db->query($sql);
 
if ($result->num_rows > 0)
 {
    // output data of each row
    while($row = mysqli_fetch_array($result))
    {
      //echo "<br>";
    //echo "".$row['ID'];
    
    
      $ID=$row["ID"];
    }
 }*/

  if (isset($_POST['student_login'])) {
  $s1_name = mysqli_real_escape_string($db,$_POST['student_name']);
  //echo "Your entered student name :".$s1_name;
  $pwd1 = mysqli_real_escape_string($db, $_POST['password']);
  //echo "<br>";
  
             
    
    $query = "SELECT * FROM student_reg WHERE student_name='$s1_name' AND password='$pwd1' ";
    $results = mysqli_query($db, $query);

    while($row = mysqli_fetch_object($results))
    {
       $ID=$row->ID;
    $s2_name = $row->student_name;
    $pwd2=$row->password;
    //echo "database data - 2:".$pwd2;
   }

   if($s1_name===$s2_name && $pwd1===$pwd2)
    {
    
  
     $query = "INSERT INTO student_login (ID ,student_name) 
          VALUES('$ID','$s2_name')";
    mysqli_query($db, $query);
   $_SESSION['student_name'] = $s1_name;
    $_SESSION['ID'] = $ID;
//$_SESSION['success'] = "You are now logged in";
    header('location: student_options.php');



  }else
  if ( $s1_name !== $s2_name && $pwd1 !== $pwd2) {

    echo "&nbsp;<p style='color:red;font-weight:bold;'>Incorrect Admin Name / Password !!</p>";

    
  }
}

 ?>
  
</body>
</html>