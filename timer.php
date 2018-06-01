  <?php
  // session_start();
     
    if( empty( $_SESSION['quiz'] ) )$_SESSION['quiz']=date('Y-m-d H:i:s');
    ?>
    <html>
    <head>
          <link rel="stylesheet" type="text/css" href="css/style overview.css">
    <title></title>
    <script language ="javascript" >
    //<?php  ?>
    <?php
   // echo "<input type='text' value='".date('m/d/y')."'>";
    $start=$_SESSION['quiz'];
    $end=date('Y-m-d H:i:s', strtotime( $_SESSION['quiz'] . ' +20 minutes' ) );
    echo "
    var date_quiz_start='$start';
    var date_quiz_end='$end';
    var time_quiz_end=new Date('$end').getTime();";
    ?>
    var tim;
    var hour= 01;
    var min = 49;
    var sec = 60;
    var f = new Date();
    function f1() {
    f2();
    document.getElementById("starttime").innerHTML = "Your started your Exam at " + f.getHours() + ":" + f.getMinutes();
    }
    function f2() {
    if (parseInt(sec) > 0) {
    sec = parseInt(sec) - 1;
    document.getElementById("showtime").innerHTML = "Your Left Time is :"+hour+" hours:"+min+" Minutes :" + sec+" Seconds";
    tim = setTimeout("f2()", 1000);
    }
    else {
    if (parseInt(sec) == 0) {
    min = parseInt(min) - 1;
    if (parseInt(min) == 0) {
    clearTimeout(tim);
    location.href ="index.php";
    }
    else {
    sec = 60;
    document.getElementById("showtime").innerHTML = "Your Left Time is :" + min + " Minutes ," + sec + " Seconds";
    tim = setTimeout("f2()", 1000);
    }
    }
    }
    }
    </script>
    </head>
    <body onload="f1()" >
        <div class="over">
    <form>
    <div>
    <table width="100%" align="center">
    <!--tr> <td colspan="2"> </td> </tr-->
    <tr>
    <td>
    <div id="starttime"></div>
    <div id="endtime"></div>
    <div id="showtime"></div>
    </td>
    </tr>
    <!--tr><td></td></tr-->
    </table>
    
    </div>
    </form>
</div>
    </body>
    </html>