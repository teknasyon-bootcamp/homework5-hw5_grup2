<?php

namespace App\Driver;

use ILogDriver;

class Database implements ILogDriver
{
    protected $driver;

    public function __construct($driver)
    {
        $this->drive = $drive;
    }

    protected function setDriver($driver): void
    {
        $this->drive = $drive;
    }

    public function setUp(): void
    {
    }

    public function log(string $message, int $level): void
    {
        echo $message;
    }
    
    public function tearDown(): void
    {
        # code...
    }
}
