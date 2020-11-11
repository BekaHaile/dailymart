<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$orders = 0;
$cart = null;
$c_cart = null;
$location = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $location = find_all_location();
}

$total = 0;

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
	<style> 
        .blink {
        color: #008000; 
		font-weight: bold;
        margin-top: -10px;
        white-space: nowrap;
        overflow: hidden;
        width: 30em;
        animation: type 4s steps(60, end) infinite; 
        }

        @keyframes type{ 
        from { width: 0; } 
        } 
    </style> 


    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
</head>
<!--<body>-->
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
        <div class="back-button"><a href="home.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">My Basket</h6>
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
        <input id="changeVal" type="text" style="height: 0;width: 0;display: contents">
        <!-- Cart Wrapper-->
        <form>
            <div class="mt-5">

                <label for="cardNumber"> <span style="display: none">Waiting</span></label>
				
				<div class='blink'> Select your nearby Shop </div>
				<div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z" id="DTime"
                             style="display: flex;">
                            <select class="form-control" id="locations" name="locations" 
                                    onchange="updateCart()"
                                    style="border-radius: 0 0 15px 15px;;border: 3px solid lightgray;">
                                <option value="" disabled selected hidden>Location</option>
                                <?php if ($c_cart != null) {
								while ($row = sqlsrv_fetch_array($location, SQLSRV_FETCH_ASSOC)) {
									?>
									<option value="<?php echo $row["location"]; ?>"><?php echo $row["location_desc"]; ?></option>
									<?php
										}
									} ?>

                            </select>
                            <span class="fa fa-caret-down" style="margin-left: -35px;font-size: 25px;padding-top: 10px;"></span>
                </div>

            </div>
        </form>

        <div class="cart-wrapper-area py-3" id="cartPlace">

            <div class="cart-table card mb-3">
                <div class="table-responsive card-body">
                    <table class="table mb-0">
                        <tbody>
                        <?php
                        if ($c_cart != null) {
                            while ($row = sqlsrv_fetch_array($cart, SQLSRV_FETCH_ASSOC)) {
//                                $check = sqlsrv_num_rows(check_inventory_balance($row["item"], "*", $row["qty"]));

                                $price = find_price_by_item_id($row["item"]);
                                $discount_per = find_discount_by_item_id($row["item"]);

//                                $value = "";

                                if (isset($discount_per["discount_per"]))
                                    $unit = $price["price"] - $price["price"] * ($discount_per["discount_per"] / 100);

                                else
                                    $unit = $price["price"];

                                ?>

                                <tr>
                                    <th scope="row">
                                        <a class="remove-product" href="deleteCart.php?id=<?php echo $row["id"]; ?>">
                                            <i class="lni lni-close"></i>
                                        </a>
                                    </th>
                                    <td>
                                        <img style="border-radius: 0.25rem;" src="<?php echo "admin/" . find_item_by_item_id($row["item"])["image"]; ?>"
                                             alt="">
                                    </td>
                                    <td>
                                        <a href="single-product.php?id=<?php echo find_item_by_item_id($row["item"])["id"]; ?>"><?php echo $row["item_description"]; ?>
                                            <span>ETB  <?php echo number_format($unit,2) . " * " . $row["qty"].  "<strong style=\"font-size: 9px;text-decoration: none;text-transform: lowercase;color: #81849d\">(".trim($price["uom"]).")</strong>"; ?></span>
                                        </a>
                                    </td>
                                    <td style="vertical-align: bottom">
                                        <a>
                                            <span>ETB <?php echo number_format($unit,2) * $row["qty"] ?></span>
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

            <div class="card cart-amount-area">

                <div class="card-body d-flex align-items-center justify-content-between">
                    <h5 class="total-price mb-0">ETB <span class="" id="totalAmount"><?php echo number_format($total,2); ?></span>
                    </h5>
                    <?php if ($total > 0) { ?>
                        <button type="button" id="confirm" onclick="checkoutBtn()" class="btn btn-warning add2cart-notification">
         444                   Confirm shopping
                        </button>
                    <?php } ?>

                </div>

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
				<li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i>Search</a></li>
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

    function updateCart() {

        var x = document.getElementById("locations").value;

        $.ajax({
            url: "addToCart.php",
            data: {location: x},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);

                $("#cartPlace").html(resp);
            }
        });
    }

    function checkoutBtn(orders,amount) {

        $loc = document.getElementById("locations").value;
        $balance = document.getElementById("totalAmount").value;
		$totals = "<?php echo $orders;?>";

        if ($loc != "" && $balance != "")
            window.open("checkout.php?location=" + $loc + "&total=" + orders + "&amount=" + amount, "_self");

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