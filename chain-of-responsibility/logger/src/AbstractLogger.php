<?php namespace Acme;

abstract class AbstractLogger
{
    const INFO = 1;
    const DEBUG = 2;
    const ERROR = 3;

    protected $level;

    protected $nextLogger;

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setNextLogger(AbstractLogger $nextLogger)
    {
        $this->nextLogger = $nextLogger;
    }

    public function logMessage($level, $message)
    {
        if ($this->level <= $level) {
            $this->write($message);
        }

        if ($this->nextLogger != null) {
            $this->nextLogger->logMessage($level, $message);
        }
    }

    abstract protected function write($message);
}
