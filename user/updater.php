
<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

<?php
$id=$_SESSION['Customer_ID'];
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

			$fname = $_GET["Fname"];
			$lname= $_GET["Lname"];
			$email=$_GET["Email"];
			$phone=$_GET["Phone"];
			$street=$_GET["Street"];
			$city=$_GET["City"];
			$zip=$_GET["Zip"];
			$pass=$_GET["Password"];


echo $pass;

		?>
		<?php
			require_once('../db_connect.php');

			$connect = mysqli_connect( HOST, USER, PASS, DB )

				or die("Can not connect");
			$sql="UPDATE customer SET F_Name='$fname',L_Name='$lname',Email='$email',Phone_No='$phone',Street='$street',Zip='$zip',City='$city',Password='$pass' where Customer_ID=$id;";

			mysqli_query( $connect, $sql)

				or die("Can not execute query");

				header("location: profile.php");

		?>
		
	</div>
</body>
</html>

