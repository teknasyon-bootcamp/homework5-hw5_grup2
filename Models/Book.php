<?php
require_once __DIR__ . '/../Database/DynamicDB.php';

class Book extends DynamicDB
{
    public int $id;
    public string $name = '';
    public string $author = '';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
