<?php namespace Acme;

class ConsoleLogger extends AbstractLogger
{
    public function __construct(int $level)
    {
        $this->setLevel($level);
    }

    protected function write($message)
    {
        var_dump("Standard console::logger: ", $message);
    }
}