<?php
session_start();

if(!isset($_SESSION['Customer_ID'])){
    header("location:../loginset.php");
    exit;
}


?>

<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   <link rel ="stylesheet" type ="text/css" href="style.css">
    
</head>
<body>
	  <div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("navbar.php");
});
</script>


<div style="padding-top:5px">
            <a href="hospital.php"><button class="btn btn-success" style="">Back</button></a>
        </div>


<label></label>

		
		<form method="get" action = "doctor.php">

  <label for="doc_type">Type of Doctor:</label>
  <input type="text" id="doc_type" name="doc_type">
  <input type="submit" class="btn btn-success" name="submit">

</form>
	

	</div>
	<?php
	$connect = mysqli_connect(HOST, USER, PASS, DB)
		or die("Can not connect"); 
		
		if(!isset($_GET['submit']))
		{
			$doctorQuery = "SELECT d.Dr_Name, h.Hospital_Name
              FROM hospital AS h
              JOIN doctor AS d USING (Hospital_ID)";
    $doctorContactQuery = "SELECT hn.Contact_No
              FROM hospital AS h
              JOIN doctor AS d USING (Hospital_ID)
              JOIN hospital_contact_no AS hn USING (Hospital_ID)";
		$doctor = mysqli_query( $connect, $doctorQuery)
			or die("Can not execute query");
    $doctorContact = mysqli_query( $connect, $doctorContactQuery)
      or die("Can not execute Contact No query");
		}
		else
		{
		$doc_type = $_GET['doc_type'];
    $doctorQuery = "SELECT d.Dr_Name, h.Hospital_Name
              FROM hospital AS h
              JOIN doctor AS d USING (Hospital_ID)
              WHERE  d.Specializes_in = '$doc_type'";
    $doctorContactQuery = "SELECT hn.Contact_No
              FROM hospital AS h
              JOIN doctor AS d USING (Hospital_ID)
              JOIN dr_contact_no AS hn USING (Dr_ID)
              WHERE  d.Specializes_in = '$doc_type'";
		$doctor = mysqli_query( $connect, $doctorQuery)
			or die("Can not execute query");
    $doctorContact = mysqli_query( $connect, $doctorContactQuery)
      or die("Can not execute Contact No query");}
	?>

	<div class="ui menu">
		
	</div>

	<div class="ui text container">
		
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

<div id="foot-placeholder" style="padding-top: 20%">

</div>
<script>
$(function(){
  $("#foot-placeholder").load("footer.php");
});
</script>

</body>
</html>