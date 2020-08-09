<?php namespace Acme;

class Facade
{
    private $os;
    private $bios;

    public function __construct(Bios $bios, OperatingSystem $os)
    {
        $this->bios = $bios;
        $this->os = $os;
    }

    public function turnOn()
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    public function turnOff()
    {
        $this->os->halt();
        $this->os->powerDown();
    }
}
