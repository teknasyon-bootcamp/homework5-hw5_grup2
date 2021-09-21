<?php

namespace App\Backup;

use Database\DynamicDB;

class Export
{
    public static function createBackupFile()
    {
        $database = new DynamicDB();

        $books = $database->all('books');
        $posts = $database->all('book_posts');
        $sections = $database->all('book_sections');

        $backupArray = [
            'books' => $books,
            'posts' => $posts,
            'sections' => $sections
        ];

        $json = json_encode($backupArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $backupPath = __DIR__ . '/../../storage/backups/backup.json';

        file_put_contents($backupPath, $json);
    }

    public static function importBackupFile()
    {
        $backupPath = __DIR__ . '/../../storage/backups/backup.json';

        $data = file_get_contents($backupPath);

        $dataArray = json_decode($data, $data);

        $database = new DynamicDB();


        // Delete all records...
        foreach ($database->all('books') as $key => $book) {
            $database->delete('books', $book['id']);
        }

        foreach ($database->all('book_posts') as $key => $post) {
            $database->delete('book_posts', $post['id']);
        }

        foreach ($database->all('book_sections') as $key => $section) {
            $database->delete('book_sections', $section['id']);
        }


        // Generate 


        foreach ($dataArray['books'] as $key => $book) {

            $values = [
                'id' => $book['id'],
                'name' => $book['name'],
                'author' => $book['author']
            ];

            $database->create('books', $values);
        }

        foreach ($dataArray['sections'] as $key => $section) {

            $values = [
                'title' => $section['title'],
                'book_id' => $section['book_id']
            ];

            $database->create('book_sections', $values);
        }

        foreach ($dataArray['posts'] as $key => $post) {

            $values = [
                'title' => $post['title'],
                'book_id' => $post['book_id'],
                'content' => $post['content']
            ];

            $database->create('book_posts', $values);
        }
    }
}
