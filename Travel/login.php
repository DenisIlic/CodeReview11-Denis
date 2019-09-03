<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

if ( isset($_SESSION['user' ])!="" ) {
header("Location: index.php");
exit;
}elseif(isset($_SESSION['admin' ])!=""){
 header("Location: index.php");
exit;
}

//empty fields for errors and vars

$emailError = "";
$passError="";
$email ="";
$pass ="";

$error = false;
if( isset($_POST['btn-login']) ) {

// sanitize function, cleans the input
function sanitize($input){
$output = $_POST[$input];
$output = trim($output);
$output = strip_tags($output);
$output = htmlspecialchars($output);
return $output;
}

$email = sanitize('email');
$pass = sanitize('pass');

if(empty($email)){
$error = true;
$emailError = "Please enter your email address.";
} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
$error = true;
$emailError = "Please enter valid email address.";
}
if (empty($pass)){
$error = true;
$passError = "Please enter your password." ;
}

if (!$error) {
//hash pass into password
$password = hash( 'sha256', $pass);
$res=mysqli_query($connect, "SELECT user_id, first_name, last_name, pw, role  FROM users WHERE email='$email'" );
$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
$count = mysqli_num_rows($res); 

if( $count == 1 && $row['pw' ]==$password ) {
  if($row['role']=='admin'){
    $_SESSION['admin'] = $row['user_id'];
    header("Location: index.php");
  } else {
    $_SESSION['user'] = $row['user_id'];
 header( "Location: index.php");
  }
 
} else {
 $errMSG = "Incorrect Credentials, Try again..." ;
}

}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- bootstrap overrides -->
    <link href="resources/css/style.css" rel="stylesheet" type="text/css" media="all">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Just+Another+Hand&display=swap" rel="stylesheet">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg pink sticky-top">
            <div class="d-lg-flex d-block flex-row mx-lg-auto mx-0">
                <a class="navbar-brand text-dark justNav" href="index.php"><small>Travel Blog</small></a>
                <button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="d-lg-none navbar-toggler-icon fa fa-angle-double-down"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="index.php"><small>Home <span class="sr-only">(current)</span></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="eateries.php"><small>Restauant</small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="events.php"><small>Events</small></a>
                        </li>
                        <li><a class="navbar-brand text-dark ml-lg-4" href="#"><small><i class="fa fa-instagram"></small></i></a>
                            <a class="navbar-brand text-dark" href="#"><small><i class="fa fa-pinterest"></small></i></a>
                            <a class="navbar-brand text-dark" href="#"><small><i class="fa fa-tumblr-square"></small></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid d-flex align-items-center">
            <div class="container">
                <h1 class="display-4 text-center amatic">Travel Blog</h1>
            </div>
        </div>
        <div class="title d-flex justify-content-center py-5">
            <h2 class="display-6 just"><span>Log In</span></h2>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <?php
          if ( isset($errMSG) ) {
            echo  $errMSG; ?>
            <?php
         }
        ?>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 pt-5">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                        <span class="text-danger">
                            <?php  echo $emailError; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                        <span class="text-danger">
                            <?php  echo $passError; ?></span>
                    </div>
                    <button class="btn btn-primary" type="submit" name="btn-login">Log In</button>
                    <hr>
                    <a class="darkpink-text text-decoration-none" href="register.php">No account? Register here!</a>
                </div>
            </div>
        </form>

<?php 
include 'footer.php';
ob_end_flush(); ?>

