<?php
    include('database/healthForm_process.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Records</title>
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
                        <h1>Your<span>Medical Records</span></h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CONTENT=============================================-->
            <!-- ======================================Search=============================================-->
            <?php $user = $_SESSION['users']; ?>
            <?php $idNumber = $user['id_number']; ?>

            <div class="details details_gridunset">
                <?php 
                    $result = $mysqli->query("SELECT * FROM health_records WHERE  id_number = $idNumber");
                    date_default_timezone_set('Asia/manila');
                    $years = date('Y');
                    $year = null;
                    while($row = $result->fetch_assoc()){
                        $year = $row['year'];
            
                    }
                ?>
                <!--==================================== TABLE Health Records =========================================-->
                <?php if($year != $years):?>
                <a href="./studentHealthForm" id="" class="btn_modal"><i class="fa-solid fa-plus"></i> Add </a>
                <?php endif ?>

                <div class="data_information data_table" style="max-height: 100vh;">
                    <div class="card_header">

                        <h2 style="font-size: 15px; margin-left: 0.5rem; color: red;"><?= $user['first_name'] ?>
                            <?= $user['last_name'] ?>
                        </h2>
                    </div>
                    <d>

                    </d iv>
                    <table>
                        <thead>
                            <tr>
                                <td>year</td>
                                <td>ID No.</td>
                                <td>setion</td>
                                <td>birth date</td>
                                <td> phone No.</td>
                                <td> picture</td>
                                <td colspan=" 2">Action</td>
                            </tr>
                        </thead>
                        <?php
                                if(!empty($idNumber)){
                                    $result = $mysqli->query("SELECT * FROM health_records WHERE id_number = $idNumber ");
            
                                    while($row = $result->fetch_assoc()){

                                        $approved = $row['approved'];
            
                                        ?>

                        <tr>
                            <td><?php echo $row['school_year']; ?></td>
                            <td><?php echo $row['id_number']; ?></td>
                            <td><?php echo $row['section']; ?></td>
                            <td><?php echo $row['date_birth']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo "<img style='border-radius: 50%; box-shadow: 0 7px 25px rgb(0 0 0 / 90%);' class='content-image' src='../picture/".$row['image']."'  height='40px'>"; ?>
                            </td>
                            <td>
                                <?php if($approved === 'no'):?>
                                <a href="./studentHealthForm?edit=<?php echo $row['id'];?>"
                                    style="margin-right: 0.3rem;" class="btn btn_edit" id="approve"><i
                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <?php endif ?>
                                <a href="./profile?edit=<?php echo $row['id'];?>" class="btn btn_edit" id="edit"><i
                                        class="fa-solid fa-eye"></i> View</a>
                            </td>
                        </tr>
                        <?php
                                    }
            
                                }else{
                                    echo "<tr><td colspan ='7' style='text-align: center; color: red; font-size: 20px;'>No Record Found</td></tr>";
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