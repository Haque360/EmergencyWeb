<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Deletion</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body>

	<div class="ui text segment container" style="margin-top: 20vh;">
		<?php

			$AComp_ID = $_GET["ambu"];



			require_once('../db_connect.php');




			mysqli_query( $connect, "DELETE FROM ambulance_company WHERE AComp_ID=$AComp_ID" )

				or die("Can not execute query");



			
  	header("location:ambulance.php");

		?>
	</div>
</body>
</html>