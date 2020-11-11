<?php
include("includes/db_connection.php");
include("includes/session.php");
include("includes/functions.php"); ?>
<?php

if (isset($_POST['id']) && isset($_POST['quantity'])) {

    $id = $_POST["id"];
    $qty = $_POST["quantity"];

    $query = "UPDATE [dbo].[cart] SET ";
    $query .= "[qty] = {$$qty}";
    $query .= "WHERE [id] = '{$id}'; ";
    $result = sqlsrv_query($connection, $query);

    if ($result) {
        // Success
//        redirect_to("cart.php");
        return true;
    } else {
        // Failure
        return false;
    }

}
elseif (isset($_POST['TinNumber']) && isset($_POST['UID']) && isset($_POST['billto'])) {

    $id = $_POST["UID"];
    $tin = $_POST["TinNumber"];
    $bill = $_POST["billto"];

    $query = "UPDATE [dbo].[customer] SET ";
    $query .= "[tin_number] = '{$tin}' ";
    $query .= ",[bill_to_name] = '{$bill}' ";
    $query .= "WHERE [id] = '{$id}'; ";
    $result = sqlsrv_query($connection, $query);

    if ($result) {
        echo '<div class="add2cart-notification animated fadeIn" id="flash-msg" style="padding: 0">
        <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #00b894;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0">
        <i class="icon fa fa-info mr-2"></i>Information updated</h4>
        </div>';
    } else {
        echo '<div class="add2cart-notification animated fadeIn" id="flash-msg" style="padding: 0">
        <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #b84143;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0">
        <i class="icon fa fa-info mr-2"></i>Please try again</h4>
        </div>';
    }

} elseif (isset($_POST['location'])) {
    $loc = trim($_POST['location']);
    $cart = null;
    $c_cart = null;
    if (isset($_SESSION["customer_id"])) {
        $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
        $cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    }

    $total = 0;
	$orders = 0;
    ?>
    <div class="cart-table card mb-3">
        <div class="table-responsive card-body">
            <table class="table mb-0">
                <tbody>
                <?php
                if ($c_cart != null) {
                    while ($row = sqlsrv_fetch_array($cart, SQLSRV_FETCH_ASSOC)) {
                        $check = sqlsrv_num_rows(check_inventory_balance($row["item"], $loc, $row["qty"]));

                        $price = find_price_by_item_id($row["item"]);
                        $discount_per = find_discount_by_item_id($row["item"]);

                        $value = "";
                        $os = "";
                        if (isset($discount_per["discount_per"]))
                            $unit = $price["price"] - $price["price"] * ($discount_per["discount_per"] / 100);

                        else
                            $unit = $price["price"];

                        if ($check > 0) {
							$orders ++;
                            $total += ($unit * $row["qty"]);
                            $os = "	" . number_format($unit,2) . " * " . $row["qty"];
							$value = "color: black";
                        } else {
                           // $value = "color: #747794; text-decoration: line-through;";
						   $value = "color: #747794;text-decoration:line-through ";
                            $os = "Out of stock";
                        }

                        ?>

                        <tr style="">
                            <th scope="row">
                                <a class="remove-product" href="deleteCart.php?id=<?php echo $row["id"]; ?>">
                                    <i class="lni lni-close"></i>
                                </a>
                            </th>
                            <td>
                                <img src="<?php echo "admin/" . find_item_by_item_id($row["item"])["image"]; ?>"
                                     alt="">
                            </td>
                            <td>
						     <?php if($os == "Out of stock"){}?>
                                <a href="single-product.php?id=<?php echo find_item_by_item_id($row["item"])["id"]; ?>"><span style="<?php echo $value; ?>"><?php echo $row["item_description"]; ?></span>
                                    <span style="color:black"><?php echo $os; ?></span>
                                </a>
                            </td>
                            <td>
                                <a>
                                    <span>ETB  <?php echo number_format($unit,2) * $row["qty"] ?></span>
                                </a>
                            </td>
                            <td>
                                <div class="quantity">
                                    <form>
                                        <input class="qty-text quantity" readonly
                                               oninput="updateCart(<?php echo urldecode($row["id"]); ?>)"
                                               id="quantity" type="text"
                                               value="<?php echo $row["qty"]; ?>">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                } ?>

                </tbody>
            </table>
        </div>
    </div>
	<div>
		<div class="card cart-amount-area add2cart-notification" style="border-radius: 0;margin-left: -1rem;height: 50px;background-color: transparent;">

			<div class="card-body d-flex align-items-center justify-content-between" style="margin: 0.01rem 0.94rem;background: white;">
				<h5 class="total-price mb-0">ETB <span class="" id="totalAmount"><?php echo number_format($total,2); ?></span>
				</h5>
				<?php if ($total > 0) { ?>
					<button type="button" id="confirm" onclick="checkoutBtn(<?php echo $orders; ?>,<?php echo $total; ?>)" class="btn btn-warning">
						Confirm shopping
					</button>
				<?php } ?>

			</div>

		</div>
	</div>
<?php
} elseif (isset($_POST['type']) && isset($_POST['locations']) && isset($_POST['cddate']) && isset($_POST['cdtime']) && isset($_POST['shope'])) {
    $type = trim($_POST['type']);
    $location = trim($_POST['locations']);
    $cddate = trim($_POST['cddate']);
    $cdtime = trim($_POST['cdtime']);
    $shope = trim($_POST['shope']);

    $landmark = find_land_mark_by_id($location);

     $time = substr($cdtime, 0, 13);
    if(strlen($cdtime) == 23)
        $price = substr($cdtime, 16, 7);
    if(strlen($cdtime) == 24)
        $price = substr($cdtime, 16, 9);

    $deliveryPrice = find_land_mark_price_by_id($cddate, $time, $location, $shope);
    ?>
    <table class="table mb-0" style="margin-left: 5px;">

        <tbody>
        <tr>
            <td style="padding: 0;border-bottom-width:0">
                <span style="margin-left: 0">Local Time Range</span>
            </td>

            <td style="padding: 0;border-bottom-width:0">
                <span style="margin-left: 0">Location</span>
            </td>

            <td style="padding: 0;border-bottom-width:0">
                <span style="margin-left: 0">Price</span>
            </td>

        </tr>
        </tbody>
    </table>
    <ul class="pl-0">
        <li>
            <!--            <input id="CDtime" type="radio" name="CDtime" checked value="CDtime">-->
            <label for="CDtime" style="padding: 5px 10px 5px 5px;">
                <table class="table mb-0">
                    <tbody>
                    <?php if ($type == "Pickup") { ?>
                        <tr>
                            <td style="padding: 0;border-bottom-width:0">
                            <span
                                style="margin-left: 0"><?php echo $cddate . "/" . $cdtime; ?></span>
                            </td>
                            <td style="padding: 0;border-bottom-width:0">
                            <span
                                style="margin-left: 0">Pickup</span>
                            </td>
                            <td style="padding: 0;border-bottom-width:0">
                                <span style="margin-left: 0"><?php echo "0"; ?></span>
                            </td>
                        </tr>
                    <?php } elseif ($type == "Deliver") { ?>
                        <tr>
                            <td style="padding: 0;border-bottom-width:0">
                            <span
                                style="margin-left: 0"><?php echo $deliveryPrice["date"] . "/" . $deliveryPrice["time_range"]; ?></span>
                            </td>
                            <td style="padding: 0;border-bottom-width:0">
                            <span
                                style="margin-left: 0"><?php echo find_land_mark_by_id($deliveryPrice["land_mark_code"])["title_en"]; ?></span>
                            </td>
                            <td style="padding: 0;border-bottom-width:0">
                                <span style="margin-left: 0"><?php echo $price; ?></span>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </label>
        </li>
    </ul>
<?php
} elseif (isset($_POST["Item_id"]) && isset($_POST["Qty"])) {
    if (!isset($_SESSION["customer_id"])) {
        redirect_to("login.php");
    }
    $user = null;
    if (isset($_SESSION["customer_id"])) {
        $user = find_all_customer_by_id($_SESSION["customer_id"]);
    }

    if (isset($_POST["Item_id"]) && isset($_POST["Qty"])) {
        $success = "";
        $cartVal = "";

        $items = find_item_by_item_id(trim($_POST["Item_id"]));
        $price = find_price_by_item_id($items["item_id"]);
        $discount_per = find_discount_by_item_id($items["item_id"]);

        $qty = $_POST["Qty"];
        $u_id = $_SESSION["customer_id"];
        $mobile = $user["mobile_number"];
        $name = trim($user["first_name"]) . " " . trim($user["middle_name"]) . " " . trim($user["last_name"]);
        $code = $items["item_id"];
        $descr = $items["title_en"];
        $uom = $price["uom"];

        if (isset($discount_per["discount_per"]))
            $unit = $price["price"] - $price["price"] * ($discount_per["discount_per"] / 100);

        else
            $unit = $price["price"];

        $total = $unit * $qty;

        $val = create_cart($u_id, $name, $mobile, $code, $descr, $uom, $qty, $unit, $total);

        if ($val) {
            $success = '<div class="add2cart-notification animated fadeIn" id="flash-msg" style="padding: 0px">
                         <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #00b894;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0"><i class="icon fa fa-check"></i>Success!</h4>
                  </div>';

        } else {
            $success = '<div class="alert alert-danger alert-dismissable" id="flash-msg1" style="padding: 0px">
                         <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #00b894;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0"><i class="icon fa fa-check"></i>Error!</h4>
                  </div>';
        }

        $c_cart = null;
        if (isset($_SESSION["customer_id"])) {
            $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);

        }

        if ($c_cart != null) {
            if (sqlsrv_num_rows($c_cart) > 0) {

                $cartVal = '<span class="ml-3 badge badge-warning"
                            style="background: #ffaf00 !important;margin-left: 45px !important;
                            margin-top: -25px;display: list-item;padding: 1px;z-index: 100;
                            border-radius: 50px;width: 20px;margin-bottom: 15px;">' .
                    sqlsrv_num_rows($c_cart)
                    . '</span>';

            }
        }
        $arr = array('successMessage' => $success, 'cartValue' => $cartVal);
        echo json_encode($arr);

    } else {
// $_SESSION["art_error"] = "Please Fill All Fields ";
    }
}
?>
