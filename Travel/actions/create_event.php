<?php 
require_once 'db_connect.php';
if ($_POST) {
	$conc_name = $_POST['conc_name'];
	$venue = $_POST['venue'];
	$conc_price = $_POST['conc_price'];
	$conc_date = $_POST['conc_date'];
	$conc_time = $_POST['conc_time'];
	$conc_web = $_POST['conc_web'];
	$fk_loc = $_POST['fk_loc'];

$sql = "INSERT INTO concerts (conc_name, venue, conc_price, conc_date, conc_time, conc_web, fk_loc) VALUES ('$conc_name', '$venue', '$conc_price', '$conc_date', '$conc_time', '$conc_web', $fk_loc)";


if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while creating record : ". $connect->error;
   }
   $connect->close();
}
?>