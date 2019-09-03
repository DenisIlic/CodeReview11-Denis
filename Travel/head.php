<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- bootstrap overrides -->
    <link href="resources/css/style.css" rel="stylesheet" type="text/css">
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
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #483D8B">
            <div class="d-lg-flex d-block flex-row mx-lg-auto mx-0">
                <a class="navbar-brand text-dark justNav" href="index.php"><small style="color: black">Travel Blog</small></a>
                <button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="d-lg-none navbar-toggler-icon fa fa-angle-double-down"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="index.php"><small style="color: black">Home <span class="sr-only">(current)</span></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="eateries.php"><small style="color: black">Restaurant</small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="events.php"><small style="color: black">Events</small></a>
                        </li>
                        <li><a class="navbar-brand text-dark ml-lg-4" href="maps.html"><small><i class="fa  fa-map-marker"></small style="color: black"></i></a>
                         
                    </ul>
                </div>
            </div>
        </nav>
<?php include 'home.php'; ?>