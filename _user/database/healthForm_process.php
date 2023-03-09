<?php

    require_once 'connection.php';


    $idNumber = '';
    $approve = 'no';
    $approval = false;
    $update = false;
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
    $bloodPressure= '';


   
    

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
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
        

        $mysqli->query("UPDATE health_records SET id_number='$idNumber', first_name ='$firstName', middle_name ='$middleName', last_name ='$lastName', section ='$section', date_birth ='$dateOfBirth', address='$address', phone_number='$phoneNumber', email='$email', height='$height', weight='$weight' , blood_pressure='$bloodPressure' WHERE id = $id");

        header("location: ./healthRecords.php");
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

    // if(isset($_POST['approved'])){
    //     $id = $_POST['id'];
    //     $approved = 'yes';
    //     $mysqli->query("UPDATE health_records SET approved='$approved' WHERE id = $id");

    //     // header("location: ./healthRecords.php");
    // }
    if(isset($_POST['approved'])){
        $id = $_POST['id'];
        $approved = 'yes';

        date_default_timezone_set('Asia/manila');
        $dateApproved = date('20y-m-d');

        $url = "https://script.google.com/macros/s/AKfycbxNgcOcQByt1e16vUk_gavAgjEOTlvhTAE5DtdOSRgaGRImDTZLse7elucZmiGtWKKQcQ/exec";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_POSTFIELDS => http_build_query([
              "recipient" => $_POST['email'],
              "subject"   => $_POST['subject'],
              "body"      => $_POST['body']
           ])
        ]);
        $result = curl_exec($ch);
        echo $result;

        $mysqli->query("UPDATE health_records SET approved='$approved', date_approved='$dateApproved'WHERE id = $id");
         header("location: ./healthRecords");
     }

     if(isset($_POST['decline'])){
        $id = $_POST['id'];

        date_default_timezone_set('Asia/manila');

        $url = "https://script.google.com/macros/s/AKfycbxNgcOcQByt1e16vUk_gavAgjEOTlvhTAE5DtdOSRgaGRImDTZLse7elucZmiGtWKKQcQ/exec";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_POSTFIELDS => http_build_query([
              "recipient" => $_POST['email2'],
              "subject"   => $_POST['subject2'],
              "body"      => $_POST['body2']
           ])
        ]);
        $result = curl_exec($ch);
        echo $result;

        $mysqli->query("DELETE FROM health_records WHERE id=$id") or die($mysqli->error);

         header("location: ./approval");
     }

?>