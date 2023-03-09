<?php 
//start session
require_once './database/student_process.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <script src="https://kit.fontawesome.com/047981b02e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">


</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Noto Sans', sans-serif
}

html,
body {
    height: 100%
}

body {
    display: grid;
    place-items: center;
    background: #ddd
}

.card {
    color: #000;
    width: 350px;
    border-radius: 10px;
    background: #d5ad35;
    box-shadow: 5px 5px 30px #913ca0,
        -5px -5px 30px #c552d8;
    border: none
}


.num {

    color: #000;
}

.line {
    color: #000;
}

.neo-button:active {
    border-radius: 50%;
    box-shadow: 28px 28px 57px #933da2,
        -28px -28px 57px #c351d6;
}

.btn_printer {
    position: relative;
    padding: 5px;
    background: #b98ce1;
    height: 40px;
    width: 80px;
    border-radius: 10px;
    color: white;
    margin-top: 2rem;
    /* font-size: 3rem; */
    border: none;
    cursor: pointer;
}

.btn_printer:hover {
    opacity: 0.7;
}

@media print {
    button {
        visibility: hidden;
    }

    .card {
        background: none;
        box-shadow: unset;
        border: 0.5px solid #000;
    }
}
</style>

<body>


    <div class="container d-flex justify-content-center">

        <div class="card p-3 py-4">
            <div class="text-center">
                <img src="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png" width="100" class="">
                <h3 class="mt-2"><?php echo $name?></h3>
                <span class="mt-1 clearfix"><?php echo $section?></span>
                <span class="mt-1 clearfix"><?php echo $date?></span>


                <hr class="line">
                <div>Time-In: <span style="color: red;"><?php echo $timeIn?></span></div>
                <div>Time-Out: <span style="color: red;"><?php echo $timeOut?></span></div>

                <hr class="line">
                <div>Reason:</div>
                <small class="mt-4"><?php echo $reason?></small>

                <hr class="line">
                <div>Action Taken: </div>
                <small class="mt-4"><?php echo $actionTaken?></small>






            </div>
            <button onclick="window.print()" class="btn_printer"><i class="fa-solid fa-print"></i> Print</button>
        </div>
    </div>
</body>

</html>