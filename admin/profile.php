<?php
session_start();

if(!isset($_SESSION['Admin_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

<?php
$cid=$_SESSION['Admin_ID'];
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
            <a href="adminhomepage.php"><button class="btn btn-success" style="">Back</button></a>
        </div>


<div id="cot" class="ui text container " >

    <?php
        require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
        $sql="Select Admin_ID from admin where Admin_ID='$cid';";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
    ?>

    <?php
   while($row=$results->fetch_assoc())
    {


          $aid=$row['Admin_ID'];
          
    }
          

  ?>


</div>

 <div style="padding-top:5%;">

<div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 13vw;">
        <h1>Profile</h1>


        <form class="ui form" method=get action=setting.php>
      Admin ID:<br> <input readonly style="width: 70%" type=number name=aid value="<?php echo $aid;?>"> <br>

      <p>
        <br>


      <input class="btn btn-success" type=submit value="Edit">
      <br>
      <label></label>



    </form>

    </form>
</div>

</div>
</div>
  
     
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