<?php
echo '
<!DOCTYPE html>
<html lang="zxx">

<!-- contact.html  9 JAN 2024 12:09:35 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Suprimo</title>

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
                        <li class="email"><a href="#" title="Email">hello@finelaw.com</a></li>
                        <li class="address"><a href="#" title="Address">20 Bardeshi, Amin Bazar, Dhaka</a></li>
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
                    <a href="index.html" title="Logo"><img src="images/logo/logo.png" data-width="211" data-height="34"
                            alt="images" ></a>
                </div>
                <div class="content-menu">
                    <div class="nav-wrap">
                        <div class="btn-menu"><span></span></div>
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li>
                                    <a href="index.php" class="active">Home</a>
                                </li>
                                <li>
                                    <a href="about.php">About</a>
                                </li>
                                <li>
                                    <a href="practice-area.php">Practice Area</a>
                                </li>
                                <li>
                                    <a href="attorneys.php">Attorneys</a>
                                </li>
                                <li>
                                    <a href="blog.php">News</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>'; ?>

<?php
                                if(!isset($_SESSION['login'])){
                                  
                                    echo'
                                    <li class="navBtns ">
                                        <button class="navBtn-1 fl-btn hvr-vertical"><a href="registrationForm.php">Join</a></button>
                                        <button class="navBtn-2 fl-btn hvr-vertical"><a href="loginForm.php">LogIn</a></button>
                                    </li>';
                                    
                               
                                }
                                ?>
<?php
                                if(isset($_SESSION['login']) && $_SESSION["login"]===true){   
                                  echo ' <li class="user-profile-pic">
                                    <a href="User-panel/userpanelMain.php">
                                        <img src="images/male_dummy.png" alt="">
                                        My Profile
                                    </a>                                    
                                </li>';   
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