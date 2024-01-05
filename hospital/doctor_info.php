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
            $query = "SELECT * FROM doctor AS DR JOIN dr_contact_no AS C USING (Dr_ID) JOIN dr_degree AS DEG USING (Dr_ID) WHERE Dr_ID = $Dr_ID";
            $results = mysqli_query( $connect, $query)
                or die("Can not execute query");
        ?>
        <div style="padding-top:5px">
            <a href="doctor.php"><button class="btn btn-success" style="">Back</button></a>
        </div>
        <div class="ui menu">
            <h1 class="header">Doctor's Information</h1>
        </div>
        <?php
            $hospital_id = $_SESSION['Hospital_ID'];
            $row = mysqli_fetch_array( $results );
            extract($row);
        ?>
         <!-- basic info -->
        <div class="ui text container">
            <table class="ui table">
            <?php
                echo "<table class='ui table'> \n"; 
                echo "<thead><th>Basic Info: </th></thead>\n";
                echo "<tr><td>ID: $Dr_ID </td></tr>\n";
                echo "<tr><td> Name: $Dr_Name  </td></tr> \n";
                echo "<tr><td> Type: $Specializes_in </td></tr> \n";
                echo "</table> \n";
            ?>
        </div><br>
        <!-- Contact No -->
        <div class="ui text container">
            <?php
                $contactQuery = "SELECT DISTINCT(Contact_No) FROM dr_contact_no WHERE Dr_ID = $Dr_ID";
                $results = mysqli_query( $connect, $contactQuery)
                    or die("Can not execute query");
                echo "<table class='ui table'> \n";
                echo "<thead><th>Contact Number: </th> <th align='right'style='padding-left:48%;'><a href='doctor_contact_form.php?Dr_ID=$Dr_ID&Dr_Name=$Dr_Name'><button class='btn btn-success' >Add</button></a></th> </thead>\n";
                while( $rows = mysqli_fetch_array( $results ) ) {
                    extract( $rows );
                    echo "<tr>";
                    echo "<td> $Contact_No </td>";
                    echo "<td align='right'>" ?> <a href="doctor_contact_edit_form.php?Dr_ID=<?php echo $Dr_ID ?>&Contact_No=<?php echo $Contact_No ?>"><button class="btn btn-success" style="width: 75px">Edit</button></a>
                    <a href="delete_doctor_contact.php?Dr_ID=<?php echo $Dr_ID ?>&Contact_No=<?php echo $Contact_No ?>"><button class="btn btn-success" style="width: 75px">Delete</button></a> <?php echo "</td>";
                    echo "</tr> \n";
                }
                echo "</table> \n";
            ?>
        </div>
        <div class="ui text container">
            <!-- Degree -->
            <?php
                $contactQuery = "SELECT DISTINCT(Degree) FROM dr_degree WHERE Dr_ID = $Dr_ID";
                $results = mysqli_query( $connect, $contactQuery)
                    or die("Can not execute query");
                echo "<table class='ui table'> \n";
                echo "<thead><th>Degree: </th> <th align='right' style='padding-left:50.5%;'><a href='doctor_degree_form.php?Dr_ID=$Dr_ID&Dr_Name=$Dr_Name'><button class='btn btn-success'>Add</button></a></th></thead>\n";
                while( $rows = mysqli_fetch_array( $results ) ) {
                    extract( $rows );
                    echo "<tr><td> $Degree </td> \n";
                    echo "<td align='right'>" ?> <a href="doctor_degree_edit_form.php?Dr_ID=<?php echo $Dr_ID ?>&Degree=<?php echo $Degree ?>"><button class="btn btn-success" style="width: 75px">Edit</button></a>
                    <a href="delete_doctor_degree.php?Dr_ID=<?php echo $Dr_ID ?>&Degree=<?php echo $Degree ?>"><button class="btn btn-success" style="width: 75px">Delete</button></a> <?php echo "</td>";
                    echo "</tr> \n";
                }
                echo "</table> \n";
            ?>
        </div>

        

        <?php include 'footer.php' ?>
    <?php } ?>
</body>
</html>