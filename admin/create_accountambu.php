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
            <a href="ambulance.php"><button class="btn btn-success" style="">Back</button></a>
        </div>
	<div class="ui menu">
		
	</div>


	<?php
    require_once('db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

      $results = mysqli_query( $connect, "select AComp_ID+1 as  AComp_ID from ambulance_company ORDER BY AComp_ID DESC LIMIT 1;" )
      or die("Can not execute query");

  ?>




<div class="ui menu" style="padding-top:5%">
	<div id="cot" class="container" style="background-color: #DBF9FC;width:40%; padding-left: 10vw;">

<h1 class="header">Ambulance Registration</h1>
		<form class="ui form" method=get action=insert_handlerambu.php>

			<p>



			Ambulance ID: <br><input readonly style="width:70%;" type=number value="<?php while ($row = $results->fetch_assoc()) {
            echo $row['AComp_ID'];}?>"name=AComp_ID> <br>


			<p>
			Admin_ID: <br><input style="width:70%;" type=number value="<?php echo(rand(1001,1004)) ?>" name=Admin_ID> <br>

			<p>

			No of Ambulances: <br><input style="width:70%;" type=number name=No_of_Ambulances_Available> <br>

			<p>

			Name: <br><input style="width:70%;" type=text name=Name> <br>

			<p>

			Contact_No:<br> <input style="width:70%;" type=text name=Contact_No> <br>

			<p>
				Region: <br><input style="width:70%;" type=text name=reg> <br>
			<p>
			Password: <br><input style="width:70%;" type=text name=Password> <br>
			<p>

			
			<input  class="btn btn-success" type=submit value="Register">
			 <br><input style="width:70%;" type=text  hidden> <br>
			<p>
		</form>
	</div></div>


	<div id="foot-placeholder" style="padding-top: 15%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("../footer.php");
});
</script>
</body>
</html>