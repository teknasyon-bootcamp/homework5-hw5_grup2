<?php

namespace App\Backup;

use Database\DynamicDB;

class Export{

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

        $backupPath = __DIR__.'/../../storage/backups';

        file_put_contents($backupPath.'/backup.json', $json);
    }
}

// Mysql ve mongodb için json export işlemi yapar
/*
/çektiğimiz verileri dizi formatına getiriyoruz
$json_veri = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
// JSON_UNESCAPED_UNICODE ile türkçe karakter desteği sağlıyoruz 
// JSON_PRETTY_PRINT dosyaya daha okunaklı ve güzel bir biçimde yazılmasını sağlıyoruz
file_put_contents('export_import_operations/books.json', $json_veri);
// file_put_contents fonksiyonu ile dosya oluşturuyoruz ve yazdırma işlemini yapıyoruz

$getAllPosts = $db->query('select * from book_posts'); // book_posts tablosundaki tüm verileri alıyoruz
$result = $getAllPosts->fetchAll(PDO::FETCH_ASSOC);
$json_veri = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents('export_import_operations/posts.json', $json_veri);

/*json_encode fonksiyonu parametre olarak gelen dizinin json formatına dönüştürülmesini sağlar
Başarı durumunda JSON kodlu bir dizge, başarısızlık durumunda false döner.
*/

/*
$getAllSections = $db->query('select * from book_sections'); //sections tablosundaki tüm verileri çekiyoruz
$result = $getAllSections->fetchAll(PDO::FETCH_ASSOC);
$json_veri = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents('export_import_operations/sections.json', $json_veri);

*/
// $connect = mysqli_connect("localhost", )
