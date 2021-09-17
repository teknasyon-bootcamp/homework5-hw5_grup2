<?php


require_once "MySQL.php";

class DynamicDB
{
    public $dbHandler;

    public function __construct()
    {
        $response = require_once "config.php";
        $driver = $response["engine"];
        
        if ($driver === "mysql") {
            require_once 'MySQL.php';
            echo "mysql";
            $this->dbHandler = new MySQL();
        } elseif ($driver === "mongodb") {
            require_once 'MongoDB.php';
            echo "mongodb";
            $this->dbHandler = new MongoDB();
        }
    }
}