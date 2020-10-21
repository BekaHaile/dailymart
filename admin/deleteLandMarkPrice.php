<!doctype html>
<html class="fixed">

<head>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 4/22/2016
 * Time: 7:03 AM
 */
?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php
$landMarkPrice = find_land_mark_price_by_entry_no($_GET["id"]);
$landMarkPrice['id'];
if (!$landMarkPrice) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("landMarkPrice.php");
}

$id = $landMarkPrice["id"];


$query = "DELETE FROM [dbo].[land_mark_price] WHERE [id] = '{$id}'";
$result = sqlsrv_query($connection, $query);

if ($result) {
    // Success

    $_SESSION["art_message"] = "Land Mark Price deleted.";

    redirect_to("landMarkPrice.php");
} else {
    // Failure
    $_SESSION["art_error"] = "Land Mark Price deletion failed.";
    redirect_to("landMarkPrice.php");
}

?>

</body>
</html>
