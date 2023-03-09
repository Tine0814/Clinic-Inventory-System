<?php
    include('database/healthForm_process.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Approve</title>
    <?php include ("partials/styleLink.php");?>
</head>
<script>
const confirmAction = () => {
    const response = confirm("Are you sure?");

    if (window.confirm('If you click "ok" you would be redirected . Cancel will load this website ')) {
        window.location.href = 'https://www.google.com/chrome/browser/index.html';
    };
}
</script>
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
    <div class="container container-bt">
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
                        <h1>Pending</h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CONTENT=============================================-->
            <!-- ======================================Search=============================================-->
            <div class="search_container">
                <div class="form_container">
                    <form action="approval.php" method="post">
                        <input type="number" name="idNumber" placeholder="Enter ID Number"> or
                        <select name="year">
                            <option selected value="">-Select Year-</option>
                            <option value="2022">2022 - 2023</option>
                            <option value="2023">2023 - 2024</option>
                            <option value="2024">2024 - 2025</option>
                            <option value="2025">2025 - 2026</option>
                            <option value="2026">2026 - 2027</option>
                            <option value="2027">2027 - 2028</option>
                            <option value="2028">2028 - 2029</option>
                            <option value="2029">2029 - 2030</option>
                            <option value="2030">2030 - 2031</option>
                            <option value="2031">2031 - 2032</option>
                            <option value="2032">2032 - 2033</option>
                            <option value="2033">2033 - 2034</option>
                            <option value="2034">2034 - 2035</option>
                            <option value="2035">2035 - 2036</option>
                            <option value="2036">2036 - 2037</option>
                            <option value="2037">2037 - 2038</option>
                            <option value="2038">2038 - 2039</option>
                            <option value="2039">2039 - 2040</option>
                            <option value="2040">2040 - 2041</option>
                            <option value="2041">2041 - 2042</option>
                            <option value="2042">2042 - 2043</option>
                            <option value="2043">2043 - 2044</option>
                            <option value="2044">2044 - 2045</option>
                            <option value="2045">2045 - 2046</option>
                            <option value="2046">2046 - 2047</option>
                            <option value="2047">2047 - 2048</option>
                            <option value="2048">2048 - 2049</option>
                            <option value="2049">2049 - 2050</option>
                            <option value="2050">2050 - 2051</option>
                        </select> or
                        <!-- <select name="year">
                            <option value=''>--Select Year--</option>

                            <?php
              $selectDb = $mysqli->query("SELECT * FROM health_records ORDER BY year");
            
          ?>
                            <?php
            while($rows = $selectDb->fetch_assoc()){
              $year= $rows['year'];
              $schoolYear= $rows['school_year'];
              echo "<option value='$year'>$schoolYear</option>";
            }
          ?>
                        </select> or -->
                        <?php
                        date_default_timezone_set('Asia/manila');
                        $years = date('Y ');
                        $month = date('F Y ');
                            ?>
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
                        </select>
                        <button type="submit" class="btn_form" name="show">Search</button>
                    </form>
                </div>
            </div>
            <div class="details details_gridunset">
                <!--==================================== TABLE Health Records =========================================-->
                <div class="data_information data_table" style="max-height: 100vh;">
                    <div class="card_header">
                        <h2>Health Records</h2>
                    </div>
                    <div>

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Year</td>
                                <td>ID No.</td>
                                <td>Full Name</td>
                                <td>Birth date</td>
                                <td> Phone No.</td>
                                <td> Picture</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <?php
                         $result = $mysqli->query("SELECT * FROM health_records ORDER BY last_name");
                         ?>
                        <tbody class="med_row">
                            <?php 
                        if (isset($_POST['show'])) {

                            $idNumber = $_POST['idNumber'];
                            $year = $_POST['year'];
                            $month = $_POST['month'];
                            

                            $sql = "SELECT * FROM `health_records` WHERE `id_number` = '$idNumber' OR `year`='$year' OR `month`='$month' ORDER BY last_name";

                            $result = mysqli_query($mysqli,$sql);
                            if (mysqli_num_rows($result)>0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $approved = $row['approved'];
                                    if($approved == 'no'){
                                    $Id = $row['id'];
                                    $idNumber = $row['id_number'];
                                    $dateOfBirth = $row['date_birth'];
                                    $address = $row['address'];
                                    $phoneNumber = $row['phone_number'];
                                    $email = $row['email'];
                                    $height = $row['height'];
                                    $weight = $row['weight'];

                                    $name = array($row['first_name'], $row['last_name']);
                                    $full_name = $name[1].', '.$name[0];
                                    ?>
                            <tr>
                                <td><?php echo $row['school_year'];?></td>
                                <td><?php echo $idNumber;?></td>
                                <td><?php echo $full_name ; ?></td>
                                <td><?php echo $dateOfBirth; ?></td>
                                <td><?php echo $phoneNumber; ?></td>
                                <td><?php echo "<img style='border-radius: 50%;' class='content-image' src='../picture/".$row['image']."'  height='40px'>"; ?>
                                </td>
                                <td>
                                    <a href="./studentHealthForm?approve=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="approve"><i class="fa-sharp fa-solid fa-circle-check"></i> Select
                                    </a>
                                    <!-- <a href="./approval.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete" id="btn_modal"><i class="fa-solid fa-trash"></i>
                                        Delete<a> -->
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            } else {
                                echo "<tr><td colspan ='7' style='text-align: center; color: red; font-size: 20px;'>No Record Found</td></tr>";
                            }
                    }
                    elseif (!isset($_POST['show'])){
                        $result = $mysqli->query("SELECT * FROM health_records WHERE approved ='no' AND year='$years' AND month='$month' ORDER BY last_name");

                        while($row = $result->fetch_assoc()){

                            if(!empty($result)){

                            $name = array($row['first_name'], $row['last_name']);
                            $full_name = $name[1].', '.$name[0];
                            ?>

                            <tr>
                                <td><?php echo $row['school_year'];?></td>
                                <td><?php echo $row['id_number']; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $row['date_birth']; ?></td>
                                <td><?php echo $row['phone_number']; ?></td>
                                <td><?php echo "<img style='border-radius: 50%; box-shadow: 0 7px 25px rgb(0 0 0 / 90%);' class='content-image' src='../picture/".$row['image']."'  height='40px'>"; ?>
                                </td>
                                <td>
                                    <a href="./studentHealthForm?approve=<?php echo $row['id'];?>" class="btn btn_edit"
                                        id="approve"><i class="fa-sharp fa-solid fa-circle-check"></i> Select</a>
                                    <!-- <a href="./approval.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete" id="btn_modal"><i class="fa-solid fa-trash"></i>
                                        Delete<a> -->
                                </td>
                            </tr>
                            <?php
                            }else {
                                echo "<tr><td colspan ='7' style='text-align: center; color: red; font-size: 20px;'>No Record Found</td></tr>";
                            }

                        }
                    }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('./partials/script.php')?>

</body>

</html>