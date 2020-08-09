<?php namespace Acme;

class WindowsOS implements OperatingSystem
{
    public function halt()
    {
        var_dump("halt windows os");
    }

    public function getName(): string
    {
        return "Windows";
    }
}
