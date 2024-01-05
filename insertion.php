<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insertion</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body>

<?php
    require_once('user/db_connect.php');
    
    $connect = mysqli_connect( HOST, USER, PASS, DB )
      or die("Can not connect");

      $results = mysqli_query( $connect, "select max(Customer_ID)+1 as id from customer " )
      or die("Can not execute query");
      $idt;
      while ($row = $results->fetch_assoc()) 
      { $idt=$row['id'];}

  ?>
	<div class="ui padded text segment container" style="margin-top: 20vh;">
		<?php
			$ID =$idt; 
			$nid=$_GET["nid"];
			$Fname= $_GET["Fname"];
			$Lname= $_GET["Lname"];
			$Email= $_GET["Email"];
			$Street= $_GET["Street"];
			$City= $_GET["City"];
			$Zip= $_GET["Zip"];
			$Password= $_GET["Password"];
			$Phone= $_GET["Phone"];

			
			

			require_once('db_connect.php');

			$connect = mysqli_connect( HOST, USER, PASS, DB )

				or die("Can not connect");

			mysqli_query( $connect, "INSERT INTO `customer` (`NID`, `F_Name`, `L_Name`, `Email`, `Phone_No`, `Street`, `Zip`, `City`, `Password`, `Customer_ID`) VALUES ('$nid', '$Fname', '$Lname', '$Email', '$Phone', '$Street', '$Zip', '$City', '$Password', '$ID');" )

				or die("Can not execute query");
			echo "<script>
			alert('Your Id is $ID');
			window.location.href ='loginset.php';
			</script>";

			// header("location:loginset.php");

		?>
		
	</div>
</body>
</html>


