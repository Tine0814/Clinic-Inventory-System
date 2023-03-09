<?php 

require_once 'database/connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Dashboard</title>
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
                        <h1>Dashboard</h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CARD-BOX=============================================-->
            <div class="card_box">
                <div class="card">
                    <div>
                        <?php
                            // Set the new timezone
                                date_default_timezone_set('Asia/manila');
                                $date = date('20y-m-d');
                                
                                ?>
                        <div class="numbers">
                            <?php 
                            $result = $mysqli->query("SELECT id FROM student_log WHERE date ='$date' ORDER BY id");
                            $row = mysqli_num_rows($result);
                            echo '<p>' .$row. '</p>';
                            ?>
                        </div>
                        <div class="card_name">Daily Logs</div>
                    </div>
                    <div class="icon_box student_logo">
                        <a href="./studentRecords" style="color: var(--color-primary);"><i
                                class="fa-sharp fa-solid fa-clipboard"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php 
                            $result = $mysqli->query("SELECT id FROM health_records WHERE approved ='yes' ORDER BY id ");
                            $row = mysqli_num_rows($result);
                            echo '<p>' .$row. '</p>';
                            ?>
                        </div>
                        <div class="card_name">Health Records (Approved)</div>
                    </div>
                    <div class="icon_box student_logo">
                        <a href="./healthRecords" style="color: var(--color-primary);"><i
                                class="fa-solid fa-file-waveform"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php 
                            $result = $mysqli->query("SELECT id FROM health_records WHERE approved ='no' ORDER BY id ");
                            $row = mysqli_num_rows($result);
                            echo '<p>' .$row. '</p>';
                            ?>
                        </div>
                        <div class="card_name">Health Records (Pending)</div>
                    </div>
                    <div class="icon_box student_logo">
                        <a href="./approval" style="color: var(--color-primary);"><i
                                class="fa-sharp fa-solid fa-spinner"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $result = $mysqli->query("SELECT id FROM medicine ORDER by id");
                            $row = mysqli_num_rows($result);
                            echo '<p>'.$row.'</p>'
                            ?>
                        </div>
                        <div class="card_name">Medicine</div>
                    </div>
                    <div class="icon_box medicine_logo">
                        <a href="./medicine" style="color: var(--color-primary);"><i
                                class="fa-solid fa-tablets"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $result = $mysqli->query("SELECT id FROM equipment WHERE disposable = 'no' ORDER by id");
                            $row = mysqli_num_rows($result);
                            echo '<p>'.$row.'</p>'
                            ?>
                        </div>
                        <div class="card_name">Equipment (Nondisposable)</div>
                    </div>
                    <div class="icon_box equipment_logo">
                        <a href="./equipment" style="color: var(--color-primary);"><i
                                class="fa-solid fa-stethoscope"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $result = $mysqli->query("SELECT id FROM equipment WHERE disposable = 'yes' ORDER by id");
                            $row = mysqli_num_rows($result);
                            echo '<p>'.$row.'</p>'
                            ?>
                        </div>
                        <div class="card_name">Equipment (Disposable)</div>
                    </div>
                    <div class="icon_box equipment_logo">
                        <a href="./equipment" style="color: var(--color-primary);"><i
                                class="fa-sharp fa-solid fa-syringe"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $result = $mysqli->query("SELECT id FROM student_acc ORDER by id");
                            $row = mysqli_num_rows($result);
                            echo '<p>'.$row.'</p>'
                            ?>
                        </div>
                        <div class="card_name">Student Account</div>
                    </div>
                    <div class="icon_box equipment_logo">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $result = $mysqli->query("SELECT id FROM medicine_form ORDER by id");
                            $row = mysqli_num_rows($result);
                            echo '<p>'.$row.'</p>'
                            ?>
                        </div>
                        <div class="card_name">Medicine Used Records</div>
                    </div>
                    <div class="icon_box equipment_logo">
                        <a href="./usedMedicine" style="color: var(--color-primary);"><i
                                class="fa-sharp fa-solid fa-clipboard"></i></a>
                    </div>
                </div>

            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CONTENT=============================================-->
            <div class="data_student student_dashboard">
                <!--==================================== TABLE DISPOSABLE =========================================-->
                <?php 
                $result = $mysqli->query("SELECT * FROM equipment LEFT JOIN tblequipmentproduct ON equipment.name = tblequipmentproduct.name_ WHERE disposable ='yes' ORDER BY name ");
                ?>
                <div class="data_information equipment_dashboard">
                    <div class="card_header">
                        <h2>Disposable</h2>
                        <a href="./equipment.php" class="btn equipment_btn">
                            <i class="fa-solid fa-stethoscope"></i>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Quantity</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td> <img class="iphone" src="./image_equipment/<?php echo $row['image'];?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!--======================================== TABLE MEDICINE =========================================-->

            </div>
            <!-- ####################################################################################################### -->
            <div class="data_student student_dashboard">
                <!--======================================== TABLE MEDICINE =========================================-->
                <?php 
                $result = $mysqli->query("SELECT * FROM medicine LEFT JOIN tblproduct ON medicine.name = tblproduct.name_ ORDER BY name");
                ?>
                <div class="data_information medicine_dashboard">
                    <div class="card_header">
                        <h2>Medicine</h2>
                        <a href="./medicine.php" class="btn medicine_btn">
                            <i class="fa-solid fa-prescription-bottle-medical"></i>
                        </a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Expiration</td>
                                <td>Stocks</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <?php $quantity = $row['quantity'];?>
                            <?php $image = $row['image'];?>
                            <tr>
                                <?php if($quantity <= 10):?>
                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td style="color:red;"><?php echo $row['name']; ?></td>
                                <td><?php echo $row['expiration']; ?></td>
                                <td style="color:red;"><?php echo $quantity ?></td>
                                <?php elseif($quantity <= 25):?>
                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td style="color:blue;"><?php echo $row['name']; ?></td>
                                <td><?php echo $row['expiration']; ?></td>
                                <td style="color:blue;"><?php echo $quantity ?></td>
                                <?php else:?>
                                <td> <img class="iphone" src="./med_cart/product-images/<?php echo $image?>"
                                        width="45px" height="45px" style="border-radius: 50%;" alt=""></td>
                                <td style=""><?php echo $row['name']; ?></td>
                                <td><?php echo $row['expiration']; ?></td>
                                <td style=""><?php echo $quantity ?></td>
                                <?php endif ?>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <?php   function pre_r( $array ){
                        echo 'pre';
                        print_r($array);
                        echo '</pre>';
                        } ?>
                    </table>
                </div>
            </div>
            <!-- ####################################################################################################### -->

            <!--======================================== TABLE STUDENT =========================================-->
            <?php 
              // Set the new timezone
                  date_default_timezone_set('Asia/manila');
                  $date = date('20y-m-d');
                  
            $result = $mysqli->query("SELECT * FROM student_log WHERE date ='$date'");
            ?>

            <div class="data_student student_dashboard">
                <div class="card_header">
                    <h2>Recent Logs</h2>
                    <a href="./studentRecords.php" class="btn student_btn"><i class="fa-solid fa-user"></i></a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Section</td>
                            <td>Reason</td>
                            <td>Date</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['section']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ####################################################################################################### -->
    </div>

    <?php include('./partials/script.php')?>
</body>

</html>