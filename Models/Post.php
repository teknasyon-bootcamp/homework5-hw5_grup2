<?php
require_once __DIR__.'/../DynamicDB.php';

class Post extends DynamicDB
{
    public int $id;
    public int $book_id;
    public string $title = '';
    public string $content = '';

    public static $tableName = "book_posts";

    public function __construct()
    {
    }
}