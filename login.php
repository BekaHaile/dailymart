<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
$username = "";

if (isset($_POST['submit'])) {
    // Process the form

    $required_fields = array("username", "password");

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Attempt Login

        $username = trim(str_replace(" ","",'+251'.$_POST["username"]));
        $password = $_POST["password"];

        $found_admin = attempt_login_customer($username, $password);

        if ($found_admin) {
            // Success
            // Mark user as logged in
            $_SESSION["customer_id"] = $found_admin["id"];
            $_SESSION["username"] = $found_admin["mobile_number"];
            $_SESSION["role"] = $found_admin["role"];

            if (trim($_SESSION["role"]) === "customer")
                redirect_to("home.php");
            else
                $_SESSION["art_error"] = "You Have No Permission.";

        } else {
//             Failure
            $_SESSION["art_error"] = "Username/password not found.";
        }
    } else {
//             Failure
        $_SESSION["art_error"] = "Username/password not found.";
    }
}

if(customer_logged_in()){
	redirect_to("home.php");
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
<!-- Login Wrapper Area-->
<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                <img class="big-logo" src="account/images/logo.png" alt="">
                <!-- Register Form-->
                <div class="register-form mt-5 px-4">
                    <span style="font-size: 14px">
                        <?php echo art_message(); ?>
                    </span>

                    <form action="#" method="post">
                        <div class="form-group text-left mb-4"><span>Mobile Number</span>
                            <div class="otp-form mt-3 " >
                                <div class="mb-6 d-flex">
                                    <select class="form-select" name="" aria-label="Default select example" style="height:40px !important;">
                                        <option value="">+251</option>
                                    </select>
                                    <input class="form-control pl-0" name="username" id="username" type="text" value="<?php echo htmlentities(substr($username,3)); ?>"
                                    required placeholder="9 1100 0000">
                                </div>
                            </div>
                        </div>
                        
						
                        <div class="form-group text-left mb-4"><span>Password</span>
                            <label for="password"><i class="lni lni-lock"></i></label>
                            <input class="form-control" name="password" id="password" type="password"
                                   placeholder="********************">
                        </div>
						
                        <input class="btn btn-success btn-lg w-100" name="submit" type="submit" value="Log In"/>
                    </form>
                </div>
                <!-- Login Meta-->
                <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="forget-password.php">Forgot
                        Password?</a>

                    <p class="mb-0">Didn't have an account?<a class="ml-1" href="register.php">Register Now</a></p>
                </div>
                <!-- View As Guest-->
                <div class="view-as-guest mt-3"><a class="btn" href="home.php">View as Guest</a></div>
            </div>
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
<script>
    document.getElementById('username').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,3})/);
        e.target.value = !x[2] ? x[1] : '' + x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
    });
</script>
</body>

</html>