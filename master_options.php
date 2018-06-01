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
<title>MASTER OPTIONS</title>
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
    <a href="master_options.php?logout='1'" >
        <img src="image/LGT.png" style="width: 80px;height:45px;float:right;">
    </a>
</h1>
</div>

<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h5>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h5>
      </div>
    <?php endif ?>
<form style="width:20%;float:left;margin-left:50px;margin-top:10px;padding-top:5px;padding-bottom:5px;">
    <?php  if (isset($_SESSION['adminname'])) : ?>
    <p style="text-align:center;color:#000080;text-transform:uppercase;">
        Welcome
        <strong>
        <?php echo "&nbsp;&nbsp;".$_SESSION['adminname'] ;?>
        </strong>
    </p>
    <?php endif ?>
</form>

<div class="opt"style="margin: 43px auto 0px;width:92%";>
     <h2 align="center">MASTER ADMIN OPTIONS</h2>
    </div>

<form>
<table style="width: 1100px;margin-left: 55px;">
  <th>OPTIONS</th> <th>DESCRIPTION</th><th>VIEW PAGE</th> 
<tr>
    <td>1.&ensp;Master Registration Form</td>
    <td>Registration Form For New Master Admin.</td>
    <td><a href="master_signup.php">Click here</a></td>
</tr>

<tr>
    <td>2. &ensp;Admin Registration Form</td>
    <td>Registration Form For New Admin.</td>
    <td><a href="admin_signup.php">Click here</a></td>
</tr>

<tr>
    <td>3. &ensp;Admin Login Form</td>
    <td>Login Form For Existing Admin/Users</td>
    <td><a href="admin_login.php">Click here</a></td>
</tr>

<tr>
    <td >4. &ensp;Student Registration Form</td>
    <td >Registration Form For New Students.</td>
    <td ><a href="student_reg.php">Click here</a></td>
</tr>

<tr>
    <td >5. &ensp;Student Login Form</td>
    <td >Login Form For Existing Students.</td>
    <td ><a href="student_login.php">Click here</a></td>
</tr>
<tr>
    <td >6. &ensp;Exam Syllabus Form </td>
    <td >Form For Master Admin To Add Exam Syllabus To The Database.</td>
    <td ><a href="exam_master_tab.php">Click here</a></td>
</tr>
<tr>
    <td >7. &ensp;Question Form</td>
    <td >Form To Add Question ID & Questions To The Database.</td>
    <td ><a href="question_tab.php">Click here</a></td>
</tr>
<tr>
    <td >8. &ensp;Question Paper Sets Overview </td>
    <td >Overview To The Total Number Of Question Paper Sets In The Database.</td>
    <td ><a href="QPs_overview.php">Click here</a></td>
</tr>
<tr>
    <td >9. &ensp; Question Paper Summary</td>
    <td >Summary To The Number Of Question Papers Sets Added  In The Database.</td>
    <td ><a href="Qp_summary.php">Click here</a></td>
</tr>
<tr>
    <td >10. &ensp;Subject Question Paper Overview</td>
    <td >Overview To The Number Of Question Papers Sets Added  In The Database.</td>
    <td ><a href="Subject_and_Qps_overview.php">Click here</a></td>
</tr>


<tr>
    <td >11. &ensp;Exam Schedule Form </td>
    <td >Form To Add Exam Schedule To The Database.</td>
    <td ><a href="examscheduleentry.php">Click here</a></td>
</tr>

<tr>
    <td >12. &ensp;Scheduled Exams Overview  </td>
    <td >Overview To Exam Schedule In The Database.</td>
    <td ><a href="scheduledexamsoverview.php">Click here</a></td>
</tr>

<tr>
<td >13. &ensp;Form to Add Model Papers</td>
<td >Page For Admin To add Model Papers Database.</td>
<td ><a href="model_paper_tab.php">Click here</a></td>
</tr>

<tr>
    <td >14. &ensp;Exams  Result (pending)</td>
    <td >Page For Admin To Check Final Results.</td>
    <td ><a href=".php">Click here</a></td>
</tr>

<tr>
    <td >15. &ensp;Student Exams Result (pending)</td>
    <td >Page For Students To Check Their Final Results.</td>
    <td ><a href=".php">Click here</a></td>
</tr>

<tr>
    <td >16. &ensp;Database Deletion Page</td>
    <td >Page For Admin To Delete Selected Data Database.</td>
    <td ><a href="masteradmin_delete.php">Click here</a></td>
</tr>

</table>
</form>
</body>
</html>
