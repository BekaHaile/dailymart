<?php
/**
 * Created by PhpStorm.
 * User: mel
 * Date: 4/22/2016
 * Time: 7:03 AM
 */
?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
// v1: simple logout
// session_start();
$_SESSION["customer_id"] = null;
$_SESSION["username"] = null;
$_SESSION["role"] = null;
redirect_to("login.php");
?>

