<?php 
require_once 'db_connect.php';
ob_start();
session_start();
$name = isset($_POST['name']) ? $_POST['name'] : null;

// search restaurants

if(strlen($name)==0) {
    $sql_restaurants = "SELECT * FROM restaurants JOIN locations ON restaurants.fk_loc = locations.loc_id";
} else {
    $sql_restaurants = "SELECT * FROM restaurants JOIN locations ON restaurants.fk_loc = locations.loc_id WHERE res_name LIKE'".$name."%'";
}
$result = $connect->query($sql_restaurants);
if(isset($_SESSION["admin"])) {
if($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    echo '<div class="col-lg-3 col-md-6 col-sm-12 my-2">
    <div class="card">
    <img class="card-img-top d-none d-sm-none d-md-block" src="'.$row['loc_img'].'" alt="location">
    <div class="card-body">
    <h5 class="card-title">'.$row['res_name'].'</h5>
    <p class="card-text"><small><i class="fa fa-map-marker darkpink-text"></i> '.$row['address'].' '.$row['zipcode'].' '.$row['city'].'</small></p>
    <p class="card-text"><i class="fa fa-star darkpink-text"></i> '.$row['res_type'].'</p>
    <p class="card-text"><i class="fa fa-heart darkpink-text"></i> '.$row['res_descr'].'</p>
    <p class="card-text"><i class="fa fa-phone darkpink-text"></i> '.$row['res_tel'].'</p>
    <p class="card-text"><a href="'.$row['res_web'].'" target="_blank" class="card-link darkpink-text"><i class="fa fa-laptop darkpink-text"></i> Go to Website</a></p>
    <a href="edit_res.php?id='.$row['res_id'].'"><button class="btn btn-primary">edit</button></a>
    <a href="delete_res.php?id='.$row['res_id'].'"><button class="btn btn-primary">delete</button></a>
    </div>
    </div>
    </div>';
      }
    }   
} else {
    if($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    echo '<div class="col-lg-3 col-md-6 col-sm-12 my-2">
    <div class="card">
    <img class="card-img-top d-none d-sm-none d-md-block" src="'.$row['loc_img'].'" alt="location">
    <div class="card-body">
    <h5 class="card-title">'.$row['res_name'].'</h5>
    <p class="card-text"><small><i class="fa fa-map-marker darkpink-text"></i> '.$row['address'].' '.$row['zipcode'].' '.$row['city'].'</small></p>
    <p class="card-text"><i class="fa fa-star darkpink-text"></i> '.$row['res_type'].'</p>
    <p class="card-text"><i class="fa fa-heart darkpink-text"></i> '.$row['res_descr'].'</p>
    <p class="card-text"><i class="fa fa-phone darkpink-text"></i> '.$row['res_tel'].'</p>
    <p class="card-text"><a href="'.$row['res_web'].'" target="_blank" class="card-link darkpink-text"><i class="fa fa-laptop darkpink-text"></i> Go to Website</a></p>
    </div>
    </div>
    </div>';
      }
    }   
}

$connect->close();
?>