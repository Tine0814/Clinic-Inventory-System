<?php
 include('connection.php');
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$result = $mysqli->query("SELECT * FROM tblproduct WHERE id_=$id") or die($mysqli->error);
  
	$row = $result->fetch_array();
	$name = $row['name_'];
	$code = $row['code'];
	$price = $row['price'];
	$details = $row['details'];
	$image = $row['image'];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">

    <title>Medicine</title>
</head>
<style>
body {
    background: #ddd;
}

.card {
    border: none;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    cursor: pointer;
}

.card:before {

    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background-color: #E1BEE7;
    transform: scaleY(1);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:after {

    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background-color: #8E24AA;
    transform: scaleY(0);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:hover::after {
    transform: scaleY(1);
}


.fonts {
    margin-top: 2rem;
    font-size: 16px;
}

.social-list {
    display: flex;
    list-style: none;
    justify-content: center;
    padding: 0;
}

.social-list li {
    padding: 10px;
    color: #8E24AA;
    font-size: 19px;
}


.buttons button:nth-child(1) {
    border: 1px solid #ffc107 !important;
    color: #ffc107;
    height: 40px;
}

.buttons button:nth-child(1):hover {
    border: 1px solid #ffc107 !important;
    color: #fff;
    height: 40px;
    background-color: #ffc107;
}

.buttons button:nth-child(2) {
    border: 1px solid #ffc107 !important;
    background-color: #ffc107;
    color: #fff;
    height: 40px;
}
</style>

<body>
    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="./product-images/<?php echo $image?>" width="200" class="img-thumbnail shadow-lg">
                    </div>

                    <div class="text-center mt-3">
                        <span class="bg-primary p-1 px-4 rounded text-white"><?php echo $name?></span>
                        <h5 class="mt-2 mb-0"><?php echo $code?></h5>

                        <div class="px-4 mt-1">
                            <p class="fonts"><?php echo $details?></p>

                        </div>
                        <div class="buttons">
                            <form action="./index.php">
                                <button class="btn btn-outline-primary px-4">Request</button>
                            </form>
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>
</body>

</html>