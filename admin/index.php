<?php
session_start();
if (isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
} else {
    header("location:login");
    die();
}
if ($_SESSION['login'] !== true) {
    header("location:login");
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
    <title>Suprimo</title>
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
    <link href="icon/favicon.ico" rel="shortcut icon">
    <!-- FontAwesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index"><img src="images/logo.png" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index"><img src="images/logo-mini.png" alt="logo" /></a>
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
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="logout">
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
                        <a class="nav-link" href="index">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/customers">
                            <i class="fa-solid fa-users menu-icon"></i>
                            <span class="menu-title">Customers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/lawyers">
                            <i class="fa-solid fa-user-tie menu-icon"></i>
                            <span class="menu-title">Lawyers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/appointments">
                            <i class="fa-solid fa-calendar-check menu-icon"></i>
                            <span class="menu-title">Appoinments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/adminProfile">
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
                        <div class="col-md-12 grid-margin ">
                            <div class="row justify-content-between align-items-center bg-white py-3 rounded-1 shadow-sm px-2   ">
                                <div class="col-10 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome <?php echo ucwords($_SESSION['fullname']); ?> </h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                                </div>
                                <div class="  col-md-2 mb-4 mb-xl-0">
                                    <a href='pages/adminProfile.php' class="btn btn-primary float-end">Profile Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-4 mb-4 stretch-card transparent">
                            <div class="card card-tale border-0">
                                <div class="card-body">
                                    <div class="d-flex fa-2x justify-content-between">
                                        <p class="mb-4 dse">Total Lawyers Registered</p>
                                        <i class="fa-solid fa-gavel"></i>
                                    </div>
                                    <p class="fs-30 mb-2">
                                        <?php
                                        if ($lawCountResult) {
                                            echo $lawyerCount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4 stretch-card transparent">
                            <div class="card card-tale border-0">
                                <div class="card-body">
                                    <div class="d-flex fa-2x justify-content-between">
                                        <p class="mb-4 dse">Total Customers Registered</p>
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <p class="fs-30 mb-2">
                                        <?php
                                        if ($custCountResult) {
                                            echo $custCount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 mb-4 stretch-card transparent">
                            <div class="card card-tale border-0">
                                <div class="card-body">
                                    <div class="d-flex fa-2x justify-content-between">
                                        <p class="mb-4 dse">Number of Appointments</p>
                                        <i class="fa-regular fa-calendar-check"></i>
                                    </div>
                                    <p class="fs-30 mb-2">
                                        <?php
                                        if ($appCountResult) {
                                            echo $appCount;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-3 rounded-1 shadow-sm px-2   ">
                        <div class="headingg2">
                            <h4 class="text-center">Contact Us List</h4>
                        </div>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        S.No
                                    </th>

                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Message
                                    </th>
                                    <th>
                                        Created At
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $selectContact = mysqli_query($conn, "select * from contact_us order by id DESC");
                                $i = 1;
                                if (mysqli_num_rows($selectContact) > 0) {
                                    while ($consts_row = mysqli_fetch_array($selectContact)) {

                                ?>
                                        <tr>
                                            <td>
                                                <?= $i ?>
                                            </td>
                                            <td>
                                                <?= $consts_row['name'] ?>
                                            </td>
                                            <td>
                                                <?= $consts_row['email'] ?>
                                            </td>
                                            <td>
                                                <?= $consts_row['phone'] ?>
                                            </td>
                                            <td>
                                                <?= $consts_row['message'] ?>
                                            </td>
                                            <td>
                                                <?= $consts_row['datetime'] ?>
                                            </td>
                                        </tr>
                                <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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