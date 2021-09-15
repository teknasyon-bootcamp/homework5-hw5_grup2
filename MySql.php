<?php

require_once 'IDatabaseDriver.php';

class Sql implements IDatabaseDriver
{

    public function get()
    {
        return "yyyyMongoDB";
    }


    public function find()
    {
        // TODO: Implement find() method.
    }
}