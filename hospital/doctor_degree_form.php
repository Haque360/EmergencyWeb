<!DOCTYPE html>
<html>
<head>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <link rel ="stylesheet" type ="text/css" href="style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <?php 
    include 'db_connect.php';
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
            $Dr_ID = $_GET['Dr_ID'];
            $Dr_Name = $_GET['Dr_Name'];
            $query = "SELECT * FROM doctor AS DR JOIN dr_contact_no AS C USING (Dr_ID) JOIN dr_degree AS DEG USING (Dr_ID) WHERE Dr_ID = $Dr_ID";
            $results = mysqli_query( $connect, $query)
                or die("Can not execute query");
        ?>
        <div style="padding-top:5px">
            <a href="doctor_info.php?Dr_ID=<?php echo $Dr_ID ?>"><button class="btn btn-success" style="">Back</button></a>
        </div>
        <div class="ui menu">
            <h1 class="header"><?php echo "$Dr_Name's degreess" ?></h1>
        </div>
        <?php
            $hospital_id = $_SESSION['Hospital_ID'];
            $row = mysqli_fetch_array( $results );
            extract($row);
        ?>
        <div class="ui text container">
            <?php
                $contactQuery = "SELECT DISTINCT(Degree) FROM dr_degree WHERE Dr_ID = $Dr_ID";
                $results = mysqli_query( $connect, $contactQuery)
                    or die("Can not execute query");
                echo "<table class='ui table'> \n";
                echo "<thead><th>Degree: </th></thead>\n";
                while( $rows = mysqli_fetch_array( $results ) ) {
                    extract( $rows );
                    echo "<tr><td> $Degree </td> \n";
                    echo "</tr> \n";
                }
                echo "</table> \n";
                echo "
                    <form method=get action='add_doctor_degree.php'>
                        <input type='text' name='degree'>
                        <input type=hidden name=Dr_ID value=$Dr_ID >
                        <input name=doctor_degree_submission type='submit' value='Add' class='btn btn-success'>
                    </form>";
            ?>
        </div>

        

       <div style="padding-top:15%">
    <?php include 'footer.php'; ?></div>
    <?php } ?>
</body>
</html>