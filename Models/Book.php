<?php
require_once "DB.class.php";

class Book extends DB
{
    public int $id;
    public string $name = '';
    public string $author = '';

    public function __construct()
    {
    }
}
?>