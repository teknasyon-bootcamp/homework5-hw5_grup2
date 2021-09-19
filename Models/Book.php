<?php
require_once __DIR__.'/../DynamicDB.php';

class Book extends DynamicDB
{
    public int $id;
    public string $name = '';
    public string $author = '';

    public function __construct()
    {
    }
}