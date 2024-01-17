<?php
echo '    <nav class="header-nav ms-auto">
<ul class="d-flex align-items-center">

    <li class="nav-item dropdown pe-3" style="list-style: none;">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../admin-dashboard/template/images/uploads/' . $lawyerImage . '" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">' . $lawyerName . ' </span> </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6>' . $lawyerName . '</h6>
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
<h3>Welcome' . $lawyerName . '</h3>
</div><!-- End Page Title -->

<section class="section profile">
<div class="row">
    <div class="col-xl-4">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="../../admin-dashboard/template/images/uploads/' . $lawyerImage . '" alt="Profile" class="rounded-circle">
                <h2><?php echo $custName;?>
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

            </ul>
            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                        <div class="col-lg-9 col-md-8">' . $lawyerName . '</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">' . $lawyerEmail . '</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Password</div>
                        <div class="col-lg-9 col-md-8">' . $lawyerPassword . '</div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Contact</div>
                        <div class="col-lg-9 col-md-8">' . $lawyerContact . '</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Location</div>
                        <div class="col-lg-9 col-md-8">' . $lawyerLocation . '</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Service</div>
                        <div class="col-lg-9 col-md-8">' . $lawyerService . '</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Description</div>
                        <div class="col-lg-6 col-md-5" style="text-align: justify;">' . $lawyerDesp . '</div>
                    </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form method="post">

                        <!-- <div class="row mb-3">
      <label class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
      <div class="col-md-8 col-lg-9">
        <input name="userImage" type="file" class="form-control" id="fullName">
      </div>
    </div> -->

                        <div class="row mb-3" id="preImageDiv">
                            <label for="lawyerImage" class="col-md-4 col-lg-3 col-form-label">Your Image</label>
                            <div class="col-md-8 col-lg-9">
                                <img src="../../admin-dashboard/template/images/uploads/'. $lawyerImage. '" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="keepImageCheckbox" value="yes">
                                <label class="form-check-label text-secondary fs-6" for="flexCheckDefault">
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
                                    function () {
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
                                <input name="fullName" type="text" class="form-control" id="fullName"
                                    value="' . $lawyerName . '">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="username" type="email" class="form-control" id="company"
                                    value="' . $lawyerEmail . '">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Password</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="country" type="text" class="form-control" id="Country"
                                    value="' . $lawyerPassword . '">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="address" type="text" class="form-control" id="Address"
                                    value="' . $lawyerContact . '">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Location</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="text" class="form-control" id="Email"
                                    value="' . $lawyerLocation . '">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Service</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="text" class="form-control" id="Email"
                                    value="' . $lawyerService . '">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Description</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="updatedDesp" id="despTextarea"
                                    class="despTextarea form-control">' . $lawyerDesp . '</textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary col-lg-3" name="updateForm">Save
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