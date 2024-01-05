<?php
session_start();

if(!isset($_SESSION['Admin_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

<?php
$cid=$_SESSION['Admin_ID'];
$dor=date("Y/m/d");


?>


<!DOCTYPE html>
<html lang="en">
<head>
     <link rel ="stylesheet" type ="text/css" href="../style.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   
</head>
<body>
    <div id="nav-placeholder">

</div>
<script>
$(function(){
  $("#nav-placeholder").load("navbar.php");
});
</script>

   <div style="padding-top:5px">
            <a href="adminhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>

<?php
          

  ?>

  <div style="padding-top:5%;">

<div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 13vw;">
        <h1>Settings</h1>


        <form class="ui form" method=get action=updater.php>


        Password:<br> <input style="width: 70%" type=text name=Password value=""> <br>

<p><br>
      <input class="btn btn-success" type=submit value="Save">
      <br><label></label>



    </form>
    </div></div>


 <div id="foot-placeholder" style="padding-top: 15%">

</div>
        
        <script>
$(function(){
  $("#foot-placeholder").load("footer.php");
});
</script>
</body>
</html>