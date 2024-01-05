<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

<?php
$cid=$_SESSION['Customer_ID'];
$dor=date("Y/m/d");
?>

<?php
$ambu=$_GET['ambu'];
?>

<?php

    require_once('../db_connect.php');
        
        $sql="SELECT MAX(Report_ID)+1 AS maxi
FROM report;";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
        while ($row = $results->fetch_assoc()) {
            $rep=$row['maxi'];
        };
?>


<!DOCTYPE html>
<html>
<head>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <link rel ="stylesheet" type ="text/css" href="style.css">
    
</head>
<body>
  
  <div id="nav-placeholder">

</div>

<div style="padding-top:5px">
            <a href="ambulance.php"><button class="btn btn-success" style="">Back</button></a>
        </div>

 <div style="padding-top:5%;">

<div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 13vw;">
        <h1>Report</h1>
<form class="ui form" method=get action=reportambu_inserter.php>

<br> <input readonly type=number value="<?php echo $aid?>"name=aid hidden> <br>

      <p>

      Report ID:<br> <input style="width: 70%" readonly type=number value="<?php echo $rep?>"name=rid > <br>

      <p>
        Customer ID:<br> <input style="width: 70%"readonly type=number value="<?php echo $cid?>"name=cid > <br>

      <p>
        Service ID:<br> <input style="width: 70%"readonly type=number value="<?php echo $ambu?>"name=ambu > <br>

      <p>

      Location of Report:<br> <input style="width: 70%" type=text name=Location > <br>

      <p>

      Date of Report :<br> <input style="width: 70%" readonly type=text name=DOR Value="<?php echo $dor?>"> <br>

      <p>

      <input class="btn btn-success" type=submit value="Send" >

    </form>
 </div></div>



<script>
$(function(){
  $("#nav-placeholder").load("navbar.php");
});
</script>

<div id="foot-placeholder" style="padding-top: 15%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("footer.php");
});
</script>
</body>
</html>
