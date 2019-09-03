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
   $conc_id = $_GET['id'];
   $sql = "SELECT * FROM concerts WHERE conc_id = {$conc_id}";
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   include 'head.php';
   //access denied for user
if( !isset($_SESSION['admin'])) {
header("Location: index.php");
}
?>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid admin d-flex align-items-center">
    <div class="container">
        <h1 class="display-1 mt-5 text-center amatic">Admin Panel</h1>
    </div>
</div>
<!-- form to update -->
<div class="row m-0 py-5 px-4">
<div class="col-lg-6 col-md-6 col-sm-12 pt-5">
    <form action="actions/update_event.php" method="POST">
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" name="conc_name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" value="<?php echo $data['conc_name']?>" >
            <small id="nameHelp" class="form-text text-muted">Input the name of the event</small>
        </div>
        <div class="form-group">
            <label for="venue">Venue</label>
            <input type="text" name="venue" class="form-control" id="venue" aria-describedby="nameHelp" placeholder="Enter name" value="<?php echo $data['venue']?>" >
            <small id="nameHelp" class="form-text text-muted">Input the name of the venue</small>
        </div>
        <div class="form-group">
            <label for="location">Select Location</label>
            <select name="fk_loc" class="form-control" id="location">
            <?php getLocations(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="text" name="conc_date" class="form-control" id="date" aria-describedby="dateHelp" placeholder="Enter date" value="<?php echo $data['conc_date']?>">
            <small id="dateHelp" class="form-text text-muted">Input the date of the event like so (YYYY-MM-DD)</small>
        </div>
        <div class="form-group">
            <label for="time">Event Time</label>
            <input type="text" name="conc_time" class="form-control" id="time" aria-describedby="timeHelp" placeholder="Enter time" value="<?php echo $data['conc_time']?>">
            <small id="timeHelp" class="form-text text-muted">Input the time of the event like so (HH-MM-SS)</small>
        </div>
        <div class="form-group">
            <label for="price">Event Price</label>
            <input type="text" name="conc_price" class="form-control" id="price" aria-describedby="nameHelp" placeholder="Enter price" value="<?php echo $data['conc_price']?>" >
            <small id="nameHelp" class="form-text text-muted">Input the ticket amount in Euro</small>
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" name="conc_web" class="form-control" id="website" aria-describedby="websiteHelp" placeholder="Enter the website link" value="<?php echo $data['conc_web']?>">
            <small id="websiteHelp" class="form-text text-muted">Input the link to the website</small>
        </div>

        <input type = "hidden" name="conc_id" value="<?php echo $data['conc_id']?>" />
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
    <img class="img-fluid" src="resources/img/concert.jpg">
</div>
</div>

<?php include 'footer.php' ?>
<?php 
}
?>