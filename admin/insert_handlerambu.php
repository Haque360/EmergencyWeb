<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insertion</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body>
	

	<div class="ui padded text segment container" style="margin-top: 20vh;">
		<?php

			$AComp_ID=$_GET["AComp_ID"];
			$No_of_Ambulances_Available = $_GET["No_of_Ambulances_Available"];
			$Name = $_GET["Name"];
			$Contact_No = $_GET["Contact_No"];
			$Password = $_GET["Password"];
			$Admin_ID=$_GET["Admin_ID"];
			$reg=$_GET["reg"];

			

			require_once('../db_connect.php');

			$connect = mysqli_connect( HOST, USER, PASS, DB )

				or die("Can not connect");


            
			mysqli_query( $connect, "INSERT INTO `ambulance_company` (`AComp_ID`, `No_of_Ambulances_Available`, `Name`, `Contact_No`, `Password`, `Admin_ID`, `Region_ID`) VALUES ('$AComp_ID', '$No_of_Ambulances_Available', '$Name', '$Contact_No', '$Password', '$Admin_ID', '$reg');" )



				or die("Can not execute query");


			header("location:ambulance.php");



		?>
		
	</div>
</body>
</html>