<?php
session_start();
if  (isset($_GET['logout'])) {
 unset($_SESSION['user']);
 unset($_SESSION['admin']);
 session_unset();
 session_destroy();
 echo "logged out";
 header("Location: login.php");
 exit;
}
?>