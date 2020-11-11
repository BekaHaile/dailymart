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
            <h6 class="mb-0">Shop List</h6>
        </div>
        <!-- Filter Option-->
        <div class="filter-option" id="suhaNavbarToggler"><i class="lni lni-cog"></i></div>
    </div>
</div>
<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>
<!-- Side Nav Wrapper-->
<div class="suha-sidenav-wrapper filter-nav" id="sidenavWrapper">
    <!-- Catagory Sidebar Area-->
    <div class="catagory-sidebar-area">
        <!-- Catagory-->
        <div class="widget catagory mb-4">
            <h6 class="widget-title mb-3">Product Brand</h6>

            <div class="widget-desc">
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="zara" type="checkbox" checked>
                    <label class="form-check-label font-weight-bold" for="zara">Zara</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Gucci" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Gucci">Gucci</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Addidas" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Addidas">Addidas</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Nike" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Nike">Nike</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Denim" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Denim">Denim</label>
                </div>
            </div>
        </div>
        <!-- Color-->
        <div class="widget color mb-4">
            <h6 class="widget-title mb-3">Color Family</h6>

            <div class="widget-desc">
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Purple" type="checkbox" checked>
                    <label class="form-check-label font-weight-bold" for="Purple">Purple</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Black" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Black">Black</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="White" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="White">White</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Red" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Red">Red</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Pink" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Pink">Pink</label>
                </div>
            </div>
        </div>
        <!-- Size-->
        <div class="widget size mb-4">
            <h6 class="widget-title mb-3">Size</h6>

            <div class="widget-desc">
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="XtraLarge" type="checkbox" checked>
                    <label class="form-check-label font-weight-bold" for="XtraLarge">Xtra Large</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Large" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Large">Large</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="medium" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="medium">Medium</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="Small" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="Small">Small</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="ExtraSmall" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="ExtraSmall">Extra Small</label>
                </div>
            </div>
        </div>
        <!-- Ratings-->
        <div class="widget ratings mb-4">
            <h6 class="widget-title mb-3">Ratings</h6>

            <div class="widget-desc">
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="5star" type="checkbox" checked>
                    <label class="form-check-label font-weight-bold" for="5star">5 star</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="4star" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="4star">4 star</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="3star" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="3star">3 star</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="2star" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="2star">2 star</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="1star" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="1star">1 star</label>
                </div>
            </div>
        </div>
        <!-- Payment Type-->
        <div class="widget payment-type mb-4">
            <h6 class="widget-title mb-3">Payment Type</h6>

            <div class="widget-desc">
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="cod" type="checkbox" checked>
                    <label class="form-check-label font-weight-bold" for="cod">Cash On Delivery</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="paypal" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="paypal">Paypal</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="checkpayment" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="checkpayment">Check Payment</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="payonner" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="payonner">Payonner</label>
                </div>
                <!-- Single Checkbox-->
                <div class="form-check">
                    <input class="form-check-input" id="mobbanking" type="checkbox">
                    <label class="form-check-label font-weight-bold" for="mobbanking">Mobile Banking</label>
                </div>
            </div>
        </div>
        <!-- Apply Filter-->
        <div class="apply-filter-btn"><a class="btn btn-success" href="#">Apply Filter</a></div>
    </div>
    <!-- Go Back Button-->
    <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
</div>
<div class="page-content-wrapper">
    <!-- Top Products-->
    <div class="top-products-area py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">All Products</h6>
                <!-- Layout Options-->
                <div class="layout-options"><a href="shop-grid.php"><i class="lni lni-grid-alt"></i></a><a
                        class="active" href="shop-list.php"><i class="lni lni-radio-button"></i></a></div>
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
                <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i>Search</a></li>
                <li><a href="cart.php"><i class="lni lni-shopping-basket"></i>Cart</a></li>
<!--                <li><a href="pages.php"><i class="lni lni-heart"></i>Pages</a></li>-->
                <li><a href="settings.php"><i class="lni lni-cog"></i>Settings</a></li>
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