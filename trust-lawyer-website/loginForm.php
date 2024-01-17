<?php
require_once "config.php";
$errorMsg = false;
if (isset($_POST['loginCustomer'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $findCust = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $custResult = mysqli_query($conn, $findCust);

    if (mysqli_num_rows($custResult) > 0) {
        $row = mysqli_fetch_assoc($custResult);
        session_start();
        $_SESSION["id"] = $row["id"];
        $_SESSION["login"] = true;
        $_SESSION["userType"] = "customer";
        header("location:index.php");
    } else {
        $errorMsg = "No such Record Found. Kindly submit valid credentials !";
    }
}
if (isset($_POST['loginLawyer'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $findLawyer = "SELECT * FROM lawyers WHERE email = '$email' AND password = '$password'";
    $lawyerResult = mysqli_query($conn, $findLawyer);

    if (mysqli_num_rows($lawyerResult) > 0) {
        $row = mysqli_fetch_assoc($lawyerResult);
        session_start();
        $_SESSION["id"] = $row["id"];
        $_SESSION["login"] = true;
        $_SESSION["userType"] = "lawyer";
        header("location:index.php");
    } else {
        $errorMsg = "No such Record Found. Knidly submit valid credentials !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        form#loginForm {
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
            const loginBtn = document.getElementById('loginBtn');
            loginBtn.name = "loginLawyer";
        }

        function custBtnChange() {
            const loginBtn = document.getElementById('loginBtn');
            loginBtn.name = "loginCustomer";
        }
    </script>
</head>

<body>

    <div class="reg-container"> <!-- Large image container -->
        <div class="image-container">
            <div class="auth-ovrlay">
                <!-- <h2>Welcome To Suprimo</h2> -->
                <img src='./images/logo/logo.png' />
            </div>
            <img src="images/attorneys/reg-form-pic.jpg" alt="Large Image" />
        </div>
        <!-- Form container -->
        <div class="form-container d-flex align-items-center w-100">
            <div id="formContent" class="form-content w-100 h-100">
                <!-- Common form panel for both customers and lawyers -->
                <form id="loginForm" method="POST">
                    <div class="form-panel-1" id="panel-one">
                        <div class="login-welcome-row">

                            <h2>Login</h2>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <?php
                        if ($errorMsg) {
                        ?>
                            <div class="alert alert-danger d-flex align-items-center " role="alert">
                                <svg class="bi flex-shrink-0 me-3" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <?php echo $errorMsg; ?>
                                    <script>
                                        let regContainer = document.getElementById('mainContainerId');
                                        regContainer.style.height = "550px";
                                    </script>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                        <div class="input_wrapper">
                            <input type="email" id="email" name="email" class="input_field" class="form-control" placeholder="Your Email" required>
                            <label for="email" class="input_label">Email:</label>
                            <!-- svg -->
                        </div>

                        <div class="input_wrapper">
                            <input type="password" id="password" name="password" class="input_field" class="form-control" placeholder="Your Password" title="Minimum 6 character at least 1 Alphabet and 1 Number" pattern="^(?=.*[A-Za-z]) (?=.*\d) [A-Za-z\d]{6,}$" required>
                            <label for="password" class="input_label">Password:</label>
                            <!-- svg -->
                        </div>

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

                        <!-- <label><input type="radio" id="customerRadio" class="m-0" name="userType" value="customer"
                                    onclick="custBtnChange()" checked />
                                Client</label><br />
                            <label><input type="radio" id="lawyerRadio" class="m-0" name="userType" value="lawyer"
                                    onclick="lawBtnChange()" />
                                Lawyer</label><br /><br /> -->

                        <button type="submit" class="my-form__button w-100 rounded-1 py-2" id="loginBtn" value="Log In" name="loginCustomer">
                            Login
                        </button>

                        <div class="my-form__actions">
                            <div class="my-form__row">
                                <span>Don't have an account?</span>
                                <a href="registrationForm.php" title="Create Account">SignUp</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        function lawBtnChange() {
            let loginBtn = document.getElementById('loginBtn');
            loginBtn.name = "loginLawyer";

        }

        function custBtnChange() {
            let loginBtn = document.getElementById('loginBtn');
            loginBtn.name = "loginCustomer";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>