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
        $Cabin_ID = $_GET['Cabin_ID'];
        $Vacancy = $_GET['Vacancy'];
    if($Vacancy == 1){
        $Vacancy = 0;
    }
    else{
        $Vacancy = 1;
    }
        include 'db_connect.php';
        $query = "UPDATE cabins SET Vacancy = '$Vacancy' WHERE Cabin_ID = $Cabin_ID AND Hospital_ID = $hospital_id";
        mysqli_query( $connect, $query )
           or die("Can not execute query");
        header("location:cabin.php");
    }
    ?>
</body>
</html>
