<?php 
session_start();
 if (!isset($_SESSION['student_name'],$_SESSION['ID'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location:login_home.php');
  }
  if (isset($_GET['logout'])) {
     //$sql_2 = "INSERT INTO student_login(logout_time) VALUES ('".($_SESSION['student_name'])."', NOW())";
       //sql_query($sql_2) or die('sql2: '.mysql_error()); 

    session_destroy();
    unset($_SESSION['student_name']);
    header("location: login_home.php");
  }
?>
<html>
<head>
<title>Student Options</title>
<link rel="stylesheet" type="text/css" href="css/style overview.css">
<style>
table {
    font-family: arial, sans-serif;
    font-size: 13px;
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}

td  {
    border: 3px solid #dddddd;
    text-align: justify;
    padding: 4px;
    font-size: 100%;
    font-style: bold;
}
th{
    border: 3px solid #dddddd;
    text-align: center;
    padding: 4px;
    font-size: 130%;
    font-style: bold;
    
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<div class="c8" >
<h1 style="text-align:center;margin:20px auto 0px;font-family:brittanic bold;font-weight:Lighter;">ENLIGHT EDUCATIONAL ACADEMY
  <a href="student_options.php?logout='1'">
    <img src="image/LGT.png" style="width: 80px;height:45px;float:right;">
  </a>
</h1>
</div>

 <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" style="padding-top:10px;padding-bottom: 10px;">
        <h6>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h6>
      </div>
    <?php endif ?>
<form style="width:20%;float:left;margin-left:50px;margin-top:10px;padding-top:5px;padding-bottom: 5px;">
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['student_name'],$_SESSION['ID'])) : ?>
    <p style="text-align:center;color:#000080;text-transform:uppercase;">
      <b>Welcome</b></p>
      <p style="text-align:left;color:#000080;text-transform:uppercase;">
       <?php echo"Name&nbsp;:&nbsp;&nbsp;".$_SESSION['student_name'] ;
     echo "<br>";
     echo "ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;".$_SESSION['ID']?>
    </strong>
       </p>
    <?php endif ?>
</form>

     <div class="opt"style="margin: 88px auto 0px;width:92%";><h2 align="center">Student Options</h2></div>
<form>

<table style="width: 1100px;margin-left: 70px;">

<th>OPTIONS</th><th>DESCRIPTION</th><th>VIEW PAGE</th>
<tr>
  <td>1. &ensp; Model papers</td>
  <td>To check the previous paper pattern and practise</td>
  <td><a href="model_papers.php">Click here</a></td>
</tr>
<tr>
  <td>2. &ensp; No.of Exams attended</td>
  <td>To check the already attended exams.</td>
  <td><a href=".php">Click here</a></td>
</tr>
<tr>
  <td>3. &ensp; Attended Exams Results</td>
  <td>To check the attended Exams Results.</td>
  <td><a href=".php">Click here</a></td>
</tr>
<tr>
  <td>4. &ensp; Student Scheduled Exam</td>
  <td>To View Scheduled Exams and Attend Scheduled Exam</td>
  <td><a href="Student_Scheduled_Exams.php">Click here</a></td>
</tr>
<tr>
  <td>5. &ensp; Current Exam Result</td>
  <td>To check the Current exam results</td>
  <td><a href="CurrentExamResult.php">Click here</a></td>
</tr>
</table>
</body>
</html>
