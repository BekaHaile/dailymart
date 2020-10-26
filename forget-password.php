	<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
require_once("curl_helper.php");

if (isset($_POST['submit'])) {
    // Process the form
    $check = check_account(str_replace(" ", "", '+251'.$_POST["mobile"]));
    if ($check) {
        $required_fields = array("mobile");

        if (isset($_POST["mobile"])) {
            // Attempt Login

            $mobile = trim(str_replace(" ", "", '+251'.$_POST["mobile"]));
            $message = rand(1000, 9999);

            $query = "UPDATE [dbo].[customer] SET ";
            $query .= "[message] = '{$message}' ";
            $query .= "WHERE [mobile_number] = '{$mobile}'; ";

            $result = sqlsrv_query($connection, $query);

            if ($result) {
                $action = "GET";
                $url = "http://172.16.32.42/sms/main/send_sms_code";
                $parameters = array("phone_number" => "$mobile", "message" => "$message");
                $result = CurlHelper::perform_http_request($action, $url, $parameters);
                //echo print_r($result);

                redirect_to("otp-confirm_forget.php?mobile=" . $_POST["mobile"] . "&message=" . $message);
            } else {
                $_SESSION["art_error"] = "Please try again.";
            }

        } else {
            //Failure
            $_SESSION["art_error"] = "Please Fill All Fields.";
        }
    } else {
        $_SESSION["art_error"] = 'This Mobile Number is not regsitered so please sign up first.';
        redirect_to('register.php');
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
                        <div class="form-group text-left mb-4"><span>Mobile Number</span>
                            <div class="otp-form mt-3 " >
                                <div class="mb-6 d-flex">
                                    <select class="form-select" name="" aria-label="Default select example" style="height:40px !important;">
                                        <option value="+251" label="+251 Ethiopia"></option>
                                    </select>
                                    <input class="form-control pl-0" name="mobile" id="mobile" type="text"
                                    required placeholder="9 1100 0000">
                                </div>
                            </div>
                        </div>
                        <input name="submit" class="btn btn-warning btn-lg w-100" type="submit" value="Reset Password">
                    </form>
                </div>
                <div class="login-meta-data">
                    <p class="mt-3 mb-0"><a class="ml-1" href="login.php">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("forget-modal.php"); ?>
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
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,3})/);
        e.target.value = !x[2] ? x[1] : '' + x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
    });
</script>
</body>

</html>