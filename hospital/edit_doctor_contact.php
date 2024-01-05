<?php
        include 'db_connect.php';
        $Dr_ID = $_GET['Dr_ID'];
        $Contact_No = $_GET['Contact_No'];
        $New_Contact_No = $_GET['New_Contact_No'];
        $query = "UPDATE dr_contact_no SET Contact_No='$New_Contact_No' WHERE Dr_ID=$Dr_ID AND Contact_No='$Contact_No'";
        $results = mysqli_query( $connect, $query)
        or die("Can not execute query");
        header("location:doctor_info.php?Dr_ID=$Dr_ID");
?>