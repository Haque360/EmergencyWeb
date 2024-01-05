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

  
<div >
  <div class="ui menu">
   <h1 class="header">Police Station</h1>
  </div>
<div style=" margin-left: 55%;">
   <form action="user.php" method="GET" class="form">
  <input size="30px" type="text" name="region" placeholder="Enter Search info" class="form"></input>
  <input style="width:25%;" type="submit" value="Submit" class="btn btn-success" name="submit"></input>
  <a href="create_account.php" class="btn btn-success">Add</a>
</form>
    
  </div> 
  <div class="ui text container">

    
    <h1 class=" "></h1>
  

    <?php
    require_once('../db_connect.php');
    
  
    
    if(isset($_POST['submit']) && $_POST['region']!=''){
          $region=$_POST['region'];
          $query = "SELECT PS_ID as ps_id, Region_Name FROM region JOIN police_station USING(Region_ID) WHERE Region_Name like '%".$region."%'";
          $results=mysqli_query( $connect, $query)
            or die("Can not execute query");
        }
        else{
        $results = mysqli_query( $connect, "SELECT PS_ID as ps_id, Region_Name FROM region JOIN police_station USING(Region_ID)" )
          or die("Can not execute query");
        }
  ?>
  <div class="row ">
    <table class="table" style="background-color:#FFFFFF;">
      <thead>
        <tr>
          <th>Police Station Id.</th>
          <th>Location</th>
          <th colspan="1">Action</th>
        </tr>
      </thead>
      <?php
        while($row=$results->fetch_assoc()):?>
        <tr>
          <td><?php echo $row['ps_id']?></td>
          <td><?php echo $row['Region_Name']?></td>
          <td><a href="delete.php?ps_id=<?php echo $row['ps_id'];?>" class="btn btn-danger">Delete</a></td>
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
