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
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="home.php"><img src="img/core-img/logo-small.png" alt=""></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
            <form action="#" method="">
                <input class="form-control" type="search" placeholder="Enter your keyword">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span>
        </div>
    </div>
</div>
<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>

<?php
require_once("sidenav.php");
?>

<div class="page-content-wrapper py-3">
    <div class="container">
        <h6 class="ml-1 mb-2">All Pages</h6>
        <ul class="page-nav pl-0">
            <li><a href="home.php">Home<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="shop-grid.php">Shop Grid<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="shop-list.php">Shop List<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="single-product.php">Product Details<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="catagory.php">Catagory<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="product.php">Sub Catagory<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="wishlist-grid.php">Wishlist Grid<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="wishlist-list.php">Wishlist List<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="discounted.php">Flash Sale<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="featured-products.php">Featured Products<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="cart.php">Cart<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="checkout-bank.php">Checkout Bank<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="checkout-cash.php">Checkout Cash<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="checkout-credit-card.php">Checkout Credit Card<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="checkout-payment.php">Checkout Payment<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="checkout-paypal.php">Checkout PayPal<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="checkout.php">Checkout<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="blog-grid.php">Blog Grid<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="blog-list.php">Blog List<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="blog-details.php">Blog Details<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="change-password.php">Change Password<i class="lni lni-chevron-right"> </i></a></li>
            <li><a href="edit-profile.php">Edit Profile<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="language.php">Select Language<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="index.php">Intro Page<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="login.php">Login<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="register.php">Register<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="otp.php">OTP Send<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="otp-confirm.php">OTP Confirmation<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="forget-password-success.php">Forget Password Success<i class="lni lni-chevron-right"></i></a>
            </li>
            <li><a href="forget-password.php">Forget Password<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="about-us.php">About Us<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="contact.php">Contact Us<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="offline.php">Offline<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="message.php">Message<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="my-order.php">My Order<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="notification-details.php">Notifications Details<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="notifications.php">Notifications<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="payment-success.php">Payment Success<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="privacy-policy.php">Privacy Policy<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="profile.php">Profile<i class="lni lni-chevron-right"></i></a></li>
            <li><a href="settings.php">Settings<i class="lni lni-chevron-right"> </i></a></li>
            <li><a href="support.php">Support<i class="lni lni-chevron-right"></i></a></li>
        </ul>
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
                <li><a href="pages.html"><i class="lni lni-heart"></i>Pages</a></li>
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