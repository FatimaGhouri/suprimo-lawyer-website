<?php
require_once "config.php";
@session_start();
if (isset($_SESSION["id"]) && @$_SESSION["userType"] === "lawyer") {
    $lawyerId = $_SESSION["id"];
    $lawyerSql = "SELECT * FROM lawyers WHERE id = '$lawyerId'";
    $lawyerResult = mysqli_query($conn, $lawyerSql);
    if (mysqli_num_rows($lawyerResult) > 0) {
        $loginLawyer = mysqli_fetch_assoc($lawyerResult);
        $loginLawyerName = $loginLawyer['fullname'];
        $loginLawyerImage = $loginLawyer['image'];
    }
}
 
if (isset($fileName)) {
    function activeNav($path)
    {
        global $fileName;
        if ($path == $fileName) {
            return 'active';
        }
        return '';
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- contact.html  9 JAN 2024 12:09:35 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Suprimo </title>

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap-->
    <link rel="stylesheet" href="stylesheet/bootstrap.css">

    <!-- Template Style-->
    <link rel="stylesheet" href="stylesheet/all.css">
    <link rel="stylesheet" href="stylesheet/animate.css">
    <link rel="stylesheet" href="stylesheet/style.css">
    <link rel="stylesheet" href="stylesheet/shortcodes.css">
    <link rel="stylesheet" href="stylesheet/responsive.css">
    <link rel="stylesheet" href="stylesheet/flexslider.css">
    <link rel="stylesheet" href="rev-slider/css/layers.css">
    <link rel="stylesheet" href="rev-slider/css/navigation.css">
    <link rel="stylesheet" href="rev-slider/css/settings.css">

    <link href="icon/favicon.ico" rel="shortcut icon">
</head>

<body>
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <ul class="flat-information d-lg-flex align-items-center">
                        <li class="email">Suprimo@law.com</li>
                        <li class="address">123 Main Street, Karachi, Pakistan</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="flat-contact-us d-lg-flex align-items-center">
                        <a href="contact.php" class="phone">123.456.7890</a>
                        <a href="contact.php" class="cosulting hvr-vertical">FREE COSULTING
                            <div class="border-animate">
                                <div class="top"></div>
                                <div class="right"></div>
                                <div class="bottomb"></div>
                                <div class="left"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- top-bar -->
    <header id="header" class="header bg-color">
        <div class="container">
            <div class="flex-header">
                <div id="logo" class="logo">
                    <a href="index.html" title="Logo"><img src="images/logo/logo.png" data-width="211" data-height="34" alt="images"></a>
                </div>
                <div class="content-menu">
                    <div class="nav-wrap">
                        <div class="btn-menu"><span></span></div>
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li>
                                    <a href="/" class="<?= activeNav('index.php') ?>">Home</a>
                                </li>
                                <li>
                                    <a href="about" class="<?= activeNav('about.php') ?>">About</a>
                                </li>
                                <li>
                                    <a href="practice-area" class="<?= activeNav('practice-area.php') ?>">Practice Areas</a>
                                </li>
                                <li>
                                    <a href="attorneys" class="<?= activeNav('attorneys.php') ?>">Attorneys</a>
                                </li>
                                <li>
                                    <a href="blog" class="<?= activeNav('blog.php') ?>">blog</a>
                                </li>
                                <li>
                                    <a href="contact" class="<?= activeNav('contact.php') ?>">Contact</a>
                                </li>

                                <?php
                                if (!isset($_SESSION['login'])) {

                                    echo '
                                    <li class="navBtns ">
                                        <button class="navBtn-1 fl-btn hvr-vertical"><a href="signup">Join</a></button>
                                        <button class="navBtn-2 fl-btn hvr-vertical"><a href="login">LogIn</a></button>
                                    </li>';
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['login']) && $_SESSION["login"] === true) {
                                    if (isset($_SESSION['userType']) && $_SESSION['userType'] === "lawyer") {
                                        echo ' <li class="user-profile-pic">
        <a href="User-panel/lawyerPanel.php">
            <img src="../admin-dashboard/template/images/uploads/' . $loginLawyerImage . '" alt="" class="loginProfileImg">
            My Profile
        </a>
    </li>';
                                    }
                                    if (isset($_SESSION['userType']) && $_SESSION['userType'] === "customer") {
                                        echo ' <li class="user-profile-pic">
        <a href="User-panel/clientPanel.php">
            <img src="../admin-dashboard/template/images/uploads/male_dummy.png" alt="" class="loginProfileImg">
            My Profile
        </a>
    </li>';
                                    }
                                }
                                ?>

                                <?php
                                echo '
</ul>
</nav>
</div>
</div>
</div>
</div>
</header>
';
                                ?>