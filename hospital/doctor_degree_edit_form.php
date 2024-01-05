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
        include 'navbar.php' ?>
        
       <div class="ui text container" style="padding-top:5%;margin-left: 30%;">
        <label><H1>Edit Degree Info:<H1></label>
    <?php
        $Dr_ID=$_GET['Dr_ID'];
        $Degree=$_GET['Degree'];
            echo  "<form method=get action='edit_doctor_degree.php'>
            <input type=text name=New_Degree placeholder=$Degree>
            <input type=hidden name=Dr_ID value=$Dr_ID >
            <input type=hidden name=Degree value=$Degree>
            <input name=doctor_degree_edit_submission type='submit' value='Save' class='btn btn-success'>
        </form>";
    ?>
</div>

      <div style="padding-top:20%">
    <?php include 'footer.php'; ?>
    <?php } ?></div>
</body>
</html>

