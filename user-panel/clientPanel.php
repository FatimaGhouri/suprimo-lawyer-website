<?php
session_start();
require_once "../config.php";
if (isset($_SESSION['id'])) {
    $clientId = $_SESSION['id'];
    $userType = $_SESSION['userType'];
    $findClient = "SELECT * FROM customers WHERE id = '$clientId'";
    $clientResult = mysqli_query($conn, $findClient);
    if (mysqli_num_rows($clientResult) > 0) {
        $clientRow = mysqli_fetch_assoc($clientResult);
        $clientName  = $clientRow['custName'];
        $clientEmail = $clientRow['email'];
        $clientPassword = $clientRow['password'];
        $clientContact = $clientRow['contact'];
    }
}
if(isset($_POST['updateCustData'])){
    $upClientName = $_POST['upClientName'];
    $upEmail = $_POST['upEmail'];
    $upPassword = $_POST['upPassword'];
    $upContact = $_POST['upContact'];

    $updateSql = "UPDATE customers SET
                  custName = '$upClientName',
                  email = '$upEmail',
                  password = '$upPassword',
                  contact = '$upContact' 
                  WHERE id = '$clientId'";
    $updateResult = mysqli_query($conn, $updateSql);
    if($updateResult){
        echo " <script>window.location.href='clientPanel.php'</script>";
    }else{
        echo "Got some issue in updating data";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Suprimo | User Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <style>
    .searchBtnsBox {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 98%;
        overflow: hidden;
        border-radius: 5px;
        margin-bottom: 30px;
    }

    .btnsCover {
        box-shadow: inset 1px 1px 2px 1px #c89e0f4a;
        padding: 10px;
        border-radius: 10px;
    }

    .seacrchBtn {
        background-color: #fff;
        color: black;
        padding: 10px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
        border: none;
        border-radius: 5px;
    }

    .seacrchBtn.active {
        background-color: #cca776;
        color: #fff;
    }

    .btn-success {
        background-color: #4fc68f;
        transition: all 100ms ease-in;
        border: none;
    }

    .btn-success:hover {
        background-color: #38b97c;
    }

    .btn-danger {
        background-color: #f78893;
        transition: all 100ms ease-in;
        border: none;
    }

    .btn-danger:hover {
        background-color: #f7707d;
    }

    .rejectedAppBtn{
        background-color: #f78893;
        transition: all 200ms ease-in-out;
        padding: 10px;
        color:black;
    }

    .rejectedAppBtn:hover{
        background-color:#f7707d ;
        color: black;
    }
    </style>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="../index.php" class="logo d-flex align-items-center">
                <img src="assets/images/logo.png" alt="" />
            </a>
        </div>
        <!-- End Logo -->
        <nav class="header-nav-items">
            <ul class="d-flex align-items-center">
                <li>
                    <a href="../index.php" class="active">Home</a>
                </li>
                <li>
                    <a href="../about.php">About</a>
                </li>
                <li>
                    <a href="../practice-area.php">Practice Area</a>
                </li>
                <li>
                    <a href="../attorneys.php">Attorneys</a>
                </li>
                <li>
                    <a href="../blog.php">News</a>
                </li>
                <li>
                    <a href="../contact.php">Contact</a>
                </li>
            </ul>
        </nav>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3" style="list-style: none;">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../images/male_dummy.png" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ucwords($clientName ); ?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo ucwords($clientName ); ?></h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <!-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="userpanel.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li> -->
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <main id="main" class="main">

        <div class="pagetitle">
            <h3>Welcome <?php echo ucwords($clientName ); ?></h3>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="../images/male_dummy.png" alt="Profile" class="rounded-circle">
                            <h2><?php echo $clientName ;?></h2>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#clientApp">Appointments</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                <!-- Data overview Section -->
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($clientName ); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($clientEmail); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Password</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($clientPassword); ?></div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Contact</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($clientContact); ?></div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="post">

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upClientName" type="text" class="form-control" id="fullName"
                                                    value="<?php echo ucwords($clientName ); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upEmail" type="email" class="form-control" id="email"
                                                    value="<?php echo ucwords($clientEmail); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country"
                                                class="col-md-4 col-lg-3 col-form-label">Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upPassword" type="text" class="form-control" id="password"
                                                    value="<?php echo ucwords($clientPassword); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address"
                                                class="col-md-4 col-lg-3 col-form-label">Contact</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upContact" type="text" class="form-control" id="contact"
                                                    value="<?php echo ucwords($clientContact); ?>">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="updateCustData">Save
                                                Changes</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- Appointments Section -->
                                <div class="tab-pane fade pt-3" id="clientApp">
                                    <div class="searchBtnsBox">
                                        <div class="btnsCover">
                                            <button id="pendingBtn" class="seacrchBtn btn-info active">Pending</button>
                                            <button id="approvedBtn" class="seacrchBtn btn-info">Approved</button>
                                            <button id="rejectedBtn" class="seacrchBtn btn-info">Rejected Appointments</button>
                                        </div>
                                        <!-- <button class="btn rejectedAppBtn" id="rejectedBtn">Rejected Appointments</button> -->
                                    </div>
                                    <div class="appHeadingDiv">
                                    <h5 id="appHeading" class="mb-3">Pending Appointments :</h5>
                                    </div>
                                    <table class="table table-striped" id="appointmentTable">
                                    </table>
                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
    function toggleStatus(status) {
        document.getElementById('pendingBtn').classList.toggle('active', status === 'pending');
        document.getElementById('approvedBtn').classList.toggle('active', status === 'approved');
        document.getElementById('rejectedBtn').classList.toggle('active', status === 'rejected');
        fetch('searchClientApp.php?status=' + status + '&&id=' + <?php echo $clientId; ?>)
            .then(response => response.text())
            .then(data => {
                document.getElementById('appointmentTable').innerHTML = data;
            })
            .catch(error => {
                console.log("Error: ", error);
            });
    }

        document.addEventListener('DOMContentLoaded', function() {
        toggleStatus('pending');
    });
        let delayTimer;

        document.getElementById('pendingBtn').addEventListener('click', function() {
        let appHeading = document.getElementById('appHeading');
        appHeading.innerHTML = "Pending Appoinments :";
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            toggleStatus('pending');
        }, 100);
    });

        document.getElementById('approvedBtn').addEventListener('click', function() {
        let appHeading = document.getElementById('appHeading');
        appHeading.innerHTML = "Approved Appoinments :";
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            toggleStatus('approved');
        }, 100);
    });
    
    document.getElementById('rejectedBtn').addEventListener('click', function() {
        let appHeading = document.getElementById('appHeading');
        appHeading.innerHTML = "Apologies, lawyers were unavailable";
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            toggleStatus('rejected');
        }, 100);
    });
    </script>

</body>

</html>