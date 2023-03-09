<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Richwell College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">



    <style>
    @import url("https://fonts.googleapis.com/css2?family=Hind&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200&display=swap");

    html {
        scroll-behavior: smooth;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .background-transparent {
        background: #966eb8;
        width: 100%;
        height: 100vh;
        opacity: 0.5;
        position: absolute;
    }


    .banner {
        width: 100%;
        height: 100vh;
        background-size: cover;
        background-position: center;
    }

    .navbar-container {
        width: 100%;
        height: fit-content;
        position: fixed;
        z-index: 999;

    }

    .navbar {
        width: 80%;
        margin: auto;
        justify-content: space-between;
        align-items: center;
        display: flex;

    }

    .logo {
        width: 65px;
        pointer-events: none;

    }


    .navbar ul li {
        list-style: none;
        display: inline-block;
        margin: 0 20px;
        position: relative;
    }

    .navbar ul li a {
        text-decoration: none;
        color: black;
        text-transform: uppercase;
        font-size: 15px;
        font-weight: 500;
    }

    .navbar ul li::after {
        content: "";
        height: 3px;
        width: 0;
        background: #ffc107;
        position: absolute;
        left: 0;
        bottom: -10px;
        transition: 0.5s;
    }

    .navbar ul li:hover::after {
        width: 100%;
    }

    /* nav class using scroll javaScrip*/

    .windows-scrolled {
        background: #966eb8;
        box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.3);
    }

    .windows-scrolled ul li a {
        color: white;
    }

    .windows-scrolled a:hover {
        color: var(--color-bg-3);
    }

    .content {
        width: 100%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        color: black;
    }

    .content h1,
    span {
        font-size: 70px;
        margin-top: 80px;
        color: black;
        font-weight: 900;
    }

    .content p {
        margin: 20px auto;
        font-weight: 400;
        line-height: 25px;
    }

    .content button {
        width: 200px;
        padding: 15px 0;
        text-align: center;
        margin: 20px 10px;
        border-radius: 25px;
        font-weight: bolder;
        border: 2px solid #ffc107;
        background: #966eb8;
        color: white;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .span {
        background: #966eb8;
        height: 100%;
        width: 0;
        border-radius: 25px;
        position: absolute;
        transition: 0.5s;
        left: 0;
        bottom: 0;
        z-index: -1;
    }




    .content button:hover {
        opacity: 0.8;
    }

    .display-flex {
        display: flex;
        justify-content: center;
    }

    /* footer */
    .footer-basic {
        padding: 40px 0;
        background-color: #ffffff;
        color: #4b4c4d;
    }

    .footer-basic ul {
        padding: 0;
        list-style: none;
        text-align: center;
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .footer-basic li {
        padding: 0 10px;
    }

    .footer-basic ul a {
        color: inherit;
        text-decoration: none;
        opacity: 0.8;
    }

    .footer-basic ul a:hover {
        opacity: 1;
    }

    .footer-basic .social {
        text-align: center;
        padding-bottom: 25px;
    }

    .footer-basic .social>a {
        font-size: 24px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        display: inline-block;
        text-align: center;
        border-radius: 50%;
        border: 1px solid #ccc;
        margin: 0 8px;
        color: inherit;
        opacity: 0.75;
    }

    .footer-basic .social>a:hover {
        opacity: 0.9;
        color: #966eb8;
    }

    .footer-basic .copyright {
        margin-top: 15px;
        text-align: center;
        font-size: 13px;
        color: #aaa;
        margin-bottom: 0;
    }

    .navbar ul li:hover ul {
        display: block;
    }

    .navbar ul li ul {
        position: absolute;
        left: 0;
        top: 20px;
        display: none;
        padding: 0;

    }

    .navbar ul li ul li {
        padding: 6px 0;
        background: #ffffff;
        height: 25px;
        line-height: 25px;
        width: 100%;

    }

    .video {
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: -1;
        width: 100%;
        opacity: .9;
        height: min-content;
    }

    @media(min-aspect-ratio: 16/0) {
        .video {
            width: 100%;
            height: auto;
        }
    }

    @media(max-aspect-ratio: 16/0) {
        .video {
            width: 100%;
            height: auto;
        }
    }

    /* contact us */

    .background {
        display: flex;
        min-height: 100vh;
        background: #ddd;
    }

    .container {
        flex: 0 1 700px;
        margin: auto;
        padding: 10px;
    }

    .screen {
        position: relative;
        background: #3e3e3e;
        border-radius: 15px;
    }

    .screen:after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 20px;
        right: 20px;
        bottom: 0;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
        z-index: -1;
    }

    .screen-header {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        background: #4d4d4f;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .screen-header-left {
        margin-right: auto;
    }

    .screen-header-button {
        display: inline-block;
        width: 8px;
        height: 8px;
        margin-right: 3px;
        border-radius: 8px;
        background: white;
    }

    .screen-header-button.close {
        background: #ed1c6f;
    }

    .screen-header-button.maximize {
        background: #e8e925;
    }

    .screen-header-button.minimize {
        background: #74c54f;
    }

    .screen-header-right {
        display: flex;
    }

    .screen-header-ellipsis {
        width: 3px;
        height: 3px;
        margin-left: 2px;
        border-radius: 8px;
        background: #999;
    }

    .screen-body {
        display: flex;
    }

    .screen-body-item {
        flex: 1;
        padding: 50px;
    }

    .screen-body-item.left {
        display: flex;
        flex-direction: column;
    }

    .app-title {
        display: flex;
        flex-direction: column;
        position: relative;
        color: #966eb8;
        font-size: 26px;
    }

    .app-title:after {
        content: '';
        display: block;
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 25px;
        height: 4px;
        background: #966eb8;
    }

    .app-contact {
        margin-top: auto;
        font-size: 8px;
        color: #888;
    }

    .app-form-group {
        margin-bottom: 15px;
    }

    .app-form-group.message {
        margin-top: 40px;
    }

    .app-form-group.buttons {
        margin-bottom: 0;
        text-align: right;
    }

    .app-form-control {
        width: 100%;
        padding: 10px 0;
        background: none;
        border: none;
        border-bottom: 1px solid #666;
        color: #ddd;
        font-size: 14px;
        text-transform: uppercase;
        outline: none;
        transition: border-color .2s;
    }

    .app-form-control::placeholder {
        color: #666;
    }

    .app-form-control:focus {
        border-bottom-color: #ddd;
    }

    .app-form-button {
        background: none;
        border: none;
        color: #966eb8;
        font-size: 14px;
        cursor: pointer;
        outline: none;
    }

    .app-form-button:hover {
        color: white;
    }


    .dribbble {
        width: 20px;
        height: 20px;
        margin: 0 5px;
    }

    @media screen and (max-width: 520px) {
        .screen-body {
            flex-direction: column;
        }

        .screen-body-item.left {
            margin-bottom: 30px;
        }

        .app-title {
            flex-direction: row;
        }

        .app-title span {
            margin-right: 12px;
        }

        .app-title:after {
            display: none;
        }
    }

    @media screen and (max-width: 600px) {
        .screen-body {
            padding: 40px;
        }

        .screen-body-item {
            padding: 0;
        }
    }
    </style>
</head>

<body>
    <video autoplay loop muted plays-inline class="video">
        <source src="./image/richwell.mp4">
    </video>
    <div class="background-transparent">

    </div>

    <div class="banner">
        <div class="navbar-container">
            <div class="navbar">
                <img src="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png" alt="" class="logo" />
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#section2">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="login">Login</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="display-flex">
                <h1 class="multi-text"></h1>
            </div>
            <p> Welcome to Clinic Department</p>
            <div class="display-flex">
                <form action="./signup">
                    <button type="submit"><span class="span"></span> SIGN UP</button>
                </form>
                <form action="https://www.youtube.com/watch?v=hPr-Yc92qaY&t=1s">
                    <button type="submit"><span class="span"></span> SUBSCRIBE</button>
                </form>
            </div>
        </div>
    </div>

    <div class="background" id="contact">
        <div class="container">
            <div class="screen">

                <div class="screen-body">
                    <div class="screen-body-item left">
                        <div class="app-title">
                            <h3>CONTACT</h3>
                            <h3>US</h3>
                        </div>
                        <div class="app-contact">CONTACT INFO : (044) 760 3945</div>
                    </div>
                    <div class="screen-body-item">
                        <div class="app-form">
                            <div class="app-form-group">
                                <input class="app-form-control" placeholder="NAME" value="">
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" placeholder="EMAIL">
                            </div>
                            <div class="app-form-group">
                                <input class="app-form-control" placeholder="CONTACT NO">
                            </div>
                            <div class="app-form-group message">
                                <input class="app-form-control" placeholder="MESSAGE">
                            </div>
                            <div class="app-form-group buttons">
                                <button class="app-form-button">CANCEL</button>
                                <button class="app-form-button">SEND</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i
                        class="icon ion-social-snapchat"></i></a><a href="#"><i
                        class="icon ion-social-twitter"></i></a><a href="https://www.facebook.com/richwellcolleges"><i
                        class="icon ion-social-facebook"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">Richwell College © 2023</p>
        </footer>
    </div>
    <script>
    window.addEventListener('scroll', () => {
        document.querySelector('.navbar-container').classList.toggle('windows-scrolled', window.scrollY > 0);
    })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
    var typingEffect = new Typed(".multi-text", {
        strings: ["Hello!", "Richwell", "Students", "Teachers"],
        loop: true,
        typeSpeed: 120,
        backSpeed: 80,
        backDelay: 1500
    })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>