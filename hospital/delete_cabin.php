<?php
        session_start();
        include 'db_connect.php';
        $Cabin_ID = $_GET['Cabin_ID'];
        $Hospital_ID = $_SESSION['Hospital_ID'];

        $query = "DELETE FROM cabins WHERE Cabin_ID=$Cabin_ID AND Hospital_ID=$Hospital_ID";
        $results = mysqli_query( $connect, $query)
                or die("Can not execute query");
        header("location:cabin.php");
?>