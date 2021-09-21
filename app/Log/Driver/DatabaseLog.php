<?php

namespace App\Log\Driver;

use Database\DynamicDB;

class DatabaseLog implements ILogDriver
{
    protected DynamicDB $driver;

    private  $date;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    protected function setDriver($driver): void
    {
        $this->driver = $driver;
    }

    public function setUp(): void
    {
        date_default_timezone_set('Europe/Istanbul');
        $this->date = date('d:m:Y G:i:s');
    }

    public function log(string $message, int $level): void
    {
        $this->setUp();

        $values = [
            'message' => $this->date . ' - ' . $message,
            'level' => $level
        ];

        $this->driver->create('logs',$values);
    }

    public function tearDown(): void
    {
        # code...
    }
}
