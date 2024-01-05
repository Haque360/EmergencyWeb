<?php
    if(isset($_GET['doctor_degree_submission'])){
        include 'db_connect.php';
        $Degree = $_GET['degree'];
        $Dr_ID = $_GET['Dr_ID'];
        $query = "INSERT INTO dr_degree (Degree, Dr_ID)
        VALUES ('$Degree', $Dr_ID)";
        $results = mysqli_query( $connect, $query)
        or die("Can not execute query");
        header("location:doctor_info.php?Dr_ID=$Dr_ID");
    }
?>