<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$user = null;
$c_cart = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $user = find_all_customer_by_id($_SESSION["customer_id"]);
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
        <div class="back-button"><a href="cart.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Checkout &amp Pay</h6>
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

            <!-- Billing Address-->
            <div class="billing-information-card mb-3">
                <div class="card billing-information-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Billing Information</h6>
                    </div>
                </div>
                <div class="card user-data-card">
                    <div class="card-body">
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="lni lni-user"></i><span>Deliver from Shop</span></div>
                            <div
                                class="data-content">
									<?php 
									$shop = find_shop_by_id($_GET["shope"]);
									echo $shop["title_en"]; 
									?>
								</div>
                        </div>
						<div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="lni lni-user"></i><span>Number of Item</span></div>
                            <div
                                class="data-content"><?php echo $_GET["total"]." items"; ?></div>
                        </div>
						<div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="lni lni-user"></i><span>Total Amount</span></div>
                            <div
                                class="data-content"><?php echo number_format($_GET["amount"],2) . " ETB"; ?></div>
                        </div>
						<div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="lni lni-user"></i><span>Order Type</span></div>
                            <div
                                class="data-content"><?php echo $_GET["type"]; ?></div>
                        </div>
						<div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="lni lni-user"></i><span>Date Time</span></div>
                            <div
                                class="data-content"><?php echo $_GET["CDdate"]." /".$_GET["CDtime"]; ?></div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone</span>
                            </div>
                            <div class="data-content"><?php echo $user["mobile_number"]; ?></div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="lni lni-cart"></i><span>Invoice To Name</span>
                            </div>

                            <input class="form-control" id="billTo"
                                   value="<?php echo (trim($user["bill_to_name"]) === "" || trim($user["bill_to_name"]) === NULL )?trim($user["first_name"]) . " " . trim($user["middle_name"]) . " " . trim($user["last_name"]):trim($user["bill_to_name"]); ?>"/>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="lni lni-cart"></i><span>Tin Number</span>
                            </div>

                            <input class="form-control" id="tinNumber"
                                   value="<?php echo trim($user["tin_number"]); ?>"/>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between"
                             style="float: right">
                            <button type="button" class="btn btn-warning"
                                    onclick="updateTin(<?php echo $user["id"]; ?>)">
                                Confirm Information
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Choose Payment Method-->
            <div class="choose-payment-method">
                <h6 class="mb-3 text-center">Choose Payment Method</h6>

                <div class="row justify-content-center g-3">
                    <!-- Single Payment Method-->
                    <div class="col-4 col-md-4">
                        <div class="single-payment-method">
                            <a class="credit-card"
                               href="checkout-credit-card.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>">
                                <i class="lni lni-credit-cards"></i>
                                <h6>Online Banking</h6>
                            </a>
                        </div>
                    </div>

                    <!-- Single Payment Method-->
                    <div class="col-4 col-md-4">
                        <div class="single-payment-method">
                            <a class="paypal"
                               href="checkout-cash.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>">
                                <i class="lni lni-revenue"></i>
                                <h6>Cash on delivery</h6>
                            </a>
                        </div>
                    </div>

                    <!-- Single Payment Method-->
                    <div class="col-4 col-md-4">
                        <div class="single-payment-method">
                            <a class="bank"
                               href="checkout-bank_account.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>">
                                <i class="lni lni-restaurant"></i>
                                <h6>Bank Transfer</h6>
                            </a>
                        </div>
                    </div>

                    <!-- Single Payment Method-->
                    <div class="col-6 col-md-5">
                        <div class="single-payment-method">
                            <!--                            <a class="cash" href="checkout-paypal.php?type=-->
                            <?php //echo $_GET["type"]; ?><!--">-->
                            <!--                                <i class="lni lni-revenue"></i>-->
                            <!--                                <h6>Credit</h6>-->
                            <!--                            </a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="cartStatus"></div>
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
<script src="js/jquery.js"></script>
<script>
    function updateTin(id) {
        var x = document.getElementById("tinNumber").value;
        var bill = document.getElementById("billTo").value;

        $.ajax({
            url: "addToCart.php",
            data: {TinNumber: x, UID: id, billto: bill},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);
                $("#cartStatus").html(resp);
            }
        });

    }
</script>
</body>

</html>