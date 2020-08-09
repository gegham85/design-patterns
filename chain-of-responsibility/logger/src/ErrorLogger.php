<?php namespace Acme;

class ErrorLogger extends AbstractLogger
{
    public function __construct(int $level)
    {
        $this->setLevel($level);
    }

    protected function write($message)
    {
        var_dump("Error consonle::Logger: ", $message);
    }
}
