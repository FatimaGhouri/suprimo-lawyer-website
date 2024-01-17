<?php
require_once "partials/header.php";
require_once "config.php";
$sql = "SELECT * FROM lawyers";
$result = mysqli_query($conn, $sql);

?>
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <h2 class="title-banner">attorneys</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing<br> elit sed do eius mod tempor incididunt
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="breadcrumb">
                        <li><a href="#" class="active">Home</a></li>
                        <li><a href="#">Attorneys</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- page-title -->
    <div class="attorneys attorneys-style1">
        <div class="container">
            <div class="title-section text-center">
                <h3 class="flat-title">Our Attorney</h3>
                <p class="sub-title">Dolore magna aliqu onoet enim ad minim veniam</p>
            </div>
            <div class="row searchBtns">
                <div class="col-lg-3 col-sm-12">
                    <button class="fl-btn hvr-vertical" id="searchByService">
                        Search By Service
                    </button>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <button class="fl-btn hvr-vertical" id="searchByLocation">
                        Search By Location
                    </button>
                </div>
            </div>
            <div class="row searchRow">
                <div class="col-lg-12" id="serviceSearchDiv" style="display: none;">
                    <form class="searchInput" id="searchForm">
                        <select class="searchOpt" id="serviceSearchOption">
                            <option disabled selected value="">Select a Services</option>
                            <option value="Legal Consultation and Advice">Legal Consultation and Advice</option>
                            <option value="Contracts and Agreements">Contracts and Agreements</option>
                            <option value="Litigation and Dispute Resolution">Litigation and Dispute Resolution</option>
                            <option value="Real Estate">Real Estate</option>
                            <option value="Family Matters">Family Matters</option>
                            <option value="Estate Planning">Estate Planning</option>
                            <option value="Business and Corporate Affairs">Business and Corporate Affairs</option>
                            <option value="Employment Issues">Employment Issues</option>
                            <option value="Intellectual Property (IP)">Intellectual Property (IP)</option>
                            <option value="Immigration Assistance">Immigration Assistance</option>
                            <option value="Criminal Defense">Criminal Defense</option>
                            <option value="Affidavit">Affidavit</option>
                            <option value="Divorce Law">Divorce Law</option>
                        </select>
                    </form>
                </div>

                <div class="col-lg-12" id="locationSearchDiv" style="display: none;">
                    <form class="searchInput " id="searchForm">
                        <select class="" id="locationSearchOption">
                            <option disabled selected value="">Select a location</option>
                            <optgroup label="Major Cities">
                                <option value="Karachi">Karachi</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="Rawalpindi">Rawalpindi</option>
                                <option value="Faisalabad">Faisalabad</option>
                                <option value="Peshawar">Peshawar</option>
                                <option value="Quetta">Quetta</option>
                            </optgroup>
                            <optgroup label="Provinces">
                                <option value="Sindh">Sindh</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                                <option value="Balochistan">Balochistan</option>
                                <option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
                                <option value="Azad Jammu & Kashmir">Azad Jammu & Kashmir</option>
                            </optgroup>
                        </select>
                    </form>
                </div>
            </div>
            <div class="attorneys-details" id="attorneys-detail">
                <div class="row">
                    <?php
if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="attorneys-info attorneys-hv-link mg-60" id="content-block">
                            <div class="attorneys-avatar hv-link-content">
                                <div class="image">
                                    <img src="../admin-dashboard/template/images/uploads/<?php echo $rows['image']; ?>"
                                        alt="images">
                                </div>
                                <div class="overlay-box">
                                    <div class="content">
                                        <a href="attorney-profile.php?id=<?php echo $rows['id'];?>">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="attorneys-content">
                                <div class="content-wrap">
                                    <h3 class="name"><a href="#">
                                            <?php echo ucwords("Name: " . $rows['fullname']); ?>
                                        </a></h3>
                                    <p class="position">
                                        <?php echo "Service: " . $rows['services']; ?>
                                    </p>
                                    <p class="location ">
                                        <?php echo "Location: " . $rows['location']; ?>
                                    </p>
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
    </div><!-- attorneys -->
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
    <script>
    let serviceDiv = document.getElementById('serviceSearchDiv');
    let locationDiv = document.getElementById('locationSearchDiv');
    document.getElementById('searchByService').addEventListener('click', function() {
        locationDiv.style.display = 'none';
        serviceDiv.style.display = 'block';
        let searchMethod = 'service';
        performSearch(searchMethod);
    })
    document.getElementById('searchByLocation').addEventListener('click', function() {
        serviceDiv.style.display = 'none';
        locationDiv.style.display = 'block';
        let searchMethod = 'location';
        performSearch(searchMethod);
    })


    function performSearch(searchMethod) {
        if (searchMethod === 'service') {

            document.getElementById("serviceSearchOption").addEventListener('input', function() {
                let selectedOpt = document.getElementById('serviceSearchOption').value;
                fetch("searchAttorney.php?service=" + selectedOpt)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('attorneys-detail').innerHTML = data;
                    })
                    .catch(error => console.error("Error".error));
            })
        }
        if (searchMethod === 'location') {
            document.getElementById("locationSearchOption").addEventListener('input', function() {
                let selectedOpt = document.getElementById('locationSearchOption').value;
                fetch("searchAttorney.php?location=" + selectedOpt)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('attorneys-detail').innerHTML = data;
                    })
                    .catch(error => console.error("Error".error));
            })
        }
    }
    </script>

<?php

require_once "partials/footer.php";
?>