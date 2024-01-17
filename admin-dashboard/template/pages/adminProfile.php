<?php
session_start();
if($_SESSION['login']!==true){
    header("location:pages/samples/login.php");
    die();
}
require_once "config.php";
$adminId = $_SESSION['id'];
$searchSql = "SELECT * FROM admins WHERE id = '$adminId'";
$resultSql = mysqli_query($conn, $searchSql);
if(mysqli_num_rows($resultSql)>0){
    $row = mysqli_fetch_assoc($resultSql);
    $fullname = $row['fullname'];
    $email = $row['email'];
    $password = $row['password'];
    $image = $row['image'];
}
if(isset($_POST['updateAdmin'])){
    $upFullname = $_POST['upFullname'];
    $upEmail = $_POST['upEmail'];
    $upPassword = $_POST['upPassword'];
    $imgName = $_FILES['upAdminImage']['name'];
    $tmp_name = $_FILES['upAdminImage']['tmp_name'];

    $updateSql = "UPDATE admins SET
    fullname = '$upFullname',
    email = '$upEmail',
    password = '$upPassword'";

    if($imgName !== ''){
        if(move_uploaded_file($tmp_name,'../images/uploads/'.$imgName)){
            $updateSql .= ",image = '$imgName'";
        }else{
            $errorMsg ="Got some issue in uploading image";
        }
    }
        $updateSql .= "WHERE id = '$adminId'";
    
        $updateResult = mysqli_query($conn, $updateSql);
        if($updateResult){
            header("location:adminProfile.php");
        }else{
            $errorMsg ="Got some issue in updating data";
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
                <div class="content-wrapper">
                    <section class="section profile">
                        <div class="row">
                            <div class="col-xl-4">

                                <div class="card">
                                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                        <img src="../images/uploads/<?php echo $image;?>" alt="Profile" width="200px"
                                            class="rounded-circle">
                                        <h2><?php echo ucwords($_SESSION['fullname']);?></h2>
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
                                                <button class="nav-link" data-bs-toggle="tab"
                                                    data-bs-target="#profile-edit">Edit Profile</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content pt-2">

                                            <div class="tab-pane fade show active profile-overview"
                                                id="profile-overview">
                                                <h5 class="card-title">About</h5>
                                                <p class="small">Sunt est soluta temporibus accusantium neque
                                                    nam maiores cumque temporibus. Tempora libero non est unde veniam
                                                    est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet
                                                    perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                                <h5 class="card-title">Profile Details</h5>

                                                <div class="row mb-3">
                                                    <div class="col-lg-3 col-md-4 label "> Full Name : </div>
                                                    <div class="col-lg-9 col-md-8 fst-italic">
                                                        <?php echo $fullname;?></div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-3 col-md-4 label">Email :</div>
                                                    <div class="col-lg-9 col-md-8 fst-italic">
                                                        <?php echo $email;?></div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-lg-3 col-md-4 label">Paswword :</div>
                                                    <div class="col-lg-9 col-md-8 fst-italic">
                                                        <?php echo $password;?></div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                                <!-- Profile Edit Form -->
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="row mb-3" id="preImageDiv">
                                                        <label class="col-md-4 col-lg-3 col-form-label">Profile
                                                            Image</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <img src="../images/uploads/<?php echo $image;?>"
                                                                alt="Profile" width="200px">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-5 form-check  ps-5">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="keepImageCheckbox" value="yes">
                                                        <label
                                                            class="form-check-label text-secondary fs-6 col-md-8 col-lg-9">
                                                            Want to upload the new image
                                                        </label>
                                                    </div>
                                                    <div class="row mb-3" id="newImageDiv" style="display:none">
                                                        <label class="col-md-4 col-lg-3 col-form-label">Upload
                                                            Image:</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input type="file" class="form-control" name="upAdminImage">
                                                        </div>
                                                        <script>
                                                        document.getElementById('keepImageCheckbox').addEventListener(
                                                            'change',
                                                            function() {
                                                                let newImageDiv = document.getElementById(
                                                                    'newImageDiv');
                                                                let preImageDiv = document.getElementById(
                                                                    'preImageDiv');
                                                                newImageDiv.style.display = this.checked ? 'flex' :
                                                                    'none';
                                                                preImageDiv.style.display = this.checked ? 'none' :
                                                                    'flex';
                                                            });
                                                        </script>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-lg-3 col-form-label">Full
                                                            Name</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="upFullname" type="text" class="form-control"
                                                                id="fullName" value="<?php echo $fullname;?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="upEmail" type="email" class="form-control"
                                                                id="email" value="<?php echo $email;?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-md-4 col-lg-3 col-form-label">Password</label>
                                                        <div class="col-md-8 col-lg-9">
                                                            <input name="upPassword" type="text" class="form-control" id="Job"
                                                                value="<?php echo $password;?>">
                                                        </div>
                                                    </div>

                                                    <div class="text-center mt-5">
                                                        <button class="btn btn-primary btn-md font-weight-medium fs-6 "
                                                            name="updateAdmin">Click to Update</button>
                                                    </div>
                                                </form><!-- End Profile Edit Form -->

                                            </div>
                                        </div><!-- End Bordered Tabs -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
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