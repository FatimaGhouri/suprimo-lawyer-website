<?php
session_start();
if($_SESSION['login']!==true){
    header("location:pages/samples/login.php");
    die();
}
require_once "config.php";
$viewSql = "SELECT * FROM customers";
$result = mysqli_query($conn, $viewSql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .upper-box {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        align-items: center;
    }

    .upper-box-1 {
        width: 60%;
    }

    .upper-box-2 {
        width: 20%;
    }

    #searchQuery {
        background-image: url('../images/search.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 12px;
    }
    </style>
</head>

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
                                        <h2 class="mb-3">Customers Table</h2>
                                        <p class="fs-6">List of Registered Customers:</p>
                                        <div class="upper-box">
                                            <input type="text" class="upper-box-1" id="searchQuery"
                                                placeholder="Search for customers..">
                                            <a href="addCustomers.php" class="upper-box-2"><button type="button"
                                                    class="btn btn-info mt-3 mb-3">Add new Customers</button></a>
                                        </div>
                                        <table class="table table-striped" id="customerTable">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Fullname</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Contact Number</th>
                                                    <th>Location</th>
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
                                                    <td><?php echo $rows['custName'] ;?></td>
                                                    <td><?php echo $rows['email'] ;?></td>
                                                    <td><?php echo $rows['password'] ;?></td>
                                                    <td><?php echo $rows['contact'] ;?></td>
                                                    <td><?php echo $rows['location'] ;?></td>
                                                    <td>
                                                        <a href="updateCustomers.php?id=<?php echo $rows['id']; ?>"><button
                                                                type="button" class="btn btn-info">Update</button></a>
                                                        <a href="deleteCustomers.php?id=<?php echo $rows['id']; ?>"><button
                                                                type="button" class="btn btn-danger">Delete</button></a>
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
    <script>
    let delayTimer;
    document.getElementById('searchQuery').addEventListener('keyup', function(e) {
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            let searchQuery = document.getElementById('searchQuery').value.trim();
            search(searchQuery);
        }, 500);
    });

    function search(query) {
        fetch('searchCustomer.php?query=' + query)
            .then(response => response.text())
            .then(data => {
                document.getElementById('customerTable').innerHTML = data;
            })
            .catch(error => {
                console.log("Error: ", error);
            });
    }
    </script>

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