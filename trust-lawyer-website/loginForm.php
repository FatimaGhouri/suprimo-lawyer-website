<?php
require_once "config.php";
$errorMsg = false;
if(isset($_POST['loginCustomer'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $findCust = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $custResult = mysqli_query($conn, $findCust);

    if(mysqli_num_rows($custResult)>0){
        $row = mysqli_fetch_assoc($custResult);
        session_start();
        $_SESSION["id"]=$row["id"];
        $_SESSION["login"]=true;
        $_SESSION["userType"]="customer";
        header("location:index.php");
    } else {
        $errorMsg= "No such Record Found. Kindly submit valid credentials !";
    }

}
if(isset($_POST['loginLawyer'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $findLawyer = "SELECT * FROM lawyers WHERE email = '$email' AND password = '$password'";
    $lawyerResult = mysqli_query($conn, $findLawyer);

    if(mysqli_num_rows($lawyerResult)>0){
        $row = mysqli_fetch_assoc($lawyerResult);
        session_start();
        $_SESSION["id"]=$row["id"];
        $_SESSION["login"]=true;
        $_SESSION["userType"]="lawyer";
        header("location:index.php");
    } else {
        $errorMsg= "No such Record Found. Knidly submit valid credentials !";
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
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        } */

        /* .container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 100px 20px;
        } */

        /* .reg-container {
            height: 480px;
            width: 100%;
            max-width: 500px;
            align-items: center;
            display: flex;
            justify-content: center;
        } */
/* 
        .form-container {
            width: 100%;
            height: 100%;
            /* max-width: 600px; */
            /* background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        /* } */ 

        /* h2 {
            color: #cca776;
            text-align: center;
            margin-bottom: 15px;
        }

        label {
            color: #333333;
            font-weight: 300;
            font-size: 1.1em; */
        /* }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="radio"] {
            margin-right: 5px;
            cursor: pointer;
        } */
/* 
        button,
        input[type="submit"] {
            background-color: #cca776;
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: all 200ms ease-in;
        } */

/* 
        input[type="submit"]:hover {
            background-color: #b58e5f;
        } */

        /* #customerRadio {
            margin-top: 8px;
        } */

        /* p.signupShift {
            margin-top: 15px;
            margin-left: 4px;
            font-size: 13px;
        } */

        :root {
            --primary: #605DFF;
            --primary-dark: #4a00e0;
            --primary-light: #5DA8FF;
            --secondary: #1D1D1D;
            --social-background: #E9E9E9;
            --social-background-hover: #dddddd;
            --text: #1F2346;
            --white: #FFFFFF;
            --violet: #8a2de2;

        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-size: 16px;
            font-family: 'work sans', sans-serif;
            height: 100vh;
            padding: 1rem;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: #cca776;
            background: -webkit-linear-gradient(
                to right, #a18054,
                #cca776
            );
            background: linear-gradient(
                to right,  #a18054,
                #cca776
            );
        }

        /* .socials-row {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }
#a18054
#cca776
        .social-row{
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .social-row img{
            width: 24px;
            height: 24px;
        }

        .social-row>a {
            padding: 8px;
            border-radius: 99px;
            width: 100%;
            min-height: 48px;
            display: flex;
            gap: 12px;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 1.1rem;
            color: var(--text);
            padding: 8px;
            background-color: var(
                --social-background
            );
            font-weight: 700;
        } */

        .login-welcome-row{
               margin-bottom: 3rem;
               text-align: center;
        }

        .welcome-message{
            max-width: 360px;
        }

        .logo{
            height: 48px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .container{
            display: flex;
            flex-direction: column;
            justify-content: start;
            position: relative;
            gap: 1rem;
            background-color: var(--white);
            width: 100%;
            max-width: 32rem;
            padding: 3rem 2rem;
            border-radius: 2rem;
            height: fit-content;
        }

        .my-form__button{
            background-color: #cca776;
            color: white;
            white-space: nowrap;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 16px;
            line-height: 59px;
            outline: none;
            font-size: 18px;
            letter-spacing: .025em;
            text-decoration: none;
            cursor: pointer;
            font-weight: 800;
            min-height: 50px;
            width: 100%;
            border-radius: 99px;
            transition: all .3s ease;
            -webkit-transition: #b19269;
        }

        .my-form__button:hover {
            background-color: #b19269;
        }

        .input__wrapper{
            position: relative;
            padding: 15px 0 0;
            margin-bottom: 0.5rem;
        }

        .input_field {
            font-size: 1.5rem;
            color: var(--text);
            padding: 6px 0px;
            padding-right: 32px;
            padding-bottom: 8px;
            line-height: 2rem;
            height: 2rem;
            outline: 0px;
            border: 0px;
            width: 100%;
            vertical-align: middle;
            padding-bottom: 0.7rem;
            border-bottom: 3px solid var(--secondary);
            background: transparent;
            transition: border-color 0.2s;
        }

        .input_field::placeholder {
            color: transparent;
        }

        .input_label{
            user-select: none;
        }

        .input_field:placeholder-shown~.input_label {
            cursor: text;
            color: var(--text);
            top: 10.8rem;
            font-size: 1.2rem;
        }

        .input_label,
        .input_field:focus~.input_label {
            position: absolute;
            top: -0.8rem;
            display: block;
            font-size: 1.2rem;
            color: var(--text);
            transition: 0.3s;
        }

        .input_field:focus~.input_label {
            color: var(--primary);
        }

        .input_field:focus {
            border-bottom: 3px solid var(--primary);
        }

        .input_field:focus~svg {
            stroke: var(--primary);
        }
        .my-form__actions {
            display: flex;
            flex-direction: column;
            align-self: center;
            color: var(--secondary);
            gap: 16px;
            margin-top: 8px;
        }

        .my-form__actions a {
            color: var(--secondary);
            font-weight: 600;
            text-decoration: none;
        }

        .my-form__actions a:hover{
            text-decoration: underline;
        }

        .my-form__row {
            display: flex;
            gap: 5px;
            justify-content: center;
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
    <div class="container">
        <div class="reg-container" id="mainContainerId">
            <div class="form-container">
                <div id="formContent" class="form-content">
                    <form id="loginForm" method="POST">
                        <div class="form-panel-1" id="panel-one">
                            <div class="login-welcome-row">
                            <a href="#" title="Logo">
                            <img src='./images/logo/logo.png' alt="Logo" class="logo">
                            </a>
                            <h2>Welcome back &#x1F44F;</h2>
                            <p>Please enter your details!</p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <?php
                                    if($errorMsg){
                                        ?>
                            <div class="alert alert-danger d-flex align-items-center " role="alert">
                                <svg class="bi flex-shrink-0 me-3" width="24" height="24" role="img"
                                    aria-label="Danger:">
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
                                <input 
                                    type="email" id="email" name="email" class="input_field" class="form-control" 
                                    placeholder="Your Email" required
                                >
                                <label for="email" class="input_label">Email:</label>
                                <!-- svg -->
                            </div>

                            <div class="input_wrapper">
                                <input 
                                    type="password" id="password" name="password"  class="input_field" class="form-control"
                                    placeholder="Your Password" 
                                    title="Minimum 6 character at least 1 Alphabet and 1 Number"
                                    pattern="^(?=.*[A-Za-z]) (?=.*\d) [A-Za-z\d]{6,}$" required 
                                >
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

                            <button type="submit" class="my-form__button" id="loginBtn" value="Log In" name="loginCustomer">
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