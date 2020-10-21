<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
require_once("curl_helper.php");

if (isset($_POST['submit'])) {
    // Process the form

    $required_fields = array("password");

    if (isset($_POST["password"])) {
        // Attempt Login

        $mobile = $_GET["mobile"];
        $password = trim($_POST["password"]);

        $query = "UPDATE [dbo].[customer] SET ";
        $query .= "[password] = '{$password}' ";
        $query .= "WHERE [mobile_number] = '{$mobile}'; ";

        $result = sqlsrv_query($connection, $query);

        if ($result) {

            $_SESSION["art_message"] = "Your password is changed.";
            redirect_to("login.php");
        } else {
            $_SESSION["art_error"] = "Please try again.";
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
<!-- Login Wrapper Area-->
<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                <img class="big-logo" src="account/images/logo.png" alt="">
                <!-- Register Form-->
                <div class="register-form mt-5 px-4">
                    <form action="#" method="post">
                        <div class="form-group text-left mb-4"><span>New Password</span>
                            <label for="password"><i class="lni lni-lock"></i></label>
                            <input class="input-psswd form-control" name="password" id="registerPassword" required
                                   type="password"
                                   placeholder="********************">
                        </div>
                        <input name="submit" class="btn btn-warning btn-lg w-100" type="submit" value="Reset Password">
                    </form>
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
    document.getElementById('mobile').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '' + x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
    });
</script>
</body>

</html>