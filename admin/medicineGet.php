<?php
require_once './database/medicine_process.php'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./wwwroot/css/product.css">
    <title>Medicine</title>
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
</head>
<style>

</style>

<body>

    <header>
        <div class="container">
            <div class="navigation">

                <div class="secure">
                    <i class="icon icon-shield"></i>

                </div>
            </div>
            <div class="notification">
                Clinic Medicine
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
                        <img class="medicine_img" src="./med_cart/product-images/<?php echo $image?>" alt="">
                    </div>
                </div>
                <div class="item__details">
                    <div class="item__title">
                        <?php echo $name?>
                    </div>
                    <div class="item__code">
                        <?php echo $code?>
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
                                    style=" font-size: 20px" disabled>
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
                $years = date('Y ');
                $newDate = date('F Y');
                
                ?>
            <div class="payment__info">
                <div class="payment__cc">
                    <?php if($quantity != 0):?>
                    <div class="payment__title">
                        <i></i>Personal Information
                    </div>
                    <form action="./medicineGet.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="year" id="" value="<?php echo $years?>">
                        <input type="hidden" name="month" id="" value="<?php echo $newDate?>">
                        <input type="hidden" name="stocks" class="input ddl" value="<?php echo $quantity?>">
                        <input type="hidden" name="medName" class="input ddl" value="<?php echo $name?>">
                        <ul class="form-style-1">
                            <li>
                                <label style="text-align: center; font-size: 16px">Form</label>
                                <input type="hidden" name="date" value="<?php echo $date; ?>">
                                <input type="text" name="name" class="field-divided" placeholder="Full Name" required>
                                <input type="text" name="section" class="field-divided" placeholder="Section">
                            </li>
                            <li>
                                <div class="title">Quantity
                                </div>
                                <select name="quantity" class="input ddl">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </li>
                            <li>
                                <label>Reason <span class="required">*</span></label>
                                <textarea name="reason" id="field5" class="field-long field-textarea"
                                    required></textarea>
                            </li>
                        </ul>

                </div>
                <div class="container">
                    <div class="actions">
                        <button type="submit" name="used" class="btn action__submit" style="text-align: center;">USE
                        </button>
                        <a href="./medicine" class="backBtn">Go Back to Stocks</a>
                    </div>
                </div>
                </form>
                <?php else:?>
                <div class="container">
                    <div class="actions">
                        <form action="./med_cart/index">
                            <button type="submit" name="used" class="btn action__submit request">Please Request
                                Medicine
                                <i class="icon icon-arrow-right-circle"></i>
                            </button>
                        </form>
                        <a href="./medicine" class="backBtn">Go Back to Stocks</a>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
        </div>
        </div>
    </section>
    </div>
</body>

</html>