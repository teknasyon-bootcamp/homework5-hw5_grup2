<?php

namespace App\Log;

use App\Log\Driver\ILogDriver;
use App\Log\Driver\DatabaseLog;
use App\Log\Driver\FileLog;
use Database\DynamicDB;

class Logger implements ILoggable
{
   protected ILogDriver $driver;

   public function __construct()
   {
      $response = require __DIR__ . '/../../config.php';

      $logPath = __DIR__.'/../../storage/logs/';
   
      $logDriver = $response["logging"];
      if ($logDriver == "database") {
         $this->driver = new DatabaseLog(new DynamicDB);
      } elseif ($logDriver == 'file') {
         $this->driver = new FileLog($logPath);
      }
   }

   public function log(string $message, int $level): void
   {
      $this->driver->log($message, $level);
   }
}
