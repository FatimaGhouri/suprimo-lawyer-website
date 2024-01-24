<?php
require_once "config.php";
if (isset($_POST['registerCustomer'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $contact = $_POST['contact'];
  $location = $_POST['location'];

  $regCust = "INSERT INTO customers(custName, email, password, contact, location)VALUES ('$fullname','$email','$password','$contact','$location')";

  $resultCust = mysqli_query($conn, $regCust);

  if ($resultCust) {
    header("location:login");
  } else {
    echo ("got some issue in registerin customer");
  }
}
if (isset($_POST['registerLawyer'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $contact = $_POST['contact'];
  $location = $_POST['location'];
  $service = $_POST['service'];
  $description = $_POST['description'];
  $imgName = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];

  $stmt = mysqli_stmt_init($conn);

  $regLawyer = "INSERT INTO lawyers(fullname, email, password, contact, services, location, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $targetDir = '../admin-dashboard/template/images/uploads/';
  $targetFile = $targetDir . basename($imgName);
  if (move_uploaded_file($tmp_name, $targetFile)) {
    if (mysqli_stmt_prepare($stmt, $regLawyer)) {
      mysqli_stmt_bind_param($stmt, "ssssssss", $fullname, $email, $password, $contact, $service, $location, $imgName, $description);
      mysqli_stmt_execute($stmt);

      if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("location:login");
      } else {
        echo "got issue";
      }
    } else {
      echo "Error in preparing the statement.";
    }
  } else {
    echo "Error in uploading image";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Registration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f3f3f3;
    }

    .form-container {
      overflow: hidden;
    }

    .form-content {
      /* display: flex; */
      position: relative;
      transition: transform 0.3s ease-in-out;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 50px 20px;
    }

    .reg-container {
      height: 100vh;
      width: 100%;
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .form-container {
      width: 80%;
      height: 100%;
      max-width: 600px;
      background-color: #ffffff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #cca776;
      text-align: center;
      margin-bottom: 15px;
    }

    label {
      color: #333333;
      font-weight: 300;
      font-size: 1.1em;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="submit"],
    input[type="button"],
    textarea,
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="radio"] {
      margin-right: 5px;
      cursor: pointer;
    }

    button,
    input[type="submit"],
    input[type="button"] {
      background-color: #cca776;
      color: #ffffff;
      border: none;
      cursor: pointer;
      transition: all 200ms ease-in;
    }

    input[type="button"].backBtn {
      background-color: #c1bbb3;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: all 200ms ease-in;
    }

    input[type="submit"]:hover {
      background-color: #b58e5f;
    }

    input[type="button"]:hover {
      background-color: #b58e5f;
    }

    input[type="button"].backBtn:hover {
      background-color: #b4afa9;
    }

    .image-container {
      width: 100%;
      height: 100%;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    img {
      width: 100%;
      height: 100%;
      display: block;
      object-fit: cover;
    }

    /* p {
      text-align: center;
    } */

    #customerRadio {
      margin-top: 20px;
    }

    .form-panel-1 {
      position: relative;
    }

    .form-panel-2 {
      position: absolute;
      width: 100%;
      transform: translateX(-120%);
    }

    .form-panel-2 p {
      margin-top: 18px;
      margin-bottom: 35px;
      text-align: center;
    }

    .regBtns {
      display: flex;
      justify-content: space-between;
    }

    .regBtns input {
      width: 48%;
    }

    p.loginShift {
      margin-top: 8px;
      margin-left: 3px;
      font-size: 13px;
    }

    .auth-ovrlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: linear-gradient(45deg, #cca776b0, #12111152);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .auth-ovrlay img {
      width: 300px;
      height: fit-content;
      background: aliceblue;
      padding: 12px;
    }

    .auth-ovrlay h2 {
      color: #ffffff;
    }

    form#signup {
      margin: auto;
      display: flex;
      width: 100%;
      position: relative;
      height: 100%;
      flex-direction: column;
      justify-content: center;
    }

    @media (max-width:767px) {
      .image-container {
        width: 100%;
        height: 100%;
        text-align: center;
        display: none;
      }
    }
  </style>
  <script>
    function lawBtnChange() {
      let firstBtn = document.getElementById("firstBtn");
      firstBtn.value = "Next";
      firstBtn.name = "regLawyerChange";
      firstBtn.type = "button";
    }

    function custBtnChange() {
      let firstBtn = document.getElementById("firstBtn");
      firstBtn.value = "Submit";
      firstBtn.name = "registerCustomer";
      firstBtn.type = "submit";
    }

    function toggleForm(element) {   
    const userType = document.querySelector('input[name="userType"]:checked').value;
    const formPanel1 = document.getElementById("panel-one");
    const formPanel2 = document.getElementById("panel-two");

    const nextButton = document.getElementById("nextButton");

    const fullname = document.getElementById("fullname");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const contact = document.getElementById("contact");
    const location = document.getElementById("location");

    if (element.value == 'Next') {  
        if (fullname.value == '' || email.value == '' || password.value == '' || contact.value == '' || location.value == '') {
            alert('Fill the fields');
        } else {
            if (userType === "lawyer") {
                formPanel2.style.transform = "translateX(0)";
                formPanel1.style.display = "none";
            }
        }
    }
}

    function goBack() {
      const formPanel1 = document.getElementById("panel-one");
      const formPanel2 = document.getElementById("panel-two");
      formPanel1.style.display = "block";
      formPanel2.style.transform = "translateX(-120%)";
    }

    function showSecondPanel() {
      const formContent = document.getElementById("formContent");
      formContent.style.transform = "translateX(-200%)";
    }

    function submitForm() {
      document.getElementById("signup").submit();
    }
  </script>
</head>

<body>

  <div class="reg-container"> <!-- Large image container -->
    <div class="image-container">
      <div class="auth-ovrlay">
        <!-- <h2>Welcome To Suprimo</h2> -->
        <!-- <img src='./images/logo/logo.png' /> -->
      </div>
      <img src="images/attorneys/reg-form-pic.jpg" alt="Large Image" />
    </div>
    <!-- Form container -->
    <div class="form-container d-flex align-items-center w-100">
      <div id="formContent" class="form-content w-100 h-100">
        <!-- Common form panel for both customers and lawyers -->
        <form id="signup" method="POST" enctype="multipart/form-data">
          <div class="form-panel-1" id="panel-one">
            <img src="./images/logo/logo.png" style=" width: 50%; height: 45px; margin-top: 40px; margin-left: 130px; margin-bottom:30px; ">
            <h2>Registration Form</h2>
            <!-- Common inputs for both -->
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" class="form-control" required /><br />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required /><br />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required /><br />

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" class="form-control" required /><br />

            <label for="location">Location:</label>
            <select class="form-select" name="location" id='location' required>
              <option disabled selected value="">Select a location</option>
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
                <option value="Khyber Pakhtunkhwa">
                  Khyber Pakhtunkhwa
                </option>
                <option value="Balochistan">Balochistan</option>
                <option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
                <option value="Azad Jammu & Kashmir">
                  Azad Jammu & Kashmir
                </option>
              </optgroup>
            </select>
            <div class="row my-4 align-items-center justify-content-center">
              <label class="d-inline w-auto">
                <input type="radio" id="customerRadio" class="m-0" name="userType" value="customer" onclick="custBtnChange()" checked />
                Client
              </label>
              <label class="d-inline w-auto">
                <input type="radio" id="lawyerRadio" class="m-0" name="userType" value="lawyer" onclick="lawBtnChange()" />
                Lawyer
              </label>
            </div>
            <input type="submit" id="firstBtn" value="Submit" name="registerCustomer" onclick="toggleForm(this)" />
            <p class="loginShift">Already have an account? <a href="login">LogIn</a></p>

          </div>

          <div class="form-panel-2" id="panel-two">
            <img src="./images/logo/logo.png" style=" width: 50%; height: 45px; margin-top: 40px; margin-left: 130px; margin-bottom:30px; ">
            <h2>Additional Information</h2>
            <p>
              As you are proceeding with your lawyer registration, please
              provide additional necessary information for the process.
            </p>

            <!-- Additional inputs for lawyers -->
            <label for="services">Services:</label>
            <select id="services" name="service" class="form-select">
              <option disabled selected value="">Select a Services</option>
              <option value="Legal Consultation and Advice">
                Legal Consultation and Advice
              </option>
              <option value="Contracts and Agreements">
                Contracts and Agreements
              </option>
              <option value="Litigation and Dispute Resolution">
                Litigation and Dispute Resolution
              </option>
              <option value="Real Estate">Real Estate</option>
              <option value="Family Matters">Family Matters</option>
              <option value="Estate Planning">Estate Planning</option>
              <option value="Business and Corporate Affairs">
                Business and Corporate Affairs
              </option>
              <option value="Employment Issues">Employment Issues</option>
              <option value="Intellectual Property (IP)">
                Intellectual Property (IP)
              </option>
              <option value="Immigration Assistance">
                Immigration Assistance
              </option>
              <option value="Criminal Defense">Criminal Defense</option>
              <option value="Affidavit">Affidavit</option>
              <option value="Divorce Law">Divorce Law</option>
            </select><br />

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" class="form-control" /><br />

            <label for="description">Description:</label><br />
            <textarea id="description" name="description" rows="4" cols="30" class="form-control"></textarea><br />

            <!-- Back and Submit buttons for lawyers -->
            <div class="regBtns">
              <input type="button" class="backBtn" onclick="goBack()" value="Back" />
              <input type="submit" value="Submit" name="registerLawyer" />
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>