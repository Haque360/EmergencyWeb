<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php 
    session_start();
    if (!isset($_SESSION['loggedin'])){ ?>
        <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
            <label>You are not Logged In</label>
            <a href="hospital_login.php" class="btn btn-success">Go Back</a>
        </div>
    <?php }
    else { ?>
    <?php include 'navbar.php'; ?>
    <div class="ui menu">
        <h1 class="header">Home</h1>
    </div>
    

    <div class="container"style="padding-left: 10%;">
   <div style="padding-top:5%;padding-left: 10%;">
    <a class="doctor btn"style="width:150px;height:150px;" href="doctor.php">
            <div >Doctors </div>
    </a>
    <a class="cabin btn"style="width:150px;height:150px;" href="cabin.php">
        <div >Cabins</div>
    </a>
    <a class="icu btn"style="width:150px;height:150px;" href="icu.php">
            <div >I.C.U</div>
    </a>
    <a class="delv_room btn"style="width:150px;height:150px;" href="delivery_room.php">
            <div >Delivery Rooms</div>
    </a>
  </div>
 </div>
 <div style="padding-top:15%">
    <?php include 'footer.php'; ?>
    <?php } ?></div>
</body>
</html>

