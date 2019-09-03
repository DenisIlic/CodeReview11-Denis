<?php 
require_once 'actions/db_connect.php'; 

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
    <form action="actions/create_location.php" method="POST">
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="name" aria-describedby="addressHelp" placeholder="Enter address">
            <small id="nameHelp" class="form-text text-muted">Input the address</small>
        </div>
        <div class="form-group">
            <label for="zipcode">Zipcode</label>
            <input type="text" name="zipcode" class="form-control" id="name" aria-describedby="zipcodeHelp" placeholder="Enter zipcode">
            <small id="nameHelp" class="form-text text-muted">Input the zipcode</small>
        </div>
        <div class="form-group">
          <label for="type">City</label>
          <input type="text" name="city" class="form-control" id="city" aria-describedby="cityHelp" placeholder="Enter city">
          <small id="typeHelp" class="form-text text-muted">Input the city</small>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="loc_img" class="form-control" id="image" aria-describedby="imageHelp" placeholder="Enter the image url">
            <small id="websiteHelp" class="form-text text-muted">Input the image url, beware of proportions and quality: use an image with a square format (roughly 1000x1000 px) for a good result </small>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="lat" class="form-control" id="latitude" aria-describedby="latitudeHelp" placeholder="Enter the latitude">
            <small id="websiteHelp" class="form-text text-muted">Input the latitude of a location as in Google Maps coordinates. Hint: it's a float number</small>
        </div>
         <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="lng" class="form-control" id="longitude" aria-describedby="longitudeHelp" placeholder="Enter the longitude">
            <small id="websiteHelp" class="form-text text-muted">Input the longitude of a location as in Google Maps coordinates. Hint: it's a float number</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
    <img class="img-fluid" src="resources/img/map.png">
</div>
</div>

<?php include 'footer.php' ?>