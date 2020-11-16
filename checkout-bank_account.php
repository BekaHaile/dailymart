<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
require_once("curl_helper.php");
$c_cart = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);

}
if (isset($_POST["submit"])) {

    $shipping = $_GET["type"];
    $bank = $_POST["bank"];
    $user = find_all_customer_by_id($_SESSION["customer_id"]);
    $mobile = trim($user["mobile_number"]);
    $message = "";
    $account = "";
    $check = false;
    if ($bank == "CBE") {
        $check = true;
        $account = "1000085698745";
        $message = "Please deposit to CBE account = 1000085698745 and name = Daily Mart Thank you!!";
    } else if ($bank == "Awash") {
        $check = true;
        $account = "35840085698745";
        $message = "Please deposit to Awash Bank account = 35840085698745 and name = Daily Mart Thank you!!";
    } else if ($bank == "Dashen") {
        $check = true;
        $account = "55540085698745";
        $message = "Please deposit to Awash Bank account = 55540085698745 and name = Daily Mart Thank you!!";
    } else {
        $check = false;
    }
//    $action = "GET";
//    $url = "http://172.16.32.42/sms/main/send_sms_code";
//    $parameters = array("phone_number" => "0930800600", "message" => "Test");
//    $result = CurlHelper::perform_http_request($action, $url, $parameters);

//    echo print_r($result);

    if ($check) {

        redirect_to("checkout-bank.php?type=" . $shipping . "&bank=" . $bank . "&account=" . $account . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]);
    }


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
                href="checkout-payment.php?type=<?php echo $_GET["type"] . "&CDdate=" . $_GET["CDdate"] . "&CDtime=" . $_GET["CDtime"] . "&location=" . $_GET["location"] . "&shope=" . $_GET["shope"]. "&total=" . $_GET["total"] . "&amount=" . $_GET["amount"]; ?>"><i
                    class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0"><?php echo $lang['bankAccountInfo']; ?></h6>
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
                    <p><?php echo $lang['makeYourPayment']; ?> </p>
					
                </div>
                <form action="" method="post">
                    <div class="shipping-method-choose mb-3">
                        <div class="card shipping-method-choose-title-card bg-success">
                            <div class="card-body">
                                <h6 class="text-center mb-0 text-white"><?php echo $lang['chooseBank']; ?></h6>
                            </div>
                        </div>

                        <div class="card shipping-method-choose-card">
                            <div class="card-body">
                                <div class="shipping-method-choose">
                                    <ul class="pl-0">
                                        <li>
                                            <input id="cbe" type="radio" name="bank" checked value="CBE">
                                            <label for="cbe">
                                                <table class="table mb-0">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row" rowspan="3" colspan="2" style="padding: 0">
                                                            <img src="img/cbe.png">
                                                        </th>
                                                        <td style="padding: 0;color: #1613d2;border-bottom-width:0">
                                                        <?php echo $lang['commercialBankOf']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;border-bottom-width:0">
                                                            <span style="margin-left: 0"><?php echo $lang['account']; ?> = 100008569857</span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;border-bottom-width:0">
                                                            <span style="margin-left: 0"><?php echo $lang['nameDailyMini']; ?></span>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </label>

                                            <div class="check"></div>
                                        </li>

                                        <li>
                                            <input id="awash" type="radio" name="bank" value="Awash">
                                            <label for="awash">
                                                <table class="table mb-0">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row" rowspan="3" colspan="2" style="padding: 0">
                                                            <img src="img/awash.png">
                                                        </th>
                                                        <td style="padding: 0;color: #1613d2;border-bottom-width:0">
                                                        <?php echo $lang['awashBank']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;border-bottom-width:0">
                                                            <span style="margin-left: 0"><?php echo $lang['account']; ?> = 35214855522555</span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;border-bottom-width:0">
                                                            <span style="margin-left: 0"><?php echo $lang['nameDailyMart']; ?></span>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </label>

                                            <div class="check"></div>
                                        </li>

                                        <li>
                                            <input id="dashen" type="radio" name="bank" value="Dashen">
                                            <label for="dashen">
                                                <table class="table mb-0">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row" rowspan="3" colspan="2" style="padding: 0">
                                                            <img src="img/dashen.png">
                                                        </th>
                                                        <td style="padding: 0;color: #1613d2;border-bottom-width:0">
                                                        <?php echo $lang['dashenBank']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;border-bottom-width:0">
                                                            <span style="margin-left: 0"><?php echo $lang['account']; ?> = 1255588568546</span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;border-bottom-width:0">
                                                            <span style="margin-left: 0"><?php echo $lang['nameDailyMart']; ?></span>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </label>

                                            <div class="check"></div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input class="btn btn-warning btn-lg w-100" name="submit" type="submit" value="<?php echo $lang['payNow']; ?>">
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
<script>
    function searchBtn() {

        $search = document.getElementById("search").value;

        if ($search != "")
            window.open("search.php?search=" + $search, "_self");

    }
</script>
</body>

</html>