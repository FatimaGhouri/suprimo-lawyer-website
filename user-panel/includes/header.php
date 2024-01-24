<?php


echo '<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/images/logo.png" alt="" />
    </a>
  </div>
  <!-- End Logo -->
  <nav class="header-nav-items">
    <ul class="d-flex align-items-center">
      <li>
        <a href="index.php" class="active">Home</a>
      </li>
      <li>
        <a href="about.php">About</a>
      </li>
      <li>
        <a href="practice-area.php">Practice Area</a>
      </li>
      <li>
        <a href="attorneys.php">Attorneys</a>
      </li>
      <li>
        <a href="blog.php">News</a>
      </li>
      <li>
        <a href="contact.php">Contact</a>
      </li>
    </ul>
  </nav>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">
        <a
          class="nav-link nav-profile d-flex align-items-center pe-0"
          href="#"
          data-bs-toggle="dropdown"
        >
          <img
            src="assets/img/profile-img.jpg"
            alt="Profile"
            class="rounded-circle"
          />
          <span class="d-none d-md-block dropdown-toggle ps-2"
            >'.$custName.'</span
          > </a
        ><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>'.$custName.'</h6>
          </li>
          <li>
            <hr class="dropdown-divider" />
          </li>

          <li>
            <a
              class="dropdown-item d-flex align-items-center"
              href="users-profile.html"
            >
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li>
            <a
              class="dropdown-item d-flex align-items-center"
              href="logout.php"
            >
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>
        </ul>
        <!-- End Profile Dropdown Items -->
      </li>
      <!-- End Profile Nav -->
    </ul>
  </nav>
  <!-- End Icons Navigation -->
</header>
<!-- End Header -->
'; ?>