<!DOCTYPE html>
<html>
<head>
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php 
  include 'navbar.php';
  include 'db_connect.php';
  ?>
  <h1 class="header">Police Stations</h1>
  <div class="container justify-content-center">
  
    <form action="police.php" method="POST" class="form" style="margin-left: 9vw">
      <a href="userhomepage.php" class="btn btn-success">Back</a>
      <p>Search by Name</p>
      <input type="text" name="region" class="form"></input>
      <input type="submit" value="Submit" class="btn btn-success" name="submit"></input>
    </form><br>
    <?php if(isset($_POST['submit']) && $_POST['region']!=''){ ?>
          <a href="police.php" class="btn btn-success">Clear Search</a>
    <?php } ?>
    <label style="">Don't Know your Location? Then: </label>
    <p id="region"></p>
    <form method='post' id="geo" style="display: none">
      <input type="text" id="fname" name="fname"><br><br>
      <input type="text" id="lname" name="lname"><br><br>
    </form>

    <button onclick="getLocation()" class="btn btn-success">Search By Current Location</button>
    <script type="text/javascript">
      var lat = "";
      var long = "";
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);

        } else {
          x.innerHTML = "Geolocation is not supported by this browser.";
        }
      }

      function showPosition(position) {
        lat = position.coords.latitude;
        long = position.coords.longitude;

        var a = document.getElementById("fname");
        var b = document.getElementById("lname");
        a.value = lat;
        b.value = long;
        var form = document.getElementById("geo");
          $.ajax({
            type: 'post',
            url: 'get_location.php',
            data: $('#geo').serialize(),
            success: function (data) {
              // alert(data);
              var a = JSON.parse(data);
              // alert(a);
              var location=a['PS_ID'];
              // data = {'pid': 2, 'address':'Mohammadpur'};

              var content = "<table class='table'><thead><tr><th>Police Station Id.</th><th>Location</th><th colspan='1'>Report</th></tr></thead>";
              content +=  "<tr><td>" + a['PS_ID'] + "</td><td>" + a['Address'] + "</td>";
              content += "<td><a href='report.php?psid=" + a['PS_ID'] + "' class='btn btn-success'>Report</a></td>";
              content += "</tr></table>";
              $('#police_station_table table').replaceWith(content);

            }
          });
      }


    </script>
      <?php

        if(isset($_POST['submit']) && $_POST['region']!=''){
          $region=$_POST['region'];
          $query = "SELECT PS_ID, Region_Name FROM region JOIN police_station USING(Region_ID) WHERE Region_Name like '%".$region."%'";
          $results=mysqli_query( $connect, $query)
            or die("Can not execute query");
        }
        else{
        $results = mysqli_query( $connect, "SELECT PS_ID, Region_Name FROM region JOIN police_station USING(Region_ID)" )
          or die("Can not execute query");
        }
        
      ?>
      
      <div class="row justify-content-center" id='police_station_table'>
      <table class="table" id="policetable">
          <thead>
            <tr>
              <th>Police Station Id.</th>
              <th>Location</th>
              <th colspan="1">Report</th>
            </tr>
          </thead>
          <?php
            while($row=$results->fetch_assoc()):?>
            <tr>
              <td><?php echo $row['PS_ID']?></td>
              <td><?php echo $row['Region_Name']?></td>
              <td><a href="report.php?psid=<?php echo $row['PS_ID'];?>" class="btn btn-success">Report</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
      </div>
  </div>

  <?php include 'footer.php'; ?>

</body>
</html>
