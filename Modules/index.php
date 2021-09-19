<?php
//imports this file to leverage its functionalities and attributes
require_once '../Models/Book.php'; 
require "BookOperation.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top  py-4 bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">GRUP2 </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>

        </div>
        </div>
    </div>
</nav>
    <div class="col-md-3 mt-5 pt-5  "></div>
    <div class="col-md-12 well well-sm  " > 
        <h1 class="display-1 d-flex justify-content-center pt-3">BOOKS</h1>
        <hr style="border-top:1px dotted #ccc;" />
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </div>
            </div>
        </div>
        <div class="">
                 <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12 ">
                <table class="table table-hover table-light my-3 ">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Author </th>
                    </tr>
                </thead>
                <tbody>
                    <?php require_once "Contain.php"; ?>
                </tbody>
                </table>
                </div>
                <?php foreach($books as $book) : ?>
                <?php require "UpdateModal.php"?>
                <?php endforeach ?>
                <?php require "AddModal.php" ?>   
            </div>
        </div>
        </div>
   


    </div>

  </body>
</html>
 
