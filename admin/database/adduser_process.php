<?php

    require_once 'connection.php';


    $update = false;
    $name = '';
    $username = '';
    $password = '';
    $usertype = '';


    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];

        
        $mysqli->query("INSERT INTO users (name, password, username, usertype) VALUES('$name', '$password', '$username', '$usertype')") or die($mysqli->error);
        
        $_SESSION['message'] = "Record Has Been saved!";
        $_SESSION['msg_type'] = "success";

        header("location: ../adduser");
    }
    
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error);
        
        $_SESSION['message'] = "Record Has Been Deleted!";
        $_SESSION['msg_type'] = "danger";

        header("location: ../adduser");
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $mysqli->query("DELETE FROM student_acc WHERE id=$id") or die($mysqli->error);
        
        $_SESSION['message'] = "Record Has Been Deleted!";
        $_SESSION['msg_type'] = "danger";

        header("location: ../adduser");
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM users WHERE id=$id") or die($mysqli->error);
        
        $row = $result->fetch_array();
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];
        $usertype = $row['usertype'];
        
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];

        $mysqli->query("UPDATE users SET name='$name', username='$username', password='$password', usertype='$usertype' WHERE id = $id");

        header("location: ../adduser");
    }


?>