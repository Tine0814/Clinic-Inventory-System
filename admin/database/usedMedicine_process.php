<?php


  require_once 'connection.php';


  $id = 0;
 


if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM medicine_form WHERE id=$id") or die($mysqli->error);

}


if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $section = $_POST['section'];
  $medicine = $_POST['medicine'];
  $reason = $_POST['reason'];
  $date = $_POST['date'];
  
  $mysqli->query("INSERT INTO medicine_form (name, section, medicine, reason, date) VALUES('$name', '$section', '$medicine', '$reason', '$date')") or die($mysqli->error);
  
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $result = $mysqli->query("SELECT * FROM medicine_form WHERE id=$id") or die($mysqli->error);
  
  $row = $result->fetch_array();
  $name = $row['name'];
  $section = $row['section'];
  $medicine = $row['medicine'];
  $reason = $row['reason'];
  $quantity = $row['quantity_'];
  $date = $row['date'];

  
}

?>