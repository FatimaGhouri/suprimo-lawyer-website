<?php
session_start();
if($_SESSION['login']!==true){
    header("location:pages/samples/login.php");
    die();
}
require_once "config.php";
$errorMsg = false;
if(isset($_POST['insertAdmin'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $imgName = $_FILES['adminImage']['name'];
    $tmp_name = $_FILES['adminImage']['tmp_name'];

    $emailCheckSql ="SELECT * FROM admins WHERE email = '$email'";
    $resultCheck = mysqli_query($conn, $emailCheckSql);
    if(mysqli_num_rows($resultCheck)>0){
        $errorMsg = "Email already in use. Please use a different email address";
    }else{
        if(move_uploaded_file($tmp_name,'../images/uploads/'.$imgName)){
            $sql = "INSERT INTO `admins` (`fullname`, `email`, `password`, `image`) VALUES ('$fullname', '$email', '$password', '$imgName')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo " <script>window.location.href='admins.php'</script>";
            }else{
                $errorMsg="Got some issue in adding an admin. Please Try Again";
            }
        }else{
            $errorMsg="Got some issue in uploading file. Please Try Again";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once "../partials/_header.php";
?>

<body>
    <div class="container-scroller">
        <!-- navbar partial -->
        <?php
                  include_once "../partials/_navbar.php";
                ?>
        <!-- page-body-wrapper start -->
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar partial-->
            <?php
                 include_once "../partials/_sidebar.php";
                ?>
            <!-- main-panel start -->
            <div class="main-panel">
                <!-- content-wrapper start -->
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-7 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <h4>Add New Admin:</h4>
                                <form class="pt-3" method="post" enctype="multipart/form-data">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </symbol>
                                    </svg>
                                    <?php
                                    if($errorMsg){
                                        ?>
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                            aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <div>
                                            <?php echo $errorMsg; ?>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg"
                                        placeholder="Full name" name="fullname" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg"
                                        placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg"
                                        placeholder="Password" name="password" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label class="text-secondary fs-6">Select your Image:</label>
                                        <input type="file" class="form-control form-control-lg text-secondary"
                                        name="adminImage" required>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <button
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn fs-6 fw-bold"
                                            name="insertAdmin">Click to Insert</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Go back to <a href="admins.php" class="text-primary">Admins
                                            table</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- footer partial -->
                <?php
                 include_once "../partials/_footer.php";
                ?>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller ends-->

    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../js/dashboard.js"></script>
    <script src="../js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>