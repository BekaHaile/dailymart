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
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php");
confirm_admin_logged_in()
?>
<?php
$admin = find_all_admin_by_id($_GET["id"]);
if (!$admin) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("users.php");
}

$id = $admin["id"];
//$query = "DELETE FROM dbo.Users WHERE UserID = '{$id}' LIMIT 1";

$query = "DELETE FROM [dbo].[user] WHERE [id] = {$id}";
$result = sqlsrv_query($connection, $query);

if ($result) {
    // Success

    $_SESSION["art_message"] = "User Account deleted.";

    redirect_to("users.php");
} else {
    // Failure
    $_SESSION["art_error"] = "User Account deletion failed.";
    redirect_to("users.php");
}

?>

</body>
</html>
