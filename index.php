<?php
require_once __DIR__."/vendor/autoload.php";

use Database\DynamicDB;
use App\Log\Logger;


$logger = new Logger;
$logger->log("Index.php'ye giriş yapıldı.", Logger::WARNING);

$database = new DynamicDB;

// Get all books in my list 
$books = $database->all('books');

// Defines necessary variables for my book list and sets its default values
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
 * Performs create new book, update and delete existing post 
 * using the value of action variable in the url    
 */

switch ($action) {
    case 'edit':

        $values = [
            'name' => $name,
            'author' => $author,
        ];

        $database->update('books', $bookId, $values);

        // Sends a raw http header to the browser in a raw form
        header("Refresh:0; url=index.php");
        break;
    case 'create':
        $values = [
            'name' => $name,
            'author' => $author,
        ];

        $database->create('books', $values);

        header("Refresh:0; url=index.php");
        break;
    case 'delete':
        $database->delete('books', $bookId);       

        header("Refresh:0; url=index.php");
        break;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Books</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
        #more {
            display: none;
        }
    </style>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:blue; width:120%; height:50px; background-color:#b0e0e6; right: 0px;" href="index.php">Welcome</a>
        </div>
    </nav>
    <div class="col-md-3"></div>
    <div class="col-md-12 well well-sm">
        <h3 class="text-primary">BOOKS</h3>
        <hr style="border-top:1px dotted #ccc;" />
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add</button>
        <br /><br />
        <table class="table table-bordered">
            <thead class="alert-info">
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- List created posts -->
                <?php
                // Show all books if there isn't any specific get request

                foreach ($books as $book) {
                    echo "<tr>";
                    echo '<td>';
                    echo '<a class="navbar-brand" href=book.php?book=' . $book['id'] . '>' . $book['name'] . "</a>";
                    echo '</td>';
                    echo '<td>' . $book['author'] . '</td>';
                    echo '<td><button type="button" data-toggle="modal" data-target="#update_' . $book['id'] . '"class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>Update</button>
                            <a href="index.php?action=delete&book=' . $book['id'] . '"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>';
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
    <?php foreach ($books as $book) : ?>
        <div class="modal fade" id="update_<?= $book['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="index.php?action=edit&book=<?= $book['id'] ?>" method="POST">
                        <div class="modal-header">
                            <h3 class="modal-title">Update</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="<?= $book['name'] ?>" name="name" />
                                    <!-- A hidden field let us include data that cannot be seen or modified 
                            when the form is submitted. -->
                                    <input type="hidden" class="form-control" value="<?php $book['id'] ?>" name="id" />
                                </div>
                                <div class="form-group">
                                    <label>Author</label>
                                    <input type="text" class="form-control" value="<?= $book['author'] ?>" name="author" />
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button class="btn btn-warning" name="guncelle"><span class="glyphicon glyphicon-update"></span> Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Exit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Add Modal -->
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php?action=create" method="POST">
                    <div class="modal-header">
                        <h3 class="modal-title">Add</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" class="form-control" name="author" />
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="save">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Exit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>