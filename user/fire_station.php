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
            <a href="userhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>


  <div class="ui menu">
    <h1 class="header">Fire Station</h1>
  </div>
  <form action="police.php" method="GET" class="form" style="margin-left: 9vw">
  <input type="text" name="region" class="form"></input>
  <input type="submit" value="Submit" class="btn btn-success" name="submit"></input>
</form>
  <div class="ui text container">

    
    <h1 class=" "></h1>
  

    <?php
    require_once('../db_connect.php');
    
   
    
    if(isset($_GET['submit']) && $_GET['region']!=''){
      $region=$_GET['region'];
      $city= mysqli_query( $connect, "SELECT city FROM region WHERE Region_Name= '$region'")
      or die("Can not execute query");
      $result;
      if($city='Rajshahi')
      {
        $results=mysqli_query( $connect, "SELECT fs_id ,Location FROM `fire_station` WHERE Location like '%Rajshahi%'")
         or die("Can not execute query");
      }
      else if($city='Dhaka')
      {
        $results=mysqli_query( $connect, "SELECT fs_id ,Location FROM `fire_station` WHERE Location like '%Dhaka%'")
         or die("Can not execute query");
      }
      else if($city='Barishal')
      {
        $results=mysqli_query( $connect, "SELECT fs_id  ,Location FROM `fire_station` WHERE Location like '%Barishal%'")
         or die("Can not execute query");
      }
      else if($city='Chattogram')
      {
        $results=mysqli_query( $connect, "SELECT fs_id  ,Location FROM `fire_station` WHERE Location like '%Chattogram%'")
         or die("Can not execute query");
      }
      else if($city='Khulna')
      {
        $results=mysqli_query( $connect, "SELECT fs_id  ,Location FROM `fire_station` WHERE Location like '%Khulna%'")
         or die("Can not execute query");
      }
      else if($city='Rangpur')
      {
        $results=mysqli_query( $connect, "SELECT fs_id ,Location FROM `fire_station`` WHERE Location like '%Rangpur%'")
         or die("Can not execute query");
      }
      else if($city='Mymensingh')
      {
        $results=mysqli_query( $connect, "SELECT fs_id  ,Location FROM `fire_station` WHERE Location like '%Mymensingh%'")
         or die("Can not execute query");
      }
      else if($city='Sylhet')
      {
        $results=mysqli_query( $connect, "SELECT fs_id  ,Location FROM `fire_station` WHERE Location like '%Sylhet%'")
         or die("Can not execute query");
      }
    }
    else{
    $results = mysqli_query( $connect, "SELECT FS_ID, Region_Name as Location FROM region JOIN fire_station USING(Region_ID)" )
      or die("Can not execute query");
    }
  ?>
  <div class="row justify-content-center">
    <table class="table">
      <thead>
        <tr>
          <th>Fire Station Id.</th>
          <th>Location</th>
          <th colspan="1">Report</th>
        </tr>
      </thead>
      <?php
        while($row=$results->fetch_assoc()):?>
        <tr>
          <td><?php echo $row['FS_ID']?></td>
          <td><?php echo $row['Location']?></td>
          <td><a href="reportfs.php?fsid=<?php echo $row['FS_ID'];?>" class="btn btn-success">Report</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
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
