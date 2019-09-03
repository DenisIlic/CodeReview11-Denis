<?php 
require_once 'db_connect.php';
if ($_POST) {
	$address = $_POST['address'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];
	$loc_img = $_POST['loc_img'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	$sql = "INSERT INTO locations (address, zipcode, city, loc_img, lat, lng) VALUES ('$address', '$zipcode', '$city', '$loc_img', $lat, $lng)";
	
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while creating record : ". $connect->error;
   }
   $connect->close();
}
?>