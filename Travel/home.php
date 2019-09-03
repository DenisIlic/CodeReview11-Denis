<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';
// if session is not set this will redirect to login page
if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"])){
	header("Location: login.php");
	}
// select logged-in users details 
$id = isset($_SESSION["user"]) ? $_SESSION["user"] : $_SESSION["admin"];
$res=mysqli_query($connect, "SELECT * FROM users WHERE user_id=".$id);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
$img = $userRow['img_path'];
$firstname = $userRow['first_name'];


echo '
	<div class="d-flex justify-content-center align-items-center p-3">
  <img src="'.$img.'" class="align-self-start mr-3">
  <div>
    <h5 class="darkpink-text">'.$firstname.'<small class="ml-3"> <a class="text-decoration-none" href="logout.php?logout">Sign Out</a></small></h5> 
  </div>
</div>';

?>
