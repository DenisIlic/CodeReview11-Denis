<?php
ob_start();
session_start();

if( isset($_SESSION['user'])!="" ){
 header("Location: index.php"); 
}
include_once 'actions/db_connect.php';

//empty fields for errors

$emailError = "";
$fnameError="";
$lnameError="";
$passError="";

$error = false;

if ( isset($_POST['btn-signup']) ) {

// sanitize function, cleans the input
function sanitize($input){
  $output = $_POST[$input];
  $output = trim($output);
  $output = strip_tags($output);
  $output = htmlspecialchars($output);
  return $output;
}

$firstname = sanitize('firstname');
$lastname = sanitize('lastname');
$email = sanitize('email');
$pass = sanitize('pass');

// names validations
if (empty($firstname)) {
  $error = true; 
  $fnameError = "Please enter your first name.";
} else if (strlen($firstname) < 3) {
  $error = true;
  $fnameError = "Name must have at least 3 characters.";
} else if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
  $error = true;
  $fnameError = "Name must contain alphabets and space.";
}
if (empty($lastname)) {
  $error = true;
  $lnameError = "Please enter your last name.";
} else if (strlen($lastname) < 3) {
  $error = true;
  $lnameError = "Name must have at least 3 characters.";
} else if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
  $error = true;
  $lnameError = "Name must contain alphabets and space.";
}

//basic email validation
if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
} else {
// checks whether the email exists or not
$query = "SELECT email FROM users WHERE email='$email'";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
}
}
// password validation
if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters.";
}

// hashing pass to password
$password = hash('sha256', $pass);

if( !$error ) {

$query = "INSERT INTO users(first_name, last_name, email, pw) VALUES('$firstname','$lastname','$email','$password')";
$res = mysqli_query($connect, $query); 

if ($res) {
  $errTyp = "success";
  $errMSG = "Successfully registered, you may login now";
  unset($firstname);
  unset($lastname);
  unset($email);
  unset($pass);
} else {
  $errTyp = "danger";
  $errMSG = "Something went wrong, try again later...";
}

}
}

//empty fields for vars
$email ="";
$firstname="";
$lastname="";
$pass ="";

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
                            <a class="nav-link text-dark" href="eateries.php"><small>Restaurant</small></a>
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
            <h2 class="display-6 just"><span>Register</span></h2>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12 pt-5">
                    <?php if ( isset($errMSG) ) {?>
                    <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $firstname ?>" />
                        <span class="text-danger"><?php echo $fnameError; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $lastname ?>" />
                        <span class="text-danger"><?php echo  $lnameError; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                        <span class="text-danger">
                            <?php echo $emailError; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                        <span class="text-danger"><?php echo $passError; ?></span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Register</button>
                    <hr />
                    <a class="darkpink-text text-decoration-none" href="login.php">Already have an account? Log in here!</a>
                </div>
            </div>
        </form>

<?php 
include 'footer.php';
ob_end_flush(); ?>