<?php
require_once "../DB.class.php";

class Section extends DB
{
    public int $id;
    public int $book_id;
    public string $title = '';

    public function __construct()
    {
    }
}

?>