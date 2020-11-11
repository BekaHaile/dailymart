<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php");
confirm_admin_logged_in()
?>
<?php
$id=$_GET['id'];

$query = "DELETE FROM [dbo].[faq] WHERE [id] = '{$id}'";
$result = sqlsrv_query($connection, $query);

if ($result) {
    // Success

    $_SESSION["art_message"] = "FAQ deleted.";

    redirect_to("faq.php");
} else {
    // Failure
    $_SESSION["art_error"] = "FAQ deletion failed.";
    redirect_to("faq.php");
}

?>