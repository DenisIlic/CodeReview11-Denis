<?php 
require_once 'db_connect.php';
if ($_POST) {
	$res_id = $_POST['res_id'];

	$sql = "DELETE FROM restaurants WHERE res_id = {$res_id}";
	
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while updating record : ". $connect->error;
   }
   $connect->close();
}
?>