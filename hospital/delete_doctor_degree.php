<?php
        include 'db_connect.php';
        $Dr_ID = $_GET['Dr_ID'];
        $Degree = $_GET['Degree'];
        $query = "DELETE FROM dr_degree WHERE Dr_ID=$Dr_ID AND Degree='$Degree'";
        $results = mysqli_query( $connect, $query)
        or die("Can not execute query");
        header("location:doctor_info.php?Dr_ID=$Dr_ID");
?>