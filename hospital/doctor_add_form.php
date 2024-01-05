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
    <?php 
        include 'navbar.php' ?><div style="padding-top:5px">
            <a href="doctor.php"><button class="btn btn-success" style="">Back</button></a>
        </div>
        <div style="padding-top:5%">
    <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
        <h1>Insert Doctor Information</h1>
        
        <?php
            include 'db_connect.php';
            $query = "SELECT MAX(Dr_ID) AS Dr_ID FROM doctor";
            $results = mysqli_query( $connect, $query)
                or die("Can not execute query");
            $row = mysqli_fetch_array( $results );
            extract($row);
            $Dr_ID = $row['Dr_ID'];
            $Dr_ID = $Dr_ID + 1;
        ?>
        <form action="add_doctor.php" method="get" class="form" style="margin-left: 9vw">
            <input style="width: 70%" type="hidden" name="dr_id" value = "<?php echo $Dr_ID ?>"></input>
            <label for="name">Name: </label><br>
            <input style="width: 70%" type="text" name="name"></input><br>
            <label for="type">Type: </label><br>
            <input style="width: 70%" type="text" name="type"></input><br>
            <label for="contact_no">Contact No: </label><br>
            <input style="width: 70%" type="text" name="contact_no"></input><br>
            <label for="degree">Degree: </label><br>
            <input style="width: 70%" type="text" name="degree"></input><br><br>
            <input class="btn btn-success" type = "submit" value = "Add" ></input><br><br>
        </form>
    </div></div>
 <div style="padding-top:15%">
    <?php include 'footer.php'; ?></div>
</body>
</html>
