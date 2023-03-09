<?php


require_once './database/healthForm_process.php';
// require_once './database/connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Form </title>
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
    <link rel="stylesheet" href="./wwwroot/css/healthForm.css">
    <script src="https://kit.fontawesome.com/047981b02e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
</head>
<style>
.img-1 {
    margin-right: 40px;
}

.go-back {
    font-size: 12px;
    background: #674188;
    width: 80px;
    height: 30px;
    padding: 5px;
    text-align: center;
    border-radius: 10px;
    font-weight: 600;
    margin-top: 5rem;
    margin-left: 2rem;
    margin-bottom: -3rem;
}

.go-back a {
    color: white;
    text-decoration: none;

}

.go-back:hover {
    opacity: 0.7;
}
</style>

<body>
    <?php $user = $_SESSION['users']; ?>
    <div class="container-form1">
        <!-- <div class="go-back">
            <a href="approval.php"><i class="fa-solid fa-arrow-left"></i> Go Back</a>
        </div> -->
        <div class="container-form">
            <hr class="hr-style">
            <br>

            <div class="container-form-content">
                <div class="title" style="display:flex; justify-content:space-between;">
                    <p class="label" style="font-weight: 700;">MEDICAL REPORT FORM</p>
                    <?php if($update == true || ($approval == true) ): ?>
                    <?php echo "<img class='content-image img-1' src='../picture/".$row['image']."'  height='160px'>"; ?>
                    <?php else:?>

                    <?php endif ?>
                </div>
                <form action="studentHealthForm.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="two-layer">
                        <div class="contact-container">
                            <div class="label">
                                <label for="">ID No. <span style="color:red;">*</span></label>
                            </div>
                            <div class="input">
                                <input class="text-input" type="number" name="idNumber" placeholder="ID Number "
                                    value="<?php echo $user['id_number']; ?>" required>
                            </div>
                        </div>
                        <div class="contact-container">
                            <?php
                            // Set the new timezone
                                date_default_timezone_set('Asia/manila');
                                $years = date('Y ');
                                $newDate = date('F Y');
                                $schoolYear=date('Y', strtotime('+1 year'));
                                
                                ?>
                            <input type="text" name="approve" id="" value="<?php echo $approve?>" hidden>
                            <input type="text" name="year" id="" value="<?php echo $years?>" hidden>
                            <input type="text" name="month" id="" value="<?php echo $newDate?>" hidden>
                            <input type="text" name="schoolYear" value="<?php echo $years?>- <?php echo $schoolYear?>"
                                hidden>
                            <div class="label">
                                <label for="">ID Picture <span style="color:red;">*</span></label>
                            </div>
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
                                $idNumber = $_POST['idNumber'];
                                $approve = $_POST['approve'];
                                $month = $_POST['month'];
                                $year = $_POST['year'];
                                $firstName = $_POST['firstName'];
                                $middleName = $_POST['middleName'];
                                $lastName = $_POST['lastName'];
                                $section = $_POST['section'];
                                $dateOfBirth = $_POST['dateOfBirth'];
                                $address = $_POST['address'];
                                $phoneNumber = $_POST['phoneNumber'];
                                $email = $_POST['email'];
                                $height = $_POST['height'];
                                $weight = $_POST['weight'];
                                $bloodPressure = $_POST['bloodPressure'];
                                $schoolYear = $_POST['schoolYear'];
                        
     

                                if (!in_array($file_ext, $extensions)) {
                                    ?>
                            <div class="alert alert-danger">

                                <?php echo "{$file_array[$i]['name']} -File upload failed, please try again. Only JPG, JPEG, PNG, & GIF files are allowed to upload." ?>

                            </div>

                            <?php
                                } else {
                                    if (move_uploaded_file($file_array[$i]['tmp_name'], "../picture/" . $file_array[$i]['name'])) {
                                        $mysqli->query("INSERT INTO health_records(image,id_number,approved, month, year, school_year, first_name, middle_name, last_name, section, date_birth, address, phone_number, email, height, weight, blood_pressure) 
                                        VALUES ('" . $file_array[$i]['name'] . "','$idNumber','$approve', '$month', '$year', '$schoolYear', '$firstName', '$middleName', '$lastName','$section', '$dateOfBirth', '$address', '$phoneNumber', '$email', '$height', '$weight' , '$bloodPressure')");

                                        header('refresh:1;url= approval.php');


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
                            <?php if($edit = true): ?>
                            <input type="file" name="file[]" class="form-control1" id="upload">
                            <?php else:?>
                            <input type="file" name="file[]" class="form-control1" id="upload" required>

                            <?php endif ?>
                        </div>
                    </div>
                    <div class="names">
                        <div class="fname-container">
                            <div class="label">
                                <label for="">Student's Full Name <span style="color:red;">*</span></label>
                            </div>
                            <div class="input-names">
                                <div>
                                    <input type="text" name="firstName" placeholder="First Name"
                                        value="<?php echo $user['first_name']; ?>" required>
                                </div>
                                <div>
                                    <input type="text" name="middleName" placeholder="Middle Name"
                                        value="<?php echo $user['middle_name'];?>" required>
                                </div>
                                <div>
                                    <input type="text" name="lastName" placeholder="Last Name"
                                        value="<?php echo $user['last_name']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two-layer">
                        <div class="contact-container section-container">
                            <div class="label">
                                <label for="">Section <span style="color:red;">*</span></label>
                            </div>
                            <div class="input">
                                <input type="text" name="section" placeholder="ex. BSIS 4-1 "
                                    value="<?php echo $section; ?>" required>
                            </div>
                        </div>
                        <div class="contact-container">
                            <div class="label">
                                <label for="">Date of Birth <span style="color:red;">*</span></label>
                            </div>
                            <input type="date" name="dateOfBirth" value="<?php echo $dateOfBirth; ?>" required>
                        </div>
                    </div>
                    <div class="address-container">
                        <div class="add">
                            <div class="label">
                                <label for="">Address <span style="color:red;">*</span></label>
                            </div>
                            <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>"
                                required>
                        </div>
                    </div>
                    <div class="two-layer">
                        <div class="contact-container">
                            <div class="label">
                                <label for="">Phone Number <span style="color:red;">*</span></label>
                            </div>
                            <div class="input">
                                <input type="tel" pattern="[0-9]{3}[0-9]{2}[0-9]{3}[0-9]{3}" name="phoneNumber"
                                    placeholder="Phone Number" value="<?php echo $user['phone_number']; ?>" required>
                            </div>
                        </div>
                        <div class="contact-container">
                            <div class="label">
                                <label for="">E-mail Address <span style="color:red;">*</span></label>
                            </div>
                            <input type="email" name="email" placeholder="ex: myname@example.com"
                                value="<?php echo $user['email']; ?>" required>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="title">
                        <p class="label">Health History</p>
                    </div>
                    <div class="two-layer">
                        <div class="contact-container">
                            <div class="label">
                                <label for="">Height <span style="color:red;">*</span></label>
                            </div>
                            <div class="input">
                                <input type="number" name="height" placeholder="e.g., 173cm"
                                    value="<?php echo $height; ?>">
                            </div>
                        </div>
                        <div class="contact-container">
                            <div class="label">
                                <label for="">Weight <span style="color:red;">*</span></label>
                            </div>
                            <input type="number" name="weight" placeholder="e.g., 64kg" value="<?php echo $weight; ?>">
                        </div>
                    </div>
                    <div class="two-layer">
                        <div class="contact-container">
                            <div class="label">
                                <label for="">Blood Pressure <span style="color:red;">*</span></label>
                            </div>
                            <div class="input">
                                <input type="text" name="bloodPressure" placeholder="e.g., 145/85"
                                    value="<?php echo $bloodPressure; ?>">
                            </div>
                        </div>
                        <div class="contact-container">
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>
                    <div class="center-btn">
                        <?php if($update == true): ?>
                        <button type="submit" class="btn btn-primary mx-5 btn-lg" name="update">UPDATE</button>
                        <?php else: ?>
                        <button type="submit" class="btn btn-success mx-5 btn-lg" name="save">SAVE</button>
                        <?php endif ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    // $(function() {
    //     $('input').keyup(function() {
    //         this.value = this.value.toLocaleUpperCase();
    //     });
    // });
    </script>



</body>

</html>