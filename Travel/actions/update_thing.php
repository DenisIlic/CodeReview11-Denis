<?php 
require_once 'db_connect.php';
if ($_POST) {
	$t_name = $_POST['t_name'];
	$t_type = $_POST['t_type'];
	$t_descr = $_POST['t_descr'];
	$t_web = $_POST['t_web'];
	$fk_loc = $_POST['fk_loc'];

	$t_id = $_POST['t_id'];

	$sql = "UPDATE things_to_do SET t_name = '$t_name', t_type  = '$t_type', t_descr = '$t_descr', t_web  = '$t_web', fk_loc = '$fk_loc' WHERE t_id = {$t_id}" ;
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while updating record : ". $connect->error;
   }
   $connect->close();
}
?>