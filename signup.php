<?php
session_start();
include('database/connection.php');

if(isset($_SESSION["users"])){

    $users = $_SESSION["users"];
    if($users['usertype'] == "student"){
        header('Location: ./_student/studentHealthForm');
    }
    
}
$random = rand(11111111, 99999999);

if(isset($_POST['save'])){
    $email = $_POST['email'];
    $password =  ($_POST['password']);
    $cPassword =  ($_POST['c-password']);
    $idNumber = $_POST['idNumber'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $captcha = $_POST['captcha'];
    $ccaptcha = $_POST['captcha-c'];


    $result = $mysqli->query("SELECT * FROM student_acc WHERE email ='$email'") or die($mysqli->error);
    $result2 = $mysqli->query("SELECT * FROM student_acc WHERE id_number ='$idNumber'") or die($mysqli->error);
        
    $data= mysqli_num_rows($result);
    $data2= mysqli_num_rows($result2);
    if($data>0){
        
        header("Location:  signup?error= Email Already Exists");
    }else{

        if($data2>0){
            header("Location:  signup?error= ID Number Already Exists");
        }else{

            if(strlen($password)<=8){
                
                header("Location:  signup?error= Password should be at least 8 character!");
            }else{
        
                if($captcha === $ccaptcha){
                    if($password === $cPassword){
                
                        $mysqli->query("INSERT INTO student_acc (email, password, id_number, first_name, middle_name, last_name, phone_number) VALUES('$email', '$password', '$idNumber','$firstName','$middleName','$lastName', '$phoneNumber' )") or die($mysqli->error);
                        header('Location: loginStudent');
                
                    }
                    else{
                        
                        header("Location:  signup?error= Password doesn't Match");
                
                    }
                }
                else{
                    header("Location:  signup?error= Captcha doesn't Match");
                }
        
            }    
        }
    

    }    



}

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
    <!--Cosutme style-->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/screen.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;700&display=swap" rel="stylesheet">
    <!-- ajax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


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



    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Signup </h2>
            <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->

            <!-- Icon -->

            <!-- Login Form -->
            <form action="signup.php" method="POST">
                <?php if(isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php }?>
                <input type="number" id="login" class="fadeIn second" name="idNumber" placeholder="ID Number" required>
                <input type="text" id="login" class="fadeIn second" name="firstName" placeholder="First Name" required>
                <input type="text" id="login" class="fadeIn second" name="middleName" placeholder="Middle Name"
                    required>
                <input type="text" id="login" class="fadeIn second" name="lastName" placeholder="Last Name" required>
                <input type="tel" pattern="[0-9]{3}[0-9]{2}[0-9]{3}[0-9]{3}" id="login" class="fadeIn second"
                    name="phoneNumber" placeholder="Phone Number" required>
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"
                    required>
                <input type="password" id="c-password" class="fadeIn third" name="c-password"
                    placeholder="Confirm Password">
                <div class="fadeIn third">
                    <input type="checkbox" id="togglePassword"> Show Password
                </div>
                <input type="text" id="captcha" class="fadeIn third" name="captcha" placeholder="Enter Captcha"
                    required>
                <div class="fadeIn third">
                    <label for="" style="color: #966eb8;" class="fadeIn third">Your Captcha</label>
                </div>
                <input type="hidden" id="captcha_1" class="fadeIn third" name="captcha-c" value="<?php echo $random?>">
                <h1 class="fadeIn third">
                    <?php echo $random?>
                </h1>
                <button type="submit" class="fadeIn fourth btn" name="save"> Sign up</button>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="loginStudent">click here to Sign in</a>
            </div>

        </div>
    </div>

    <!--=========================End of Container==========================-->
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const cpassword = document.querySelector('#c-password');
    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        const type2 = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        cpassword.setAttribute('type', type2);
        // toggle the eye slash icon
    });
    </script>

</body>

</html>