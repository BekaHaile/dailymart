<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$product = find_product_group_by_category_id($_GET["id"]);
$category = find_category_by_cat_id($_GET["id"]);
$slid = find_category_slider($_GET["id"]);
$c_cart = null;
if (isset($_SESSION["customer_id"]))
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);

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
        <div class="back-button"><a href="home.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
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

<div class="page-content-wrapper">
<!-- Catagory Single Image-->
<div class="catagory-single-img" style="background-image: url('<?php echo "admin/" . $slid["image"]; ?>')"></div>
<!-- Product Catagories-->
<div class="product-catagories-wrapper py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
            <div style="width: 28%;" class="section-heading d-flex align-items-center justify-content-between">
                    <!--                <h6 class="ml-1">All Products</h6>-->
                    <!-- Layout Options-->
                    <div class="layout-options">
						<a class="active" href="catagory.php?id=<?php echo $_GET["id"]; ?>"><i class="lni lni-grid-alt"></i></a>
						<a href="#"><i class="lni lni-radio-button"></i></a></div>
            </div>
			<div style="width: 71%;text-align: right;">
			<h6 class="ml-1" style="font-size: 12px;">
				<a style="font-style: italic;" href="home.php">Home</a> / <?php echo $category["title_en"]; ?>
			</h6>
			</div>
            <span></span>
        </div>
		<a class="btn btn-danger btn-sm" style="margin-top: -0.5rem!important;margin-bottom: 1.0rem;"
               href="allProduct.php?type=catagory&id=<?php echo $_GET['id']; ?>">Browse All <?php echo $category["title_en"]; ?></a>
        <div class="product-catagory-wrap">
            <div class="row g-3">
                <?php while ($row = sqlsrv_fetch_array($product, SQLSRV_FETCH_ASSOC)) {
                    if ($row["image"] != null || $row["image"] != "") {
                        ?>
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body" style="padding: 0.1rem;">
                                    <a href="sub-catagory.php?id=<?php echo $row["product_Id"]; ?>">
                                        <i class="">
                                            <img src="<?php echo "admin/" . $row["image"]; ?>" alt=""
                                                 style="width: 100%">
                                        </i>
                                        <span style="color:#000"><?php echo $row["title_en"]; ?></span></a></div>
                            </div>
                        </div>
                    <?php
                    }
                } ?>
            </div>
        </div>
    </div>
</div>
<!-- Top Products-->


<!--<div class="top-products-area pb-3">-->
<!--<div class="container">-->
<!--<div class="section-heading d-flex align-items-center justify-content-between">-->
<!--    <h6 class="ml-1">Catagory Products</h6>-->
<!--</div>-->
<!--<div class="row g-3">-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn"-->
<!--                                                                               href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/11.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Beach Cap</a>-->
<!---->
<!--            <p class="sale-price">ETB 13<span>ETB 42</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/5.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Wooden Sofa</a>-->
<!---->
<!--            <p class="sale-price">ETB 74<span>ETB 99</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn"-->
<!--                                                                               href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/6.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Roof Lamp</a>-->
<!---->
<!--            <p class="sale-price">ETB 99<span>ETB 113</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-danger">-15%</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/9.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Sneaker Shoes</a>-->
<!---->
<!--            <p class="sale-price">ETB 87<span>ETB 92</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-danger">-11%</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/8.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Wooden Chair</a>-->
<!---->
<!--            <p class="sale-price">ETB 21<span>ETB 25</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-warning">Hot</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/4.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Polo Shirts</a>-->
<!---->
<!--            <p class="sale-price">ETB 38<span>ETB 41</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn"-->
<!--                                                                               href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/11.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Beach Cap</a>-->
<!---->
<!--            <p class="sale-price">ETB 13<span>ETB 42</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-primary">New</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/5.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Wooden Sofa</a>-->
<!---->
<!--            <p class="sale-price">ETB 74<span>ETB 99</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn"-->
<!--                                                                               href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/6.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Roof Lamp</a>-->
<!---->
<!--            <p class="sale-price">ETB 99<span>ETB 113</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-danger">-15%</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/9.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Sneaker Shoes</a>-->
<!---->
<!--            <p class="sale-price">ETB 87<span>ETB 92</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-danger">-11%</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/8.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Wooden Chair</a>-->
<!---->
<!--            <p class="sale-price">ETB 21<span>ETB 25</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- Single Top Product Card-->
<!--<div class="col-6 col-md-4 col-lg-3">-->
<!--    <div class="card top-product-card">-->
<!--        <div class="card-body"><span class="badge badge-warning">Hot</span><a class="wishlist-btn"-->
<!--                                                                              href="#"><i-->
<!--                    class="lni lni-heart"></i></a><a class="product-thumbnail d-block"-->
<!--                                                     href="single-product.php"><img class="mb-2"-->
<!--                                                                                    src="img/product/4.png"-->
<!--                                                                                    alt=""></a><a-->
<!--                class="product-title d-block" href="single-product.php">Polo Shirts</a>-->
<!---->
<!--            <p class="sale-price">ETB 38<span>ETB 41</span></p>-->
<!---->
<!--            <div class="product-rating"><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i-->
<!--                    class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>-->
<!--            <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->


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