<?php
namespace App\Logger;

interface ILogDriver{
    public const ERROR=1;
    public const WARNING=2;
    public const DEBUG=3;
    public const INFO=4;
    public function setUp():void;
    
    public function log(string $message, int $level):void;
    public function tearDown():void;
}