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
			$Aid = $_GET["Admin_ID"];
			$Pass= $_GET["Password"];
			$con = $_GET["contact"];
			$reg=$_GET["region"];
		

			require_once('../db_connect.php');

			$connect = mysqli_connect( HOST, USER, PASS, DB )

				or die("Can not connect");



			mysqli_query( $connect, "INSERT INTO `police_station` (`PS_ID`, `Contact_No`, `Password`, `Admin_ID`, `Region_ID`) VALUES ('$ID', '$con', '$Pass', '$Aid', '$reg');" )

				or die("Can not execute query");



			header("location:police.php");

		?>
		
	</div>
</body>
</html>


