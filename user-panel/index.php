<?php
if (isset($_SESSION['userType']) && $_SESSION['userType'] === "lawyer") {
    header('location:lawyerPanel');
} else if (isset($_SESSION['userType']) && $_SESSION['userType'] === "lawyer") {
    header('location:clientPanel');
} else {
    header('location:/login');
}
