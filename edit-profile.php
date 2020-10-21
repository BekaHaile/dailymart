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

if (isset($_POST['submit'])) {
    $required_fields = array("fname", "mname", "password");

    if (isset($_POST["fname"]) && isset($_POST["mname"])) {
        // Attempt Login

        $fname = trim($_POST["fname"]);
        $mname = trim($_POST["mname"]);
        $gender = trim($_POST["gender"]);
        $email = trim($_POST["email"]);
        // $date_of_birth = trim($_POST["date_of_birth"]);
        // $city = trim($_POST["city"]);

        $query = "UPDATE [dbo].[customer] SET ";
        $query .= "[first_name] = '{$fname}'";
        $query .= ",[middle_name] = '{$mname}'";
        $query .= ",[gender] = '{$gender}'";
        $query .= ",[email] = '{$email}'";
        // $query .= ",[date_of_birth] = '{$date_of_birth}'";
        // $query .= ",[city] = '{$city}' ";
        $query .= "WHERE [id] = {$_SESSION["customer_id"]}; ";

        $result = sqlsrv_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["art_message"] = "Successfully Updated";

            redirect_to("profile.php");
        } else {
            // Failure
            $_SESSION["art_error"] = "Update failed.";
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
        <div class="back-button"><a href="profile.php"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
            <h6 class="mb-0">Edit Profile</h6>
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
                        <!--                        <img src="img/bg-img/9.jpg" alt="">-->
                        <!--                        <div class="change-user-thumb">-->
                        <!--                            <form>-->
                        <!--                                <input class="form-control-file" type="file">-->
                        <!--                                <button><i class="lni lni-pencil"></i></button>-->
                        <!--                            </form>-->
                        <!--                        </div>-->
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
                    <form action="#" method="post">
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>Mobile Number</span></div>
                            <input class="form-control" name="mobile" disabled type="text"
                                   value="<?php echo $user["mobile_number"]; ?>">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>First Name</span></div>
                            <input class="form-control" name="fname" type="text" required="required"
                                   value="<?php echo trim($user["first_name"]); ?>">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>Second Name</span></div>
                            <input class="form-control" name="mname" type="text" required="required"
                                   value="<?php echo trim($user["middle_name"]); ?>">
                        </div>

                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-users"></i><span>Gender</span></div>
                                <div class="col-lg-4">
                                    <select class="form-control" name="gender"  data-plugin-selectTwo 
                                    name="gender" id="gender">
                                    <?php if(trim($user["gender"]) == 'Male') echo '<option value="Male" selected>Male</option>';
                                    else echo '<option value="Male">Male</option>';?>
                                    <?php if(trim($user["gender"]) == 'Female') echo '<option value="Female" selected>Female</option>';
                                    else echo '<option value="Female">Female</option>'; ?>
                                    </select>
                                </div>
                        </div>

                        <!-- <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-calendar"></i><span>Date of birth</span></div>
                                    <input class="form-control" name="date_of_birth" required type="date" value="<?php echo trim($user["date_of_birth"]); ?>">
                        </div> -->

                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                            <input class="form-control" name="email" type="email"
                                   value="<?php echo trim($user["email"]); ?>">
                        </div>
                        <!-- <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-map-marker"></i><span>Country</span>
                            </div>
                            <input class="form-control" name="country" type="text"
                                   value="<?php echo trim($user["country"]); ?>">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-map-marker"></i><span>City</span>
                            </div>
                            <input class="form-control" name="city" type="text"
                                   value="<?php echo trim($user["city"]); ?>">
                        </div> -->
                        <input class="btn btn-success w-100 p-2" type="submit" name="submit" value="Save All Changes">
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