<?php 
require_once 'db_connect.php';
if ($_POST) {
	$res_name = $_POST['res_name'];
	$res_tel = $_POST['res_tel'];
	$res_type = $_POST['res_type'];
	$res_descr = $_POST['res_descr'];
	$res_web = $_POST['res_web'];
	$fk_loc = $_POST['fk_loc'];

	$res_id = $_POST['res_id'];

	$sql = "UPDATE restaurants SET res_name = '$res_name', res_tel = '$res_tel', res_type  = '$res_type', res_descr = '$res_descr', res_web  = '$res_web', fk_loc = '$fk_loc' WHERE res_id = {$res_id}" ;
   if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while updating record : ". $connect->error;
   }
   $connect->close();
}
?>