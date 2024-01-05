<?php
session_start();

if(!isset($_SESSION['Admin_ID'])){
    header("location:../adminlogin.php");
    exit;
}?>

<!DOCTYPE html>
<html>
<head>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <link rel ="stylesheet" type ="text/css" href="style.css">
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
            <a href="police.php"><button class="btn btn-success" style="">Back</button></a>
        </div>

<?php
    require_once('db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

      $results = mysqli_query( $connect, "select max(PS_ID)+1 as id from police_station ;" )
      or die("Can not execute query");

  ?>


<div class="ui menu" style="padding-top:5%">
  
  <div id="cot" class="container " style="background-color: #DBF9FC;width:40%"><h1>Police Registration</h1>
<div class="row">
<div class="col-lg-4 col-md-4"></div>
<div class="col-lg-4 col-md-4">
<form class="ui form" method=get action=insert_handler.php>

      ID:<br> <input type=number value="<?php while ($row = $results->fetch_assoc()) {
    echo $row['id'];}?>"name=ID> <br>

      <p>

      Admin_ID:<br> <input type=number value="<?php echo(rand(1001,1004)) ?>" name=Admin_ID> <br>

      <p>

      Password:<br> <input type=text name=Password> <br>

      <p>

      Contact:<br> <input type=text name=contact> <br>

      <p>
         Region:<br> <input type=number name=region> <br>

      <p>

      <input class="btn btn-success" type=submit value="Create">

    </form>
</div>
<div class="col-md-4"></div>
</div>
</div></div>

<div id="foot-placeholder" style="padding-top: 15%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("../footer.php");
});
</script>
</body>
</html>

