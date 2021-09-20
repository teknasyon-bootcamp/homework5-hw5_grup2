<?php
namespace Database;

class DynamicDB
{
    protected IDatabaseDriver $driver;

    public function __construct()
    {
        $response = require_once __DIR__ . "/../config.php";
        $configDriver = $response["engine"];

        $host = $response["host"];
        $port = $response["port"];
        $user = $response["user"];
        $password = $response["password"];
        $options = $response["options"];
        $protocol = '';

        if ($configDriver == "mysql") {

            $mySql = new MySQL($host, $user, $password, 'odev5');
            $this->driver = $mySql;
        } else {
            $mongoDB = new MongoDB($protocol, $host, $user, $password, 'odev5', $options);
            $this->driver = $mongoDB;
        }
    }
    public function all(string $table): array
    {
        return  $this->driver->all($table);
    }
    public function find(string $table, mixed $id): mixed
    {
        return $this->driver->find($table, $id);
    }
    public function create(string $table, array $values): bool
    {
        return $this->driver->create($table, $values);
    }
    public function update(string $table, mixed $id, array $values): bool
    {
        return $this->driver->update($table, $id, $values);
    }
    public function delete(string $table, mixed $id): bool
    {
        return $this->driver->delete($table, $id);
    }
}