<?php
        include 'db_connect.php';
        $Dr_ID = $_GET['Dr_ID'];
        $Contact_No = $_GET['Contact_No'];
        $query = "DELETE FROM dr_contact_no WHERE Dr_ID=$Dr_ID AND Contact_No='$Contact_No'";
        $results = mysqli_query( $connect, $query)
        or die("Can not execute query");
        header("location:doctor_info.php?Dr_ID=$Dr_ID");
?>