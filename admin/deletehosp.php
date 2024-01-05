<?php
require_once('../db_connect.php');

    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

  if(isset($_GET['hosp']))
  {
  	$id=$_GET['hosp'];
  	mysqli_query($connect,"Delete from hospital where Hospital_ID='$id'")
  	or die("Can not execute query");
  	header("location:hospital.php");
  }
?>