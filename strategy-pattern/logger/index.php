<?php

interface Logger
{
    public function log($data);
}

class LogIntoFile implements Logger
{
    public function log($data)
    {
        var_dump("log the data to the file", $data);
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump("log the data to the database", $data);
    }
}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        var_dump("log the data to the database", $data);
    }
}

class App
{
    public function log($data, Logger $logger = null)
    {
        $logger ?: (new LogIntoFile);

        $logger->log($data);
    }
}

$app = new App();
$app->log("Some information here", new LogToXWebService);

$app->log("Some information there", new LogToDatabase);
