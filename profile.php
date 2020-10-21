<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$user = null;
$c_cart = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $user = find_all_customer_by_id($_SESSION["customer_id"]);

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
<<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="home.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Profile</h6>
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
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <span style="font-size: 14px">
                        <?php echo art_message(); ?>
                </span>

                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-profile mr-3">
                        <!--                        <img src="account/images/logo.png" alt="">-->
                    </div>
                    <div class="user-info">
                        <p class="mb-0 text-white">Mobile Number</p>
                        <h5 class="mb-0"><?php echo $user["mobile_number"]; ?></h5>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center">
                            <i class="lni lni-phone"></i><span>Mobile Number</span>
                        </div>
                        <div class="data-content"><?php echo $user["mobile_number"]; ?></div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span>
                        </div>
                        <div
                            class="data-content"><?php echo $user["first_name"] . " " . $user["middle_name"] . " " . $user["last_name"]; ?></div>
                    </div>

                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><i
                                class="lni lni-envelope"></i><span>Email Address</span></div>
                        <div class="data-content"><?php echo $user["email"]; ?></div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><i
                                class="lni lni-users"></i><span>Gender</span></div>
                        <div class="data-content"><?php echo $user["gender"]; ?></div>
                    </div>
                    <!-- <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><i
                                class="lni lni-calendar"></i><span>Date of Birth</span></div>
                        <div class="data-content"><?php echo $user["date_of_birth"]; ?></div>
                    </div> -->
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title d-flex align-items-center"><i class="lni lni-star"></i><span>My Order</span>
                        </div>
                        <div class="data-content"><a class="btn btn-success btn-sm" href="my-order.php">View</a></div>
                    </div>
                </div>
            </div>
            <!-- Edit Profile-->
            <div class="edit-profile-btn mt-3"><a class="btn btn-success w-100 p-2" href="edit-profile.php"><i
                        class="lni lni-pencil mr-2"></i>Edit Profile</a></div>
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