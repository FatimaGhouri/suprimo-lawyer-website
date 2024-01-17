<?php
session_start();
if($_SESSION['login']!==true){
    header("location:pages/samples/login.php");
    die();
}
require_once "config.php";
$viewSql = "SELECT * FROM admins";
$result = mysqli_query($conn, $viewSql);
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
                <div class="row">
                        <div class="col-md-12 stretch-card">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h2 class="mb-3">Admins Table</h2>
                                        <p class="fs-6">List of all Admins:</p>
                                        <a href="addAdmins.php"><button type="button"
                                                class="btn btn-info mt-3 mb-3">Add new Admins</button></a>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Fullname</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                           if(mysqli_num_rows($result)>0){
                                           while($rows=mysqli_fetch_assoc($result)){
                                           ?>
                                                <tr>
                                                    <td><?php echo $rows['id'] ;?></td>
                                                    <td><?php echo $rows['fullname'] ;?></td>
                                                    <td><?php echo $rows['email'] ;?></td>
                                                    <td><?php echo $rows['password'] ;?></td>
                                                    <td><img src="../images/uploads/<?php echo $rows['image'];?>" alt="admin pic" height="200"></td>
                                                    <td>
                                                        <a href="updateAdmins.php?id=<?php echo $rows['id']; ?>"><button type="button"
                                                                class="btn btn-info">Update</button></a>
                                                        <a href="deleteAdmins.php?id=<?php echo $rows['id']; ?>"><button type="button"
                                                                class="btn btn-danger">Delete</button></a>
                                                    </td>

                                                </tr>

                                                <?php
                                             }
                                            }
                                            ?>
                                            </tbody>
                                     

                                        </table>
                                    </div>
                                </div>
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