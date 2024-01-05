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

<div id="cot" class="ui text container " >

    <?php
        require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
        $sql="Select Report_ID,Status,Report_content,Date,Customer_ID from report where FS_ID='$id'and Report_type='fs' and Status=1";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
    ?>
<div ><h1>Archive</h1>
        <div style="float: left;
  width: 100%;
  padding: 10px;
  height: 300px; ">
    <table class="table" style="background-color:#FFFFFF" >
      <thead>
        <tr>
          <th>Report Id.</th>
          <th>Report</th>
          <th>Date of Report</th>
          <th>Customer ID</th>
          <th colspan="1">Report Status</th>
        </tr>
      </thead>
      <?php
        while($row=$results->fetch_assoc()):?>
        <tr>
          <td><?php echo $row['Report_ID']?></td>
          <td><?php echo $row['Report_content']?></td>
          <td><?php echo $row['Date']?></td>
          <td><?php echo $row['Customer_ID']?></td>
          <td>Concluded</td>
        </tr>
        <?php endwhile; ?>
    </table>
  </div>
</div>
    </div>

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