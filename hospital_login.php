<!DOCTYPE html>
<html lang="en">
<head>
    <link rel ="stylesheet" type ="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div style="padding-top: 5%;">
    <div id="cot" class="container" style="background-color: #DBF9FC;width:40%;">
        <H1>Hospital Log In</H1>
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

        <?php if(isset($_GET['invalid_pass'])){ ?>
                <label>Invalid ID or Password</label><br>
        <?php } ?>

        <form action="hospital/hospital_login_confirmation.php" method="GET" class="form" style="margin-left: 9vw">
            <label for="hospital_id">Hospital ID: </label><br>
            <input style="width: 70%" type="number" name="hospital_id"></input><br>
            <label for="password">Password: </label><br>
            <input style="width: 70%" type="password" name="password"></input><br><br>
            <input class="btn btn-success" type = "submit" name = "hospital_login_form" value = "Log In"></input>
            <br>
            <label> </label>
        </form>
    </div></div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

     <div div id="foot-placeholder" style="padding-top: 15%">
    <?php include 'footer.php'; ?></div>
</body>
</html>
