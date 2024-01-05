<?php
include 'db_connect.php';

if (isset($_POST['fname'])){
 $lati = $_POST['fname'];
 $longi = $_POST['lname'];

$response = file_get_contents("https://us1.locationiq.com/v1/reverse.php?key=pk.692edd5632ee8829b73a161ddda6eb04&lat=".$lati."&lon=".$longi."&format=json");
$res = json_decode($response, true);
$input = $res['address']['suburb'];

// array of words to check against
$query = "SELECT Region_Name FROM region";
$results = mysqli_query( $connect, $query)
    or die("Can not execute query");
$regions = array();
while($row = mysqli_fetch_assoc( $results )){
    array_push($regions, $row['Region_Name']);
}
// $words  = array('Foo bar','Lorem Ispum','mohammad');

// no shortest distance found, yet
$shortest = -1;

// loop through words to find the closest
foreach ($regions as $region) {

    // calculate the distance between the input word,
    // and the current word
    $lev = levenshtein($input, $region);

    // check for an exact match
    if ($lev == 0) {

        // closest word is this one (exact match)
        $closest = $region;
        $shortest = 0;

        // break out of the loop; we've found an exact match
        break;
    }

    // if this distance is less than the next found shortest
    // distance, OR if a next shortest word has not yet been found
    if ($lev <= $shortest || $shortest < 0) {
        // set the closest match, and shortest distance
        $closest  = $region;
        $shortest = $lev;
    }
}


// echo json_encode([$input, $closest, $response, $words]);
// echo json_encode($regions);

$psquery = "SELECT Region_ID FROM region WHERE Region_Name = '$closest'";
// echo $psquery;
$results = mysqli_query( $connect, $psquery)
    or die("Can not execute query");
$row = mysqli_fetch_assoc( $results );
extract($row);
$Region_ID = $row['Region_ID'];

$police_station = mysqli_query( $connect, "SELECT p.PS_ID AS PS_ID, l.Address AS Address FROM police_station AS p JOIN p_station_location AS l USING(PS_ID) WHERE Region_ID = '$Region_ID'" )
          or die("Can not execute query");
$police_row = mysqli_fetch_assoc( $police_station );
extract($police_row);

// echo $police_row['PS_ID'];
echo json_encode($police_row);


// echo $row['Region_ID'];

// echo $closest;
// echo $input."\n";

}
else {
    echo "no data provided!";
}


?>