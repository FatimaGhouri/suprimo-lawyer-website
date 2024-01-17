<?php
session_start();
require_once "../config.php";
// require_once "includes/headlinks.php";
// require_once "includes/header.php";
if(isset($_SESSION['userType']) && $_SESSION['userType'] === "customer"){
  if(isset($_SESSION['id'])){
    $custId = $_SESSION['id'];
    $userType = $_SESSION['userType'];
    $findCust = "SELECT * FROM customers WHERE id = '$custId'";
    $custResult = mysqli_query($conn, $findCust);
    if(mysqli_num_rows($custResult)>0){
      $custRow = mysqli_fetch_assoc($custResult);
      $custName = $custRow['custName'];
      $custEmail = $custRow['email'];
      $custPassword = $custRow['password'];
      $custContact = $custRow['contact'];
    }
  }
}

if(isset($_SESSION['userType']) && $_SESSION['userType'] === "lawyer"){
  if(isset($_SESSION['id'])){
    $lawyerId = $_SESSION['id'];
    $userType = $_SESSION['userType'];
    $findLawyer = "SELECT * FROM lawyers WHERE id = '$lawyerId'";
    $lawyerResult = mysqli_query($conn, $findLawyer);
    if(mysqli_num_rows($lawyerResult)>0){
      $lawyerRow = mysqli_fetch_assoc($lawyerResult);
      $lawyerName = $lawyerRow['fullname'];
      $lawyerEmail = $lawyerRow['email'];
      $lawyerPassword = $lawyerRow['password'];
      $lawyerContact = $lawyerRow['contact'];
      $lawyerLocation = $lawyerRow['location'];
      $lawyerService = $lawyerRow['services'];
      $lawyerImage = $lawyerRow['image'];
      $lawyerDesp = $lawyerRow['description'];

    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Suprimo | User Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
* Template Name: NiceAdmin
* Updated: Nov 17 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="../index.php" class="logo d-flex align-items-center">
                <img src="assets/images/logo.png" alt="" />
            </a>
        </div>
        <!-- End Logo -->
        <nav class="header-nav-items">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="../index.php" class="active">Home</a>
                </li>
                <li>
                    <a href="../about.php">About</a>
                </li>
                <li>
                    <a href="../practice-area.php">Practice Area</a>
                </li>
                <li>
                    <a href="../attorneys.php">Attorneys</a>
                </li>
                <li>
                    <a href="../blog.php">News</a>
                </li>
                <li>
                    <a href="../contact.php">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- Clients Panel -->
        <?php
        if($userType === "customer"){
            include_once("clientPanel.php");
        }
        ?>

    <!-- Clients Panel End -->
    <!-- Lawyers Panel Start -->
    <?php
    if($userType === "lawyer"){
        include_once ("lawyerPanel.php");
    }
    ?>
    <!-- Lawyers Panel End -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>

<?php

?>