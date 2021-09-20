<?php

require_once __DIR__."/vendor/autoload.php";

use Database\DynamicDB;

$database = new DynamicDB;

// Get all posts in my list 
$posts = $database->all('posts');

// Defines necessary variables for my post list and sets its default values
$action = '';
$postId = '';
$title = '';
$content = '';
//get the value of action variable which was given in the url
if (isset($_GET['action'])) { //isset function checks whether a variable is declared and is different than null. 
    $action = $_GET['action'];
}
if (isset($_REQUEST['post'])) {
    $postId = $_REQUEST['post'];
}
if (isset($_POST['title'])) {
    $title = $_POST['title'];
}
if (isset($_POST['content'])) {
    $content = $_POST['content'];
}
/**
 * Performs create new post, update and delete existing post 
 * using the value of action variable in the url    
 */

switch ($action) {
    case 'edit':

        $values = [
            'title' => $title,
            'content' => $content,
        ];

        $database->update('posts', $postId, $values);

        // Sends a raw http header to the browser in a raw form
        header("Refresh:0; url=post.php");
        break;
    case 'create':
        $values = [
            'title' => $title,
            'content' => $content,
        ];

        $database->create('posts', $values);

        header("Refresh:0; url=post.php");
        break;
    case 'delete':
        $database->delete('posts', $postId);

        header("Refresh:0; url=post.php");
        break;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Posts</title>
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
            <a class="navbar-brand" style="color:blue; width:120%; height:50px; background-color:#b0e0e6; right: 0px;" href="post.php">Welcome</a>
        </div>
    </nav>
    <div class="col-md-3"></div>
    <div class="col-md-12 well well-sm">
        <h3 class="text-primary">POSTS</h3>
        <hr style="border-top:1px dotted #ccc;" />
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add</button>

        <br /><br />
        <table class="table table-bordered">
            <thead class="alert-info">
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- List created posts -->
                <?php
                $id = $_GET["section"];
                foreach ($sections as $section) {
                    if ($id == $section['book_id']) {
                        echo "<tr>";
                        echo '<td>';
                        echo '<a class="navbar-brand" href=post.php?section=' . $section['id'] . '>' . $section['title'] . "</a>";
                        echo '</td>';
                        echo '<td><button class="btn btn-warning" type="button"data-toggle="modal" data-target="#update_' .  $section['id'] . '"><span class="glyphicon glyphicon-edit"></span>Update</button>'
                            . "\n" . '<a href="section.php?action=delete&section=' .  $section['id'] . '"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>';
                        echo "</tr>";
                    }
                }

                ?>
                <?php foreach ($posts as $post) : ?>
                    <?php $contentFirstPart = substr($post['content'], 0, 100);
                    $contentSecondPart = substr($post['content'], 100, strlen($post['content']));
                    ?>
                    <tr>
                        <td><?= $post['title'] ?></td>
                        <td>

                            <p><?= $contentFirstPart ?><span id="dots">...</span><span id="more"><?= $contentSecondPart ?></span></p>
                            <a href="#" onclick="myFunction()" id="myBtn">Read more</a>

                        </td>
                        <!-- Creates update and delete buttons which are having given values on the right side of the page-->
                        <td><button class="btn btn-warning" type="button" data-toggle="modal" data-target="#update_<?= $post['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Update</button>
                            <a href="?action=delete&post=<?= $post['id'] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php foreach ($posts as $post) : ?>
        <div class="modal fade" id="update_<?= $post['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="post.php?action=edit&post=<?=$post['id'] ?>" method="POST">
                        <div class="modal-header">
                            <h3 class="modal-title">Update</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="<?= $post['title'] ?>" name="title" />

                                    <!-- A hidden field let us include data that cannot be seen or modified 
    when the form is submitted. 
-->
                                    <input type="hidden" class="form-control" value="<?= $post['id'] ?>" name="id" />
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea rows="5" cols="20" type="text" class="form-control" name="content"><?= $post['content'] ?></textarea>

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
                <form action="post.php?action=create" method="POST">
                    <div class="modal-header">
                        <h3 class="modal-title">Add</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea type="text" class="form-control" name="content" rows="5" cols="20">

                                </textarea>
                                <!--Converted from input to textarea control-->
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
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
</body>

</html>