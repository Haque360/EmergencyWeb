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
    <div>
        <div style="padding-top:5px">
            <a href="hospital_home.php"><button class="btn btn-success">Back</button></a>
        </div>
        <h1>Hospital Information</h1>
    </div>

    <?php
        $Name = $_GET['name'];
        $Email = $_GET['email'];
        $Hopsital_ID = $_GET['hospital_id'];
        $Street = $_GET['street'];
        $City = $_GET['city'];
        $Zip = $_GET['zip'];
        $Admin_ID = $_GET['admin_id'];


        // echo $Name;
        // echo $Email;
        // echo $Hopsital_ID;
        // echo $Street;
        // echo $City;
        // echo $Zip;
        // echo $Admin_ID;
    ?>

    <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
        <form action="edit_hospital_info.php" method="get" class="form" style="margin-left: 9vw">
            <label for="name">Name: </label><br>
            <input style="width: 70%" type="text" name="name" value="<?php echo $Name ?>"></input><br>
            <label for="email">Email: </label><br>
            <input style="width: 70%" type="text" name="email" value="<?php echo $Email ?>"></input><br>
            <input style="width: 70%" type="hidden" name="hospital_id" value="<?php echo $Hopsital_ID ?>"></input>
            <label for="street">Street: </label><br>
            <input style="width: 70%" type="text" name="street" value="<?php echo $Street ?>"></input><br>
            <label for="city">City: </label><br>
            <input style="width: 70%" type="text" name="city" value="<?php echo $City ?>"></input><br>
            <label for="zip">Zip: </label><br>
            <input style="width: 70%" type="number" name="zip" value="<?php echo $Zip ?>"></input><br>
            <input style="width: 70%" type="hidden" name="admin_id" value="<?php echo $Admin_ID ?>"></input><br>
            <input class="btn btn-success" type = "submit" value = "Save" ></input><br><br>
        </form>
    </div>

</body>
</html>
