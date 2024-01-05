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

			$Aid = $_GET["Admin_ID"];
			$Pass= $_GET["Password"];
		

			require_once('../db_connect.php');

			$connect = mysqli_connect( HOST, USER, PASS, DB )

				or die("Can not connect");



			mysqli_query( $connect, "INSERT INTO `admin` (`Admin_ID`, `Password`) VALUES ('$Aid', '$Pass');" )

				or die("Can not execute query");



			header("location:police.php");

		?>
		
	</div>
</body>
</html>


