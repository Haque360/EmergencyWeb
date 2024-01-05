<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

 <?php 
        $x = $_SESSION['Customer_ID'];

    ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,200;1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>




</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Smart Emergency Services </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="userhomepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><?php echo "Welcome ID: $x";?></a>
        </li>
         
  </li>
<a ><?php echo " "?></a>
<div class="btn-group">
  <button type="button" class="btn btn-dark dropdown-toggle fa fa-bars" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;
  font-weight: lighter;
  font-size: 24px;">
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
    <li><a class="dropdown-item" href="archive.php">Notifications</a></li>
    <li style="padding-left: 1vw;"><button class="dropdown-item" ><?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false){ ?>
        <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
            <label>You are not Logged In</label>
        </div>
    <?php }
    else { ?>


        
    
   
    <div>
    <a href="custologout.php"><button class="btn btn-success">Log Out</button></a>
    
   
    </div>
    <?php } ?></button></li>
  </ul>
</div>

</li>
       
       
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
