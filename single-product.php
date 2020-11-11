<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$item = find_item_by_id($_GET["id"]);
$price = find_price_by_item_id($item["item_id"]);
$discount_per = find_discount_by_item_id($item["item_id"]);

$user = null;
if (isset($_SESSION["customer_id"])) {
    $user = find_all_customer_by_id($_SESSION["customer_id"]);
}

if (isset($_POST["submit"])) {
    if (!isset($_SESSION["customer_id"])) {
        redirect_to("login.php");
    }

    if (isset($_POST["item"]) && isset($_POST["quantity"])) {

        $items = find_item_by_item_id(trim($_POST["item"]));

        $qty = $_POST["quantity"];
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
            echo '<div class="add2cart-notification animated fadeIn" id="flash-msg" style="padding: 0px">
                         <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #00b894;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0"><i class="icon fa fa-check"></i>Success!</h4>
                  </div>';

        } else {
            echo '<div class="alert alert-danger alert-dismissable" id="flash-msg1" style="padding: 0px">
                         <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #00b894;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0"><i class="icon fa fa-check"></i>Error!</h4>
                  </div>';
        }
//        usleep(10000);
//
//        redirect_to("product.php?id=" . $item["brand_id"]);


    } else {
        $_SESSION["art_error"] = "Please Fill All Fields ";
    }
}
$c_cart = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);

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
        <div class="back-button"><a <?php if(isset($_GET['type'])){ if($_GET['type'] == 'home'){ ?> href=home.php <?php } 
		else if($_GET['type'] == 'topItem'){ ?> href=topItem.php <?php } 
		else ?> href="<?php echo $_GET['type'] ?>.php?&type=<?php echo $_GET["mainType"]; ?>&id=<?php echo $_GET["mainId"]; ?>" <?php } 
		else { ?> href="product-list.php?id=<?php echo $item["brand_id"]; ?>" <?php } ?>><i
                    class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Product Details</h6>
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
    <!-- Product Slides-->
    <div class="product-slides owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-product-slide"
             style="background-image: url('<?php echo "admin/" . $item["image"]; ?>')"></div>
    </div>
    <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
            <div class="container d-flex justify-content-between">
                <div class="p-title-price">
				<?php $check = sqlsrv_num_rows(check_inventory_total_balance($item["item_id"], "1")); ?>
                    <h6 class="mb-1" <?php if($check == 0|| !isset($price["price"])) { ?> style="color: gray;"<?php } ?>><?php echo $item["title_en"]; ?></h6>

                    <p class="sale-price mb-0" <?php if($check == 0|| !isset($price["price"])) { ?> style="color: gray;"<?php } ?>>
                        <?php echo (isset($discount_per["discount_per"])) ? "ETB " . number_format($price["price"] - $price["price"] * ($discount_per["discount_per"] / 100), 2, '.', ',') : "ETB " . $price["price"]; ?>
                        <span style="font-size: 12px;">
                           <?php echo (isset($discount_per["discount_per"])) ? "ETB " . $price["price"] : ""; ?>
                        </span><span style="font-size: 9px;text-decoration: none;text-transform: lowercase;color: #000"><?php echo "(".trim($price["uom"]).")"; ?></span>
                    </p>
                </div>
            </div>

        </div>

        <!-- Add To Cart-->
        <div class="cart-form-wrapper bg-white mb-3 py-3">
            <div class="container">
                <!-- Choose Size-->
                <div class="choose-size-wrapper text-left">
                    <p class="mb-1 font-weight-bold">Select Item</p>
                </div>
                <form class="cart-form row" action="#" method="post">
                    <div class="row col-md-12 mb-3">
                        <div class="col-md-6" style="width: 65%">
                            <div class="form-check mb-0 mr-3">
                                <input class="form-check-input" checked name="item" type="radio"
                                       value="<?php echo $item["item_id"]; ?>">
                                <label class="form-check-label"
                                       for="sizeRadio3"><?php echo $item["title_en"]; ?></label>
                            </div>
                        </div>

                        <div class="col-md-5 order-plus-minus d-flex align-items-center"
                             style="display:inline-flex !important;width: 35%">

                            <div class="quantity-button-handler">-</div>

                            <input class="form-control cart-quantity-input" id="qty" type="text" step="1"
                                   name="quantity" value="1">

                            <div class="quantity-button-handler">+</div>

                        </div>
						<span style="text-align: center; color: red;"><?php
                                                            if($check == 0 || !isset($price["price"])) echo 'Out of stock'; ?></span>
                    </div>


                    <div class="col-md-10 text-center">
                        <?php if(isset($_SESSION["customer_id"])) { ?>
                        <input type="submit" name="submit" id="submit" style="width:75%" class="btn btn-danger ml-3"
                               value="Add To Cart" <?php if($check == 0|| !isset($price["price"])) { ?> disabled style="color: gray;"<?php } ?>/>
                    <?php }
                        else { ?>

                        <a href="#" data-toggle="modal" data-target="#myModal2"><input type="button" name="toggle" id="toggle" style="width:75%" class="btn btn-danger ml-3"
                               value="Add To Cart"/></a>
                        <?php } ?>

                    </div>

                </form>
            </div>
        </div>
		
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
            <div class="container">
                <h6>Specifications</h6>

                <p><?php echo $item["specifications_en"]; ?></p>
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
                                    <?php }
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
<?php require_once("register-modal.php"); ?>
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
<script src="js/notify.js"></script>
<script>
    function searchBtn() {

        $search = document.getElementById("search").value;

        if ($search != "")
            window.open("search.php?search=" + $search, "_self");

    }
</script>
<script>
    $(document).ready(function () {
        $('#flash-msg').delay(1000).hide(500);

    });
</script>
</body>

</html>