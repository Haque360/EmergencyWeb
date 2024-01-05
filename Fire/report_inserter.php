<?php
     session_start();

$fsid=$_SESSION["FS_ID"];
?>
     <?php

    $rid=$_GET['rid'];
    $toll=0;
    require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
        $sql="SELECT MAX(Report_ID)+1 AS maxi
FROM report;";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
        while ($row = $results->fetch_assoc()) {
            $rep=$row['maxi'];
        };

        $psloc="Select Location from fire_station where FS_ID='$fsid'";
        $res = mysqli_query( $connect, $psloc );
        while ($tow = $res->fetch_assoc()) {
            $loc=$tow['Location'];
        };
?>

      <?php
            
             $reply= $_GET['Reply'];
            $rcon=$_GET['content'];
            $rcus=$_GET['cid'];
            $date=date("Y/m/d");
            $aid=$_GET['aid'];
                 mysqli_query( $connect, "INSERT INTO `responses` (`Response_Content`, `Response_ID`, `Report_ID`) 
                 VALUES ('Firemen dispatched', '$rep', '$rid');" )

                or die("Can not execute query");
                $sql2="UPDATE report SET R_status=1 where Report_ID='$rid'";
                 mysqli_query( $connect, $sql2)

                or die("Can not execute query");

                header("location:firehome.php");
               
                   
                

                

        ?>