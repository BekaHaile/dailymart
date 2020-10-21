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
$cat = find_product_group_by_id($_GET["id"]);
if (!$cat) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("productGroup.php");
}

$id = $cat["id"];
unlink($cat["image"]);

$query = "DELETE FROM [dbo].[product_group] WHERE [id] = '{$id}'";
$result = sqlsrv_query($connection, $query);

if ($result) {
    // Success

    $_SESSION["art_message"] = "Category 2 deleted.";

    redirect_to("productGroup.php");
} else {
    // Failure
    $_SESSION["art_error"] = "Category 2 deletion failed.";
    redirect_to("productGroup.php");
}

?>

</body>
</html>
