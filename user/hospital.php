<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	 <link rel ="stylesheet" type ="text/css" href="style2.css">
   
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
            <a href="userhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>


  <div class="container">

   <main class="second">
   	<a class="doctor btn" href="doctor.php">
   			<div >Doctors</div>
   	</a>
   	<a class="cabin btn"  href="cabin.php">
   		<div >Cabins</div>
   	</a>
   	
   	<a class="icu btn" href="icu.php">
   			<div >I.C.U</div>
   	</a>
   	<a class="delv_room btn" href="delvroom.php">
   			<div >Delivery Rooms</div>
   	</a>
  	
  
  
  </main>
  
</div>


<div id="foot-placeholder" style="padding-top: 15%">
</div>
<script>
$(function(){
  $("#foot-placeholder").load("footer.php");
});
</script>

</body>
</html>
