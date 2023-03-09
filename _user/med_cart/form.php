<?php
 require_once '../database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="POST" enctype="multipart/form-data">


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
                                $code = $_POST['code'];
                                $price = $_POST['price'];

                        
     

                                if (!in_array($file_ext, $extensions)) {
                                    ?>
                            <div class="alert alert-danger">

                                <?php echo "{$file_array[$i]['name']} -File upload failed, please try again. Only JPG, JPEG, PNG, & GIF files are allowed to upload." ?>

                            </div>

                            <?php
                                } else {
                                    if (move_uploaded_file($file_array[$i]['tmp_name'], "./product-images/" . $file_array[$i]['name'])) {
                                        $mysqli->query("INSERT INTO tblproduct(image, name, code, price) 
                                        VALUES ('" . $file_array[$i]['name'] . "','$name','$code', '$price')");

                                        // header('refresh:1;url= approval.php');

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





        <input type="text" name="name" id="" placeholder="name">
        <input type="text" name="code" id="" placeholder="code">
        <input type="file" name="file[]" id="" placeholder="image">
        <input type="text" name="price" id="" placeholder="price">
        <button type="submit" name="save">save</button>
    </form>
</body>
</html>