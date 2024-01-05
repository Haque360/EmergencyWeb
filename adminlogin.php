<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db_connect.php';
    $aid = $_POST['Admin_ID'];
    $password = $_POST['password'];



$sql = "Select * from admin where Admin_ID='$aid' AND Password='$password'";
$connect = mysqli_connect( HOST, USER, PASS, DB );
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
if ($num == 1){
    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['Admin_ID'] = $aid;
                    $_SESSION['Password'] = $password;
    header("location:admin/adminhomepage.php");

}
else{
    echo" Password or  Admin_ID is wrong";
}

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
  $("#nav-placeholder").load("navbar.php");
});
</script>
<div class="ui menu" style="padding-top:5%;">
    <div id="cot" class="container" style="background-color: #DBF9FC;width:40%">
        <H1>Admin Log In</H1>
        <div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Account Type
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="loginset.php">User</a></li>
    <li><a class="dropdown-item" href="adminlogin.php">Admin</a></li>
    <li><a class="dropdown-item" href="policelogin.php">Police</a></li>
    <li><a class="dropdown-item" href="firelogin.php">Firemen</a></li>
    <li><a class="dropdown-item" href="hospital_login.php">Hospital</a></li>
    <li><a class="dropdown-item" href="ambulogin.php">Ambulance</a></li>
  </ul>
</div>

        <form action="" method="POST" class="form" style="margin-left: 9vw">
            <label for="AComp_ID">Admin ID: </label><br>
            <input style="width: 70%"type="number" name="Admin_ID"></input><br>
            <label for="password">Password: </label><br>
            <input style="width: 70%"type="password" name="password"></input><br><br>
            <input class="btn btn-success"type = "submit" value = "Log In"></input>
            <br>
            <label> </label>
        </form>
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