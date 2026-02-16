<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
require_once('connection/mysqlconnection.php');
$query1 = "SELECT * from basic_detail WHERE id='1'";
$result1 = mysqli_query($conn, $query1);
if (!$result1) {
    die("Query Failed: " . mysqli_error($conn));
}
$basic_data = mysqli_fetch_assoc($result1);

$query2 = "SELECT * from about_us WHERE id='1'";
$result2 = mysqli_query($conn, $query2);
if (!$result1) {
    die("Query Failed: " . mysqli_error($conn));
}
$aboutus_data = mysqli_fetch_assoc($result2);

$query3 = "SELECT * from tbl_services";
$result3 = mysqli_query($conn, $query3);
if (!$result3) {
    die("Query Failed: " . mysqli_error($conn));
}

$services_data = mysqli_fetch_all($result3, MYSQLI_ASSOC);


$query4 = "SELECT * from tbl_testimonials ORDER BY id DESC";
$result4 = mysqli_query($conn, $query4);
if (!$result4) {
    die("Query Failed: " . mysqli_error($conn));
}

$testimonial_data = mysqli_fetch_all($result4, MYSQLI_ASSOC);


$query5 = "SELECT * from tbl_education";
$result5 = mysqli_query($conn, $query5);
if (!$result5) {
    die("Query Failed: " . mysqli_error($conn));
}
$education_data = mysqli_fetch_all($result5, MYSQLI_ASSOC);


$query6 = "SELECT * from tbl_experiences";
$result6 = mysqli_query($conn, $query6);
if (!$result6) {
    die("Query Failed: " . mysqli_error($conn));
}

$experience_data = mysqli_fetch_all($result6, MYSQLI_ASSOC);


$query7 = "SELECT * from tbl_skills";
$result7 = mysqli_query($conn, $query7);
if (!$result6) {
    die("Query Failed: " . mysqli_error($conn));
}

$skills_data = mysqli_fetch_all($result7, MYSQLI_ASSOC);
// print_r($services_data);
// die;
?>
<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <title>Ritik Kumar | Personal Portfolio</title>
    <meta name="description" content="Personal portfolio website showcasing my web development projects, technical skills, professional experience, and blogs.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/myLogo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/myLogo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/myLogo.png">

    <!-- Web fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-custom.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/lity.min.css">
    <link rel="stylesheet" href="css/simplebar.min.css">
    <link rel="stylesheet" href="css/jquery.mb.YTPlayer.min.css">

    <!-- Main CSS-->
    <link rel="stylesheet" href="css/main.css">

    <!-- CSS Color scheme-->
    <link id="color-scheme" rel="stylesheet" href="css/colors/main-darkgreen.css">

    <!-- toastr cdn css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- removeIf(customizerDist)-->
    <!-- <link rel="stylesheet" href="customizer/main.css"> -->
    <!-- image cropper cdn css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
     <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="theme-dark">
    <!-- Preloader-->
    <div class="preloader">
        <div class="preloader-block">
            <div class="preloader-icon">
                <span class="loading-dot loading-dot-1"></span>
                <span class="loading-dot loading-dot-2"></span>
                <span class="loading-dot loading-dot-3"></span>
            </div>
        </div>
    </div>
    <div id="overlay-effect"></div>
    <!-- Navbar-->
    <nav class="navbar-expand-md navbar fixed-top" id="navbar">
        <a class="navbar-brand" data-scroll="" href="#">
            <!-- Navbar Logo-->
            <img class="img-fluid" src="img/favicons/myLogo.png" alt="Logo">
        </a>
        <span class="navbar-menu ml-auto" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" role="button">
            <span class="btn-line"></span>
        </span>
        <div class="collapse navbar-collapse order-1 order-lg-0" id="navbarSupportedContent">
            <!-- Navbar menu-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#resume">Resume</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>