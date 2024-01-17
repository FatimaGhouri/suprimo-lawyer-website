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
    
    h2 {
            color: #cca776;
            text-align: center;
            margin-bottom: 42px;
            margin-top: 40px;
            font-size: 35px;
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
                        <li class="email"><a href="#" title="Email">Suprimo@law.com</a></li>
                        <li class="address"><a href="#" title="Address">123 Main Street, Karachi, Pakistan</a></li>
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
                    <a href="index-2.php" title="Logo"><img src="images/logo/logo.png" data-width="211" data-height="34"
                            alt="images" data-retina="images/logo/01@2x.png"></a>
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
                                <!-- <li>
                                    <a href="#">Cases</a>
                                    <ul class="sub-menu">
                                        <li><a href="case-results.php">Case results</a></li>
                                        <li><a href="case-details.php">Case details</a></li>
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="blog.php">News</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact</a>
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
                        <h2>Book your appointment here!</h2>
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
    <?php
          require_once "partials/footer.php";
    ?>

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