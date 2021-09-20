<?php

namespace App\Logger;

use App\Logger\ILoggable;

class Logger implements ILoggable
{
   protected $driver;
   public function __construct($driver)
   {
      $this->driver = $driver;
   }
   protected function setDriver($driver): void
   {
      $this->driver = $driver;
   }
   public function log(string $message, int $level): void
   {
      $this->driver->log($message, $level);
   }
}
