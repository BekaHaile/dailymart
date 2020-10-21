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
            <h6 class="mb-0">Wishlist</h6>
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
    <!-- Top Products-->
    <div class="top-products-area py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">Your Wishlist (4)</h6>
                <!-- Layout Options-->
                <div class="layout-options"><a href="wishlist-grid.php"><i class="lni lni-grid-alt"></i></a><a
                        class="active" href="wishlist-list.php"><i class="lni lni-radio-button"></i></a></div>
            </div>
            <div class="row g-3">
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-success">Sale</span><a
                                    class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a
                                    class="product-thumbnail d-block" href="single-product.php"><img
                                        src="img/product/10.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.php">Modern
                                    Red Sofa</a>

                                <p class="sale-price"><i class="lni lni-dollar"></i>ETB 64<span>ETB 89</span></p>

                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.88 (39)</div>
                                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i
                                        class="mr-1 lni lni-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-primary">Sale</span><a
                                    class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a
                                    class="product-thumbnail d-block" href="single-product.php"><img
                                        src="img/product/7.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.php">Office
                                    Chair</a>

                                <p class="sale-price"><i class="lni lni-dollar"></i>ETB 100<span>ETB 160</span></p>

                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.82 (125)</div>
                                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i
                                        class="mr-1 lni lni-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-danger">-10%</span><a
                                    class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a
                                    class="product-thumbnail d-block" href="single-product.php"><img
                                        src="img/product/12.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.php">Sun
                                    Glasses</a>

                                <p class="sale-price"><i class="lni lni-dollar"></i>ETB 24<span>ETB 32</span></p>

                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.79 (63)</div>
                                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i
                                        class="mr-1 lni lni-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Weekly Product Card-->
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side"><span class="badge badge-warning">New</span><a
                                    class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a
                                    class="product-thumbnail d-block" href="single-product.php"><img
                                        src="img/product/13.png" alt=""></a></div>
                            <div class="product-description"><a class="product-title d-block" href="single-product.php">Wall
                                    Clock</a>

                                <p class="sale-price"><i class="lni lni-dollar"></i>ETB 31<span>ETB 47</span></p>

                                <div class="product-rating"><i class="lni lni-star-filled"></i>4.99 (7)</div>
                                <a class="btn btn-success btn-sm add2cart-notify" href="#"><i
                                        class="mr-1 lni lni-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Select All Products-->
                <div class="col-12">
                    <div class="select-all-products-btn"><a class="btn btn-danger w-100" href="#">Add All To Cart</a>
                    </div>
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
                <li class="active"><a href="home.php"><i class="lni lni-home"></i>Home</a></li>
                <li><a href="message.php"><i class="lni lni-life-ring"></i>Support</a></li>
                <li><a href="cart.php"><i class="lni lni-shopping-basket"></i>Cart</a></li>
<!--                <li><a href="pages.php"><i class="lni lni-heart"></i>Pages</a></li>-->
                <li><a href="settings.php"><i class="lni lni-cog"></i>Settings</a></li>
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
</body>

</html>