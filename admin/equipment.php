<?php 
//start session
require_once './database/equipment_process.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Equipment</title>
    <?php include ("partials/styleLink.php");?>
</head>

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
                        <h1>Clinic<span>Equipment</span></h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->


            <!-- ======================================CONTENT=============================================-->
            <!--============================================= TABLE =================================================-->
            <div class="details details_gridunset">
                <!--==================================== TABLE NOT-DISPOSABLE============================================-->
                <?php 
                    $result = $mysqli->query("SELECT * FROM equipment LEFT JOIN tblequipmentproduct ON equipment.name = tblequipmentproduct.name_ WHERE disposable ='no' ORDER BY name ");
                    ?>
                <div>
                    <a href="#" id="btn_modal" class="btn_modal modal1"><i class="fa-solid fa-plus"></i> ADD</a>
                    <a href="#" id="btn_modal2" class="btn_modal modal1" style="margin-left: 5px;"><i
                            class="fa-solid fa-plus"></i> ADD NEW
                        DATA</a>
                </div>
                <div class="data_information data_table">
                    <div class="card_header">
                        <!-- <h2>Non-Disposable</h2> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Quantity</td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()):
                             $quantity = $row['quantity'];
                                 ?>
                            <tr>
                                <td> <img class="iphone" src="./image_equipment/<?php echo $row['image'];?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>

                                <td>
                                    <a href="./equipmentOut?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="./equipment?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete" id="btn_modal"><i class="fa-solid fa-trash"></i>
                                        Delete<a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!--==================================== TABLE DISPOSABLE============================================-->
                <?php 
                    $result = $mysqli->query("SELECT * FROM equipment LEFT JOIN tblequipmentproduct ON equipment.name = tblequipmentproduct.name_ WHERE disposable ='yes' ORDER BY name  ");
                ?>
                <div class="data_information data_table">
                    <div class="card_header">
                        <h2>Disposable</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Quantity</td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): 
                            $quantity = $row['quantity'];
                            $ids = $row['id'];
                                ?>
                            <tr>
                                <td> <img class="iphone" src="./image_equipment/<?php echo $row['image'];?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td>
                                    <a href="./equipmentOut?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <a href="./equipment?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a>
                                </td>

                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--################################################################################################### -->


        </div>
    </div>
    <!--======================================== FORM/MODAL=========================================-->
    <div class="bg_modal">
        <div class="add_form">
            <div class="close">+</div>
            <form action="equipment" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h1>Equipment</h1>
                <select name="name" style="height: 40px; margin-top:1rem;">
                    <option value=''>--Select Product--</option>

                    <?php
              $selectDb = $mysqli->query("SELECT name_ FROM tblequipmentproduct ORDER BY name_");
            
          ?>
                    <?php
            while($rows = $selectDb->fetch_assoc()){
              $name= $rows['name_'];
              echo "<option value='$name'>$name</option>";
            }
          ?>
                </select>
                <input type="number" name="quantity" placeholder="Quantity">
                <label for="disposable">Disposable</label>
                <div class="radio_group">
                    <label class="radio">
                        <input type="radio" name="disposable" id="disposable" value="yes" required>
                        <span></span>
                        Yes
                    </label>
                    <label class="radio">
                        <input type="radio" name="disposable" id="disposable" value="no" required>
                        <span></span>
                        No
                    </label>
                </div>
                <button type="submit" class="btn_form" name="save">SAVE</button>
            </form>
        </div>
    </div>
    <!-- ######################################################################################## -->



    <!--======================================== FORM/MODAL NEW DATA=========================================-->
    <div class="bg_modal2">
        <div class="add_form">
            <div class="close2">+</div>
            <form action="equipment" method="POST" enctype="multipart/form-data">
                <h1>Equipment</h1>




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
            $details = $_POST['details'];

    


            if (!in_array($file_ext, $extensions)) {
                ?>
                <div class="alert alert-danger">

                    <?php echo "{$file_array[$i]['name']} -File upload failed, please try again. Only JPG, JPEG, PNG, & GIF files are allowed to upload." ?>

                </div>

                <?php
            } else {
                if (move_uploaded_file($file_array[$i]['tmp_name'], "./image_equipment/" . $file_array[$i]['name'])) {
                    $mysqli->query("INSERT INTO tblequipmentproduct(image, name_, details) 
                    VALUES ('" .$file_array[$i]['name'] . "','$name','$details')");


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
                <input type="text" name="details" id="" placeholder="Details" required>
                <button type="submit" class="btn_form" name="saveNew">SAVE</button>
            </form>
        </div>
    </div>
    <!-- ####################################################################################################### -->



    <?php include('./partials/script.php')?>
</body>

</html>