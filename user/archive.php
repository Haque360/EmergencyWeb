<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

<?php
$cid=$_SESSION['Customer_ID'];
$dor=date("Y/m/d");
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
            <a href="userhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>

<div id="cot" class="ui text container " >

    <?php
        require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
        $sql="Select * from responses JOIN report USING(Report_ID) where Customer_ID='$cid' order by Date desc";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
    ?>

</div>
<div class="row justify-content-center">
  <h1>Archive</h1>
     <table class="table" style="width:50%; padding-top: 10%;">
      <thead>
        <tr>
          <th>Report Id.</th>
          <th>Report</th>
          <th>Date of Report</th>
          <th>Customer ID</th>
          <th>Service ID</th>
        </tr>
      </thead>
      <?php
        while($row=$results->fetch_assoc()):
          $servid;
          if($row['PS_ID']!=NULL)
          {
            $servid=$row['PS_ID'];
          }
          elseif($row['FS_ID']!=NULL)
          {$servid=$row['FS_ID'];}
           elseif($row['AComp_ID']!=NULL)
          {$servid=$row['AComp_ID'];}?>
        <tr>
          <td><?php echo $row['Report_ID']?></td>
          <td><?php echo $row['Report_Content']?></td>
          <td><?php echo $row['Date']?></td>
          <td><?php echo $row['Customer_ID']?></td>
          <td><?php echo $servid?></td>

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