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
            <a href="fire_station.php"><button class="btn btn-success" style="">Back</button></a>
        </div>


<?php
    require_once('db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

      $results = mysqli_query( $connect, "select FS_ID+1 as id from fire_station ORDER BY fs_id DESC LIMIT 1;" )
      or die("Can not execute query");

      while ($row = $results->fetch_assoc()) {
    $id=$row['id'];}


  ?>


<div class="ui menu" style="padding-top:5%">
  

  <div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 10vw;">
     <h1 class="header">Fire Station Registration</h1>
<form class="ui form" method=get action=insert_handler_FS.php>

            Fire Station ID: <br><input readonly type=number style="width:70%;" value="<?php echo $id?>" name=ID> <br>

            <p> 
                
             Admin_ID:<br> <input type=number style="width:70%;" value="<?php echo(rand(1001,1004)) ?>" name=Admin_ID> <br>

            <p>


            Password:<br> <input type=text style="width:70%;" name=Password> <br>

            <p>
                Contact:<br> <input type=text name=contact> <br>

      <p>
         Region:<br> <input type=number name=region> <br>

      <p>

          

            <input class="btn btn-success" type=submit value="Insert Entry">

      <br> <input type=text style="width:70%;" hidden> <br>

            <p>

        </form>
</div>
</div>
</div>
<div id="foot-placeholder" style="padding-top: 15%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("../footer.php");
});
</script>
</body>
</html>

