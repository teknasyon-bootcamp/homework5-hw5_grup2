<?php
// Get all posts in my list 
$books = Book::All();

// Defines necessary variables for my post list and sets its default values
$action = '';
$bookId = '';
$name = '';
$author = '';
//get the value of action variable which was given in the url
if(isset($_GET['action'])){ //isset function checks whether a variable is declared and is different than null. 
    $action = $_GET['action']; 
}
if(isset($_REQUEST['book'])){
    $bookId = $_REQUEST['book']; 
}
if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['author'])){
    $author = $_POST['author']; 
}
/**
 * Performs create new post, update and delete existing post 
 * using the value of action variable in the url    
 */
switch ($action) {
    case 'edit' :   
        $book = Book::find($bookId);
        $book->name = $name;
        $book->author = $author;
        $book->update();
        
        // Sends a raw http header to the browser in a raw form
        header("Refresh:0; url=index.php");  
        break;
    case 'create':
        $book = new Book;
        $book->name = $name;
        $book->author = $author;
        $book->create();
        header("Refresh:0; url=index.php");
        break;
    case 'delete':
        $book = Book::find($bookId);
        $book->delete();
        header("Refresh:0; url=index.php");
        break;
}
?>