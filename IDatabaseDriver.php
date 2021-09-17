<?php


Interface IDatabaseDriver
{

    public static function all();

    public static function find(int $id);

    public static function where(string $columnName, string $condition = "=", string|int $value);

    public function update();

    public function create();

    public function delete();
}