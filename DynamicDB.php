<?php


require_once "MySQL.php";

$response = require_once "config.php";
$driver = $response["engine"];

$dbHandler = null;

if ($driver === "mysql") {
    require_once 'MySQL.php';

    class DynamicDB extends MySQL
    {
        
    }
} elseif ($driver === "mongodb") {
    class DynamicDB extends MongoDB
    {
        
    }
}