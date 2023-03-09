<?php
include('connection.php');
require_once("dbcontroller.php");
$db_handle = new DBController();

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM tblproduct WHERE id_=$id") or die($mysqli->error);
}


if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name_"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}





?>
<HTML>

<HEAD>
    <TITLE>Requisition</TITLE>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="https://richwellcolleges.com/wp-content/uploads/2022/09/logp.png"
        type="image/x-icon">
    <script src="https://kit.fontawesome.com/047981b02e.js" crossorigin="anonymous"></script>

</HEAD>
<style>
.btn_printer {
    position: relative;
    padding: 5px;
    background: #674188;
    height: 30px;
    width: 80px;
    border-radius: 10px;
    /* font-size: 3rem; */
    border: none;
    cursor: pointer;
}

.btn_printer:hover {
    opacity: 0.7;
}

.btn_print_container {
    display: flex;
    justify-content: flex-end;
    width: 100%;
}
</style>

<BODY>

    <div id="shopping-cart">
        <div class="btn_print_container">
            <button onclick="window.print()" class="btn_printer"><a href="index.php?action=empty"
                    style="text-decoration: none; color: white; "><i class="fa-solid fa-print"></i> Print</a></button>
        </div>
        <div class="txt-heading" style="text-align: center; font-size: 25px;">Requisition of Medicine</div>

        <a id="btnEmpty" href="index?action=empty">Empty Table</a>
        <a id="" class="btn-back" href="../medicine">Go Back</a>
        <?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
                <tr>
                    <th style="text-align:left;" width="25%">Name</th>
                    <th style="text-align:left;" width="15%">Code</th>
                    <th style="text-align:right;" width="5%">Quantity</th>
                    <th style="text-align:right;" width="10%">Unit Price</th>
                    <th style="text-align:right;" width="10%">Price</th>
                    <th style="text-align:center;" width="5%">Remove</th>
                </tr>
                <?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
                <tr>
                    <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?>
                    </td>
                    <td><?php echo $item["code"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:right;"><?php echo "₱ ".$item["price"]; ?></td>
                    <td style="text-align:right;"><?php echo "₱ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>"
                            class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                </tr>
                <?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

                <tr>
                    <td colspan="2" align="right">Total:</td>
                    <td align="right"><?php echo $total_quantity; ?></td>
                    <td align="right" colspan="2"><strong><?php echo "₱ ".number_format($total_price, 2); ?></strong>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <?php
} else {
?>
        <div class="no-records">Request Form</div>
        <?php 
}
?>
    </div>
    <div class="new-container">
        <div id="product-grid">
            <div class="txt-heading">Products</div>
            <?php
		$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY name_");
		if (!empty($product_array)) { 
			foreach($product_array as $key=>$value){
		?>
            <div class="product-item">
                <form method="post" action="index?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                    <a href="./medInfo?edit=<?php echo $product_array[$key]["id_"];?>" id="edit">
                        <div class="product-image"><img
                                src="./product-images/<?php echo $product_array[$key]["image"]; ?>"></div>
                    </a>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $product_array[$key]["name_"]; ?></div>
                        <div class="product-price"><?php echo "₱".$product_array[$key]["price"]; ?></div>
                        <div class="cart-action">
                            <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                            <a href="index?delete=<?php echo $product_array[$key]['id_']; ?>"
                                onclick="return confirm('Are you sure you want to delete the data')"
                                class="btnAddAction" style="background: red;"><i class="fa-solid fa-trash"></i>
                                Delete</a>
                            <input type="submit" value="Request" class="btnAddAction" />
                        </div>
                    </div>
                </form>
            </div>
            <?php
			}
		}
		?>
        </div>
    </div>
</BODY>

</HTML>