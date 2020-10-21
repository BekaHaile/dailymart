<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$cart = null;
$c_cart = null;
$landmark = find_all_Land_mark();
$location = null;

if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $cart = find_all_cart_by_customer($_SESSION["customer_id"]);
}

$total = 0;
if (isset($_POST["submit"])) {
    $shipping = $_POST["selector"];
    $date_time = $_POST["date_time"];
    $location = $_GET["location"];
    redirect_to("checkout-payment.php?type=" . $shipping . "&date_time=" . $date_time . "&location=" . $location);
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
            <h6 class="mb-0">Delivery Option</h6>
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

            <form action="#" method="post">
                <!-- Shipping Method Choose-->
                <div class="shipping-method-choose mb-3">
                    <div class="card shipping-method-choose-title-card bg-success">
                        <div class="card-body">
                            <h6 class="text-center mb-0 text-white">How would you like to collect?</h6>
                        </div>
                    </div>
                    <div class="card shipping-method-choose-card">
                        <div class="card-body">
                            <div class="shipping-method-choose">
                                <ul class="pl-0">
                                    <li>
                                        <input id="fastShipping" type="radio" name="selector" checked value="Pickup"
                                               onclick="changeCollectTitle()">
                                        <label for="fastShipping">

                                            <table class="table mb-0">
                                                <tbody>
                                                <tr>
                                                    <th scope="row" rowspan="2" colspan="2" style="padding: 0">
                                                        <img src="img/pickup.png">
                                                    </th>
                                                    <td style="padding: 0;color: #1613d2;border-bottom-width:0">
                                                        Collect from shop
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0;border-bottom-width:0">
                                        <span
                                            style="margin-left: 0">Collect your shopping from your selected location</span>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>

                                        </label>

                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        <input id="normalShipping" type="radio" name="selector" value="Deliver"
                                               onclick="changeDeliveryTitle()">
                                        <label for="normalShipping">
                                            <table class="table mb-0">
                                                <tbody>
                                                <tr>
                                                    <th scope="row" rowspan="2" colspan="2" style="padding: 0">
                                                        <img src="img/deliver.png">
                                                    </th>
                                                    <td style="padding: 0;color: #1613d2;border-bottom-width:0">
                                                        Home Delivery
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0;border-bottom-width:0">
                                        <span
                                            style="margin-left: 0">Your online shopping delivered to your home door.</span>
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

                <!--Deliver Date Location-->
                <div class="mb-3">

                    <!--    <div class="card shipping-method-choose-title-card bg-success">-->
                    <!--        <div class="card-body">-->
                    <h6 class="text-center mb-0 text-white" id="CDtitle"
                        style="color: #000000 !important;text-align: left !important;">
                        Select collection date and time</h6>
                    <!--        </div>-->
                    <!--    </div>-->

                    <div class="card shipping-method-choose-card">

                        <div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z" id="DLocation"
                             hidden
                             style="display: flex;">

                            <select class="form-control" id="locations" name="locations" required="required"
                                    style="border-radius: 0 0 15px 15px;;border: 3px solid lightgray;"
                                    onchange="enableDateTime(this.value)">
                                <option disabled selected hidden>Select Delivery Location Area</option>
                                <?php
                                while ($row = sqlsrv_fetch_array($landmark, SQLSRV_FETCH_ASSOC)) {
                                    ?>
                                    <option value="<?php echo $row["code"]; ?>"><?php echo $row["title_en"]; ?></option>
										<!--<option
                                        value="<?php echo $row["code"]; ?>"><?php echo $row["title_en"] . "/" . $row["title_am"]; ?></option>-->
                                <?php
                                } ?>

                            </select>
                            <span class="fa fa-caret-down" style="margin-left: -35px;font-size: 25px;padding-top: 10px;"></span>
                        </div>

                        <div class="card-body" id="TWCD">
                            <div class="shipping-method-choose">
                                <ul class="pl-0" style="width: 100%">
                                    <li style="width: 50%;float: left">
                                        <input id="today" type="radio" name="CDdate" checked value="Today" onClick="changeDate()">
                                        <label for="today">

                                            <table class="table mb-0">
                                                <tbody>
                                                <tr>
                                                    <!--                                    <th scope="row" rowspan="2" colspan="2" style="padding: 0">-->
                                                    <!--                                        <img src="img/pickup.png">-->
                                                    <!--                                    </th>-->
                                                    <td style="padding: 0;color: #1613d2;border-bottom-width:0">
                                                        Today
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </label>

                                        <div class="check"></div>
                                    </li>
                                    <li style="width: 50%;float: right">
                                        <input id="tomorrow" type="radio" name="CDdate" value="Tomorrow" onClick="changeDate()">
                                        <label for="tomorrow">
                                            <table class="table mb-0">
                                                <tbody>
                                                <tr>
                                                    <!--                                    <th scope="row" rowspan="2" colspan="2" style="padding: 0">-->
                                                    <!--                                        <img src="img/deliver.png">-->
                                                    <!--                                    </th>-->
                                                    <td style="padding: 0;color: #1613d2;border-bottom-width:0">
                                                        Tomorrow
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

                        <div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z" id="DTime"
                             style="display: flex;">

                            <select class="form-control" id="timerange" name="timerange" required="required"
                                    onchange="displayPrice()"
                                    style="border-radius: 0 0 15px 15px;;border: 3px solid lightgray;">
                                    <option disabled selected hidden>Choose a convenient time</option>
                                <?php 
                                    $var2 = strtotime(date('H:00')) + 60*60;
									$var = date('H:i', $var2);
                                    $hour = strtotime($var) + 60*60;
                                    $hourTime = date('H:i', $hour);
                                    $nexthour = strtotime($hourTime) + 60*60;
                                    $nextHourTime = date('H:i', $nexthour);
                                    $i = 0;

                                    while(strtotime($hourTime)<strtotime("19:00")){
                                ?>
                                <option value="<?php echo $hourTime."-".$nextHourTime ?>"> <?php echo $hourTime."-".$nextHourTime ?> </option>

                                    <?php 
                                        $hour = strtotime($hourTime) + 60*60;
                                        $hourTime = date('H:i', $hour);
                                        $nexthour = strtotime($hourTime) + 60*60;
                                        $nextHourTime = date('H:i', $nexthour);
                                     } ?>

                                
                                <!-- <?php
                                    while ($row = sqlsrv_fetch_array($time_range, SQLSRV_FETCH_ASSOC)) {
                                ?>
                                    <option value="">Choose a convenient time</option>

                                <option value="<?php echo $row['time_range']?>"><?php echo $row['time_range']?></option>

                                    <?php } ?> -->

                            </select>
                            <span class="fa fa-caret-down" style="margin-left: -35px;font-size: 25px;padding-top: 10px;"></span>
                        </div>

                        <div class="card shipping-method-choose-card">
                            <div class="card-body">
                                <div class="shipping-method-choose" id="displaySummery">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Cart Amount Area-->
                <div class="card cart-amount-area" style="margin-bottom: 25px;">
                    <div class="card-body d-flex align-items-right justify-content-between">
                        <!--                        <h5 class="total-price mb-0">ETB <span class="">-->
                        <?php //echo $_GET["total"] ?><!--</span></h5>-->
                        <button type="button" name="confirm" onclick="checkout()" class="btn btn-warning" style="margin-left: auto; margin-right: auto;">
                            Book Slot
                        </button>
                    </div>
                </div>
            </form>
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

    function changeDeliveryTitle() {
        $("#CDtitle").html("Select delivery location, date and time");

        let loc = document.getElementById('DLocation');

        loc.removeAttribute("hidden");

        document.getElementById("today").disabled = true;
        document.getElementById("tomorrow").disabled = true;
        document.getElementById("timerange").disabled = true;
        document.getElementById("TWCD").style.background = "#e9ecef";
//        $("#TWCD").children().prop('disabled',true);
    }

    function changeCollectTitle() {
        $("#CDtitle").html("Select collection date and time");
        let loc = document.getElementById('DLocation');
        
        changeDate();

        loc.setAttribute("hidden", true);

        document.getElementById("today").disabled = false;
        document.getElementById("tomorrow").disabled = false;
        document.getElementById("timerange").disabled = false;
        document.getElementById("TWCD").style.background = "#fff";
    }

    function changeDate(){
        var typeCH = document.getElementsByName("selector");
        var CDdateCH = document.getElementsByName("CDdate");
        var shop = "<?php echo $_GET["location"];?>";

        var sel = document.getElementById("locations");
        var landmark= sel.options[sel.selectedIndex].value;

        var type = "";
        var CDdate = "";

        for (i = 0; i < typeCH.length; i++) {
            if (typeCH[i].checked) {
                type = typeCH[i].value;
            }
        }

        for (i = 0; i < CDdateCH.length; i++) {
            if (CDdateCH[i].checked) {
                CDdate = CDdateCH[i].value;
            }
        }

        $.ajax({
            url: "time_range.php",
            data: {type: type, time: CDdate, shop: shop, landmark: landmark},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);

                $("#DTime").html(resp);
            }
        });
    }

    function enableDateTime(value) {

        if (value != "") {
            document.getElementById("today").disabled = false;
            document.getElementById("tomorrow").disabled = false;
            document.getElementById("timerange").disabled = false;
            document.getElementById("TWCD").style.background = "#fff";

            changeDate(value);

        } else {
            document.getElementById("today").disabled = true;
            document.getElementById("tomorrow").disabled = true;
            document.getElementById("timerange").disabled = true;
        }
    }

    function displayPrice() {
        var typeCH = document.getElementsByName("selector");
        var location = document.getElementsByName("locations")[0].value;
        var CDdateCH = document.getElementsByName("CDdate");
        var CDtime = document.getElementsByName("timerange")[0].value;
        var shope = "<?php echo $_GET["location"];?>";

        var type = "";
        var CDdate = "";

        for (i = 0; i < typeCH.length; i++) {
            if (typeCH[i].checked) {
                type = typeCH[i].value;
            }
        }

        for (i = 0; i < CDdateCH.length; i++) {
            if (CDdateCH[i].checked) {
                CDdate = CDdateCH[i].value;
            }
        }

//        alert(shope + type + location + CDdate + CDtime);
        $.ajax({
            url: "addToCart.php",
            data: {type: type, locations: location, cddate: CDdate, cdtime: CDtime, shope: shope},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);

                $("#displaySummery").html(resp);
            }
        });
    }

    function checkout() {
        var typeCH = document.getElementsByName("selector");
        var location = document.getElementsByName("locations")[0].value;
        var CDdateCH = document.getElementsByName("CDdate");
        var CDtime = document.getElementsByName("timerange")[0].value;
        var shope = "<?php echo $_GET["location"];?>";
		var total = "<?php echo $_GET["total"]; ?>";
		var amount = "<?php echo $_GET["amount"]; ?>";

        var type = "";
        var CDdate = "";

        for (i = 0; i < typeCH.length; i++) {
            if (typeCH[i].checked) {
                type = typeCH[i].value;
            }
        }

        for (i = 0; i < CDdateCH.length; i++) {
            if (CDdateCH[i].checked) {
                CDdate = CDdateCH[i].value;
            }
        }

        if (location == "") {
            $.ajax({
                url: "errorHandling.php",
                data: {location: "error"},
                method: "POST",
                success: function (rt) {
                    var resp = $.trim(rt);

                    $("#cartStatus").html(resp);
                }
            });
        }

        if (CDtime == "") {
            $.ajax({
                url: "errorHandling.php",
                data: {CDtime: "error"},
                method: "POST",
                success: function (rt) {
                    var resp = $.trim(rt);

                    $("#cartStatus").html(resp);
                }
            });
        }


        if (type != "" && CDdate != "" && CDtime != "" && shope != "")
            window.open("checkout-payment.php?type=" + type + "&CDdate=" + CDdate + "&CDtime=" + CDtime + "&location=" + location + "&shope=" + shope + "&total=" + total + "&amount=" + amount, "_self");

    }

</script>
</body>

</html>