<?php 
require_once 'db_connect.php';

$maps_sql = "SELECT address, lat, lng FROM locations";
$result = $connect->query($maps_sql);
$loc_array = array();
while ($row = $result->fetch_assoc()){
	array_push($loc_array, [
		'address' => $row['address'],
		'lat' => $row['lat'],
        'lng' => $row['lng']
	]);
}

$json_loc = json_encode($loc_array);
echo $json_loc;
?>