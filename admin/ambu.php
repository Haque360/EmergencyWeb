<?php
session_start();

if(!isset($_SESSION['Admin_ID'])){
    header("location:../adminlogin.php");
    exit;

}
echo $_SESSION['Admin_ID'];?>


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
            <a href="adminhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>
  <div class="ui menu">
    <h1 class="header">Ambulance Companies</h1>
  </div>
  <div style=" margin-left: 55%;">
   <form action="user.php" method="GET" class="form">
  <input size="30px" type="text" name="region" placeholder="Enter Search info" class="form"></input>
  <input style="width:25%;" type="submit" value="Submit" class="btn btn-success" name="submit"></input>
  <a href="create_accountambu.php" class="btn btn-success">Add</a>
</form>
    
  </div> 
  <div class="ui text container">

    
    <h1 class=" "></h1>
  

    <?php
    require_once('../db_connect.php');

    if(isset($_GET['submit']) && $_GET['region']!=''){
      $region=$_GET['region'];
      $results = mysqli_query( $connect, "SELECT Name,No_of_Ambulances_Available,AComp_ID,Region_Name,City FROM ambulance_company join region using(AComp_ID) WHERE city in (SELECT city FROM region WHERE Region_Name= '$region')" )
      or die("Can not execute query");
    }else{
    $results = mysqli_query( $connect, "SELECT * FROM region JOIN ambulance_company USING(Region_ID)" )
          or die("Can not execute query");
        }
  ?>

    <div class="row">
    <table class="table"style="background-color:#FFFFFF;">
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
          <td><?php echo $row['Region_Name']?><?php echo " , "?><?php echo $row['City']?></td>
          <td><?php echo $row['No_of_Ambulances_Available']?></td>
           <td><a href="deleteambu.php?ambu=<?php echo $row['AComp_ID'];?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
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