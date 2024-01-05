<?php
        session_start();
        include 'db_connect.php';
        $Dr_ID = $_GET['Dr_ID'];
        $Hospital_ID = $_SESSION['Hospital_ID'];

        $query = "DELETE FROM doctor WHERE Dr_ID=$Dr_ID AND Hospital_ID=$Hospital_ID";
        $results = mysqli_query( $connect, $query)
        or die("Can not execute query");
        header("location:doctor.php");
?>
