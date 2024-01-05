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
  
  <div style="background-color: #DBF9FC;">
<div id="demo" class="carousel slide" data-bs-ride="carousel" style="width:60%; margin:auto;">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="tester1.jpg" alt="Hospital" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="hospital.jpg" alt="Police" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="tester2.jpg" alt="Fire Station" class="d-block" style="width:100%">
    </div>
      <div class="carousel-item">
      <img src="tester3.jpg" alt="Fire Station" class="d-block" style="width:100%">
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
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