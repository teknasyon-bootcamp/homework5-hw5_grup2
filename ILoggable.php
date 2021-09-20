<?php
namespace App\Logger;

interface ILoggable
{
    
    public const ERROR=1;
    public const WARNING=2;
    public const DEBUG=3;
    public const INFO=4;
  
    public function log(string $message,int $level):void;
}