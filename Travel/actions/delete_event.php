<?php 
require_once 'db_connect.php';
if ($_POST) {
	$conc_id = $_POST['conc_id'];

	$sql = "DELETE FROM concerts WHERE conc_id = {$conc_id}";
	
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while updating record : ". $connect->error;
   }
   $connect->close();
}
?>