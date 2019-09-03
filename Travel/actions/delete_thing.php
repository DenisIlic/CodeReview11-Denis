<?php 
require_once 'db_connect.php';
if ($_POST) {
	$t_id = $_POST['t_id'];

	$sql = "DELETE FROM things_to_do WHERE t_id = {$t_id}";
	
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while updating record : ". $connect->error;
   }
   $connect->close();
}
?>