<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>
<?php
 require_once('../db_connect.php');
        
        $connect = mysqli_connect( HOST, USER, PASS, DB )
            or die("Can not connect");
            $rep=$_GET['rid'];
            $report= $_GET['content'];
            $rcus=$_GET['cid'];
            $date=date("Y/m/d");
            $loc=$_GET['Location'];
            $fsid=$_GET['fsid'];
            $aid=rand(1001,1004);
                 mysqli_query( $connect, "INSERT INTO `report` (`Report_ID`, `Report_Content`, `Date`, `Status`, `Report_Type`, `PS_ID`, `FS_ID`, `AComp_ID`, `Admin_ID`, `Customer_ID`) VALUES ('$rep', '$report', '$date', '0', 'fire', NULL, $fsid, NULL,'$aid', '$rcus');" )

                or die("Can not execute query");
                header("location:confirm.php");
               
                   
                

                

        ?>