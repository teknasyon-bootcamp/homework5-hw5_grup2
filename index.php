<?php

include "App/autoload.php";

use App\Logger\Logger;
use App\Logger\FileLog;
use App\DB\Database as DB;
use App\Logger\Database;
$drive = new FileLog('/storage/fileLog/');
$drive = new Database(new DB());
$logger = new Logger($drive);
$logger->log('test',Logger::ERROR);