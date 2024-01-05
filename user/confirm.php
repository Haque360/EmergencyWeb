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

    require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
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
            <a href="userhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>

<div style="padding-top:5%;">

<div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 10vw;">
        <h1>Confirmation</h1>

        <h3>Your Report Has Been Submitted</h3>
        <br>
        <a href="userhomepage.php" class="btn btn-success">OK</a>
        <br>
        <label></label>

 </div></div>




<script>
$(function(){
  $("#nav-placeholder").load("navbar.php");
});
</script>

<div id="foot-placeholder" style="padding-top: 20%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("footer.php");
});
</script>
</body>
</html>
