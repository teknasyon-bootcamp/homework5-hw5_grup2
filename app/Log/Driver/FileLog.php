<?php

namespace App\Log\Driver;


class FileLog implements ILogDriver
{
    protected string $logFile;

    public function __construct(string $logFile = "")
    {
        $this->logFile = $classesPath = realpath('./') . $logFile . '/' . date("Y-m-d") . '.log';
    }

    protected function setLogFile(string $logFile): void
    {
        $this->logFile = $logFile;
    }

    public function setUp(): void
    {
    }
    public function log(string $message, int $level): void
    {
        $date = date("Y-m-d h:i:sa");
        if (!file_exists($this->logFile)) {
            $data = ILogDriver::INFO . " " . $date . " " . "Log dosyası oluşturuldu" . PHP_EOL;
            file_put_contents($this->logFile, $data, FILE_APPEND);
        }
        $data = $level . " " . $date . " " . $message . PHP_EOL;
        file_put_contents($this->logFile, $data, FILE_APPEND);
    }
    public function tearDown(): void
    {
        # code...
    }
}
