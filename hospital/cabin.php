<!DOCTYPE html>
<html>
<head>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <link rel ="stylesheet" type ="text/css" href="style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <?php 
    session_start();
    if (!isset($_SESSION['loggedin'])){ 
        ?>
        <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
            <?php header("location:hospital_login.php"); ?>
        </div>
    <?php } 
    else { ?>
        <?php 
        include 'navbar.php';
        ?>
        <div style="padding-top:5px">
            <a href="hospital_home.php"><button class="btn btn-success" style="">Back</button></a>
        </div>
        <div class="ui menu">
            <h1 class="header">Cabins</h1>
        </div>
        <?php
            $hospital_id = $_SESSION['Hospital_ID'];
        ?>
    
        <div class="ui text container">
             <a href="cabin_add_form.php"style="padding-left: 95%;"><button class="btn btn-success" style="">Add</button></a>
            <?php
                include 'db_connect.php';
                $query = "SELECT Cabin_ID, Type, Vacancy FROM cabins WHERE Hospital_ID = $hospital_id";

                $results = mysqli_query( $connect, $query)          
                    or die("Can not execute query");                echo "<table class='ui table'> \n";
                echo "<thead><th>Cabin ID</th> <th>Type</th> <th>Vacancy</th> <th></th> </thead> \n";

                while( $rows = mysqli_fetch_array( $results ) ) {
                    extract( $rows );
                    echo "<tr>";
                    echo "<td> $Cabin_ID </td>";
                    echo "<td> $Type</td>";
                    echo "<td>" ?> <a href="update_cabin.php?Cabin_ID=<?php echo $Cabin_ID ?>&Vacancy=<?php echo $Vacancy ?>"><button class="btn btn-success" style="width: 75px"> <?php echo $Vacancy ?> </button></a><?php echo "</td>";
                    echo "<td  align='right'>" ?> <a href="delete_cabin.php?Cabin_ID=<?php echo $Cabin_ID ?>"><button class="btn btn-success" style="width: 75px">Delete</button></a> <?php echo "</td>";
                    echo "</tr> \n";
                }

                echo "</table> \n";
            ?>

        </div>
         <div style="padding-top:15%">
    <?php include 'footer.php'; ?>
    <?php } ?></div>
</body>
</html>