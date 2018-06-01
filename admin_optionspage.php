<?php 
session_start();
 if (!isset($_SESSION['adminname'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location:login_home.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['adminname']);
    header("location: login_home.php");
  }
?>
<html>
<head>
<title>ADMIN OPTIONS</title>
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
<a href="admin_optionspage.php?logout='1'">
  <img src="image/LGT.png" style="width: 80px;height:45px;float:right;">
</a>
</h1></div>

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
<form style="width:20%;float:left;margin-left:50px;margin-top:10px;padding-top:5px;padding-bottom:5px;">
   

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['adminname'])) : ?>
    <p style="text-align:center;color:#000080;text-transform:uppercase;">
      Welcome<strong>
      <?php echo "&nbsp;&nbsp;".$_SESSION['adminname'] ;?>
    </strong>
     
    
         </p>
    <?php endif ?>
</form>

     <div class="opt"style="margin: 42px auto 0px;width:92%";><h2 align="center">Admin Options</h2></div>

<form>
<table style="width: 1100px;margin-left: 65px;">



<th>OPTIONS</th><th>DESCRIPTION</th><th>VIEW PAGE</th>
<tr>
<td>1. &ensp;Student Registration Form</td>
<td>Registration Form For New Students.</td>
<td><a href="student_reg.php">Click here</a></td>
</tr>

<tr>
<td>2. &ensp;Exam Syllabus Form</td>
<td>Form For Admin To Add Exam Syllabus To The Database.</td>
<td><a href="exam_master_tab.php">Click here</a></td>
</tr>

<tr>
<td>3. &ensp;Exam Syllabus Overview</td>
<td>Overview To The Exam Syllabus In The Database.</td>
<td><a href="examsyllabusoverview.php">Click here</a></td>
</tr>

<tr>
<td>4. &ensp;Exam Schedule Form</td>
<td>Form To Add Exam Schedule To The Database.</td>
<td><a href="examscheduleentry.php">Click here</a></td>
</tr>

<tr>
<td>5. &ensp;Scheduled Exams Overview</td>
<td>Overview To Exam Schedule In The Database.</td>
<td><a href="scheduledexamsoverview.php">Click here</a></td>
</tr>

<tr>
<td>6. &ensp;Exams Result </td>
<td>Page For Admin To Check Final Results.</td>
<td><a href=".php">Click here</a></td>
</tr>

<tr>
<td>7. &ensp;Student Exams Result </td>
<td>Page For Students To Check Their Final Results.</td>
<td><a href=".php">Click here</a></td>
</tr>

<tr>
<td >8. &ensp;Form to Add Model Papers</td>
<td >Page For Admin To add Model Papers Database.</td>
<td ><a href="model_paper_tab.php">Click here</a></td>
</tr>

<tr>
<td >9. &ensp;Database Deletion Page</td>
<td >Page For Admin To Delete Selected Data Database.</td>
<td ><a href="admin_delete.php">Click here</a></td>
</tr>
</table>
</form>

</body>
</html>
