<?php 
error_reporting(0);
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'cr11_denis_travelmatic');

	// initialize variables
	$restID = 0;
	$restName = "";
	$restNumber = "";
	$restType = "";
	$restDesc = "";
	$restAdress = "";
	$update = false;

	if (isset($_POST['save'])) {
		$restName = $_POST['restName'];
		$restNumber = $_POST['restNumber'];
		$restType = $_POST['restType'];
		$restDesc = $_POST['restDesc'];
		$restAdress = $_POST['restAdress'];
		mysqli_query($db, "INSERT INTO restaurant (restName, restNumber, restType, restDesc, restAdress)VALUES ('$restName', '$restNumber', '$restType', '$restDesc', '$restAdress')"); 
		$_SESSION['msg'] = "Address saved"; 
		header('location: restaurant.php');
	}
// Update records 

	if (isset($_POST['update'])) {
	$restID = $_POST['restID'];
	$restName = $_POST['restName'];
	$restNumber = $_POST['restNumber'];
	$restType = $_POST['restType'];
	$restDesc = $_POST['restDesc'];
	$restAdress = $_POST['restAdress'];

	mysqli_query($db, "UPDATE restaurant SET restName='$restName', restNumber='$restNumber', restType='$restType', restDesc='$restDesc', restAdress='$restAdress' WHERE restID=$restID");
	$_SESSION['msg'] = "Address updated!"; 
	header('location: restaurant.php');
}
// Delete record 

if (isset($_GET['del'])) {
	$restID = $_GET['del'];
	mysqli_query($db, "DELETE FROM restaurant WHERE restID=$restID");
	$_SESSION['msg'] = "Address deleted!"; 
	header('location: restaurant.php');
}

// Retrieve recods
	$results = mysqli_query($db, "SELECT * FROM restaurant"); ?>