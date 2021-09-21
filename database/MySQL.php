<?php

namespace Database;

use App\Log\Logger;

class MySQL implements IDatabaseDriver
{
    protected \PDO $pdo;

    public function __construct(string $host, string $user, string $pass, string $dbname)
    {
        try {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        } catch (\PDOException $exception) {
            $logger = new Logger;
            $logger->log($exception->getMessage(), Logger::WARNING);
            exit('Cannot connect the database. Murphy Rules :( ');
        }
    }

    public function all(string $table): array
    {
        $pdoStatement = $this->pdo->prepare("SELECT * FROM $table");
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find(string $table, mixed $id): mixed
    {
        $pdoStatement = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $pdoStatement->bindParam(":id", $id);
        $pdoStatement->execute();
        return $pdoStatement->fetch(\PDO::FETCH_ASSOC);
    }

    public function where(string $table, string $columnName, mixed $id): mixed
    {
        $pdoStatement = $this->pdo->prepare("SELECT * FROM $table WHERE $columnName = :$columnName");
        $pdoStatement->bindParam(":$columnName", $id);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function serialize($values): array
    {
        // Get properties of static class as array
        $properties = $values;
        $totalProperties = count($values);
        $propertiesCounter = 0;

        $tableColumns = null;
        $tableValueParams = null;
        $tableSetParams = null;


        foreach ($properties as $columnName => $value) {

            // Ex : VALUES (:value1,:value2,:value3)
            $tableValueParams .= ":" . $columnName;
            // Ex : tableName (:column1,:column2,:column3) 
            $tableColumns .= $columnName;
            // Ex : SET column1 = :value1, column2 = :value2, column3 = :value3
            $tableSetParams .= "$columnName=:$columnName";

            $propertiesCounter++;

            // Don't add semicolon if this is last value of array
            if ($propertiesCounter < $totalProperties) {
                $tableValueParams .= ',';
                $tableColumns .= ',';
                $tableSetParams .= ',';
            }
        }

        return [
            'valueParams' => $tableValueParams,
            'tableColumns' => $tableColumns,
            'setParams' => $tableSetParams,
        ];
    }

    public function create(string $table, array $values): bool
    {
        $serialize = $this->serialize($values);

        $query = "INSERT INTO " . $table . "(" . $serialize['tableColumns'] . ") VALUES(" . $serialize['valueParams'] . ")";
        $pdoStatement = $this->pdo->prepare($query);

        foreach ($values as $param => $value) {
            $pdoStatement->bindValue(":$param", $value);
        }

        return $pdoStatement->execute();
    }

    public function update(string $table, mixed $id, array $values): bool
    {
        $serialize = $this->serialize($values);

        $query = "UPDATE " . $table . " SET " . $serialize['setParams'] . " WHERE id=:id";

        $pdoStatement = $this->pdo->prepare($query);

        foreach ($values as $param => $value) {
            $pdoStatement->bindValue(":$param", $value);
        }
        $pdoStatement->bindValue(":id", $id);

        return $pdoStatement->execute();
    }

    public function delete(string $table, mixed $id): bool
    {
        $query = "DELETE FROM $table WHERE id = :id";
        $pdoStatement = $this->pdo->prepare($query);
        $pdoStatement->bindParam(":id", $id);

        return $pdoStatement->execute();
    }
}
