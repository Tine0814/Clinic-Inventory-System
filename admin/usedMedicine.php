<?php 
//start session
require_once './database/usedMedicine_process.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Medicine</title>
    <?php include ("partials/styleLink.php");?>
</head>
<style>
.btn_request {
    width: 70px;
    height: 30px;
    font-size: 11px;
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

.search_container {
    display: flex;
    justify-content: center;
    margin-top: 8rem;
    margin-bottom: -7rem;
    height: 100px;
}

.form_container {
    width: 100%;
    height: 100%;
    padding: 20px;
    text-align: center;

}

.form_container input {
    height: 40px;
    padding: 10px;
    width: 150px;
    border: 1px solid gray;
    margin-top: 1rem;
    border-radius: 10px;
}

.btn_form {
    width: 76px
}

@media screen and (max-width: 800px) {
    .form_container input {
        height: 20px;
        width: 100px;
        font-size: 12px;
        border-radius: 5px;
        margin-top: -30rem;

    }

    select {
        line-height: 10px;
        font-size: 12px;
    }

    .btn_form {
        height: 20px;
        width: 50px;
        font-size: 12px;
    }
}

@media screen and (max-width: 500px) {
    .form_container input {
        height: 20px;
        width: 60px;
        font-size: 9px;
        border-radius: 5px;
        margin-top: -40rem;

    }

    select {
        line-height: 10px;
        font-size: 9px;
    }

    .btn_form {
        height: 20px;
        width: 50px;
        font-size: 12px;
    }
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
                        <h1>Recorded</h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CONTENT=============================================-->
            <?php
            // Set the new timezone
                date_default_timezone_set('Asia/manila');
                $date = date('20y-m-d');
                $newDate = date('F d Y');
                $years = date('Y ');

                
                ?>

            <div class="search_container">
                <div class="form_container">
                    <form action="usedMedicine" method="post">

                        <select name="year">
                            <option selected value="">-Select Year-</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                            <option value="2033">2033</option>
                            <option value="2034">2034</option>
                            <option value="2035">2035</option>
                            <option value="2036">2036</option>
                            <option value="2037">2037</option>
                            <option value="2038">2038</option>
                            <option value="2039">2039</option>
                            <option value="2040">2040</option>
                            <option value="2041">2041</option>
                            <option value="2042">2042</option>
                            <option value="2043">2043</option>
                            <option value="2044">2044</option>
                            <option value="2045">2045</option>
                            <option value="2046">2046</option>
                            <option value="2047">2047</option>
                            <option value="2048">2048</option>
                            <option value="2049">2049</option>
                            <option value="2050">2050</option>
                        </select> or
                        <select name="month" class="round">
                            <option selected value=''>-Select Month-</option>
                            <option value='Janaury <?php echo $years?>'>Janaury</option>
                            <option value='February <?php echo $years?>'>February</option>
                            <option value='March <?php echo $years?>'>March</option>
                            <option value='April <?php echo $years?>'>April</option>
                            <option value='May <?php echo $years?>'>May</option>
                            <option value='June <?php echo $years?>'>June</option>
                            <option value='July <?php echo $years?>'>July</option>
                            <option value='August <?php echo $years?>'>August</option>
                            <option value='September <?php echo $years?>'>September</option>
                            <option value='October <?php echo $years?>'>October</option>
                            <option value='November <?php echo $years?>'>November</option>
                            <option value='December <?php echo $years?>'>December</option>
                        </select> or
                        <input type="date" name="date" placeholder="">
                        <button type="submit" class="btn_form" name="show">Search</button>
                    </form>
                </div>
            </div>















            <div class="details details_gridunset">
                <?php 
                  $result = $mysqli->query("SELECT * FROM medicine_form");
                ?>
                <div class="data_information data_table">
                    <div class="card_header">
                        <h2>Form Report</h2>
                        <button onclick="window.print()" class="btn_printer"><i class="fa-solid fa-print"></i>
                            Print</button>
                    </div>
                    <div>



                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Section</td>
                                <td>Medicine</td>
                                <td>Quantity</td>
                            </tr>
                        </thead>
                        <tbody class="med_row">
                            <?php 
                        if (isset($_POST['show'])) {

                            $date = $_POST['date'];
                            $Years = $_POST['year'];
                            $month = $_POST['month'];
                            

                            $sql = "SELECT * FROM `medicine_form` WHERE `date` = '$date' or `new_date`= '$Years' or `month`= '$month'";

                            $result = mysqli_query($mysqli,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $name = $row['name'];
                                        $section = $row['section'];
                                        $medicine = $row['medicine'];
                                        $quantity = $row['quantity_'];

                                        ?>
                            <tr>

                                <td><?php echo $name?></td>
                                <td><?php echo $section?></td>
                                <td><?php echo $medicine ?></td>
                                <td><?php echo $quantity ?></td>
                                </td>
                                <td>
                                    <!-- <a href="./studentRecords.php?edit=<?php echo $row['id']; ?>"
                                        class="btn btn_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <a href="./database/student_process.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a> -->
                                    <a href="./studentReport?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                        }else {
                            $result = $mysqli->query("SELECT * FROM medicine_form WHERE date = '$date'");
                            while($row = $result->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['section']; ?></td>
                                <td><?php echo $row['medicine']; ?></td>
                                <td><?php echo $row['quantity_'] ?></td>
                                <td>
                                    <!-- <a href="./usedMedicine.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a> -->
                                    <a href="./studentReport?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
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
            <!-- <div class="details details_gridunset">


                <div class="data_information data_table">
                    <div class="card_header">
                        <h2>Medicine Report</h2>
                    </div>
                    <div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>quantity</td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody class="med_row">
                            <?php
                            if (isset($_POST['show'])){
                                $date = $_POST['date'];

                                $sql = "SELECT * FROM `med_report` WHERE `date` = '$date'";

                                $result = mysqli_query($mysqli,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $medName = $row['med_name'];
                                        $quantity = $row['quantity'];
                                        ?>
                            <tr>

                                <td><?php echo $medName ?></td>
                                <td><?php echo $quantity ?></td>
                                </td>
                                <td>

                                    <a href="./database/student_process.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                            }else{
                              $result = $mysqli->query("SELECT * FROM med_report WHERE date = '$date' ORDER BY med_name");
                                    while($row = $result->fetch_assoc()){
                                        $name = $row['med_name'];
                                        $quantity = $row['quantity'];
                                    ?>
                            <tr>
                                <td><?php echo $name ?></td>
                                <td><?php echo $quantity ?></td>
                                <td>
                                    <a href="./usedMedicine.php?delete=<?php echo $row['id']; ?>"
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
            </div> -->
        </div>
    </div>








    <!-- ####################################################################################################### -->

    <?php include('./partials/script.php')?>
    <script src="./wwwroot/js/quantity.js"></script>
</body>

</html>