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
            <h6 class="mb-0"><?php echo $lang['checkoutAndPay']; ?></h6>
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

 
            <!-- Choose Payment Method-->
            <div class="choose-payment-method" style="padding-top:50px;">
                <h6 class="mb-3 text-center"><?php echo $lang['choosePaymentMethod']; ?></h6>

                <div class="row justify-content-center g-3" >
                    <!-- Single Payment Method-->
                   <div class="col-4 col-md-4">
                        <div class="single-payment-method">
                            <a class="credit-card"
                               href="checkout-credit-card.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>">
                                <i class="lni lni-credit-cards"></i>
                                <h6><?php echo $lang['onlineBanking']; ?></h6>
                            </a>
                        </div>
                    </div>

                    <!-- Single Payment Method-->
                    <div class="col-4 col-md-4">
                        <div class="single-payment-method">
                            <a class="paypal"
                               href="checkout-cash.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>">
                                <i class="lni lni-revenue"></i>
                                <h6><?php echo $lang['cashOnDelivery']; ?></h6>
                            </a>
                        </div>
                    </div>

                    <!-- Single Payment Method-->
                    <div class="col-4 col-md-4">
                        <div class="single-payment-method">
                            <a class="bank"
                               href="checkout-bank_account.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>">
                                <i class="lni lni-restaurant"></i>
                                <h6><?php echo $lang['bankTransfer']; ?></h6>
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
                <li class="active"><a href="home.php"><i class="fa fa-home"></i><?php echo $lang['home']; ?></a></li>
                <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i><?php echo $lang['search']; ?></a></li>
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
                        <span><?php echo $lang['cart']; ?></span>
                    </a>
                </li>
                <li><a href="settings.php"><i class="fa fa-cog"></i><?php echo $lang['settings']; ?></a></li>
            </ul>
        </div>
    </div>
</div>
<?php require_once("footer.php"); ?>

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
<script>
    function searchBtn() {

        $search = document.getElementById("search").value;

        if ($search != "")
            window.open("search.php?search=" + $search, "_self");

    }
</script>
</body>

</html>