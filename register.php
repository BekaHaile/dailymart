<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
require_once("curl_helper.php");

$fname = "";
$mname = "";
$gender = "";
$email = "";
$mobile = "";
//$date_of_birth = "";
// $city = "";

if (isset($_POST['submit'])) {
    // Process the form
    $fname = trim($_POST["fname"]);
    $mname = trim($_POST["mname"]);
    $gender = trim($_POST["gender"]);
    $email = trim($_POST["email"]);
    $mobile = trim(str_replace(" ", "", "+251".$_POST["mobile"]));
    //$date_of_birth = trim($_POST["date_of_birth"]);
    $password = $_POST["password"];
    $message = rand(1000, 9999);

    if ($_POST["password"] == $_POST["confirm_password"]) {
        $check = check_account(str_replace(" ", "", "+251".$_POST["mobile"]));
        if (!$check) {
            $required_fields = array("fname", "mname", "mobile", "password");

            if (isset($_POST["fname"]) && isset($_POST["mname"]) & isset($_POST["mobile"]) && isset($_POST["password"])) {

                // $city = trim($_POST["city"]);

                $val = create_customer($fname, $mname, $gender, $mobile, $message, "", $email, $password, "customer");

                if ($val) {
                    $action = "GET";
                    $url = "http://172.16.32.42/sms/main/send_sms_code";
                    $parameters = array("phone_number" => "$mobile", "message" => "$message");
                    $result = CurlHelper::perform_http_request($action, $url, $parameters);
                    //echo print_r($result);

                    redirect_to("otp-confirm.php?mobile=" .$_POST["mobile"] . "&message=" . $message);

                } else {
                    $_SESSION["art_error"] = "Please try again.";
                }


            } else {
                //Failure
                $_SESSION["art_error"] = "Please Fill All Fields.";
            }
        } else {
            if ($check["status"] == 0) {
                $id = $check["id"];

                $query = "UPDATE [dbo].[customer] SET ";
                $query .= "[first_name] = '{$fname}'";
                $query .= ",[middle_name] = '{$mname}'";
                $query .= ",[gender] = '{$gender}'";
                $query .= ",[email] = '{$email}'";
                $query .= ",[password] = '{$password}'";
                $query .= ",[message] = '{$message}'";
                // $query .= ",[date_of_birth] = '{$date_of_birth}' ";
                // $query .= ",[city] = '{$city}' ";
                $query .= "WHERE [id] = {$id}; ";

                $result = sqlsrv_query($connection, $query);

                if ($result) {
                    // Success
                    $action = "GET";
                    $url = "http://172.16.32.42/sms/main/send_sms_code";
                    $parameters = array("phone_number" => "$mobile", "message" => "$message");
                    $result = CurlHelper::perform_http_request($action, $url, $parameters);
                    //echo print_r($result);

                    redirect_to("otp-confirm.php?mobile=" . $_POST["mobile"] . "&message=" . $message);

                } else {
                    // Failure
                    $_SESSION["art_error"] = "Please try again.";
                }
            } else {
                $_SESSION["art_error"] = 'This Mobile Number already registered use forget password to change password.';
            }

        }
    } else {
        $_SESSION["art_error"] = "Password mismatch.";
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
                        <div class="form-group text-left mb-4"><span>First Name</span>
                            <label for="fname"><i class="lni lni-user"></i></label>
                            <input class="form-control" name="fname" id="fname"
                                   type="text" required placeholder="First Name"
                                   value="<?php echo htmlentities($fname); ?>">
                        </div>

                        <div class="form-group text-left mb-4"><span>Second Name</span>
                            <label for="mname"><i class="lni lni-user"></i></label>
                            <input class="form-control" name="mname" id="mname"
                                   type="text" required placeholder="Second Name"
                                   value="<?php echo htmlentities($mname); ?>">
                        </div>

                        <div class="form-group text-left mb-4"><span>Gender</span>
                            <label for="gender"><i class="lni lni-users"></i></label>

                            <div class="col-lg-4">
                                <select class="form-control" name="gender" data-plugin-selectTwo
                                        name="gender" id="gender">

                                    <?php if ($gender == null) echo '<option disabled selected value>Select</option>'; ?>
                                    <?php if ($gender == 'Male') echo '<option value="Male" selected>Male</option>';
                                    else echo '<option value="Male">Male</option>';?>
                                    <?php if ($gender == 'Female') echo '<option value="Female" selected>Female</option>';
                                    else echo '<option value="Female">Female</option>'; ?>
                                </select>
                            </div>
                        </div>


                        <!-- <div class="form-group text-left mb-4"><span>Date of birth</span>
                            <label for="date_of_birth"><i class="lni lni-calendar"></i></label>
                            <input class="form-control" name="date_of_birth" required type="date" data-plugin-datepicker
                                   allowInputToggle
                                   value="<?php echo htmlentities($date_of_birth); ?>">
                        </div> -->

                        <div class="form-group text-left mb-4"><span>Email</span>
                            <label for="email"><i class="lni lni-envelope"></i></label>
                            <input class="form-control" name="email" id="email"
                                   type="email" placeholder="help@example.com"
                                   value="<?php echo htmlentities($email); ?>">
                        </div>

                        <div class="form-group text-left mb-4"><span>Mobile Number</span> 
                             
                            <div class="otp-form mt-3 " >
                                <div class="mb-6 d-flex">
                                    <select class="form-select" name="" aria-label="Default select example" style="height:40px !important;" disabled>
                                        <option value="">+251</option>
                                    </select>
                                    <input class="form-control pl-0" name="mobile" id="mobile" type="text" value="<?php echo htmlentities($mobile); ?>"
                                    required placeholder="9 1100 0000">
                                </div>
                            </div>
                        </div>   
                            <!-- <label for="mobile"><i class="lni lni-phone"></i></label> -->
                            <!-- <input class="form-control" name="mobile" id="mobile"
                                   type="text" required placeholder="09 0000 0000"
                                   value="<?php echo htmlentities($mobile); ?>"> -->
                                   <!-- OTP Send Form
                                    <div class="otp-form mt-5 mx-4">
                                        
                                    </div> -->

                        <div class="form-group text-left mb-4"><span>Password</span>
                            <label for="password"><i class="lni lni-lock"></i></label>
                            <input class="input-psswd form-control" name="password" id="registerPassword" required
                                   type="password"
                                   placeholder="********************">
                        </div>

                        <div class="form-group text-left mb-4"><span>Confirm Password</span>
                            <label for="confirm_password"><i class="lni lni-lock"></i></label>
                            <input class="input-psswd form-control" name="confirm_password" id="confirmPassword"
                                   required type="password"
                                   placeholder="********************">
                        </div>

                        <!-- <div class="form-group text-left mb-4"><span>Country</span>
                            <label for="city"><i class="lni lni-map"></i></label>
                            <input class="form-control" name="country" type="text" 
							   	   required placeholder="Ethiopia" 
								   value="<?php echo htmlentities($country); ?>">
                        </div>
						
						<div class="form-group text-left mb-4"><span>City</span>
                            <label for="city"><i class="lni lni-map"></i></label>
                            <input class="form-control" name="city" type="text" 
								   required placeholder="Addis Ababa" 
								   value="<?php echo htmlentities($city); ?>">
                        </div> -->

                        <input class="btn btn-success btn-lg w-100" name="submit" type="submit" value="Sign Up"/>
                    </form>
                </div>
                <!-- Login Meta-->
                <div class="login-meta-data">
                    <p class="mt-3 mb-0">Already have an account?<a class="ml-1" href="login.php">Sign In</a></p>
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
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,3})/);
        e.target.value = !x[2] ? x[1] : '' + x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
    });
</script>
</body>