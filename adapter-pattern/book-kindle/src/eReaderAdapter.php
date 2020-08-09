<?php namespace Acme;

class eReaderAdapter implements BookInterface
{
    protected $reader;

    public function __construct(eReaderInteface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        $this->reader->turnOn();
    }

    public function turnPage()
    {
        $this->reader->pressNextButton();
    }
}
