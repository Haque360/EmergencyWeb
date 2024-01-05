<?php
session_start();

if(!isset($_SESSION['AComp_ID'])){
    header("location:../ambulogin.php");
    exit;
}


?>

<?php 
        $id = $_SESSION['AComp_ID'];



    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel ="stylesheet" type ="text/css" href="style.css">
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
<div id="cot" class="ui text container " >

    <?php
        require_once('../db_connect.php');
        
       
        $sql="Select Report_ID,status,Report_content,Date as DOR,Customer_ID from reports where AComp_ID='$id'and Report_type='ambu' and status=0";

            //$sql="Select r.Report_ID, r.Report_content, c.Street, r.Date, c.Customer_ID,r.Report_Status from reports join customer join ambulance_company c where AComp_ID=$id and Report_type='ambu";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
    ?>
<div class="row" style=" content: "";
  display: table;
  clear: both;">
    <div class="column" style="float: left;
  width: 13%;
  padding: 10px;
  height: 300px; ">
      <a class="btn btn-success" href="archive.php">Archive</a>
  </div>
        <div class="column" style="float: left;
  width: 80%;
  padding: 10px;
  height: 300px; ">
    <table class="table" style="background-color: #FFFFFF;">
      <thead>
        <tr>
          <th>Report Id.</th>
          <th>Report</th>
          <th>Location</th>
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
          <td><?php echo "dafdasdfgsa"?></td>
          <td><?php echo $row['DOR']?></td>
          <td><?php echo $row['Customer_ID']?></td>
          <td><a href="reply.php?rid=<?php echo $row['Report_ID'];?>" class="btn btn-success">Pending</a></td>
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