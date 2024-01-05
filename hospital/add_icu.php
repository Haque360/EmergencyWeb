<?php
        session_start();
        include 'db_connect.php';
        $ICU_ID = $_GET['icu_id'];
        $Type = $_GET['type'];
        $Hospital_ID = $_SESSION['Hospital_ID'];

        $query = "INSERT INTO icu (ICU_ID, ICU_Type, Vacancy, Hospital_ID)
        VALUES ($ICU_ID, '$Type', 'true', $Hospital_ID)";
        $results = mysqli_query( $connect, $query)
            or die("Can not execute query");
        header("location:icu.php");
?>