<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
	 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	 <link rel ="stylesheet" type ="text/css" href="style.css">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



</head>
<body>
	
  <div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("navbar.php");
});
</script>


<div style="padding-top:5px">
            <a href="hospital.php"><button class="btn btn-success" style="">Back</button></a>
        </div>



	<div class="ui menu">
		<h1 class="header">I.C.U</h1>
	</div>
	<form action="icu.php" method="GET" class="form" style="margin-left: 9vw">
	<input type="text" name="region" class="form"></input>
	<input type="submit" value="Submit" class="btn btn-success" name="submit"></input>
</form>
	<div class="ui text container">

		
		<h1 class=" "></h1>
	

	  <?php
		require_once('db_connect.php');
		
		$connect = mysqli_connect( HOST, USER, PASS, DB )
			or die("Can not connect");
		
		if(isset($_GET['submit']) && $_GET['region']!=''){
			$region=$_GET['region'];
			$results = mysqli_query( $connect, "SELECT Hospital_Name,count(DR_ID) as Vacant,vacancy,street,city,zip FROM icu join hospital using (Hospital_ID) join hospital_location using(Hospital_ID) WHERE vacancy=1 group by Hospital_ID" )
			or die("Can not execute query");
		}else{
		$results = mysqli_query( $connect, "SELECT Hospital_Name, ICU_Type,count(ICU_ID) as Vacant FROM icu join hospital using(Hospital_ID)" )
			or die("Can not execute query");
		}
	?>

		<?php
			echo "<table class='ui table'> \n";
			echo "<thead><th>Hospital_Name</th> <th>Location</th> <th>Vacant</th> </thead> \n";

			while( $rows = mysqli_fetch_array( $results ) ) {
				extract( $rows );
				echo "<tr>";
				echo "<td> $Hospital_Name </td>";
				echo "<td> $ICU_Type</td>";
				echo "<td> $Vacant  </td>";
				echo "</tr> \n";
			}

			echo "</table> \n";
		?>
	

	</div>

<div id="foot-placeholder" style="padding-top: 15%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("footer.php");
});
</script>
</body>
</html>
