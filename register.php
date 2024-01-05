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
 <h1 class="header"></h1>


<?php
    require_once('user/db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

      $results = mysqli_query( $connect, "select Customer_ID+1 as id from customer ORDER BY Customer_id DESC LIMIT 1;" )
      or die("Can not execute query");

  ?>


<div class="ui menu">
  </div>

  <div id="cot" class="container " style="background-color: #DBF9FC;width:40%"><h1>Registeration</h1>
<div class="row">
<div class="col-lg-4 col-md-4"></div>
<div class="col-lg-4 col-md-4">
<form class="ui form" method=get action=insertion.php>

   NID:<br> <input type=number name=nid> <br>

      <p>

      First name:<br> <input type=text name=Fname> <br>

      <p>

       Last name:<br> <input type=text name=Lname> <br>

      <p>

       Email:<br> <input type=text name=Email> <br>

      <p>

       Phone:<br> <input type=text name=Phone> <br>

      <p>

     Street:<br> <input type=text name=Street> <br>

      <p>
      City:<br> <input type=text name=City> <br>

      <p>

      Zip:<br> <input type=number name=Zip> <br>

      <p>


      Password:<br> <input type=text name=Password> <br>

      <p>

      <input class="btn btn-success" type=submit value="Create">

    </form>
</div>
<div class="col-md-4"></div>
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

