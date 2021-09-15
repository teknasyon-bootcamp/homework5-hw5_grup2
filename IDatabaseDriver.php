<?php


Interface IIDatabaseDriver
{

    public function all();

    public function find(int $id);

    public function update();

    public function create();

    public function delete();
}