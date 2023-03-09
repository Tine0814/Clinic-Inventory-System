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
            <h3><?= $user['name']?></h3>
            <hr>
            <h4><?= $user['usertype']?></h4>
        </div>
        <ul>
            <li>
                <a href="./adduser">
                    <span class="icon"><i class="fa-solid fa-user-plus"></i></span>
                    <span class="name">User</span>
                </a>
            </li>
            <li>
                <a href="./studentHealthForm">
                    <span class="icon"><i class="fa-solid fa-pen"></i></span>
                    <span class="name">Health Record Form</span>
                </a>
            </li>
            <li>
                <a href="../database/logout">
                    <span class="icon"><i class="fa-sharp fa-solid fa-right-from-bracket"></i></span>
                    <span class="name">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>