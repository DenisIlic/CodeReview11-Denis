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

// get restaurant id
if($_GET['id']) {
   $t_id = $_GET['id'];
   $sql = "SELECT * FROM things_to_do WHERE t_id = {$t_id}";
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   include 'head.php';
   //access denied for user
if( !isset($_SESSION['admin'])) {
header("Location: index.php");
}
?>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-1 mt-5 text-center amatic">Admin Panel</h1>
    </div>
</div>
<!-- form to update -->
<div class="row m-0 py-5 px-4">
<div class="col-lg-6 col-md-6 col-sm-12 pt-5">
    <form action="actions/update_thing.php" method="POST">
        <div class="form-group">
            <label for="name">Spot Name</label>
            <input type="text" name="t_name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" value="<?php echo $data['t_name']?>" >
            <small id="nameHelp" class="form-text text-muted">Input the name of the spot</small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="t_descr" id="description" rows="3"><?php echo $data['t_descr']?></textarea>
        </div>
        <div class="form-group">
          <label for="type">Spot Type</label>
          <input type="text" name="t_type" class="form-control" id="type" aria-describedby="typeHelp" placeholder="Enter type" value="<?php echo $data['t_type']?>" >
          <small id="typeHelp" class="form-text text-muted">Input the type of sightseeing spot</small>
        </div>
        <div class="form-group">
            <label for="location">Select Location</label>
            <select name="fk_loc" class="form-control" id="location">
            <?php getLocations(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" name="t_web" class="form-control" id="website" aria-describedby="websiteHelp" placeholder="Enter the website link" value="<?php echo $data['t_web']?>">
            <small id="websiteHelp" class="form-text text-muted">Input the link to the website</small>
        </div>
        <input type = "hidden" name="t_id" value="<?php echo $data['t_id']?>" />
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
    <img class="img-fluid" src="resources/img/venus.png">
</div>
</div>

<?php include 'footer.php' ?>
<?php 
}
?>
