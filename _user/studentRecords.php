<?php 
//start session

use LDAP\Result;

require_once './database/student_process.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Student Log</title>
    <?php include ("partials/styleLink.php");?>
</head>
<style>
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

/* select */
select {
    /* styling */
    background-color: white;
    border: thin solid #a679cd;
    border-radius: 4px;
    display: inline-block;
    font: inherit;
    line-height: 1.5em;
    padding: 0.5em 3.5em 0.5em 1em;

    /* reset */

    margin: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-appearance: none;
    -moz-appearance: none;
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
                        <h1>Daily<span>Records</span></h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CONTENT=============================================-->
            <!-- ======================================Search=============================================-->
            <div class="search_container">
                <div class="form_container">
                    <?php
                            // Set the new timezone
                                date_default_timezone_set('Asia/manila');
                                $date = date('Y-m-d');
                                $todays_time = date("h:i a");
                                $years = date('Y');
                                $newDate = date('F Y');
                                
                                ?>
                    <form action="studentRecords" method="post">
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
                <!--==================================== TABLE STUDENTS ======================================-->

                <div class="data_information data_table">
                    <div class="card_header">
                        <h2>Student Log</h2>
                        <button onclick="window.print()" class="btn_printer"><i class="fa-solid fa-print"></i>
                            Print</button>

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Section</td>
                                <td>Time-in</td>
                                <td>Time-out</td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        if (isset($_POST['show'])) {

                            $date = $_POST['date'];
                            $year = $_POST['year'];
                            $month = $_POST['month'];
                            

                            $sql = "SELECT * FROM `student_log` WHERE `date` = '$date' OR `year` = '$year' OR `month` = '$month'";

                            $result = mysqli_query($mysqli,$sql);
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $name = $row['name'];
                                        $section = $row['section'];
                                        $reason = $row['reason'];
                                        $actionTaken = $row['action_taken'];
                                        
                                        $time = $row['time'];
                                        $timeOut = $row['time_out'];

                                        ?>
                            <tr>

                                <td><?php echo $name?></td>
                                <td><?php echo $section?></td>
                                <td><?php echo $time ?></td>
                                <td><?php echo $timeOut ?></td>
                                <td>
                                    <a href="./studentReportLog?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <!-- <a href="./database/student_process.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i></a> -->
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                        } else {
                            $result = $mysqli->query("SELECT * FROM student_log WHERE date = '$date'");
                            while($row = $result->fetch_assoc()){
                                $id = $row['id'];
                                ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['section']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <?php if(!empty($row['time_out'])):?>
                                <td><?php echo $row['time_out']; ?></td>
                                <?php else:?>
                                <td>
                                    <form action="./studentRecords" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="timeOut" value="<?php echo $todays_time; ?>">
                                        <button type="submit" name="timeUpdate" class="btn btn_edit btn_out"
                                            style="border: none; background: green">OUT</button>
                                    </form>
                                </td>
                                <?php endif ?>
                                <td>
                                    <a href="./studentReportLog?edit=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="edit"><i class="fa-solid fa-eye"></i> View</a>
                                    <!-- <a href="./database/student_process.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i> Delete</a> -->
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    
                            
                        ?>

                        </tbody>
                    </table>
                </div>
                <!--======================================== FORM/MODAL=========================================-->

            </div>
            <div class="forms">
                <div class="search">
                    <div class="search_container">
                        <form action="studentRecords" method="GET">
                            <input id="student_id" type="number" name="stud_id" placeholder="ID number"
                                value="<?php echo $stud_id;?>" required>
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <div class="inputlog">
                    <form action="./database/student_process.php" method="POST">
                        <?php if(!empty($error_message)) { ?>

                        <div class="alert">
                            <span class="uil uil-exclamation-octagon"></span>
                            <span class="msg"><?= $error_message?></span>
                        </div>

                        <?php } ?>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="date" value="<?php echo $date; ?>">
                        <input type="hidden" name="year" value="<?php echo $years; ?>">
                        <input type="hidden" name="month" value="<?php echo $newDate; ?>">
                        <input type="hidden" name="time" value="<?php echo $todays_time; ?>">
                        <?php if(isset($_GET['stud_id'])):?>
                        <input type="text" value="<?php echo $_SESSION['full_name']?>" name="name" placeholder="Name"
                            required>
                        <?php else: ?>
                        <input type="text" value="<?php echo $name?>" name="name" placeholder="Name" required>
                        <?php endif?>
                        <input type="text" value="<?php echo $section?>" name="section" placeholder="Section" required>
                        <input type="text" value="<?php echo $reason?>" name="reason" placeholder="Reason" required>
                        <input type="text" value="<?php echo $actionTaken?>" name="actionTaken"
                            placeholder="Action Taken">
                        <?php if($update == true): ?>
                        <button type="submit" class="btn_form" name="update">UPDATE</button>
                        <?php else: ?>
                        <button type="submit" class="btn_form" name="save">SAVE</button>
                        <?php endif ?>
                    </form>

                </div>

            </div>
            <!-- ####################################################################################################### -->

        </div>
    </div>


    <?php include('./partials/script.php')?>
    <script src="./wwwroot/js/date.js"></script>

</body>

</html>