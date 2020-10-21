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
            <h6 class="mb-0">About Us</h6>
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
        <div class="about-content-wrap py-3"><img class="mb-3" src="img/bg-img/12.png" alt="">
            <h5>We are here for your all needs. Let's together safer the world. Stay at home, stay safe.</h5>

            <p>A versatile e-commerce shop template. It is very nicely designed with modern features &amp; coded with
                the latest technology.</p>

            <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p>
            <ul class="mb-3 pl-3">
                <li class="pl-2"><i class="lni lni-checkmark-circle mr-1"></i>Versatile e-commerce template</li>
                <li class="pl-2"><i class="lni lni-checkmark-circle mr-1"></i>Nicely designed with modern features</li>
                <li class="pl-2"><i class="lni lni-checkmark-circle mr-1"></i>Coded with the latest technology</li>
            </ul>
            <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p>

            <div class="row">
                <div class="col-6"><img class="mb-3 rounded" src="img/bg-img/12.jpg" alt=""></div>
                <div class="col-6"><img class="mb-3 rounded" src="img/bg-img/16.jpg" alt=""></div>
            </div>
            <p>A versatile e-commerce shop template. It is very nicely designed with modern features &amp; coded with
                the latest technology.</p>

            <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p>
            <h6>Authors Help</h6>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae suscipit blanditiis facilis, est modi,
                maxime dolorem voluptatibus ea deserunt voluptate minima eaque quidem?</p>
            <h6>Buyers Help</h6>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sint reiciendis minima iusto ex beatae.
                Odio ducimus eveniet excepturi quaerat optio totam repellat eligendi! Eaque veritatis omnis doloribus
                vitae dolore similique facere eos molestiae quibusdam perspiciatis.</p>

            <div class="contact-btn-wrap text-center">
                <p class="mb-2">For more information, submit a request.</p><a class="btn btn-primary w-100"
                                                                              href="contact.php"><i
                        class="lni lni-life-ring mr-2"></i>Submit A Query</a>
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