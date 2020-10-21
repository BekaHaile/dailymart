<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php

$fname = $_POST["fname"];
$fnameam = $_POST["fnameam"];
$mname = $_POST["mname"];
$mnameam = $_POST["mnameam"];
$lname = $_POST["lname"];
$lnameam = $_POST["lnameam"];
$mphone = str_replace('-','',substr($_POST["mobile"], 5));
$gender = $_POST["gender"];
$email = $_POST["email"];
$lang = $_POST["language"];
$birth = $_POST["birth"];

create_user($fname,$fnameam,$mname,$mnameam,$lname,$lnameam,$mphone,$gender,$email,$lang,$birth);

?>