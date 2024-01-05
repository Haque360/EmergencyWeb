<!DOCTYPE html>
<html lang="en">
<head>
    <!-- student -->
</head>
<body>
    <h1>test</h1>
    <?php 
    session_start();
    if (!isset($_SESSION['loggedin'])){ 
        header("location:hospital_login.php"); 
    }
    else {
        $hospital_id = $_SESSION['Hospital_ID'];
        $ICU_ID = $_GET['ICU_ID'];
        $Vacancy = $_GET['Vacancy'];
    if($Vacancy == 0){
        $Vacancy = 1;
    }
    else{
        $Vacancy = 0;
    }
        include 'db_connect.php';
        $query = "UPDATE icu SET Vacancy = '$Vacancy' WHERE ICU_ID = $ICU_ID AND Hospital_ID = $hospital_id";
        mysqli_query( $connect, $query )
           or die("Can not execute query");
        header("location:icu.php");
    }
    ?>
</body>
</html>

