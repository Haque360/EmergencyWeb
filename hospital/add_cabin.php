<?php
        session_start();
        include 'db_connect.php';
        $Cabin_ID = $_GET['cabin_id'];
        $Type = $_GET['type'];
        $Hospital_ID = $_SESSION['Hospital_ID'];

        $query = "INSERT INTO cabins (Cabin_ID, Type, Vacancy, Hospital_ID)
        VALUES ($Cabin_ID, '$Type', 'true', $Hospital_ID)";
        $results = mysqli_query( $connect, $query)
        or die("Can not execute query");
        header("location:cabin.php");
?>