<?php
echo __DIR__.'/../DynamicDB.php';

class Post extends DynamicDB
{
    public int $id;
    public int $book_id;
    public string $title = '';
    public string $content = '';

    public function __construct()
    {
    }
}