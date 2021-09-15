<?php

require_once 'DynamicDB.php';
class DB extends DynamicDB {
    public function get()
    {
        return $this->dbHandler->get();
    }
}