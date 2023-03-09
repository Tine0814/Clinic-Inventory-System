<?php

    require_once "connection.php";

    $id = 0;
    $name = '';
    $quantity = 0;
    $disposable = '';


    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $disposable = $_POST['disposable'];

        $mysqli->query("INSERT INTO equipment (name, quantity, disposable) VALUES('$name', '$quantity', '$disposable')") or die($mysqli->error);


    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM equipment WHERE id=$id") or die($mysqli->error);
    
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $result = $mysqli->query("SELECT * FROM equipment LEFT JOIN tblequipmentproduct ON equipment.name = tblequipmentproduct.name_  WHERE equipment.id=$id") or die($mysqli->error);

        $row = $result->fetch_array();
        $name = $row['name'];
        $image = $row['image'];
        $quantity = $row['quantity'];
        $details = $row['details'];
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $disposable = $_POST['disposable'];

        $mysqli->query("UPDATE equipment SET name='$name', quantity='$quantity', disposable='$disposable' WHERE id = $id");

    }

    if(isset($_POST['used'])){
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $stocks = $_POST['stocks'];
        $total = $stocks - $quantity;

        if($total == 0){
            $mysqli->query("DELETE FROM equipment WHERE id=$id") or die($mysqli->error);
            header("location: equipment");

        }else{

            $mysqli->query("UPDATE equipment SET quantity='$total' WHERE id = $id");
            header("location: equipment");
        }
        
        

    }


?>