<?php
session_start();

if(!isset($_SESSION['FS_ID'])){
    header("location: ../firelogin.php");
    exit;
}
?>
<?php
$fsid=$_SESSION["FS_ID"];
?>

<?php

    $rid=$_GET['rid'];
    $toll=0;
    require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
        $sql="Select Report_ID,status,Report_content,Date as DOR,Customer_ID,Admin_ID from report where Report_ID='$rid'";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
        while ($row = $results->fetch_assoc()) {
            $rCon=$row['Report_content'];
            $dor=$row['DOR'];
            $cus=$row['Customer_ID'];
            $aid=$row['Admin_ID'];
        };
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


<div style="padding-top:5%"></div>

 <div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 13vw;">
    <h1>Reply</h1>
<form class="ui form" method=get action=report_inserter.php>

<br> <input readonly type=number value="<?php echo $aid?>"name=aid hidden> <br>

      <p>

      Report ID:<br> <input style="width: 70%" readonly type=number value="<?php echo $rid?>"name=rid > <br>

      <p>
        Customer ID:<br> <input style="width: 70%"readonly type=number value="<?php echo $cus?>"name=cid > <br>

      <p>

      Report content:<br> <input style="width: 70%"readonly type=text value="<?php echo $rCon?>" name=content> <br>

      <p>

      Location of Report:<br> <input style="width: 70%" readonly type=text name=Location value="<?php echo $loc?>"> <br>

      <p>

      Date of Report :<br> <input style="width: 70%" readonly type=text name=DOR Value="<?php echo $dor?>"> <br>

      <p>
       Reply :<br> <textarea  name=Reply style="height: 200px;text-align: top; width: 70%;"></textarea>  <br>

      <p>

      <input class="btn btn-success" type=submit value="Send" >

    </form>
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