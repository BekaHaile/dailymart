<?php
require_once("includes/db_connection.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/validation_functions.php");
if (isset($_SESSION["customer_id"])) {
    $user = find_all_customer_by_id($_SESSION["customer_id"]);
    $notification = find_all_notification_by_mobile_status($user["mobile_number"]);
} else {
    $user = null;
    $notification = null;
}


?>
<!-- Side Nav Wrapper-->
<div class="suha-sidenav-wrapper" id="sidenavWrapper">
    <!-- Sidenav Profile-->
    <?php if (isset($_SESSION['customer_id'])) { ?>

        <div class="sidenav-profile">
            <div class="user-profile"><img src="account/images/logo.png" alt=""></div>
            <div class="user-info">
                <h6 class="user-name mb-0"><?php echo $user["first_name"] . " " .$user["middle_name"]; ?></h6>
                <h6 class="user-name mb-0"><?php echo $user["mobile_number"]; ?></h6>

                <!--<p class="available-balance">Balance <span>ETB <span class="counter">523.98</span></span></p>
				-->
			</div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav pl-0">
            <li><a href="home.php"><i class="lni lni-home"></i><?php echo $lang['home']; ?></a></li>
            <li><a href="profile.php"><i class="lni lni-user"></i><?php echo $lang['myProfile']; ?></a></li>
            <li><a href="my-order.php"><i class="lni lni-cart"></i><?php echo $lang['orderHistory']; ?></a></li>
            <li><a href="message.php"><i class="lni lni-wechat"></i><?php echo $lang['liveChat']; ?></a></li>
            <li><a href="notifications.php"><i class="lni lni-alarm lni-tada-effect"></i><?php echo $lang['notifications']; ?><span
                        class="ml-3 badge badge-warning"><?php echo sqlsrv_num_rows($notification);?></span></a></li>
<!--            <li><a href="settings.php"><i class="lni lni-cog"></i>Settings</a></li>-->
            <li><a href="settings.php"><i class="lni lni-cog"></i><?php echo $lang['settings']; ?></a></li>
            <li><a href="faq.php"><i class="fa fa-question-circle"></i><?php echo $lang['faq']; ?></a></li>
            <li><a href="logout.php"><i class="lni lni-power-switch"></i><?php echo $lang['signOut']; ?></a></li>
        </ul>
    <?php } else { ?>
        <ul class="sidenav-nav pl-0">
            <li><a href="login.php"><i class="lni lni-power-switch"></i>Sign In</a></li>
        </ul>

    <?php } ?>
    <!-- Go Back Button-->
    <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
</div>
