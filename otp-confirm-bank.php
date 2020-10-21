<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");

if (isset($_POST['submit'])) {
    // Process the form

    /*$required_fields = array("otp1", "otp2", "otp3", "otp4");

    if (isset($_POST["otp1"]) && isset($_POST["otp2"]) && isset($_POST["otp3"]) && isset($_POST["otp4"])) {

        $otp1 = $_POST["otp1"];
        $otp2 = $_POST["otp2"];
        $otp3 = $_POST["otp3"];
        $otp4 = $_POST["otp4"];

        $otp = $otp1 . $otp2 . $otp3 . $otp4;

        $mobile = trim(str_replace(" ", "", $_GET["mobile"]));

        $found_admin = check_customer_by_mobile_and_otp($mobile, $otp);

        if ($found_admin) {
            $sql = "UPDATE [DailyMart].[dbo].[customer] SET [status] = 1 WHERE [mobile_number] = '{$mobile}';";
            $stmt = sqlsrv_query($connection, $sql);

            $_SESSION["art_message"] = "Your account is activated.";
            redirect_to("login.php");
        } else {
            //Failure
            $_SESSION["art_error"] = "Incorrect inputs please try again.";
        }
    } else {
        //Failure
        $_SESSION["art_error"] = "Please fill all forms.";
    }*/
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
<div class="login-wrapper d-flex align-items-center justify-content-center text-center" style="background: gray;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                <div class="text-left px-4">
                    <h5 class="mb-1 text-white">Verify Phone Number</h5>

                    <p class="mb-4 text-white">Enter the verification code
                        <strong class="ml-1"><?php echo""; ?></strong>
                    </p>
                </div>
                <!-- OTP Verify Form-->
                <div class="otp-verify-form mt-5 px-4">
					<span style="font-size: 14px">
                        <?php echo art_message(); ?>
                    </span>

                    <form action="otp-confirm.php?mobile=<?php echo $_GET["mobile"] . "&message=" . $_GET["message"]; ?>" method="POST">
                        <div class="d-flex justify-content-between mb-5">
                            <input name="otp1" class="form-control inputs" type="text" placeholder="-" maxlength="1">
                            <input name="otp2" class="form-control inputs" type="text" placeholder="-" maxlength="1">
                            <input name="otp3" class="form-control inputs" type="text" placeholder="-" maxlength="1">
                            <input name="otp4" class="form-control inputs" type="text" placeholder="-" maxlength="1">
                        </div>
                        <input class="btn btn-warning btn-lg w-100" name="submit" type="submit"
                               value="Verify &amp; Proceed">

                        <div class="login-meta-data px-4">
                            <p class="mt-3 mb-0">Don't received the message?
                                <span class="otp-sec ml-1 text-white" id="resendOTP"></span>
                            </p>
                        </div>
                    </form>
                </div>
                <!-- Term & Privacy Info-->

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
<script src="js/default/otp-timer.js"></script>
<script src="js/default/active.js"></script>
<script src="js/pwa.js"></script>
<script src="js/jquery.js"></script>
<script>
$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.inputs').focus();
    }
});
</script>
</body>

</html>