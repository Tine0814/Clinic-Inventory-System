<?php
session_start();
include('database/connection.php');
include('./database/forgotpass.php');


if(isset($_SESSION["users"])){

    $users = $_SESSION["users"];
    if($users['usertype'] == "student"){
        header('Location: ./_student/studentHealthForm.php');
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log into Clinic | Verification</title>
    <link rel="stylesheet" href="./assets/css/login.css">
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
            <h2 class="active"> Verification Code </h2>
            <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->

            <!-- Icon -->

            <!-- Login Form -->
            <form action="verify.php" method="POST">
                <?php if(isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php }?>
                <input type="number" id="login" class="fadeIn second display-block" name="OTP"
                    placeholder="Enter Verification Code">

                <button type="submit" class="fadeIn fourth btn" name="verify"> Submit</button>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">

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