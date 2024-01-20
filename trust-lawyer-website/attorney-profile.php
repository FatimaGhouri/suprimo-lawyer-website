<?php
require_once "config.php";
require_once "partials/header.php";
if (isset($_GET['id'])) {
    $attorneyId = $_GET['id'];
    $searchSql = "SELECT* FROM lawyers WHERE id = '$attorneyId'";
    $result = mysqli_query($conn, $searchSql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $attorney_name = $row['fullname'];
        $attorney_email = $row['email'];
        $attorney_location = $row['location'];
        $attorney_contact = $row['contact'];
        $attorney_service = $row['services'];
        $attorney_image = $row['image'];
        $attorney_desp = $row['description'];
    }
}
$allAttorneySql = "SELECT * FROM lawyers";
$allResult = mysqli_query($conn, $allAttorneySql);

if (isset($_POST['appSubmit'])) {
    $attorneyId = $attorneyId;
    $appDateTime = $_POST['appDateTime'];

    if (isset($_SESSION["id"]) && $_SESSION["userType"] === "customer" && isset($appDateTime)) {
        $customerId = $_SESSION["id"];

        // Check if the appointment date is not in the past
        $currentDateTime = date('Y-m-d H:i:s');
        if (strtotime($appDateTime) > strtotime($currentDateTime)) {
            $insertSql = "INSERT INTO appointments(customers_id, Lawyers_id, appDateTime) VALUES ('$customerId', '$attorneyId', '$appDateTime')";
            $insertResult = mysqli_query($conn, $insertSql);

            if ($insertResult) {
                echo "Slot booked successfully";
            } else {
                echo "Got some issue in booking a slot";
            }
        } else {
            echo "Appointment date cannot be in the past";
        }
    } else {
        echo "No such customer found";
    }
}

require_once "partials/header.php";
?>
<div class="attorneys-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="attorneys-single-warp d-md-flex">
                    <div class="col-left">
                        <div class="personal-details">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <img src="../admin-dashboard/template/images/uploads/<?php echo $attorney_image; ?>" alt="images">
                                </div>
                            </div>
                            <ul class="attorneys-info-sn">
                                <li>
                                    <h3 class="name-info name-size">Advocate <?php echo ucwords($attorney_name); ?>
                                    </h3>
                                    <p><?php echo $attorney_service; ?></p>
                                </li>
                                <li>
                                    <div class="name-info">Location</div>
                                    <p><?php echo $attorney_location; ?></p>
                                </li>
                                <li>
                                    <div class="name-info">Email</div>
                                    <p><?php echo $attorney_email; ?></p>
                                </li>
                                <li>
                                    <div class="name-info">Phone</div>
                                    <p>+<?php echo $attorney_contact; ?></p>
                                </li>
                                <li>
                                    <div class="name-info">Social Links</div>
                                    <div class="list-socials">
                                        <a href="#" class="icon-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" class="icon-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" class="icon-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="introduce-attorneys">
                            <h4 class="title">About <?php echo ucwords($attorney_name); ?> :</h4>
                            <div class="text">
                                <p>
                                    <?php echo $attorney_desp; ?>
                                </p>
                            </div>
                        </div>
                        <div class="flat-question">
                            <div class="accordion">
                                <div class="accordion-toggle line active">
                                    <div class="toggle-title d-flex align-items-center active">
                                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                        <h5 class="name d-flex align-items-sm-center">Skill</h5>
                                    </div>
                                    <div class="toggle-content">
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Primary Law</h6>
                                            <h6 class="skill-bar-percent">90%</h6>
                                            <div class="skillbar" data-percent="90%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Business Law</h6>
                                            <h6 class="skill-bar-percent">97%</h6>
                                            <div class="skillbar" data-percent="97%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Finalcial Law</h6>
                                            <h6 class="skill-bar-percent">70%</h6>
                                            <div class="skillbar" data-percent="70%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Immigration Law</h6>
                                            <h6 class="skill-bar-percent">80%</h6>
                                            <div class="skillbar" data-percent="80%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-toggle line">
                                    <div class="toggle-title d-flex align-items-center">
                                        <div class="icon"><i class="fa fa-address-book-o" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="name d-flex align-items-sm-center">Education & Training</h5>
                                    </div>
                                    <div class="toggle-content">
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Primary Law</h6>
                                            <h6 class="skill-bar-percent">90%</h6>
                                            <div class="skillbar" data-percent="90%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Business Law</h6>
                                            <h6 class="skill-bar-percent">97%</h6>
                                            <div class="skillbar" data-percent="97%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Finalcial Law</h6>
                                            <h6 class="skill-bar-percent">70%</h6>
                                            <div class="skillbar" data-percent="70%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Immigration Law</h6>
                                            <h6 class="skill-bar-percent">80%</h6>
                                            <div class="skillbar" data-percent="80%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-toggle line">
                                    <div class="toggle-title d-flex align-items-center">
                                        <div class="icon"><i class="fa fa-folder-o" aria-hidden="true"></i></div>
                                        <h5 class="name d-flex align-items-sm-center">Career & Experience</h5>
                                    </div>
                                    <div class="toggle-content">
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Primary Law</h6>
                                            <h6 class="skill-bar-percent">90%</h6>
                                            <div class="skillbar" data-percent="90%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Business Law</h6>
                                            <h6 class="skill-bar-percent">97%</h6>
                                            <div class="skillbar" data-percent="97%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Finalcial Law</h6>
                                            <h6 class="skill-bar-percent">70%</h6>
                                            <div class="skillbar" data-percent="70%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Immigration Law</h6>
                                            <h6 class="skill-bar-percent">80%</h6>
                                            <div class="skillbar" data-percent="80%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-toggle line">
                                    <div class="toggle-title d-flex align-items-center">
                                        <div class="icon"><i class="fa fa-trophy" aria-hidden="true"></i></div>
                                        <h5 class="name d-flex align-items-sm-center">Awards & Achivment</h5>
                                    </div>
                                    <div class="toggle-content">
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Primary Law</h6>
                                            <h6 class="skill-bar-percent">90%</h6>
                                            <div class="skillbar" data-percent="90%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Business Law</h6>
                                            <h6 class="skill-bar-percent">97%</h6>
                                            <div class="skillbar" data-percent="97%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Finalcial Law</h6>
                                            <h6 class="skill-bar-percent">70%</h6>
                                            <div class="skillbar" data-percent="70%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                        <div class="skillbar-item">
                                            <h6 class="skillbar-title">Immigration Law</h6>
                                            <h6 class="skill-bar-percent">80%</h6>
                                            <div class="skillbar" data-percent="80%">
                                                <div class="skillbar-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="widget">
                    <h3 class="widget-title"><span>Appointment</span></h3>
                    <form id="appointmentForm" class="appointment-form mb-4" method="post">
                        <div class="form-group">
                            <label for="appDateTime">Appointment Date and Time:</label>
                            <input type="datetime-local" id="appDateTime" name="appDateTime" required>
                        </div>
                        <div class="form-group">
                            <div class="cosulting hvr-vertical">

                                <input type="submit" class="book-slot-btn " name="appSubmit" value="Book Your Appointment">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="sidebar mg-sidebar-res">
                    <div class="widget widget-list-common">
                        <h3 class="widget-title"><span>Other Attorneys</span></h3>
                        <ul>
                            <?php
                            if (mysqli_num_rows($allResult) > 0) {
                                while ($rows = mysqli_fetch_assoc($allResult)) {
                                    $all_attorney_id = $rows['id'];
                                    $all_attorney_name = $rows['fullname'];
                                    $all_attorney_services = $rows['services'];
                            ?>
                                    <li><a href="attorney-profile.php?id=<?php echo $all_attorney_id; ?>"><?php echo $all_attorney_name; ?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- attorneys-single -->
<div class="featured-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="content">
                    <h6 class="title">Lets solve your problem today</h6>
                    <p>Lorem ipsum dolor sit amet, consecte dunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="fl-btn hvr-vertical">
                    <a href="attorney-app.php">Book Your Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- featured-banner -->

<?php
require_once "partials/footer.php";
?>
<!--footer -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var appDateTimeInput = document.getElementById('appDateTime');

        // Disable past dates
        var today = new Date();
        var formattedToday = today.toISOString().slice(0, 16);
        appDateTimeInput.setAttribute('min', formattedToday);

        // Define specific future dates to allow (replace these dates with your own)
        var allowedDates = ["2024-01-30T12:00", "2024-02-10T15:30"];

        // Add event listener to dynamically update allowed dates
        appDateTimeInput.addEventListener('input', function() {
            var selectedDate = new Date(appDateTimeInput.value);

            // Check if the selected date is in the allowed dates array
            if (allowedDates.some(function(date) {
                    return selectedDate.toISOString().slice(0, 16) === date;
                })) {
                // Date is allowed
                appDateTimeInput.setCustomValidity('');
            } else {
                // Date is not allowed
                appDateTimeInput.setCustomValidity('Invalid date');
            }
        });
    });
</script>