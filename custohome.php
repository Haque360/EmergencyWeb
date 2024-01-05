<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location: loginset.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel ="stylesheet" type ="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  
</head>
<body>

  <div id="nav-placeholder">

</div>
<script>
$(function(){
  $("#nav-placeholder").load("user/navbar.php");
});
</script>
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="hospital.jpg" alt="Hospital" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="police.jpg" alt="Police" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="firestation.jpg" alt="Fire Station" class="d-block" style="width:100%">
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false){ ?>
        <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
            <label>You are not Logged In</label>
        </div>
    <?php }
    else { ?>


         <?php 
        $x = $_SESSION['Customer_ID'];

    ?>
    <p>Welcome User ID: <?php echo $x; ?> </p>
   
   
    <div>
    <a href="firelogout.php"><button class="btn btn-success">Log Out</button></a>
    </div>
    <?php } ?>
   
<div class="container">
   <main class="first container col-lg-6 col-sm-6">
    <a class="Hospitals btn" href="hospital.php">
            <div >Hospitals </div>
    </a>
    <a class="Police btn" href="police.php">
        <div >Police Stations</div>
    </a>
    <a class="Fires btn" href="fire_station.php">
            <div >Fire Stations</div>
    </a>
    <a class="Ambulance btn" href="ambulance.php">
            <div >Ambulance</div>
    </a>
  </main>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<div id="foot-placeholder" style="padding-top: 15%">

</div>
    <script>
$(function(){
  $("#foot-placeholder").load("footer.php");
});
</script>
</body>
</html>