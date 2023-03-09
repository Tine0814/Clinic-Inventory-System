<?php
session_start();
include('database/connection.php');

if(isset($_SESSION["users"])){

    $users = $_SESSION["users"];
    if($users['usertype'] == "student"){
        header('Location: ./_student/studentHealthForm');
    }
    
}

// $secret = "6LeEpnckAAAAAH46Lcwe36v46RfQ84CDbTmghROQ";
//   $response = $_POST['g-recaptcha-response'];
//   $remoteip = $_SERVER['REMOTE_ADDR'];
//   $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
//   $data = file_get_contents($url);
//   $row = json_decode($data, true);
    
//   if ($row['success'] == "true") {
//     echo "<script>alert('Wow you are not a robot 😲');</script>";
//   } else {
//     echo "<script>alert('Oops you are a robot 😡');</script>";
//   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log into Clinic | Clinic</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Clinic | Home </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon Image-->
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
    <!--Cosutme style-->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/screen.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<style>
.error {
    background: #F2DEDE;
    color: #a94442;
    padding: 12px;
    width: 100%;
    text-align: center;
    border-radius: 5px;
    margin: 20px auto;
    visibility: visible;
}
</style>

<body>


    <!-- <div class="nav">
        <div class="container nav__container">
            <a href="./index.php" class="nav_logo">Cli<span class="nav_logo_span">Nic</span></a>
        </div>
    </div> -->
    <!-- =========================End of Nav========================== -->

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="inactive underlineHover"> <a href="login">Admin</a> </h2>
            <h2 class="active"> Student </h2>
            <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->

            <!-- Icon -->

            <!-- Login Form -->
            <form action="loadingStud" method="POST">
                <?php if(isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php }?>
                <input type="email" id="login" class="fadeIn second display-block" name="email" placeholder="Email">
                <input type="password" id="password" class="fadeIn third display-block" name="password"
                    placeholder="Password">
                <div class="fadeIn third">
                    <input type="checkbox" id="togglePassword"> Show Password
                </div>

                <div class="g-recaptcha fadeIn third"
                    style=" display: flex; justify-content: center; margin-top: 1rem; "
                    data-sitekey="6LeEpnckAAAAAK9yEVM7lbJLBB2Yfbqh8ZeiZCyk" required></div>

                <!-- <input type="submit" class="fadeIn fourth" value="Log In"> -->
                <button type="submit" class="fadeIn fourth btn"> Sign In</button>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="signup">Sign Up</a>
                <div>or</div>
                <a class="underlineHover" href="forgot">Forgot Password</a>

            </div>

        </div>
    </div>

    <!--=========================End of Container==========================-->


    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    </script>
</body>

</html>