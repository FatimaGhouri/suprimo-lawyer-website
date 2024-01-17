<?php
require_once "config.php";
$attorneysSql = "SELECT * FROM lawyers";
$attorneyResult = mysqli_query($conn, $attorneysSql);
if(isset($_POST['appSubmit'])){
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];
    $attorneyId = $_POST['AttorneyId'];
    $appDateTime = $_POST['appDateTime'];

    $searchCustSql = "SELECT * FROM customers WHERE email = '$customerEmail'";
    $searchCustResult = mysqli_query($conn, $searchCustSql);

    if(mysqli_num_rows($searchCustResult)>0){
        $custrecord = mysqli_fetch_assoc($searchCustResult);
        $customerId = $custrecord['id'];

        $insertSql = "INSERT INTO appointments(customers_id, Lawyers_id, appDateTime) VALUES ('$customerId', '$attorneyId', '$appDateTime')";

        $insertResult = mysqli_query($conn, $insertSql);

        if($insertResult){
            echo "slot booked successfully";
        }else{
            echo "got some issue in bookin a slot";
        }
    }else{
        echo "no such customer found";
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<!-- attorneys-single.php  22 Nov 2019 12:06:34 GMT -->

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
    <style>
   

   .attorney-app-container{
    padding: 60px 20px;
   }

    .appointment-form {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .image-container {
        padding: 20px;
    }

    .attorney-app-container .image-container img{
        width: 80%;
    }

    .appointment-form .lawyerSelection option{
        margin-bottom:10px;
    }

    .book-slot-btn {
        background-color: #cca776;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    /* Add more styling as needed */
    </style>
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
                        <a href="#" class="phone">123.456.7890</a>
                        <a href="#" class="cosulting hvr-vertical">FREE COSULTING
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
                    <a href="index-2.php" title="Logo"><img src="images/logo/01.png" data-width="211" data-height="34"
                            alt="images" data-retina="images/logo/01@2x.png"></a>
                </div>
                <div class="content-menu">
                    <div class="nav-wrap">
                        <div class="btn-menu"><span></span></div>
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li>
                                    <a href="index-2.php">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index-2.php">Home 1</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                    <ul class="sub-menu">
                                        <li><a href="about.php">About</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Practice Area</a>
                                    <ul class="sub-menu">
                                        <li><a href="practice-area.php">Practice area</a></li>
                                        <li><a href="practice-single.php">Practice single</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="active">Attorneys</a>
                                    <ul class="sub-menu">
                                        <li><a href="attorneys.php">Attorneys</a></li>
                                        <li><a href="attorneys-single.php" class="active">Attorneys single</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Cases</a>
                                    <ul class="sub-menu">
                                        <li><a href="case-results.php">Case results</a></li>
                                        <li><a href="case-details.php">Case details</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">News</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.php">Blog</a></li>
                                        <li><a href="blog-single.php">Blog single</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                    <ul class="sub-menu">
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="flat-show-search">
                        <div class="show-search">
                            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="top-search">
                            <div>
                                <form action="#" id="searchform-all" method="get">
                                    <input type="text" id="s" class="ss" placeholder="Search...">
                                    <button class="search-submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- header -->
    <div class="attorney-app-container">
        <div class="container">
            <div class="row">
        
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form id="appointmentForm" class="appointment-form" method="post">
                        <div class="form-group">
                            <label for="customerName">Customer Name:</label>
                            <input type="text" id="customerName" name="customerName" required>
                        </div>
                        <div class="form-group">
                            <label for="customerEmail">Customer Email:</label>
                            <input type="email" id="customerEmail" name="customerEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="AttorneyName">Attorney Name:</label>
                            <select id="AttorneyName" class="lawyerSelection" name="AttorneyId" required>
                                <option selected disabled>--Select a Lawyer--</option>
                               <?php
                               if(mysqli_num_rows($attorneyResult)){
                                while($rows = mysqli_fetch_assoc($attorneyResult)){
                                    $attorneyId = $rows['id'];
                                    $attorneyName = $rows['fullname'];
                                    $attorneyService = $rows['services'];
                                    ?>
                                    <option value="<?php echo $attorneyId; ?>"><?php echo $attorneyName.'-'. $attorneyService;?></option>
                                    <?php
                                }
                               }
                               ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="appointmentDateTime">Appointment Date and Time:</label>
                            <input type="datetime-local" id="appointmentDateTime" name="appDateTime" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="book-slot-btn" name="appSubmit" value="Book a Slot">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="image-container">
                        <img src="images/attorneys/attorney-app-img-sm.jpg" alt="Lawyer Image">
                    </div>
                </div>
               

                    
                </div>

           
        </div>
    </div>
    <footer id="footer" class="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget widget-contact mg-footer-mbb">
                                <h2 class="widget-title">Contact</h2>
                                <div class="content">
                                    <ul>
                                        <li><span class="text address">20, Bardeshi, Amin Bazar Savar, Dhaka -
                                                1348</span></li>
                                        <li><span class="text phone">123.456.7890</span></li>
                                        <li><span class="text email">hello@finelaw.com</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget widget-services mg-footer-mbb">
                                <h2 class="widget-title">About</h2>
                                <div class="content">
                                    <ul class="widget-menu">
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Our Team</a></li>
                                        <li><a href="#">Career</a></li>
                                        <li><a href="#">Practice Area</a></li>
                                        <li><a href="#">Help Guide</a></li>
                                        <li><a href="#">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget widget-services mg-footer-mbs">
                                <h2 class="widget-title">Help Desk</h2>
                                <div class="content">
                                    <ul class="widget-menu">
                                        <li><a href="#">Customer Care</a></li>
                                        <li><a href="#">Legal Help</a></li>
                                        <li><a href="#">Service</a></li>
                                        <li><a href="#">Donation</a></li>
                                        <li><a href="#">Child Care</a></li>
                                        <li><a href="#">Presonal Care</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget widget-newsletter">
                                <h2 class="widget-title">Newsletter</h2>
                                <div class="content">
                                    <p>Polore eu fugiat nulla pariatur Excepteur sint occaecat cupidat at non tomake
                                        bole</p>
                                    <form action="#" class="form-email-footer">
                                        <input type="text" class="your-email" placeholder="Your email">
                                        <button class="btn-email">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="widget widget-text mg-footer-mbb">
                                <div class="content">
                                    <div class="images-logo">
                                        <img src="images/footer/07.png" alt="images">
                                    </div>
                                    <p>
                                        Naboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proiden
                                    </p>
                                    <div class="list-socials">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-5">
                            <div class="widget widget-gallery mg-footer-mbs clearfix">
                                <h2 class="widget-title">Gallery</h2>
                                <div class="content">
                                    <div class="images-gallery hv-gallery-icon">
                                        <div class="overlay-gallery">
                                            <div class="item-link">
                                                <a href="#" class="popup-gallery"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <img src="images/footer/01.png" alt="images">
                                    </div>
                                    <div class="images-gallery hv-gallery-icon">
                                        <div class="overlay-gallery">
                                            <div class="item-link">
                                                <a href="#" class="popup-gallery"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <img src="images/footer/02.png" alt="images">
                                    </div>
                                    <div class="images-gallery hv-gallery-icon">
                                        <div class="overlay-gallery">
                                            <div class="item-link">
                                                <a href="#" class="popup-gallery"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <img src="images/footer/03.png" alt="images">
                                    </div>
                                    <div class="images-gallery hv-gallery-icon">
                                        <div class="overlay-gallery">
                                            <div class="item-link">
                                                <a href="#" class="popup-gallery"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <img src="images/footer/04.png" alt="images">
                                    </div>
                                    <div class="images-gallery hv-gallery-icon">
                                        <div class="overlay-gallery">
                                            <div class="item-link">
                                                <a href="#" class="popup-gallery"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <img src="images/footer/05.png" alt="images">
                                    </div>
                                    <div class="images-gallery hv-gallery-icon">
                                        <div class="overlay-gallery">
                                            <div class="item-link">
                                                <a href="#" class="popup-gallery"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <img src="images/footer/06.png" alt="images">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-7 col-sm-7">
                            <div class="widget widget-twitter">
                                <h2 class="widget-title">Recent Tweets</h2>
                                <div class="content">
                                    <div class="tw-wrap">
                                        <div class="text-link">
                                            Lco lodoami tomader lok amitomader vai amar ar kisu naikeho <a
                                                href="#">http://bit.ly/7asF34</a>
                                        </div>
                                        <div class="text-time"><a href="#">@Fine Law</a> - 2 hours ago</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="container">
                    <div class="bottom-wrap">
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="copyright">
                                    <a href="templateshub.net">Templateshub</a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="menu-footer">
                                    <ul>
                                        <li><a href="#">Terms & Condition</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Legal</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a id="scroll-top" class="show"></a>
    </footer><!-- footer -->

    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/plugins.js"></script>
    <script src="javascript/jquery-ui.js"></script>
    <script src="javascript/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo_pcAdFNbTDCAvMwAD19oRTuEmb9M50c"></script>
    <script src="javascript/jquery-isotope.js"></script>
    <script src="javascript/equalize.min.js"></script>
    <script src="javascript/jquery-countTo.js"></script>
    <script src="javascript/flex-slider.min.js"></script>
    <script src="javascript/main.js"></script>

    <!-- slider -->
    <script src="rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="rev-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="javascript/rev-slider.js"></script>

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.actions.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.carousel.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.kenburn.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.layeranimation.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.migration.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.navigation.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.parallax.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.slideanims.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.video.min.js"></script>
</body>

<!-- attorneys-single.php  22 Nov 2019 12:06:35 GMT -->

</html>