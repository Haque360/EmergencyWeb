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
            <a href="delivery_room.php"><button class="btn btn-success">Back</button></a>
        </div>
        <h1>Insert Delivery Room Information</h1>
    </div>

    <div id="cot" class="container" style="background-color: #DBF9FC;width:50%">
        <form action="add_delivery_room.php" method="get" class="form" style="margin-left: 9vw">
            <label for="delivery_room_id">Delivery Room ID: </label><br>
            <input style="width: 70%" type="number" name="delivery_room_id"></input><br><br>
            <input class="btn btn-success" type = "submit" value = "Add" ></input><br><br>
        </form>
    </div>

</body>
</html>
