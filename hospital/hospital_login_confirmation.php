<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php
            include 'db_connect.php';
            if(isset($_GET['hospital_login_form'])){
                $hospital_id = $_GET['hospital_id'];
                $password = $_GET['password'];
                $password_query = "SELECT Hospital_ID FROM hospital WHERE Hospital_ID = $hospital_id AND Password='$password'";
                echo $password_query;
                $actual_pass_table = mysqli_query($connect,$password_query)
                                        or die("Can not execute query");
                $actual_pass_row = mysqli_fetch_assoc($actual_pass_table);
                echo $actual_pass_row;
                if(count($actual_pass_row)>0){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['Hospital_ID'] = $hospital_id;
                    $_SESSION['Password'] = $password;
                    header("location:hospital_home.php");

                }
                else{
                    header("location:hospital_login.php?invalid_pass=true");

                }
            }
        ?>
    </div>
</body>
</html>

