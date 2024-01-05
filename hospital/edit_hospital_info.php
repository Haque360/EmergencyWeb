<?php
        include 'db_connect.php';
        $Name = $_GET['name'];
        $Email = $_GET['email'];
        $Hopsital_ID = $_GET['hospital_id'];
        $Street = $_GET['street'];
        $City = $_GET['city'];
        $Zip = $_GET['zip'];
        $Admin_ID = $_GET['admin_id'];
        echo $Name."\n";
        echo $Email."\n";
        echo $Hopsital_ID."\n";
        echo $Street."\n";
        echo $City."\n";
        echo $Zip."\n";
        echo $Admin_ID."\n";
        $query = "UPDATE hospital SET Hospital_Name = '$Name', Hospital_Email = '$Email'
                WHERE Hospital_ID = '$Hopsital_ID'";
        $results = mysqli_query( $connect, $query )
           or die("Can not execute query");
        $query = "UPDATE hospital_location SET Street = '$Street', City = '$City', Zip = $Zip
           WHERE Hospital_ID = '$Hopsital_ID'";
        $results = mysqli_query( $connect, $query )
                or die("Can not execute query");
        // $query = "UPDATE hospital_contact_no SET Contact_No = '$Street', City = '$City', Zip = $Zip
        //         WHERE Hospital_ID = '$Hopsital_ID'";
        // $results = mysqli_query( $connect, $query )
                //      or die("Can not execute query");
        echo "after";
        header("location:hospital_profile.php?Dr_ID=$Dr_ID");
?>