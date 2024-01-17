<?php
session_start();
if ($_SESSION['login'] !== true) {
    header("location:pages/samples/login.php");
    die();
}
require_once "config.php";
$errorMsg = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getSql = "SELECT * FROM lawyers WHERE id = '$id'";
    $getResult = mysqli_query($conn, $getSql);
    if (mysqli_num_rows($getResult) > 0) {
        $row = mysqli_fetch_assoc($getResult);
        $fullname = $row['fullname'];
        $email = $row['email'];
        $password = $row['password'];
        $contact = $row['contact'];
        $services = $row['services'];
        $location = $row['location'];
        $image = $row['image'];
        $description = $row['description'];
    }

}
if (isset($_POST['updateLawyer'])) {
    $upFullname = $_POST['upFullname'];
    $upEmail = $_POST['upEmail'];
    $upPassword = $_POST['upPassword'];
    $upContact = $_POST['upContact'];
    $upServices = $_POST['upServices'];
    $upLocation = $_POST['upLocation'];
    $upLawyerDesp = $_POST['upLawyerDesp'];
    $imgName = $_FILES['upLawyerImage']['name'];
    $tmp_name = $_FILES['upLawyerImage']['tmp_name'];

    function uploadImage($tmp_name, $imgName)
    {
        $targetDir = '../images/uploads/';
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
                mysqli_stmt_bind_param($stmt, "ssssssssi", $upFullname, $upEmail, $upPassword, $upContact, $upServices, $upLocation, $imgName, $upLawyerDesp, $id);
            } else {
                $errorMsg = "Got some issue in uploading image";
            }
        } else {
            mysqli_stmt_bind_param($stmt, "sssssssi", $upFullname, $upEmail, $upPassword, $upContact, $upServices, $upLocation, $upLawyerDesp, $id);
        }

        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("location: lawyers.php");
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
                        <div class="col-lg-6 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <h4>Update Lawyers Data:</h4>
                                <form class="pt-3" method="post" enctype="multipart/form-data">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
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
                                            <?php echo $errorMsg; ?>
                                        </div>
                                    </div>
                                    <?php
}
?>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Full name"
                                            name="upFullname" value="<?php echo $row['fullname']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" placeholder="Email"
                                            name="upEmail" value="<?php echo $row['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Password"
                                            name="upPassword" value="<?php echo $row['password']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control form-control-lg"
                                            placeholder="Contact Number" name="upContact"
                                            value="<?php echo $row['contact']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-lg text-secondary" name="upServices"
                                            required>
                                            <option selected value="<?php echo $row['services']; ?>">
                                                <?php echo $row['services']; ?></option>
                                            <option value="Legal Consultation and Advice">Legal Consultation and Advice
                                            </option>
                                            <option value="Contracts and Agreements">Contracts and Agreements</option>
                                            <option value="Litigation and Dispute Resolution">Litigation and Dispute
                                                Resolution</option>
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Family Matters">Family Matters</option>
                                            <option value="Estate Planning">Estate Planning</option>
                                            <option value="Business and Corporate Affairs">Business and Corporate
                                                Affairs</option>
                                            <option value="Employment Issues">Employment Issues</option>
                                            <option value="Intellectual Property (IP)">Intellectual Property (IP)
                                            </option>
                                            <option value="Immigration Assistance">Immigration Assistance</option>
                                            <option value="Criminal Defense">Criminal Defense</option>
                                            <option value="Affidavit">Affidavit</option>
                                            <option value="Divorce Law">Divorce Law</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-lg text-secondary" name="upLocation"
                                            required>
                                            <option selected value="<?php echo $row['location']; ?>">
                                                <?php echo $row['location']; ?></option>
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
                                    </div>
                                    <div class="form-group" id="preImageDiv" style="display:block">
                                        <label class="text-secondary fs-6">your Image:</label><br>
                                        <img src="../images/uploads/<?php echo $row['image']; ?>" alt="lawyer pic"
                                            width="100">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="keepImageCheckbox"
                                                value="yes">
                                            <label class="form-check-label text-secondary fs-6" for="flexCheckDefault">
                                                Want to upload the new image
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="newImageDiv" style="display:none">
                                        <label class="text-secondary fs-6">Upload your new Image:</label><br>
                                        <input type="file" class="form-control form-control-lg text-secondary"
                                            name="upLawyerImage">
                                        <script>
                                        document.getElementById('keepImageCheckbox').addEventListener('change',
                                            function() {
                                                let newImageDiv = document.getElementById('newImageDiv');
                                                let preImageDiv = document.getElementById('preImageDiv');
                                                newImageDiv.style.display = this.checked ? 'block' : 'none';
                                                preImageDiv.style.display = this.checked ? 'none' : 'block';
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group mb-5">
                                        <label class="text-secondary fs-6">Briefly describe your expertise and
                                            experience:</label>
                                        <textarea name="upLawyerDesp" class="form-control form-control-lg"
                                            required><?php echo $row['description']; ?></textarea>
                                    </div>

                                    <div class="mt-3">
                                        <button
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn fs-6 fw-bold"
                                            name="updateLawyer">Click to Update</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Go back to <a href="lawyers.php" class="text-primary">Lawyers
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