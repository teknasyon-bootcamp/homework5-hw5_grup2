<?php

$response = require_once "config.php";
$driver = $response["engine"];

$dbHandler = null;

if ($driver === "mysql") {
    require_once 'MySQL.php';

    class DynamicDB extends MySQL
    {
        
    }
} elseif ($driver === "mongodb") {

    require_once 'MongoDB.php';
    class DynamicDB extends MongoDB
    {
        
    }
}