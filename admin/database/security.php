<?php 

session_start();

if(isset($_SESSION["users"])){
    $users = $_SESSION["users"];
    
    if($users['usertype'] == "User"){
        header("location:../_user/dashboard");  
    }
}
else{
    header("location:../login");  
} 

if(isset($_SESSION["users"])){

    $users = $_SESSION["users"];
    if($users['usertype'] == "student"){
        header('Location: ../_student/studentHealthForm');
    }
    
}


?>