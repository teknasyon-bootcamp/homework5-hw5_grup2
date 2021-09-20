<?php

require_once __DIR__.'/IDatabaseDriver.php';

class MongoDB implements IDatabaseDriver
{
    public function __construct(string $protocol, string $host, string $user, string $pass, string $dbname, array $options)
    {
        try{
            //$this->client = new \MongoDB\Client("mongodb://$user:$pass@$host:$protocol/$dbname");//Düzenlenecek;

            $this->dbname = $dbname;
            $this->client = new \MongoDB\Client("mongodb://localhost:27017");

        }catch (\MongoException $exception){
            echo $exception->getMessage();
        }
    }

    public function all(string $table): array
    {
        $db= $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $result = $collection->find()->toArray();
        return $result;
    }

    public function find(string $table, mixed $id): mixed
    {
        $db= $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $result = $collection->findOne(['_id' =>new \MongoDB\BSON\ObjectId($id)]);
        return $result;
    }

    public function create(string $table, array $values): bool 
    {
        $db = $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $insertManyResult = $collection->insertMany($values);
        return  $insertManyResult->isAcknowledged();

    }

    public function update(string $table, mixed $id, array $values): bool
    {
        $db = $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $updateResult = $collection->updateMany(
            ['_id' => new \MongoDB\BSON\ObjectId($id)],
            ['$set'=>$values]
        );
        return $updateResult->isAcknowledged();
    }

    public function delete(string $table, mixed $id): bool
    {
        $db = $this->client->selectDatabase($this->dbname);
        $collection = $db->$table;
        $deleteResult = $collection->deleteMany(
            ['_id' => new \MongoDB\BSON\ObjectID($id)]
        );
        return $deleteResult->isAcknowledged();
    }
}
