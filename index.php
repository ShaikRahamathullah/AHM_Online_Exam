<?php 
  session_start(); 

  if (!isset($_SESSION['adminname'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login_home.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['adminname']);
  	header("location: login_home.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="c8">
 <h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY</h1>
</div>

  <div class="header"style="margin:100px auto 0px;width:25%;">
    <h2>HOME</h2>
  </div>
<form class="sgnup" style="width:25.7%;">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
<br>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['adminname'])) : ?>
    <p style="text-align:left;color:#000080;text-align:center;text-transform:uppercase;">Your Registration was Successfull</p>
    <br>
        <p style="text-align:center;"><a href="master_options.php" style="color:black;">BACK</a> </p>
 <br>
    <?php endif ?>
</form>
		
</body>
</html>