<?php

require_once "config.php";

$driver = $result["engine"];

if($driver == "mysql"){
  $books = file_get_contents('export_import_operations/books.json');
  $jsonBooks = json_decode($books, true);
}
else if($driver == 'mongodb')
{
    
});
}

//$book_sections = file_get_contents('export_import_operations/posts.json');
//$book_posts = file_get_contents('export_import_operations/sections.json');


//$jsonSections = json_decode($book_sections, true);
//$jsonPosts = json_decode($book_posts, true);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<div class="container">
  <div class="row justify-content-start">
    <div class="row row-cols-2">
        <div class="col-4">
      <?php  
        echo "Books : " . PHP_EOL;
        foreach ($jsonBooks as $key => $value) {
        
            $name = $value["name"];
            $author = $value["author"];
            echo "<ul>";
            echo "<li>" . $name . "</li>";
            echo "<li>" . $author . "</li>";
            echo "</ul>";
        }
      ?>
    </div>
    <div class="col-4">
        <?php
        echo "Sections : " . PHP_EOL;
        foreach ($jsonSections as $key => $value) {

        $book_id = $value["book_id"];
        $title = $value["title"];
        echo "<ul>";
        echo "<li>" . $book_id . "</li>";
        echo "<li>" . $title . "</li>";
        echo "</ul>";
    } ?>
    </div>
    <div class="col-4">
        <?php
        echo "Posts : " . PHP_EOL;
        foreach ($jsonPosts as $key => $value) {

        $book_id = $value["book_id"];
        $title = $value["title"];
        $content = $value["content"];
        echo "<ul>";
        echo "<li>" . $book_id . "</li>";
        echo "<li>" . $title . "</li>";
        echo "</ul>";
    } ?>
    </div>
  </div>
      
  
</body>
</html>
