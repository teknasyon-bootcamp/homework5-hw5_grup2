<?php

$response = require_once "config.php";
$driver = $response["engine"];

if ($driver === "mysql") {
    require_once 'MySQL.php';

    class DynamicDB extends MySQL
    {
        
    }
} elseif ($driver === "mongodb") {
    require_once 'MongoDB.php';
    $dbHandler = null;
    class DynamicDB extends MongoDB
    {
        
    }
}