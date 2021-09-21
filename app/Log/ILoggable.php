<?php
namespace App\Log;

interface ILoggable
{
    const EMERGENCY = 1;
    const ALERT     = 2;
    const CRITICAL  = 3;
    const ERROR     = 4;
    const WARNING   = 5;
    const NOTICE    = 6;
    const INFO      = 7;
    const DEBUG     = 8;
  
    public function log(string $message,int $level):void;
}