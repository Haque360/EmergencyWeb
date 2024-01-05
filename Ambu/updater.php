<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body>
	

	<div class="ui padded text segment container" style="margin-top: 20vh;">
		<?php

			$AComp_ID = $_GET["AComp_ID"];
			$No_of_Ambulances_Available = $_GET["No_of_Ambulances_Available"];
			$Password = $_GET["Password"];

		?>
		<?php
			require_once('../db_connect.php');

			$connect = mysqli_connect( HOST, USER, PASS, DB )

				or die("Can not connect");
			$sql="UPDATE ambulance_company SET No_of_Ambulances_Available='$No_of_Ambulances_Available',Password='$Password' where AComp_ID='$AComp_ID'";

			mysqli_query( $connect, $sql)

				or die("Can not execute query");

				header("location: setting.php");

		?>
		
	</div>
</body>
</html>
