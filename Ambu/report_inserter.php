<?php
//session_start();

//if(!isset($_SESSION['AComp_ID'])){
  //  header("location:../ambulogin.php");
    //exit;
//}


//?>

//<?php 
  //      $id = $_SESSION['AComp_ID'];



//?>

 <?php
     session_start();
$id=$_SESSION["AComp_ID"];

echo $id;
?>




     <?php

    $rid=$_GET['rid'];
    echo $rid;
    $toll=0;
    require_once('../db_connect.php');
        
        $sql="SELECT MAX(Response_ID)+1 AS maxi
FROM responses;";
            $results = mysqli_query( $connect, $sql )
            or die("Can not execute query");
        while ($row = $results->fetch_assoc()) {
            $rep=$row['maxi'];
        };
echo $rep;
        $psloc="will be today";
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
            echo $rep;
                 mysqli_query( $connect, "INSERT INTO `responses` (`Response_Content`, `Response_ID`, `Report_ID`) VALUES ('Ambulance dispatched', '$rep', '$rid'); " )

                or die("Can not execute query");

                echo $id;
                $sql2="UPDATE reports SET status=1 where Report_ID='$rid'";
                 mysqli_query( $connect, $sql2)

                or die("Can not execute query");

                $noaa="select No_of_Ambulances_Available from ambulance_company where AComp_ID=$id";
                 $res=mysqli_query( $connect, $noaa) or die("Can not execute query"); 

                 while ($tow = $res->fetch_assoc()) {
                     $nom=$tow['No_of_Ambulances_Available']; 
                 };
                 echo $nom;
                mysqli_query($connect,"UPDATE ambulance_company SET No_of_Ambulances_Available=$nom-1 where AComp_ID='$id'");

                header("location:slnhome.php");
               
                   
                

                

        ?>