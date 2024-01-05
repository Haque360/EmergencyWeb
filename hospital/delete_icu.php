<?php
        session_start();
        include 'db_connect.php';
        $ICU_ID = $_GET['ICU_ID'];
        $Hospital_ID = $_SESSION['Hospital_ID'];

        $query = "DELETE FROM icu WHERE ICU_ID=$ICU_ID AND Hospital_ID=$Hospital_ID";
        $results = mysqli_query( $connect, $query)
            or die("Can not execute query");
        header("location:icu.php");
?>