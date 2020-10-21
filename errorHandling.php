<?php
include("includes/db_connection.php");
include("includes/session.php");
include("includes/functions.php"); ?>
<?php

if (isset($_POST['location'])) {
    echo '<div class="add2cart-notification animated fadeIn" id="flash-msg" style="padding: 0">
        <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #b84143;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0">
        <i class="icon fa fa-info mr-2"></i>Please select location</h4>
        </div>';
}
elseif (isset($_POST['CDtime'])) {
    echo '<div class="add2cart-notification animated fadeIn" id="flash-msg" style="padding: 0">
        <h4 style="position: fixed;bottom: 58px;width: 100%;height: 30px;background-color: #b84143;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 30px;font-weight: 700;margin-bottom: 0">
        <i class="icon fa fa-info mr-2"></i>Please select local time range</h4>
        </div>';
}
?>
