<?php require_once 'actions/db_connect.php'; 

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
<div class="jumbotron jumbotron-fluid d-flex align-items-center">
    <div class="container">
        <h1 class="display-4 text-center amatic">Admin Panel</h1>
    </div>
</div>
<div class="col-12 p-4 d-flex justify-content-center flex-column align-items-center">
        <img class="img-fluid" src="resources/img/delete.png">
        <form action="actions/delete_thing.php" method="POST">
            <h3 class="text-darkerblue py-2">Do you really want to delete this place?</h3>           
            <input type = "hidden" name="t_id" value= "<?php echo $data['t_id']?>" />
            <button type="submit" class="btn btn-primary btn-lg btn-block my-4">Yes</button>
            <a class="text-decoration-none" href="index.php"><button type="button" class="btn btn-primary btn-lg btn-block">No</button></a>
        </form>
</div>
<?php include 'footer.php'?>
<?php 
}
?>