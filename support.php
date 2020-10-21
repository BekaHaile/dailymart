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
        <div class="back-button"><a href="settings.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Support</h6>
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
        <!-- Support Wrapper-->
        <div class="support-wrapper py-3">
            <h4 class="faq-heading text-center">How can we help you with?</h4>
            <!-- Search Form-->
            <form class="faq-search-form" action="#" method="">
                <input class="form-control" type="search" name="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <!-- Accordian Area Wrapper-->
            <div class="accordian-area-wrapper mt-3">
                <!-- Accordian Card-->
                <div class="card accordian-card clearfix">
                    <div class="card-body">
                        <h5 class="accordian-title">For Buyers</h5>

                        <div class="accordion" id="accordionExample">
                            <!-- Single Accordian-->
                            <div class="accordian-header" id="headingOne">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                        type="button" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne"><span><i
                                            class="lni lni-bi-cycle"></i>How to get started?</span><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="collapse" id="collapseOne" aria-labelledby="headingOne"
                                 data-parent="#accordionExample">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore
                                    exercitationem porro dignissimos.</p>
                            </div>
                            <!-- Single Accordian-->
                            <div class="accordian-header" id="headingTwo">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                        type="button" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo"><span><i
                                            class="lni lni-cart-full"></i>How to buy a product?</span><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo"
                                 data-parent="#accordionExample">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore
                                    exercitationem porro dignissimos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordian Area Wrapper-->
            <div class="accordian-area-wrapper mt-3">
                <!-- Accordian Card-->
                <div class="card accordian-card seller-card clearfix">
                    <div class="card-body">
                        <h5 class="accordian-title">For Authors</h5>

                        <div class="accordion" id="accordionExample2">
                            <!-- Single Accordian-->
                            <div class="accordian-header" id="headingThree">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                        type="button" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree"><span><i
                                            class="lni lni-dropbox"></i>How can upload a product?</span><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                                 data-parent="#accordionExample2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore
                                    exercitationem porro dignissimos.</p>
                            </div>
                            <!-- Single Accordian-->
                            <div class="accordian-header" id="headingFour">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                        type="button" data-toggle="collapse" data-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour"><span><i
                                            class="lni lni-dollar"></i>Commission structure</span><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="collapse" id="collapseFour" aria-labelledby="headingFour"
                                 data-parent="#accordionExample2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore
                                    exercitationem porro dignissimos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordian Area Wrapper-->
            <div class="accordian-area-wrapper mt-3">
                <!-- Accordian Card-->
                <div class="card accordian-card others-card clearfix">
                    <div class="card-body">
                        <h5 class="accordian-title">Others</h5>

                        <div class="accordion" id="accordionExample3">
                            <!-- Single Accordian-->
                            <div class="accordian-header" id="headingFive">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                        type="button" data-toggle="collapse" data-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive"><span><i
                                            class="lni lni-exit"></i>How to return a product?</span><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="collapse" id="collapseFive" aria-labelledby="headingFive"
                                 data-parent="#accordionExample3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore
                                    exercitationem porro dignissimos.</p>
                            </div>
                            <!-- Single Accordian-->
                            <div class="accordian-header" id="headingSix">
                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                        type="button" data-toggle="collapse" data-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix"><span><i
                                            class="lni lni-emoji-sad"></i>My product is misleading?</span><i
                                        class="lni lni-chevron-right"></i></button>
                            </div>
                            <div class="collapse" id="collapseSix" aria-labelledby="headingSix"
                                 data-parent="#accordionExample3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore
                                    exercitationem porro dignissimos.</p>
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