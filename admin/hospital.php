<?php
session_start();

if(!isset($_SESSION['Admin_ID'])){
    header("location:../adminlogin.php");
    exit;
}?>
<!DOCTYPE html>
<html>
<head>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
  <h1 class="header">Hospitals</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php include 'navbar.php'; ?>
  <div class="container justify-content-center">
    <div class="ui menu">

    </div>
    <form action="hospital.php" method="GET" class="form" style="margin-left: 9vw">
      <a href="admin_home.php" class="btn btn-success">Back</a>
      <p>Search by Name</p>
      <?php if(isset($_GET['submit']) && $_GET['Hospital_Name']!=''){ ?>
            <a href="hospital.php" class="btn btn-success">Clear Search</a>
      <?php } ?>
      <input type="text" name="Hospital_Name" class="form"></input>
      <input type="submit" value="Search" class="btn btn-success" name="submit"></input>
      <a href="hospital_form.php" class="btn btn-success">Add New Hospital</a>
    </form>
    <div class="ui text container">

      <h1 class=" "></h1>

      <?php
        include "db_connect.php";

        if(isset($_GET['submit']) && $_GET['Hospital_Name']!=''){
          $Hospital_Name=$_GET['Hospital_Name'];
          $query = "SELECT Hospital_ID , Hospital_Name, CONCAT(Street, ', ', City, ', ', Zip) AS Location FROM `hospital` JOIN hospital_location USING (Hospital_ID)";
          $results=mysqli_query( $connect, $query)
              or die("Can not execute query");
        }
        else{
        $results = mysqli_query( $connect, /media/student/4CB9-1ED6/999/create_account.php
/media/student/4CB9-1ED6/999/hospital.php
/media/student/4CB9-1ED6/999/hospital_form.php )
          or die("Can not execute query");
        }
      ?>
      <div class="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th>Hospital ID</th>
              <th>Hospital Name</th>
              <th>Location</th>
              <th colspan="1">Report</th>
            </tr>
          </thead>
          <?php
          while($rows = mysqli_fetch_array($results)) {
            extract($rows);
            echo "<tr>";
            echo "<td> $Hospital_ID </td>";
            echo "<td> $Hospital_Name </td>";
            echo "<td> $Location </td>";
            echo "<td> <a href='delete.php?Hospital_ID=$Hospital_ID'>Delete</a> </td>";
            echo "</tr> \n";
          }
          ?>
        </table>
      </div>
    </div>

  <?php include 'footer.php'; ?>

</body>
</html>