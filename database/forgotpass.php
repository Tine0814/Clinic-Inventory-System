<?php

if(isset($_POST['check'])){

    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    
    $emailCheck = $mysqli->query("SELECT * FROM student_acc WHERE email ='$email'") or die($mysqli->error);

    if($emailCheck){
        if(mysqli_num_rows($emailCheck) > 0){
            $code = rand(999999, 111111);
            $msgVer = "Email Verification Code";
            $message = "Your verification Code is $code";

            $update = "UPDATE student_acc SET code = $code WHERE email ='$email'";
            $updateResult = mysqli_query($mysqli, $update);

            if($updateResult){



                $url = "https://script.google.com/macros/s/AKfycbxNgcOcQByt1e16vUk_gavAgjEOTlvhTAE5DtdOSRgaGRImDTZLse7elucZmiGtWKKQcQ/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_POSTFIELDS => http_build_query([
                        "recipient" => $email,
                        "subject"   => $msgVer,
                        "body"      => $message
                    ])
                ]);
                $result = curl_exec($ch);
                // echo $result;

                header('location: verify');
            }else{
                $errors['db_errors'] = 'Failed while inserting data into database!';

            }

        }else{
            header("Location:  forgot.php?error= Email Not Exists");
        }
    }   

}

if(isset($_POST['verify'])){

    $otp = mysqli_real_escape_string($mysqli, $_POST['OTP']);

    $result = $mysqli->query("SELECT * FROM student_acc WHERE code ='$otp'") or die($mysqli->error);

    if($result){
        if(mysqli_num_rows($result) > 0){
            // $code = 0;
            // $update = "UPDATE student_acc SET code = '$code'";
            header("location: newPass");
        }else{
            header("Location:  verify?error= Invalid Verification Code");
        }
    }
}


if(isset($_POST['save'])){
    $password =  ($_POST['password']);
    $cPassword =  ($_POST['c-password']);

    if(strlen(trim($_POST['password']))<=8){
                
        header("Location:  newPass?error= Password should be at least 8 character!");
    }else{

        if($password === $cPassword){
    
            $email = $_SESSION['email'];
            $code = 0;

            $updatePass = "UPDATE student_acc SET password = '$password', code = '$code' WHERE email = '$email'";
            $updateRun = mysqli_query($mysqli, $updatePass);
            session_destroy();
            header('Location: loginStudent');
    
        }
        else{
            
            header("Location:  newPass?error= Password doesn't Match");
    
        }

    }    
}
?>