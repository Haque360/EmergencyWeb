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
        $sql="Select F_Name,L_Name,Email,Phone_No,Street,Zip,City,Password from customer where Customer_ID='$cid';";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
    ?>

    <?php
   while($row=$results->fetch_assoc())
    {


          $fname=$row['F_Name'];
          $lname=$row['L_Name'];
          $email=$row['Email'];
          $phone=$row['Phone_No'];
          $street=$row['Street'];
          $zip=$row['Zip'];
          $city=$row['City'];
    }
          

  ?>


</div>

 <div style="padding-top:5%;">

<div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 13vw;">
        <h1>Profile</h1>


        <form class="ui form" method=get action=setting.php>
      Customer ID:<br> <input readonly style="width: 70%" type=number name=cid value="<?php echo $cid;?>"> <br>

      <p>

      First name:<br> <input readonly style="width: 70%" type=text name=Fname value="<?php echo $fname;?>"> <br>

      <p>

       Last name:<br> <input readonly style="width: 70%" type=text name=Lname value="<?php echo $lname;?>"> <br>

      <p>

       Email:<br> <input readonly style="width: 70%" type=text name=Email  value="<?php echo $email;?>"> <br>

      <p>

       Phone:<br> <input readonly style="width: 70%" type=text name=Phone  value="<?php echo $phone;?>"> <br>

      <p>

     Street:<br> <input readonly style="width: 70%" type=text name=Street  value="<?php echo $street;?>"> <br>

      <p>
      City:<br> <input readonly style="width: 70%" type=text name=City value="<?php echo $city;?>"> <br>

      <p>

      Zip:<br> <input readonly style="width: 70%" type=number name=Zip  value="<?php echo $zip;?>"> <br>

      <p>

      <input class="btn btn-success" type=submit value="Edit">



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