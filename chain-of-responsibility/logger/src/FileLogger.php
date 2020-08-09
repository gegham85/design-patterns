<?php namespace Acme;

class FileLogger extends AbstractLogger
{
    public function __construct(int $level)
    {
        $this->setLevel($level);
    }

    protected function write($message)
    {
        var_dump("File::logger: ", $message);
    }
}
