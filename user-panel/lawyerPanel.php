<?php
session_start();
require_once "../config.php";

$errorMsg = false;

if (isset($_SESSION['userType']) && $_SESSION['userType'] === "lawyer") {
    if (isset($_SESSION['id'])) {
        $lawyerId = $_SESSION['id'];
        $userType = $_SESSION['userType'];
        $findLawyer = "SELECT * FROM lawyers WHERE id = '$lawyerId'";
        $lawyerResult = mysqli_query($conn, $findLawyer);
        if (mysqli_num_rows($lawyerResult) > 0) {
            $lawyerRow = mysqli_fetch_assoc($lawyerResult);
            $lawyerName = $lawyerRow['fullname'];
            $lawyerEmail = $lawyerRow['email'];
            $lawyerPassword = $lawyerRow['password'];
            $lawyerContact = $lawyerRow['contact'];
            $lawyerLocation = $lawyerRow['location'];
            $lawyerService = $lawyerRow['services'];
            $lawyerImage = $lawyerRow['image'];
            $lawyerDesp = $lawyerRow['description'];

        }
    }
}
if (isset($_POST['updateLawyerForm'])) {
    $upLawyerName = $_POST['upLawyerName'];
    $upEmail = $_POST['upEmail'];
    $upPassword = $_POST['upPassword'];
    $upContact = $_POST['upContact'];
    $upServices = $_POST['upService'];
    $upLocation = $_POST['upLocation'];
    $upLawyerDesp = $_POST['upLawyerDesp'];
    $imgName = $_FILES['upLawyerImage']['name'];
    $tmp_name = $_FILES['upLawyerImage']['tmp_name'];

    function uploadImage($tmp_name, $imgName)
    {
        $targetDir = '../../admin-dashboard/template/images/uploads';
        $targetFile = $targetDir . basename($imgName);
        if (move_uploaded_file($tmp_name, $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }

    $stmt = mysqli_stmt_init($conn);

    $updateSql = "UPDATE lawyers SET fullname=?, email=?, password=?, contact=?, services=?, location=?, description=? WHERE id=?";
    $imageUpdate = false;

    if ($imgName !== '') {
        $updateSql = "UPDATE lawyers SET fullname=?, email=?, password=?, contact=?, services=?, location=?, image=?, description=? WHERE id=?";
        $imageUpdate = true;
    }

    if (mysqli_stmt_prepare($stmt, $updateSql)) {
        if ($imageUpdate) {
            $targetFile = uploadImage($tmp_name, $imgName);
            if ($targetFile) {
                mysqli_stmt_bind_param($stmt, "ssssssssi", $upLawyerName, $upEmail, $upPassword, $upContact, $upServices, $upLocation, $imgName, $upLawyerDesp, $lawyerId);
            } else {
                $errorMsg = "Got some issue in uploading image";
            }
        } else {
            mysqli_stmt_bind_param($stmt, "sssssssi", $upLawyerName, $upEmail, $upPassword, $upContact, $upServices, $upLocation, $upLawyerDesp, $lawyerId);
        }

        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script>window.location.href = 'lawyerPanel.php'</script>";
        } else {
            $errorMsg = "Update failed.";
        }
    } else {
        $errorMsg = "Error in preparing the statement.";
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
        /* border: 1px solid #ccc; */
        border-radius: 5px;
        margin-bottom: 30px;
    }

    .btnsCover {
        /* border: 2px solid rgba(93, 93, 93, 0.426); */
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
        border: none;
    }

    .btn-success:hover {
        background-color: #38b97c;
    }

    .btn-danger {
        background-color: #f78893;
        border: none;
    }

    .btn-danger:hover {
        background-color: #f7707d;
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
                        <img src="../../admin-dashboard/template/images/uploads/<?php echo ucwords($lawyerImage); ?>"
                            alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo ucwords($lawyerName); ?>
                        </span> </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo ucwords($lawyerName); ?></h6>
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
            <h3>Welcome <?php echo ucwords($lawyerName); ?></h3>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="../../admin-dashboard/template/images/uploads/<?php echo ucwords($lawyerImage); ?>"
                                alt="Profile" class="rounded-circle">
                            <h2><?php echo ucwords($lawyerName); ?>
                            </h2>
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
                            <!-- Bordered Tabs -->
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
                                        data-bs-target="#lawyerApp">Appointments</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($lawyerName); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($lawyerEmail); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Password</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($lawyerPassword); ?></div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Contact</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($lawyerContact); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Location</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($lawyerLocation); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Service</div>
                                        <div class="col-lg-9 col-md-8"><?php echo ucwords($lawyerService); ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Description</div>
                                        <div class="col-lg-6 col-md-5" style="text-align: justify;">
                                            <?php echo ucwords($lawyerDesp); ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="post" enctype="multipart/form-data">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                            <symbol id="exclamation-triangle-fill" fill="currentColor"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                            </symbol>
                                        </svg>

                                        <?php
if ($errorMsg) {
    ?>
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                                aria-label="Danger:">
                                                <use xlink:href="#exclamation-triangle-fill" />
                                            </svg>
                                            <div>
                                                <?php echo $errorMsg ?>
                                            </div>
                                        </div>
                                        <?php
}
?>

                                        <div class="row mb-3" id="preImageDiv">
                                            <label for="lawyerImage" class="col-md-4 col-lg-3 col-form-label">Your
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="../../admin-dashboard/template/images/uploads/<?php echo ucwords($lawyerImage); ?>"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="keepImageCheckbox"
                                                    value="yes">
                                                <label class="form-check-label text-secondary fs-6"
                                                    for="flexCheckDefault">
                                                    Want to upload the new image
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mb-3" id="newImageDiv" style="display:none">
                                            <label class="col-md-4 col-lg-3 col-form-label">Upload:</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="file" class="form-control" name="upLawyerImage">
                                            </div>
                                        </div>
                                        <script>
                                        document.getElementById("keepImageCheckbox").addEventListener("change",
                                            function() {
                                                let newImageDiv = document.getElementById("newImageDiv");
                                                let preImageDiv = document.getElementById("preImageDiv");
                                                newImageDiv.style.display = this.checked ? "flex" : "none";
                                                preImageDiv.style.display = this.checked ? "none" : "flex";
                                            });
                                        </script>



                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upLawyerName" type="text" class="form-control"
                                                    id="fullName" value="<?php echo ucwords($lawyerName); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upEmail" type="email" class="form-control" id="email"
                                                    value="<?php echo ucwords($lawyerEmail); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country"
                                                class="col-md-4 col-lg-3 col-form-label">Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upPassword" type="text" class="form-control" id="password"
                                                    value="<?php echo ucwords($lawyerPassword); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address"
                                                class="col-md-4 col-lg-3 col-form-label">Contact</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upContact" type="text" class="form-control" id="contact"
                                                    value="<?php echo ucwords($lawyerContact); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Location</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upLocation" type="text" class="form-control" id="location"
                                                    value="<?php echo ucwords($lawyerLocation); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Service</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="upService" type="text" class="form-control" id="service"
                                                    value="<?php echo ucwords($lawyerService); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email"
                                                class="col-md-4 col-lg-3 col-form-label">Description</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="upLawyerDesp" id="despTextarea"
                                                    class="despTextarea form-control"><?php echo ucwords($lawyerDesp); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary col-lg-3"
                                                name="updateLawyerForm">Save
                                                Changes</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Appointment section -->
                                <div class="tab-pane fade pt-3" id="lawyerApp">
                                    <div class="searchBtnsBox">
                                        <h5 id="appHeading">Pending Appointments :</h5>
                                        <div class="btnsCover">
                                            <button id="pendingBtn" class="seacrchBtn btn-info active">Pending</button>
                                            <button id="approvedBtn" class="seacrchBtn btn-info">Approved</button>
                                        </div>
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

    <!-- Bootstrap javascript dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

</body>

<script>
// script for appointments fetching from database
function toggleStatus(status) {
    document.getElementById('pendingBtn').classList.toggle('active', status === 'pending');
    document.getElementById('approvedBtn').classList.toggle('active', status === 'approved');
    fetch('searchLawyerApp.php?status=' + status + '&&lawyerId=' + <?php echo $lawyerId; ?>)
        .then(response => response.text())
        .then(data => {
            document.getElementById('appointmentTable').innerHTML = data;
        })
        .catch(error => {
            console.log("Error: ", error);
        });
    console.log('Selected Status:', status);
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
// end
</script>

