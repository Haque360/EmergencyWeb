<?php
        session_start();
        include 'db_connect.php';
        $DR_ID = $_GET['DR_ID'];
        $Hospital_ID = $_SESSION['Hospital_ID'];

        $query = "DELETE FROM delivery_room WHERE DR_ID=$DR_ID AND Hospital_ID=$Hospital_ID";
        $results = mysqli_query( $connect, $query)
            or die("Can not execute query");
        header("location:delivery_room.php");
?>