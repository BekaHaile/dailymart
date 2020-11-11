<!doctype html>
<html class="fixed">

<head>
</head>
<body>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php");
confirm_admin_logged_in()
?>
<?php
$del = find_slider_by_id($_GET["id"]);
if (!$del) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("slider.php");
}

$id = $del["id"];
unlink($del["image"]);

$query = "DELETE FROM dbo.slider WHERE id = '{$id}'";
$result = sqlsrv_query($connection, $query);

if ($result) {
    // Success

    $_SESSION["art_message"] = "Slider deleted.";

    redirect_to("slider.php");
} else {
    // Failure
    $_SESSION["art_error"] = "Slider deletion failed.";
    redirect_to("slider.php");
}

?>

</body>
</html>
