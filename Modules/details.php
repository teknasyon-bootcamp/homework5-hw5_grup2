<?php
    require_once '../Models/Book.php'; 
    require_once "BookOperation.php";
    require "Contain.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Book Details</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<!-- Navbar Start -->
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
<!-- Navbar End -->
<!-- Book Details Start -->
    <div class="container mt-5 pt-5 d-flex justify-content-center">

        <h1 class="display-3"><?= $book->name ?></h1>

    </div>
    <div class="container d-flex justify-content-center ">

        <h1 class="display-6 fst-italic ">-<?= $book->author ?>-</h1>
    </div>
<!-- Book Details End -->
<!-- Sections Start -->

    <div class="container">
    <div class="row my-1">
            <div id="list-example" class="list-group col-4">
                <a class="list-group-item list-group-item-action active" href="#list-section-1">Section 1</a>
                <a class="list-group-item list-group-item-action " href="#list-section-2">Section 2</a>
                <a class="list-group-item list-group-item-action " href="#list-section-3">Section 3</a>
                <a class="list-group-item list-group-item-action " href="#list-section-4">Section 4</a>
            </div>
            <div data-bs-spy="scroll" style="height: 450px;" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example col overflow-scroll p-3 rounded " tabindex="0">
                <h4 id="list-section-1">Section 1</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus sequi dolore maiores autem debitis voluptas officiis nesciunt obcaecati modi, quibusdam asperiores magni, unde saepe quisquam ducimus, aliquam dolorum impedit natus!</p>
                <p>Nobis quidem molestiae omnis nisi, fugit temporibus quia ut voluptate consectetur fuga at eum optio qui a. Optio, tenetur excepturi possimus vitae quaerat officiis ab amet nulla repellat similique inventore.</p>
                <p>Eveniet quos est laudantium ea temporibus totam dicta mollitia, libero id eum blanditiis officiis nulla deserunt facere omnis, et obcaecati, sint similique voluptas? Distinctio nostrum provident reprehenderit obcaecati quam soluta!</p>                                
                <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, quidem.</h4>
                <h4>Neque voluptatibus sunt dolorum atque tenetur provident assumenda labore eligendi.</h4>
                <h4>Impedit facere vitae provident rem quod quae alias enim. Sint!</h4>
                <h4>Dignissimos suscipit, sapiente mollitia quidem aliquid possimus sit voluptas quia?</h4>
                <h4>Laudantium consectetur magnam, facilis qui eum velit iure dolores tempore?</h4>
                <h4 id="list-section-2">Section 2</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus sequi dolore maiores autem debitis voluptas officiis nesciunt obcaecati modi, quibusdam asperiores magni, unde saepe quisquam ducimus, aliquam dolorum impedit natus!</p>
                <p>Nobis quidem molestiae omnis nisi, fugit temporibus quia ut voluptate consectetur fuga at eum optio qui a. Optio, tenetur excepturi possimus vitae quaerat officiis ab amet nulla repellat similique inventore.</p>
                <p>Eveniet quos est laudantium ea temporibus totam dicta mollitia, libero id eum blanditiis officiis nulla deserunt facere omnis, et obcaecati, sint similique voluptas? Distinctio nostrum provident reprehenderit obcaecati quam soluta!</p>                
                <h4 id="list-section-3">Section 3</h4>
                <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, quidem.</h4>
                <h4>Neque voluptatibus sunt dolorum atque tenetur provident assumenda labore eligendi.</h4>
                <h4>Impedit facere vitae provident rem quod quae alias enim. Sint!</h4>
                <h4>Dignissimos suscipit, sapiente mollitia quidem aliquid possimus sit voluptas quia?</h4>
                <h4>Laudantium consectetur magnam, facilis qui eum velit iure dolores tempore?</h4>                
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus sequi dolore maiores autem debitis voluptas officiis nesciunt obcaecati modi, quibusdam asperiores magni, unde saepe quisquam ducimus, aliquam dolorum impedit natus!</p>
                <p>Nobis quidem molestiae omnis nisi, fugit temporibus quia ut voluptate consectetur fuga at eum optio qui a. Optio, tenetur excepturi possimus vitae quaerat officiis ab amet nulla repellat similique inventore.</p>
                <p>Eveniet quos est laudantium ea temporibus totam dicta mollitia, libero id eum blanditiis officiis nulla deserunt facere omnis, et obcaecati, sint similique voluptas? Distinctio nostrum provident reprehenderit obcaecati quam soluta!</p>
                <h4 id="list-section-4">Section 4</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error neque quis est consequuntur debitis quos dolores. Nisi quod aspernatur distinctio est cupiditate. Magni ea iure distinctio sit sunt atque dolore?</p>
                <p>A illo totam quidem aut ullam quia doloremque non deleniti laudantium dolores, dolorem voluptas fuga quas ducimus provident autem corporis officiis nemo aspernatur vel nesciunt libero voluptates. Iste, quasi laborum.</p>
                <p>Dignissimos quasi animi blanditiis laborum suscipit vel. Totam aperiam ipsa odit debitis quibusdam, eius asperiores sit exercitationem facere iste error cumque dolorem! Sed, qui veritatis? Quibusdam suscipit fuga illo doloribus.</p>
                <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias, quidem.</h4>
                <h4>Neque voluptatibus sunt dolorum atque tenetur provident assumenda labore eligendi.</h4>
                <h4>Impedit facere vitae provident rem quod quae alias enim. Sint!</h4>
                <h4>Dignissimos suscipit, sapiente mollitia quidem aliquid possimus sit voluptas quia?</h4>
                <h4>Laudantium consectetur magnam, facilis qui eum velit iure dolores tempore?</h4>                                
            </div>
        </div>
    </div>
    <!-- Sections End -->



    
  </body>
</html>