<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$carts = null;
$user = null;
$c_cart = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $carts = find_all_cart_by_customer($_SESSION["customer_id"]);
    $user = find_all_customer_by_id($_SESSION["customer_id"]);
}

$total = 0;
if (isset($_POST["submit"])) {

    $u_id = $_SESSION["customer_id"];
    $name = trim($user["first_name"]) . " " . trim($user["middle_name"]) . " " . trim($user["last_name"]);
    $mobile = trim($user["mobile_number"]);
    $tin = trim($user["tin_number"]);
    $bill = trim($user["bill_to_name"]);

    $shipping = $_GET["type"];
    $deliver_date = $_GET["CDdate"];
    $time_range = $_GET["CDtime"];
    $landmark = $_GET["location"];
    $payment = "Bank Transfer";
    $bank = $_GET["bank"];
    $account = "";
    $daily = $_GET["account"];
    $deliver = str_replace("T", " ", $_GET["date_time"]) . ":00";
    $trn_id = $_POST["trn"];
    $payer = $_POST["name"];
    $status = 0;
	
	
	$orders_id;
	$get_order_id = find_max_order_id();	
	if($get_order_id['order_id'] != null)
	$orders_id = $get_order_id['order_id'] + 1;
	else $orders_id = '100000000000';

    while ($cart = sqlsrv_fetch_array($carts, SQLSRV_FETCH_ASSOC)) {
        $code = $cart["item"];
        $qty = $cart["qty"];
        $location = $_GET["shope"];
        $check = sqlsrv_num_rows(check_inventory_balance($code, $location, $qty));

        if ($check > 0) {
            $descr = $cart["item_description"];
            $uom = $cart["uom"];
            $price = find_price_by_item_id($code);
            $discount_per = find_discount_by_item_id($code);

            if (isset($discount_per["discount_per"]))
                $unit = $price["price"] - $price["price"] * ($discount_per["discount_per"] / 100);

            else
                $unit = $price["price"];

            $total = $unit * $qty;
			
			$time_range = substr($time_range,0,13);
            $stat = create_order($u_id, $name, $mobile, $code, $descr, $uom, $qty, $unit, $total, $shipping, $payment, $bank, $daily, $account, $trn_id,
                $payer, $status, $deliver, $location, $deliver_date, $time_range, $landmark, $tin, $bill, $orders_id);


            if ($stat) {
                $id = $cart["id"];

                $query = "DELETE FROM [dbo].[cart] WHERE [id] = '{$id}'";
                $result = sqlsrv_query($connection, $query);
            }
        }
    }
    redirect_to("payment-success.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Daily Mart">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Daily Mart</title>


    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
</head>
<body>
<!-- Preloader-->
<div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
    </div>
</div>
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a
                href="checkout-bank_account.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>"><i
                    class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Bank Transfer Info</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler">
            <span></span><span></span><span></span></div>
    </div>
</div>
<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>

<?php
require_once("sidenav.php");
?>

<div class="page-content-wrapper">
    <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
            <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="img/bg-img/credit-card.png" alt="">

                <div class="bank-ac-info">
                    <p>Your order won’t be shipped until the funds have cleared in our account.</p>
					<p>Please provide us transfer detail</p>
                </div>

                <form action="" method="post">
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="cardNumber">Payer Name</label>
                            <input class="form-control" name="name" type="text" id="cardNumber"
                                   placeholder="Full Name" required
                                   value="">
                        </div>

                        <div class="mb-3">
                            <label for="cardNumber">Transaction Number</label>
                            <input class="form-control" name="trn" type="text" id="cardNumber"
                                   placeholder="*** ×××× ×××× ××××" required
                                   value="">
                            <small class="ml-1"><i class="fa fa-lock mr-1"></i>Your
                                payment info is stored securely.
                            </small>
                        </div>

                        <input class="btn btn-warning btn-lg w-100" name="submit" type="submit" value="Order Now">
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>
<!-- Footer Nav-->
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between pl-0">
                <li class="active"><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#"><i class="fa fa-search"></i>Search</a></li>
                <li><a href="cart.php">
                        <span>
                            <i class="fa fa-shopping-cart">
                                <?php
                                if ($c_cart != null) {
                                    if ((sqlsrv_num_rows($c_cart) > 0) > 0) {
                                        ?>
                                        <span class="ml-3 badge badge-warning"
                                              style="background: #ffaf00 !important;margin-left: 45px !important;margin-top: -25px;display: list-item;padding: 1px;z-index: 100;border-radius: 50px;width: 20px;margin-bottom: 15px;">
                                          <?php echo sqlsrv_num_rows($c_cart); ?>
                                    </span>
                                    <?php
                                    }
                                } ?>
                            </i>
                        </span>
                        <span>Cart</span>
                    </a>
                </li>
                <li><a href="settings.php"><i class="fa fa-cog"></i>Settings</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- All JavaScript Files-->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/default/jquery.passwordstrength.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jarallax.min.js"></script>
<script src="js/jarallax-video.min.js"></script>
<script src="js/default/dark-mode-switch.js"></script>
<script src="js/default/active.js"></script>
<script src="js/pwa.js"></script>
</body>

</html>