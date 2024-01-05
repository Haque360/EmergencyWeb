<?php
session_start();

if(!isset($_SESSION['FS_ID'])){
    header("location: ../firelogin.php");
    exit;
}


?>

<?php
$id=$_SESSION["FS_ID"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <link rel ="stylesheet" type ="text/css" href="../style.css">
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


 <div style="padding-top:5px">
            <a href="firehome.php"><button class="btn btn-success" style="">Back</button></a>
        </div>

<?php
    require_once('../db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");
     $sql="SELECT * from fire_station join f_station_location using(FS_ID) WHERE FS_ID='$id'";
      $results = mysqli_query( $connect, $sql )
      or die("Can not execute query");
    
    while ($row = $results->fetch_assoc()) {
    $loc= $row['address'];
    $pass=$row['password'];}
  ?>
<div style="padding-top:5%">
<div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 10vw;">
        <h3>Settings</h3>


        <form class="ui form" method=get action=updater.php>

            FS ID:<input style="width: 70%"type=number  name=FS_ID value="<?php echo $id?>" hidden> <?php echo $id;?><br>

            <p>

            Location:<br> <input style="width: 70%" type=text name=Location value="<?php echo $loc?>"> <br>

            <p>

            Password:<br> <input style="width: 70%" type=text name=Password value=""> <br>

            <p>

            <input class="btn btn-success ui big right floated blue button" type=submit value="Update Entry"><br><label></label>

        </form>
    </div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <div id="foot-placeholder" style="padding-top: 15%">

</div>
        
        <script>
$(function(){
  $("#foot-placeholder").load("../footer.php");
});
</script>
</body>
</html>