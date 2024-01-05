<?php
        session_start();
        include 'db_connect.php';
        $DR_ID = $_GET['delivery_room_id'];
        $Hospital_ID = $_SESSION['Hospital_ID'];
        $query = "INSERT INTO delivery_room (DR_ID, Vacancy, Hospital_ID)
        VALUES ($DR_ID, 'true', $Hospital_ID)";
        $results = mysqli_query( $connect, $query)
            or die("Can not execute query");
        header("location:delivery_room.php");
?>