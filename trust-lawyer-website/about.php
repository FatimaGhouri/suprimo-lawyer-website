<?php
require_once "partials/header.php";
 require_once "config.php";
 $lawyerSql = "SELECT * FROM lawyers LIMIT 6";
 $result = mysqli_query($conn, $lawyerSql);

?>
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content">
                    <h2 class="title-banner">about us</h2>
                    <p> Our mission is to provide strategic, client-focused representation, ensuring your rights and
                        interests are safeguarded with the dedication and proficiency.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- page-title -->
<div class="about about-style1">
    <div class="container">
        <div class="text-content">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="heading">The very best and successful legal agency</div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <p class="description">
                        we pride ourselves as the epitome of excellence in the legal realm. Renowned for our unwavering
                        commitment to success, we bring unparalleled expertise and a proven track record to every case,
                        ensuring the highest standards of legal representation for our clients.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <p class="description">
                        we redefine success in the legal landscape. With a legacy of triumphs and a reputation for
                        excellence, we are the go-to legal agency for unparalleled expertise, strategic counsel, and
                        unwavering dedication to achieving optimal outcomes for our clients.
                    </p>
                </div>
            </div>
        </div>
        <div class="the-writer-info">
            <span class="signature"><img src="images/about/03.png" alt="images"
                    style="height:60px; margin-top:-10px;"></span>
            <span class="name">Zayn Malik</span>
            <span class="position">Founder & CEO</span>
        </div>
    </div>
</div><!-- about -->
<div class="facts">
    <div class="container">
        <div class="flat-counter">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <div class="content-counter">
                            <div class="numb-count-wrap">
                                <span class="numb-count" data-from="0" data-to="42" data-speed="2000"
                                    data-inviewport="yes">42</span>
                            </div>
                            <div class="name-count">Years of Experience</div>
                            <div class="icon-count"><img src="images/home1/09.png" alt="images"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <div class="content-counter">
                            <div class="numb-count-wrap">
                                <span class="numb-count" data-from="0" data-to="100" data-speed="2000"
                                    data-inviewport="yes">100</span>
                                <span class="numb-bs">+</span>
                            </div>
                            <div class="name-count">Total Attorney</div>
                            <div class="icon-count"><img src="images/home1/10.png" alt="images"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <div class="content-counter">
                            <div class="numb-count-wrap">
                                <span class="numb-count" data-from="0" data-to="2000" data-speed="2000"
                                    data-inviewport="yes">2000</span>
                                <span class="numb-bs">+</span>
                            </div>
                            <div class="name-count">Happy Clients</div>
                            <div class="icon-count"><img src="images/home1/11.png" alt="images"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <div class="content-counter">
                            <div class="numb-count-wrap">
                                <span class="numb-count" data-from="0" data-to="99" data-speed="2000"
                                    data-inviewport="yes">99</span>
                                <span class="numb-bs">%</span>
                            </div>
                            <div class="name-count">Success Rate</div>
                            <div class="icon-count"><img src="images/home1/12.png" alt="images"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- facts -->
<div class="history clearfix">
    <div class="container">
        <div class="title-section text-center">
            <h3 class="flat-title">Our History</h3>
            <p class="sub-title">Preserving History, Defending Justice, Ensuring Tomorrow's Rights</p>
        </div>
        <div class="text-center timelines">
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"></div>
                    <div class="timeline-panel">

                        <h4 class="timeline-date">December 23, 2010</h4>

                        <div class="timeline-content">
                            <div class="timeline-heading">Founded Successfully</div>
                            <p class="description">
                                Our legacy is built on expertise, dedication, and a relentless pursuit of justice.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge"></div>
                    <div class="timeline-panel">

                        <h4 class="timeline-date">January 20, 2011</h4>

                        <div class="timeline-content">
                            <div class="timeline-heading">First Case Won</div>
                            <p class="description">
                                The cornerstone of our legal journey, igniting a legacy of client victories that
                                resonate through every case we handle at.
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge danger"></div>
                    <div class="timeline-panel">

                        <h4 class="timeline-date">Febuary 10, 2011</h4>

                        <div class="timeline-content">
                            <div class="timeline-heading">Added New People</div>
                            <p class="description">
                                Welcoming new talent to enhance our legal prowess and better serve our clients
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted danger">
                    <div class="timeline-badge danger"></div>
                    <div class="timeline-panel">

                        <h4 class="timeline-date">April 23, 2011</h4>

                        <div class="timeline-content">
                            <div class="timeline-heading">Started New Office</div>
                            <p class="description">
                                : Launching a new office to bring our legal expertise closer to you and amplify our
                                commitment to exceptional client service
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted danger">
                    <div class="timeline-pointer-more"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                </li>
            </ul>
        </div>
    </div>
</div><!-- history -->

<section class="featured featured-style3">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="content">
                    <div class="caption">Our Features</div>
                    <h4 class="heading">Reason to choose us over others in market</h4>
                    <p class="description">
                        Suprimo stands out with distinctive features, offering unparalleled reliability, innovation, and
                        client-centric solutions, making us the premier choice in the market. Our commitment to
                        excellence, personalized approach, and proven track record make us the standout choice, ensuring
                        you receive unparalleled service and optimal results for your legal needs.
                    </p>
                    <!-- <div class="view-all"><a href="#">view all</a></div> -->
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="iconbox-features type3">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="iconbox">
                                <div class="iconbox-icon">
                                    <img src="images/practice/11.png" alt="images">
                                </div>
                                <div class="iconbox-content">
                                    <h5 class="title"><a href="#">Best Legal Security</a></h5>
                                    <p class="description">
                                        We prioritize your legal security with unwavering commitment.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="iconbox">
                                <div class="iconbox-icon">
                                    <img src="images/practice/12.png" alt="images">
                                </div>
                                <div class="iconbox-content">
                                    <h5 class="title"><a href="#">Top Skilled Attorney</a></h5>
                                    <p class="description">
                                        Elite legal prowess, ensuring success in every client's journey.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="iconbox">
                                <div class="iconbox-icon">
                                    <img src="images/practice/13.png" alt="images">
                                </div>
                                <div class="iconbox-content">
                                    <h5 class="title"><a href="#">All Time Support </a></h5>
                                    <p class="description">
                                        Uninterrupted legal guidance, day or night, at your service.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="iconbox">
                                <div class="iconbox-icon">
                                    <img src="images/practice/14.png" alt="images">
                                </div>
                                <div class="iconbox-content">
                                    <h5 class="title"><a href="#">Resonable Pricing</a></h5>
                                    <p class="description">
                                        Fair rates, quality service – affordability without compromising excellence.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- featured -->
<section class="partners">
    <div class="container">
        <div class="title-section text-center">
            <h3 class="flat-title">Our Partners</h3>
            <p class="sub-title">Partnerships amplify our legal prowess and success</p>
        </div>
        <table class="partners-table">
            <tbody>
                <tr>
                    <td><img src="images/home1/26.png" alt="images"></td>
                    <td><img src="images/home1/27.png" alt="images"></td>
                    <td><img src="images/home1/28.png" alt="images"></td>
                    <td><img src="images/home1/29.png" alt="images"></td>
                    <td><img src="images/home1/30.png" alt="images"></td>
                    <td><img src="images/home1/31.png" alt="images"></td>
                </tr>
                <tr>
                    <td><img src="images/home1/32.png" alt="images"></td>
                    <td><img src="images/home1/33.png" alt="images"></td>
                    <td><img src="images/home1/34.png" alt="images"></td>
                    <td><img src="images/home1/35.png" alt="images"></td>
                    <td><img src="images/home1/36.png" alt="images"></td>
                    <td><img src="images/home1/37.png" alt="images"></td>
                </tr>
            </tbody>
        </table>
    </div>
</section><!-- partners -->


<?php
require_once "partials/footer.php";
?>
<!--footer -->