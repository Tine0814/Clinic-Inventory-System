<?php

    require_once 'connection.php';


    $idNumber = '';
    $approve = 'no';
    $approval = false;
    $update = false;
    $edit = false;
    $firstName = '';
    $middleName = '';
    $lastName = '';
    $section = '';
    $dateOfBirth = '';
    $address = '';
    $phoneNumber = '';
    $email = '';
    $height = '';
    $weight = '';
    $bloodPressure ='';
    $schoolYear ='';
    // $year = '';


   
    

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $edit = true;
        $result = $mysqli->query("SELECT * FROM health_records WHERE id=$id") or die($mysqli->error);
        
        $row = $result->fetch_array();
        $idNumber = $row['id_number'];
        $approve = $row['approved'];
        $firstName = $row['first_name'];
        $middleName = $row['middle_name'];
        $lastName = $row['last_name'];
        $section = $row['section'];
        $dateOfBirth = $row['date_birth'];
        $address = $row['address'];
        $phoneNumber = $row['phone_number'];
        $email = $row['email'];
        $height = $row['height'];
        $weight = $row['weight'];
        $bloodPressure = $row['blood_pressure'];
        $schoolYear = $row['school_year'];

        
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $idNumber = $_POST['idNumber'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $section = $_POST['section'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $bloodPressure = $_POST['bloodPressure'];
        

        $mysqli->query("UPDATE health_records SET id_number='$idNumber', first_name ='$firstName', middle_name ='$middleName', last_name ='$lastName', section ='$section', date_birth ='$dateOfBirth', address='$address', phone_number='$phoneNumber', email='$email', height='$height', weight='$weight', blood_pressure='$bloodPressure' WHERE id = $id");

        header("location: ./approval");
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM health_records WHERE id=$id") or die($mysqli->error);
    }

    // approve


    if(isset($_GET['approve'])){
        $id = $_GET['approve'];
        $approval = true;
        $result = $mysqli->query("SELECT * FROM health_records WHERE id=$id") or die($mysqli->error);
        
        $row = $result->fetch_array();
        $idNumber = $row['id_number'];
        $approve = $row['approved'];
        $firstName = $row['first_name'];
        $middleName = $row['middle_name'];
        $lastName = $row['last_name'];
        $section = $row['section'];
        $dateOfBirth = $row['date_birth'];
        $address = $row['address'];
        $phoneNumber = $row['phone_number'];
        $email = $row['email'];
        $height = $row['height'];
        $weight = $row['weight'];
        $bloodPressure = $row['blood_pressure'];
        
    }



?>