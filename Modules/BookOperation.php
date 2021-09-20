<?php

require_once __DIR__ . '/../Database/DynamicDB.php';


$database = new DynamicDB;

// Get all posts in my list 
$books = $database->all('books');

// Defines necessary variables for my post list and sets its default values
$action = '';
$bookId = '';
$name = '';
$author = '';
//get the value of action variable which was given in the url
if (isset($_GET['action'])) { //isset function checks whether a variable is declared and is different than null. 
    $action = $_GET['action'];
}
if (isset($_REQUEST['book'])) {
    $bookId = $_REQUEST['book'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['author'])) {
    $author = $_POST['author'];
}
/**
 * Performs create new post, update and delete existing post 
 * using the value of action variable in the url    
 */

switch ($action) {
    case 'edit':

        $values = [
            'name' => $name,
            'author' => $name,
        ];

        $database->update('books', $bookId, $values);

        // Sends a raw http header to the browser in a raw form
        header("Refresh:0; url=index.php");
        break;
    case 'create':
        $values = [
            'name' => $name,
            'author' => $name,
        ];

        $database->create('books', $values);

        header("Refresh:0; url=index.php");
        break;
    case 'delete':
        $database->delete('books', $bookId);

        header("Refresh:0; url=index.php");
        break;
}
