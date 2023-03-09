<?php 

session_start();

if(isset($_SESSION["users"])){

    $users = $_SESSION["users"];
    if($users['usertype'] == "Admin"){
        header('Location: ../admin/dashboard');
    }
    elseif($users['usertype'] == "User"){
        header('Location: ../_user/dashboard');
    }
} 
else{
    header("location:../loginStudent.php");  
} 


?>