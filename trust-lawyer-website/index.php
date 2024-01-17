<?php
session_start();
require_once "partials/header.php";
require_once "config.php";
$firstLawyers = "SELECT * FROM lawyers LIMIT 2";
$secLawyers = "SELECT * FROM lawyers LIMIT 2 OFFSET 2";
$firstResult = mysqli_query($conn, $firstLawyers);
$secResult = mysqli_query($conn, $secLawyers);

?>
<div class="flat-slider clearfix">
    <div class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev-slider1" class="rev_slider fullwidthabanner">
            <ul>
                <!-- Slide 1 -->
                <li data-transition="fade">
                    <!-- Main Image -->
                    <img src="images/transparent-head/01.png" alt="" data-bgposition="center center" data-no-retina>

                    <!-- Layers -->
                    <div class="tp-caption tp-resizeme text-white font-weight-700 text-center"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-146','-146','-130','-150']"
                        data-fontsize="['30','30','24','16']" data-lineheight="['70','70','36','30']" data-width="full"
                        data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="700"
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        WE ARE SUPRIMO
                    </div>

                    <div class="tp-caption tp-resizeme text-white font-weight-700 text-center"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-80','-80','-70','-80']"
                        data-fontsize="['72','72','52','40']" data-lineheight="['100','100','64','52']"
                        data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        We stand for Justice
                    </div>

                    <div class="tp-caption tp-resizeme text-description text-white text-center"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['31','31','10','40']"
                        data-fontsize="['21','21','16','16']" data-lineheight="['33','33','28','28']" data-width="full"
                        data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        Our team is dedicated to delivering results with precision <br> and commitment. Trust us for
                        your legal needs
                    </div>

                    <div class="tp-caption text-center btn-read-more" data-x="['center','center','center','center']"
                        data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['133','106','106','140']" data-width="full" data-height="none"
                        data-whitespace="normal" data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                        data-splitin="none" data-splitout="none" data-responsive_offset="on">
                        <a href="#" class="hvr-vertical">Get started</a>
                    </div>
                </li>
                <!-- /End Slide 1 -->

            </ul>
        </div>
    </div>
</div><!-- flat-slider -->
<section class="iconbox-home clearfix">
    <div class="container">
        <div class="iconbox-features type2">
            <div class="iconbox iconbox-1">
                <div class="bck-stand"></div>
                <div class="bnc">
                    <div class="iconbox-wrap">
                        <div class="iconbox-icon">
                            <img src="images/home1/01.png" alt="images">
                        </div>
                        <div class="iconbox-content">
                            <h5 class="title"><a href="#">Short Time Result </a></h5>
                            <p class="description">
                                Our team combines expertise with unwavering dedication, ensuring success in every case.
                                Your trusted partner for exceptional legal solutions
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="iconbox iconbox-2 active">
                <div class="bck-stand"></div>
                <div class="bnc">
                    <div class="iconbox-wrap">
                        <div class="iconbox-icon">
                            <img src="images/home1/02.png" alt="images">
                        </div>
                        <div class="iconbox-content">
                            <h5 class="title"><a href="#">We Stand For Justice</a></h5>
                            <p class="description">
                                "Justice is not just a cause; it's a calling. We are here to answer that call with
                                unwavering commitment and legal expertise."
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="iconbox iconbox-3">
                <div class="bck-stand"></div>
                <div class="bnc">
                    <div class="iconbox-wrap">
                        <div class="iconbox-icon">
                            <img src="images/home1/03.png" alt="images">
                        </div>
                        <div class="iconbox-content">
                            <h5 class="title"><a href="#">No Win No Pay</a></h5>
                            <p class="description">
                                Our No Win No Pay commitment<br> meant we had nothing to lose and everything to gain.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- iconbox -->
<section class="about-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="featured-post">
                    <div class="entry-image">
                        <img src="images/home1/04.png" alt="images">
                    </div>
                    <div class="image-move">
                        <img src="images/home1/05.png" alt="images" class="oval-one">
                        <img src="images/home1/06.png" alt="images" class="oval-two">
                        <img src="images/home1/07.png" alt="images" class="oval-three">
                        <img src="images/home1/08.png" alt="images" class="oval-four">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="flat-spacer" data-desktop="36" data-sdesktop="20" data-mobi="0" data-smobi="0"></div>
                <div class="content">
                    <div class="title"><a href="#">Suprimo is your ultimate legal partner you can trust</a></div>
                    <p class="description">
                        "Welcome to Suprimo, where legal excellence meets trust. We are your ultimate legal partner,
                        dedicated to providing unmatched support and guidance".
                    </p>
                    <p class="description">
                        At Suprimo, we prioritize your needs and bring unparalleled expertise to every case. Trust us
                        for reliable, strategic, and effective legal solutions – because your peace of mind is our
                        priority
                    </p>
                    <div class="fl-btn">
                        <a href="about.php" class="hvr-vertical">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- about -->
<section class="facts">
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
</section><!-- facts -->
<section class="practice-featured">
    <div class="practice-area practice-area-style2">
        <div class="container">
            <div class="title-section text-center">
                <h3 class="flat-title">Practice Area</h3>
                <p class="sub-title">We're offering expert guidance tailored to your unique needs. </p>
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
                                <p class="description">we specialize in Family Law, providing compassionate and expert
                                    guidance to navigate sensitive legal matters with care and precision. </p>
                                <!-- <a href="practice-area.php">read more</a> -->
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
                                <p class="description">we are your partners in navigating the complexities of Business
                                    Law. Trust us to empower your enterprise with reliable legal solutions.</p>
                                <!-- <a href="practice-area.php">read more</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="image-box-law">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <a href="practice-area.php"><img src="images/practice/05.png" alt="images"></a>
                                </div>
                                <div class="icon">
                                    <img src="images/practice/17.png" alt="images">
                                </div>
                            </div>
                            <div class="content-law">
                                <h4 class="name">Finance Law</h4>
                                <p class="description">we specialize in Finance Law, offering comprehensive legal
                                    solutions to navigate regulatory complexities and safeguard financial interests.</p>
                                <!-- <a href="practice-area.php">read more</a> -->
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
                                <p class="description">we specialize in Criminal Law, <br>providing strong defense and
                                    strategic representation to protect your rights and secure the best possible
                                    outcomes.</p>
                                <!-- <a href="practice-area.php">read more</a> -->
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
                                <p class="description">we're your trusted partner in Education Law, our team ensures
                                    legal compliance, resolves disputes, and advocates for a fair and supportive
                                    learning environment.</p>
                                <!-- <a href="practice-area.php">read more</a> -->
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
                                <p class="description">We navigate Immigration Law complexities with precision, offering
                                    strategies and unwavering advocacy for your successful immigration journey."</p>
                                <!-- <a href="practice-area.php">read more</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- practice -->
    <div class="featured featured-style2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="featured-post">
                        <div class="entry-image">
                            <img src="images/home1/14.png" alt="images">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="flat-spacer" data-desktop="63" data-sdesktop="63" data-mobi="30" data-smobi="30"></div>
                    <div class="content">
                        <div class="caption">Our commitment</div>
                        <h4 class="heading">We bring justification against all curruption and injustice</h4>
                        <p class="description">
                            Our commitment goes beyond legal representation – we are dedicated to upholding justice by
                            actively combating corruption.
                        </p>
                        <p class="description">
                            we stand resolute in our mission to combat corruption and injustice. Through unwavering
                            dedication and legal expertise, we bring forth justified action against all forms of
                            wrongdoing, ensuring fairness and integrity prevail in every case we undertake.
                        </p>
                        <div class="fl-btn">
                            <a href="practice-area.php" class="hvr-vertical">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- featured -->
</section><!-- practice-featured -->
<section class="attorneys attorneys-style2">
    <div class="container">
        <div class="top-wrap">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="content">
                        <div class="caption">Our Attorneys</div>
                        <p class="description">
                            Our attorneys are the driving force behind our success, bringing unmatched expertise,
                            dedication, and a relentless pursuit of justice to every case.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <?php
if (mysqli_num_rows($firstResult) > 0) {
    while ($rows = mysqli_fetch_assoc($firstResult)) {
        ?>
                        <div class="col-md-6 col-sm-6">
                            <div class="attorneys-info attorneys-hv-link mg-attorneys-home custom-align custom-end">

                                <div class="attorneys-avatar hv-link-content">
                                    <div class="image image-full">
                                        <img src="../admin-dashboard/template/images/uploads/<?php echo $rows['image'];?>"
                                            alt="images">
                                    </div>
                                    <div class="overlay-box">
                                        <div class="content">
                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="attorneys-content">
                                    <div class="content-wrap rotate-1">
                                        <h3 class="name"><a href="#"><?php echo $rows['fullname'];?></a></h3>
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
                </div>
            </div>
        </div>
        <div class="bottom-wrap">
            <div class="row">
                <?php
                if(mysqli_num_rows($secResult)>0){
                    while($secRows = mysqli_fetch_assoc($secResult)){
                        ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="attorneys-info attorneys-hv-link mg-attorneys-home custom-align custom-end">
                        
                        <div class="attorneys-avatar hv-link-content">
                            <div class="image image-full">
                                <img src="../admin-dashboard/template/images/uploads/<?php echo $secRows['image'];?>" alt="images">
                            </div>
                            <div class="overlay-box">
                                <div class="content">
                                    <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="attorneys-content">
                            <div class="content-wrap rotate-1">
                                <h3 class="name"><a href="#"><?php echo $secRows['fullname'];?></a></h3>
                                <p class="position"><?php echo $secRows['services'];?></p>
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
    </div>
</section> <!-- attorneys  -->
<div class="case-evaluation">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-lg-12   col-md-12">
                <div class="content-evaluation">
                    <div class="themesflat-content-box" data-padding="113px 0% 101px 100px"
                        data-sdesktoppadding="113px 0% 101px 0" data-ssdesktoppadding="113px 0% 101px 0"
                        data-mobipadding="50px 0 100px 0" data-smobipadding="50px 0 100px 0">
                        <div class="caption">Get quick response</div>
                        <h4 class="heading">Get a quick response and legal advice from expert</h4>
                        <p class="description">
                            Expect a prompt response and expert legal advice. Our commitment to quick and efficient
                            service ensures you get the guidance you need when you need it, with expertise you can
                            trust.
                        </p>
                        <div class="flat-spacer" data-desktop="90" data-sdesktop="60" data-mobi="25" data-smobi="25">
                        </div>
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

<section class="testimonial clearfix">
    <div class="container-fluid">
        <div class="title-section text-center">
            <h3 class="flat-title">What People Say</h3>
            <p class="sub-title">Client voices echo satisfaction with our legal excellence and care.</p>
        </div>
        <div class="slider testimonial-wrap testimonial-flexslider equalize sm-equalize-auto">
            <div class="col-left">
                <div class="themesflat-content-box" data-padding="0% 0% 0% 28%" data-sdesktoppadding="0% 0% 0% %0"
                    data-ssdesktoppadding="0% 0% 0% 0%" data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%">
                    <div id="carousel-testimonial" class="flexslider">
                        <ul class="slides client-avatar translate-none">
                            <li class="avatar avatar-1">
                                <img src="images/home1/17.png" alt="images">
                            </li>
                            <li class="avatar avatar-2">
                                <img src="images/home1/18.png" alt="images">
                            </li>
                            <li class="avatar avatar-3">
                                <img src="images/home1/19.png" alt="images">
                            </li>
                            <li class="avatar avatar-4">
                                <img src="images/home1/20.png" alt="images">
                            </li>
                            <li class="avatar avatar-5">
                                <img src="images/home1/21.png" alt="images">
                            </li>
                            <li class="avatar avatar-6">
                                <img src="images/home1/22.png" alt="images">
                            </li>
                            <li class="avatar avatar-7">
                                <img src="images/home1/23.png" alt="images">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-right">
                <div class="themesflat-content-box" data-padding="5% 31.2% 0% 20%" data-sdesktoppadding="10% 10% 0% 0%"
                    data-ssdesktoppadding="10% 10% 0% 0%" data-mobipadding="40px 0% 0% 0%"
                    data-smobipadding="40px 0% 0% 0%">
                    <div id="slider-testimonial" class="flexslider">
                        <ul class="slides client-info">
                            <li>
                                <div class="heading">They are professional</div>
                                <p class="description">
                                    Their professionalism is evident in every interaction and service. Clients
                                    consistently commend their top-notch, professional approach.
                                </p>
                                <div class="flat-spacer" data-desktop="47" data-sdesktop="47" data-mobi="30"
                                    data-smobi="30"></div>
                                <div class="author">
                                    <div class="avatar">
                                        <img src="images/home1/24.png" alt="images">
                                    </div>
                                    <div class="info">
                                        <div class="name">Aliza Khan</div>
                                        <div class="position">Web developer</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="heading">They are professional</div>
                                <p class="description">
                                    Consistently praised for their professionalism, they navigate legal complexities
                                    seamlessly, earning clients' trust and confidence.
                                </p>
                                <div class="flat-spacer" data-desktop="47" data-sdesktop="47" data-mobi="30"
                                    data-smobi="30"></div>
                                <div class="author">
                                    <div class="avatar">
                                        <img src="images\home1\21.png" alt="images">
                                    </div>
                                    <div class="info">
                                        <div class="name">Yasmin Ali</div>
                                        <div class="position">Web developer</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="heading">They are professional</div>
                                <p class="description">
                                    Clients highlight the team's professionalism, citing their adept handling of legal
                                    matters with precision and dedication.
                                </p>
                                <div class="flat-spacer" data-desktop="47" data-sdesktop="47" data-mobi="30"
                                    data-smobi="30"></div>
                                <div class="author">
                                    <div class="avatar">
                                        <img src="images\home1\19.png" alt="images">
                                    </div>
                                    <div class="info">
                                        <div class="name">Atif Khan</div>
                                        <div class="position">Web developer</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="heading">They are professional</div>
                                <p class="description">
                                    Their professionalism is a standout, recognized in client testimonials for
                                    delivering expert legal services with integrity and proficiency.
                                </p>
                                <div class="flat-spacer" data-desktop="47" data-sdesktop="47" data-mobi="30"
                                    data-smobi="30"></div>
                                <div class="author">
                                    <div class="avatar">
                                        <img src="images\home1\20.png" alt="images">
                                    </div>
                                    <div class="info">
                                        <div class="name">Farwa sufiyan</div>
                                        <div class="position">Web developer</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="heading">They are professional</div>
                                <p class="description">
                                    Their professionalism shines through in every legal interaction, garnering client
                                    acclaim for expert services delivered with precision and dedication.
                                </p>
                                <div class="flat-spacer" data-desktop="47" data-sdesktop="47" data-mobi="30"
                                    data-smobi="30"></div>
                                <div class="author">
                                    <div class="avatar">
                                        <img src="images\home1\23.png" alt="images">
                                    </div>
                                    <div class="info">
                                        <div class="name">Ibrahim Ali</div>
                                        <div class="position">Web developer</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="heading">They are professional</div>
                                <p class="description">
                                    Renowned for professionalism, they receive high praise for delivering expert,
                                    reliable legal services with unwavering dedication to client satisfaction.
                                </p>
                                <div class="flat-spacer" data-desktop="47" data-sdesktop="47" data-mobi="30"
                                    data-smobi="30"></div>
                                <div class="author">
                                    <div class="avatar">
                                        <img src="images\home1\17.png" alt="images">
                                    </div>
                                    <div class="info">
                                        <div class="name">Areeba ejaz</div>
                                        <div class="position">Web developer</div>
                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                                    <div class="heading">They are professional</div>
                                    <p class="description">
                                        Lorem ipsum dolor sit amet, consecte dunt ut labore et dot  nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                    </p>
                                    <div class="flat-spacer" data-desktop="47" data-sdesktop="47" data-mobi="30" data-smobi="30"></div>
                                    <div class="author">
                                        <div class="avatar">
                                            <img src="images/home1/24.png" alt="images">
                                        </div>
                                        <div class="info">
                                            <div class="name">Mehbuba Khan</div>
                                            <div class="position">Web developer</div>
                                        </div> -->
                    </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</section><!-- testimonial -->
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