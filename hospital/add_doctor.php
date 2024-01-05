<?php
        session_start();
        include 'db_connect.php';
        $Dr_ID = $_GET['dr_id'];
        $Name = $_GET['name'];
        $Type = $_GET['type'];
        $Contact_No = $_GET['contact_no'];
        $Degree = $_GET['degree'];
        $Hospital_ID = $_SESSION['Hospital_ID'];

        $dr_query = "INSERT INTO doctor (Dr_ID, Dr_Name, Specializes_in, Hospital_ID)
        VALUES ($Dr_ID, '$Name', '$Type', $Hospital_ID)";
        $dr_contact_query = "INSERT INTO dr_contact_no (Contact_No, Dr_ID)
        VALUES ('$Contact_No', $Dr_ID)";
        $deg_query = "INSERT INTO dr_degree (Degree, Dr_ID)
        VALUES ('$Degree', $Dr_ID)";

        $dr_results = mysqli_query( $connect, $dr_query)
            or die("Can not execute query");
        $contact_results = mysqli_query( $connect, $dr_contact_query)
            or die("Can not execute query");
        $contact_results = mysqli_query( $connect, $deg_query)
            or die("Can not execute query");
        header("location:doctor.php");
?>