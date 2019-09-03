<?php 
require_once 'db_connect.php';
if ($_POST) {
	$t_name = $_POST['t_name'];
	$t_type = $_POST['t_type'];
	$t_descr = $_POST['t_descr'];
	$t_web = $_POST['t_web'];
	$fk_loc = $_POST['fk_loc'];

	$sql = "INSERT INTO things_to_do (t_name, t_type, t_descr, t_web, fk_loc) VALUES ('$t_name', '$t_type', '$t_descr', '$t_web', $fk_loc)";
	
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while creating record : ". $connect->error;
   }
   $connect->close();
}
?>