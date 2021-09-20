<?php 

require_once 'Database/DynamicDB.php';


$database = new DynamicDB;



//$book = $database->create('books',['name' => 'Haydar ile PHP Maceraları','author' => 'İkinci Grup']);

$book = $database->delete('books',5);

var_dump($book); 















//Tüm yazıların çekilmesi 

// $posts = Book::All();


// Yeni bir yazı oluşturma
// $book = new Book;

// $book->name = "Örnek Kitap Adı";
// $book->author = "Örnek Kitap Yazarı";

// $book->create();


// /* Belirli yazının db'den çekilmesi. 
// Eğer yazıyı bulamazsa null dönecektir. */


//$book = Book::where(columnName:'id', value:1)->first();

/*
$post = Post::where('id','=',1)->first();

$book = Book::where('book_id','=',$post->book_id)->first();

echo "<br/> ---------------------------------------";
echo "<br/> Test.php Deneme <br/>";
var_dump($book);*/


// // Kitabun güncellenmesi

// /* Burada db kayıdında olmayan bir değişkeni 
// silmeye çalışırsak hata alacağımızdan if ile post değişkeni 
// null mu diye kontrol etmek faydalı olacaktır. */

// $id = 36;
// $book = Book::find($id);
// $book->title = "Güncellenmiş Örnek Kitap Başlığı";
// $book->content = "Güncellenmiş Örnek Kitap İçeriği";

// $book->update(); 


// // Bir yazının silinmesi

// /* Burada db kayıdında olmayan bir değişkeni 
// silmeye çalışırsak hata alacağımızdan if ile post değişkeni 
// null mu diye kontrol etmek faydalı olacaktır. */

// $id = 36;
// $book = Book::find($id);
// $book->delete();