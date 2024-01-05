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

			$ID = $_GET["ID"];
			$con = $_GET["contact"];
			$reg=$_GET["region"];
	        $Pass= $_GET["Password"];
			$Aid = $_GET["Admin_ID"];


			require_once('../db_connect.php');

			



			mysqli_query( $connect, "INSERT INTO `fire_station` (`FS_ID`, `Contact_No`, `Password`, `Admin_ID`, `Region_ID`) VALUES ('$ID', '$con', '$Pass', '$Aid', '$reg');" )

				or die("Can not execute query");

header("location:fire_station.php");
		?>
		
	</div>
</body>
</html>