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
			if(!isset($_POST["remember-me"])){
                setcookie("username", '');
                setcookie("password", '');
            }
            else if(!isset($_COOKIE['username'])){
                setcookie("username", $_POST["username"]);
                setcookie("password", $password);
            } else if($_COOKIE['username'] != $_POST["username"]){
                setcookie("username", $_POST["username"]);
                setcookie("password", $password);
            }
			
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
                        <div class="form-group text-left mb-4">
						<span style="font-size: 20px;text-align: center;margin-bottom: 25px;"><?php echo $lang['logIn']; ?></span>
						
						<span><?php echo $lang['mobileNumber']; ?></span>
                            <div class="otp-form mt-3 " >
                                <div class="mb-6 d-flex">
                                    <select class="form-select" name="" aria-label="Default select example" style="height:40px !important;">
                                        <option value="">+251</option>
                                    </select>
                                    <input class="form-control pl-0" name="username" id="username" type="text" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username'];} else echo htmlentities(substr($username,4)); ?>"
                                    required placeholder="9 1100 0000">
									
                                </div>
                        </div>
						
                        <div class="form-group text-left mb-4" style="margin-top: 15px;">
							<span style="margin-bottom: 10px;"><?php echo $lang['password']; ?></span>
                            <label for="password" style="color:#fff;padding-left: 3px;"><i class="lni lni-lock"></i></label>
                            <input class="form-control" name="password" id="password" type="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password'];}?>"
                                   placeholder="********************" style="border-radius: 8px;margin-top: -30px;">
							<div>
								<div style="float: left;">
									<input type='checkbox' name='remember-me' checked>
									<label for="remember-me" style="color: #000"><?php echo $lang['rememberMe']; ?> </label>
								</div>
								<a class="forgot-password d-block mt-3 mb-1" style="color: #000;text-align: right;" href="forget-password.php"><?php echo $lang['forgotPassword']; ?></a>
							</div>
						</div>
						
                        <input class="btn btn-success w-100" name="submit" type="submit" value="<?php echo $lang['logIn']; ?>" style="background-color: #a6ce39;border-color: #a6ce39;"/>
                    </form>
                </div>
                <!-- Login Meta-->
                <div class="login-meta-data" style="margin-bottom: 50px;">
				
                    <p class="mb-0"><?php echo $lang['didntHaveAn']; ?>
					<a class="ml-1 btn btn-success" style="background-color: #a6ce39;border-color: #a6ce39;float: right;" href="register.php"><?php echo $lang['registerNow']; ?></a></p>
                </div>
                <!-- View As Guest-->
                <div class="view-as-guest mt-3"><a class="btn" href="home.php" 
					style="font-size: 15px;box-shadow: 0 1px 3px 0px #b2b3b6;"><?php echo $lang['viewAsGuest']; ?></a>
				</div>
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