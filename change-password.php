<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");

$c_cart = null;
$user = null;
if (isset($_SESSION["customer_id"])) {
    $c_cart = find_all_cart_by_customer($_SESSION["customer_id"]);
    $user = find_all_customer_by_id($_SESSION["customer_id"]);
}

if (isset($_POST['submit'])) {
    $required_fields = array("old", "new", "newRepeat");

    if (isset($_POST["old"]) && isset($_POST["new"]) && isset($_POST["newRepeat"])) {
        // Attempt Login

        if ($_POST["new"] == $_POST["newRepeat"]) {
            $old = trim($_POST["old"]);
            $new = trim($_POST["new"]);

            if (trim($user["password"]) == $old) {
                $query = "UPDATE [dbo].[customer] SET ";
                $query .= "[password] = '{$new}' ";
                $query .= "WHERE [id] = {$_SESSION["customer_id"]}; ";

                $result = sqlsrv_query($connection, $query);

                if ($result) {
                    // Success
                    $_SESSION["art_message"] = "Successfully Updated";

                    redirect_to("settings.php");
                } else {
                    // Failure
                    $_SESSION["art_error"] = "Update failed.";
                }
            } else {
                // Failure
                $_SESSION["art_error"] = "Please enter the correct old password.";
            }
        } else {
            //Failure
            $_SESSION["art_error"] = "Password mismatch.";
        }

    } else {
        //Failure
        $_SESSION["art_error"] = "Please Fill All Fields.";
    }
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
        <div class="back-button"><a href="settings.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Change Password</h6>
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
                    <div class="user-profile mr-3"><img src="" alt=""></div>
                    <div class="user-info">
                        <p class="mb-0 text-white" style="font-size: 16px"><?php echo $user["mobile_number"]; ?></p>
                        <h6 class="mb-0">Phone Number</h6>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>Old Password</span></div>
                            <input class="form-control" type="password" name="old">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>New Password</span></div>
                            <input class="form-control" type="password" name="new">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>Repeat New Password</span></div>
                            <input class="form-control" type="password" name="newRepeat">
                        </div>
                        <input class="btn btn-danger w-100" type="submit" value="Update Password" name="submit">
                    </form>
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