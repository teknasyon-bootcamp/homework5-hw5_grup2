<?php


Interface IDatabaseDriver
{

    public static function all();

    public static function find(mixed $id);

    public static function where(string $columnName, string $condition = "=", string|int $value = null);

    public function update();

    public function create();

    public function delete();
}