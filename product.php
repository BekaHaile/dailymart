<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$item = find_item_by_brand_id($_GET["id"]);
$brand = find_brand_by_brand_id($_GET["id"]);
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
        <div class="back-button"><a href="sub-catagory.php?id=<?php echo $brand["product_id"]; ?>"><i
                    class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0"><?php echo $lang['dailyMartOnline']; ?></h6>
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

<div class="page-content-wrapper">
    <!-- Catagory Single Image
	<div class="catagory-single-img" style="background-image: url('img/bg-img/5.jpg')"></div>
    -->
    <!-- Top Products-->
    <div class="top-products-area py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <div style="width: 28%;" class="section-heading d-flex align-items-center justify-content-between">
                    <!--                <h6 class="ml-1">All Products</h6>-->
                    <!-- Layout Options-->
                    <div class="layout-options">
                        <a href="product-list.php?id=<?php echo $_GET["id"]; ?>"><i
                                class="lni lni-radio-button"></i></a>
                        <a class="active" href="product.php?id=<?php echo $_GET["id"]; ?>"><i
                                class="lni lni-grid-alt"></i></a>
                    </div>
                </div>
                <div style="width: 71%;text-align: right;">
                    <h6 class="ml-1" style="font-size: 12px;">
                        <a style="font-style: italic;" href="home.php"><?php echo $lang['home']; ?></a> /
                        <a style="font-style: italic;"
                           href="catagory.php?id=<?php echo find_product_group_by_pro_id($brand["product_id"])["category_id"]; ?>"><?php if($_SESSION['lang'] == 'en'){ echo find_category_by_cat_id(find_product_group_by_pro_id($brand["product_id"])["category_id"])["title_en"]; }
                           else { echo find_category_by_cat_id(find_product_group_by_pro_id($brand["product_id"])["category_id"])["title_am"]; } ?></a>/
                        <a style="font-style: italic;"
                           href="sub-catagory.php?id=<?php echo $brand["product_id"]; ?>"><?php if($_SESSION['lang'] == 'en'){ echo find_product_group_by_pro_id($brand["product_id"])["title_en"]; }
                           else { echo find_product_group_by_pro_id($brand["product_id"])["title_am"]; } ?></a>/
                        <?php if($_SESSION['lang'] == 'en'){ echo $brand["title_en"]; } else { echo $brand["title_am"]; } ?>
                    </h6>
                </div>
            </div>
            <div class="row g-3">
                <?php
                while ($row = sqlsrv_fetch_array($item, SQLSRV_FETCH_ASSOC)) {
                    if ($row["image"] != null || $row["image"] != "") {
                        $price = find_price_by_item_id($row["item_id"]);
                        $discount_per = find_discount_by_item_id($row["item_id"]);
                        ?>

                        <!-- Single Top Product Card-->
                        <div class="col-6 col-md-6 col-lg-4">
                            <div class="card top-product-card" <?php if(!isset($price["price"])) { ?> style="opacity: 0.4; filter: alpha(opacity=40); background-color: #FFFFFF;" <?php } ?>>
                                <div class="card-body" style="padding:0.3rem">
                                    <a class="wishlist-btn" href="#"></a>
                                    <?php if(isset($price["price"])) { ?> <a class="product-thumbnail d-block"
                                       href="single-product.php?id=<?php echo $row["id"]; ?>"> <?php } ?>
                                        <img style="border-radius: 0.75rem; " class="mb-2" src="<?php echo "admin/" . $row["image"]; ?>" alt="">
                                    <?php if(isset($price["price"])) { ?> </a> <?php } ?>
									<?php $check = sqlsrv_num_rows(check_inventory_total_balance($row["item_id"], "1")); ?>
                                    <?php if(isset($price["price"])) { ?> <a class="product-title d-block text-center" style="font-size:12px; <?php if(!isset($price["price"])) { ?> color: gray;<?php } ?>"
                                       href="single-product.php?id=<?php echo $row["id"]; ?>"><?php } ?> 
                                       <div style="margin-bottom: 0.5rem; font-weight: 700; font-size: 12px;"> <?php if($_SESSION['lang'] == 'en' || trim($row["title_am"]) == ""){ echo $row["title_en"]; } 
                                       else { echo $row["title_am"]; } ?> </div>
									   <?php if(isset($price["price"])) { ?> </a> <?php } ?>

                                    <p class="sale-price text-center" style="font-size: 12px; <?php if(!isset($price["price"])) { ?> color: gray;<?php } ?>">
                                        <?php echo (isset($discount_per["discount_per"])) ? $lang['etb']." ". number_format($price["price"] - $price["price"] * ($discount_per["discount_per"] / 100), 2, '.', ',') : $lang['etb']." " . $price["price"]; ?>
                                        <span style="font-size: 12px;">
										   <?php echo (isset($discount_per["discount_per"])) ? $lang['etb']." ". $price["price"] : ""; ?>
										</span><span style="font-size: 9px;text-decoration: none;text-transform: lowercase;color: #000"><?php echo "(".trim($price["uom"]).")"; ?></span>
                                    </p>
									<span style="text-align: center; color:red; margin-bottom: 0.5rem; font-weight: 700; font-size: 12px;"><?php
                                                            if(!isset($price["price"])) echo $lang['outOfStock']; ?></span>
															
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
                                                            <?php if(isset($_SESSION["customer_id"])) { ?>
                                                            <input type="button" name="submit" id="submit"
                                                                style="padding: 0.375rem 0.5rem;"
                                                                onclick="addBtn(<?php echo $row["item_id"]; ?>)"
                                                                class="btn btn-danger" value="<?php echo $lang['add']; ?>" <?php if(!isset($price["price"])) { ?> disabled <?php }?>/>
                                                            <?php }
                                                        else { ?>

                                                        <?php if(isset($price["price"])) { ?> <a href="#" data-toggle="modal" data-target="#myModal2"> <?php }?> <input style="padding: 0.375rem 0.5rem;" type="button" name="toggle" id="toggle" style="width:75%" class="btn btn-danger ml-3"
                                                            value="<?php echo $lang['add']; ?>" <?php if(!isset($price["price"])) { ?> disabled <?php }?>/> <?php if(isset($price["price"])) { ?> </a> <?php }?>
                                                        <?php } ?>

                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } ?>

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
<script src="js/jquery.js"></script>
<script>

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
<script>
    function searchBtn() {

        $search = document.getElementById("search").value;

        if ($search != "")
            window.open("search.php?search=" + $search, "_self");

    }
</script>
</body>

</html>