<?php

require_once 'IDatabaseDriver.php';

class MongoDB implements IDatabaseDriver
{

    public $connection = require_once "config.php";

    //$uri = mongodb:[$connection['user'],:$connection['password']@]host1[:$connection['port']][/[defaultAuthDb][?$connection['options']]];

    protected $client = new MongoDB\Client("mongodb://localhost:27017/odev5");

    public function Connect(string $protocol, string $host, string $user, string $pass, 
    string $dbname, array $options){
        $protocol = "";
        $host = "mongodb";
        $user = $connection['user'];
        $pass = $connection['password'];
        $dbname = $client->mydb; //Buraya tekrar bakalim
    }

    public function All(string $collection = $client->books):array
    {
        //return "MongoDB";
        $collection->find();

        
    }
    public function find(string $collection = $client->books, mixed $id):mixed
    {

        $result = $collection->findOne(['_id' =>new \MongoDB\BSON\ObjectId($id)]);

    }
    public function create(string $collection, array $values):bool
    {
        $collection->insert($values);

    }
        

    public function delete(string $collection, mixed $id):bool
    {
        $collection->drop($id);
         
    }
    public function update(string $collection, array $values, int $id):bool
    {
        $collection->updateMany(['_id' =>new \MongoDB\BSON\ObjectId($id)],$values);
    }
}
