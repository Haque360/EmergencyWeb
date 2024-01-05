<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>
<?php
 require_once('../db_connect.php');
        
        
            $rep=$_GET['rid']; 
            $loc=$_GET['Location'];
            $report="Requesting Ambulance at location : $loc ";
            $rcus=$_GET['cid'];
            $date=date("Y/m/d");
           
            $psid=$_GET['ambu'];
            $aid=rand(1001,1004);
            echo $rep,$report,$rcus,$date,$loc,$psid,$aid;
                 mysqli_query( $connect, "INSERT INTO `report` (`Report_ID`, `Report_Content`, `Date`, `Status`, `Report_Type`, `PS_ID`, `FS_ID`, `AComp_ID`, `Admin_ID`, `Customer_ID`) VALUES ('$rep', '$report', '$date', '0', 'ambu', NULL, NULL, '$psid','$aid', '$rcus');" )

                or die("Can not execute query");

                header("location:confirm.php");
               
                   
                

                

        ?>