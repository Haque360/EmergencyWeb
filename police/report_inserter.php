     <?php
     session_start();

$psid=$_SESSION["PS_ID"];
?>
     <?php

    $rid=$_GET['rid'];
    $toll=0;
    require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
        $sql="SELECT MAX(Response_ID)+1 AS maxi
FROM responses;";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
        while ($row = $results->fetch_assoc()) {
            $rep=$row['maxi'];
        };

        // $psloc="Select Location from police_station where PS_ID='$psid'";
        // $res = mysqli_query( $connect, $psloc );
        // while ($tow = $res->fetch_assoc()) {
        //     $loc=$tow['Location'];
        // };
?>

      <?php
            
            $reply= $_GET['Reply'];
            $rcon=$_GET['content'];
            $rcus=$_GET['cid'];
            $date=date("Y/m/d");
            $aid=$_GET['aid'];
                 mysqli_query( $connect, "INSERT INTO `responses` (`Response_Content`, `Response_ID`, `Report_ID`) 
                 VALUES ('Police dispatched', '$rep', '$rid'); " )

                or die("Can not execute query");
                $sql2="UPDATE report SET Status=1 where Report_ID='$rid'";
                 mysqli_query( $connect, $sql2)

                or die("Can not execute query");

                header("location:policehome.php");
               
                   
                

                

        ?>