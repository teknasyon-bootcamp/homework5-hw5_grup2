<?php

namespace App\Log\Driver;


class FileLog implements ILogDriver
{
    protected string $logPath;
    private $date;
    private $time;

    public function __construct(string $logPath)
    {
        $this->logPath = $logPath;
    }

    public function setUp(): void
    {
        date_default_timezone_set('Europe/Istanbul');
        $this->time = date('d/m/Y G:i:s');
        $this->date = date('d-m-Y') . '.log';
    }
    public function log(string $message, int $level): void
    {
        $this->setUp();
        if (!file_exists($this->logPath . '/' . $this->date)) {
            $data = ILogDriver::INFO . " " . $this->time . " " . "Log dosyası oluşturuldu" . PHP_EOL;
            file_put_contents($this->logPath . '/' . $this->date, $data, FILE_APPEND);
        }
        $data = $level . " " . $this->time . " " . $message . PHP_EOL;
        
        file_put_contents($this->logPath . '/' . $this->date, $data, FILE_APPEND);

        $this->tearDown();
    }
    public function tearDown(): void
    {
        $data = ILogDriver::INFO . " " . $this->time . " " . "Log tamamlandı." . PHP_EOL;
        file_put_contents($this->logPath . '/' . $this->date, $data, FILE_APPEND);
    }
}
