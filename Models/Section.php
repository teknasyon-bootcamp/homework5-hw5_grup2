<?php
echo __DIR__.'/../DynamicDB.php';

class Section extends DynamicDB
{
    public int $id;
    public int $book_id;
    public string $title = '';

    public function __construct()
    {
    }
}

?>