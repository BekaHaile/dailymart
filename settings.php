<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");

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
        <div class="back-button"><a href="home.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Settings</h6>
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
        <!-- Settings Wrapper-->
        <div class="settings-wrapper py-3">
            <div class="card settings-card">
                <div class="card-body">
				
            <?php echo art_message(); ?>

                    <!-- Single Settings-->
                    <!--<div class="single-settings d-flex align-items-center justify-content-between">
                        <div class="title"><i class="lni lni-checkmark"></i><span>Availability</span></div>
                        <div class="data-content">
                            <div class="toggle-button-cover">
                                <div class="button r">
                                    <input class="checkbox" type="checkbox" checked>

                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

                    <!--<div class="card settings-card">
                        <div class="card-body">
                            <!-- Single Settings-->
                    <!--<div class="single-settings d-flex align-items-center justify-content-between">
                        <div class="title"><i class="lni lni-alarm"></i><span>Notifications</span></div>
                        <div class="data-content">
                            <div class="toggle-button-cover">
                                <div class="button r">
                                    <input class="checkbox" type="checkbox" checked>

                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card settings-card">
                <div class="card-body">
                    <!-- Single Settings-->
                    <!--<div class="single-settings d-flex align-items-center justify-content-between">
                        <div class="title"><i class="lni lni-night"></i><span>Night Mode</span></div>
                        <div class="data-content">
                            <div class="toggle-button-cover">
                                <div class="button r">
                                    <input class="checkbox" id="darkSwitch" type="checkbox">

                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
                    <div class="card settings-card">
                        <div class="card-body">
                            <!-- Single Settings-->
                            <div class="single-settings d-flex align-items-center justify-content-between">
                                <div class="title"><i class="lni lni-world"></i><span>Language</span></div>
                                <div class="data-content"><a href="language.php"><?php if($_SESSION['lang'] == 'en'){ ?> English <?php } else{ ?> አማርኛ <?php } ?> <i
                                            class="lni lni-chevron-right"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="card settings-card">
                        <div class="card-body">
                            <!-- Single Settings-->
                    <!--<div class="single-settings d-flex align-items-center justify-content-between">
                        <div class="title"><i class="lni lni-question-circle"></i><span>Support</span></div>
                        <div class="data-content"><a class="pl-4" href="support.php"><i
                                    class="lni lni-chevron-right"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="card settings-card">
                <div class="card-body">
                    <!-- Single Settings-->
                    <!--<div class="single-settings d-flex align-items-center justify-content-between">
                        <div class="title"><i class="lni lni-protection"></i><span>Privacy</span></div>
                        <div class="data-content"><a class="pl-4" href="privacy-policy.php"><i
                                    class="lni lni-chevron-right"></i></a></div>
                    </div>
                </div>
            </div> -->
                    <?php if (isset($_SESSION["customer_id"])) { ?>
                        <div class="card settings-card">
                            <div class="card-body">
                                <!-- Single Settings-->
                                <div class="single-settings d-flex align-items-center justify-content-between">
                                    <div class="title"><i
                                            class="lni lni-lock"></i><span>Password</span></div>
                                    <div class="data-content"><a href="change-password.php">Change<i
                                                class="lni lni-chevron-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
                        <li><a href="#"><i class="fa fa-search"></i>Search</a></li>
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
                                <span>Cart</span>
                            </a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-cog"></i>Settings</a></li>
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