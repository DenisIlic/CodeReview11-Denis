<?php 
require_once 'db_connect.php';
if ($_POST) {
	$res_name = $_POST['res_name'];
	$res_tel = $_POST['res_tel'];
	$res_type = $_POST['res_type'];
	$res_descr = $_POST['res_descr'];
	$res_web = $_POST['res_web'];
	$fk_loc = $_POST['fk_loc'];

$sql = "INSERT INTO restaurants (res_name, res_tel, res_type, res_descr, res_web, fk_loc) VALUES ('$res_name', '$res_tel', '$res_type', '$res_descr', '$res_web', $fk_loc)";


if($connect->query($sql) === TRUE) {
       header("Location: ../index.php");
   } else {
        echo "Error while creating record : ". $connect->error;
   }
   $connect->close();
}
?>