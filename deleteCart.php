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
<?php require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

$cart = find_cart_by_id($_GET["id"]);
if (!$cart) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("categories.php");
}

$id = $cart["id"];

$query = "DELETE FROM [dbo].[cart] WHERE [id] = '{$id}'";
$result = sqlsrv_query($connection, $query);

if ($result) {
    // Success

    redirect_to("cart.php");
} else {
    // Failure
    redirect_to("cart.php");
}

?>

</body>
</html>
