<?php include 'head.php'; ?>
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid d-flex align-items-center">
        <div class="container">
            <h1 class="display-4 text-center amatic">Travel Blog</h1>
        </div>
    </div>
    <!-- admin session -->
    <?php if(isset($_SESSION["admin"])) {?>

    <!-- content -->
    <div class="title d-flex justify-content-center py-5">
        <h2 class="display-6 just"><span>Create</span></h2>
    </div>
    <div class="row d-flex justify-content-center">
        <a href="insert_location.php"><button class="btn btn-primary">Create a location</button></a>
        <a href="insert_place.php"><button class="btn btn-primary mx-4">Create a spot</button></a>
        <a href="insert_eatery.php"><button class="btn btn-primary">Create a restaurant</button></a>
       <a href="insert_concert.php"> <button class="btn btn-primary ml-4">Create an event</button></a>
    </div>
    <!-- search -->
 <div class="row mt-5 py-4 px-4 d-flex justify-content-center">
    <form class="form-inline">  
        <i class="fa fa-search-plus text-dark" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
            aria-label="Search" id="search" name="name">
    </form>
</div>
    <div class="title d-flex justify-content-center py-5">
        <h2 class="display-6 just"><span>Restaurant</span></h2>
    </div>
    <div id="restaurants" class="row">
        <?php 
        $sql_restaurants = "SELECT * FROM restaurants JOIN locations ON restaurants.fk_loc = locations.loc_id";
        $result = $connect->query($sql_restaurants);
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
            } else {
             echo '<div class="col-12">
             <p class="darkpink-text">No data available</p>
             </div>';
           }           
        ?>
    </div>
<?php } ?>
<!-- user session -->
        <?php if(isset($_SESSION["user"])) {?>
    <!-- content -->
    <div class="title d-flex justify-content-center py-5">
        <h2 class="display-6 just"><span>Restaurant</span></h2>
    </div>
    <div id="restaurants" class="row">
        <?php 
        $sql_restaurants = "SELECT * FROM restaurants JOIN locations ON restaurants.fk_loc = locations.loc_id";
        $result = $connect->query($sql_restaurants);
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
            } else {
             echo '<div class="col-12">
             <p class="darkpink-text">No data available</p>
             </div>';
           }           
        ?>
    </div>

<?php } ?>
</div>
<?php include 'footer.php'; ?>
