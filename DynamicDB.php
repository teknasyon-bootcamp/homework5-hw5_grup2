<?php

$response = require_once "config.php";
$driver = $response["engine"];

spl_autoload_register(function ($class) {
    include __DIR__."/Models/".$class.".php";
});

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