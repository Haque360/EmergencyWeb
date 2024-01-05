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
    <h1 class="header">Ambulance Companies</h1>
  </div>
  <form action="ambulance.php" method="GET" class="form" style="margin-left: 9vw">
  <input type="text" name="region" class="form"></input>
  <input type="submit" value="Submit" class="btn btn-success" name="submit"></input>
</form>
  <div class="ui text container">

    
    <h1 class=" "></h1>
  

    <?php
    require_once('../db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");
    
    if(isset($_GET['submit']) && $_GET['region']!=''){
      $region=$_GET['region'];
      $results = mysqli_query( $connect, "SELECT AComp_ID,No_of_Ambulances_Available,Name,Region_Name,City FROM ambulance_company join region using(Region_ID) WHERE city in (SELECT city FROM region WHERE Region_Name= '$region')" )
      or die("Can not execute query");
    }else{
    $results = mysqli_query( $connect, "SELECT Name,No_of_Ambulances_Available,AComp_ID,Address FROM ambulance_company join a_comp_location using(AComp_ID)" )
      or die("Can not execute query");
    }
  ?>

    <div >
    <table class="table">
      <thead>
        <tr>
          <th>Ambulance Company ID</th>
          <th>Ambulance Company Name</th> 
          <th>Location</th>
          <th>Available Ambulances</th>
         
          <th colspan="1">Report</th>
        </tr>
      </thead>
      <?php
        while($row=$results->fetch_assoc()):?>
        <tr>
          <td><?php echo $row['AComp_ID']?></td>
          <td><?php echo $row['Name']?></td>
          <td><?php echo $row['Address']?>
          <td><?php echo $row['No_of_Ambulances_Available']?></td>
          <td><a href="reportambu.php?ambu=<?php echo $row['AComp_ID'];?>" class="btn btn-success">Report</a></td>
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
