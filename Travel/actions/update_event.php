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

	$conc_id = $_POST['conc_id'];

	$sql = "UPDATE concerts SET conc_name = '$conc_name', venue = '$venue', conc_price = '$conc_price', conc_date = '$conc_date', conc_time = '$conc_time', conc_web  = '$conc_web', fk_loc = '$fk_loc' WHERE conc_id = {$conc_id}" ;
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while updating record : ". $connect->error;
   }
   $connect->close();
}
?>