<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div>
        <div style="padding-top:5px">
            <a href="hospital_home.php"><button class="btn btn-success">Back</button></a>
        </div>
        <h1>Hospital Information</h1>
    </div>

    <?php
        include 'db_connect.php';
        session_start();
        $Hospital_ID = $_SESSION['Hospital_ID'];
        $query = "SELECT * FROM hospital JOIN hospital_contact_no USING(Hospital_ID) JOIN hospital_location using (Hospital_ID) WHERE Hospital_ID = $Hospital_ID";
        $results = mysqli_query( $connect, $query)
            or die("Can not execute query");
        $row = mysqli_fetch_array( $results );
        extract($row);
    ?>

    <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
        <form action="hospital_info_add_form.php" method="get" class="form" style="margin-left: 9vw">
            <label for="name">Name: </label><br>
            <input style="width: 70%" type="text" name="name" value="<?php echo $row['Hospital_Name'] ?>" readonly></input><br>
            <label for="email">Email: </label><br>
            <input style="width: 70%" type="text" name="email" value="<?php echo $row['Hospital_Email'] ?>" readonly></input><br>
            <input style="width: 70%" type="hidden" name="hospital_id" value="<?php echo $row['Hospital_ID'] ?>" readonly></input>
            <label for="street">Street: </label><br>
            <input style="width: 70%" type="text" name="street" value="<?php echo $row['Street'] ?>" readonly></input><br>
            <label for="city">City: </label><br>
            <input style="width: 70%" type="text" name="city" value="<?php echo $row['City'] ?>" readonly></input><br>
            <label for="zip">Zip: </label><br>
            <input style="width: 70%" type="number" name="zip" value="<?php echo $row['Zip'] ?>" readonly></input><br>
            <input style="width: 70%" type="hidden" name="admin_id" value="<?php echo $row['Admin_ID'] ?>" readonly></input><br>
            <input class="btn btn-success" type = "submit" value = "Edit" ></input><br><br>
        </form>
    </div>
 <div style="padding-top:15%">
    <?php include 'footer.php'; ?></div>
</body>
</html>
