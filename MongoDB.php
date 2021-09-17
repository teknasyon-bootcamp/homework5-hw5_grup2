<?php

require_once 'IDatabaseDriver.php';

class MongoDB implements IDatabaseDriver
{
    protected $client = new MongoDB\Client("mongodb://localhost:27017/odev5");

    public function __construct(string $protocol, string $host, string $user, string $pass, 
    string $dbname, array $options)
    {
        $protocol = ""
        $host = "mariadb",
        $user = "root",
        $pass = "root",
        $dbname = $client->mydb;

    }
    public function all(string $collection):array
    {
        //return "MongoDB";
        $cursor = $collection->find();

        foreach ($cursor as $document) {
            echo $document["name"]. "<br/>";
            echo $document["author"]. "<br/>";
            echo $document["section"]. "<br/>";
            echo $document["post"]. "<br/>";

        }
    }
    public function find(string $collection, int $id):bool
    {
        


    }
    public function create(string $collection, array $values, i):bool
    {
        

        
        if(isset($_POST['submit'])){
            $insertOneResult = $collection->insertOne([
            'name' => $_POST['name'],
            'author' => $_POST['author'],
        ])}
        echo "Book created successfully";
        header("Location: index.php");
        





      
}
        

    public function delete(string $collection, array $values, int $id):bool
    {
        if (isset($_GET['id'])) {
            $book = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
         } 
         if(isset($_POST['id'])){
            $collection->remove(values(),false)
                
                ]]
            );
         
    }
    public function update(string $collection, array $values, int $id):bool
    {
        if (isset($_GET['id'])) {
            $book = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
         } 
         if(isset($_POST['id'])){
            $collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
                ['$set' => ['name' => $_POST['name'], 'author' => $_POST['author'],
                    'section_id' 
                ]]
            );
         
    }
}
