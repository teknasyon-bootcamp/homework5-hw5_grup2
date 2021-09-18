<?php
require_once __DIR__.'/../DynamicDB.php';

class Section extends DynamicDB
{
    public int $id;
    public int $book_id;
    public string $title = '';

    public static $tableName = "book_sections";

    public function __construct()
    {
    }
}

?>