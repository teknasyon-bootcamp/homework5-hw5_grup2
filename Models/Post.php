<?php
require_once "../DB.class.php";

class Post extends DB
{
    public int $post_id;
    public int $book_id;
    public string $title = '';
    public string $content = '';

    public function __construct()
    {
    }
}