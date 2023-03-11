<?php 
//start session
require_once './database/medicine_process.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Medicine</title>
    <?php include ("partials/styleLink.php");?>
</head>
<style>
html {
    scroll-behavior: smooth;
}


/* form */
.form-style-1 {
    margin: 10px auto;
    max-width: 400px;
    padding: 20px 12px 10px 20px;
    font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    background: #ddd;
}

.form-style-1 li {
    padding: 0;
    display: block;
    list-style: none;
    margin: 10px 0 0 0;
}

.form-style-1 label {
    margin: 0 0 3px 0;
    padding: 0px;
    display: block;
    font-weight: bold;
}

.form-style-1 input[type=text],
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea,
select {
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border: 1px solid #BEBEBE;
    padding: 7px;
    margin: 0px;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
}

.form-style-1 input[type=text]:focus,
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus,
.form-style-1 select:focus {
    -moz-box-shadow: 0 0 8px #674188;
    -webkit-box-shadow: 0 0 8px #674188;
    box-shadow: 0 0 8px #674188;
    border: 1px solid #674188;
}

.form-style-1 .field-divided {
    width: 49%;
}

.form-style-1 .field-long {
    width: 100%;
}

.form-style-1 .field-select {
    width: 100%;
}

.form-style-1 .field-textarea {
    height: 100px;
}

.form-style-1 input[type=submit],
.form-style-1 input[type=button] {
    background: #674188;
    padding: 8px 15px 8px 15px;
    border: none;
    color: #fff;
}

.form-style-1 input[type=submit]:hover,
.form-style-1 input[type=button]:hover {
    background: #4691A4;
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
}

.form-style-1 .required {
    color: red;
}
</style>

<body>
    <div class="container">
        <!--===========================================SIDEBAR===============================================-->
        <?php include ("partials/sidebar.php"); ?>


        <!--=========================================== MAIN===============================================-->
        <div class="main">
            <!-- ======================================TOPBAR =============================================-->
            <div class="topbar_container">
                <div class="topbar">
                    <div class="toggle">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="title_page">
                        <h1>Medicine<span>Stocks</span></h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CONTENT=============================================-->
            <div class="details details_gridunset">
                <!--==================================== TABLE MEDICINE =========================================-->

                <?php 
                  $result = $mysqli->query("SELECT * FROM medicine LEFT JOIN tblproduct ON medicine.name = tblproduct.name_ ORDER BY name");
                ?>
                <div>
                    <a href="#" id="btn_modal" class="btn_modal modal1"><i class="fa-solid fa-plus"></i> ADD</a>
                    <a href="#" id="btn_modal2" class="btn_modal modal1" style="margin-left: 5px;"><i
                            class="fa-solid fa-plus"></i> ADD NEW
                        DATA</a>
                </div>


                <div class="data_information data_table" style="max-height: 40rem;">
                    <div class="card_header">
                        <h2>Medicine</h2>
                        <form action="medicine" method="POST">
                            <button type="submit" name="red"><i class="fa-solid fa-circle"
                                    style="color:red; cursor:pointer;"></i></button>
                            <button type="submit" name="blue"><i class="fa-solid fa-circle"
                                    style="color:blue; cursor:pointer;"></i></button>
                            <button type="submit" name="black"><i class="fa-solid fa-circle"
                                    style="cursor:pointer;"></i></button>
                        </form>
                        <a href="./usedMedicine" id="btn_modal" class="btn_modal btn_request"><i
                                class="fa-solid fa-file"></i> RECORDS</a>
                        <a href="med_cart/index" id="btn_modal" class="btn_modal btn_request"><i
                                class="fa-solid fa-code-pull-request"></i> REQUEST</a>

                    </div>
                    <div>

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Expiration</td>
                                <td>Stocks</td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>


                        <tbody class="med_row">
                            <?php 
                        if (isset($_POST['red'])) {



                            $sql = "SELECT * FROM medicine LEFT JOIN tblproduct ON medicine.name = tblproduct.name_ WHERE medicine.quantity <= 10 ORDER BY name";

                            $result = mysqli_query($mysqli,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $quantity = $row['quantity'];
                                        $ids = $row['id'];
                                        $image = $row['image'];

                                        ?>
                            <tr>

                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td><a href="medicineGet.php?edit=<?php echo $row['id']; ?>"
                                        style="color:red; text-decoration: none;"><?php echo $row['name']; ?></a>
                                </td>
                                <td style="color: red;"><?php echo $row['expiration']; ?></td>
                                <td style="color: red;"><?php echo $row['quantity']; ?></td>



                                <td>
                                    <a href="./medicineGet?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="medicine?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a>
                                </td>
                            </tr>


                            <?php
                                        }
                                    }
                                
                    }
                    elseif (isset($_POST['blue'])){

                        $sql = "SELECT * FROM medicine LEFT JOIN tblproduct ON medicine.name = tblproduct.name_ WHERE medicine.quantity <= 25 AND medicine.quantity > 10 ORDER BY name";

                            $result = mysqli_query($mysqli,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $quantity = $row['quantity'];
                                        $ids = $row['id'];
                                        $image = $row['image'];

                                        ?>
                            <tr>

                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="30px" height="30px" style="border-radius: 50%;" alt=""></td>
                                <td><a style="color:blue; text-decoration: none;"
                                        href="medicineGet.php?edit=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                </td>
                                <td style="color:blue;"><?php echo $row['expiration']; ?></td>
                                <td style="color:blue;"><?php echo $row['quantity']; ?></td>



                                <td>
                                    <a href="./medicineGet?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="medicine?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a>
                            </tr>


                            <?php
                                        }
                                    }
                    }
                    elseif (isset($_POST['black'])){

                        $sql = "SELECT * FROM medicine LEFT JOIN tblproduct ON medicine.name = tblproduct.name_ WHERE medicine.quantity > 25 AND medicine.quantity > 10 ORDER BY name";

                            $result = mysqli_query($mysqli,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $quantity = $row['quantity'];
                                        $ids = $row['id'];
                                        $image = $row['image'];

                                        ?>
                            <tr>

                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="30px" height="30px" style="border-radius: 50%;" alt=""></td>
                                <td><a style="text-decoration: none; color: black"
                                        href="medicineGet.php?edit=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                </td>
                                <td><?php echo $row['expiration']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>



                                <td>
                                    <a href="./medicineGet?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="medicine?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a>
                                </td>
                            </tr>


                            <?php
                                        }
                                    }
                    }else{
                        $result = $mysqli->query("SELECT * FROM medicine LEFT JOIN tblproduct ON medicine.name = tblproduct.name_ ORDER BY name");

                        while($row = $result->fetch_assoc()){
                            $quantity = $row['quantity'];
                                $ids = $row['id'];
                                $image = $row['image'];
                                ?>

                            <tr>










                                <?php if($quantity <= 10):?>
                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td><a href="medicineGet.php?edit=<?php echo $row['id']; ?>"
                                        style="color:red; text-decoration: none;"><?php echo $row['name']; ?></a>
                                </td>
                                <td style="color: red;"><?php echo $row['expiration']; ?></td>
                                <td style="color: red;"><?php echo $row['quantity']; ?></td>










                                <?php elseif($quantity <= 25):?>
                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="30px" height="30px" style="border-radius: 50%;" alt=""></td>
                                <td><a style="color:blue; text-decoration: none;"
                                        href="medicineGet.php?edit=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                </td>
                                <td style="color:blue;"><?php echo $row['expiration']; ?></td>
                                <td style="color:blue;"><?php echo $row['quantity']; ?></td>





                                <?php else:?>

                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="30px" height="30px" style="border-radius: 50%;" alt=""></td>
                                <td><a style="text-decoration: none; color: black"
                                        href="medicineGet.php?edit=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                                </td>
                                <td><?php echo $row['expiration']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>

                                <?php endif?>




                                <td>
                                    <a href="./medicineGet?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="medicine?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                        ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--======================================== FORM/MODAL=========================================-->
    <div class="bg_modal">
        <div class="add_form">
            <div class="close">+</div>
            <form action="medicine" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h1>Medicine</h1>
                <!-- <select name="name">
                    <option value="">--Select Product--</option>
                    <option value="Amlodipine 10mg">Amlodipine 10mg</option>
                    <option value="Anti-biotic Ointment">Anti-biotic Ointment</option>
                    <option value="Bandaid">Bandaid</option>
                    <option value="Buscopan 10mg Tab">Buscopan 10mg Tab</option>
                    <option value="Cetirizine 10mg Tab">Cetirizine 10mg Tab</option>
                    <option value="Chlorphenamine Maleate 4mg Tab">Chlorphenamine Maleate 4mg Tab</option>
                    <option value="Eugeniol Drop 1.2mg">Eugeniol Drop 1.2mg</option>
                    <option value="Eyemo (Blue) 15 mg">Eyemo (Blue) 15 mg</option>
                    <option value="Eyemo (Red) 15 mg">Eyemo (Red) 15 mg</option>
                    <option value="Katinko">Katinko</option>
                    <option value="Kremil-S Tab 30 mg">Kremil-S Tab 30 mg</option>
                    <option value="Loperamide 2mg Cap">Loperamide 2mg Cap</option>
                    <option value="Mefenamic Acid 500mg">Mefenamic Acid 500mg</option>
                    <option value="Neozep(Non-drowsy)10mg/500mg Tab">Neozep(Non-drowsy)10mg/500mg Tab</option>
                    <option value="Paracetamol 500mg Tab">Paracetamol 500mg Tab</option>
                    <option value="Plasil 10mg Tab">Plasil 10mg Tab</option>
                    <option value="Serc 8mg Tab">Serc 8mg Tab</option>
                    <option value="Ventolin Neb 1mg/ml">Ventolin Neb 1mg/ml</option>
                    <option value="Vicks Vaporub">Vicks Vaporub</option>
                </select> -->

                <select name="name">
                    <option value=''>--Select Product--</option>

                    <?php
              $selectDb = $mysqli->query("SELECT name_ FROM tblproduct ORDER BY name_");
            
          ?>
                    <?php
            while($rows = $selectDb->fetch_assoc()){
              $name= $rows['name_'];
              echo "<option value='$name'>$name</option>";
            }
          ?>
                </select>
                <input type="date" name="expiration" placeholder="Expiration">
                <input type="number" name="quantity" placeholder="Quantity">
                <button type="submit" class="btn_form" name="save">SAVE</button>
            </form>
        </div>
    </div>
    <!-- ####################################################################################################### -->







    <!--======================================== FORM/MODAL NEW DATA=========================================-->
    <div class="bg_modal2">
        <div class="add_form">
            <div class="close2">+</div>
            <form action="medicine" method="POST" enctype="multipart/form-data">
                <h1>Medicine</h1>




                <?php

$phpFileUploadErrors = array(
    0 => 'Successfully uploaded',
    1 => 'the upload file exceed the  upload_max_filesize directive in php.ini',
    2 => 'the upload file exceed the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'the upload file was only partially uploaded',
    4 => 'no file was uploaded',
    5 => 'missing a temporary folder',
    6 => 'failed to write file to disc',
    7 => 'a php extension stopped the file upload',
);

if (isset($_FILES['file'])) {

    $file_array = reArrayFiles($_FILES['file']);
    //pre_r($file_array);
    for ($i = 0; $i < count($file_array); $i++) {
        if ($file_array[$i]['error']) {
            ?><div class="alert alert-danger">
                    <?php echo $file_array[$i]['name'] . ' - ' . $phpFileUploadErrors[$file_array[$i]['error']];
            ?></div><?php
        } else {
            $extensions = array('jpeg', 'jpg', 'png', 'gif');
            $file_ext = explode('.', $file_array[$i]['name']);
            $file_ext = end($file_ext);
            $name = $_POST['name'];
            $code = $_POST['code'];
            $details = $_POST['details'];
            $price = $_POST['price'];

    


            if (!in_array($file_ext, $extensions)) {
                ?>
                <div class="alert alert-danger">

                    <?php echo "{$file_array[$i]['name']} -File upload failed, please try again. Only JPG, JPEG, PNG, & GIF files are allowed to upload." ?>

                </div>

                <?php
            } else {
                if (move_uploaded_file($file_array[$i]['tmp_name'], "./med_cart/product-images/" . $file_array[$i]['name'])) {
                    $mysqli->query("INSERT INTO tblproduct(image, name_, code, details, price) 
                    VALUES ('" .$file_array[$i]['name'] . "','$name','$code','$details', '$price')");


                }
                ?>
                <div class="alert alert-success">
                    <?php echo $file_array[$i]['name'] . ' - ' . $phpFileUploadErrors[$file_array[$i]['error']] ?>
                </div>

                <?php
            }
        }
    }
}

function reArrayFiles($file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

//end multi upload-->
?>




                <input type="file" name="file[]" class="form-control1" id="upload">
                <input type="text" name="name" id="" placeholder="Name" required>
                <input type="text" name="code" id="" placeholder="Code" required>
                <input type="text" name="details" id="" placeholder="Details" required>
                <!-- <input type="date" name="expiration" placeholder="Expiration"> -->
                <!-- <input type="number" name="quantity2" placeholder="Quantity"> -->
                <input type="number" name="price" placeholder="price">
                <button type="submit" class="btn_form" name="saveNew">SAVE</button>
            </form>
        </div>
    </div>
    <!-- ####################################################################################################### -->

    <?php include('./partials/script.php')?>
    <script src="./wwwroot/js/quantity.js"></script>
</body>

</html>