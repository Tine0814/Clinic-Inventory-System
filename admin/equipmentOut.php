<?php
require_once './database/equipment_process.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./wwwroot/css/product.css">
    <title>Equipment</title>
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
</head>

<body>

    <header>
        <div class="container">
            <div class="navigation">

                <div class="secure">
                    <i class="icon icon-shield"></i>

                </div>
            </div>
            <div class="notification">
                Clinic Equipment
            </div>
        </div>
    </header>
    <section class="content">

        <div class="container">

        </div>
        <div class="details shadow">
            <div class="details__item">

                <div class="item__image">
                    <div class="medicine">
                        <img class="medicine_img" src="./image_equipment/<?php echo $image?>" alt="">
                    </div>
                </div>
                <div class="item__details">
                    <div class="item__title">
                        <?php echo $name?>
                    </div>
                    <div class="item__code">
                    </div>


                    <div class="item__description">
                        <ul>
                            <li><?php echo $details?></li>
                        </ul>
                        <div class="item__quantity">
                            <div class="field small">
                                <div class="title">Stocks
                                </div>
                                <input type="text" class="input ddl" value="<?php echo $quantity?>"
                                    style=" font-size: 20px;" disabled>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <div class="discount"></div>

        <div class="container">
            <?php
            // Set the new timezone
                date_default_timezone_set('Asia/manila');
                $date = date('20y-m-d');
                
                ?>
            <div class="payment__info">
                <div class="payment__cc">
                    <div class="payment__title">
                    </div>
                    <form action="./equipmentOut" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="stocks" class="input ddl" value="<?php echo $quantity?>">
                        <select name="quantity" class="input ddl" hidden>
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                </div>
                <div class="container">
                    <div class="actions">
                        <button type="submit" name="used" class="btn action__submit" style="text-align: center;">Remove
                        </button>
                        <a href="./equipment.php" class="backBtn">Go Back</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </section>
    </div>
</body>

</html>