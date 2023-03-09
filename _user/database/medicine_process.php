<?php


  require_once 'connection.php';


  $id = 0;
  $name = '';
  $expiration = '';
  $quantity = 0;
  $stocks =false;


if(isset($_POST['save'])){
  $name = $_POST['name'];
  $expiration = $_POST['expiration'];
  $quantity = $_POST['quantity'];
  
  $mysqli->query("INSERT INTO medicine (name, expiration, quantity) VALUES('$name', '$expiration', '$quantity')") or die($mysqli->error);
  
  // header("location: medicine.php");
}

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM medicine WHERE id=$id") or die($mysqli->error);

  // header("location: medicine.php");
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $result = $mysqli->query("SELECT * FROM medicine LEFT JOIN tblproduct ON medicine.name = tblproduct.name_ WHERE medicine.id=$id") or die($mysqli->error);

  $row = $result->fetch_array();
  $name = $row['name'];
  $expiration = $row['expiration'];
  $quantity = $row['quantity'];
  $code = $row['code'];
  $image = $row['image'];
  $details = $row['details'];



}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $expiration = $_POST['expiration'];
  $quantity = $_POST['quantity'];

  $mysqli->query("UPDATE medicine SET name='$name', expiration='$expiration', quantity='$quantity' WHERE id = $id");

}

  
if(isset($_POST['quantity'])){
  $id = $_POST['id'];
  $quantity = $_POST['quantity'];

  
  $mysqli->query("UPDATE medicine SET quantity='$quantity' WHERE id = $id");


}

if(isset($_GET['change'])){
  $stocks =true;

  $id = $_GET['change'];
  $result = $mysqli->query("SELECT * FROM medicine WHERE id=$id") or die($mysqli->error);

  $row = $result->fetch_array();
  $quantity = $row['quantity'];
}

// if(isset($_POST['submit'])){
//   $name = $_POST['name'];
//   $section = $_POST['section'];
//   $medicine = $_POST['medicine'];
//   $reason = $_POST['reason'];
//   $date = $_POST['date'];
  
//   $mysqli->query("INSERT INTO medicine_form (name, section, medicine, reason, date) VALUES('$name', '$section', '$medicine', '$reason', '$date')") or die($mysqli->error);
  
// }







if(isset($_POST['used'])){
  $id = $_POST['id'];
  $quantity = $_POST['quantity'];
  $stocks = $_POST['stocks'];
  $total = $stocks - $quantity;
  
  
  $mysqli->query("UPDATE medicine SET quantity='$total' WHERE id = $id");


  $name = $_POST['name'];
  $medName = $_POST['medName'];
  $section = $_POST['section'];
  $reason = $_POST['reason'];
  $date = $_POST['date'];
  $year = $_POST['year'];
  $month = $_POST['month'];
  
  $mysqli->query("INSERT INTO medicine_form (name, section, medicine, quantity_, reason, date, new_date, month) VALUES('$name', '$section', '$medName', '$quantity', '$reason', '$date', '$year', '$month')") or die($mysqli->error);


  
  

  // $result = $mysqli->query("SELECT * FROM med_report WHERE date = '$date'") or die($mysqli->error);

  // while($row = $result->fetch_array()){
  //   $medName_ = $row['med_name'];
  //   $quantity_ = $row['quantity'];
  //   $date_ = $row['date'];
  // }

  // if($medName == $medName_ ){

    
  //   $total_ = $quantity_ + $quantity;
    
  //   $mysqli->query("UPDATE med_report SET quantity='$total_' WHERE med_name = '$medName'");
  //   header("location: usedMedicine.php");
    
  // }
  // else{

    

  //   $mysqli->query("INSERT INTO med_report (med_name, quantity, date) VALUES('$medName', '$quantity', '$date')") or die($mysqli->error);
    header("location: usedMedicine");
  // }



}

?>