<?php

require_once 'IDatabaseDriver.php';

class MongoDB implements IDatabaseDriver
{

    public function get()
    {
        return "MongoDB";
    }
    
    public function find()
    {
        // TODO: Implement find() method.
    }

}