<?php
session_start();

if(!isset($_SESSION['Admin_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

<?php
$cid=$_SESSION['Admin_ID'];
$dor=date("Y/m/d");


?>


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
			$pass=$_GET["Password"];



		?>
		<?php
			require_once('../db_connect.php');

			$connect = mysqli_connect( HOST, USER, PASS, DB )

				or die("Can not connect");
			$sql="UPDATE admin SET Password='$pass' where Admin_ID=$cid;";

			mysqli_query( $connect, $sql)

				or die("Can not execute query");

				header("location: profile.php");

		?>
		
	</div>
</body>
</html>