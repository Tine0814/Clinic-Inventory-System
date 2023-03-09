<!-- User Profile drop down-->
<?php $user = $_SESSION['users']; ?>
<div class="drop_down">
    <div class="profile">
        <img src="wwwroot/image/richwell-colleges-logo.jpg" alt="">
    </div>
    <div class="profile_menu">
        <div class="profile_container">
            <div class="profile">
                <img src="wwwroot/image/richwell-colleges-logo.jpg" alt="">
            </div>
            <h3><?= $user['first_name']  ?> <?= $user['last_name']  ?></h3>
            <hr>
            <h4><?= $user['usertype']?></h4>
        </div>
        <ul>
            <li>
                <?php
                        $idNumber = $user['id_number']; 

                  $result = $mysqli->query("SELECT * FROM student_acc where id_number =$idNumber");

                  $row = $result->fetch_assoc();
                ?>
                <a href="accountSettings?edit=<?php echo $row['id']; ?>"">
                <span class=" icon"><i class="fa-solid fa-gear"></i></span>
                    <span class="name">Account settings</span>
                </a>
            </li>
            <li>
                <a href="../database/logout_stud.php">
                    <span class="icon"><i class="fa-sharp fa-solid fa-right-from-bracket"></i></span>
                    <span class="name">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>