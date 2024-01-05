<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reading from DB</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body>

	<?php
  session_start();
    $city = $_SESSION['city'];
    $doc_type = $_SESSION['region'];
    $doctorQuery = "SELECT d.Dr_Name, h.Hospital_Name
              FROM hospital AS h
              JOIN doctor AS d USING (Hospital_ID)
              WHERE h.CITY = '$city' AND d.Specializes_in = '$doc_type'";
    $doctorContactQuery = "SELECT hn.Contact_No
              FROM hospital AS h
              JOIN doctor AS d USING (Hospital_ID)
              JOIN hospital_contact_no AS hn USING (Hospital_ID)
              WHERE h.CITY = '$city' AND d.Specializes_in = '$doc_type'";
		$doctor = mysqli_query( $connect, $doctorQuery)
			or die("Can not execute query");
    $doctorContact = mysqli_query( $connect, $doctorContactQuery)
      or die("Can not execute Contact No query");
	?>

	<div class="ui menu">
		<h1 class="header">Here's a list of doctors that you might be interested in.</h1>
	</div>

	<div class="ui text container">
		<a href="lookForDoctors.php"><button class="ui green button">Go back to homepage</button></a>
		<?php
			echo "<table class='ui table'> \n";
			echo "<thead><th>Name</th> <th>Hospital</th> <th>Contact No.</th> <th></thead> \n";

			while( $rows = mysqli_fetch_array( $doctor ) ) {
				extract( $rows );
				echo "<tr>";
				echo "<td> $Dr_Name </td>";	//The variable name has to match EXACTLY like the db column name
				echo "<td> $Hospital_Name </td>";
        echo "<td>"; 
          $phoneNo = mysqli_fetch_array( $doctorContact);
          extract($phoneNo);
          echo $Contact_No;
          while($phoneNo = mysqli_fetch_array( $doctorContact)){
            extract($phoneNo);
            echo ", ";
				    echo $Contact_No;
        }
        echo "</td>";
        
				echo "</tr> \n";
			}

			echo "</table> \n";
		?>
	

	</div>



</body>
</html>