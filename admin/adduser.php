<?php


require_once './database/adduser_process.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinic | Users</title>
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
                        <h1><span>Users</span></h1>
                    </div>
                    <?php include('./partials/user_profile.php')?>
                </div>
            </div>
            <!-- ############################################################################################## -->

            <!-- ======================================CONTENT=============================================-->
            <div class="details details_gridunset">
                <!--==================================== TABLE USERS============================================-->
                <?php 
                  $result = $mysqli->query("SELECT * FROM users");
                ?>
                <a href="#" id="btn_modal" class="btn_modal">Add User</a>
                <div class="data_information data_table">
                    <?php 
                    if(isset($_SESSION['message'])): ?>
                    <div class="<?=$_SESSION['msg_type']?>">
                        <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                    </div>
                    <?php endif ?>
                    <div class="card_header">
                        <h2>Users</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>UserName</td>
                                <td>Password</td>
                                <td>User Type</td>
                                <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo md5($row['password']) ?></td>
                                <td><?php echo $row['usertype']; ?></td>
                                <td>
                                    <a href="./adduser.php?edit=<?php echo $row['id']; ?>" class="btn btn_edit"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="./database/adduser_process.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                  $result = $mysqli->query("SELECT * FROM student_acc");
                ?>



                <div class="data_information data_table">
                    <?php 
                    if(isset($_SESSION['message'])): ?>
                    <div class="<?=$_SESSION['msg_type']?>">
                        <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                    </div>
                    <?php endif ?>
                    <div class="card_header">
                        <h2>Student</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Email</td>
                                <td>Password</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo  md5($row['password']) ?></td>
                                <td>
                                    <!-- <a href="./adduser.php?edit=<?php echo $row['id']; ?>" class="btn btn_edit"><i
                                            class="fa-solid fa-pen-to-square"></i></a> -->
                                    <a href="./database/adduser_process.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete the data')"
                                        class="btn btn_delete"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--======================================== FORM/MODAL=========================================-->
        </div>
        <!-- ############################################################################################## -->
    </div>
    <div class="bg_modal">
        <div class="add_form">
            <div class="close">+</div>
            <form action="./database/adduser_process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h1>Add Users</h1>
                <input type="text" value="<?php echo $name?>" name="name" placeholder="Name" required>
                <input type="text" value="<?php echo $username?>" name="username" placeholder="User Name" required>
                <input type="text" value="<?php echo $password?>" name="password" placeholder="Password" required>
                <?php if($usertype == "Admin"):?>
                <select name="usertype">
                    <option value="User">User</option>
                    <option value="Admin" selected>Admin</option>
                </select>
                <?php else:?>
                <select name="usertype" class="usertype">
                    <option value="User" selected>User</option>
                    <option value="Admin">Admin</option>
                </select>
                <?php endif ?>
                <?php if($update == true): ?>
                <button type="submit" class="btn_form" name="update">UPDATE</button>
                <?php else: ?>
                <button type="submit" class="btn_form" name="save">SAVE</button>
                <?php endif ?>
            </form>
        </div>

    </div>

    <?php include('./partials/script.php')?>
</body>

</html>