<?php

$serverName = "ABGSRV81\ABIG"; //serverName\instanceName
$connectionInfo = array("Database" => "DailyMart", "UID" => "sa", "PWD" => "p@ssw0rd","CharacterSet"=>"UTF-8");
$connection = sqlsrv_connect($serverName, $connectionInfo);

if ($connection === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
