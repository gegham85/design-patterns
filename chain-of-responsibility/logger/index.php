<?php

require 'vendor/autoload.php';

use Acme\ConsoleLogger;
use Acme\FileLogger;
use Acme\AbstractLogger;
use Acme\ErrorLogger;

$errorLogger = new ErrorLogger(AbstractLogger::ERROR);
$fileLogger = new FileLogger(AbstractLogger::DEBUG);
$consoleLogger = new ConsoleLogger(AbstractLogger::INFO);

$errorLogger->setNextLogger($fileLogger);
$fileLogger->setNextLogger($consoleLogger);


$errorLogger->logMessage(AbstractLogger::ERROR, "user deleted");

