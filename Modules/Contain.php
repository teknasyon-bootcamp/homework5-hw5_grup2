 <?php
    if (isset($_GET["book"])) {

        $id = $_GET["book"];

        $book = Book::find($id);

        if (is_null($book)) {
            echo "Kitap Bulunamadı";
        } else {
            echo '<td>' . $book->name . '</td>';
            echo '<td>' . $book->author . '</td>';
        }
    } else {
        // Show all posts if there isn't any specific get request
        foreach ($books as $book) {
            echo "<tr>";
            echo '<td>';
            echo '<a class="navbar-brand" href=index.php?book=' . $book->id . '>' . $book->name . "</a>";
            echo '</td>';
            echo '<td>' . $book->author . '</td>';
            echo '<td><button class="btn btn-warning" type="button"data-toggle="modal" data-target="#update_' . $book->id . '"><span class="glyphicon glyphicon-edit"></span>Update</button>'
                . "\n" . '<a href="index.php?action=delete&book=' . $book->id . '"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>';
            echo "</tr>";
        }
    }
    ?>