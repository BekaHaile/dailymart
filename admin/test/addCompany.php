<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php
$logo = "";

$cname = $_POST["cname"];
$city = $_POST["city"];
$subcity = $_POST["subcity"];
$wereda = $_POST["woreda"];
$kebele = $_POST["kebele"];
$hnumber = $_POST["hnumber"];
$olocation = $_POST["olocation"];
$mnumber = substr($_POST["mnumber"], 2);
$onumber = $_POST["onumber"];
$email = $_POST["email"];

create_company($cname, $city, $subcity, $wereda, $kebele, $hnumber, $olocation, $mnumber, $onumber, $email, $logo);

?>
