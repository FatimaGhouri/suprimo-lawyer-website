<?php
session_start();
if($_SESSION['login']!==true){
    header("location:pages/samples/login.php");
    die();
}
require_once "pages/config.php";
$lawyerCountSql = "SELECT COUNT(id) FROM lawyers";
$custCountSql = "SELECT COUNT(id) FROM customers";
$appCountSql = "SELECT COUNT(id) FROM appointments";

$lawCountResult = mysqli_query($conn, $lawyerCountSql);
$custCountResult = mysqli_query($conn, $custCountSql);
$appCountResult = mysqli_query($conn, $appCountSql);

$lawyerCount = mysqli_fetch_array($lawCountResult)[0];
$custCount = mysqli_fetch_array($custCountResult)[0];
$appCount = mysqli_fetch_array($appCountResult)[0];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- FontAwesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.svg" class="mr-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/uploads/<?php echo $_SESSION['image']; ?>" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="pages/samples/logout.php">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/customers.php">
                            <i class="fa-solid fa-users menu-icon"></i>
                            <span class="menu-title">Customers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/lawyers.php">
                            <i class="fa-solid fa-user-tie menu-icon"></i>
                            <span class="menu-title">Lawyers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/appointments.php">
                            <i class="fa-solid fa-calendar-check menu-icon"></i>
                            <span class="menu-title">Appoinments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adminProfile.php">
                            <i class="fa-solid fa-circle-user menu-icon"></i>
                            <span class="menu-title">Admin Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome <?php echo ucwords($_SESSION['fullname']);?> </h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12 grid-margin stretch-card border-0">
                            <div class="card tale-bg">
                                    <img src="images/dashboard-img.jpg" alt="people" style="height: 130px;">
                                    <div class="weather-info">
                                        <div class="d-flex">
                                            <div>
                                                <h2 class="mb-0 font-weight-normal"><i
                                                        class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                            </div>
                                            <div class="ml-3 me-3">
                                                <h4 class="location font-weight-normal">Karachi</h4>
                                                <h6 class="font-weight-normal">Pakistan</h6>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mb-4 stretch-card transparent">
                            <div class="card card-tale border-0">
                                <div class="card-body">
                                    <p class="mb-4">Total Lawyers Registered</p>
                                    <p class="fs-30 mb-2">
                                        <?php
                                        if($lawCountResult){
                                            echo $lawyerCount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue border-0">
                                <div class="card-body">
                                    <p class="mb-4">Total Customers Registered</p>
                                    <p class="fs-30 mb-2">
                                    <?php
                                        if($custCountResult){
                                            echo $custCount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 mb-4 stretch-card transparent">
                            <div class="card card-light-blue border-0">
                                <div class="card-body">
                                    <p class="mb-4">Number of Appointments</p>
                                    <p class="fs-30 mb-2">
                                    <?php
                                        if($appCountResult){
                                            echo $appCount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php
                 include_once "partials/_footer.php";
                ?>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>