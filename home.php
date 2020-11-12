<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$category = find_all_Category();
$discount = find_all_discount();
$slider = find_home_slider();
$top = find_top_six_item();
$c_cart = null;
if (isset($_SESSION["customer_id"])) {
	//clearstatcache(true);
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $user = find_all_customer_by_id($_SESSION["customer_id"]);

}

if (isset($_POST['submit'])) {
    if($_SESSION['lang'] == 'en')
        $_SESSION['lang'] = 'am';
    else $_SESSION['lang'] = 'en';
    echo "<meta http-equiv='refresh' content='0'>";
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
    <!-- Title-->
    <title>Daily Mart</title>

    <link rel="shortcut icon" href="account/images/logo.png" type="image/x-icon"/>

    <!-- Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
</head>
<body>

<!-- Preloader-->
<!--<div class="preloader" id="preloader">-->
<!--    <div class="spinner-grow text-secondary" role="status">-->
<!--        <div class="sr-only">Loading...</div>-->
<!--    </div>-->
<!--</div>-->

<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span>
        </div>
        <!-- Logo Wrapper-->
        <div class="logo-wrapper">
            <a href="home.php">
                <img src="account/images/logo.png" style="width: 70px" alt="">
            </a>
        </div>
        <!-- Search Form-->
        <div class="top-search-form">
            <h6 class="mb-0"> <?php echo $lang['dailyMartOnline']; ?></h6>
            <!--            <form action="#" method="">-->
            <!--                <input class="form-control" type="search" placeholder="Enter your keyword">-->
            <!--                <button type="submit"><i class="fa fa-search"></i></button>-->
            <!--            </form>-->
        </div>
        <!-- Language Toggler-->
        <form action="#" method="post">
            <div>
                <?php if($_SESSION['lang'] == 'en'){ ?> <button type="submit" name="submit" value="Save" onclick="changeLan()" style="border: 1; background: none; box-shadow: none; border-radius: 0px;">EN</button> <?php }
                else { ?><button type="submit" name="submit" value="Save" onclick="changeLan()" style="border: 1; background: none; box-shadow: none; border-radius: 0px;">አማ</button> <?php } ?>
            </div>
        </form>
    </div>
</div>

<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>

<?php
require_once("sidenav.php");
?>

<div class="page-content-wrapper">

    <!-- Hero Slides-->
    <!-- <div class="hero-slides owl-carousel"> -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="color: black;"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
        <div class="carousel-inner">
        <?php $k = 1;
        while ($row = sqlsrv_fetch_array($slider, SQLSRV_FETCH_ASSOC)) { ?>
            
                    
                    <div class="carousel-item <?php if($k==1){ ?> active <?php } ?>">
                        
                        <?php if (isset($_SESSION['customer_id'])) { ?>
						<p style="color:black; position: absolute; top: 8px;left: 10px;"> Hello, <strong> <?php echo $user["first_name"] . " ".trim($user["middle_name"]);?>! </strong> </p>
						<?php } ?>
                        <img class="d-block w-100" src="<?php echo "admin/" . $row["image"]; ?>" alt="<?php echo $k; ?> slide">
                    </div>


        <?php $k++; } ?>
        </div>
    </div>

    <!-- Product Catagories-->
    <div class="product-catagories-wrapper py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1" style="margin-top: 0.5 rem;"> <?php echo $lang['productByCategory']; ?> </h6>
            </div>
            <div class="product-catagory-wrap">
                <div class="row g-3">
                    <?php while ($row = sqlsrv_fetch_array($category, SQLSRV_FETCH_ASSOC)) {
                        if ($row["image"] != null || $row["image"] != "") {
                            ?>
                            <!-- Single Catagory Card-->
                            <div class="col-4">
                                <div class="card catagory-card">
                                    <div class="card-body" style="padding:0.1rem">
                                        <a href="catagory.php?id=<?php echo $row["category_id"]; ?>">
                                            <i class="">
                                                <img src="<?php echo "admin/" . $row["image"]; ?>" alt=""
                                                     style="width: 100%;border-radius: 0.75rem">
                                            </i>
                                            <span style="color:#000">
                                            
                                            <?php if($_SESSION['lang'] == 'en'  || trim($row["title_am"]) == ""){ echo $row["title_en"]; } 
                                            else echo $row["title_am"];?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } ?>

                </div>
            </div>

            <a class="btn btn-danger btn-sm" style="margin-top: 1.5rem!important;margin-bottom: -1.0rem;"
               href="allProduct.php?type=all&id=0"> <?php echo $lang['browseAllProducts']; ?> </a>
        </div>
    </div>

    <?php if (sqlsrv_num_rows($discount) > 0) { ?>
        <!-- Flash Sale Slide-->
        <div class="flash-sale-wrapper">
            <div class="container">
                <div class="section-heading d-flex align-items-center justify-content-between">
                    <h6 class="ml-1">Discount Item</h6>
                    <a class="btn btn-primary btn-sm" href="discounted.php">View All</a>
                </div>
                <!-- Flash Sale Slide-->
                <div class="flash-sale-slide owl-carousel">
                    <?php
                    while ($row = sqlsrv_fetch_array($discount, SQLSRV_FETCH_ASSOC)) {
                        $item = find_item_by_id($row["item_id"]);
                        $price = find_price_by_item_id($row["item_id"]);
                        $discount_per = find_discount_by_item_id($row["item_id"]);
                        ?>
                        <!-- Single Flash Sale Card-->
                        <div class="card flash-sale-card">
                            <div class="card-body">
                                <a href="single-product.php?id=<?php echo $item["id"]; ?>&type=home">
                                    <img style="border-radius: 0.75rem;" src="<?php echo "admin/" . $item["image"]; ?>"
                                         alt="">
                                    <span class="product-title"> <?php if($_SESSION['lang'] == 'en'  || trim($item["title_am"]) == ""){ echo $item["title_en"]; }
                                    else { echo $item["title_am"];} ?></span>

                                    <p class="sale-price">
                                        ETB <?php echo number_format($price["price"] - $price["price"] * ($discount_per["discount_per"] / 100), 2, '.', ','); ?>
                                        <span class="real-price">
                                            ETB <?php echo number_format($price["price"], 2, '.', ','); ?>
                                        </span><span
                                            style="font-size: 9px;text-decoration: none;text-transform: lowercase;color: #000"><?php echo "(" . trim($price["uom"]) . ")"; ?></span>
                                    </p>

                                <span class="progress-title"><?php echo $discount_per["discount_per"]; ?>
                                    % Discount</span>

                                </a>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Top Products-->
    <div class="top-products-area clearfix py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1"><?php echo $lang['weeklySpecialOffers']; ?> </h6><a class="btn btn-danger btn-sm" href="topItem.php">
                <?php echo $lang['viewAll']; ?> </a>
            </div>
            <div class="row g-3">
                <?php while ($row = sqlsrv_fetch_array($top, SQLSRV_FETCH_ASSOC)) {
                    $pro = find_item_by_item_id($row["item_id"]);
                    $price = find_price_by_item_id($row["item_id"]);
                    $discount_per = find_discount_by_item_id($row["item_id"]);
                    ?>
                    <!-- Single Top Product Card-->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card top-product-card">
                            <div class="card-body" style="padding: 0.5rem;">
                                <!--                        <span class="badge badge-success">Sale</span>-->
                                <!--                        <a class="wishlist-btn" href="#">-->
                                <!--                        </a>-->
                                <a class="product-thumbnail d-block"
                                   href="single-product.php?id=<?php echo $pro["id"]; ?>&type=home">
                                    <img style="border-radius: 0.75rem;" class="mb-2"
                                         src="<?php echo "admin/" . $pro["image"]; ?>" alt="">
                                </a>
                                <a class="product-title d-block"
                                   href="single-product.php?id=<?php echo $pro["id"]; ?>&type=home"><?php if($_SESSION['lang'] == 'en' || trim($pro["title_am"]) == ""){ $title = trim($pro["title_en"]); } 
                                   else {$title = trim($pro["title_am"]);}
                                    echo substr($title, 0, 17) . "..." . substr($title, -4, 4); ?>    </a>

                                <p class="sale-price text-center" style="font-size: 11px;">
                                    <?php echo (isset($discount_per["discount_per"])) ? $lang['etb']." " . number_format($price["price"] - $price["price"] * ($discount_per["discount_per"] / 100), 2, '.', ',') : $lang['etb']." " . $price["price"]; ?>
                                    <span style="font-size: 12px;">
                                       <?php echo (isset($discount_per["discount_per"])) ? $lang['etb']." " . $price["price"] : ""; ?>
                                    </span><span
                                        style="font-size: 9px;text-decoration: none;text-transform: lowercase;color: #000"><?php echo "(" . trim($price["uom"]) . ")"; ?></span>
                                </p>

                            </div>
                        </div>
                    </div>
                <?php } ?>
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
<script src="js/jquery.js"></script>
<script>
    function searchBtn() {

        $search = document.getElementById("search").value;

        if ($search != "")
            window.open("search.php?search=" + $search, "_self");

    }
</script>
</body>

</html>