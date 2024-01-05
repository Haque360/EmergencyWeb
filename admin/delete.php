<?php
require_once('../db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

  if(isset($_GET['ps_id']))
  {
  	$id=$_GET['ps_id'];
  	mysqli_query($connect,"Delete from police_station where ps_id='$id'")
  	or die("Can not execute query");

  	header("location:police.php");

  }

?>