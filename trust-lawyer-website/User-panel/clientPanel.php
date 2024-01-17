<?php
echo '    <nav class="header-nav ms-auto">
<ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3" style="list-style: none;">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../images/male_dummy.png" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">'. $custName.' </span> </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6>'.$custName.'</h6>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="userpanel.php">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="logout.php">
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
<h3>Welcome'. $custName.'</h3>
</div><!-- End Page Title -->

<section class="section profile">
<div class="row">
    <div class="col-xl-4">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="../images/male_dummy.png" alt="Profile" class="rounded-circle">
                <h2><?php echo $custName;?></h2>
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

            </ul>
            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                        <div class="col-lg-9 col-md-8">'.$custName.'</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">'.$custEmail.'</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Password</div>
                        <div class="col-lg-9 col-md-8">'.$custPassword.'</div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Contact</div>
                        <div class="col-lg-9 col-md-8">'.$custContact.'</div>
                    </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form method="post">

                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                Name</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="upCustName" type="text" class="form-control" id="fullName"
                                    value="'.$custName.'">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="upEmail" type="email" class="form-control" id="email"
                                    value="'.$custEmail. '">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Password</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="upPassword" type="text" class="form-control" id="password"
                                    value="'.$custPassword.'">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="upContact" type="text" class="form-control" id="contact"
                                    value="'.$custContact.'">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="updateCustData">Save
                                Changes</button>
                        </div>
                    </form><!-- End Profile Edit Form -->

                </div>

            </div><!-- End Bordered Tabs -->

        </div>
    </div>

</div>
</div>
</section>

</main>';
?>
<?php
if(isset($_POST['updateCustData'])){
    $upCustName = $_POST['upCustName'];
    $upEmail = $_POST['upEmail'];
    $upPassword = $_POST['upPassword'];
    $upContact = $_POST['upContact'];

    $updateSql = "UPDATE customers SET
                  custName = '$upCustName',
                  email = '$upEmail',
                  password = '$upPassword',
                  contact = '$upContact' 
                  WHERE id = '$custId'";
    $updateResult = mysqli_query($conn, $updateSql);
    if($updateResult){
        echo " <script>window.location.href='userpanelMain.php'</script>";
    }else{
        echo "Got some issue in updating data";
    }

}
?>