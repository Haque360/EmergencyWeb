<?php
    if(isset($_GET['doctor_contact_submission'])){
        include 'db_connect.php';
        $Contact_No = $_GET['Contact_No'];
        $Dr_ID = $_GET['Dr_ID'];
        $query = "INSERT INTO dr_contact_no (Contact_No, Dr_ID)
        VALUES ('$Contact_No', $Dr_ID)";
        $results = mysqli_query( $connect, $query)
        or die("Can not execute query");
        header("location:doctor_info.php?Dr_ID=$Dr_ID");
    }
?>