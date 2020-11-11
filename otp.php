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
                <div class="text-left px-4">
                    <h5 class="mb-1 text-white">Phone Verification</h5>

                    <p class="mb-4 text-white">We will send you an OTP on this phone number.</p>
                </div>
                <!-- OTP Send Form-->
                <div class="otp-form mt-5 mx-4">
                    <form action="otp-confirm.php" method="">
                        <div class="mb-4 d-flex">
                            <select class="form-select" name="" aria-label="Default select example">
                                <option value="">+880</option>
                                <option value="">+62</option>
                                <option value="">+60</option>
                                <option value="">+91</option>
                                <option value="">+198</option>
                            </select>
                            <input class="form-control pl-0" id="phone_number" type="text"
                                   placeholder="Enter phone number">
                        </div>
                        <button class="btn btn-warning btn-lg w-100" type="submit">Send OTP</button>
                    </form>
                </div>
                <!-- Term & Privacy Info-->
                <div class="login-meta-data px-4">
                    <p class="mt-3 mb-0">By providing my phone number, I hereby agree the<a class="mx-1" href="#">Term
                            of Services</a>and<a class="mx-1" href="#">Privacy Policy.</a></p>
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
</body>

</html>