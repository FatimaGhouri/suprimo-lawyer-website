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
                        <h2 class="title-banner">practice area</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing<br> elit sed do eius mod tempor incididunt</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="breadcrumb">
                        <li><a href="#" class="active">Home</a></li>
                        <li><a href="#">Practice Area</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- page-title -->
    <div class="practice-area practice-area-style1">
        <div class="container">
            <div class="title-section text-center">
                <h3 class="flat-title">Practice Area</h3>
                <p class="sub-title">Dolore magna aliqu onoet enim ad minim veniam</p>
            </div>
            <div class="practice-area-wrap">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="image-box-law">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <a href="#"><img src="images/practice/03.png" alt="images"></a>
                                </div>
                                <div class="icon">
                                    <img src="images/practice/15.png" alt="images">
                                </div>
                            </div>
                            <div class="content-law">
                                <h4 class="name">Family Law</h4>
                                <p class="description">Yens nessiecte dunt ut labore et dolore magna aliqu tonesl not enim</p>
                                <a href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="image-box-law">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <a href="#"><img src="images/practice/04.png" alt="images"></a>
                                </div>
                                <div class="icon">
                                    <img src="images/practice/16.png" alt="images">
                                </div>
                            </div>
                            <div class="content-law">
                                <h4 class="name">Business Law</h4>
                                <p class="description">Yens nessiecte dunt ut labore et dolore magna aliqu tonesl not enim</p>
                                <a href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="image-box-law">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <a href="#"><img src="images/practice/05.png" alt="images"></a>
                                </div>
                                <div class="icon">
                                    <img src="images/practice/17.png" alt="images">
                                </div>
                            </div>
                            <div class="content-law">
                                <h4 class="name">Finance Law</h4>
                                <p class="description">Yens nessiecte dunt ut labore et dolore magna aliqu tonesl not enim</p>
                                <a href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="image-box-law">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <a href="#"><img src="images/practice/06.png" alt="images"></a>
                                </div>
                                <div class="icon">
                                    <img src="images/practice/18.png" alt="images">
                                </div>
                            </div>
                            <div class="content-law">
                                <h4 class="name">Criminal Law</h4>
                                <p class="description">Yens nessiecte dunt ut labore et dolore magna aliqu tonesl not enim</p>
                                <a href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="image-box-law">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <a href="#"><img src="images/practice/07.png" alt="images"></a>
                                </div>
                                <div class="icon">
                                    <img src="images/practice/19.png" alt="images">
                                </div>
                            </div>
                            <div class="content-law">
                                <h4 class="name">Education Law</h4>
                                <p class="description">Yens nessiecte dunt ut labore et dolore magna aliqu tonesl not enim</p>
                                <a href="#">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="image-box-law">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <a href="#"><img src="images/practice/08.png" alt="images"></a>
                                </div>
                                <div class="icon">
                                    <img src="images/practice/20.png" alt="images">
                                </div>
                            </div>
                            <div class="content-law">
                                <h4 class="name">Immigration Law</h4>
                                <p class="description">Yens nessiecte dunt ut labore et dolore magna aliqu tonesl not enim</p>
                                <a href="#">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- practice-area -->
    <div class="case-evaluation">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="go-up">
                        <div class="themesflat-content-box" data-padding="0% 0% 0% 0%" data-sdesktoppadding="0% 0% 0% 0%" data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="100px 0% 0% 0%" data-smobipadding="100px 0% 0% 0%">
                            <form action="#" class="form-evaluation">
                                <div class="wrap-evaluation">
                                    <h5 class="title">Free Case Evaluation</h5>
                                    <div class="your-name mg-text">
                                        <input type="text" class="your-name" placeholder="Your name">
                                    </div>
                                    <div class="your-email mg-text">
                                        <input type="text" class="your-email" placeholder="Your email">
                                    </div>
                                    <div class="your-phone mg-text">
                                        <input type="text" class="your-phone" placeholder="Your phone no">
                                    </div>
                                    <div class="subject mg-text">
                                        <input type="text" class="subject" placeholder="Subject">
                                    </div>
                                    <div class="message-wrap mg-text">
                                        <textarea name="message" id="message" rows="8" placeholder="Your message"></textarea>
                                    </div>
                                    <div class="fl-btn">
                                        <button class="hvr-vertical">Request call back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="content-evaluation">
                        <div class="themesflat-content-box" data-padding="113px 0% 101px 100px" data-sdesktoppadding="113px 0% 101px 0" data-ssdesktoppadding="113px 0% 101px 0" data-mobipadding="50px 0 100px 0" data-smobipadding="50px 0 100px 0">
                            <div class="caption">Get quick response</div>
                            <h4 class="heading">Get a quick response and legal advice  from expert</h4>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consecte dunt ut labore et dot enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            </p>
                            <div class="flat-spacer" data-desktop="90" data-sdesktop="60" data-mobi="25" data-smobi="25"></div>
                            <div class="call-us">
                                <div class="text">
                                    Or Call us 
                                </div>
                                <h3 class="phone-number">
                                    123.456.7890 <span class="toll-free">(toll free)</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- case-evaluation -->
    <div class="attorneys attorneys-style3">
    <div class="container">
        <div class="title-section text-center">
            <h3 class="flat-title">Our Attorney</h3>
            <p class="sub-title">Dedicated attorneys, shaping futures through legal expertise</p>
        </div>
        <div class="row">
            <?php
                if(mysqli_num_rows($result)>0){
                    while($rows = mysqli_fetch_assoc($result)){
                        ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="attorneys-info attorneys-hv-link mg-60 custom-align custom-start">
                    
                    <div class="attorneys-avatar hv-link-content">
                        <div class="image">
                            <img src="../admin-dashboard/template/images/uploads/<?php echo $rows['image'];?>" alt="images">
                        </div>
                        <div class="overlay-box">
                            <div class="content">
                                <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="attorneys-content">
                        <div class="content-wrap">
                            <h3 class="name"><a href="#"><?php echo ucwords($rows['fullname']);?></a></h3>
                            <p class="position"><?php echo $rows['services'];?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                ?>
        </div>
        <div class="view-all"><a href="attorneys.php">view all</a></div>
    </div>
</div><!-- attorneys -->
   
    <?php
require_once "partials/footer.php";
?>
<!--footer -->