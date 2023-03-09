<?php
include('database/connection.php');

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM student_acc WHERE id=$id") or die($mysqli->error);
    
    $row = $result->fetch_array();
    $email = $row['email'];
    $idNumber = $row['id_number'];
    $firstName = $row['first_name'];
    $middleName = $row['middle_name'];
    $lastName = $row['last_name'];
    $phoneNumber = $row['phone_number'];
    
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cPassword = $_POST['c-password'];
    $idNumber = $_POST['idNumber'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];

    if($password === $cPassword){

        $mysqli->query("UPDATE student_acc SET email='$email', password='$password', id_number='$idNumber', first_name='$firstName', middle_name='$middleName', last_name='$lastName', phone_number='$phoneNumber' WHERE id = $id");
        header('Location: approval.php');

    }
    else{
        
        header("Location:  accountSettings.php?error= Password doesn't Match");

    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account | Settings</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon Image-->
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
    <!--Cosutme style-->
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/screen.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;700&display=swap" rel="stylesheet">
    <!-- ajax -->
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
            <h2 class="active"> Account Update </h2>
            <!-- <h2 class="inactive underlineHover">Sign Up </h2> -->

            <!-- Icon -->

            <!-- Login Form -->
            <form action="accountSettings.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php if(isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php }?>
                <input type="number" id="login" class="fadeIn second" name="idNumber" placeholder="ID Number"
                    value="<?php echo $idNumber?>" required>
                <input type="text" id="login" class="fadeIn second" name="firstName" placeholder="First Name"
                    value="<?php echo $firstName?>" required>
                <input type="text" id="login" class="fadeIn second" name="middleName" placeholder="Middle Name"
                    value="<?php echo $middleName?> " required>
                <input type="text" id="login" class="fadeIn second" name="lastName" placeholder="Last Name"
                    value="<?php echo $lastName?>" required>
                <input type="number" id="login" class="fadeIn second" name="phoneNumber" placeholder="Phone Number"
                    value="<?php echo $phoneNumber?>" required>
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="Username"
                    value="<?php echo $email?>" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"
                    required>
                <input type="password" id="c-password" class="fadeIn third" name="c-password"
                    placeholder="Confirm Password">
                <button type="submit" class="fadeIn fourth btn" name="update"> Update</button>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
            </div>

        </div>
    </div>

    <!--=========================End of Container==========================-->


</body>

</html>