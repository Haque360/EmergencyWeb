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

			$PS_ID = $_GET["PS_ID"];
			$loc = $_GET["Location"];
			$pass = $_GET["Password"];
        echo $PS_ID;

		?>
		<?php
			require_once('../db_connect.php');

			
			$sql="UPDATE police_station SET password='$pass' where PS_ID='$PS_ID'";

			mysqli_query( $connect, $sql)

				or die("Can not execute query");
        
        $sql2="UPDATE `p_station_location` SET `Address` = '$loc' WHERE `p_station_location`.`PS_ID` =$PS_ID;";
        mysqli_query( $connect, $sql2)
            or die("Can not execute query");

				header("location: setting.php");

		?>
		
	</div>
</body>
</html>

