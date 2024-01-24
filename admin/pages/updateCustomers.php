<?php
session_start();
if($_SESSION['login']!==true){
    header("location:pages/samples/login.php");
    die();
}
require_once "config.php";
$errorMsg = false;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $getSql = "SELECT * FROM customers WHERE id = '$id'";
    $getResult = mysqli_query($conn, $getSql);
    if(mysqli_num_rows($getResult)>0){
        $row = mysqli_fetch_assoc($getResult);
        $fullname = $row['custName'];
        $email = $row['email'];
        $password = $row['password'];
        $contact = $row['contact'];
        $location = $row['location'];
    } 
    
}
if(isset($_POST['updateCustomer'])){
    $upFullname = $_POST['upFullname'];
    $upEmail = $_POST['upEmail'];
    $upPassword = $_POST['upPassword'];
    $upContact = $_POST['upContact'];
    $upLocation = $_POST['upLocation'];

    $updateSql = "UPDATE customers SET
                  custName = '$upFullname',
                  email = '$upEmail',
                  password = '$upPassword',
                  contact = '$upContact',
                  location = '$upLocation'
                  WHERE id = $id";
    
    $updateResult = mysqli_query($conn, $updateSql);
    if($updateResult){
        header("location:customers.php");
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
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-6 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <h4>Update Customer Data:</h4>
                                <form class="pt-3" method="post">
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
                                            id="exampleInputUsername1" placeholder="Full name" name="upFullname" value= "<?php echo $fullname;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                            placeholder="Email" name="upEmail" value= "<?php echo $email;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleInputPassword1" placeholder="Password" name="upPassword" value= "<?php echo $password;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control form-control-lg"
                                            id="exampleInputUsername1" placeholder="Contact Number" name="upContact" value= "<?php echo $contact;?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-lg text-secondary"
                                            id="exampleFormControlSelect2" name="upLocation"  required>
                                            <option selected value="<?php echo $location;?>">
                                                <?php echo $location;?></option>
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

                                    <div class="mt-3">
                                        <button
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                            name="updateCustomer">Click to Update</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Go back to <a href="../pages/customers.php" class="text-primary">customers
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