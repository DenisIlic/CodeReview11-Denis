<?php 
require_once 'actions/db_connect.php'; 


// function to get the locations as options
function getLocations(){
$selectLocations = "SELECT loc_id, address FROM locations";
//quick connection just for the function
$mysqli = new mysqli('localhost','root' ,'', 'cr11_denis_travelmatic');
$result = $mysqli->query($selectLocations);
$rows = $result->fetch_all(MYSQLI_ASSOC);
  $option = "";
  foreach ($rows as $row) {
  $option .= '<option value="'.$row['loc_id'].'">';
  $option .= $row['address'];
  $option .= '</option>';
  }
  echo $option;
}

include 'head.php'; 

//access denied for user
if( !isset($_SESSION['admin'])) {
header("Location: index.php");
}

?>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid d-flex align-items-center">
    <div class="container">
        <h1 class="display-1 mt-5 text-center amatic">Admin Panel</h1>
    </div>
</div>

<div class="row m-0 py-5 px-4">
<div class="col-lg-6 col-md-6 col-sm-12 pt-5">
    <form action="actions/create_restaurant.php" method="POST">
        <div class="form-group">
            <label for="name">Restaurant Name</label>
            <input type="text" name="res_name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
            <small id="nameHelp" class="form-text text-muted">Input the name of restaurant</small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="res_descr" id="description" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="type">Restaurant Type</label>
          <input type="text" name="res_type" class="form-control" id="type" aria-describedby="typeHelp" placeholder="Enter type">
          <small id="typeHelp" class="form-text text-muted">Input the type of restaurant</small>
        </div>
        <div class="form-group">
            <label for="location">Select Location</label>
            <select name="fk_loc" class="form-control" id="location">
            <?php getLocations(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="phonenumber">Phone Number</label>
            <input type="text" name="res_tel" class="form-control" id="phonenumber" aria-describedby="phonenumberHelp" placeholder="Enter phone number">
            <small id="phonenumberHelp" class="form-text text-muted">Input the phone number like so (+43 677 8292939)</small>
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" name="res_web" class="form-control" id="website" aria-describedby="websiteHelp" placeholder="Enter the website link">
            <small id="websiteHelp" class="form-text text-muted">Input the link to the website</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
    <img class="img-fluid" src="resources/img/bakery.jpg">
</div>
</div>
<?php include 'footer.php' ?>