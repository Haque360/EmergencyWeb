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
            <a href="adminhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>
  <div class="ui menu">
    <h1 class="header">Customer</h1>
  
  <div class="ui text container">

    
    <h1 class=" "></h1>
  

    <?php
    require_once('../db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");
    
    if(isset($_GET['submit']) && $_GET['region']!=''){
      $region=$_GET['region'];
      $results = mysqli_query( $connect, "SELECT F_Name,L_Name,Customer_ID from customer where F_Name like '%$region%' or L_Name like '%$region%'or Customer_ID like '$region';" )
      or die("Can not execute query");
    }else{
    $results = mysqli_query( $connect, "SELECT F_Name,L_Name,Customer_ID from customer ;" )
      or die("Can not execute query");
    }
  ?>
  <div style="width:70%;margin-left: 70%;">
   <form action="user.php" method="GET" class="form">
  <input style="width:30%" type="text" name="region" placeholder="Enter Search info" class="form"></input>
  <input style="width:14%;" type="submit" value="Submit" class="btn btn-success" name="submit"></input>
  
</form>
    
  </div>
    <div class="row">
    <table class="table" style="background-color:#FFFFFF;">
      <thead>
        <tr>
          <th>Name</th>
          <th>ID</th>
        </tr>
      </thead>
      <?php
        while($row=$results->fetch_assoc()):?>
        <tr>
          <td><?php echo $row['F_Name']," ",$row['L_Name']?></td>
          <td><?php echo $row['Customer_ID']?></td>
        </tr>
        <?php endwhile; ?>
    </table>
  </div></div></div>
  

<div id="foot-placeholder" style="padding-top: 15%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("../footer.php");
});
</script>
</body>
</html>
