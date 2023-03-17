<?php
//start session.
session_start();
if(isset($_SESSION['users'])) header('location: Admin/dashboard.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Landing Page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon Image-->
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/main.css">

    <style>
    body {
        background-color: #ddd;
    }

    div {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        font-size: 30px;
    }

    @keyframes arrows {

        0%,
        100% {
            color: black;
            transform: translateY(0);
        }

        50% {
            color: #3AB493;
            transform: translateY(20px);
        }
    }

    span {
        --delay: 0s;
        animation: arrows 1s var(--delay) infinite ease-in;
    }
    </style>
</head>

<body>
    <div>

        <span>↓</span>
        <span style="--delay: 0.1s">↓</span>
        <span style="--delay: 0.3s">↓</span>
        <span style="--delay: 0.4s">↓</span>
        <span style="--delay: 0.5s">↓</span>

    </div>
</body>
<script>
setTimeout(function() {
    window.location.href = 'landingPage'; // the redirect goes here

}, 3000); // 5 seconds
</script>

</html>
