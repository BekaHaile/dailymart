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
<?php require_once("../includes/functions.php");
confirm_admin_logged_in()
?>
<?php
$cat = find_brand_by_id($_GET["id"]);
if (!$cat) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("brand.php");
}

$id = $cat["id"];
unlink($cat["image"]);

$query = "DELETE FROM [dbo].[brand] WHERE [id] = '{$id}'";
$result = sqlsrv_query($connection, $query);

if ($result) {
    // Success

    $_SESSION["art_message"] = "Category 3 deleted.";

    redirect_to("brand.php");
} else {
    // Failure
    $_SESSION["art_error"] = "Category 3 deletion failed.";
    redirect_to("brand.php");
}

?>

</body>
</html>
