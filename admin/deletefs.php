<?php
require_once('../db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

  if(isset($_GET['fsid']))
  {
  	$FS_ID=$_GET['fsid'];
  	$delete_handler = "Delete from fire_station where FS_ID ='$FS_ID'";
  	mysqli_query($connect,$delete_handler)
  	or die("Can not execute query");

  	header("location:fire_station.php");

  }

?>