<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$c_cart = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
}
$search = trim($_GET['search']);

$header = find_all_product_group_by_item($search);
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

    <!--    <link type="text/css" rel="stylesheet" href="accordion/bootstrap.min.css">-->
    <link type="text/css" href="accordion/accordion.css" rel="stylesheet" media="all">
    <script type="text/javascript" src="accordion/respond.js"></script>
</head>
<body style="background-color: #e7eaf5">
<!-- Preloader-->
<!--<div class="preloader" id="preloader">-->
<!--    <div class="spinner-grow text-secondary" role="status">-->
<!--        <div class="sr-only">Loading...</div>-->
<!--    </div>-->
<!--</div>-->

<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="home.php"><i
                    class="lni lni-arrow-left"></i></a>
        </div>

        <div class="page-heading">
            <h6 class="mb-0">Daily Mart Online Shopping</h6>
        </div>

        <!-- Filter Option-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span>
        </div>
    </div>
</div>
<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>
<!-- Side Nav Wrapper-->
<?php
require_once("sidenav.php");
?>
<!-- Footer Page-->
<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between pl-0">
                <li class="active"><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i>Search</a>
                </li>
                <li><a href="cart.php">
                        <span>
                            <i class="fa fa-shopping-cart" id="cartNumber">
                                <?php
                                if ($c_cart != null) {
                                    if (sqlsrv_num_rows($c_cart) > 0) {
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

<div class="page-content-wrapper">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 document_header" id="dv_document_header"
         style="padding: 0;z-index: 1000;background: #006e35;color: white">

        <div class="dv_header3" style="margin-top: 0;padding-left: 10px;"></div>

    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="dv_scroll" style="margin-bottom: 50px;">

        <?php
        while ($row = sqlsrv_fetch_array($header, SQLSRV_FETCH_ASSOC)) {
            $row1 = find_product_group_by_pro_id($row["product_id"]);
            $items = find_item_by_product_group_id_search($row1["product_Id"], $search);
            if (sqlsrv_num_rows($items) > 0) {
                ?>
                <div class="single_container" style="padding-left: 1.5rem;padding-right: 1.5rem;">
                    <div class="single_container_header" style="padding: 0;background: #006e35;color: white">
                        <div class="dv_header3"
                             style="padding-left: 10px;"> <?php echo find_category_by_cat_id($row1["category_id"])["title_en"] . " / " . $row1["title_en"]; ?> </div>
                    </div>
                    <div class="row g-3" style="margin-bottom: var(--bs-gutter-y);">
                        <?php

                        while ($row = sqlsrv_fetch_array($items, SQLSRV_FETCH_ASSOC)) {
                            if ($row["image"] != null || $row["image"] != "") {
                                $price = find_price_by_item_id($row["item_id"]);
                                $discount_per = find_discount_by_item_id($row["item_id"]);
                                ?>

                                <div class="col-12 col-md-6">
                                    <div class="card weekly-product-card">
                                        <div class="card-body d-flex align-items-center" style="padding: 0.2rem">
                                            <div class="product-thumbnail-side">
                                                <a class="wishlist-btn" href="#"></a>
                                                <a class="product-thumbnail d-block"
                                                   href="single-product.php?id=<?php echo $row["id"]; ?>&type=allProduct">
                                                    <img style="border-radius: 0.75rem;"
                                                         src="<?php echo "admin/" . $row["image"]; ?>" alt=""></a></div>
                                            <div class="product-description">
                                                <a class="product-title d-block"
                                                   href="single-product.php?id=<?php echo $row["id"]; ?>&type=allProduct">
                                                    <?php echo $row["title_en"]; ?>
                                                </a>

                                                <p class="sale-price text-center" style="font-size: 12px;">
                                                    <?php echo (isset($discount_per["discount_per"])) ? "ETB " . number_format($price["price"] - $price["price"] * ($discount_per["discount_per"] / 100), 2, '.', ',') : "ETB " . $price["price"]; ?>
                                                    <span style="font-size: 12px;">
                                               <?php echo (isset($discount_per["discount_per"])) ? "ETB " . $price["price"] : ""; ?>
                                            </span><span
                                                        style="font-size: 9px;text-decoration: none;text-transform: lowercase;color: #000"><?php echo "(" . trim($price["uom"]) . ")"; ?></span>
                                                </p>

                                                <form class="cart-form row" action="#" method="post">
                                                    <div class="row col-md-12 mb-3">

                                                        <div class="col-md-5 order-plus-minus d-flex align-items-center"
                                                             style="display:inline-flex !important;width: 70%">

                                                            <div class="quantity-button-handler">-</div>

                                                            <input class="form-control cart-quantity-input"
                                                                   id="qty<?php echo $row["item_id"]; ?>" type="text"
                                                                   step="1"
                                                                   name="quantity" value="1">

                                                            <div class="quantity-button-handler">+</div>

                                                        </div>

                                                        <div class="col-md-6"
                                                             style="width: 30%;padding-left: 0;padding-right: 0">
                                                            <div class="col-md-10 text-center">
                                                                <input type="button" name="submit" id="submit"
                                                                       style="padding: 0.375rem 0.5rem;"
                                                                       onclick="addBtn(<?php echo $row["item_id"]; ?>)"
                                                                       class="btn btn-success" value="Add"/>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        }?>
                    </div>
                </div>

            <?php
            }
        }?>
    </div>

    <div id="cartStatus"></div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

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
<script type="text/javascript" src="accordion/bootstrap2.min.js"></script>
<script type="text/javascript" src="accordion/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="accordion/accordion.js"></script>
<script src="js/jquery.js"></script>
<script>

    function searchBtn() {

        $search = document.getElementById("search").value;

        if ($search != "")
            window.open("search.php?search=" + $search, "_self");

    }

    function searchProduct() {


        $('#preloader').fadeOut();
        var x = $("#search").val();

        $.ajax({
            url: "searchProduct.php",
            data: {search: x},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);
                $("#dv_scroll").html(resp);
            }
        });
    }

    function addBtn(id) {
        var qty = $("#qty" + id).val();

        $.ajax({
            url: "addToCart.php",
            data: {Item_id: id, Qty: qty},
            method: "POST",
            success: function (rt) {

                var posts = JSON.parse(rt);
                console.log(rt);
                console.log(posts);

                $("#cartStatus").html(posts.successMessage);
                $("#cartNumber").html(posts.cartValue);
                $('#qty').attr('value', 1);

            }
        });

    }
</script>
</body>

</html>