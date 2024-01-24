<?php
require_once "config.php";
require_once "partials/header.php";




?>

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content">
                    <h2 class="title-banner">contact</h2>
                    <p>If you are facing serious criminal charges, it is imperative that you seek assistance from a knowledgeable criminal defense lawyer as soon as possible.</p>

                </div>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- page-title -->
<div class="contact clearfix">
    <div class="container">
        <div class="contact-us">
            <div class="title-section text-center">
                <h3 class="flat-title">Connect With Us</h3>
                <p class="sub-title">For Personalized Advice About Your Situation</p>
            </div>
            <div class="contact-options">
                <div class="icon-box">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="content-info">
                        <h4 class="name">Address</h4>
                        <div class="info-wrap">
                            <p>Supreme Court of Pakistan</p>
                        </div>
                    </div>
                </div>
                <div class="icon-box border-both-sides">
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="content-info">
                        <h4 class="name">Phone Number</h4>
                        <div class="info-wrap">
                            <p>123.456.7890</p>
                            <!-- <p>123.456.7890</p> -->
                        </div>
                    </div>
                </div>
                <div class="icon-box">
                    <div class="icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="content-info">
                        <h4 class="name">Email Address</h4>
                        <div class="info-wrap">
                            <p>Suprimo@law.com</p>
                            <!-- <p>trust_123@gmail.com</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- contact -->
<div class="write-something">
    <div class="container">
        <div class="title-section text-center">
            <h3 class="flat-title">Write Us Something</h3>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="alert"></div>
                <form class="form-message-pct p-0" id="addform">
                    <div class="text-wrap d-md-flex clearfix">
                        <div class="wr-sm">
                            <input type="text" class="your-name" name="name" placeholder="Your name">
                        </div>
                        <div class="wr-sm">
                            <input type="text" class="your-email" name="email" placeholder="Your email">
                        </div>
                        <div class="wr-sm">
                            <input type="text" class="your-phone" name="phone" placeholder="Your phone">
                        </div>
                    </div>
                    <textarea id="comment-message" rows="8" name="message" placeholder="Write your message here"></textarea>
                    <div class="fl-btn">
                        <input type="submit" value="send now" name="contact_us" class="hvr-vertical submit-btn">
                    </div>
                </form>

                </div>
            <div class="col-md-4">
                <iframe style="width:100%; height:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.3556777114027!2d67.01433279678955!3d24.851699000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e0ba456a4dd%3A0x76712f9171a04c8f!2sSupreme%20Court%20of%20Pakistan!5e0!3m2!1sen!2s!4v1705848767376!5m2!1sen!2s"></iframe>
            </div>
        </div>
    </div>

</div><!-- ADD CONTACT MAP -->
<div class="contact-map">
</div>
<!--footer -->
<?php
require_once "partials/footer.php";
?>
<script>
    // Function For creating response 


    jQuery(document).on('submit', '#addform', function(e) {
        e.preventDefault();
        jQuery('.submit-btn').html(
            `<div class="spinner-border text-white mr-2 align-self-center loader-sm "></div> Loading...`
        );
        let action = 'partials/insert.php?page=contact';
        let method = 'POST';
        $.ajax({
            type: 'POST',
            url: action,
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: "JSON",

            success: function(result) {
                $("#alert").html(alertMessage(result));


                if (result['status'] == "success") {
                    $("#addform").trigger("reset");
                }

                // Additional logic for success can go here
            },
            error: function(error) {
                console.log(error);
                jQuery('.submit-btn').html(`Try Again!`);
            },
            complete: function() {
                // This will be executed whether the request is successful or not
                jQuery('.submit-btn').html(`Save Changes`);
            }
        });
    });

    function alertMessage(result) {
        return ` <div class="alert alert-${result['status']} inverse alert-dismissible " role="alert" style='display:block'>
<div class=" align-items-center d-flex justify-content-between">
  <p class="m-0 w-100">${result['message']}</p>
  <span class="closeAlert">&times;</span>
</div>
${result['status'] == 'danger' ?
            `<div class="view-error">
                                    <p  id="viewError">View Error</p>
                                    <div id="errDisp" style="display:none;">${result['error']}</div>
                                </div>`
            : ''}
</div>`
    }

    // Close Alert
    $(document).on('click', '.closeAlert', function() {
        $('.alert-dismissible').fadeOut();
        $("#alert").html();
    })

    // Cloase if error
    $(document).on('click', '#viewError', function() {
        $('#errDisp').toggle();

    })
</script>