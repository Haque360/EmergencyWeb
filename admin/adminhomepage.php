<?php
session_start();

if(!isset($_SESSION['Admin_ID'])){
    header("location:../adminlogin.php");
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
	 <link rel ="stylesheet" type ="text/css" href="style.css">
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


<div class="container"style="padding-left: 5%;">
   <div style="padding-top:5%;padding-left: 10%;">
    <a class="Hospitals btn"style="width:150px;height:150px;" href="hospital.php">
        <div >Hospitals </div>
    </a>
    <a class="Police btn"style="width:150px;height:150px;" href="police.php">
      <div >Police Stations</div>
    </a>
    <a class="Fires btn"style="width:150px;height:150px;" href="fire_station.php">
        <div >Fire Stations</div>
    </a>
    <a class="Ambulance btn"style="width:150px;height:150px;" href="ambulance.php">
        <div >Ambulance</div>
    </a>
    <a class="Region btn"style="width:150px;height:150px;" href="region.php">
        <div >Region</div>
    </a>
    <a class="User btn"style="width:150px;height:150px;" href="user.php">
        <div >user</div>
    </a>
  </div>
 </div>





<div id="foot-placeholder" style="padding-top: 20%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("../footer.php");
});
</script>

</body>
</html>